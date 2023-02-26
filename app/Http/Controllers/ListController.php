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
        // $attendances = Attendance::all();
        $attendances = Attendance::where('today',$today)->paginate(5);

        $users = User::all();
        // $users = User::with('user')->get();

        return view('/attendance',['user' => $user,'today' => $today,'users' => $users,'attendances' => $attendances]);
    }
}
