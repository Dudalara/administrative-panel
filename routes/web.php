<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MovementController;

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
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('guest:admin')->group(function () {
    Route::prefix('employees')->group(function () {
        Route::get('/page/{page}', [EmployeeController::class, 'index'])->name('employee.index.page');
        Route::get('', [EmployeeController::class, 'index'])->name('employee.index');
        Route::get('/create', [EmployeeController::class, 'createForm'])->name('employee.create');
        Route::post('/create', [EmployeeController::class, 'create'])->name('employee.new');
        Route::get('/{employeeId}/edit', [EmployeeController::class, 'editForm'])->name('employee.edit');
        Route::patch('/edit/{employeeId}', [EmployeeController::class, 'update'])->name('employee.update');
        Route::delete('/destroy/{employeeId}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
    });
    Route::prefix('movements')->group(function () {
        Route::get('/page/{page}', [MovementController::class, 'index'])->name('employee.index.page');
        Route::get('', [MovementController::class, 'index'])->name('movement.index');
        Route::get('/create', [MovementController::class, 'createForm'])->name('movement.create');
        Route::post('/create', [MovementController::class, 'create'])->name('movement.new');
    });
});
