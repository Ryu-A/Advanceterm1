<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\BreakingController;
use App\Http\Controllers\ListController;

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

Route::get('/login',[UserController::class,'show']);
Route::post('/login', [UserController::class,'login']);

Route::get('/logout',[UserController::class,'logout']);

Route::get('/', [AttendanceController::class, 'index']);

Route::post('/start', [AttendanceController::class, 'start']);

Route::post('/finish', [AttendanceController::class, 'finish']);

Route::post('/breakin', [BreakingController::class, 'breakin']);

Route::post('/breakout', [BreakingController::class, 'breakout']);

Route::get('/attendance', [ListController::class, 'show']);
Route::get('/attendance/tomorrow', [ListController::class, 'tomorrow']);
Route::post('/attendance/tomorrow', [ListController::class, 'tomorrow']);
Route::get('/attendance/yesterday', [ListController::class, 'yesterday']);
Route::post('/attendance/yesterday', [ListController::class, 'yesterday']);