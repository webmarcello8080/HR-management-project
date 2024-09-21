<?php

namespace App\Livewire\Vacancies;

use App\Http\Requests\VacancyRequest;
use App\Models\Vacancy;
use App\Traits\ConvertEmptyStringsToNull;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Attributes\Validate;

class CreateVacancy extends Component
{
    use ConvertEmptyStringsToNull;

    public Vacancy $vacancy;
    #[Validate]
    public $title;
    #[Validate]
    public $expiring_date;
    #[Validate]
    public $vacancy_status;
    #[Validate]
    public $working_day;
    #[Validate]
    public $department_id;
    #[Validate]
    public $location_id;
    #[Validate]
    public $employee_type_id;
    #[Validate]
    public $amount;
    #[Validate]
    public $amount_per;

    public function rules():array
    {
        return (new VacancyRequest())->rules();
    }

    public function mount(Vacancy $vacancy):void
    {
        $this->vacancy = $vacancy ?? new Vacancy();
        $this->fill(
            $vacancy->only('title', 'expiring_date', 'vacancy_status', 'working_day', 'department_id', 'location_id', 'employee_type_id', 'amount', 'amount_per'),
        );
    }

    public function save():void
    {
        $validated = $this->validate();

        $this->vacancy->fill($validated);
        $this->vacancy->save();

        $this->redirectRoute('vacancy.index');
    }

    public function delete():void
    {
        $this->vacancy->delete();
        $this->redirectRoute('vacancy.index');
    }

    public function render():View
    {
        return view('livewire.vacancies.create-vacancy');
    }
}
