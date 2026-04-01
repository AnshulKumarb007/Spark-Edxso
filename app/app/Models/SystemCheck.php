<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemCheck extends Model
{
    protected $table = 'system_checks';
    protected $fillable = [
        'ip',
        'hash_key',
        'school_id',
        'lab_id',
        'pc_id',
        'os',
        'browser',
        'resolution',
        'ram',
        'js_enabled',
        'status',
    ];
}