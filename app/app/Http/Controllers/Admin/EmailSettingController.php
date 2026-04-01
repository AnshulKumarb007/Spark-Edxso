<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\EmailSetting;
use Illuminate\Http\Request;

class EmailSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $emails= EmailSetting::paginate(10);
         return view('admin.email_setting',compact('emails'));
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
    public function store(Request $request)
    {
        
         try {
                $request->validate([
                    'email' => 'required|email|unique:email_setting,email|max:255',
                ]);
                $email = new EmailSetting();
                $email->email = $request->email;
                $email->save();
                 return redirect()->back()->with('success', 'Email saved successfully!');
          } catch (\Exception $e) {
                //print_r($e->getMessage());
                return redirect()->back()->with('error', $e->getMessage());
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(EmailSetting $emailSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmailSetting $emailSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmailSetting $emailSetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmailSetting $emailSetting)
    {
        //
    }
}
