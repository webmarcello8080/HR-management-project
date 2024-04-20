<?php

namespace App\Models;

use App\Enums\VacancyStatus;
use App\Enums\WorkingDay;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'expiring_date', 'vacancy_status', 'working_day', 'department_id', 'location_id', 'employee_type_id', 'amount', 'amount_per'];
    protected $casts = ['vacancy_status' => VacancyStatus::class, 'working_day' => WorkingDay::class];

    /**
     * get Department of this vacancy
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * get the location of this vacancy
     */
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * get the employee type of this vacancy
     */
    public function employeeType(): BelongsTo
    {
        return $this->belongsTo(EmployeeType::class);
    }

    /**
     * get the candidates fot this vacancy
     */
    public function candidates(): HasMany
    {
        return $this->hasMany(Candidate::class);
    }
}
