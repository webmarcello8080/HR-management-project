<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/components', function () {return view('components');});

// Employee routes
Route::get('/employee', function () {return view('employees/create');})->name('employee.create');
Route::get('/employees', function () {return view('employees/index');})->name('employee.index');
