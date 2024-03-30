<?php

namespace App\Services;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class EmployeeSearchService{

    public function search(array $search): Collection
    {
        $employees = Employee::query();

        if (isset($search['keyword'])) {
            $keyword = $search['keyword'];

            $employees->where(function ($query) use ($keyword) {
                // search by partial name and full name
                $query->where(DB::raw("CONCAT(first_name, ' ', last_name)"), 'like', '%' . $keyword . '%')
                    // search by department
                    ->orWhereHas('employeeInformation.department', function ($query) use ($keyword) {
                        $query->where('name', 'like', '%' . $keyword . '%');
                    })
                    // search by location
                    ->orWhereHas('employeeInformation.location', function ($query) use ($keyword) {
                        $query->where('name', 'like', '%' . $keyword . '%');
                    })
                    // search by designation
                    ->orWhereHas('employeeInformation', function ($query) use ($keyword) {
                        $query->where('designation', 'LIKE', '%' . $keyword . '%');
                    });
            });
        }
        
        // filter by department mandatory
        if (isset($search['department'])) {
            $department = $search['department'];

            $employees->whereHas('employeeInformation', function ($query) use ($department) {
                $query->where('department_id', $department->id);
            });
        }

        return $employees->get();
    }
}
