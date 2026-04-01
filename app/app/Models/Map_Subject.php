<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Map_Subject extends Model
{
    protected $table = "map_subject";
    protected $fillable = ['class_id','subject_id'];
}
