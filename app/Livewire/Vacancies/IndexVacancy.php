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
    public Collection $vacancies;
    public array $vacancyStatuses;
    public array $statusColours = ['yellow', 'red', 'green'];
    public string $search = '';

    public function mount(): void
    {
        $this->vacancies = Vacancy::all();
        $this->vacancyStatuses = VacancyStatus::cases();
    }

    public function updatedSearch(): void
    {
        $searchService = new VacancySearchService;
        $this->vacancies = $searchService->search($this->search);
    }

    public function render(): View
    {
        return view('livewire.vacancies.index-vacancy');
    }
}
