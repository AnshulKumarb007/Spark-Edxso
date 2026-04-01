<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolRegistration;
use App\Models\Headofschool;
use App\Models\Schoolenrolment;
use App\Models\SchoolDetails;
use App\Models\SparkCordinator;
use App\Models\Genrateurl;
use App\Models\GenrateLink;
use App\Models\Board;
use App\Models\State;
use App\Models\District;
use App\Models\City;
use App\Models\Designation;
use App\Models\Title; 
use App\Models\LabsDetails;
use Illuminate\Support\Facades\DB;
use App\Models\SchoolBank;
use App\Models\FeeDiscount;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Models\Clases;
use App\Models\Subject;
use App\Models\Student;
use Illuminate\Support\Facades\Mail; // for email
use Illuminate\Support\Facades\Auth;
use App\Models\ExamShedule;
use Illuminate\Support\Facades\Hash;
use App\Models\Invoice;
use App\Models\User;
use App\Models\SystemCheck;
class ManageSchoolController extends Controller
{

    public function index(Request $request){ 

       
        $date = $request->input('date');
        $dates = !empty($date) ? explode(',', $date) : [];

        $data = DB::table('school_registration as a')
        ->leftJoin('school_details as b', 'a.id', '=', 'b.registration_id')
        ->leftJoin('head_of_school as c', 'a.id', '=', 'c.registration_id')
        ->leftJoin('spark_coordinator as d', 'a.id', '=', 'd.registration_id')
        ->leftJoin('enrollment_details as e', 'a.id', '=', 'e.registration_id')
        ->leftJoin('generate_url as f', 'a.id', '=', 'f.registration_id')
        ->select(
            'a.id',
            'a.updated_at',
            'a.gmail as email',
            'a.mobileno',
            'b.registration_id as bregistration_id',
            'c.registration_id as cregistration_id',
            'd.registration_id as dregistration_id',
            'e.registration_id as eregistration_id',
            'f.registration_id as fregistration_id'
        )
       ->when(!empty($dates), function ($query) use ($dates) {
           return $query->whereIn(DB::raw('DATE(a.updated_at)'), $dates);
        });
    
    if ($request->filled('school_name_or_code')) {
        $keyword = $request->input('school_name_or_code');
    
        $data = $data->where(function ($query) use ($keyword) {
            $query->where('b.school_name', 'like', "%$keyword%")
                  ->orWhere('a.school_id', 'like', "%$keyword%")
                  ->orWhere('a.mobileno', 'like', "%$keyword%");
        });
    }
    
     $data = $data->orderBy('a.id', 'DESC')
                 ->groupBy('a.id')
                 ->paginate(10)
                 ->appends(['date' => $date]);
    
        return view('admin.manage_school.view', compact('data', 'date'));
        
    }

    public function view($id){
       try {
             
        $user   = SchoolRegistration::where('id',$id)->first();
        $boards = Board::get();
        $states = State::get();        
        $title  = Title::get();
        $designation = Designation::orderBy('designation','ASC')->get();
        $sd = SchoolDetails::where('registration_id',$id)->first();        
        $sp = SparkCordinator::where('registration_id',$id)->first();        
        $hs = Headofschool::where('registration_id',$id)->first();          
        $se = Schoolenrolment::where('registration_id',$id)->first();        
        $ld = LabsDetails::where('registration_id',$id)->get();
        $count = LabsDetails::where('registration_id',$id)->count();            
        $district = District::where('state_id',$sd->state_id)->get();  

        // return view('admin.manage_school.views',compact('data'));
        return view('admin.profile',compact('states','boards','sd','sp','hs','district','title','designation','se','ld','user','count'));
        } catch (\Exception $e) {
                //$e->getMessage()
            return redirect()->back()->with('error','Details are not available.');
        }
    }
    public function deleteProfile($id){
        LabsDetails::where('id',$id)->delete();
        return redirect()->back()->with('success','Lab deleted successfully');
    }
    public function saveLabs(Request $request)
    {
        $registrationId = $request->input('registration_id_from_admin');
        $labsNames = $request->input('labs_name', []);
        $computerQtys = $request->input('computer_qty', []);

        $existingLabs = LabsDetails::where('registration_id', $registrationId)->get();
        $existingMap = $existingLabs->pluck('id', 'labs_name')->toArray(); // [labName => id]
        $savedIds = [];

        foreach ($labsNames as $index => $labName) {
            $qty = $computerQtys[$index] ?? 0;

            if (isset($existingMap[$labName])) {
                $lab = LabsDetails::find($existingMap[$labName]);
                $lab->computer_qty = $qty;
                $lab->save();
                $savedIds[] = $lab->id;
            } else {
                $new = LabsDetails::create([
                    'registration_id' => $registrationId,
                    'labs_name' => $labName,
                    'computer_qty' => $qty,
                ]);
                $savedIds[] = $new->id;
            }
        }
        LabsDetails::where('registration_id', $registrationId)
            ->whereNotIn('id', $savedIds)
            ->delete();

        return back()->with('success', 'Lab details saved and updated successfully!');
    }
    
 

