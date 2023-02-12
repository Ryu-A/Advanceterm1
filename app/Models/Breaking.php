<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breaking extends Model
{
    use HasFactory;
    protected $fillable = [
        'attendance_id',
        'start_time',
        'end_time',
        'break_time',
    ];
}
