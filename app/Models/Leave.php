<?php

namespace App\Models;

use App\Enums\LeaveStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Leave extends Model
{
    protected $fillable = ['from_date', 'to_date', 'days', 'leave_status', 'reason', 'employee_id'];
    protected $casts = ['leave_status' => LeaveStatus::class, 'from_date' => 'datetime', 'to_date' => 'datetime'];

    use HasFactory;

    /**
     * get the employee of this leave
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
