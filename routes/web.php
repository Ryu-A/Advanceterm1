<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/register',[UserController::class,'index']);
Route::post('/register',[UserController::class,'register']);
Route::get('/auth', [UserController::class,'check']);
Route::post('/auth', [UserController::class,'checkUser']);
Route::get('/login',[UserController::class,'show']);
Route::post('/login', [UserController::class,'login']);
Route::get('/', [AttendanceController::class, 'index']);