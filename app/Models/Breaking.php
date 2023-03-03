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

    protected $guarded = array('id');

    // public function getTotalBreakTime(){
    //     return $this->total_break_time;
    // }

    public function getTotalBreakTime(){

        return $this->total_break_times;
    }

    public function getId(){
        return optional($this->attendance)->id;
    }

    public function attendance(){
        return $this->belongsTo('App\Models\Attendance');
    }

}
