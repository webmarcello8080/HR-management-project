<?php

namespace App\Services;

use App\Models\Attendance;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class AttendanceSearchService{

    public function search($keyword, $date): Builder
    {
        $attendance = Attendance::query();

        // filter by vacancy title
        if ($keyword) {
            $attendance->whereHas('employee', function ($query) use ($keyword) {
                $query->where(DB::raw("CONCAT(first_name, ' ', last_name)"), 'like', '%' . $keyword . '%')
                    // search by designation
                    ->orWhereHas('employeeInformation', function ($query) use ($keyword) {
                        $query->where('designation', 'LIKE', '%' . $keyword . '%');
                    });
            });
        }
                
        // search by from_date
        if ($date) {
            $attendance->where('date', '=',$date);
        }

        return $attendance;
    }
}
