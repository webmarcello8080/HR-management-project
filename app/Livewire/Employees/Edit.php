<?php

namespace App\Livewire\Employees;

use App\Models\Employee;
use Livewire\Component;
use Livewire\Attributes\On;

class Edit extends Component
{
    public $employee_id;
    public $formStep = 1;

    public function mount(int $employee_id): void{
        $this->employee_id = $employee_id;
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
        return view('livewire.employees.edit');
    }
}
