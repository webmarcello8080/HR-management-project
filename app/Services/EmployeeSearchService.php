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

            // if keyword is define search by (WHERE name = keyword OR designation = keyword OR department = keyword)
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
        if (isset($search['department_id'])) {
            $department_id = $search['department_id'];

            $employees->whereHas('employeeInformation', function ($query) use ($department_id) {
                $query->where('department_id', $department_id);
            });
        }

        return $employees->get();
    }
}
