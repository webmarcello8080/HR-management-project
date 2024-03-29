<?php

namespace App\Livewire\Vacancies;

use App\Models\Vacancy;
use Livewire\Component;
use Livewire\Attributes\Validate;

class CreateVacancy extends Component
{
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

    public function rules(){
        return [
            'title' => 'required|string|min:3|max:200',
            'expiring_date' => 'nullable|date',
            'vacancy_status' => 'required|integer',
            'working_day' => 'required|integer',
            'department_id' => 'nullable',
            'location_id' => 'nullable',
            'employee_type_id' => 'nullable',
            'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'amount_per' => 'required|string|min:3',
        ];
    }

    public function mount(){
        $this->vacancy = new Vacancy();
    }

    public function save(){
        $validated = $this->validate();

        $this->vacancy->fill($validated);
        $this->vacancy->save();

        $this->redirectRoute('vacancy.index');
    }

    public function render()
    {
        return view('livewire.vacancies.create-vacancy');
    }
}
