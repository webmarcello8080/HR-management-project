<?php

namespace App\Livewire\Employees;

use App\Models\Employee;
use Livewire\Component;
use Livewire\Attributes\On;

class Create extends Component
{
    public Employee $employee;
    public $formStep = 1;

    #[On('next-step')] 
    public function nextStep($employee){
        $this->formStep ++;
        $this->employee = Employee::find($employee['id']);
    }

    public function render()
    {
        return view('livewire.employees.create');
    }
}
