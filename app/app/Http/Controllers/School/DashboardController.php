<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Headofschool;
use App\Models\SchoolDetails;
use App\Models\Genrateurl;
use App\Models\GenrateLink;
use App\Models\ExamShedule;
use App\Models\Student;
use App\Models\SchoolBank;
use App\Models\Invoice;
use App\Models\SparkCordinator;
use Illuminate\Support\Facades\Mail; // for email
use Illuminate\Support\Facades\DB;
use App\Models\FeeDiscount;
class DashboardController extends Controller
{
    public function dashboard(){
  
       
     $user = Auth::guard('school')->user();
      $hs =   Headofschool::where('registration_id',$user->id)->first();  
      $hs1 = SchoolDetails::where('registration_id',$user->id)->first();  
      
      $url = Genrateurl::where('registration_id',$user->id)->first();
      $exam_shedule = ExamShedule::where('status',0)->get();
      $links_list = GenrateLink::join('exam_shedule', 'exam_shedule.id', '=', 'genrate_link.date_id')
      ->where('genrate_link.school_id', $user->id)
      ->where('genrate_link.status', 0)
      ->first();    
           

     $subjectwise_count = DB::table('students as s')
    ->select([
        'sub.name as subjectname',
        DB::raw('jt.subject_id'),
        DB::raw('COUNT(*) AS student_count')
    ])
    ->join(DB::raw("JSON_TABLE(
        CONCAT('[\"', REPLACE(s.subject_id, ',', '\",\"'), '\"]'),
        '$[*]' COLUMNS(subject_id VARCHAR(100) PATH '$')
    ) jt"), DB::raw('TRUE'), '=', DB::raw('TRUE'))
    ->join('subject as sub', 'sub.id', '=', DB::raw('jt.subject_id'))
    ->where('s.school_id', $user->school_id)
    ->groupBy('jt.subject_id', 'sub.name')
    ->orderBy('jt.subject_id')
    ->get();

    $subjectwise_count1=count($subjectwise_count);

    $classstudentCounts = DB::table('students as s')
    ->join('class as c', 's.class', '=', 'c.id')
     ->join('subject', function($join) {
        $join->on(DB::raw("FIND_IN_SET(subject.id, s.subject_id)"), '>', DB::raw('0'));
    })
    ->select('c.name as class_name', DB::raw('COUNT(DISTINCT s.id) as student_count'))
    ->where('school_id',$user->school_id)
    ->groupBy('c.name')
    ->orderBy('c.name')
    ->get();

    $classstudentCounts1=count($classstudentCounts);

     $total_counts = DB::table('students')
    ->select(DB::raw('COUNT(students.id) as student_count'))
    ->join('class', 'students.class', '=', 'class.id') 
    ->join('subject', function($join) {
        $join->on(DB::raw("FIND_IN_SET(subject.id, students.subject_id)"), '>', DB::raw('0'));
    })
    ->where('school_id',$user->school_id)
    ->groupBy('students.admission_no')
    ->get();     
     

    // $student_listing = Student::select('admission_no', 'full_name', 'mobile', 'fee','fee_status')
    // ->where('students.school_id', $user->school_id)
    // ->where('fee_status',1)     
    // ->get();

 

    $query2 = DB::table('students')
    ->select(               
      'subject.fee',  
      'students.admission_no', 'full_name', 'mobile','students.fee_status',       
       DB::raw('GROUP_CONCAT(subject.name ORDER BY subject.name SEPARATOR ", ") as subject_names')
     )->Join('subject', function ($join) {
         $join->on(DB::raw('FIND_IN_SET(subject.id, students.subject_id)'), '>', DB::raw('0'));
     })->Join('class', 'class.id', '=', 'students.class') 
     ->where('students.school_id', $user->school_id)   
     ->where('students.verify_status', 2)            
     ->where('students.fee_status', 1)->groupBy(
          'students.id',
          'students.admission_no',
          'students.full_name',
          'students.middle_name',
          'students.last_name',
          'students.section',  
          'class.name'        
      );     
  $students2 = $query2->get();
  $student_listing =  $students2;

  $discounts = FeeDiscount::get();

  $totalFee=0; 
  foreach($students2 as $st){ 
    $subjectCount = count(array_filter(array_map('trim', explode(',', $st->subject_names))));
    $total_feexx = $subjectCount * $st->fee;
      $appliedDiscount = 0;   
          //echo $finalAmount = $total_fee; 
      foreach($discounts as $dis){
          if ($subjectCount >= $dis->from_qty && $subjectCount <= $dis->to_qty) 
              if ($dis->discount_value === 'percentage') {
                  $appliedDiscount = ($total_feexx * $dis->discount_value) / 100;
              } else {  
                  // Assume 'flat' or any other type is a fixed amount
                  $appliedDiscount = $dis->discount_value;
              }									
               $totalFee +=$total_feexx - $appliedDiscount;                   
              break;                            
          }  
   } 
 
 

    $subjectCounts = DB::table('students')
    ->join('class', 'students.class', '=', 'class.id') // Adjust the join condition based on your actual schema
    ->select('class.name', DB::raw('COUNT(DISTINCT TRIM(SUBSTRING_INDEX(SUBSTRING_INDEX(students.subject_id, \',\', n.n), \',\', -1))) AS total_subjects'))
    ->join(DB::raw('(SELECT 1 AS n UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL 
                      SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9 UNION ALL SELECT 10) n'), 
           DB::raw('CHAR_LENGTH(students.subject_id) - CHAR_LENGTH(REPLACE(students.subject_id, \',\', \'\')) >= n.n - 1'), 
           '=' , DB::raw('1'))->where('students.school_id', $user->school_id)
    ->groupBy('class.name')
    ->get();

 

     $totalSubjectCount = DB::table('students')
    ->select(DB::raw('SUM(LENGTH(subject_id) - LENGTH(REPLACE(subject_id, ",", "")) + 1) AS total_subjects'))
    ->where('students.school_id', $user->school_id)
    ->first();  // Get the result as a single row

      return view('school.dashboard',compact('student_listing','totalFee','hs','hs1','url','exam_shedule','links_list','user','subjectwise_count','classstudentCounts','total_counts','subjectwise_count1','classstudentCounts1','subjectCounts','totalSubjectCount','discounts'));
    }


    public function downloads_browsers(){
         
        return view('school.downloads');

    }


    public function global_mentors($val){      

        return view('school.globalmentors',compact('val'));

    }


    

    public function system_info(){      
        return view('school.computer-lab-readiness.index');
    }

    public function process(){      
        return view('school.process');
    }

    public function lp(){      
        return view('school.letter_to_parent');
    }

    public function pfb(){      
        return view('school.poster');
    }

    public function ca(){      
        return view('school.compentency');
    }
    
    public function award(){      
        return view('school.award_and_accolades');
    }

    public function bank_details(){      
  
        $user = Auth::guard('school')->user();
        $payment = SchoolBank::join('invoices', 'invoices.id', '=', 'school_banks.invoce_id')
        ->where('school_banks.school_id', $user->id) 
        ->select('school_banks.*', 'invoices.status as invoicestatus') // Optional: select only needed columns
        ->where('invoices.status',0) 
        ->first();
    
        $invoice = Invoice::where('school_id',$user->id)->where('status',0)->first(); 
        return view('school.bankaccount',compact('payment','invoice'));
    }

    // public function genrateinvoice(){
    //     $user = Auth::guard('school')->user(); 

    //      $totalstudent_counts = DB::table('students')
    //     ->select(DB::raw('COUNT(students.id) as student_count'))
    //     ->join('class', 'students.class', '=', 'class.id') 
    //     ->join('subject', function($join) {
    //         $join->on(DB::raw("FIND_IN_SET(subject.id, students.subject_id)"), '>', DB::raw('0'));
    //     })
    //     ->where('school_id',$user->school_id)
    //     ->groupBy('students.admission_no')
    //     ->get();     
                
       
    //      $data = DB::table('school_registration as a')
    //     ->join('school_details as b', 'a.id', '=', 'b.registration_id')     
    //     ->join('district as l', 'b.district_id', '=', 'l.districtid')
    //     ->join('state as m', 'b.state_id', '=', 'm.state_id')
    //     ->leftJoin('students as s', 's.school_id', '=', 'a.school_id') // Assuming this relationship
    //     ->leftJoin('invoices as e', 'e.school_id', '=', 'a.id') // Assuming this relationship
    //     ->select(
    //         'b.*',
    //         'l.district_title',
    //         'm.state_title',
    //         's.full_name',
    //         'e.invoiceno',
    //         DB::raw('COUNT(s.id) as total_students'),
    //         DB::raw('SUM(s.fee) as total_fees')
    //     )
    //    ->where('registration_id', $user->id)
    //    ->where('s.fee_status',1)
    //    ->groupBy('b.id', 'l.district_title', 'm.state_title') // Important for aggregate functions
    //    ->first();

    //    $invoice = Invoice::where('school_id',$user->id)->first();
    //    if(!empty($invoice)){
    //         $invoice->update([
    //             'total_amount'  => $data->total_fees,
    //             'total_student' => $data->total_students,
    //         ]);
    //    }else{
    //         $nextInvoiceNo = Invoice::count() + 1;
    //         $nextInvoiceNos = $this->generateInvoiceNumber($nextInvoiceNo);           
    //         $invoice = Invoice::create([
    //             'school_id'     => $user->id,
    //             'invoiceno'     => $nextInvoiceNos,
    //             'total_amount'  => $data->total_fees,
    //             'total_student' => count($totalstudent_counts),
    //         ]); 
            
    //         if($invoice){
    //             $head = Headofschool::where('registration_id', $user->id)->first();
    //             $sp = SparkCordinator::where('registration_id', $user->id)->first();
    //             $hs1 = SchoolDetails::where('registration_id',$user->id)->first(); 
                 
    //             $subject = "Your Spark Olympiad Invoice (".$nextInvoiceNos.") is Now Available";
                
    //             // Assuming you have the invoice URL somewhere, e.g.:
    //             $invoiceLink = url('/invoice/' . $user->id);  // adjust this URL accordingly
    //             $emails = [
    //                 $head->email,
    //                 $sp->email,                                        
    //             ];
    //             $mail_data = [
    //                 'name' => $hs1->school_name,            // or any user name field
    //                 'invoice_link' => $invoiceLink,
    //                 'invoiceno'=> $nextInvoiceNos,
    //             ];
                
    //             Mail::send('email_template.invoice', ['data' => $mail_data], function ($message) use ($emails, $subject) {
    //                 $message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
    //                 $message->to($emails);  // Use email, not mobile number, for sending mail
    //                 $message->subject($subject);
    //             });
                
                     
    //         }

    //     }

    //     if(!empty($nextInvoiceNos)){
    //         $data->invoiceno = $nextInvoiceNos;
    //     }           
        
    //     return view('school.invoice',compact('data'));
    // }

    public function genrateinvoice(){
        $user = Auth::guard('school')->user(); 

         $totalstudent_counts = DB::table('students')
        ->select(DB::raw('COUNT(students.id) as student_count'))
        ->join('class', 'students.class', '=', 'class.id') 
        ->join('subject', function($join) {
            $join->on(DB::raw("FIND_IN_SET(subject.id, students.subject_id)"), '>', DB::raw('0'));
        })
        ->where('school_id',$user->school_id)
        ->where('students.fee_status',1) 
        ->groupBy('students.admission_no')
        ->get();     
                
       
        $data = DB::table('school_registration as a')
        ->join('school_details as b', 'a.id', '=', 'b.registration_id')     
        ->join('district as l', 'b.district_id', '=', 'l.districtid')
        ->join('state as m', 'b.state_id', '=', 'm.state_id')
        ->Join('students as s', 's.school_id', '=', 'a.school_id') // Assuming this relationship
        ->leftJoin('invoices as e', 'e.school_id', '=', 'a.id') // Assuming this relationship
        ->select(
            'b.*',
            'l.district_title',
            'm.state_title',
            's.full_name',
            'e.invoiceno',
            DB::raw('COUNT(s.id) as total_students'),
            DB::raw('SUM(s.fee) as total_fees')
        )
            ->where('registration_id', $user->id)
            //->where('s.fee_status',1)
            ->groupBy('b.id', 'l.district_title', 'm.state_title','s.admission_no') // Important for aggregate functions
            ->first();

               $query2 = DB::table('students')
              ->select(               
                'subject.fee',              
                 DB::raw('GROUP_CONCAT(subject.name ORDER BY subject.name SEPARATOR ", ") as subject_names')
               )->Join('subject', function ($join) {
                   $join->on(DB::raw('FIND_IN_SET(subject.id, students.subject_id)'), '>', DB::raw('0'));
               })->Join('class', 'class.id', '=', 'students.class') 
               ->leftJoin('fees_status', 'fees_status.student_id', '=', 'students.id')
               ->where('students.school_id', $user->school_id)  
               ->where('students.verify_status', 2)                         
               ->where('students.fee_status', 1)->groupBy(
                    'students.id',
                    'students.admission_no',
                    'students.full_name',
                    'students.middle_name',
                    'students.last_name',
                    'students.section',  
                    'class.name', 
                    'fees_status.fee_status',
                    'fees_status.fees'  
                ); 
            $students2 = $query2->get();
            $discounts = FeeDiscount::get();
 
            $finalAmount=0; 
            foreach($students2 as $st){ 
              $subjectCount = count(array_filter(array_map('trim', explode(',', $st->subject_names))));
              $total_fee = $subjectCount * $st->fee;
                $appliedDiscount = 0;   
                    //echo $finalAmount = $total_fee; 
                foreach($discounts as $dis){
                    if ($subjectCount >= $dis->from_qty && $subjectCount <= $dis->to_qty) 
                        if ($dis->discount_value === 'percentage') {
                            $appliedDiscount = ($total_fee * $dis->discount_value) / 100;
                        } else {  
                            // Assume 'flat' or any other type is a fixed amount
                            $appliedDiscount = $dis->discount_value;
                        }									
                         $finalAmount +=$total_fee - $appliedDiscount;                   
                        break;                            
                    }  
             } 
              
         
     
     $invoice = Invoice::where('school_id',$user->id)->where('status',0)->first();
       if(!empty($invoice)){  
            // $invoice->update([
            //     'total_amount'  => $total_fees,
            //     'total_student' => $data->total_students,
            // ]);
       }else{
            $nextInvoiceNo = Invoice::count() + 1;
            $nextInvoiceNos = $this->generateInvoiceNumber($nextInvoiceNo); 
           if($finalAmount != 0 && count($totalstudent_counts) != 0){          
            $invoice = Invoice::create([
                'school_id'     => $user->id,
                'invoiceno'     => $nextInvoiceNos,
                'total_amount'  => $finalAmount,
                'total_student' => count($totalstudent_counts),
            ]); 
            }else{
                return back()->with('error', 'Please check if the amount is less than 0 and the student count is 0.');
            }
            if($invoice){
                $head = Headofschool::where('registration_id', $user->id)->first();
                $sp = SparkCordinator::where('registration_id', $user->id)->first();
                $hs1 = SchoolDetails::where('registration_id',$user->id)->first(); 
                 
                $subject = "Your Spark Olympiad Invoice (".$nextInvoiceNos.") is Now Available";
                
                // Assuming you have the invoice URL somewhere, e.g.:
                $invoiceLink = url('/invoice/' . $invoice->id);  // adjust this URL accordingly
                //$head->email="anshul@samtechinnovations.com";
                //$sp->email="anshul@samtechinnovations.com";
                $emails = [
                    $head->email,  
                    $sp->email,                                        
                ];
                $mail_data = [
                    'name' => $hs1->school_name,            // or any user name field
                    'invoice_link' => $invoiceLink,
                    'invoiceno'=> $nextInvoiceNos,
                ];
            //    if($finalAmount != 0 && count($totalstudent_counts) != 0){        
            //         Mail::send('email_template.invoice', ['data' => $mail_data], function ($message) use ($emails, $subject) {
            //             $message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
            //             $message->to($emails);  // Use email, not mobile number, for sending mail
            //             $message->subject($subject);
            //         });       
            //     }                                
            }
        }

        if(!empty($nextInvoiceNos)){
            $data->invoiceno = $nextInvoiceNos;
        }           
        
        return view('school.invoice',compact('data','invoice'));
    }


    public function test_prep_resorces(){      

        return view('school.test-prep-resources');

    }

    public function test_duration(){      

        return view('school.test-duration');

    }

    public function total_questions(){      

        return view('school.total-questions');

    }

    public function mathematics(){      

        return view('school.mathematics');

    }
    public function evs(){      

        return view('school.evs');

    }
    public function english(){      

        return view('school.english');

    }

    public function india_awareness(){      

        return view('school.india-awareness');

    }

    public function faq(){      
        return view('school.faq');
    }

    public function support(){      
        return view('school.support');
    }



    function generateInvoiceNumber($id) {
        $prefix = "ED";
        // Determine financial year
        $month = date('n'); // 1-12
        $year = date('Y');
        if ($month >= 4) {
            // April to Dec => current year to next year
            $fyStart = $year % 100;
            $fyEnd = ($year + 1) % 100;
            $fyKey = "$year-".($year + 1);
        } else {
            // Jan to March => previous year to current year
            $fyStart = ($year - 1) % 100;
            $fyEnd = $year % 100;
            $fyKey = ($year - 1)."-".$year;
        }
        $financialYear = sprintf("%02d-%02d", $fyStart, $fyEnd);
        // Increment serial
        
        $serial = str_pad($id, 4, '0', STR_PAD_LEFT);
        // Return final invoice number
        return "$prefix/$serial/$financialYear";
    }
    
 

     public function view_notification($id){
        $student=Student::find($id);
        $student->notiifcation_view=1;
        $student->save();
        return redirect()->route('student.verification');
    }







}
