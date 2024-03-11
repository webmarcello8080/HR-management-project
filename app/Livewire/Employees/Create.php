<?php

namespace App\Livewire\Employees;

use Livewire\Component;
use Livewire\Attributes\On;

class Create extends Component
{
    public $formStep = 1;
    public $employeeId = null;

    #[On('next-step')] 
    public function nextStep($employeeId){
        $this->formStep ++;
        $this->employeeId = $employeeId;
    }

    public function render()
    {
        return view('livewire.employees.create');
    }
}
