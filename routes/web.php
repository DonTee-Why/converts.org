<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Converts\Convert;
use Illuminate\Support\Facades\Route;

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
    return view('auth/login');
});

Route::get('/test', function () {
    return view('welcome');
});

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'index'])->name('addUser');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/converts', [Convert::class, 'index'])->name('converts');
Route::get('/registerConvert', [Convert::class, 'create'])->name('register');
Route::post('/registerConvert', [Convert::class, 'store']);

Route::get('/getConverts', [Convert::class, 'getConverts'])->name('getConverts');
Route::get('/getConvert/{id}/edit', [Convert::class, 'edit'])->name('convert.edit');
Route::put('/updateConvert/{id}', [Convert::class, 'update'])->name('convert.update');
Route::delete('/deleteConvert/{id}', [Convert::class, 'destroy'])->name('convert.destroy');
