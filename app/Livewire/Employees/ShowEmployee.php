<?php

namespace App\Livewire\Employees;

use App\Models\Employee;
use Livewire\Component;

class ShowEmployee extends Component
{
    public Employee $employee;

    public function mount($id): void
    {
        $this->employee = Employee::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.employees.show-employee');
    }
}
