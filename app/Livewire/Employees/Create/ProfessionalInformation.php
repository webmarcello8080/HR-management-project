<?php

namespace App\Livewire\Employees\Create;

use App\Models\EmployeeInformation;
use Livewire\Component;
use Livewire\Attributes\Validate;

class ProfessionalInformation extends Component
{
    #[Validate]
    public $unique_id;
    #[Validate]
    public $designation;
    #[Validate]
    public $joining_date;
    #[Validate]
    public $working_day;
    #[Validate]
    public $employee_type_id;
    #[Validate]
    public $department_id;
    #[Validate]
    public $location_id;
    public $employee_id;

    public function mount($employee_id){
        $this->employee_id = $employee_id;
    }

    public function rules(){
        return [
            'unique_id' => 'required|min:3|unique:employee_information,unique_id',
            'designation' => 'required|min:3',
            'joining_date' => 'required|integer',
            'working_day' => 'required|integer',
            'employee_type_id' => 'required|integer',
            'department_id' => 'required|integer',
            'location_id' => 'required|integer',
        ];
    }

    public function save(){
        $validated = $this->validate();
        $validated['employee_id'] = $this->employee_id;

        $employee_information = EmployeeInformation::create($validated);

        $this->dispatch('next-step', employeeId: $this->employee_id);
    }

    public function render()
    {
        return view('livewire.employees.create.professional-information');
    }
}
