<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'today',
        'start_time',
        'end_time',
    ];

    protected $guarded = array('id');

    public function getTitle(){
        return optional($this->user)->name;
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function breakings(){
        return $this->hasMany('App\Models\Breaking');
    }
}
