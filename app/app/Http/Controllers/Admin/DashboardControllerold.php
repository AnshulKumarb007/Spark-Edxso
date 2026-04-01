<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolRegistration;
use App\Models\Headofschool;
use App\Models\Schoolenrolment;
use App\Models\SchoolDetails;
use App\Models\SparkCordinator;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    public function index(){  
        //  $school_count = DB::table('school_registration as a')
        // ->Join('generate_url as b', 'a.id', '=', 'b.registration_id')->count();

       

      $school_count = DB::table('school_registration as a')
      ->join('generate_url as b', 'a.id', '=', 'b.registration_id')
      ->join('school_details as c', 'a.id', '=', 'c.registration_id')
      ->join('head_of_school as d', 'a.id', '=', 'd.registration_id')
      ->join('spark_coordinator as e', 'a.id', '=', 'e.registration_id')
      ->count();

          
         
         $student_count = DB::table('school_registration as a')
         ->Join('students as b', 'a.school_id', '=', 'b.school_id')
         ->Join('class', 'class.id', '=', 'b.class')->count();

     

         $spark_count = DB::table('school_registration as a')
        ->Join('spark_coordinator as d', 'a.id', '=', 'd.registration_id')
          ->Join('generate_url as b', 'a.id', '=', 'b.registration_id')
        ->count();

        $lab_count = DB::table('school_registration as a') 
        ->join('labs_details as f', 'a.id', '=', 'f.registration_id')
        ->select(DB::raw('SUM(f.computer_qty) as qty'))   
        ->first();

         $lab_count1 = DB::table('school_registration as a')
        ->join('enrollment_details as e', 'a.id', '=', 'e.registration_id') 
        ->select(DB::raw('SUM(e.total_com_labs) as lab'))
        ->first();
        
        return view('admin.dashboard',compact('school_count','student_count','spark_count','lab_count','lab_count1'));
    }
}
