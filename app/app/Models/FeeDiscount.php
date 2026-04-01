<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeDiscount extends Model
{
    protected $table="fee_discounts";
    protected $fillable = ['from_qty', 'to_qty', 'discount_option', 'discount_value'];
}
