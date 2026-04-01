<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolBank extends Model
{
    protected $table = "school_banks";
    protected $fillable = ['payment_mode', 'cheque_no', 'cheque_date', 'bank_name', 'branch', 'utr_no', 'transaction_date', 'transaction_type', 'attachment_path', 'amount','invoce_id'];
}
