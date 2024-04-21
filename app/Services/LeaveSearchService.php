<?php

namespace App\Services;

use App\Models\Leave;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class LeaveSearchService{

    public function search($keyword, $date): Builder
    {
        $leave = Leave::query();

        // filter by vacancy title
        if ($keyword) {
            $leave->whereHas('employee', function ($query) use ($keyword) {
                $query->where(DB::raw("CONCAT(first_name, ' ', last_name)"), 'like', '%' . $keyword . '%')
                    // search by designation
                    ->orWhereHas('employeeInformation', function ($query) use ($keyword) {
                        $query->where('designation', 'LIKE', '%' . $keyword . '%');
                    });
            });
        }
                
        // search by from_date
        if ($date) {
            $leave->where(function ($query) use ($date) {
                $query->where('from_date', '<=',$date)
                    ->where('to_date', '>=', $date);
            });
        }

        return $leave;
    }
}