    public function preview($id){

      $schoolid=$id;
      $school = DB::table('school_details as a')
      ->join('district as b', 'a.district_id', '=', 'b.districtid')
      ->join('state as c', 'a.state_id', '=', 'c.state_id')
      ->join('board as d', 'a.board_id', '=', 'd.id')
      ->select('a.id','d.board','b.district_title','a.school_name','c.state_title','a.city_id','a.pin','a.registration_id')
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

       $scr = SchoolRegistration::where('id',$schoolid)->first();

       $student_data = DB::table('school_registration as a')->select('b.school_id')
        ->Join('students as b', 'a.school_id', '=', 'b.school_id')
        ->Join('class', 'class.id', '=', 'b.class')->where('a.school_id',$scr->school_id)->first();      

        $student_count = DB::table('school_registration as a')
        ->join('students as b', 'a.school_id', '=', 'b.school_id')
        ->join('class', 'class.id', '=', 'b.class')
        ->where('a.school_id', $scr->school_id)
        ->count();
    $lab_details = LabsDetails::select('labs_name','computer_qty')->where('registration_id',$schoolid)->orderBy('id','ASC')->get();
    $school_enrolment = Schoolenrolment::where('registration_id',$schoolid)->first();

    $genete_link = GenrateLink::where('school_id',$schoolid)->first();    
    $invoice = DB::table('invoices')->where('school_id',$schoolid)->first();    

    return view('admin.manage_school.preview-table', compact('head_of_school','spark_cordinator','school','school_enrolment','lab_details','student_count','genete_link','invoice','student_data','scr'))->render();
  }

