<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolRegistration;
use App\Models\Otp;
use App\Models\District;
use App\Models\City;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use DB;

class RegistrationController extends Controller
{
    public function store(Request $request){
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

            if (filter_var($validate_details, FILTER_VALIDATE_EMAIL)) {
                $alerts = 'email';
            }else{
                $alerts = 'mobile number';
            }
            $exists = DB::table('generate_url as a')
                ->join('send_otp as b', 'a.registration_id', '=', 'b.registration_id')
                ->where('b.source', $request->mobileno)
                ->exists();
            if ($exists) {
                return response()->json([
                    'status'            => 404,
                    'error'             => 'This '.$alerts.' is already registered. Please login instead.',
                    'message'           => 'This '.$alerts.' is already registered. Please login instead.',
                ]);
            }
            $check_exist = SchoolRegistration::where('mobileno',$request->mobileno)->first();
            if($check_exist){
                $otp = rand(100000, 999999);                 
                $schoolid = $check_exist->id;
                if (filter_var($check_exist->mobileno, FILTER_VALIDATE_EMAIL)) {
                    $email = $check_exist->mobileno;
                    $data['otp'] = $otp;
                    $subject = 'One-Time Password for Spark Olympiads';
                    try {
                        Mail::send('email_template.otp', $data, function($message) use ($email, $subject) {
                            $message->from(env('MAIL_FROM_ADDRESS'));
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
                    return response()->json([
                        'status'            => 200,
                        'validate_details'  => $validate_details,
                        'route'             => route('otp.verify.form'),
                        'message'           => 'OTP sent successfully',
                    ]);
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
                $sc = SchoolRegistration::create([
                    'mobileno' => $request->mobileno,        
                    'type'=>$type,
                ]);
                if($sc){ 
                    $schoolid = $sc->id;
                    $otp = rand(100000, 999999);
                    if (filter_var($request->mobileno, FILTER_VALIDATE_EMAIL)) {
                        $email = $request->mobileno;
                        $data['otp'] = $otp;
                        $subject = 'One-Time Password for Spark Olympiads';
                        try {
                            Mail::send('email_template.otp', $data, function($message) use ($email, $subject) {
                                $message->from(env('MAIL_FROM_ADDRESS'));
                                $message->to($email);
                                $message->subject($subject);
                            });
                        } catch (\Exception $e) {
                            return response()->json([
                                'status'            => 404,
                                'error' => 'Failed to send OTP email.',
                                'message' => $e->getMessage()
                            ], 500);
                        }                      
                        $this->save_opt($schoolid,$otp,$validate_details,$type);                  
                        return response()->json([
                            'status'            => 200,
                            'validate_details'  => $validate_details,
                            'route'             => route('otp.verify.form'),
                            'message'           => 'OTP sent successfully',
                        ]);
                    }elseif(preg_match('/^[0-9]{10,15}$/', $request->mobileno)) {
                        
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
                        
                        // return redirect()->route('otp.verify.form')->with([
                        //     'validate_details' => $validate_details,
                        //     'success' => 'OTP sent successfully.'
                        // ]);    
                    } 
                }else{
                    return response()->json([
                        'status'            => 404,
                        'validate_details'  => '',
                        'route'             => route('school.create'),
                        'message'           => 'Something went wrong',
                    ]);
                }
            }                  
        }
    }

    public function shoot_otp($type){
        if ($$type==2) {
            Mail::raw("Your OTP is: $otp", function ($message) use ($request) {
                $message->to($request->rmail)->subject('Your OTP');
            });
        }else{
            //$rr="";
        }
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
}
