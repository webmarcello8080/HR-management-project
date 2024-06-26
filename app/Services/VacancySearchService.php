<?php

namespace App\Services;

use App\Models\Vacancy;
use Illuminate\Contracts\Database\Eloquent\Builder;

class VacancySearchService{

    public function search($keyword): Builder
    {
        $vacancies = Vacancy::query();

        // search by title
        if ($keyword) {
            $vacancies->where('title', 'LIKE', '%' . $keyword . '%');
        }

        // search by department
        if($keyword){
            $vacancies->orWhereHas('department', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            });
        }

        // search by location
        if($keyword){
            $vacancies->orWhereHas('location', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            });
        }

        return $vacancies;
    }
}
