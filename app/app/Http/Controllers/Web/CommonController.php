<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Board;
use App\Models\State;
use App\Models\District;
use App\Models\Otp;
use App\Models\City;
use App\Models\Designation;
use App\Models\Title;
use App\Models\SchoolDetails;
use App\Models\Headofschool;
use App\Models\SparkCordinator;
use App\Models\Schoolenrolment;
use App\Models\LabsDetails;
use App\Models\Subject;
use App\Models\Student;
use App\Models\FeeDiscount;
use App\Models\Map_Subject;
use App\Models\Genrateurl;
use App\Models\GenrateLink;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\ExamShedule;
use DB;
 

class CommonController extends Controller
{
    public function index1(){
        return view('web.home');
    }
    public function index2(){
        return view('web.index2');
    }
    public function index3(){
        $boards = Board::get();
        $states = State::get();
        $schoolid = Session::get('schoolid');
        $school = SchoolDetails::where('registration_id',$schoolid)->first();
        $city = [];
        if(!empty($school)){
            $city = District::where('districtid',$school->district_id)->get();
        }
        return view('web.index3',compact('states','boards','school','city'));
    }
    public function index4(){
        $designation = Designation::orderBy('designation','ASC')->where('type',0)->get();
        $title = Title::get();
        $schoolid = Session::get('schoolid');
        $head_of_school = Headofschool::where('registration_id',$schoolid)->first();
        return view('web.index4',compact('designation','title','head_of_school'));
    }
    public function index5(){
        $designation = Designation::orderBy('designation','ASC')->where('type',1)->get();
        $title = Title::get();
        $schoolid = Session::get('schoolid');
        $spark_cordinator = SparkCordinator::where('registration_id',$schoolid)->first();
        return view('web.index5',compact('designation','title','spark_cordinator'));
    }
    
    public function index6(){
        $schoolid = Session::get('schoolid');
        $school_enrolment = Schoolenrolment::where('registration_id',$schoolid)->first();
        $lab_details = LabsDetails::where('registration_id',$schoolid)->get();

        return view('web.index6',compact('school_enrolment','lab_details'));
    }
    public function index7(){
        return view('web.index7');
    }
    public function getDistricts($state_id)
    {
        $districts = District::where('state_id', $state_id)->get();
        return response()->json($districts);
    }
    
    public function getCities($district_id)
    {
        $cities = City::where('districtid', $district_id)->get();
        return response()->json($cities);
    }
    public function thankyou(Request $request){
        $schoolid = $request->registration_id;
        
        return view('web.thankyou', [
            'schoolUrl' => 'https://schoolportal.example.com',
            'schoolId' => 'SCH123456',
            'tempPassword' => 'Temp@1234'
        ]);
    }


