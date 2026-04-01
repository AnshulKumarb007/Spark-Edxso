<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Otp;
use App\Models\SchoolRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Headofschool;
use App\Models\Leads;
use Illuminate\Support\Facades\Mail;
class OtpVerifyController extends Controller
{
    private static $apitoken = '8bygbC9P2JDeAId';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function verifyOtp(Request $request){

       
        if (!is_null($request->mobileno)) {          
            $request->validate([
                'otp' => 'required|numeric',
            ]);
            $request->session()->forget('schoolid');
            
              $school = Otp::where('source',$request->mobileno)
            ->where('otp',$request->otp)
            ->where('status',0)->where('validate',0)->first();
            if(!$school){
                return response()->json(['status'=>404,'otp'=>'verify','message' => 'Invalid OTP. Try again.']);           
            }

         
             

            if ($request->otp == $school->otp) {
                $schoolid = Otp::where('source',$request->mobileno)->where('status',0)->where('validate',0)->update([
                    'status' => 1,
                    'validate' => 1
                ]);

                   Session::put('schoolid', $school->registration_id);
                  


                if(!empty($request->model_name)){
                    $lead = new Leads();
                    $lead->name =   $request->model_name;
                    $lead->source = $request->mobileno;
                    $lead->save();

                    $meeting_id = 'Spark Olympiads Meeting At ' . date('d M Y') . ' ID ' . rand(100000, 999999);

                    $postData = [
                        "duration"      => "30",
                        "logout_url"    => "https://sansoftwares.com",
                        "banner_text"   => "Live Meeting 20",
                        "welcome_text"  => $meeting_id,
                        "logo_url"      => "https://sanmeet.sansoftwares.com/img/san_ZIXh3OvN3c_20250331162901.png",
                        "auto_start"    => "yes",
                        "enable_share_screen" => 1,
                        "enable_webcam" => 1,
                        "enable_mic"    => 1,
                        "record"        => 1
                    ];
                    $url = 'https://sanmeet.sansoftwares.com/api/create_meeting';
                    $response = self::curlfun($url,$postData);
            
                    $decodedResponse = json_decode($response, true);  
                    if (!empty($decodedResponse['code'])) {
                        if ($decodedResponse['code'] == 200) {  
                            if(!empty($decodedResponse['data'])){
                                $meetingurl = 'https://sanmeet.sansoftwares.com/api/join_meeting';
                                $meetingData['user_id']    = "34534535";
                                $meetingData['user_name']  = $request->model_name;
                                $meetingData['user_role']  = "VIEWER";
                                $meetingData['logout_url'] = "https://sansoftwares.com";
                                $meetingData['meeting_id'] = $decodedResponse['data']['meeting_id'];
                                $meeting_response = self::curlfun($meetingurl,$meetingData);
                                $decodedMeetingResponse = json_decode($meeting_response, true);
                                if(!empty($decodedMeetingResponse)){
                                    if ($decodedMeetingResponse['code'] == 200 && $decodedMeetingResponse['success']) {
 
                                     //   return response()->json(['status'=>200,'message'=>$decodedMeetingResponse['message'],'data'=>$decodedMeetingResponse['data']]);
                                     //Session::put('schoolid', $school->registration_id);    
                                     return response()->json([
                                        'status' => 200,
                                        'otp' => 'verify',
                                        'message' => 'OTP Verified!',
                                        'meeting_url' => $decodedMeetingResponse['data'] ?? null, 
                                        'route' => route('school.create') . '?video_url=' . $decodedMeetingResponse['data'].'&video_id='.$school->registration_id,
                                    ]);
                                    

                                    }else{
                                        return response()->json(['status'=>404,'message'=>$decodedMeetingResponse['message']]);
                                    }
                                }else{
                                    return response()->json(['status'=>404,'message'=>'Oops! Something went wrong.']);
                                }
                            }else{
                                return response()->json(['status'=>404,'message'=>$decodedResponse['message']]);
                            }
                        }
                    } else {
                        return response()->json(['status'=>404,'message'=>'Oops! Something went wrong.']);
                    }
                }else{ 
                    return response()->json(['status'=>200,'otp'=>'verify','message' => 'OTP Verified!','route'=>route('school.create')]);
                }

                
            }
            return response()->json(['status'=>404,'otp'=>'verify','message' => 'Invalid OTP. Try again']);
        }else{

            return response()->json(['status'=>404,'otp'=>'verify','message' => 'Verification failed please start again']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Otp $otp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Otp $otp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Otp $otp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Otp $otp)
    {
        //
    }

    public function send_from_dashboard(Request $request){
      
        try {
           
             $user   = Auth::guard('school')->user();
            // $Headofschool = Headofschool::where('registration_id',$user->id)->first();
            if($request->type=="google"){ 
                $this->sendOtpEmail($user->id);
            }else{                 
                  $head = Headofschool::where('registration_id',$user->id)->first();
                return  $this->sendOtpMobile($user->id,$head->mobile);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['mail' => 'Mail sending failed: ' . $e->getMessage()]);
        }  
    }

    public function verify_otp_from_dashboard(Request $request){
     
        try {
           
             $user = Auth::guard('school')->user(); 
             $Headofschool = Headofschool::where('registration_id',$user->id)->first();
            if($request->type=="google"){                 
                return  $this->verifyOtpEmail($user->id,$request->otp,$Headofschool->email);
            }else{
                return  $this->verifyOtpMobile($user->id,$request->otp,$Headofschool->mobile);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['mail' => 'Mail sending failed: ' . $e->getMessage()]);
        }  
    }

    public function sendOtpEmail($schoolid)
    {
        $otp = rand(100000, 999999);
        //$schoolid = Session::get('schoolid');
        
            $head = Headofschool::where('registration_id',$schoolid)->first();
            if(!empty($head)){
                $head->email            = $head->email;
                $head->email_otp        = $otp;
                $head->save();
            }else{
                $head = new Headofschool();
                $head->registration_id  = $schoolid;
                $head->email            = $head->email;
                $head->email_otp        = $otp;
                $head->save();
            }
       
        try {
            $data = ['otp' => $otp];
            $subject = "One-Time Password for Spark Olympiads";
            $value = $head->email;
            Mail::send('email_template.otp', $data, function ($message) use ($value, $subject) {
                $message->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME', 'NoReply'));
                $message->to($value);
                $message->subject($subject);
            });
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to send OTP email.',
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json(['status' => 'ok', 'otp' => 'Sent']);
    }


    public function sendOtpMobile($schoolid,$mobile){

          $otp = rand(100000, 999999);
          $sms = sendOtp($mobile,$otp);
          
            if(!$sms){
                return response()->json(['error' => 'Failed to send OTP on mobile.'], 422);
            }                
            $head = Headofschool::where('registration_id',$schoolid)->first();
            if(!empty($head)){
                $head->mobile           = $mobile;
                $head->mobile_otp       = $otp;
                $head->save();
            }else{
                $head = new Headofschool();
                $head->registration_id  = $schoolid;
                $head->mobile       = $mobile;
                $head->mobile_otp   = $otp;
                $head->save();
            }
        
        return response()->json(['status' => 'ok', 'otp' => 'Sent']);
    }




    public function verifyOtpEmail($schoolid,$otp,$email)
    {         
                 
            $head = Headofschool::where('registration_id', $schoolid)
            ->where('email', $email)
            ->where('email_otp', $otp)
            ->first(); 
            if ($head) {
                $head->is_validate = 1;
                $head->save();
                return response()->json(['success' => true,'message' => 'OTP Verified Successfully']);
                
            }
            return response()->json(['success' => false, 'message' => 'Invalid OTP.'], 422);
    }

    public function verifyOtpMobile($schoolid,$otp,$mobile)
    {

            
           $head = Headofschool::where('registration_id', $schoolid)
            ->where('mobile', $mobile)
            ->first();
        if ($head && $head->mobile_otp == $otp) {
            $head->is_mobile_validate = 1;
            $head->save();
            return response()->json([
                'success' => true,
                'message' => 'OTP Verified Successfully.'
            ]);
        }else{
            return response()->json([
                'status'  => 'fail',
                'message' => 'Invalid OTP or mobile number.'
            ], 422);
        }
             
    }
      

    //for one step registration


    public static function one_step_index($name)
    {
        
      
    }






    public static function curlfun($url,$postData){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($postData),
            CURLOPT_HTTPHEADER => array(
                'api_token: '.self::$apitoken,
                'Content-Type: application/json',
                'Cookie: connect.sid=s%3ANMdOmkmUka3ohdYbf8fSRGouw_jNDZ4O.btWWuvzvJlgrRvNtFzD%2BST9LIvJGDuLXwgzS7H%2F9xZY'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }









}
