<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index(){
        return view('register');
    }

    public function register(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return view('thanks');
    }

    public function show(){
        $user = Auth::user();
        return view('login',['user' => $user]);
    }

    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email,
            'password' => $password])) {
                // $today = Carbon::today()->format('Y-m-d');
                // $user = Auth::user();
                // $attendance = Attendance::where('user_id',$user->id)->where('today',$today)->first();
                // return view('index',['user' =>$user,'attendance'=>$attendance]);

                return view('index',['user' => Auth::user()]);
        } else {
            return view('login');
            $text = 'ログインに失敗しました';
        }
    }

    public function logout(){
        Auth::logout();
        return view('login');
    }
}
