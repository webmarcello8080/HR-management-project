<?php

use App\Livewire\Employees\CreateEmployee;
use App\Livewire\Employees\EditEmployee;
use App\Livewire\Employees\IndexEmployee;
use App\Livewire\Employees\ShowEmployee;
use App\Livewire\Vacancies\CreateVacancy;
use App\Livewire\Vacancies\IndexVacancy;
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

// temp route.
Route::get('/', function() { return redirect('components');});
// display all the graphic components of the project
Route::get('/components', function () {return view('components');})->name('components')->middleware('auth', 'password.confirm');

// Employee routes
Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/employee', CreateEmployee::class )->name('employee.create');
    Route::get('/employee/{id}/edit', EditEmployee::class )->name('employee.edit');
    Route::get('/employees', IndexEmployee::class )->name('employee.index');    
});

// Vacancy routes
Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/vacancy', CreateVacancy::class )->name('vacancy.create');
    Route::get('/vacancies', IndexVacancy::class)->name('vacancy.index');
});

// Routes visible by employee only if page belongs to current employee 
Route::middleware(['auth'])->group(function(){
    Route::get('/employee/{id}', ShowEmployee::class )->name('employee.show')->middleware('employee.ownership');    
});

require __DIR__.'/auth.php';
