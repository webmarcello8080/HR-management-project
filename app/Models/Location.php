<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * get the employee information for this Location
     */
    public function employeeInformation(): HasMany{
        return $this->hasMany(EmployeeInformation::class);
    }
}
