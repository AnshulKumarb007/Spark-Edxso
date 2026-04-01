<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail; // for email
use App\Models\Headofschool;
use App\Models\SchoolRegistration;
use App\Models\Otp;
use Illuminate\Support\Facades\Session;
use DB;
 

class SchoolChangePassewordController extends Controller
{
            public function update_password_after_login(Request $request)
            {

               
                try {                                                                    
                    $request->validate([
                        'password' => 'required|string|confirmed|min:8',
                    ]);

                    if(session('user_details')){
                        
                        $userx = session('user_details');
                        $user =SchoolRegistration::where('mobileno',$userx)->first();
                        session()->forget('user_details');
                    }else{                        
                        $user = Auth::guard('school')->user();
                    }


                    if (Hash::check($request->password, $user->password)) {
                        return redirect()->back()->with('error', 'New password cannot be the same as the old password.');
                    }
                
                  
                   
                    $user->password = Hash::make($request->password);
                    if(!session('user_details')){
                        $user->fist_chanege_pass = true;
                    }
                    $user->save();
                    $head = Headofschool::where('registration_id',$user->id)->first();
                    $subject="Spark Olympiads - Account Password Changed";
                    $data=[];
                    if (filter_var($user->mobileno, FILTER_VALIDATE_EMAIL)) {
                        Mail::send('email_template.password_change_successfully',['data'=>$data],function ($message) use ($user,$subject) {
                            $message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
                            $message->to($user->mobileno);
                            $message->subject($subject);
                        });
                    }else{
                        $mobile ="91".$user->mobileno;
                          $send = password_change_msg($mobile);
                          if(!$send){
                                 return redirect()->back()->with('error', 'Password change successfully! Message send failed!');
                          }
                    }

                    return redirect()->back()->with('success', 'Password updated successfully!');
                }
                catch (\Exception $e) {
                               // return print_r($e->getMessage());
                                return redirect()->back()->with('error', $e->getMessage());
                    }
        }


        public function create(){
            return view('school.changepassword');
        }

        public function password_recovery(){
            return $request;
            $request->validate([
                'recovery_input' => 'required|string',
            ]);
        
            $input = $request->input('recovery_input');
        
            // Check if it's an email or phone
            if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
                $user = User::where('email', $input)->first();
            } else {
                $user = User::where('mobile', $input)->first();
            }
        
            if (!$user) {
                return response()->json(['message' => 'No user found with this information.'], 404);
            }
        
            // Send reset logic (email/SMS)
            // You can use Laravel's password broker or custom method here
            // Example for email:
            Password::sendResetLink(['email' => $user->email]);
        
            return response()->json(['message' => 'Reset link sent.']);
        }


            public function sendOtp(Request $request){

                
                if ($request->mobileno) {
                    $request->validate([
                        'mobileno' => [
                            'required',
                            function ($attribute, $value, $fail) {
                                $isEmail = filter_var($value, FILTER_VALIDATE_EMAIL);
                                $isMobile = preg_match('/^[6-9][0-9]{9}$/', $value);            
                                if (!$isEmail && !$isMobile) {
                                    if (is_numeric($value)) {
                                        if (!preg_match('/^[0-9]{10}$/', $value)) {
                                            $fail('The mobile number must be exactly 10 digits.');
                                        } elseif (!preg_match('/^[6-9]/', $value)) {
                                            $fail('Invalid mobile number.');
                                        } else {
                                            $fail('Invalid email address.');
                                        }
                                    } else {
                                        $fail('Invalid email address.');
                                    }
                                }
                            },
                        ],
                    ]);
                    $type = 1;
                    $validate_details = $request->mobileno;
                                              
                    $check_exist = SchoolRegistration::where('mobileno',$request->mobileno)->first();
                    if($check_exist){

                        Session::put('user_details', $request->mobileno);

                        $otp = rand(100000, 999999);                 
                        $schoolid = $check_exist->id;
                        if (filter_var($check_exist->mobileno, FILTER_VALIDATE_EMAIL)) {
                            $email = $check_exist->mobileno;
                            $data['otp'] = $otp;
                            $subject = 'One-Time Password for Spark Olympiads';
                            try {
                                Mail::send('email_template.otp', $data, function($message) use ($email, $subject) {
                                    $message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
                                    $message->to($email);
                                    $message->subject($subject);
                                });
                            } catch (\Exception $e) {
                                return response()->json([
                                    'status'            => 404,
                                    'error'             => 'Failed to send OTP email.',
                                    'message'           => $e->getMessage()
                                ], 500);
                            }                      
                            $this->save_opt($schoolid,$otp,$validate_details,$type);
              
                        }elseif(preg_match('/^[0-9]{10,15}$/', $check_exist->mobileno)) {
                            $sms = sendOtp($request->mobileno,$otp);
                            if(!$sms){
                                return response()->json(['error' => 'Failed to send OTP on mobile.'], 422);
                            } 
                            $this->save_opt($schoolid,$otp,$validate_details,$type);  
                            return response()->json([
                                'status'            => 200,
                                'validate_details'  => $validate_details,
                                'route'             => route('otp.verify.form'),
                                'message'           => 'OTP sent successfully',
                            ]);
                        }else{
                            return "dd";
                        }
                    }else{ 
                        if (filter_var($request->mobileno, FILTER_VALIDATE_EMAIL)) {
                            return response()->json([
                                'message' => 'No account exists with the provided email.'
                            ], 404); // 404 triggers error callback in AJAX
                        }else{
                            return response()->json([
                                'message' => 'No account exists with the provided mobile number.'
                            ], 404); // 404 triggers error callback in AJAX
                        }
                       
                    }             
                }
                
                // $request->validate([
                //     'recovery_input' => 'required'
                // ]);

                // Send OTP logic here
                // e.g., send SMS or email
                //session(['otp' => '123456']); // Store securely in session
                //return response()->json(['message' => 'OTP sent']);
            }


            public function save_opt($schoolid,$otp,$validate_details,$type){

                // $request->validate([
                //     'registration_id' => 'required|string',
                //     'otp' => 'required|string',
                //     'status' => 'required|string',
                //     'validate' => 'required|boolean',
                // ]);
        
                $registrationOtp = new Otp();
                $registrationOtp->registration_id = $schoolid;
                $registrationOtp->otp             = $otp;
                $registrationOtp->status          =  0;
                $registrationOtp->validate        = 0;
                $registrationOtp->source          = $validate_details;
                $registrationOtp->type            = $type;
                $registrationOtp->save();    
            }


            public function resendOtp(Request $request)
            {
                // Same as sendOtp
                session(['otp' => '654321']);
                return response()->json(['message' => 'OTP resent']);
            }

            // public function verifyOtp(Request $request)
            // {
            //     return $request;
            //     $request->validate([
            //         'otp' => 'required'
            //     ]);

            //     if ($request->otp === session('otp')) {
            //         session()->forget('otp');
            //         return response()->json(['message' => 'OTP verified']);
            //     }

            //     return response()->json(['message' => 'Invalid OTP'], 400);
            // }


            public function verifyOtp(Request $request)
            {         
                    $validated = $request->validate([
                        'recovery_input' => 'required|string',
                        'otp' => 'required|integer',
                    ]);

                    $otp = Otp::where('source', $request->recovery_input)
                    ->where('otp', $request->otp)
                    ->where('validate', 0)
                    ->first(); 
                    if ($otp) {
                        $otp->validate = 1;
                        $otp->save();
                        return response()->json(['success' => true,'message' => 'OTP Verified Successfully']);                
                    }
                    return response()->json(['success' => false, 'message' => 'Invalid OTP.'], 422);
            }
        

}
