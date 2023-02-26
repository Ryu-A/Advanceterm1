<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Breaking;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BreakingController extends Controller
{
    public function breakin(){
        $user = Auth::user();
        $today = Carbon::today()->format('Y-m-d');
        $attendance = Attendance::where('user_id',$user->id)->where('today',$today)->first();
        $breaking = Breaking::create([
            'attendance_id' => $attendance->id,
            'start_time' => Carbon::now(),
            'end_time' => Carbon::now(),
            $end_time = Carbon::now(),
            $start_time = Carbon::now(),
            $break_time =  $start_time->diffInSeconds($end_time),

            $break_time_hour = floor($break_time/3600),
            $break_time_min = floor(($break_time-($break_time_hour * 3600))/60),
            $break_time_sec = $break_time-($break_time_hour*3600+$break_time_min*60),
            'break_time' => ($break_time_hour.':'.$break_time_min.':'.$break_time_sec)

        ]);

        return view('index',['user' => $user,'attendance'=>$attendance,'breaking' => $breaking]);
    }

    public function breakout(){
        $user = Auth::user();
        $today = Carbon::today()->format('Y-m-d');
        $attendance = Attendance::where('user_id',$user->id)->where('today',$today)->first();
        $breaking = Breaking::where('attendance_id',$attendance->id)->latest()->first();
        $breaking->update([
            'end_time' => Carbon::now(),
            $end_time = Carbon::now(),
            $start_time = new Carbon($today. $breaking->start_time),
            $break_time =  $start_time->diffInSeconds($end_time),

            $break_time_hour = floor($break_time/3600),
            $break_time_min = floor(($break_time-($break_time_hour * 3600))/60),
            $break_time_sec = $break_time-($break_time_hour*3600+$break_time_min*60),
            'break_time' => ($break_time_hour.':'.$break_time_min.':'.$break_time_sec)
        ]);

        return view('index',['user' => $user,'attendance'=>$attendance]);
    }
}