  public function index2(Request $request){ 
    try {

         $exam_shedule = ExamShedule::get();  
         $lab_count_subquery = DB::table('labs_details')
            ->select('registration_id', DB::raw('SUM(computer_qty) as total_computers'))
            ->groupBy('registration_id');

            $student_count_subquery = DB::table('students')
            ->join('class as c', 'students.class', '=', 'c.id')
            ->join('subject', function ($join) {
                $join->on(DB::raw('FIND_IN_SET(subject.id, students.subject_id)'), '>', DB::raw('0'));
            })
            ->select('students.school_id', DB::raw('COUNT(DISTINCT students.id) as total_students'))
            ->groupBy('students.school_id');
        


        $data = DB::table('school_registration as a')
            ->leftjoin('genrate_link as gl', 'a.id', '=', 'gl.school_id')
            ->join('school_details as b', 'a.id', '=', 'b.registration_id')
            ->join('head_of_school as c', 'a.id', '=', 'c.registration_id')
            ->join('spark_coordinator as d', 'a.id', '=', 'd.registration_id')
            ->join('enrollment_details as e', 'a.id', '=', 'e.registration_id')
            ->leftJoin('generate_url as f', 'a.id', '=', 'f.registration_id')
            ->join('board as g', 'b.board_id', '=', 'g.id')
            ->leftJoin('sp_title as h', 'c.title_id', '=', 'h.id')
            ->leftJoin('designation as i', 'c.designation', '=', 'i.id')
            ->leftJoin('sp_title as j', 'd.title_id', '=', 'j.id')
            ->leftJoin('designation as k', 'd.designation', '=', 'k.id')
            ->join('district as l', 'b.district_id', '=', 'l.districtid')
            ->join('state as m', 'b.state_id', '=', 'm.state_id')
            ->leftJoinSub($lab_count_subquery, 'lab_counts', function ($join) {
                $join->on('a.id', '=', 'lab_counts.registration_id');
            })
            ->leftJoinSub($student_count_subquery, 'student_counts', function ($join) {
                $join->on('a.school_id', '=', 'student_counts.school_id');
            });

        // ✅ Apply filters
        if ($request->filled('school_name_or_code')) {
            $keyword = $request->input('school_name_or_code');
        
            $data->where(function ($query) use ($keyword) {
                    $query->where('b.school_name', 'like', "%$keyword%")
                      ->orWhere('a.school_id', 'like', "%$keyword%")
                       ->orWhere('a.mobileno', 'like', "%$keyword%");
            });
        }

         if ($request->filled('city_pin')) {
            $keyword = $request->input('city_pin');
        
            $data->where(function ($query) use ($keyword) {
                    $query->where('b.city_id', 'like', "%$keyword%")
                      ->orWhere('a.pin', 'like', "%$keyword%");
            });
        }
        
        
        $boards = Board::get();
        $states = State::get(); 
        $city = City::get(); 

        

      if (!empty($request->date)) {
              $dates = explode(',', $request->date); 
            $data = $data->when(!empty($dates), function ($query) use ($dates) {
                return $query->whereIn(DB::raw('DATE(a.created_at)'), $dates);
            });
        }


        if (!empty($request->board_id)){
             $data->where('b.board_id', $request->board_id);
        }

        if($request->school_id !="all"){
            if (!empty($request->school_id)){
                
                if($request->school_id > 0){
                        $data->where('gl.date_id', $request->school_id);
                }
            }
        }

         if (!empty($request->state_id)){
             $data->where('b.state_id', $request->state_id);
        }

         if (!empty($request->district_id)){
             $data->where('b.district_id', $request->district_id);
        }


        $data = $data->select(
                'a.mobileno', 'a.school_id', 'a.id',
                'g.board as board_id', 'school_name',
                'm.state_title as state_id', 'l.district_title as district_id', 'city_id', 'b.pin',
                'h.title as ctitle_id', 'c.first_name as cfirst_name', 'c.last_name as clast_name', 'c.second_name as csecond_name', 'c.email as cemail', 'c.mobile as cmobile',
                'i.designation as cdesignation', 'j.title as dtitle_id', 'd.first_name as dfirst_name', 'd.last_name as dlast_name', 'd.second_name as dsecond_name', 'd.email as demail', 'd.mobile as dmobile', 'k.designation as ddesignation',
                'e.total_enrollment', 'e.class_1_to_8_enroll', 'e.total_com_labs',
                'e.updated_at',
                'lab_counts.total_computers',
                'student_counts.total_students'
            )
            ->orderBy('a.id', 'DESC')
            ->groupBy('a.id')
            ->paginate(30);

        return view('admin.manage_school.full', compact('data','boards','states','city','exam_shedule'));

    } catch (\Exception $e) {
        //return $e->getMessage();
        return redirect()->back()->with('error', 'Details are not available.');
    }
}

public function index3(Request $request)
{
    try {
        $data = DB::table('school_registration as a')
            ->join('school_details as b', 'a.id', '=', 'b.registration_id')
            ->join('invoices as c', 'a.id', '=', 'c.school_id')
            ->leftjoin('school_banks as d', 'a.id', '=', 'd.school_id');

        // ✅ Apply single input filter across invoice no, school name, and school code
        if ($request->filled('search')) {
            $search = $request->input('search');
            $data->where(function ($query) use ($search) {
                $query->where('c.invoiceno', 'like', "%$search%")
                      ->orWhere('b.school_name', 'like', "%$search%")
                      ->orWhere('a.school_id', 'like', "%$search%");
            });
        }

        if ($request->filled('date')) {
            $search = $request->input('date');
            $data->where(function ($query) use ($search) {
                $query->whereDate('c.created_at',$search);                       
            });
        }    
  
         $data = $data->select(
                'a.school_id', 'a.id',
                'school_name',
                'c.invoiceno', 'c.total_amount', 'c.created_at', 'c.total_student', 'd.status','c.id as invoiceid','c.status as invoicestatus'
            )   
            ->orderBy('c.id', 'DESC')
            ->groupBy('c.id')     
            ->paginate(10); 
           return view('admin.manage_school.managepayments', compact('data'));

    } catch (\Exception $e) {
        return redirect()->back()->with('error', "Data not found");
    }
}



//   public function view_invoice($id){ 
//     try {   
         
//       $data = DB::table('school_registration as a')
//       ->Join('invoices as c', 'a.id', '=', 'c.school_id') 
//       ->join('school_details as b', 'a.id', '=', 'b.registration_id')     
//       ->join('district as l', 'b.district_id', '=', 'l.districtid')
//       ->join('state as m', 'b.state_id', '=', 'm.state_id')
//       ->leftJoin('students as s', 's.school_id', '=', 'a.school_id') // Assuming this relationship
//       ->select(
//           'b.*',
//           'c.invoiceno',
//           'l.district_title',
//           'm.state_title',
//           's.full_name',
//           DB::raw('COUNT(s.id) as total_students'),
//           DB::raw('SUM(s.fee) as total_fees')
//       )
//      ->where('registration_id', $id)
//      ->groupBy('b.id', 'l.district_title', 'm.state_title') // Important for aggregate functions
//      ->first();
      
//      return view('school.invoice',compact('data'));
//         } catch (\Exception $e) {
//                     //  return $e->getMessage();
//               return redirect()->back()->with('error',"Data not found");
//         }
//     }

public function view_invoice($id){ 
    try {   
      $invoice = Invoice::where('id',$id)->first();  
      $data = DB::table('school_registration as a')
      ->Join('invoices as c', 'a.id', '=', 'c.school_id') 
      ->join('school_details as b', 'a.id', '=', 'b.registration_id')     
      ->join('district as l', 'b.district_id', '=', 'l.districtid')
      ->join('state as m', 'b.state_id', '=', 'm.state_id')
      ->leftJoin('students as s', 's.school_id', '=', 'a.school_id') // Assuming this relationship
      ->select(
          'b.*',
          'c.invoiceno',
          'l.district_title',
          'm.state_title',
          's.full_name',
          DB::raw('COUNT(s.id) as total_students'),
          DB::raw('SUM(s.fee) as total_fees')
      )
     ->where('registration_id', $invoice->school_id)
     ->groupBy('b.id', 'l.district_title', 'm.state_title') // Important for aggregate functions
     ->first();
      
   
     return view('school.invoice',compact('data','invoice'));
        } catch (\Exception $e) {
                    //  return $e->getMessage();
              return redirect()->back()->with('error',"Data not found");
        }
    }




