<?php

namespace App\Services;

use App\Models\Candidate;
use Illuminate\Contracts\Database\Eloquent\Builder;

class CandidateSearchService{

    public function search($keyword): Builder
    {
        $candidate = Candidate::query();

        // search by full name
        if ($keyword) {
            $candidate->where('full_name', 'LIKE', '%' . $keyword . '%');
        }

        // search by email
        if ($keyword) {
            $candidate->orWhere('email', 'LIKE', '%' . $keyword . '%');
        }

        // filter by vacancy title
        if ($keyword) {
            $candidate->orWhereHas('vacancy', function ($query) use ($keyword) {
                $query->where('title', 'LIKE', '%' . $keyword . '%');
            });
        }

        return $candidate;
    }
}
