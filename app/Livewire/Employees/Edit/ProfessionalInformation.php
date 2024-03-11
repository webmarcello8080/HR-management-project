<?php

namespace App\Livewire\Employees\Edit;

use App\Models\Employee;
use Livewire\Component;

class ProfessionalInformation extends Component
{
    public Employee $employee;

    public function mount(int $employee_id){
        $this->employee = Employee::findOrFail($employee_id);
    }

    public function render()
    {
        return view('livewire.employees.edit.professional-information');
    }
}