    public function student(Request $request){

        

        $schools = DB::table('school_registration as a')
        ->select('a.id', 'c.school_name', 'a.school_id')
        ->leftJoin('school_details as c', 'a.id', '=', 'c.registration_id')
        ->leftJoin('students as b', 'a.school_id', '=', 'b.school_id')
        ->where('a.school_id', '!=', '')
        ->groupby('a.id')
        ->get();
     
      $exam_shedule = ExamShedule::get();  
      $subjects = Subject::get();
      $discounts = FeeDiscount::get();
      $perPage = 10;
      $page = $request->input('page', 1);
      $date = $request->input('date');
      $classId = $request->input('class_id');  
      $school_id = $request->input('school_id');
     
      
      $subjectId = $request->input('subject_id');   
      $query = DB::table('students')
          ->select(
              'students.admission_no',
              'students.id',
              'students.full_name',
              'students.middle_name',
              'students.last_name',
              'students.section',
              'class.name as class_name', 
              'students.fee_status as fees_statuss',
              'fees_status.fees as paid_amount',
              'students.verify_status',
              'students.father_name',
              'students.relative_middle_name',
              'students.relative_last_name',
              'students.relation',
              'students.mobile',
              'students.email',
              'students.school_id',
              'subject.fee',
              'students.fee as student_fee',
              'school_details.school_name','subject_id','utr','students.updated_at','razorpay_payment_id','students.status',
          
                DB::raw('GROUP_CONCAT(subject.name ORDER BY subject.name SEPARATOR ", ") as subject_names')
            )
              ->Join('subject', function ($join) {
                  $join->on(DB::raw('FIND_IN_SET(subject.id, students.subject_id)'), '>', DB::raw('0'));
              })
              
              ->Join('class', 'class.id', '=', 'students.class') 
              ->leftJoin('fees_status', 'fees_status.student_id', '=', 'students.id')
              ->Join('school_registration', 'school_registration.school_id', '=', 'students.school_id')
              ->Join('school_details', 'school_details.registration_id', '=', 'school_registration.id')
              ->leftjoin('genrate_link as gl', 'school_registration.id', '=', 'gl.school_id');
  
      // Filters
      if (!empty($date)){
           $query->whereDate('students.created_at', $date);
       }

       if (!empty($classId) && is_array($classId) && !in_array('all', $classId)) {
             $query->whereIn('students.class', $classId);
         }


         if(!empty($request->query('vschool_id'))){
            $get_schoolId = $request->query('vschool_id');
            if($get_schoolId !="all"){ 
                $query->where('gl.date_id',$get_schoolId);
            }
         }  


        if (!empty($school_id)) { 
            if(!in_array('all', $school_id)){  
                $query->whereIn('students.school_id', $school_id);
            }           
        }
      
  
      if (!empty($subjectId) && is_array($subjectId) && !in_array('all', $subjectId)) {
        $query->where(function ($q) use ($subjectId) {
            foreach ($subjectId as $id) {
                $q->orWhereRaw("FIND_IN_SET(?, students.subject_id)", [$id]);
            }
        });
    }
      
      $query->groupBy(
          'students.id',
          'students.admission_no',
          'students.full_name',
          'students.middle_name',
          'students.last_name',
          'students.section',
          'class.name',
          // 'exam_shedule.exam_fee',
          // 'exam_shedule.discount',
          'fees_status.fee_status',
          'fees_status.fees'
      );
       $query->orderby('students.id','desc');
        $students = $query->get();
   
    //   $students = new LengthAwarePaginator(
    //       $allResults->slice(($page - 1) * $perPage, $perPage)->values(),
    //       $allResults->count(),
    //       $perPage,
    //       $page,
    //       ['path' => request()->url(), 'query' => request()->query()]
    //   ); 
      // Load class and subject lists for dropdowns
          $grandTotal = 0;
          $total_student=count($students);   
          $classes=Clases::orderby('name','asc')->get();          
          return view('admin.studenlist', compact('students','total_student','classes','discounts','schools','subjects','exam_shedule'));
   }




   
   public function student_registration_count(Request $request)
   {

    
       // Getting list of schools
       $schools = DB::table('school_registration as a')
           ->select('a.id', 'c.school_name', 'a.school_id')
           ->leftJoin('school_details as c', 'a.id', '=', 'c.registration_id')
           ->leftJoin('students as b', 'a.school_id', '=', 'b.school_id')
           ->where('a.school_id', '!=', '')
           ->groupBy('a.id')
           ->get();
   
       // Other data
       $exam_shedule = ExamShedule::get();
       $subjects = Subject::get();
       $discounts = FeeDiscount::get();
       $perPage = 10;
       $page = $request->input('page', 1);
       $school_id = $request->input('school_id');
     
       // Base query to get the student data
     

    $query = DB::table('students')
    ->select(
        'students.school_id',
        'students.class',
        'class.name as class_name',
        'school_details.school_name',
        'school_registration.school_id as school_code',
        'subject.name as subject_name','students.full_name',
        DB::raw('COUNT(DISTINCT students.id) as student_count'),
        DB::raw('GROUP_CONCAT(subject.name ORDER BY subject.name SEPARATOR ", ") as subject_names')
    )  
    ->join('subject', function ($join) {
        $join->on(DB::raw('FIND_IN_SET(subject.id, students.subject_id)'), '>', DB::raw('0'));
        
    })
    ->join('class', 'class.id', '=', 'students.class')
    ->leftJoin('fees_status', 'fees_status.student_id', '=', 'students.id')
    ->join('school_registration', 'school_registration.school_id', '=', 'students.school_id')
    ->join('school_details', 'school_details.registration_id', '=', 'school_registration.id')
    ->leftJoin('genrate_link as gl', 'school_registration.id', '=', 'gl.school_id')
   
    ->orderBy('students.school_id', 'desc')  // Correct order direction
    ->orderBy('students.class', 'asc')      // Add another field to order if needed
    ->orderBy('subject.name', 'asc')  ;
    
    $query->groupBy(
        'students.school_id',
        'students.class',
        'school_details.school_name',
        'school_registration.school_id',       
        'class.name',   
        'students.admission_no'              
    );
   
       // Filter based on selected school
       if (!empty($school_id)) {
           if (!in_array('all', $school_id)) {
               $query->whereIn('students.school_id', $school_id);
           }
       }
   
       // Filter by school filter if available
       if (!empty($request->query('vschool_id'))) {
           $get_schoolId = $request->query('vschool_id');
           if ($get_schoolId != "all") {
               $query->where('gl.date_id', $get_schoolId);
           }
       }
   
       // Group by school_id, class, and subject
       
       $query->orderBy('students.school_id', 'desc');
       
       // Execute the query and get the results
        $students = $query->get();
       
       // Prepare the results in the desired format (class, subject, student count per subject)
       $formattedResults = [];
       $total_student=0;
       if (!empty($school_id)) {
       
        foreach ($students as $student) {
            // Extract subjects for the current student
            $subjectsArray = explode(', ', $student->subject_names);
            
            if (!isset($formattedResults[$student->school_id])) {
                $formattedResults[$student->school_id] = [
                    'school_name' => $student->school_name,
                    'school_code' => $student->school_id,
                    'classes' => [],
                ];
            }
        
            if (!isset($formattedResults[$student->school_id]['classes'][$student->class])) {
                $formattedResults[$student->school_id]['classes'][$student->class] = [
                    'class_name' => $student->class_name,
                    'subjects' => [],
                ];
            }
        
            // Assign the student count for each subject
            foreach ($subjectsArray as $subject) {
                if (!isset($formattedResults[$student->school_id]['classes'][$student->class]['subjects'][$subject])) {
                    $formattedResults[$student->school_id]['classes'][$student->class]['subjects'][$subject] = 0;
                }
          
                // Increment the student count for the subject
                $formattedResults[$student->school_id]['classes'][$student->class]['subjects'][$subject]++;
            }
        }
        $total_student = count($students);
    }
       // Total student count
     
   
       // Get classes for dropdown or selection
       $classes = Clases::orderby('name', 'asc')->get();
     
       return view('admin.studenregcountlist', compact('formattedResults', 'total_student', 'classes', 'discounts', 'schools', 'subjects', 'exam_shedule'));
   }
   
















