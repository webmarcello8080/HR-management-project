<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use Livewire\Component;

class Line extends Component
{
    public Employee $employee;

    public function mount(Employee $employee){
        $this->employee = $employee;
    }

    public function render()
    {
        return view('livewire.employee.line');
    }
}
