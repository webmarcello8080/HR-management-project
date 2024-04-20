<?php

use App\Livewire\Candidates\CreateCandidate;
use App\Livewire\Candidates\IndexCandidate;
use App\Livewire\Departments\IndexDepartment;
use App\Livewire\Departments\ShowDepartment;
use App\Livewire\Employees\CreateEmployee;
use App\Livewire\Employees\EditEmployee;
use App\Livewire\Employees\IndexEmployee;
use App\Livewire\Employees\ShowEmployee;
use App\Livewire\Holidays\IndexHoliday;
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
    Route::get('/employee/{employee}/edit', EditEmployee::class )->name('employee.edit');
    Route::get('/employees', IndexEmployee::class )->name('employee.index');    
});

// Vacancy routes
Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/vacancy', CreateVacancy::class )->name('vacancy.create');
    Route::get('/vacancy/{vacancy}/edit', CreateVacancy::class )->name('vacancy.edit');
    Route::get('/vacancies', IndexVacancy::class)->name('vacancy.index');
});

// Department routes
Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/departments', IndexDepartment::class)->name('department.index');
    Route::get('/department/{department}', ShowDepartment::class)->name('department.show');
});

// Candidate routes
Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/candidate', CreateCandidate::class)->name('candidate.create');
    Route::get('/candidate/{candidate}/edit', CreateCandidate::class)->name('candidate.edit');
    Route::get('/candidates', IndexCandidate::class)->name('candidate.index');
});

// holidays routes
Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/holidays', IndexHoliday::class)->name('holiday.index');
});

// Routes visible by employee only if page belongs to current employee 
Route::middleware(['auth'])->group(function(){
    Route::get('/employee/{employee}', ShowEmployee::class )->name('employee.show')->middleware('employee.ownership');    
});

require __DIR__.'/auth.php';
