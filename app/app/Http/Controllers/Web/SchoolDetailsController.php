<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\SchoolDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class SchoolDetailsController extends Controller
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
    // public function store(Request $request)
    // {
    //          // Validate input
    //          $request->validate([
    //             //'registration_id' => 'required|string|max:255|unique:schools',
    //             'board_id'        => 'required|integer',
    //             'school_name'     => 'required|string|max:255',
    //             'state_id'        => 'required|integer',
    //             'district_id'     => 'required|integer',
    //             'city_id'         => 'required',
    //             'pin'             => 'required|integer',
    //         ]);
                         
    //         if(isset($request->registration_id_from_admin)){
    //            $school = SchoolDetails::where('registration_id',$request->registration_id_from_admin)->first();

    //             // Update the record
    //             $school->board_id    = $request->board_id;
    //             $school->school_name = $request->school_name;
    //             $school->state_id    = $request->state_id;
    //             $school->district_id = $request->district_id;
    //             $school->city_id     = $request->city_id;
    //             $school->pin         = $request->pin;
    //             $school->save();
    //             return redirect()->back()->with('success', 'School information update successfully.');
    //         }else{         
    //             $sr=SchoolDetails::create($request->all());    
    //             return redirect()->back()->with('success', 'School information saved successfully.');
    //         }
    // }


    public function store(Request $request)
    {
        $request->validate([
            'board_id'    => 'required|integer',
            'school_name' => 'required|string|max:255',
            'state_id'    => 'required|integer',
            'district_id' => 'required|integer',
            'city_id'     => 'required',
            'pin'         => 'required|integer',
        ]);

        Session::put('schoolid', $request->registration_id);
        if(isset($request->registration_id_from_admin)){
            $school = SchoolDetails::where('registration_id',$request->registration_id_from_admin)->first();

             // Update the record
             $school->board_id    = $request->board_id;
             $school->school_name = $request->school_name;
             $school->state_id    = $request->state_id;
             $school->district_id = $request->district_id;
             $school->city_id     = $request->city_id;
             $school->pin         = $request->pin;
             $school->save();
             return redirect()->back()->with('success', 'School information update successfully.');
         }else{ 
            $data = $request->all();
            $school = SchoolDetails::where('registration_id', $request->registration_id)->first();
            if ($school) {
                $school->update($data);
                $message = 'School information updated successfully.';
            } else {
                SchoolDetails::create($data);
                $message = 'School information saved successfully.';
            }
            return redirect(route('head.of.school'))->with('success', $message);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SchoolDetails $schoolDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SchoolDetails $schoolDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SchoolDetails $schoolDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchoolDetails $schoolDetails)
    {
        //
    }
    public function getSchool(Request $request)
    {
        
        $query = $request->get('name');
        $schools = DB::table('school_details as a')
        ->join('district as b', 'a.district_id', '=', 'b.districtid')
        ->join('state as c', 'a.state_id', '=', 'c.state_id')
        ->join('board as d', 'a.board_id', '=', 'd.id')
        ->join('generate_url as e', 'a.registration_id', '=', 'e.registration_id')
        ->select('a.id','b.district_title','a.school_name','c.state_title','a.city_id','a.pin','e.school_url')
        ->where('a.school_name', 'LIKE', "%{$query}%")
        ->groupBy('a.school_name')
        ->get();

        return response()->json(['status'=>200,'data' => $schools]);
    }
    
    public function autocomplete(Request $request)
    {
        $query = $request->get('query');

        $schools = DB::table('school_details')
        ->where('school_name', 'LIKE', "%{$query}%")
        ->groupBy('school_name')
        ->get();
        $output = '';
        if ($schools->count()) {
            foreach ($schools as $school) {
                $output .= '<a href="#" class="list-group-item list-group-item-action school-suggestion text-capitalize">' . $school->school_name . '</a>';
            }
        } else {
            $output = '';
        }
        return response($output);
    }


      public function student_login_get_school(Request $request)
    {
        
        $query = $request->get('name');
        $schools = DB::table('school_details as a')
        ->join('district as b', 'a.district_id', '=', 'b.districtid')
        ->join('state as c', 'a.state_id', '=', 'c.state_id')
        ->join('board as d', 'a.board_id', '=', 'd.id')
        ->join('generate_url as e', 'a.registration_id', '=', 'e.registration_id')
        ->select('a.id','b.district_title','a.school_name','c.state_title','a.city_id','a.pin','e.school_url')
        ->where('a.school_name', 'LIKE', "%{$query}%")
        ->groupBy('a.school_name')
        ->get();

        return response()->json(['status'=>200,'data' => $schools]);
    }



    public function school_reprot($schoolid){
        $schoolSubjects = DB::table('school_subject_summry')
        ->where('School_id', $schoolid)
        ->orderBy('grade_id')
        ->orderBy('subject_name')
        ->get()
        ->groupBy('grade_id')
        ->map(function ($group) {
            return collect($group);
        });
          if(empty($schoolSubjects)){
             return view('school_blank');   
         }

        $records = DB::table('spark_school_competencysummary')
        ->where('School_id', $schoolid)
        ->orderBy('grade_id')
        ->orderBy('subject_name')
        ->get()
        ->groupBy(function ($item) {
            return $item->grade_id . '_' . $item->subject_name;
        });
          if(empty($records)){
          return view('school_blank');   
          }
            return view('school_result',compact('schoolSubjects','records'));
    }



 


}
