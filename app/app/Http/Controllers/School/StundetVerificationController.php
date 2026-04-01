<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Clases;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail; // for email
use App\Models\SchoolRegistration;
use App\Models\SchoolDetails;
use App\Models\GenrateLink;
use App\Models\FeeDiscount;
use App\Models\Invoice;  
use Illuminate\Support\Facades\Response;   
use Illuminate\Support\Arr;  
use App\Models\ExamResult;
use App\Models\StudentCertifacate;
use App\Models\StudentCompantancyScore;
use Illuminate\Support\Facades\File;
use ZipArchive;

class StundetVerificationController extends Controller
{
    public function index(Request $request){

    $user = Auth::guard('school')->user();
    $discounts = FeeDiscount::get();
    $subjects = Subject::get();
    $classes=Clases::orderby('name','asc')->get();  
    $perPage = 20;
    $page = $request->input('page', 1);
    $classId = $request->input('class_id');
    $subjectId = $request->input('subject_id');
    $invoice = Invoice::where('school_id',$user->id)->first();    
    $query = DB::table('students')
        ->select(
            'students.admission_no',
            'students.id',
            'students.full_name',
            'students.middle_name',
            'students.last_name',
            'students.section',
            'class.name as class_name', 
            'fees_status.fee_status as fees_statuss',
            'fees_status.fees as paid_amount',
            'students.verify_status',
            'students.father_name',
            'relative_last_name','relative_middle_name',
            'middle_name',
            'last_name',
            'students.relation',
            'students.mobile',
            'students.email',
            'subject.fee',
            'students.fee as student_fee','students.subject_id','utr','attachment','razorpay_payment_id','utr','status','students.fee_status',
            //  DB::raw('
            //     ((IFNULL(exam_shedule.exam_fee, 0) - IFNULL(exam_shedule.discount, 0)) 
            //      - IFNULL(fees_status.fees, 0)) as due_amount
            //    '),
              DB::raw('GROUP_CONCAT(subject.name ORDER BY subject.name SEPARATOR ", ") as subject_names')
            )
            ->Join('subject', function ($join) {
                $join->on(DB::raw('FIND_IN_SET(subject.id, students.subject_id)'), '>', DB::raw('0'));
            })
            
            ->Join('class', 'class.id', '=', 'students.class') 
            ->leftJoin('fees_status', 'fees_status.student_id', '=', 'students.id')
            ->where('students.school_id', $user->school_id)
            ->whereIn('students.verify_status',[1,3]);
            
            // Filters
            if (!empty($classId)) {
                $query->whereIn('students.class', $classId);
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
     $query->orderby('id','desc');
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


        ///////////////////////----------------Step Two DataQuery -------------------//////////////////


        $query2 = DB::table('students')
        ->select(
            'students.admission_no',
            'students.id',
            'students.full_name',
            'students.middle_name',
            'students.last_name',
            'students.section',
            'class.name as class_name', 
            'fees_status.fee_status as fees_statuss',
            'fees_status.fees as paid_amount',
            'students.verify_status',
            'students.father_name',
            'middle_name',
            'relative_last_name',
            'relative_middle_name',
            'students.relation',
            'students.mobile',
            'students.email',
            'subject.fee',
          'students.fee as student_fee','students.subject_id','utr','attachment','razorpay_payment_id','utr','status','students.fee_status',
          
              DB::raw('GROUP_CONCAT(subject.name ORDER BY subject.name SEPARATOR ", ") as subject_names')
            )
            ->Join('subject', function ($join) {
                $join->on(DB::raw('FIND_IN_SET(subject.id, students.subject_id)'), '>', DB::raw('0'));
            })
            
            ->Join('class', 'class.id', '=', 'students.class') 
            ->leftJoin('fees_status', 'fees_status.student_id', '=', 'students.id')
            ->where('students.school_id', $user->school_id)
            ->where('students.verify_status', 2)
            ->where('students.fee_status', 0);
            // Filters
            if (!empty($classId)) {
                $query->whereIn('students.class', $classId);
            }

            if (!empty($subjectId) && is_array($subjectId)) {
                $query->where(function ($q) use ($subjectId) {
                    foreach ($subjectId as $id) {
                        $q->orWhereRaw("FIND_IN_SET(?, students.subject_id)", [$id]);
                    }
                });
            }
            

    $query2->groupBy(
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
     $query->orderby('id','desc');
     $students2 = $query2->get();
    //  $students2 = new LengthAwarePaginator(
    //     $allResults2->slice(($page - 1) * $perPage, $perPage)->values(),
    //     $allResults2->count(),
    //     $perPage,
    //     $page,
    //     ['path' => request()->url(), 'query' => request()->query()]
    // );
    //     $sr2 = ($students2->currentPage() - 1) * $students2->perPage() + 1;
  
        $grandTotal = 0;
        $total_student=0;   

          ///////////////////////----------------Step Three DataQuery -------------------//////////////////


          $query3 = DB::table('students')
          ->select(
              'students.admission_no',
              'students.id',
              'students.full_name',
              'students.middle_name',
              'students.last_name',
              'students.section',
              'class.name as class_name', 
              'fees_status.fee_status as fees_statuss',
              'fees_status.fees as paid_amount',
              'students.verify_status',
              'students.father_name',
              'middle_name',
              'last_name',
              'relative_last_name','relative_middle_name',
              'students.relation',
              'students.mobile',
              'students.email',
              'subject.fee',
              'students.school_id',
              'students.fee as student_fee','students.subject_id','utr','attachment','razorpay_payment_id','utr','status','students.fee_status',
            
                DB::raw('GROUP_CONCAT(subject.name ORDER BY subject.name SEPARATOR ", ") as subject_names')
              )
              ->Join('subject', function ($join) {
                  $join->on(DB::raw('FIND_IN_SET(subject.id, students.subject_id)'), '>', DB::raw('0'));
              })
              
              ->Join('class', 'class.id', '=', 'students.class') 
              ->leftJoin('fees_status', 'fees_status.student_id', '=', 'students.id')
              ->where('students.school_id', $user->school_id)
              ->where('students.fee_status', 1)
              ->where('students.verify_status', 2);
              
               
              // Filters
              if (!empty($classId)) {
                  $query->whereIn('students.class', $classId);
              }
  
              if (!empty($subjectId) && is_array($subjectId)) {
                  $query->where(function ($q) use ($subjectId) {
                      foreach ($subjectId as $id) {
                          $q->orWhereRaw("FIND_IN_SET(?, students.subject_id)", [$id]);
                      }
                  });
              }
              
  
      $query3->groupBy(
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
       $query3->orderby('id','desc');
       $students3 = $query3->get();
    //    $students3 = new LengthAwarePaginator(
    //       $allResults3->slice(($page - 1) * $perPage, $perPage)->values(),
    //       $allResults3->count(),  
    //       $perPage,
    //       $page,
    //       ['path' => request()->url(), 'query' => request()->query()]
    //   );
    //       $sr2 = ($students3->currentPage() - 1) * $students3->perPage() + 1;
      
          $grandTotal = 0;
          $total_student=120000;   


 
        return view('school.studenlist', compact('students', 'sr','students2','total_student','classes','discounts','invoice','students3','subjects','user'));
    }
    






    public function studentindex(Request $request){


         
        $user = Auth::guard('school')->user();
        $discounts = FeeDiscount::get();
        $subjects = Subject::get();
        $classes=Clases::orderby('name','asc')->get();  
        $perPage = 20;
        $page = $request->input('page', 1);
        $classId = $request->input('class_id');
        $student_name = $request->input('student_name'); 
       
     
    

      
            $grandTotal = 0;
            $total_student=0;    
    
    
              $query3 = DB::table('students')
              ->select(
                  'students.admission_no',
                  'students.id',
                  'students.full_name',
                  'students.middle_name',
                  'students.last_name',
                  'students.section',
                  'class.name as class_name', 
                  'fees_status.fee_status as fees_statuss',
                  'fees_status.fees as paid_amount',
                  'students.verify_status',
                  'students.father_name',
                  'middle_name',
                  'last_name',
                  'relative_last_name','relative_middle_name',
                  'students.relation',
                  'students.mobile',
                  'students.email',
                  'subject.fee',
                  'students.school_id',
                  'students.fee as student_fee','students.subject_id','utr','attachment','razorpay_payment_id','utr','status','students.fee_status',
                
                    DB::raw('GROUP_CONCAT(subject.name ORDER BY subject.name SEPARATOR ", ") as subject_names')
                  )
                  ->Join('subject', function ($join) {
                      $join->on(DB::raw('FIND_IN_SET(subject.id, students.subject_id)'), '>', DB::raw('0'));
                  })
                  
                  ->Join('class', 'class.id', '=', 'students.class') 
                  ->leftJoin('fees_status', 'fees_status.student_id', '=', 'students.id')
                  ->where('students.school_id', $user->school_id)
                  ->where('students.fee_status', 1)
                  ->where('students.verify_status', 2);
                  
                   
                  // Filters
                  if (!empty($classId)) {
                      $query3->whereIn('students.class', $classId);
                  }
      
                  if (!empty($student_name)) {
                         $query3->where('students.full_name', 'LIKE', '%' . $student_name . '%');
                  }
                
      
          $query3->groupBy(
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
           $query3->orderby('id','desc');
           $students3 = $query3->get();                  
           $grandTotal = 0;
           $total_student=count($students3);
    
    
     
            return view('school.reportbystudent', compact('total_student','classes','discounts','students3','subjects','user'));
        }
        


















    



    public function destroy($id){
        $student = Student::findOrFail($id);    
        $student->delete();
        return back()->with('success', 'Student deleted successfully!');
    }

    public function updateFeeStatus(Request $request)
    {
         
        $user = Auth::guard('school')->user();
        $request->validate([
            'entries' => 'required|array',
            'entries.*.student_id' => 'required|integer',
            'entries.*.admission_no' => 'required|string',
            'entries.*.fee' => 'required|numeric',
            'entries.*.status' => 'required|boolean',
        ]);
    
        foreach ($request->entries as $entry) {
            // // Check if a record already exists
            // $existing = \DB::table('fees_status')->where('student_id', $entry['student_id'])->first();
    
            // // If exists, toggle status
            // if ($existing) {
            //     $newStatus = $existing->fee_status ? 0 : 1;
            //     $newMessage = $newStatus ? 'Verified' : 'Unverified'; 
            //     \DB::table('fees_status')->where('student_id', $entry['student_id'])->update([
            //         'fee_status' => $newStatus,
            //         'admission_no' => $entry['admission_no'],
            //         'fees' => $entry['fee'],
            //         'school_id' => $user->school_id,
            //         'status_message' => $newMessage,
            //         'updated_at' => now()
            //     ]);
            // }else {
            //     // If no record exists, insert as Verified
            //     \DB::table('fees_status')->insert([
            //         'student_id' => $entry['student_id'],
            //         'fee_status' => $entry['status'], // usually 1 on first check
            //         'admission_no' => $entry['admission_no'],
            //         'fees' => $entry['fee'],
            //         'school_id' => $user->school_id,
            //         'status_message' => 'Verified',
            //         'created_at' => now(),
            //         'updated_at' => now()
            //     ]);

                $student = Student::findOrFail($entry['student_id']); 
                $student->fee_status=1;
                $student->save();
            //}
        }
    
        return response()->json(['message' => 'Fee status updated successfully.']);
    }
    
    
    
    // public function upload(Request $request)
    // {
    //     $request->validate([
    //         'file' => 'required|mimes:csv,txt|max:2048',
    //     ]);

    //     $file = $request->file('file');
    //     $rows = array_map('str_getcsv', file($file->getRealPath()));
    //     $header = array_map('trim', array_map('strtolower', array_shift($rows)));
    //     $user = Auth::guard('school')->user();
        
    //     foreach ($rows as $row) {
    //          try { 
    //         $scid = SchoolRegistration::where('school_id', $user->school_id)->first();
    //         $examdate = GenrateLink::where('school_id', $scid->id)->first();

    //         $data = array_combine($header, $row);

       

    //         $subjects = [];  

    //         if (strtolower(trim($data['english'])) == "yes") {
    //             $subjects[] = "English";
    //         } 
    //         if (strtolower(trim($data['mathematics'])) == "yes") {
    //             $subjects[] = "Mathematics";
    //         } 
    //         if (strtolower(trim($data['evs'])) == "yes") {
    //             $subjects[] = "EVS";
    //         } 
    //         if (strtolower(trim($data['science'])) == "yes") {
    //             $subjects[] = "Science";
    //         }
             
    //         if (strtolower(trim($data['india awareness'])) == "yes") {
    //             $subjects[] = "India Awareness";
    //         }
            
                     
    //         // No need for explode — $subjects is already an array
    //         $subjectNames = array_map('trim', $subjects);

    //         // Get subject IDs from database
    //         $subjectIds = Subject::whereIn('name', $subjectNames)->pluck('id')->toArray();
    
    //         // Optional: validate each row
    //         $validator = Validator::make($data, [
    //             'admission_no' => 'required',
    //             'first_name'   => 'required',
    //             //'middle_name'  => 'required',
    //             //'last_name'    => 'required',
    //             'class'        => 'required',
    //             'section'      => 'required',  
    //             'email'        => 'nullable|email',
    //             'mobile'       => 'required',
    //             'relative_name' => 'nullable',
    //             'relative_middle_name' => 'nullable',
    //            //'relative_last_name' => 'nullable',
    //             'relation'     =>'nullable',
    //         ]);

    //         if ($validator->fails()) {
    //             // To print all error messages
    //             $errors = $validator->errors();
            
    //             // Example 1: Print each error
    //             foreach ($errors->all() as $message) {
    //                 echo $message . "<br>";
    //             }
    //             return response()->json(['errors' => $errors->all()], 422);
    //         } 
                       
    //         Student::updateOrCreate(
    //             ['admission_no' => $data['admission_no'], 'school_id' => $user->school_id],
    //             [
    //                 'class' => $data['class'],
    //                 'subject_id' => implode(',', $subjectIds),
    //                 'section' => $data['section'],
    //                 'full_name' => $data['first_name'],
    //                 'middle_name' => $data['middle_name'] ?? null,
    //                 'last_name' => $data['last_name'],
    //                 'mobile' => $data['mobile'],
    //                 'email' => $data['email'],
    //                 'father_name' => $data['relative_first_name'],
    //                 'relative_middle_name' => $data['relative-middle_name'],
    //                 'relative_last_name' => $data['relative_last_name'],
    //                 'relation' => $data['relation'],
    //                 'exam_date'     => $examdate->date_id ?? 0,
    //                 'fee' => $data['fee'],
    //                 'verify_status' => $data['details_verification'] == 'rejected' ? 3 : ($data['details_verification'] == 'verified' ? 2 : 1),
    //                 'fee_status' => $data['fee_status']=='paid' ? 1:0,
    //             ]
    //         );
    //         } catch (\Exception $e) {
                    
    //                 return response()->json(['errors' =>$e->getMessage()], 422);                 
    //         }                        
    //     }

    //     return response()->json(['message' => 'Students uploaded successfully.']);
    // }



//     public function upload(Request $request)
//     {
//         $request->validate([
//             'file' => 'required|mimes:csv,txt|max:2048',
//         ]);
        
//         $file = $request->file('file');
//         $user = Auth::guard('school')->user();
        
//         // Safely read and convert encoding
//         $rawContent = file_get_contents($file->getRealPath());
//         $utf8Content = mb_convert_encoding($rawContent, 'UTF-8', 'UTF-8, ISO-8859-1, Windows-1252');
        
//         // Split into lines and convert to CSV rows
//         $lines = explode(PHP_EOL, $utf8Content);
//         $rows = array_filter(array_map('str_getcsv', $lines), function ($row) {
//             // Remove completely empty rows
//             return count(array_filter($row)) > 0;
//         });
        
//         // Extract header
//         $header = array_map('trim', array_map('strtolower', array_shift($rows)));
        
//         $errors = []; // Collect row errors

//     foreach ($rows as $index => $row) {
//       $lineNumber = $index + 2; // CSV line (1 is header)

//      try {
//         // Skip empty/malformed rows
//         // if (count($header) !== count($row)) {
//         //     $errors[] = [
//         //         'line' => $lineNumber,
//         //        // 'email' => $row[4] ?? 'N/A',
//         //         'errors' => ["Column count mismatch on line $lineNumber. Expected " . count($header) . ", got " . count($row) . "."]
//         //     ];
//         //     continue;
//         // }

//         $data = array_combine($header, $row);

//         if (empty(trim($data['admission_no'] ?? ''))) {
//             continue; // skip empty
//         }

//         $subjects = [];
//         if (strtolower(trim($data['english'] ?? '')) === 'yes') $subjects[] = 'English';
//         if (strtolower(trim($data['mathematics'] ?? '')) === 'yes') $subjects[] = 'Mathematics';
//         if (strtolower(trim($data['evs'] ?? '')) === 'yes') $subjects[] = 'EVS';
//         if (strtolower(trim($data['science'] ?? '')) === 'yes') $subjects[] = 'Science';
//         if (strtolower(trim($data['india awareness'] ?? '')) === 'yes') $subjects[] = 'India Awareness';

//         $subjectIds = Subject::whereIn('name', $subjects)->pluck('id')->toArray();

//         $validator = Validator::make($data, [
//             'admission_no' => 'required',
//             'first_name'   => 'required',
//             'class'        => 'required',
//             'section'      => 'required',
//             'email'        => 'nullable|email',
//             'mobile'       => 'required',
//         ]);

//         if ($validator->fails()) {
//             $errors[] = [
//                 'line' => $lineNumber,
//                 'email' => $data['email'] ?? 'N/A',
//                 'errors' => $validator->errors()->all()
//             ];
//             continue;
//         }

//         $scid = SchoolRegistration::where('school_id', $user->school_id)->first();
//         $examdate = GenrateLink::where('school_id', $scid->id)->first();

//         Student::updateOrCreate(
//             ['admission_no' => $data['admission_no'], 'school_id' => $user->school_id],
//             [
//                 'class' => $data['class'],
//                 'subject_id' => implode(',', $subjectIds),
//                 'section' => $data['section'],
//                 'full_name' => $data['first_name'],
//                 'middle_name' => $data['middle_name'] ?? null,
//                 'last_name' => $data['last_name'] ?? null,
//                 'mobile' => $data['mobile'],
//                 'email' => $data['email'] ?? null,
//                 'father_name' => $data['relative_first_name'] ?? null,
//                 'relative_middle_name' => $data['relative_middle_name'] ?? null,
//                 'relative_last_name' => $data['relative_last_name'] ?? null,
//                 'relation' => $data['relation'] ?? null,
//                 'exam_date' => $examdate->date_id ?? 0,
//                 'fee' => $data['fee'] ?? 0,
//                 'verify_status' => match (strtolower($data['details_verification'] ?? '')) {
//                     'rejected' => 3,
//                     'verified' => 2,
//                     default => 1,
//                 },
//                 'fee_status' => strtolower($data['fee_status'] ?? '') === 'paid' ? 1 : 0,
//             ]
//         );
//     } catch (\Exception $e) {
//         $errors[] = [
//             'line' => $lineNumber,
//             'email' => $data['email'] ?? ($row[4] ?? 'N/A'),
//             'errors' => [$e->getMessage()]
//         ];
//     }
// }



// public function upload(Request $request)
//     {
//         $request->validate([
//             'file' => 'required|mimes:csv,txt|max:2048',
//         ]);
    
//         $file = $request->file('file');
//         $user = Auth::guard('school')->user();
    
//         $rawContent = file_get_contents($file->getRealPath());
//         $utf8Content = mb_convert_encoding($rawContent, 'UTF-8', 'UTF-8, ISO-8859-1, Windows-1252');
    
//         $lines = explode(PHP_EOL, $utf8Content);
//         $rows = array_filter(array_map('str_getcsv', $lines), function ($row) {
//             return count(array_filter($row)) > 0;
//         });
    
//         $header = array_map('trim', array_map('strtolower', array_shift($rows)));
    
//         $errors = [];
//         $errorRows = [];
//         $duplicateFailures =0;
//         foreach ($rows as $index => $row) {
//             $lineNumber = $index + 2;
    
//             try {

//                 if (count($row) !== count($header)) {
//                     $errors[] = ['line' => $lineNumber, 'error' => 'Column count mismatch'];
//                     $errorRows[] = $row;
//                     continue;
//                 }
                
//                 $data = array_combine($header, $row);
    
//                 if (empty(trim($data['admission_no'] ?? ''))) {
//                     continue;
//                 }
    
//                 $subjects = [];
//                 // if (strtolower(trim($data['english'] ?? '')) === 'yes') $subjects[] = 'English';
//                 // if (strtolower(trim($data['mathematics'] ?? '')) === 'yes') $subjects[] = 'Mathematics';
//                 // if (strtolower(trim($data['evs'] ?? '')) === 'yes') $subjects[] = 'EVS';
//                 // if (strtolower(trim($data['science'] ?? '')) === 'yes') $subjects[] = 'Science';
//                 // if (strtolower(trim($data['india awareness'] ?? '')) === 'yes') $subjects[] = 'India Awareness';

//                 $validInputs = ['yes', 'no'];

//                 $english = strtolower(trim($data['english'] ?? ''));
//                 if (in_array($english, $validInputs) && $english === 'yes') {
//                     $subjects[] = 'English';
//                 }

//                 $mathematics = strtolower(trim($data['mathematics'] ?? ''));
//                 if (in_array($mathematics, $validInputs) && $mathematics === 'yes') {
//                     $subjects[] = 'Mathematics';
//                 }

//                 $evs = strtolower(trim($data['evs'] ?? ''));
//                 if (in_array($evs, $validInputs) && $evs === 'yes') {
//                     $subjects[] = 'EVS';
//                 }

//                 $science = strtolower(trim($data['science'] ?? ''));
//                 if (in_array($science, $validInputs) && $science === 'yes') {
//                     $subjects[] = 'Science';
//                 }

//                 $indiaAwareness = strtolower(trim($data['india awareness'] ?? ''));
//                 if (in_array($indiaAwareness, $validInputs) && $indiaAwareness === 'yes') {
//                     $subjects[] = 'India Awareness';
//                 }
                
//                 if(!empty($subjects)){
//                     $subjectIds = Subject::whereIn('name', $subjects)->pluck('id')->toArray();
//                 }else{
//                     $errors[] = ['line' => $lineNumber];
//                     $errorRows[] = $row;
//                     continue;
//                 }
                
//                 // if (!empty($data['email'])) { 
//                 //     $data['email'] = preg_replace('/\s+/', '', $data['email']);
//                 // }
//                 $validator = Validator::make($data, [
//                     'admission_no' => 'required',  
//                     'first_name' =>   'required',
//                     'class' =>        'required',
//                     'section' =>      'required', 
//                     'relation' =>     'required',
//                     'relative_first_name' =>  'required',
//                     //'fee' => ['required', 'numeric'],
//                     'mobile' => ['required', 'digits:10', 'regex:/^[0-9]{10}$/'],
//                 ]);
    
//                 if ($validator->fails()) {
//                     $errors[] = ['line' => $lineNumber];
//                     $errorRows[] = $row;
//                     continue;
//                 }
    
//                 $scid = SchoolRegistration::where('school_id', $user->school_id)->first();
//                 $examdate = GenrateLink::where('school_id', $scid->id)->first();

//                // $existing = Student::where('admission_no', $data['admission_no'])
//                // ->where('school_id', $user->school_id)
//                // ->exists();

//                $feeStatus = 0;
//                 if (!empty($data['fee']) && $data['fee'] > 0) {
//                     $feeStatus = 1;
//                 } else {
//                     $feeStatus = strtolower($data['fee_status'] ?? '') === 'paid' ? 1 : 0;
//                 }

                

//                        Student::updateOrCreate(
//                             ['admission_no' => $data['admission_no'], 'school_id' => $user->school_id],
//                             [
//                                 'class' => $data['class'],
//                                 'subject_id' => implode(',', $subjectIds),
//                                 'section' => $data['section'],
//                                 'full_name' => $data['first_name'],
//                                 'middle_name' => $data['middle_name'] ?? null,
//                                 'last_name' => $data['last_name'] ?? null,
//                                 'mobile' => $data['mobile'],
//                                 'email' => $data['email'] ?? null,
//                                 'father_name' => $data['relative_first_name'] ?? null,
//                                 'relative_middle_name' => $data['relative_middle_name'] ?? null,
//                                 'relative_last_name' => $data['relative_last_name'] ?? null,
//                                 'relation' => $data['relation'] ?? null,
//                                 'exam_date' => $examdate->date_id ?? 0,
//                                 'fee' => $data['fee'] ?? 0,
//                                 'verify_status' => match (strtolower($data['details_verification'] ?? '')) {
//                                     'rejected' => 3,
//                                     'verified' => 2,
//                                     default => 1,
//                                 },
//                                 'fee_status' => $feeStatus,
//                             ]
//             );
//                 // if ($existing) {
//                 //     $duplicateFailures++;
//                 //     $duplicate_rows[] = $row;
//                 // } 
    
//             } catch (\Exception $e) {
//                // echo $e->getMessage();die();
//                 $errors[] = ['line' => $lineNumber];
//                 $errorRows[] = $row;
//             }
//         }
    
//             $totalRows = count($rows);
//             $errorCount = count($errors);
//             $successCount = $totalRows - $errorCount;
//            // $successCount = $totalRows - $errorCount-$duplicateFailures;

//         if (!empty($errors)) {
//             $filename = 'failed_rows_' . now()->format('Ymd_His') . '.csv'; 
//             $response = Response::streamDownload(function () use ($header, $errorRows) {
//                 $handle = fopen('php://output', 'w');
//                 fputcsv($handle, $header);
//                 foreach ($errorRows as $row) {
//                     fputcsv($handle, $row);
//                 }
//                 fclose($handle);
//             }, $filename, [
//                 'Content-Type' => 'text/csv',
//                 'Content-Disposition' => 'attachment; filename="'.$filename.'"',
//             ]);            

//             $response->headers->set('X-Upload-Message', 'Upload completed with some errors.');
//             $response->headers->set('X-Total-Rows', $totalRows);
//             $response->headers->set('X-Error-Rows', $errorCount);
//             $response->headers->set('X-Success-Rows', $successCount);
//             $response->headers->set('X-duplicate-Rows', $duplicateFailures);

//             return $response;
//         }

        
//         // if (!empty($duplicateFailures)) {
//         //     $filename = 'failed_rows_' . now()->format('Ymd_His') . '.csv'; 
//         //     $response = Response::streamDownload(function () use ($header, $duplicate_rows) {
//         //         $handle = fopen('php://output', 'w');
//         //         fputcsv($handle, $header);
//         //         foreach ($duplicate_rows as $row) {
//         //             fputcsv($handle, $row);
//         //         }
//         //         fclose($handle);
//         //     }, $filename, [
//         //         'Content-Type' => 'text/csv',
//         //         'Content-Disposition' => 'attachment; filename="'.$filename.'"',
//         //     ]);            

//         //     $response->headers->set('X-Upload-Message', 'Upload completed with some errors.');
//         //     $response->headers->set('X-Total-Rows', $totalRows);
//         //     $response->headers->set('X-Error-Rows', $errorCount);
//         //     $response->headers->set('X-Success-Rows', $successCount);
//         //     $response->headers->set('X-duplicate-Rows', $duplicateFailures);

//         //     return $response;
//         // }

//         return response()->json([
//             'message' =>   $successCount==0 ?'Upload faild' :'All students uploaded successfully.',
//             'total_rows' => $totalRows,
//             'error_rows' => $errorCount,
//             'successful_inserts' => $successCount,
//             //'duplicate' => $duplicateFailures,
//         ]);


//     }



public function upload(Request $request){
        $request->validate([
            'file' => 'required|mimes:csv,txt|max:2048',
        ]);
    
        $file = $request->file('file');
        $user = Auth::guard('school')->user();
    
        $rawContent = file_get_contents($file->getRealPath());
        $utf8Content = mb_convert_encoding($rawContent, 'UTF-8', 'UTF-8, ISO-8859-1, Windows-1252');
    
        $lines = explode(PHP_EOL, $utf8Content);
        $rows = array_filter(array_map('str_getcsv', $lines), function ($row) {
            return count(array_filter($row)) > 0;
        });
    
        $header = array_map('trim', array_map('strtolower', array_shift($rows)));
    
        $errors = [];
        $errorRows = [];
        $duplicateFailures =0;
        $insertCount = 0;
        $updateCount = 0;

        foreach ($rows as $index => $row) {
         $lineNumber = $index + 2;
        
    try {
        // Check if the column count matches the header
        if (count($row) !== count($header)) {
            $errors[] = ['line' => $lineNumber, 'error' => 'Column count mismatch'];
            $errorRows[] = $row;
            continue;
        }

        // Combine header and row into an associative array
        $data = array_combine($header, $row);

        // Skip rows where admission_no is empty
        if (empty(trim($data['admission_no'] ?? ''))) {
            //continue;
            $errors[] = ['line' => $lineNumber, 'error' => 'Column count mismatch'];
            $errorRows[] = $row;
            continue;
        }

        // Determine which subjects are selected for this row
        $subjects = [];
        $validInputs = ['yes', 'no'];

        $subjectMappings = [
            'english' => 'English',
            'mathematics' => 'Mathematics',
            'evs' => 'EVS',
            'science' => 'Science',
            'india awareness' => 'India Awareness',
        ];

        foreach ($subjectMappings as $column => $subject) {
            $value = strtolower(trim($data[$column] ?? ''));
            if (in_array($value, $validInputs) && $value === 'yes') {
                $subjects[] = $subject;
            }
        }

        if (!empty($subjects)) {
            // Fetch the subject IDs based on the subject names
            $subjectIds = Subject::whereIn('name', $subjects)->pluck('id')->toArray();
        } else {
            $errors[] = ['line' => $lineNumber];
            $errorRows[] = $row;
            continue;
        }

         if($data['mobile']){
               $data['mobile'] = preg_replace('/\D/', '', $data['mobile']);             
        }
        

        // Validate required fields
        $validator = Validator::make($data, [
            'admission_no' => 'required',
            'first_name' => 'required',
            'class' => 'required', 
            'section' => 'required', 
            'relation' => 'required',
            'relative_first_name' => 'required',
            //'mobile' => ['required', 'regex:/^\d{10}$/'],
        ]);
         

        if ($validator->fails()) {
            $errors[] = ['line' => $lineNumber];
            $errorRows[] = $row;
            continue;
        }

        // Retrieve school registration and exam date
        $scid = SchoolRegistration::where('school_id', $user->school_id)->first();
        $examdate = GenrateLink::where('school_id', $scid->id)->first();

        // Determine fee status
        // $feeStatus = 0;
        // if (!empty($data['fee']) && $data['fee'] > 0) {
        //     $feeStatus = 1;
        // } else {
        //     $feeStatus = strtolower($data['fee_status'] ?? '') === 'paid' ? 1 : 0;
        // }

        // Check if a student record with the same admission_no already exists
        $existingRecord = Student::where('admission_no', $data['admission_no'])
            ->where('school_id', $user->school_id)
            ->first();

        if ($existingRecord) {
            // If a record exists, merge the existing subject IDs with the new ones
            // $existingSubjectIds = explode(',', $existingRecord->subject_id); // Assuming 'subject_id' is a comma-separated string
            // $mergedSubjectIds = array_merge($existingSubjectIds, $subjectIds);
            // // Remove duplicates and reindex the array
            // $mergedSubjectIds = array_unique($mergedSubjectIds);

            // Final comma-separated list of unique subjects
            $subjectIdsString = implode(',', $subjectIds);
        } else {
            // If no existing record, just use the new subject IDs
            $subjectIdsString = implode(',', $subjectIds);
        }

        // Convert Roman numeral class to integer
            $romanToNumber = [
                'I' => 1,
                'II' => 2,
                'III' => 3,
                'IV' => 4,
                'V' => 5,
                'VI' => 6,
                'VII' => 7,
                'VIII' => 8,
                'IX' => 9,
                'X' => 10,
                'XI' => 11,
                'XII' => 12,
            ];

            // Normalize and convert class value if it’s in Roman format
            $classValue = strtoupper(trim($data['class']));
            if (isset($romanToNumber[$classValue])) {
                $data['class'] = $romanToNumber[$classValue];
            }


            preg_match('/\d+/', $data['class'], $matches);
            $data['class'] = isset($matches[0]) ? (int)$matches[0] : 0;

        // Insert or update the student record
           $student=Student::updateOrCreate(
                ['admission_no' => $data['admission_no'], 'school_id' => $user->school_id],
                [
                    'class' => $data['class'],
                    'subject_id' => $subjectIdsString,  // Use the precomputed value here
                    'section' => $data['section'],
                    'full_name' => $data['first_name'],
                    'middle_name' => $data['middle_name'] ?? null,
                    'last_name' => $data['last_name'] ?? null,
                    'mobile' => $data['mobile'],
                    'email' => $data['email'] ?? null,
                    'father_name' => $data['relative_first_name'] ?? null,
                    'relative_middle_name' => $data['relative_middle_name'] ?? null,
                    'relative_last_name' => $data['relative_last_name'] ?? null,
                    'relation' => $data['relation'] ?? null,
                    'exam_date' => $examdate->date_id ?? 0,
                    'fee' => $data['fee'] ?? 0,
                    'created_by'=>$user->id,
                    'verify_status' => match (strtolower($data['details_verification'] ?? '')) {
                        'rejected' => 3,
                        'verified' => 2,
                        default => 1,
                    },
                    'fee_status' =>strtolower($data['fee_status'] ?? '') === 'paid' ? 1 : 0,
                ]
            );
            if ($student->wasRecentlyCreated) {
                $insertCount++;
            } else {
                $updateCount++;
            }

            } catch (\Exception $e) {
                // Handle any exceptions
                $errors[] = ['line' => $lineNumber, 'error' => $e->getMessage()];
                $errorRows[] = $row;
            }
        }

    
            $totalRows = count($rows);
            $errorCount = count($errors);
            $successCount = max(0,$totalRows - $errorCount);
            if($insertCount == 0){
                if($updateCount > 0){
                    $successCount = max(0,$updateCount - $errorCount);
                }
            }
           // $successCount = $totalRows - $errorCount-$duplicateFailures;
 
            if (!empty($errors)) {
                $filename = 'failed_rows_' . now()->format('Ymd_His') . '.csv'; 
                $response = Response::streamDownload(function () use ($header, $errorRows) {
                    $handle = fopen('php://output', 'w');
                    fputcsv($handle, $header);
                    foreach ($errorRows as $row) {
                        fputcsv($handle, $row);
                    }
                    fclose($handle);
                }, $filename, [
                    'Content-Type' => 'text/csv',
                    'Content-Disposition' => 'attachment; filename="'.$filename.'"',
                ]);            

                $response->headers->set('X-Upload-Message', 'Upload completed with some errors.');
                $response->headers->set('X-Total-Rows', $totalRows);
                $response->headers->set('X-Error-Rows', $errorCount);
                $response->headers->set('X-Success-Rows', $successCount);
                $response->headers->set('X-duplicate-Rows', $duplicateFailures);

                return $response;
            }

        
        // if (!empty($duplicateFailures)) {
        //     $filename = 'failed_rows_' . now()->format('Ymd_His') . '.csv'; 
        //     $response = Response::streamDownload(function () use ($header, $duplicate_rows) {
        //         $handle = fopen('php://output', 'w');
        //         fputcsv($handle, $header);
        //         foreach ($duplicate_rows as $row) {
        //             fputcsv($handle, $row);
        //         }
        //         fclose($handle);
        //     }, $filename, [
        //         'Content-Type' => 'text/csv',
        //         'Content-Disposition' => 'attachment; filename="'.$filename.'"',
        //     ]);            

        //     $response->headers->set('X-Upload-Message', 'Upload completed with some errors.');
        //     $response->headers->set('X-Total-Rows', $totalRows);
        //     $response->headers->set('X-Error-Rows', $errorCount);
        //     $response->headers->set('X-Success-Rows', $successCount);
        //     $response->headers->set('X-duplicate-Rows', $duplicateFailures);

        //     return $response;
        // }

        return response()->json([
            'message' =>   $successCount==0 ?'Upload faild' :'All students uploaded successfully.',
            'total_rows' => $totalRows,
            'error_rows' => $errorCount,
            'successful_inserts' => $successCount,
            //'duplicate' => $duplicateFailures,
        ]);


}
 

 
// public function upload(Request $request)
//     {
//         $request->validate([
//             'file' => 'required|mimes:csv,txt|max:2048',
//         ]);
   
//         $file = $request->file('file');
//         $user = Auth::guard('school')->user();
   
//         $rawContent = file_get_contents($file->getRealPath());
//         $utf8Content = mb_convert_encoding($rawContent, 'UTF-8', 'UTF-8, ISO-8859-1, Windows-1252');
   
//         $lines = explode(PHP_EOL, $utf8Content);
//         $rows = array_filter(array_map('str_getcsv', $lines), function ($row) {
//             return count(array_filter($row)) > 0;
//         });
   
//         $header = array_map('trim', array_map('strtolower', array_shift($rows)));
   
//         $errors = [];
//         $errorRows = [];
//         $duplicateFailures =0;
//         foreach ($rows as $index => $row) {
//        $lineNumber = $index + 2;
 
//     try {
//         // Check if the column count matches the header
//         if (count($row) !== count($header)) {
//             $errors[] = ['line' => $lineNumber, 'error' => 'Column count mismatch'];
//             $errorRows[] = $row;
//             continue;
//         }
 
//         // Combine header and row into an associative array
//         $data = array_combine($header, $row);
 
//         // Skip rows where admission_no is empty
//         if (empty(trim($data['admission_no'] ?? ''))) {
//             continue;
//         }
 
//         // Determine which subjects are selected for this row
//         $subjects = [];
//         $validInputs = ['yes', 'no'];
 
//         $subjectMappings = [
//             'english' => 'English',
//             'mathematics' => 'Mathematics',
//             'evs' => 'EVS',
//             'science' => 'Science',
//             'india awareness' => 'India Awareness',
//         ];
 
//         foreach ($subjectMappings as $column => $subject) {
//             $value = strtolower(trim($data[$column] ?? ''));
//             if (in_array($value, $validInputs) && $value === 'yes') {
//                 $subjects[] = $subject;
//             }
//         }
 
//         if (!empty($subjects)) {
//             // Fetch the subject IDs based on the subject names
//             $subjectIds = Subject::whereIn('name', $subjects)->pluck('id')->toArray();
//         } else {
//             $errors[] = ['line' => $lineNumber];
//             $errorRows[] = $row;
//             continue;
//         }
 
//         // Validate required fields
//         $validator = Validator::make($data, [
//             'admission_no' => 'required',
//             'first_name' => 'required',
//             'class' => 'required',
//             'section' => 'required',
//             'relation' => 'required',
//             'relative_first_name' => 'required',
//             'mobile' => ['required', 'digits:10', 'regex:/^[0-9]{10}$/'],
//         ]);
 
//         if ($validator->fails()) {
//             $errors[] = ['line' => $lineNumber];
//             $errorRows[] = $row;
//             continue;
//         }
 
//         // Retrieve school registration and exam date
//         $scid = SchoolRegistration::where('school_id', $user->school_id)->first();
//         $examdate = GenrateLink::where('school_id', $scid->id)->first();
 
//         // Determine fee status
//         // $feeStatus = 0;
//         // if (!empty($data['fee']) && $data['fee'] > 0) {
//         //     $feeStatus = 1;
//         // } else {
//         //     $feeStatus = strtolower($data['fee_status'] ?? '') === 'paid' ? 1 : 0;
//         // }
 
//         // Check if a student record with the same admission_no already exists
//         $existingRecord = Student::where('admission_no', $data['admission_no'])
//             ->where('school_id', $user->school_id)
//             ->first();
 
//         if ($existingRecord) {
//             // If a record exists, merge the existing subject IDs with the new ones
//             $existingSubjectIds = explode(',', $existingRecord->subject_id); // Assuming 'subject_id' is a comma-separated string
//             $mergedSubjectIds = array_merge($existingSubjectIds, $subjectIds);
 
//             // Remove duplicates and reindex the array
//             $mergedSubjectIds = array_unique($mergedSubjectIds);
 
//             // Final comma-separated list of unique subjects
//             $subjectIdsString = implode(',', $mergedSubjectIds);
//         } else {
//             // If no existing record, just use the new subject IDs
//             $subjectIdsString = implode(',', $subjectIds);
//         }
 
//         // Insert or update the student record
//         Student::updateOrCreate(
//             ['admission_no' => $data['admission_no'], 'school_id' => $user->school_id],
//             [
//                 'class' => $data['class'],
//                 'subject_id' => $subjectIdsString,  // Use the precomputed value here
//                 'section' => $data['section'],
//                 'full_name' => $data['first_name'],
//                 'middle_name' => $data['middle_name'] ?? null,
//                 'last_name' => $data['last_name'] ?? null,
//                 'mobile' => $data['mobile'],
//                 'email' => $data['email'] ?? null,
//                 'father_name' => $data['relative_first_name'] ?? null,
//                 'relative_middle_name' => $data['relative_middle_name'] ?? null,
//                 'relative_last_name' => $data['relative_last_name'] ?? null,
//                 'relation' => $data['relation'] ?? null,
//                 'exam_date' => $examdate->date_id ?? 0,
//                 'fee' => $data['fee'] ?? 0,
//                 'verify_status' => match (strtolower($data['details_verification'] ?? '')) {
//                     'rejected' => 3,
//                     'verified' => 2,
//                     default => 1,
//                 },
//                 'fee_status' =>strtolower($data['fee_status'] ?? '') === 'paid' ? 1 : 0,
//             ]
//         );
 
//             } catch (\Exception $e) {
//                 // Handle any exceptions
//                 $errors[] = ['line' => $lineNumber, 'error' => $e->getMessage()];
//                 $errorRows[] = $row;
//             }
//         }
 
   
//             $totalRows = count($rows);
//             $errorCount = count($errors);
//             $successCount = $totalRows - $errorCount;
//            // $successCount = $totalRows - $errorCount-$duplicateFailures;
 
//             if (!empty($errors)) {
//                 $filename = 'failed_rows_' . now()->format('Ymd_His') . '.csv';
//                 $response = Response::streamDownload(function () use ($header, $errorRows) {
//                     $handle = fopen('php://output', 'w');
//                     fputcsv($handle, $header);
//                     foreach ($errorRows as $row) {
//                         fputcsv($handle, $row);
//                     }
//                     fclose($handle);
//                 }, $filename, [
//                     'Content-Type' => 'text/csv',
//                     'Content-Disposition' => 'attachment; filename="'.$filename.'"',
//                 ]);            
 
//                 $response->headers->set('X-Upload-Message', 'Upload completed with some errors.');
//                 $response->headers->set('X-Total-Rows', $totalRows);
//                 $response->headers->set('X-Error-Rows', $errorCount);
//                 $response->headers->set('X-Success-Rows', $successCount);
//                 $response->headers->set('X-duplicate-Rows', $duplicateFailures);
 
//                 return $response;
//             }
 
       
//         // if (!empty($duplicateFailures)) {
//         //     $filename = 'failed_rows_' . now()->format('Ymd_His') . '.csv';
//         //     $response = Response::streamDownload(function () use ($header, $duplicate_rows) {
//         //         $handle = fopen('php://output', 'w');
//         //         fputcsv($handle, $header);
//         //         foreach ($duplicate_rows as $row) {
//         //             fputcsv($handle, $row);
//         //         }
//         //         fclose($handle);
//         //     }, $filename, [
//         //         'Content-Type' => 'text/csv',
//         //         'Content-Disposition' => 'attachment; filename="'.$filename.'"',
//         //     ]);            
 
//         //     $response->headers->set('X-Upload-Message', 'Upload completed with some errors.');
//         //     $response->headers->set('X-Total-Rows', $totalRows);
//         //     $response->headers->set('X-Error-Rows', $errorCount);
//         //     $response->headers->set('X-Success-Rows', $successCount);
//         //     $response->headers->set('X-duplicate-Rows', $duplicateFailures);
 
//         //     return $response;
//         // }
 
//         return response()->json([
//             'message' =>   $successCount==0 ?'Upload faild' :'All students uploaded successfully.',
//             'total_rows' => $totalRows,
//             'error_rows' => $errorCount,
//             'successful_inserts' => $successCount,
//             //'duplicate' => $duplicateFailures,
//         ]);
 
 
//     }
 
 

    public function downloadReport(Request $request)
{
    $request->validate([
        'from' => 'required|date',
        'to' => 'required|date|after_or_equal:from',
    ]);

    $user = Auth::guard('school')->user();

    $students = Student::where('school_id', $user->school_id)
        ->whereBetween('created_at', [$request->from . ' 00:00:00', $request->to . ' 23:59:59'])
        ->get();

    if ($students->isEmpty()) {
        return back()->with('error', 'No record found in the selected date range.');
    }

    $filename = 'Download-Student-Report-' . now()->format('Ymd_His') . '.csv';
    $path = storage_path('app/' . $filename);
    $fp = fopen($path, 'w');

    // CSV Header
    fputcsv($fp, [
       'Admission No.', 'First Name',
        'Middle Name', 'Last Name', 'Class', 'Section','Subject', 'Mobile No.', 'Email ID', 'Relative Name','Relation','Amount Due','Created'
    ]);

    // Data
    foreach ($students as $student) {
        $subjectIds = explode(',', $student->subject_id);
        $subjectNames =Subject::whereIn('id', $subjectIds)->pluck('name')->toArray();
        $subjectList = implode(',', $subjectNames);
        fputcsv($fp, [
            $student->admission_no,
            $student->full_name,
            $student->middle_name,
            $student->last_name,
            $student->class,           
            $student->section,
            $subjectList, // show names, not IDs
            $student->mobile,
            $student->email,
            $student->father_name,    
            $student->relation,                   
            $student->fee,                   
            $student->created_at->format('d-m-Y'),
        ]);
    }

    fclose($fp);

    return response()->download($path)->deleteFileAfterSend(true);
}




public function check_student_verification(Request $request)
{
    $user = Auth::guard('school')->user();
    $request->validate([
        'student_id' => 'required|integer|exists:students,id',
        'status' => 'required|boolean',
    ]);

    $student = Student::find($request->student_id);
    $scid = SchoolRegistration::where('school_id', $student->school_id)->first();
    $sd = SchoolDetails::where('registration_id', $scid->id)->first();
    $student->verify_status = $request->status==1 ? '2':'3';
    $student->updated_by = $user->id;
    $subject = 'Student Registration Process';
    if($student->save()){
        if($student->verify_status == 3){
        try { 
            Mail::send('email_template.verification', ['student' => $student, 'school_name' => $sd->school_name], function ($message) use ($student,$subject) {
                $message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
                $message->to($student->email);
                $message->subject($subject);
            });
        } catch (\Exception $e) { 
            return response()->json(['message' => $e->getMessage()]);
        }   
    }
        return response()->json(['message' => 'success']);
    }else{
        return response()->json(['message' => 'failed.']);
    }
    
}


public function updatevefifyStatus(Request $request)
{
    $user = Auth::guard('school')->user();

    $request->validate([
        'entries' => 'required|array',
        'entries.*.id' => 'required|integer',
    ]);

    foreach ($request->entries as $entry) {
        // Check if the student exists and belongs to the current school (optional filter)
        $student = DB::table('students')
            ->where('id', $entry['id']) 
            ->first();
        if ($student) {
            DB::table('students')->where('id', $entry['id'])->update([
                'verify_status' => $entry['status'],
                'updated_by'=>$user->id,
                'updated_at' => now(),
            ]);
        }
    }

    return response()->json(['message' => 'Verification status updated successfully.']);
}




public function student_result($admno){
     $user = Auth::guard('school')->user();
     $theirUid = $user->school_id.$admno;
     //$theirUid = "SO092500102107403";
     
     $students = ExamResult::select('school_name','grade_id','student_name')->where('student_id',$theirUid)->limit(1)->first();    
     if(empty($students)){
        return view('blank_result');
     }
     $results  =  ExamResult::select('subject_name','SparkScore','SchoolAverage','TestAverage','Comment','Performance_Band')->where('student_id',$theirUid)->get();
     if(empty($results)){
          return view('blank_result');   
     }
     $results2  =  StudentCompantancyScore::select('subject_name','CompetencyDescription','Competency_Score','SchoolComptencyScore','TestCompetencyScore','Competency')->where('student_id',$theirUid)->get();
     if(empty($results2)){
           return view('blank_result');  
     }
        // $results = $results->filter(function($row) {
        //     return $row->student_score > 0;
        // });


        // $results = $results->map(function ($row) {
        //     if ($row->student_score >= 70) {
        //         $row->performance_band = 'Strong Performer';
        //     } elseif ($row->student_score >= 50) {
        //         $row->performance_band = 'Confident Learner';
        //     } else {
        //         $row->performance_band = 'Needs Support';
        //     }
        //     return $row;
        // });

        return view('student_result',compact('results','students','results2'));
        
    }



    public function student_certifcate($admno, $school_id, $subjectid){
        $student = StudentCertifacate::where('studetid',$admno)->where('schoolid',$school_id)->where('subjectid',$subjectid)->first();

    }


    public function certifcate_download($filename)
    {
        $filePath = public_path('certificate/' . $filename);

        if (!File::exists($filePath)) {
            abort(404, 'File not found.');
        }

        return response()->download(
            $filePath,
            $filename,
            [
                'Content-Type' => File::mimeType($filePath),
                'Content-Disposition' => 'attachment; filename="'.$filename.'"',
            ]
        );
    }





    
    public function bulkcertifcate_download($schoolId)
    {
        $folderPath = public_path('certificate');
        $zipFileName = $schoolId . '_certificates.zip';
        $zipPath = public_path($zipFileName);
    
        if (!File::exists($folderPath)) {
            abort(404, 'Certificate folder not found');
        }
    
        $files = File::files($folderPath);
    
        $zip = new ZipArchive;
        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
            abort(500, 'Could not create ZIP file');
        }
    
        foreach ($files as $file) {
            // check filename starts with school ID
            if (str_starts_with($file->getFilename(), $schoolId)) {
                $zip->addFile($file->getPathname(), $file->getFilename());
            }
        }
    
        $zip->close();
            
        if (!File::exists($zipPath) || filesize($zipPath) === 0) {
            abort(404, 'No certificates found for this school ID');
        }
    
        return response()->download($zipPath)->deleteFileAfterSend(true);
    }
    




}
