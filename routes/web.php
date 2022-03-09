<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmployeeController;

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

Route::middleware('guest:admin')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employee.index');
    Route::get('/employees/create', [EmployeeController::class, 'createForm'])->name('employee.create');
    Route::post('/employees/create', [EmployeeController::class, 'create'])->name('employee.new');
    Route::get('/employees/{employeeId}/edit', [EmployeeController::class, 'editForm'])->name('employee.edit');
    Route::patch('/employees/edit/{employeeId}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::delete('/employees/destroy/{employeeId}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
});
