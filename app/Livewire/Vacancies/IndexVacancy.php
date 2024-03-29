<?php

namespace App\Livewire\Vacancies;

use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class IndexVacancy extends Component
{
    public Collection $activeVacancies;
    public Collection $inactiveVacancies;
    public Collection $completedVacancies;

    public function mount(){
        $this->activeVacancies = Vacancy::where('vacancy_status', 1)->get();
        $this->inactiveVacancies = Vacancy::where('vacancy_status', 2)->get();
        $this->completedVacancies = Vacancy::where('vacancy_status', 3)->get();
    }

    public function render()
    {
        return view('livewire.vacancies.index-vacancy');
    }
}
