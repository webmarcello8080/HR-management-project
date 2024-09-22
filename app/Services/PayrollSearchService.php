<?php

namespace App\Services;

use App\Models\Payroll;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class PayrollSearchService{

    public function search($keyword, $date): Builder
    {
        $payrolls = Payroll::query();

        // filter by vacancy title
        if ($keyword) {
            $payrolls->whereHas('employee', function ($query) use ($keyword) {
                $query->where(DB::raw("CONCAT(first_name, ' ', last_name)"), 'like', '%' . $keyword . '%')
                    // search by designation
                    ->orWhereHas('employeeInformation', function ($query) use ($keyword) {
                        $query->where('designation', 'LIKE', '%' . $keyword . '%');
                    });
            });
        }
                
        // search by from_date
        if ($date) {
            $payrolls->where('payroll_date', '=', $date);
        }

        return $payrolls;
    }
}
