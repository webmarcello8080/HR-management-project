<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeAccount extends Model
{
    use HasFactory;

    protected $fillable = ['slack_id', 'skype_id', 'github_id', 'employee_id'];

    /**
     * get the employee of this employee accounts
     */
    public function employee(): BelongsTo{
        return $this->belongsTo(Employee::class);
    }
}
