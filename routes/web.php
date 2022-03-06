<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

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
    return redirect('/login');
});

Route::get('/login', [LoginController::class, 'showLogin'])->name('login.view');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout']);


Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('guest:admin');
