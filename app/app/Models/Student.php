<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = [
       'school_id', 'class', 'subject_id', 'section','admission_no', 'full_name', 'father_name', 'mobile', 'email', 'middle_name', 'last_name', 'exam_date', 'relation', 'mobile_otp', 'email_otp', 'is_validate_mobile', 'is_validate_email','rejected_by','relative_middle_name','relative_last_name','fee','utr','attachment','razorpay_order_id','razorpay_payment_id','amount','status','fee_verified_by','fee_status','verify_status','notiifcation_view','last_login_at','created_by'
    ];
}
