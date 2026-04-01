<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeeDiscount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discounts = FeeDiscount::get();
        return view('admin.fee-discount.view',compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.fee-discount.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
        $validated = $request->validate([
            'from_qty' => 'required|numeric|min:0',
            'to_qty' => 'required|numeric|gte:from_qty',
            'discount_option' => 'required|in:percentage,fixed',
            'discount_value' => 'required|numeric|min:0',
        ]);
    
        // Save logic here (e.g., assuming a `ClassDiscount` model)
        FeeDiscount::create($validated);
    
        return redirect()->back()->with('success', 'Discount saved successfully!');
          } catch (\Exception $e) {
                //print_r($e->getMessage());
                return redirect()->back()->with('error', $e->getMessage());
            }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(FeeDiscount $feeDiscount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $discount = FeeDiscount::findOrFail($id);
            return view('admin.fee-discount.edit', compact('discount'));
          } catch (\Exception $e) {
                //print_r($e->getMessage());
                return redirect()->back()->with('error', $e->getMessage());
            }
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
        $request->validate([
            'from_qty' => 'required|integer|min:0',
             'to_qty' => 'required|numeric|gte:from_qty',
            'discount_option' => 'required|in:percentage,fixed',
            'discount_value' => 'required|numeric|min:0',
        ]);
    
        $discount = FeeDiscount::findOrFail($id);
        $discount->update([
            'from_qty' => $request->from_qty,
            'to_qty' => $request->to_qty,
            'discount_option' => $request->discount_option,
            'discount_value' => $request->discount_value,
        ]);
    
        return redirect()->route('fee-discount.index')->with('success', 'Discount updated successfully!');
          } catch (\Exception $e) {
                //print_r($e->getMessage());
                return redirect()->back()->with('error', $e->getMessage());
            }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeeDiscount $feeDiscount)
    {
        //
    }
}
