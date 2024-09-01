<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Payroll extends Model
{
    use HasFactory;

    protected $fillable = [
        'payroll_date',
        'annual_salary',
        'gross_pay',
        'deduction_percentage',
        'deduction',
        'insurance',
        'net_pay',
        'employee_id',
    ];

    protected $casts = [
        'payroll_date' => 'date'
    ];

    /**
     * The employee of this payroll
     */
    public function employee(): HasOne
    {
        return $this->hasOne(Employee::class);
    }
}
