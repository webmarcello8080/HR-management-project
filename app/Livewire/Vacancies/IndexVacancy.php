<?php

namespace App\Livewire\Vacancies;

use App\Models\Vacancy;
use App\Services\VacancySearchService;
use Illuminate\View\View;
use Livewire\Component;

class IndexVacancy extends Component
{    
    public string $search = '';

    public function updateVacancyStatus(int $vacancyId, int $newStatus)
    {
        $vacancy = Vacancy::find($vacancyId);
        if ($vacancy->vacancy_status != $newStatus) {
            $vacancy->update(['vacancy_status' => $newStatus]);
        }
    }

    public function render(): View
    {
        if($this->search){
            $searchService = new VacancySearchService;
            $vacancies = $searchService->search($this->search)->orderBy('created_at', 'desc')->get();    
        } else {
            $vacancies = Vacancy::orderBy('created_at', 'desc')->get();
        }

        return view('livewire.vacancies.index-vacancy', [
            'vacancies' => $vacancies,
        ]);
    }
}
