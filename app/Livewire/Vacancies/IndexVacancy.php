<?php

namespace App\Livewire\Vacancies;

use App\Enums\VacancyStatus;
use App\Models\Vacancy;
use App\Services\VacancySearchService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Component;

class IndexVacancy extends Component
{    
    public array $statusColours = ['yellow', 'red', 'green'];
    public string $search = '';

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
            'vacancyStatuses' => VacancyStatus::cases(),
        ]);
    }
}
