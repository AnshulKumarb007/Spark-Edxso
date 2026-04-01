<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    
    protected $table = "invoices";
    protected $fillable = [
        'school_id',
        'invoiceno',
        'total_amount',
        'total_student',
        'status',
    ];
}
