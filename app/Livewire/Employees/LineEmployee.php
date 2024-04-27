<?php

namespace App\Livewire\Employees;

use App\Models\Employee;
use Illuminate\View\View;
use Livewire\Component;

class LineEmployee extends Component
{
    public Employee $employee;

    public function mount(Employee $employee): void
    {
        $this->employee = $employee;
    }

    public function delete(): void
    {
        $this->employee->delete();
        $this->dispatch('refreshParent');
    }

    public function render(): View
    {
        return view('livewire.employees.line-employee');
    }
}
