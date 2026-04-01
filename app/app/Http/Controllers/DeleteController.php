<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\SchoolRegistration;
use App\Models\Headofschool;
use App\Models\Schoolenrolment;
use App\Models\SchoolDetails;
use App\Models\SparkCordinator;
use App\Models\Genrateurl;
use App\Models\LabsDetails;
use App\Models\Student;
use App\Models\Otp;

class DeleteController extends Controller
{
    public function check(Request $request)
    {
        $id = $request->input('id');
        $user = SchoolRegistration::where('mobileno', $id)->first();

        if ($user) {
            // Show confirmation screen
            return view('confirmation', ['user' => $user]);
        } else {
            return redirect()->back()->with('error', "No data found for ID: $id");
        }
    }

public function destroy(Request $request){
    $id = $request->input('id');

    DB::beginTransaction();

    try { 
        $user = SchoolRegistration::where('mobileno', $id)->first();

        if (!$user) {
            return redirect('/delete-form')->with('error', "No user found with mobile number: $id");
        }

        // Delete related models by looping
        $a = Headofschool::where('registration_id', $user->id)->get();
        foreach ($a as $item) {
            $item->delete();
        }

        $b = Schoolenrolment::where('registration_id', $user->id)->get();
        foreach ($b as $item) {
            $item->delete();
        }

        $c = SchoolDetails::where('registration_id', $user->id)->get();
        foreach ($c as $item) {
            $item->delete();
        }

        $d = SparkCordinator::where('registration_id', $user->id)->get();
        foreach ($d as $item) {
            $item->delete();
        }

        $e = Genrateurl::where('registration_id', $user->id)->get();
        foreach ($e as $item) {
            $item->delete();
        }

        $f = LabsDetails::where('registration_id', $user->id)->get();
        foreach ($f as $item) {
            $item->delete();
        }

         $i = Student::where('school_id', $user->school_id)->get();
        foreach ($i as $item) {
            $item->delete();
        }

        

        $g = Otp::where('source', $id)->get();
        foreach ($g as $item) {
            $item->delete();
        }

        // Delete the main user/registration record
        $user->delete();

        DB::commit();

        return redirect('/delete-form')->with('success', "User and related data deleted successfully for mobile: $id");

    } catch (\Exception $e) {
        DB::rollBack();
        return redirect('/delete-form')->with('error', 'Error deleting data: ' . $e->getMessage());
    }
  }
}