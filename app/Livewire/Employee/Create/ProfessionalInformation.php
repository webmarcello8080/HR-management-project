<?php

namespace App\Livewire\Employee\Create;

use App\Models\EmployeeInformation;
use Livewire\Component;
use Livewire\Attributes\Validate;

class ProfessionalInformation extends Component
{
    #[Validate('required|min:3|unique:employee_information,unique_id')]
    public $unique_id;
    #[Validate('required|min:3')]
    public $designation;
    #[Validate('required|date')]
    public $joining_date;
    #[Validate('required|integer')]
    public $working_day;
    #[Validate('required|integer')]
    public $employee_type_id;
    #[Validate('required|integer')]
    public $department_id;
    #[Validate('required|integer')]
    public $location_id;
    public $employee_id;

    public function mount($employee_id){
        $this->employee_id = $employee_id;
    }

    public function save(){
        $validated = $this->validate();
        $validated['employee_id'] = $this->employee_id;

        $employee_information = EmployeeInformation::create($validated);

        $this->dispatch('next-step', employeeId: $this->employee_id);
    }

    public function render()
    {
        return view('livewire.employee.create.professional-information');
    }
}
