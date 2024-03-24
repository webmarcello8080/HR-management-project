<?php

namespace App\Services;

use App\Models\Employee;
use App\Models\EmployeeAccount;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EmployeeService{

    /**
     * create Employee and save related image if it set
     */
    public function createEmployee(Employee $employee, array $validated, string $mediaName): void
    {
        // save employee information
        $employee->fill($validated);
        $employee->save();

        // update full name in user table
        if($employee->user){
            $employee->user->name = $employee->getFullName();
            $employee->user->save();
        }

        // save image against employee
        if ($validated['profile_image']) {
            $employee->clearMediaCollection($mediaName);
            $employee->addMedia($validated['profile_image']->path())->toMediaCollection($mediaName);
        }
    }

    /**
     * create Employee account information and save its own user attached to it
     */
    public function createEmployeeAccount(EmployeeAccount $employeeAccount, Employee $employee, array $validated): void
    {
        // create user
        $user = $employee->user ?? new User();
        $user->email = $validated['email'];
        $user->name = $employee->first_name . ' ' . $employee->last_name;
        $user->password = $employee?->user?->password ?? Hash::make('iugfdas98dg2398gd9g');
        $user->save();

        // create array of roles ID
        $rolesArray = array_keys(array_filter($validated['roles'], function($value) {
            return $value === true;
        }));
        // attach roles to user
        $user->roles()->sync($rolesArray);

        // attach user to Employee
        $employee->user()->associate($user);
        $employee->save();

        // create employee account
        $employeeAccount->fill($validated);
        $employeeAccount->save();
    }
}