   public function student_loginlist(Request $request){

    $schools = DB::table('school_registration as a')
    ->select('a.id', 'c.school_name', 'a.school_id')
    ->leftJoin('school_details as c', 'a.id', '=', 'c.registration_id')
    ->leftJoin('students as b', 'a.school_id', '=', 'b.school_id')
    ->where('a.school_id', '!=', '')
    ->groupby('a.id')
    ->get();
 
  $exam_shedule = ExamShedule::get();  
  $subjects = Subject::get();
  $discounts = FeeDiscount::get();
  $perPage = 10;
  $page = $request->input('page', 1);
  $date = $request->input('date');
  $classId = $request->input('class_id');
  $school_id = $request->input('school_id');
  $subjectId = $request->input('subject_id');   
  $query = DB::table('students')
      ->select(
          'students.admission_no',
          'last_login_at',
          'students.id',
          'students.full_name',
          'students.middle_name',
          'students.last_name',
          'students.section',
          'class.name as class_name', 
          'students.fee_status as fees_statuss',
          'fees_status.fees as paid_amount',
          'students.verify_status',
          'students.father_name',
          'students.relation',
          'students.mobile',
          'students.email',
          'students.school_id',
          'subject.fee',
          'students.fee as student_fee',
          'school_details.school_name','subject_id','utr','students.updated_at','razorpay_payment_id','status',
      
            DB::raw('GROUP_CONCAT(subject.name ORDER BY subject.name SEPARATOR ", ") as subject_names')
        )
          ->Join('subject', function ($join) {
              $join->on(DB::raw('FIND_IN_SET(subject.id, students.subject_id)'), '>', DB::raw('0'));
          })
          
          ->Join('class', 'class.id', '=', 'students.class') 
          ->leftJoin('fees_status', 'fees_status.student_id', '=', 'students.id')
          ->Join('school_registration', 'school_registration.school_id', '=', 'students.school_id')
          ->Join('school_details', 'school_details.registration_id', '=', 'school_registration.id');
        

  // Filters
  if (!empty($date)){
       $query->whereDate('students.created_at', $date);
   }

   if (!empty($classId) && is_array($classId) && !in_array('all', $classId)) {
        $query->whereIn('students.class', $classId);
    }






  if (!empty($school_id)) { 
     if(!in_array('all', $school_id)){  
        $query->where('students.school_id', $school_id);
     }           
  }
  

  if (!empty($subjectId) && is_array($subjectId)) {
    $query->where(function ($q) use ($subjectId) {
        foreach ($subjectId as $id) {
            $q->orWhereRaw("FIND_IN_SET(?, students.subject_id)", [$id]);
        }
    });
}
  
  $query->groupBy(
      'students.id',
      'students.admission_no',
      'students.full_name',
      'students.middle_name',
      'students.last_name',
      'students.section',
      'class.name',
      // 'exam_shedule.exam_fee',
      // 'exam_shedule.discount',
      'fees_status.fee_status',
      'fees_status.fees'
  );
   $query->orderby('students.id','desc');
    $allResults = $query->get();

  $students = new LengthAwarePaginator(
      $allResults->slice(($page - 1) * $perPage, $perPage)->values(),
      $allResults->count(),
      $perPage,
      $page,
      ['path' => request()->url(), 'query' => request()->query()]
  );
  $sr = ($students->currentPage() - 1) * $students->perPage() + 1;
  // Load class and subject lists for dropdowns
      $grandTotal = 0;
      $total_student=count($allResults);   
      $classes=Clases::orderby('name','asc')->get();          
      return view('admin.student_login_list', compact('students', 'sr','total_student','classes','discounts','schools','subjects','exam_shedule'));
}

public function student_transactionlist(Request $request){

    $schools = DB::table('school_registration as a')
    ->select('a.id', 'c.school_name', 'a.school_id')
    ->leftJoin('school_details as c', 'a.id', '=', 'c.registration_id')
    ->leftJoin('students as b', 'a.school_id', '=', 'b.school_id')
    ->where('a.school_id', '!=', '')
    ->groupby('a.id')
    ->get();
 
  $exam_shedule = ExamShedule::get();  
  $subjects = Subject::get();
  $discounts = FeeDiscount::get();
  $perPage = 10;
  $page = $request->input('page', 1);
  $date = $request->input('date');
  $classId = $request->input('class_id');
  $school_id = $request->input('school_id');
  $subjectId = $request->input('subject_id');   
  $query = DB::table('students')
      ->select(
          'students.admission_no',
          'students.id',
          'students.full_name',
          'students.middle_name',
          'students.last_name',
          'students.section',
          'class.name as class_name', 
          'students.fee_status as fees_statuss',           
          'students.verify_status',
          'students.father_name',
          'students.relation',
          'students.mobile',
          'students.email',
          'students.school_id',
          'subject.fee',
          'students.fee as student_fee',
          'school_details.school_name','subject_id','utr','students.updated_at','razorpay_payment_id','status',
      
            DB::raw('GROUP_CONCAT(subject.name ORDER BY subject.name SEPARATOR ", ") as subject_names')
        )
          ->Join('subject', function ($join) {
              $join->on(DB::raw('FIND_IN_SET(subject.id, students.subject_id)'), '>', DB::raw('0'));
          })
          
          ->Join('class', 'class.id', '=', 'students.class') 
         
          ->Join('school_registration', 'school_registration.school_id', '=', 'students.school_id')
          ->Join('school_details', 'school_details.registration_id', '=', 'school_registration.id');
        

    // Filters
    if (!empty($date)){
        $query->whereDate('students.created_at', $date);
    }

    if (!empty($classId) && is_array($classId) && !in_array('all', $classId)) {
            $query->whereIn('students.class', $classId);
        }





    if (!empty($school_id)) { 
        if(!in_array('all', $school_id)){  
            $query->where('students.school_id', $school_id);
        }           
    }
    

    if (!empty($subjectId) && is_array($subjectId) && !in_array('all', $subjectId)) {
        $query->where(function ($q) use ($subjectId) {
            foreach ($subjectId as $id) {
                $q->orWhereRaw("FIND_IN_SET(?, students.subject_id)", [$id]);
            }
        });
    }
  $query->where('students.fee_status',1);
  $query->where('students.verify_status',2);
  $query->groupBy(
      'students.id',
      'students.admission_no',
      'students.full_name',
      'students.middle_name',
      'students.last_name',
      'students.section',
      'class.name',
      // 'exam_shedule.exam_fee',
      // 'exam_shedule.discount',
     // 'fees_status.fee_status',
      //'fees_status.fees'  
  );
   $query->orderby('students.id','desc');
    $allResults = $query->get();

  $students = new LengthAwarePaginator(
      $allResults->slice(($page - 1) * $perPage, $perPage)->values(),
      $allResults->count(),
      $perPage,
      $page,
      ['path' => request()->url(), 'query' => request()->query()]
  );
  $sr = ($students->currentPage() - 1) * $students->perPage() + 1;
  // Load class and subject lists for dropdowns
      $grandTotal = 0;
      $total_student=count($allResults);   
      $classes=Clases::orderby('name','asc')->get();          
      return view('admin.student_transaction', compact('students', 'sr','total_student','classes','discounts','schools','subjects','exam_shedule'));
}


public function manage_users(){
    $users=User::get();
    return view('admin.user_list', compact('users'));
}

public function manage_technicalassesmets(Request $request){
  
    $exam_shedule = ExamShedule::get();  
    $schoolId = $request->input('school_id'); // or however you're getting the school ID
    $slot = $request->input('slot'); // or however you're getting the school ID
   
    // $assessemts = SystemCheck::join('school_details', 'school_details.registration_id', '=', 'system_checks.school_id')
    //     ->select('school_name','lab_id','pc_id','ip','os','resolution','js_enabled','ram','browser','system_checks.created_at','status'
    //     )
    //     ->when($schoolId, function ($query, $schoolId) {
    //         return $query->where('system_checks.school_id', $schoolId);
    //     })
    //     ->groupBy('system_checks.school_id')->get();

    // $assessemts = DB::table('school_details as sd')
    // ->leftJoin('labs_details as ld', 'ld.registration_id', '=', 'sd.registration_id')
    // ->leftJoin('system_checks as sc', 'sc.school_id', '=', 'sd.registration_id')
    // ->leftJoin('enrollment_details as ed', 'ed.registration_id', '=', 'sd.registration_id')
    // ->Join('school_registration', 'school_registration.id', '=', 'sd.registration_id')
    // ->select(
    //     'sd.school_name','school_registration.school_id',
    //     'sd.registration_id as school_id',
    //     DB::raw('GROUP_CONCAT(CONCAT(ld.labs_name, "/", ld.computer_qty) ORDER BY ld.id SEPARATOR " ") AS labs_summary'), // Concatenate lab names and computer quantities
    //     DB::raw('SUM(ld.computer_qty) AS total_computers'), // Sum of all computers across labs
    //     'ed.total_enrollment', // Total enrollment from enrollment_details
    //     'ed.total_com_labs', // Total number of computer labs from enrollment_details
    //     DB::raw('COUNT(DISTINCT sc.id) AS total_tested_computers') // Count the total number of unique system checks for each school
    // )
    // ->groupBy('sd.registration_id', 'sd.school_name', 'ed.total_enrollment', 'ed.total_com_labs')
    // ->get();

   $assessemts = DB::table('school_details as sd')
    ->Join('labs_details as ld', 'ld.registration_id', '=', 'sd.registration_id')
    ->Join('enrollment_details as ed', 'ed.registration_id', '=', 'sd.registration_id')
    ->Join('school_registration as sr', 'sr.id', '=', 'sd.registration_id')
    ->leftjoin('genrate_link as gl', 'sr.id', '=', 'gl.school_id')
    ->leftJoin(
        DB::raw('(
            SELECT 
                sc.school_id,
                sc.lab_id,
                SUM(CASE WHEN sc.status = "pass" THEN 1 ELSE 0 END) AS pass_count,
                SUM(CASE WHEN sc.status = "fail" OR sc.status = "failed" THEN 1 ELSE 0 END) AS fail_count
            FROM system_checks sc
            GROUP BY sc.school_id, sc.lab_id
        ) as lab_counts'),
        function ($join) {
            $join->on('lab_counts.school_id', '=', 'sd.registration_id')
                 ->on('lab_counts.lab_id', '=', 'ld.labs_name');  // Assuming lab_id in system_checks matches id in labs_details
        }
    )
    ->selectRaw('
        sd.school_name,
        sd.registration_id AS school_id,
        GROUP_CONCAT(CONCAT(ld.labs_name, " = ", ld.computer_qty) ORDER BY ld.id SEPARATOR ",") AS labs_summary,
        SUM(ld.computer_qty) AS total_computers,
        ed.total_enrollment,
        ed.total_com_labs,
        GROUP_CONCAT(
            CONCAT(
                ld.labs_name, " - pass ", COALESCE(lab_counts.pass_count, 0), ", fail ", COALESCE(lab_counts.fail_count, 0)
            ) 
            ORDER BY ld.id SEPARATOR "!"
        ) AS labs_tested_computers,sr.school_id as schoolid
    ');

// Filter by school if not 'all'
        if ($schoolId !== 'all') { 
            if($schoolId > 0){
                $school = SchoolRegistration::where('school_id', $schoolId)->first();
                if ($school) {
                    $assessemts = $assessemts->where('sd.registration_id', '=', $school->id);
                }
            }                       
        }

        if($request->slot !="all"){ 
            if (!empty($request->slot)){                
                if($request->slot > 0){
                        $assessemts = $assessemts->where('gl.date_id', $request->slot);
                }
            }
        }

// Final query with grouping
    $assessemts = $assessemts
        ->groupBy('sd.registration_id', 'sd.school_name', 'ed.total_com_labs')
        ->paginate(20); 
    //return view('admin.technical_assesment_list', compact('assessemts','exam_shedule'));
    return view('admin.technical_assessment', compact('assessemts','exam_shedule'));
    
}

public function manage_technicalassesmets_list(Request $request,$id){
   
    $schoolId=$id;
    $assessemts = SystemCheck::join('school_details', 'school_details.registration_id', '=', 'system_checks.school_id')
        ->select('school_name','lab_id','pc_id','ip','os','resolution','js_enabled','ram','browser','system_checks.created_at','status'
        )
        ->when($schoolId, function ($query, $schoolId) {
            return $query->where('system_checks.school_id', $schoolId);
        })
        ->paginate(10);
    
        return view('admin.technical_assesment_list', compact('assessemts'));
    
}




   public function bank_details($id){
        $payment=SchoolBank::where('school_id',$id)->first();
        return view('partials.bank-details', compact('payment'));
    }


   public function updateStatus(Request $request){
     
      try { 

      

      $payment = SchoolBank::find($request->id);
      $sd = SchoolDetails::where('registration_id',$request->school_id)->first();   
      $user = SchoolRegistration::where('id',$request->school_id)->first();
      $hs = Headofschool::where('registration_id',$request->school_id)->first();
      if ($request->status == 1) {
        $status = "pending";
        } elseif ($request->status == 2) {
            $status = "approved";
        } elseif ($request->status == 3) {
            $status = "rejected";
        } else {
            $status = "unknown"; // Optional
        }
      
       if (filter_var($user->mobileno, FILTER_VALIDATE_EMAIL)) {
        $email = $user->mobileno;
        $data['school_name'] =$sd->school_name;
        $data['headofschool'] =$hs->first_name.' '.$hs->second_name.' '.$hs->last_name;
        $data['status'] =$status;
        $subject = 'Payment Verification Status By Spark Olympiads';
        try {
               Mail::send('email_template.payment_success', $data, function($message) use ($email, $subject) {
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
       }else{
          $headodschool=$hs->first_name.$hs->second_name.$hs->last_name;
           payment_success($headodschool,$status,"91".$user->mobileno);
       }
     
      if (!$payment) {
          return response()->json(['success' => false, 'message' => 'Payment not found']);
      }

        $payment->remark = $request->remarks;
        $payment->status  = $request->status;
        $payment->approve_by  = $userId = Auth::id(); // Returns current logged-in user's ID
        $payment->save();
        return response()->json(['success' => 200, 'message' => 'Status updated']);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }

   }



 
    public function adminupdatevefifyStatus(Request $request)
    {
         
        try {

        $request->validate([
            'student_id' => 'required|integer|exists:students,id',
        ]);
        $student = Student::find($request->student_id);
        $name = $student->full_name.' '.$student->middle_name.' '.$student->last_name;
        $email = $student->email;
        $data['name'] =$name; 


        if($request->status !=2){ 
            $status="VERIFIED";
        }else{
            $status="REJECTED";
        }

        $data['status'] =$status;
        $subject = 'Payment Verification Status for Admission No. -'.$student->admission_no.'';

        if($student->is_mobile_validate==1){

            
            if($request->status!=2){ 
                  admin_fee_verify($name,'91'.$student->mobile);  
            }else{ 
                admin_fee_rejected($name,'91'.$student->mobile);
            }
        }else{
            
            Mail::send('email_template.admin_payment_verification', $data, function($message) use ($email, $subject) {
                $message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
                $message->to($email);
                $message->subject($subject); 
            });            
        } 

        $student->fee_status = $request->status; // 2 = Verified
        $student->fee_verified_by = Auth::id();
        $student->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Student fee verified successfully',
            'verify_status' => $student->verify_status,
        ]);

         } catch (\Exception $e) {
            return response()->json([
                'status'            => 404,
                //'message'             => 'Something.',
                'message'           => $e->getMessage()
            ], 500);
        } 
    }  
   

    public function active_razorpay(Request $request)
    {
        
         try {
        // Validate request first
        $request->validate([
            'school_id' => 'required|exists:school_registration,id',
            'status' => 'required|in:0,2', // Accept 0 (OFF) or 2 (ON)
        ]);
    
        // Fetch the school
         $school = SchoolRegistration::find($request->school_id);
    
        if (!$school) {
            return response()->json([
                'status' => false,
                'message' => 'School not found.'
            ], 404);
        }
         $newStatus = ($school->online_payment == 2) ? 0 : 2;
        // Update the status
        $school->update([
            'online_payment' => $newStatus,
        ]);
    
        return response()->json([
            'status' => $newStatus,
            'message' => 'Status updated successfully.',
        ]);
        
        } catch (\Exception $e) {
            return response()->json([
                'status'            => 404,
                //'message'             => 'Something.',
                'message'           => $e->getMessage()
            ], 500);
        } 
    }

    public function getSchoolsBySlot($examSlotId)
    {


        if($examSlotId != "all"){ 
            $schools = DB::table('school_registration as a')
            ->join('school_details as b', 'a.id', '=', 'b.registration_id')
            ->leftjoin('genrate_link as f', 'a.id', '=', 'f.school_id')
            ->select(
                'b.registration_id as bregistration_id',
                'b.school_name',
                'a.school_id'
            )
            ->when($examSlotId !== "all", function ($query) use ($examSlotId) {
                // Only apply this where condition if $examSlotId is NOT "all"
                return $query->where('f.date_id', $examSlotId);
            })
            ->orderBy('b.school_name', 'asc')
            ->groupBy('a.id')
            ->get();
        }else{
          $schools = DB::table('school_registration as a')
            ->join('school_details as b', 'a.id', '=', 'b.registration_id')
            ->select(
                'b.registration_id as bregistration_id',
                'b.school_name',
                'a.school_id'
            )->where('a.school_id','!=','')
            ->orderBy('b.school_name', 'asc')
            ->groupBy('a.id')
            ->get();
        }
        return response()->json($schools);
    }



    public function school_change_password_byadmin(Request $request)
    {

       
    try {
        $request->validate([
            'password' => 'required|string|confirmed|min:8',
        ]);

        $userx = $request->school_id;
        $user = SchoolRegistration::where('school_id', $userx)->first();

        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }

        if (Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'New password cannot be the same as the old password.'], 422);
        }

        $user->password = Hash::make($request->password);
        if (!session('user_details')) {
            $user->fist_chanege_pass = true;
        }
        $user->save();

        $head = Headofschool::where('registration_id', $user->id)->first();

        $subject = "Spark Olympiads - Account Password Changed";
        $data = [];

        if (filter_var($user->mobileno, FILTER_VALIDATE_EMAIL)) {
            Mail::send('email_template.password_change_successfully', ['data' => $data], function ($message) use ($user, $subject) {
                $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
                $message->to($user->mobileno);
                $message->subject($subject);
            });
        } else {
            $mobile = "91" . $user->mobileno;
            $send = password_change_msg($mobile);
            if (!$send) {
                return response()->json(['warning' => 'Password changed, but message sending failed.'], 200);
            }
        }

        return response()->json(['success' => 'Password updated successfully!'], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
 

}




public function cancel_invoice($id){  
      try {  
            $invoice = Invoice::find($id);
            $invoice->status = 1; 
            $invoice->save();
            return back()->with('success','Invoice cancelled successfully');
         }catch(\Exception $e){
             return response()->json(['error'=> $e->getMessage()],500);
        }
}












}
