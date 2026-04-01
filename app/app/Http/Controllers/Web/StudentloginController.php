<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\StudentLoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View; 
class StudentloginController extends Controller
{

 
    public function store(StudentLoginRequest $request): RedirectResponse
    {
        try {
            $request->authenticate();
            $request->session()->regenerate(); 
            return redirect()->intended(route('student.dashboard', absolute: false));
        } catch (ValidationException $e) {
            // Optional: You can customize error handling, e.g., adding a general error message
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
    

    public function destroy(Request $request): RedirectResponse
    {
        
        
        Auth::guard('student')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
       
        return redirect('school-login/'.$request->school_id_logout.'/st');
    }









}
