<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Breaking;
use App\Models\Attendance;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class ListController extends Controller
{
    public function show(){
        $user = Auth::user();
        $today = Carbon::today()->format('Y-m-d');
        $attendances = Attendance::where('today',$today)->paginate(5);
        
        $breakings = Breaking::with('Attendance')
        ->get();

        $total_break_time = Breaking::select('attendance_id')
        ->selectRaw('SEC_TO_TIME(SUM(TIME_TO_SEC(break_time)))as total_break_time')
        ->groupBy('attendance_id')
        ->get();

        $attendance = Attendance::where('today',$today)
        ->select('user_id','start_time','end_time')
        // ->groupBy('user_id')
        ->first();

        if(isset($attendance)){
            $end_time = new Carbon($today. $attendance->end_time);
            $start_time = new Carbon($today. $attendance->start_time);
            $work_time =  $start_time->diffInSeconds($end_time);
                $work_time_hour = floor($work_time/3600);
                $work_time_min = floor(($work_time-($work_time_hour * 3600))/60);
                $work_time_sec = $work_time-($work_time_hour*3600+$work_time_min*60);
            $work_time = ($work_time_hour.':'.$work_time_min.':'.$work_time_sec);
        }else{
            $work_time = null;
        }


        // $work_time = Attendance::select('user_id')
        // ->selectRaw('SEC_TO_TIME((TIME_TO_SEC(end_time)-(TIME_TO_SEC(start_time)))as work_time')
        // ->groupBy('user_id')
        // ->first();

        return view('/attendance',['user' => $user,'today' => $today,'attendances' => $attendances,'breakings' => $breakings,'total_break_time' => $total_break_time,'work_time' => $work_time]);
    }

    public function tomorrow(Request $request){
        $user = Auth::user();
        $today = $request->get('today');
        $today = new Carbon($today);
        $today->addDay(1);
        $today = $today->format('Y-m-d');
        $attendances = Attendance::where('today',$today)->paginate(5);

        $breakings = Breaking::select('attendance_id')
        ->selectRaw('SEC_TO_TIME(SUM(TIME_TO_SEC(break_time)))as total_break_time')
        ->groupBy('attendance_id')->get();

        $total_break_time = Breaking::select('attendance_id')
        ->selectRaw('SEC_TO_TIME(SUM(TIME_TO_SEC(break_time)))as total_break_time')
        ->groupBy('attendance_id')
        ->get();

        $attendance = Attendance::where('today',$today)
        ->select('user_id','start_time','end_time')
        // ->groupBy('user_id')
        ->first();

        if(isset($attendance)){
            $end_time = new Carbon($today. $attendance->end_time);
            $start_time = new Carbon($today. $attendance->start_time);
            $work_time =  $start_time->diffInSeconds($end_time);
                $work_time_hour = floor($work_time/3600);
                $work_time_min = floor(($work_time-($work_time_hour * 3600))/60);
                $work_time_sec = $work_time-($work_time_hour*3600+$work_time_min*60);
            $work_time = ($work_time_hour.':'.$work_time_min.':'.$work_time_sec);
        }else{
            $work_time = null;
        }

        return view('/attendance',['user' => $user,'today' => $today,'attendances' => $attendances,'breakings' => $breakings,'total_break_time' => $total_break_time,'work_time' => $work_time]);
    }

    public function yesterday(Request $request){
        $user = Auth::user();
        $today = $request->get('today');
        $today = new Carbon($today);
        $today->subDay(1);
        $today = $today->format('Y-m-d');
        $attendances = Attendance::where('today',$today)->paginate(5);
        $breakings = Breaking::select('attendance_id')
        ->selectRaw('SEC_TO_TIME(SUM(TIME_TO_SEC(break_time)))as total_break_time')
        ->groupBy('attendance_id')->get();

        $total_break_time = Breaking::select('attendance_id')
        ->selectRaw('SEC_TO_TIME(SUM(TIME_TO_SEC(break_time)))as total_break_time')
        ->groupBy('attendance_id')
        ->get();

        $attendance = Attendance::where('today',$today)
        ->select('user_id','start_time','end_time')
        // ->groupBy('user_id')
        ->first();

        if(isset($attendance)){
            $end_time = new Carbon($today. $attendance->end_time);
            $start_time = new Carbon($today. $attendance->start_time);
            $work_time =  $start_time->diffInSeconds($end_time);
                $work_time_hour = floor($work_time/3600);
                $work_time_min = floor(($work_time-($work_time_hour * 3600))/60);
                $work_time_sec = $work_time-($work_time_hour*3600+$work_time_min*60);
            $work_time = ($work_time_hour.':'.$work_time_min.':'.$work_time_sec);
        }else{
            $work_time = null;
        }

        return view('/attendance',['user' => $user,'today' => $today,'attendances' => $attendances,'breakings' => $breakings,'total_break_time' => $total_break_time,'work_time' => $work_time]);
    }
}
