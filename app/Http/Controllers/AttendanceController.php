<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function index(){
        return view('index');
    }

    public function start(){
        $today = Carbon::today();
        $user = Auth::user();

        $attendance = Attendance::create([
            'user_id' => $user->id,
            'today' => $today,
            'start_time' => Carbon::now(),
            'end_time' => Carbon::now(),
        ]);

        return view('index',['user' => $user]);
    }

    public function finish(){
        $today = Carbon::today();
        $user = Auth::user();

        $endTime = Attendance::where('user_id',$user->id);
        $endTime->update([
            'end_time' => Carbon::now(),
        ]);

        return view('index',['user' => $user]);
    }
}
