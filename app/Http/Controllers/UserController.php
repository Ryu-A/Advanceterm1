<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        return view('register');
    }

    public function register(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>$request->password,
        ]);
        return view('thanks');
    }

    public function show(){
        $user = Auth::user();
        return view('login',['user' => $user]);
    }

    public function check(Request $request)
{
    $text = ['text' => 'ログインして下さい。'];
    return view('auth', $text);
}

public function checkUser(Request $request)
{
    $email = $request->email;
    $password = $request->password;
    if (Auth::attempt(['email' => $email,
        'password' => $password])) {
        $text =   Auth::user()->name . 'さんがログインしました';
    } else {
        $text = 'ログインに失敗しました';
    }
    return view('auth', ['text' => $text]);
}

    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email,
            'password' => $password])) {
            return view('index');
        } else {
            return view('login');
            $text = 'ログインに失敗しました';
        }
    }

    public function logout(){
        //
    }
}
