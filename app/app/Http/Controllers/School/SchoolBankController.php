<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\SchoolBank;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class SchoolBankController extends Controller
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
    public function store(Request $request)
    {

      

        try {
            $validated = $request->validate([
                'paymentMode' => 'required', 
                'attachment' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                'amount' => 'required|numeric|min:1|max:10000000',
            ]);
        
            $payment = new SchoolBank();
            $user = Auth::guard('school')->user();
            $payment->payment_mode = $request->paymentMode;
        
            if ($request->paymentMode === 'Cheque Deposit') {
                $validated = $request->validate([
                    'chequeNo' => 'required|digits:6',
                    'chequeDate' => 'required|date',
                    'bankName' => 'required|string',
                    'branch' => 'required|string',                   
                ]);
                $payment->cheque_no = $request->chequeNo;
                $payment->cheque_date = $request->chequeDate;
                $payment->bank_name = $request->bankName;
                $payment->branch = $request->branch;                             
                $payment->invoce_id = $request->invoce_id;                             
            } else {
                $validated = $request->validate([
                    'utrNo' => 'required|string',
                    'transDate' => 'required|date',
                    'transType' => 'required|string',
                ]); 
                $payment->utr_no = $request->utrNo;
                $payment->transaction_date = $request->transDate; 
                $payment->transaction_type = $request->transType;  
                $payment->invoce_id = $request->invoce_id;                    
            }
            if ($request->hasFile('attachment')) {
                // Laravel validation (recommended first)
               
             
                $file = $request->file('attachment');
                $extension = strtolower($file->getClientOriginalExtension());
            
                // (Optional) Manual extension check for extra safety/logging
                $allowedExtensions = ['jpeg', 'jpg', 'png', 'pdf'];
                if (!in_array($extension, $allowedExtensions)) {
                    return back()->with('error', 'Invalid file extension. Allowed: jpg, jpeg, png, pdf.');
                }
            
                // Generate unique filename
                $filename = $user->id . '_' . time() . '_' . Str::random(10) . '.' . $extension;
            
                // Move file to public/attachment directory
                $file->move(public_path('attachment'), $filename);
            
                // Save path in model
                $payment->attachment_path = 'attachment/' . $filename;
            }
            

            $payment->amount = $request->amount;
            $payment->school_id = $user->id;
            $payment->save();
        
            return response()->json([
                'status' => 'success',
                'message' => 'Payment saved successfully!',
            ], 200);
        
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(SchoolBank $schoolBank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SchoolBank $schoolBank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SchoolBank $schoolBank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchoolBank $schoolBank)
    {
        //
    }
}
