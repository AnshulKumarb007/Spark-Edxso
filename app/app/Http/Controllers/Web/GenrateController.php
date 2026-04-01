<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Otp;
use App\Models\Genrateurl;
use App\Models\LabsDetails;
use App\Models\Schoolenrolment;
use App\Models\SchoolRegistration;
use Illuminate\Http\Request;
use App\Models\SchoolDetails;
use App\Models\GenrateLink;
use App\Mail\SchoolRegistrationMail;
use Illuminate\Support\Facades\Mail;

use App\Models\EmailSetting;
use DB;

class GenrateController extends Controller
{
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'registration_id' => 'required|string|max:255',
        ]);
        // $school = SchoolDetails::where('registration_id',$validated['registration_id'])->first();
        $schoold = SchoolDetails::select('id')->where('registration_id',$validated['registration_id'])->first();
        $school = DB::table('school_details as a')
        ->join('state as b', 'a.state_id', '=', 'b.state_id')
        ->select('a.*', 'b.gst_iwise_state_id')
        ->where('a.registration_id', $validated['registration_id'])
        ->first();
        if(empty($school)){
            abort(404,'Page Not Found');
        }
        $school_code = 'SO'.$school->gst_iwise_state_id.date('y').str_pad($schoold->id, 5, '0', STR_PAD_LEFT);

        $validated['school_url'] = url('school-login/'.$school_code);


        $link = GenrateLink::where('school_id', $request->registration_id)
        ->where('status', 0)
        ->first();
         $link->link = $validated['school_url']."/st";         
         $link->save();



        $validated['status'] = 0;        
        $registration = Genrateurl::firstOrCreate(
            ['registration_id' => $validated['registration_id']],
            $validated
        );
        SchoolRegistration::where('id', $validated['registration_id'])
        ->update([
            'password' => '$2y$12$DzUHt4jzTqKtGWmnEqcaaOVQBAHDEhhZo5UWzBll4JioxOCUAphom',
            'school_id' =>  $school_code
        ]);

        $head_of_school = DB::table('head_of_school as a')
        ->join('sp_title as b', 'a.title_id', '=', 'b.id')
        ->join('designation as c', 'a.designation', '=', 'c.id')
        ->select('a.email','a.mobile','a.is_validate','a.is_mobile_validate')
        ->where('a.registration_id', $validated['registration_id'])
        ->first();
        $spark_cordinator = DB::table('spark_coordinator as a')
        ->join('sp_title as b', 'a.title_id', '=', 'b.id')
        ->join('designation as c', 'a.designation', '=', 'c.id')
        ->select('a.email','a.mobile','a.is_validate','a.is_mobile_validate')
        ->where('a.registration_id', $validated['registration_id'])
        ->first();
        $emails = Otp::select('source')->where('registration_id',$validated['registration_id'])->orderBy('id', 'desc')->first();
        try {
            $head_of_school_email_nn=$head_of_school->email;
            $welcome_subject = "Registration Confirmation Mail";
            $wdata = [];
            Mail::send('email_template.welcomemail',$wdata,function($message) use ($head_of_school_email_nn, $welcome_subject) {
                $message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
                $message->to($head_of_school_email_nn);
                $message->subject($welcome_subject);
            });
        } catch (\Exception $e) {
            return response()->json([
                'status'            => 404,
                'error'             => 'Failed to send OTP email.',
                'message'           => $e->getMessage()
            ], 500);
        }   

 
      
        if ($emails && filter_var($emails->source, FILTER_VALIDATE_EMAIL)) {
            $email = $emails->source ?? 'himanshu@samtechinnovations.com'; 
            if(!empty($head_of_school->email) && !empty($head_of_school->is_validate) && !empty($spark_cordinator->email) && !empty($spark_cordinator->is_validate)){
                $ccEmails = [$head_of_school->email,$spark_cordinator->email];
                Mail::to($email)->cc($ccEmails)->send(new SchoolRegistrationMail(
                    $validated['school_url'],$school_code,'12345678',$link->link
                ));
            }elseif(!empty($head_of_school->email) && !empty($head_of_school->is_validate)){
                $ccEmails = [$head_of_school->email];
                Mail::to($email)->cc($ccEmails)->send(new SchoolRegistrationMail(
                    $validated['school_url'],$school_code,'12345678',$link->link
                ));
            }elseif(!empty($spark_cordinator->email) && !empty($spark_cordinator->is_validate)){
                $ccEmails = [$spark_cordinator->email];
                Mail::to($email)->cc($ccEmails)->send(new SchoolRegistrationMail(
                    $validated['school_url'],$school_code,'12345678',$link->link
                ));
            }else{
                Mail::to($email)->send(new SchoolRegistrationMail(
                    $validated['school_url'],$school_code,'12345678',$link->link
                ));
            }
        }else{
            if(!empty($head_of_school->email) && !empty($head_of_school->is_validate) && !empty($spark_cordinator->email) && !empty($spark_cordinator->is_validate)){
                $ccEmails = [$spark_cordinator->email];
                Mail::to($head_of_school->email)->cc($ccEmails)->send(new SchoolRegistrationMail(
                    $validated['school_url'],$school_code,'12345678',$link->link
                ));
            }elseif(!empty($head_of_school->email) && !empty($head_of_school->is_validate)){
                Mail::to($head_of_school->email)->send(new SchoolRegistrationMail(
                    $validated['school_url'],$school_code,'12345678',$link->link
                ));
            }elseif(!empty($spark_cordinator->email) && !empty($spark_cordinator->is_validate)){
                Mail::to($spark_cordinator->email)->send(new SchoolRegistrationMail(
                    $validated['school_url'],$school_code,'12345678',$link->link
                ));
            }
            $mobile = '91'.$emails->source;
            if(!empty($head_of_school->mobile) && !empty($head_of_school->is_mobile_validate) && !empty($spark_cordinator->mobile) && !empty($spark_cordinator->is_mobile_validate)){
                $three = $mobile.',91'.$head_of_school->mobile.',91'.$spark_cordinator->mobile;
                $sms = sendConratulationSms($three,$school_code,'12345678');
                if(!$sms){
                    return response()->json(['error' => 'Failed to send OTP on mobile.'], 422);
                }
            }elseif(!empty($head_of_school->mobile) && !empty($head_of_school->is_mobile_validate)){
                $headofschool = $mobile.',91'.$head_of_school->mobile;
                $sms = sendConratulationSms($headofschool,$school_code,'12345678');
                if(!$sms){
                    return response()->json(['error' => 'Failed to send OTP on mobile.'], 422);
                }
            }elseif(!empty($spark_cordinator->mobile) && !empty($spark_cordinator->is_mobile_validate)){
                $sparkcordinator = $mobile.',91'.$spark_cordinator->mobile;
                $sms = sendConratulationSms($sparkcordinator,$school_code,'12345678');
                if(!$sms){
                    return response()->json(['error' => 'Failed to send OTP on mobile.'], 422);
                }
            }else{
                $sms = sendConratulationSms($mobile,$school_code,'12345678');
                if(!$sms){
                    return response()->json(['error' => 'Failed to send OTP on mobile.'], 422);
                }
            }
        }
        
        $emails=EmailSetting::select('email')->where('status',0)->get();

        $schoolid=$validated['registration_id'];
        $school = DB::table('school_details as a')
        ->join('district as b', 'a.district_id', '=', 'b.districtid')
        ->join('state as c', 'a.state_id', '=', 'c.state_id')
        ->join('board as d', 'a.board_id', '=', 'd.id')
        ->select('a.id','d.board','b.district_title','a.school_name','c.state_title','a.city_id','a.pin')
        ->where('a.registration_id', $schoolid)
        ->first();
  
  
        $head_of_school = DB::table('head_of_school as a')
        ->join('sp_title as b', 'a.title_id', '=', 'b.id')
        ->join('designation as c', 'a.designation', '=', 'c.id')
        ->select('a.id','b.title','a.first_name','a.last_name','a.second_name','a.email','a.mobile','c.designation','a.is_validate','a.is_mobile_validate')
        ->where('a.registration_id', $schoolid)
        ->first();
  
        $spark_cordinator = DB::table('spark_coordinator as a')
        ->join('sp_title as b', 'a.title_id', '=', 'b.id')
        ->join('designation as c', 'a.designation', '=', 'c.id')
        ->select('a.id','b.title','a.first_name','a.last_name','a.second_name','a.email','a.mobile','c.designation','a.is_validate','a.is_mobile_validate')
        ->where('a.registration_id', $schoolid)
        ->first();
  
        $lab_details = LabsDetails::select('labs_name','computer_qty')->where('registration_id',$schoolid)->orderBy('id','ASC')->get();
        
        $school_enrolment = Schoolenrolment::where('registration_id',$schoolid)->first();
        
        foreach($emails as $em){

            $email = $em->email;
            $data = [
                'school' => $school,
                'head_of_school' => $head_of_school,
                'spark_cordinator' => $spark_cordinator,
                'lab_details' => $lab_details,
                'school_enrolment' => $school_enrolment
            ];
            
            $subject = 'New School ('.$school_code.') Registered with Spark Olympiads ';
            try {
                Mail::send('email_template.preview-table', $data, function($message) use ($email, $subject) {
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

        }

        
        return view('web.thankyou', [
            'schoolUrl' => $validated['school_url'],
            'schoolId' =>  $school_code,
            'tempPassword' => '12345678',
            'student_url' =>$link->link
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show(Genrateurl $genrateurl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genrateurl $genrateurl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genrateurl $genrateurl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genrateurl $genrateurl)
    {
        //
    }
}
