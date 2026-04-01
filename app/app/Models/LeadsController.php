<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leads; 
class LeadsController extends Controller
{
    public function index(){
         $data = Leads::join('school_registration','school_registration.mobileno','leads.source')
      ->select('school_registration.id as schhol_id','name','source','leads.created_at')->orderBy('leads.id','desc')->paginate(10);
        return view('admin.leads',compact('data'));
    }
}
