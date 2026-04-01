<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Clases;
use App\Models\GenrateLink;
use App\Models\SchoolRegistration;
use App\Models\SchoolDetails;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class StudentController extends Controller
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
    public function create(Request $request)
    {
        $sd = SchoolRegistration::where('school_id',$request->school_id)->first(); 
        $school_details = SchoolDetails::where('registration_id',$sd->id)->first();
        $st1 = Student::where('school_id', $request->school_id)
            ->where('admission_no', $request->admno)
            ->where('verify_status', 2)
            ->first();

            if(!empty($st1)){
                return redirect()->back()->with('error', "Entered admission/enrollment no. is already registered");
            }
            

            $st = Student::where('school_id', $request->school_id)
            ->where('admission_no', $request->admno) 
            ->first(); 
            $cc = Clases::get();
            $admission_no = $request->admno;        
            if(empty($st)){
                $st = new Student();
                $st->school_id     = $request->school_id;
                $st->admission_no  = $request->admno;
                $st->save(); 
                return view('web.student_register', compact('admission_no', 'cc','st','sd','school_details'));
            }
            else{ 
                return view('web.student_register', compact('admission_no', 'cc','st','sd','school_details'));
            }
               
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        try {
           
            if(empty($request->input('subject_id'))){
                return response()->json(['status'=>404,'message' => 'Please select one or more exams you wish to participate in.']);
            }
            $validated = $request->validate([
                'full_name'       => ['required', 'string', 'max:50', 'regex:/^[a-zA-Z\s]+$/'],
                'father_name'     => ['required', 'string', 'max:50', 'regex:/^[a-zA-Z\s]+$/'],
                'class'           => 'required|string|max:50',
                'section'         => ['required', 'string', 'max:50', 'regex:/^[a-zA-Z\s]+$/'],
                'mobile'          => 'nullable|string|max:20',
                'email'           => 'nullable|email|max:255',
                // 'utr'             => 'required',
                // 'attachment' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            ]);

            
            $student = Student::where('admission_no', $request->admission_no)->first();
            $scid = SchoolRegistration::where('school_id', $student->school_id)->first();
            $examdate = GenrateLink::where('school_id', $scid->id)->first();
            if ($student) {
 
         
 
                $student->update([
                    'full_name'     => $request->input('full_name'),
                    'father_name'   => $request->input('father_name'),
                    'relation'      => $request->input('relation'),
                    'relative_middle_name'      => $request->input('relative_middle_name'),
                    'relative_last_name'        => $request->input('relative_last_name'),
                    'class'         => $request->input('class'),
                    'section'       => $request->input('section'), 
                    'mobile'        => $request->input('mobile'),
                    'email'         => $request->input('email'),
                    'middle_name'   => $request->input('middle_name'),
                    'last_name'     => $request->input('last_name'),
                    'subject_id'    => implode(',', $request->input('subject_id')),
                    'exam_date'     => !empty($examdate->date_id) ? $examdate->date_id:null,
                    'fee'           => $request->total_amount,
                   
                ]);

                if($scid->online_payment==0){
                        return response()->json(['status'=>200,'message' => 'Student record updated successfully.','online_payment'=>0,'route'=>route('register.successfully')]);
                }else{
                    return response()->json([
                        'status' => 200,
                        'online_payment'=>1,
                       // 'message' => 'Student record updated successfully.',
                        'route' => route('students.payment.page', ['id' => $student->id])
                    ]); 
                } 
               
            } else{
                return response()->json(['status'=>404,'message' => 'Student admission number not found.']);
            }
        } catch (\Exception $e) {
                    return response()->json([
                        'status' => 500,
                        'message' => $e->getMessage()
                    ]);
            }

    }


    /**
     * Display the specified resource.
     */
    public function register_successfully(Student $student)
    {
        return view('web.student_register_thankyou');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function payment($id)
    {
      
        $students = Student::select(
                'students.*',
                'class.name as class_name',
                DB::raw('GROUP_CONCAT(subject.name ORDER BY subject.name SEPARATOR ", ") as subject_names')
            )
            ->join('class', 'class.id', '=', 'students.class')  
            ->join('subject', function ($join) {
                $join->on(DB::raw('FIND_IN_SET(subject.id, students.subject_id)'), '>', DB::raw('0'));
            })
            ->where('students.id', $id)
            ->groupBy('students.id')
            ->first();
            $scid = SchoolRegistration::where('school_id', $students->school_id)->first();
            $sd = SchoolDetails::where('registration_id', $scid->id)->first();
            return view('web.payment',compact('students','scid','sd'));
    }

     public function save_payment(Request $request,$id)
    {

                $validated = $request->validate([ 
                    'utr'             => 'required',
                    'attachment' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
                ]);                
            $attachment = $request->file('attachment');
        
            // Get file extension
            $extension = strtolower($attachment->getClientOriginalExtension());
            $allowedExtensions = ['jpeg', 'jpg', 'png'];
        
            // Additional manual extension check (optional but good for clarity or logging)
            if (!in_array($extension, $allowedExtensions)) {
                return back()->with('error', 'Invalid file extension.');
            }
        
            // Generate a unique filename
            $filename = $request->file('utr') . '_' . time() . '_' . Str::random(10) . '.' . $extension;
        
            // Move image to public/school_logo directory
            $attachment->move(public_path('attachment'), $filename);
        
            // Save image path in user model
            $attachments = 'attachment/' . $filename;

               $student=Student::find($id);
               $update= $student->update([
                    'utr'  => $request->input('utr'),                    
                    'attachment'  => $attachments                    
                ]);
                if($update){
                    return redirect()->route('register.successfully');
                }else{
                       return redirect()->back()->with('error', 'Something went wrong.');
                }             
    }
}