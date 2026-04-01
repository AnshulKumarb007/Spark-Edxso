<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\SchoolLoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\SchoolDetails;
use App\Models\SchoolRegistration;
class SchoolLoignController extends Controller
{
    public function  index(){
        return view('school.auth-signin');
    }

    public function create(): View
    {
        return view('school.auth-signin');
    }


    public function store(SchoolLoginRequest $request): RedirectResponse
    {
        try {
            $request->authenticate();
            $request->session()->regenerate();

            return redirect()->intended(route('school.dashboard', absolute: false));
        } catch (ValidationException $e) {
            // Optional: You can customize error handling, e.g., adding a general error message
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
    

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('school')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('school-login');
    }

 
    public function student($code,$codex){
        $sd = SchoolRegistration::where('school_id',$code)->first(); 
        if(!empty($sd)){
            $school_details = SchoolDetails::where('registration_id',$sd->id)->first();
            if($codex=="sl"){
                return view('web.studentlogin',compact('sd','code','school_details'));
            }else{
                return view('web.student',compact('sd','code','school_details'));
            }
            
        }else{
            abort(404,'Page Not found');
        }
    }



    public function student_lgoin(Request $request){
        $request->validate([
                'mobileno' => [
                    'required',
                    function ($attribute, $value, $fail) {
                        $isEmail = filter_var($value, FILTER_VALIDATE_EMAIL);
                        $isMobile = preg_match('/^[6-9][0-9]{9}$/', $value);            
                        if (!$isEmail && !$isMobile) {
                            if (is_numeric($value)) {
                                if (!preg_match('/^[0-9]{10}$/', $value)) {
                                    $fail('The mobile number must be exactly 10 digits.');
                                } elseif (!preg_match('/^[6-9]/', $value)) {
                                    $fail('Invalid mobile number.');
                                } else {
                                    $fail('Invalid email address.');
                                }
                            } else {
                                   $fail('Invalid email address.');
                            }
                        }
                    },
                ],
            ]);


            
    }


    public function school_list_login(Request $request)
    {
        try{
        // Check if the request is an AJAX request for filtering
        if ($request->ajax()) {
            $search = $request->input('search', '');  // Get the search query
    
            // Query to fetch filtered school data
          $datas = SchoolRegistration::select(
                'school_details.school_name',
                'school_registration.school_id',
                'school_registration.image',
                'school_registration.is_selected'
          )
            ->join('school_details', 'school_details.registration_id', '=', 'school_registration.id')
            ->where('school_registration.school_id', '!=', '')
            ->where('school_details.school_name', 'like', '%' . $search . '%')
            ->groupBy('school_registration.id') // <<< IMPORTANT FIX
            ->orderBy('school_details.school_name', 'asc')
            ->get();

            // Return the filtered data as JSON
             return response()->json($datas);
        } else {
            // If it's a normal request, just load the full list of schools
           $datas = SchoolRegistration::select(
                'school_details.school_name',
                'school_registration.school_id',
                'school_registration.image',
                'school_registration.is_selected'
            )
            ->join('school_details', 'school_details.registration_id', '=', 'school_registration.id')
            ->where('school_id', '!=', '')
            ->orderBy('school_details.school_name', 'asc')
            ->get();

    
            return view('web.schoollistforlogin', compact('datas'));
        }
     }catch(exception $e){
        echo $e->message();
     }
    }
                



}
