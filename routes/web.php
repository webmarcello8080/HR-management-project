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

Route::get('/components', function () {return view('components');})->name('components')->middleware('auth', 'password.confirm');

// Employee routes
Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/employee', function () {return view('employees/create');})->name('employee.create');
    Route::get('/employee/{id}/edit', function () {return view('employees/edit');})->name('employee.edit');
    Route::get('/employees', function () {return view('employees/index');})->name('employee.index');    
});

// Routes visible by employee only if page belongs to current employee 
Route::middleware(['auth'])->group(function(){
    Route::get('/employee/{id}', function () {return view('employees/show');})->name('employee.show')->middleware('employee.ownership');    
});

require __DIR__.'/auth.php';
