<?php

namespace App\Livewire\Employees;

use App\Models\Employee;
use Livewire\Component;

class ShowEmployee extends Component
{
    public Employee $employee;
    public $menuTab;

    public function mount(Employee $employee): void
    {
        $this->employee = $employee;
        $this->menuTab = 1;
    }

    public function setMenuTab($menuTab):void
    {
        $this->menuTab = $menuTab;
    }

    public function render()
    {
        return view('livewire.employees.show-employee');
    }
}
