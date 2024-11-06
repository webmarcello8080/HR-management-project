<?php

namespace App\Models;

use App\Enums\WorkingDay;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeInformation extends Model
{
    use HasFactory;

    protected $fillable = ['unique_id', 'designation', 'joining_date', 'annual_salary', 'days_of_holiday', 'working_day', 'employee_id', 'employee_type_id', 'department_id', 'location_id'];
    protected $casts = ['working_day' => WorkingDay::class];

    /**
     * get the employee of this employee information
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    /** 
     * get the employee type of this Employee information 
     */
    public function employeeType(): BelongsTo
    {
        return $this->belongsTo(EmployeeType::class);
    }

    /** 
     * get the department of this Employee information 
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    /** 
     * get the location of this Employee information 
     */
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * get the number of leave days for given year
     */
    public function leaveDaysForYear($year)
    {
        return $this->employee->leaves()
            ->whereYear('from_date', $year)
            ->where('leave_status', 2)
            ->sum('days');
    }

    /**
     * get number of days of holiday left for this Employee
     */
    public function getHolidayLeft($year): float
    {
        if($this->days_of_holiday){
            return $this->days_of_holiday - $this->leaveDaysForYear($year);
        }

        return 0;
    }
}
