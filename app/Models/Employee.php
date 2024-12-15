<?php

namespace App\Models;

use App\Enums\Gender;
use App\Enums\MaritalStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['first_name', 'last_name', 'mobile_number', 'email', 'profile_image', 'dob', 'marital_status', 'gender', 'nationality', 'address', 'city', 'country', 'post_code', 'user_id'];
    protected $casts = ['dob' => 'date', 'marital_status' => MaritalStatus::class, 'gender' => Gender::class];

    /**
     * get the user of this employee
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * get the information of this Employee
     */
    public function employeeInformation(): HasOne
    {
        return $this->hasOne(EmployeeInformation::class);
    }

    /**
     * get the accounts of this Employee
     */
    public function employeeAccount(): HasOne
    {
        return $this->hasOne(EmployeeAccount::class);
    }

    /**
     * get the leaves of this employee
     */
    public function leaves(): HasMany
    {
        return $this->hasMany(Leave::class)->orderBy('from_date');
    }

    /**
     * get the attendances of this employee
     */
    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class)->orderBy('date');
    }

    /**
     * get the payrolls of this employee
     */
    public function payrolls(): HasMany
    {
        return $this->hasMany(Payroll::class);
    }

    /**
     * get this Employee Full Name
     */
    public function getFullName() : string 
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * get this employee image url based on image name
     */
    public function getProfileUrl(): string
    {
        if($this->profile_image){
            return $this->profile_image;
        }

        return asset('/images/placeholders/user-placeholder.jpg');
    }

    /**
     * get array with all employees full names
     */
    public static function getFullNameArray(): array
    {
        $employees = Employee::orderBy('last_name')->get();

        $fullNameArray = [];
        foreach($employees as $employee){
            $fullNameArray[$employee->id] = $employee->getFullName();
        }

        return $fullNameArray;
    }
}
