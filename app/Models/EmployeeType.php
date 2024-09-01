<?php

namespace App\Models;

use App\Traits\ConvertToArray;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EmployeeType extends Model
{
    use HasFactory, ConvertToArray;

    protected $fillable = ['name'];

    /**
     * get the employee information for this Employee Type
     */
    public function employeeInformation(): HasMany
    {
        return $this->hasMany(EmployeeInformation::class);
    }

    /**
     * get all the attendances for this Employee Type
     */
    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }
}
