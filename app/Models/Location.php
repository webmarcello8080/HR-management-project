<?php

namespace App\Models;

use App\Traits\ConvertToArray;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory, ConvertToArray;

    protected $fillable = ['name'];

    /**
     * get the employee information for this Location
     */
    public function employeeInformation(): HasMany{
        return $this->hasMany(EmployeeInformation::class);
    }

    /**
     * get the vacancies for this Location
     */
    public function vacancies(): HasMany{
        return $this->hasMany(Vacancy::class);
    }
}