    public function sendOtpMobile(Request $request){

   
        $otp = rand(100000, 999999);
        $name="";
        $schoolid = Session::get('schoolid');
        if($request->page=='head-of-school-info'){
            $check_mobile = Headofschool::where('mobile',$request->mobile)->where('is_mobile_validate',1)->first();
            if($check_mobile){
                return response()->json(['status' => 'exist', 'message' => 'Entered mobile no. is already registered.']);
            }
            $head = Headofschool::where('registration_id',$schoolid)->first();
            if(!empty($head)){
                $head->mobile           = $request->mobile;
                $head->mobile_otp       = $otp;
                $head->save();
            }else{
                $head = new Headofschool();
                $head->registration_id  = $schoolid;
                $head->mobile       = $request->mobile;
                $head->mobile_otp   = $otp;
                $head->save();
            }

        }else if($request->page=='spark-cordinator'){
            $head = SparkCordinator::where('registration_id',$schoolid)->first();
            if(!empty($head)){
                $head->mobile           = $request->mobile;
                $head->mobile_otp       = $otp;
                $head->save();
            }else{
                $head = new SparkCordinator();
                $head->registration_id  = $schoolid;
                $head->mobile       = $request->mobile;
                $head->mobile_otp   = $otp;
                $head->save();
            }
        }else if($request->page=='student-form'){
            $head = Student::where('id',$request->school_id)->first();
            if(!empty($head)){
                $head->mobile           = $request->mobile;
                $head->mobile_otp       = $otp;
                $head->save();
            }
            $name = $head->name ?? 'Student'; 
        }
        $sms = sendOtp($request->mobile,$otp,$name);

        if(!$sms){
            return response()->json(['error' => 'Failed to send OTP on mobile.'], 422);
        }
        return response()->json(['status' => 'ok', 'otp' => 'Sent']);
    }
    public function verifyOtpMobile(Request $request)
    {
        $request->validate([
            'mobile' => 'required|digits:10',
            'otp'    => 'required|digits:6',
        ]);
        $schoolid = Session::get('schoolid');

        if($request->page=='head-of-school-info'){
            $head = Headofschool::where('registration_id', $schoolid)
            ->where('mobile', $request->mobile)
            ->first();
        }else if($request->page=='spark-cordinator'){
            $head = SparkCordinator::where('registration_id', $schoolid)
            ->where('mobile', $request->mobile)
            ->first();
        }else if($request->page=='student-form'){
            $head = Student::where('id',$request->school_id)
            ->where('mobile', $request->mobile)
            ->first();
        }
        if ($head && $head->mobile_otp == $request->otp) {
            $head->is_mobile_validate = 1;
            $head->save();
            return response()->json([
                'status'  => 'ok',
                'message' => 'OTP verified successfully.'
            ]);
        }
        return response()->json([
            'status'  => 'fail',
            'message' => 'Invalid OTP or mobile number.'
        ], 422);
    }
    public function sendOtpEmail(Request $request)
    {
        $otp = rand(100000, 999999);
        $name="";
        $schoolid = Session::get('schoolid');
        if($request->page=='head-of-school-info'){
            $head = Headofschool::where('registration_id',$schoolid)->first();
            $check_email = Headofschool::where('email',$request->email)->where('is_validate',1)->first();
            if($check_email){ 
                return response()->json(['status' => 'exist', 'message' => 'Entered email id. is already registered.']);
            }
            if(!empty($head)){
                $head->email            = $request->email;
                $head->email_otp        = $otp;
                $head->save();
            }else{
                $head = new Headofschool();
                $head->registration_id  = $schoolid;
                $head->email            = $request->email;
                $head->email_otp        = $otp;
                $head->save();
            }
        }else if($request->page=='spark-cordinator'){
            $head = SparkCordinator::where('registration_id',$schoolid)->first();
            if(!empty($head)){
                $head->email            = $request->email;
                $head->email_otp        = $otp;
                $head->save();
            }else{
                $head = new SparkCordinator();
                $head->registration_id  = $schoolid;
                $head->email            = $request->email;
                $head->email_otp        = $otp;
                $head->save();
            }
        }else if($request->page=='student-form'){
            $head = Student::where('id',$request->school_id)->first();
            $name = $head->name ?? 'Student';
            if(!empty($head)){
                $head->email           = $request->email;
                $head->email_otp       = $otp;
                $head->save();
            }
        }
        try {
            $data = ['otp' => $otp,'name'=>$name];
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
    public function verifyOtpEmail(Request $request)
    {
        $schoolid = Session::get('schoolid');

        if($request->page=='head-of-school-info'){
            $head = Headofschool::where('registration_id', $schoolid)
            ->where('email', $request->email)
            ->where('email_otp', $request->otp)
            ->first();
        }else if($request->page=='spark-cordinator'){
            $head = SparkCordinator::where('registration_id', $schoolid)
            ->where('email', $request->email)
            ->where('email_otp', $request->otp)
            ->first();
        }else if($request->page=='student-form'){
            $head = Student::where('id',$request->school_id)
            ->where('email',$request->email)
            ->where('email_otp', $request->otp)
            ->first();
        }
        if ($head) {
            $head->is_validate = 1;
            $head->save();
            return response()->json(['status' => 'ok']);
        }
        return response()->json(['status' => 'error']);
    }
    public function Getsubject($state_id)
    {
          //$subjects = Subject::whereRaw("FIND_IN_SET(?, class_id)", [$state_id])->get();
        //    $subjects = Map_Subject::whereRaw("FIND_IN_SET(?, map_subject.class_id)", [$state_id])
        //   ->join('subject', 'map_subject.subject_id', '=', 'subject.id')
        //   ->select('subject.name as name','subject.id') // adjust columns as needed
        //   ->get();
      

          $query = Map_Subject::query()
          ->join('subject', 'map_subject.subject_id', '=', 'subject.id')
          ->select('subject.name as name', 'subject.id'); 
          if ($state_id !== "all") {
              $query->whereRaw("FIND_IN_SET(?, map_subject.class_id)", [$state_id]);
          } 
         $subjects = $query->get();

         return response()->json($subjects);
 
    }
    public function resend(Request $request)
    {
        $request->validate([
            'validate_details' => 'required'
        ]);
        $value = $request->validate_details;
        if (preg_match('/^[0-9]{10}$/', $value)) {
            $type = 'mobile';
        } elseif (filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $type = 'email';
        } else {
            return response()->json(['error' => 'Invalid mobile or email.'], 422);
        }
        $otp = rand(100000, 999999);
        if($type=='mobile'){
            $sms = sendOtp($value,$otp);
            if(!$sms){
                return response()->json(['error' => 'Failed to send OTP on mobile.'], 422);
            }
        }else{
            try {
                $data = ['otp' => $otp];
                $subject = "One-Time Password for Spark Olympiads";
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
        }
        $existing = Otp::where('source', $value)->latest()->first();

        if ($existing) {
            $existing->otp = $otp;
            $existing->status = 0;
            $existing->validate = 0;
            $existing->save();
        } else {
            $newOtp = new Otp();
            $newOtp->registration_id = 0; // or use actual ID if known
            $newOtp->otp             = $otp;
            $newOtp->status          = 0;
            $newOtp->validate        = 0;
            $newOtp->source          = $value;
            $newOtp->type            = $type;
            $newOtp->save();
        }
        // TODO: Send OTP via email or SMS based on $type

        return response()->json(['status'=>200,'message' => 'OTP resent successfully']);
    }
    public function CheckVerifiedData(Request $request){
        $schoolid = Session::get('schoolid');
        if($request->page == 'cordinator'){
            $head_of_school = SparkCordinator::select('is_mobile_validate','is_validate')->where('registration_id', $schoolid)->first();
        }elseif($request->page == 'student'){
            $head_of_school = Student::select('is_mobile_validate','is_validate')->where('id', $request->id)->first();
        }else{
            $head_of_school = Headofschool::select('is_mobile_validate','is_validate')->where('registration_id', $schoolid)->first();
        }
        if(!empty($head_of_school)){
            if($head_of_school->is_mobile_validate==0 && $head_of_school->is_validate==0){
                $title = "Mobile number & email address are not verified";
                $decription = "Do you want to proceed without verifying your mobile number & email address?";
            }elseif($head_of_school->is_validate==0){
                $title = "Email address is not verified";
                $decription = "Do you want to proceed without verifying your email address?";
            }elseif($head_of_school->is_mobile_validate==0){
                $title = "Mobile number is not verified";
                $decription = "Do you want to proceed without verifying your mobile number?";
            }else{
                return response()->json(['status'=>200]);
            }
        }else{
            $title = "Mobile number & email address are not verified";
            $decription = "Do you want to proceed without verifying your mobile number and email address?";
        }

        return response()->json(['status'=>400,'title' => $title,'decription'=>$decription]);
    }
    public function CheckVerifiedAnyOne(Request $request){
        $schoolid = Session::get('schoolid');
        $head_of_school = Student::select('is_mobile_validate','is_validate')->where('id', $request->id)->first();
        if(!empty($head_of_school)){
            if($head_of_school->is_mobile_validate==0 && $head_of_school->is_validate==0){
                $title = "Mobile number & email address are not verified";
                $decription = "To complete the registration you need to verify either your mobile number or email id. Kindly verify any of these.";
            }else{
                return response()->json(['status'=>200]);
            }
        }else{
            
            $title = "Mobile number & email address are not verified";
            $decription = "To complete the registration you need to verify either your mobile number or email id. Kindly verify any of these.";
        }
        return response()->json(['status'=>400,'title' => $title,'decription'=>$decription]);
    }
    public function computer_requirement(){
        return view('school.computer-lab-readiness.index');
    }
    public function computer_requirement1(){
        return view('school.computer-lab-readiness.index2');
    }
    public function getPrice(Request $request)
    {
        $ids = $request->input('ids', []);
        if(empty($ids)) {
            return response()->json(['price' => 0]);
        }
        $subjects = Subject::select('fee')->whereIn('id', $ids)->get();
        $fee = 0;
        foreach($subjects as $subject){
            $fee += $subject->fee;
        }
        $discounts = FeeDiscount::select('discount_option', 'discount_value')
        ->where('from_qty', '>=', $subjects->count())
        ->where('to_qty', '<=', $subjects->count())
        ->where('status', 0)
        ->first();
        if(!empty($discounts)){
            if($discounts->discount_option=='fixed'){
                $fee = $fee - $discounts->discount_value;
            }else{
                $x = ($fee*$discounts->discount_value)/100;
                $fee = $fee - $x;
            }
        }
        return response()->json(['price' => $fee]);
    }
    public function preview(Request $request)
    {
        $schoolid = Session::get('schoolid');

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
        return view('web.preview-table', compact('head_of_school','spark_cordinator','school','school_enrolment','lab_details'))->render();
    }


    public function student_registration(){
          
        $schools = DB::table('school_registration as a')
        ->select('a.id', 'c.school_name', 'a.school_id')
        ->leftJoin('school_details as c', 'a.id', '=', 'c.registration_id')
        ->leftJoin('students as b', 'a.school_id', '=', 'b.school_id')
        ->where('a.school_id', '!=', '')
        ->groupby('a.id')->orderby('school_name','asc')
        ->get();
    
        return view('web.student_reg', compact('schools'));

    }



    public function exam_date_selection(){
        $schoolid = Session::get('schoolid');
        
        $exam_shedule = ExamShedule::where('status',0)->get();
        $links_list = GenrateLink::join('exam_shedule', 'exam_shedule.id', '=', 'genrate_link.date_id')
        ->where('genrate_link.school_id', $schoolid)
        ->where('genrate_link.status', 0)
        ->first();   
        $url = Genrateurl::where('registration_id',$schoolid)->first();
        return view('web.index7', compact('exam_shedule','url','links_list'));

    }


    public function exam_date_selection_save(Request $request)
{
    $validated = $request->validate([
        'link' => 'required|string',
        'id' => 'nullable|integer',
        'registration_id' => 'required|integer',
        'date_id' => 'required|integer',
    ]);

    $message = '';
    $link = GenrateLink::where('school_id', $request->registration_id)
                       ->where('status', 0)
                       ->first();

    if ($link) {
        $link->link = $request->link;
        $link->date_id = $request->date_id;
        $link->save();
        $message = 'Date updated successfully';
    } else {
        $link = new GenrateLink();
        $link->school_id = $request->registration_id;
        $link->date_id = $request->date_id;
        $link->link = $request->link;
        $link->save();
        $message = 'Date created successfully';
    }

    // 👉 Check if it's an AJAX request
    if ($request->ajax()) {
        // Flash the success message to the session manually
        session()->flash('success', $message);

        return response()->json([
            'redirect' => route('school_enroll.create') // 👈 Laravel will use this route
        ]);
    }

    return redirect(route('school_enroll.create'))->with('success', $message);
}


 public function student_login(){
       return view('web.studentlogin');
 }



     public function student_login_one(){
          
        $schools = DB::table('school_registration as a')
        ->select('a.id', 'c.school_name', 'a.school_id')
        ->leftJoin('school_details as c', 'a.id', '=', 'c.registration_id')
        ->leftJoin('students as b', 'a.school_id', '=', 'b.school_id')
        ->where('a.school_id', '!=', '')
        ->groupby('a.id')->orderby('school_name','asc')
        ->get();
    
        return view('web.student_login_step_one', compact('schools'));

    }


    public function send_website_mail(request $request){

         
                  
                    $email = "reachout@sparkolympiads.com";
                    $data['full_name'] = $request->full_name;
                    $data['mobile'] = $request->mobile;
                    $data['email'] = $request->email;
                    $data['city_state'] = $request->city_state;                   
                    $subject = 'New Inquiry Recived';
                    try {
                        Mail::send('email_template.web_mail', ['data'=>$data], function($message) use ($email, $subject) {
                            $message->from(env('MAIL_FROM_ADDRESS'));
                            $message->to($email);
                            $message->subject($subject);
                        });
                    } catch (\Exception $e) {
                        return response()->json([
                            'status'            => 404,
                            'error'             => 'Failed to send email.',
                            'message'           => $e->getMessage()
                        ], 500);
                    } 

    }


}
