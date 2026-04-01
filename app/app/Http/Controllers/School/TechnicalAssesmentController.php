<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schoolenrolment;
use App\Models\LabsDetails;
use App\Models\SystemCheck;
use Illuminate\Support\Facades\Auth;
class TechnicalAssesmentController extends Controller
{
    public function index(){
        $user = Auth::guard('school')->user();
        $enrollment_details   = Schoolenrolment::where('registration_id',$user->id)->first();
        $labs=LabsDetails::where('registration_id',$user->id)->get();
        return view('school.technicalassesment',compact('enrollment_details','labs'));
    }
    public function go(Request $request){
        return response()->json(['status'=>200,'message' => 'Start.','data'=>genrate_box($request->labname)]);
    }



    public function start(Request $request){
        $user = Auth::guard('school')->user();
        if(!empty($request->id)){
            $return = SystemCheck::where('school_id',$user->id)->where('lab_id',$request->id)->where('hash_key','!=',$request->hashKey)->first();
            if(!empty($return)){
                $page = view('system_configuration.deatils',compact('return'))->render();
                return response()->json(['status' => 202, 'message' => 'System test already completed.','page'=>$page]);
            }else{
                $return = SystemCheck::where('hash_key',$request->hashKey)->first();
                if(!empty($return)){
                    $return1 = SystemCheck::select('id')->where('school_id',$user->id)->where('lab_id',$request->id)->first();
                    if(!empty($return1)){
                        $page = view('system_configuration.deatils',compact('return'))->render();
                        return response()->json(['status' => 202, 'message' => 'System test already completed.','page'=>$page]);
                    }else{
                        return response()->json(['status' => 409, 'message' => 'System test already completed on this device.']);
                    }
                }else{
                    $page = view('system_configuration.start')->render();
                    return response()->json(['status'=>200,'message' => 'Start.','page'=>$page]);
                }
            }
        }
    }
    public function text(Request $request){
        $PreAssessmentID = $request->id;
        $page = view('system_configuration.text',compact('PreAssessmentID'))->render();
        return response()->json(['status'=>200,'message' => 'Text.','page'=>$page]);
    }
    public function savedata(Request $request){
                $user = Auth::guard('school')->user();

                // Validate input, without 'unique' since we allow updates
                $request->validate([
                    'hash_key'   => 'required|string',
                    'os'         => 'nullable|string',
                    'browser'    => 'nullable|string',
                    'resolution' => 'nullable|string',
                ]);

                // Check if a system check already exists with this hash_key
                $existingCheck = SystemCheck::where('hash_key', $request->hash_key)->first();

                if ($existingCheck) {
                    // Update existing record (excluding hash_key)
                    $existingCheck->update([
                        'ip'         => $request->ip(),
                        'lab_id'     => $request->labs,
                        'os'         => $request->os,
                        'browser'    => $request->browser,
                        'ram'        => $request->ram,
                        'js_enabled' => $request->js_enabled,
                        'status'     => $request->status,
                        'resolution' => $request->resolution,
                    ]);

                    return response()->json([
                        'status'  => 200,
                        'message' => 'System check updated successfully.',
                    ]);
                } else {
                    // New record: Calculate pc_id
                    $lastId = SystemCheck::where('school_id',$user->id)->where('lab_id', $request->labs)->orderBy('id','desc')->value('pc_id');
                    if(!empty($lastId)){
                        $lastId += 1;
                    }else{
                        $lastId = 1; 
                    }
                     $labs = LabsDetails::where('registration_id', $user->id)->where('labs_name', $request->labs)->value('computer_qty');
                    if($lastId > $labs){
                        return response()->json(['status' => 409, 'message' => 'All test have been completed for '.$request->labs]);
                    }

               

                    // Create new system check
                    SystemCheck::create([
                        'ip'         => $request->ip(),
                        'lab_id'     => $request->labs,
                        'pc_id'      => $lastId,
                        'school_id'  => $user->id,
                        'hash_key'   => $request->hash_key,
                        'os'         => $request->os,
                        'browser'    => $request->browser,
                        'ram'        => $request->ram,
                        'js_enabled' => $request->js_enabled,
                        'status'     => $request->status,
                        'resolution' => $request->resolution,
                    ]);

                    return response()->json([
                        'status'  => 200,
                        'message' => 'Your system meets all EdAssess requirements for online testing.',
                    ]);
                }
    }


    public function checkSystem(Request $request){
        $return = SystemCheck::where('hash_key',$request->hash_key)->first();
        if(!empty($return)){
            if($return->status=='Pass'){
                return response()->json(['status' => 409, 'message' => 'System test already completed on this device.','return'=>$return->status]);
            }else{
                return response()->json(['status' => 200, 'message' => 'you can start test','SystemCheck_faild'=>1]);
            }
        }else{
            return response()->json(['status' => 200, 'message' => 'you can start test','SystemCheck_faild'=>0]);
        }
    }


    public function download_system_report(Request $request){        
         $data  = SystemCheck::where('hash_key', $request->get('hashke'))->first();
         return view('school.system_report', compact('data'));
    }



}
