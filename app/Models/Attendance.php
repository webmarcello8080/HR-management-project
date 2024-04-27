<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'start_time', 'finish_time', 'break_time', 'working_hours', 'employee_type_id', 'employee_id'];
    protected $casts = [
        'date' => 'date'
    ];

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
}
