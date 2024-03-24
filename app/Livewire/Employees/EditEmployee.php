<?php

namespace App\Livewire\Employees;

use App\Models\Employee;
use Livewire\Component;
use Livewire\Attributes\On;

class EditEmployee extends Component
{
    public Employee $employee;
    public $id;
    public $formStep = 1;

    public function mount(int $id): void{
        $this->id = $id;
        $this->employee = Employee::find($id);
    }

    #[On('next-step')] 
    public function nextStep(): void{
        $this->formStep ++;
    }

    public function getToStep($step): void{
        $this->formStep = $step;
    }

    public function render()
    {
        return view('livewire.employees.edit-employee');
    }
}
