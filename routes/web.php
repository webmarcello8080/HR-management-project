<?php

use App\Livewire\Attendances\CreateAttendance;
use App\Livewire\Attendances\IndexAttendance;
use App\Livewire\Candidates\CreateCandidate;
use App\Livewire\Candidates\IndexCandidate;
use App\Livewire\Departments\IndexDepartment;
use App\Livewire\Departments\ShowDepartment;
use App\Livewire\Employees\CreateEmployee;
use App\Livewire\Employees\EditEmployee;
use App\Livewire\Employees\IndexEmployee;
use App\Livewire\Employees\ShowEmployee;
use App\Livewire\Holidays\IndexHoliday;
use App\Livewire\Leaves\CreateLeave;
use App\Livewire\Leaves\IndexLeave;
use App\Livewire\Payrolls\CreatePayroll;
use App\Livewire\Payrolls\IndexPayroll;
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

// root route - this will go to the dashboard when it's ready
Route::get('/', function() { return redirect('components');})->name('home');

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

// Leave routes
Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/leaves', IndexLeave::class)->name('leave.index');
    Route::get('/leave/{leave}/edit', CreateLeave::class)->name('leave.edit');
});

// Attendance routes
Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/attendances', IndexAttendance::class)->name('attendance.index');
    Route::get('/attendance/{attendance}/edit', CreateAttendance::class)->name('attendance.edit');
});

// holidays routes
Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/holidays', IndexHoliday::class)->name('holiday.index');
});

// payrolls routes
Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/payroll', CreatePayroll::class)->name('payroll.create');
    Route::get('/payroll/{payroll}/edit', CreatePayroll::class)->name('payroll.edit');
    Route::get('/payrolls', IndexPayroll::class)->name('payroll.index');
});

// Routes visible by employee only if page belongs to current employee 
Route::middleware(['auth'])->group(function(){
    Route::get('/employee/{employee}', ShowEmployee::class )->name('employee.show')->middleware('employee.ownership');    
    Route::get('/leave', CreateLeave::class )->name('leave.create');
    Route::get('/attendance', CreateAttendance::class )->name('attendance.create');
    // display all the graphic components of the project
    Route::get('/components', function () {return view('components.components');})->name('components')->middleware('password.confirm');
});

require __DIR__.'/auth.php';
