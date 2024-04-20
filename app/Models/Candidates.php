<?php

namespace App\Models;

use App\Enums\CandidateStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Candidates extends Model
{
    protected $fillable = ['full_name', 'email', 'phone', 'candidate_status', 'vacancy_id'];
    protected $casts = ['candidate_status' => CandidateStatus::class];

    use HasFactory;

    /**
     * get the vacancy of this candidate
     */
    public function vacancy(): BelongsTo
    {
        return $this->belongsTo(Vacancy::class);
    }
}
