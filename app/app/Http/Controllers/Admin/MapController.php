<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Clases;
use App\Models\Map_Subject;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use DB;
class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {       
        
        $subjects = DB::table('map_subject')
        ->select(
            'map_subject.id as mapid',
            'subject.id as subid',
            'subject.name as subject_name',
            DB::raw('GROUP_CONCAT(DISTINCT class.name ORDER BY class.name SEPARATOR ", ") as class_names')
        )
        ->leftJoin('class', function($join) {
            $join->whereRaw('FIND_IN_SET(class.id, map_subject.class_id)');
        })
        ->leftJoin('subject', function($join) {
            $join->whereRaw('FIND_IN_SET(subject.id, map_subject.subject_id)');
        })
        ->groupBy('map_subject.id', 'subject.id', 'subject.name')
        ->get();
    
          
        return view('admin.map_subject.view',compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        $clases=Clases::get();
        $subjects=Subject::get();
        
        return view('admin.map_subject.add',compact('clases','subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         
            try {
                // Validation
                $request->validate([
                    'class_id' => 'required|array',
                    'class_id.*' => 'exists:class,id',
                    'subject' => 'required|string|max:255',
                ]);
        
                $selectedClasses = $request->input('class_id'); // array of class IDs
                $subjectName = trim($request->input('subject')); // sanitized subject name
        
                // Try to find an existing subject with the same name
                $existing = Map_Subject::where('subject_id',  $subjectName )->first();
        
                if ($existing) {
                    // Get existing class IDs (as array)
                    $existingClassIds = array_filter(explode(',', $existing->class_id));
        
                    // Merge & remove duplicates
                    $allClassIds = array_unique(array_merge($existingClassIds, $selectedClasses));
                    sort($allClassIds); // optional
        
                    $existing->class_id = implode(',', $allClassIds);
                    $existing->save();
        
                    return redirect()->back()->with('success', 'Subject updated with new class(es).');
                } else {
                    // Create new subject with class IDs as comma-separated
                    Map_Subject::create([
                        'subject_id' => $subjectName,
                        'class_id' => implode(',', $selectedClasses),
                    ]);
        
                    return redirect()->back()->with('success', 'Subject created successfully.');
                }
        
            } catch (\Exception $e) {
                //print_r($e->getMessage());
                return redirect()->back()->with('error', $e->getMessage());
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
         $edit = Map_Subject::find($id);
         $clases=Clases::get();
         $subjects=Subject::get();
        return view('admin.map_subject.edit',compact('clases','edit','subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    try {
    $request->validate([
        'class_id' => 'required|array',
        'subject' => 'required|string|max:255',
    ]);

    $subject = Map_Subject::find($id);
    $subject->subject_id = $request->subject;
    $subject->class_id = implode(',', $request->class_id); // save array as CSV
    $subject->save();

    return redirect()->route('manage-map.index')->with('success', 'Map subject updated successfully.');
      } catch (\Exception $e) {
               // print_r($e->getMessage());
                return redirect()->back()->with('error', 'An error occurred while registering. Please try again.');
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
