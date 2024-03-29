<?php

namespace App\Livewire\Employees\Show;

use App\Models\Employee;
use Illuminate\View\View;
use Livewire\Component;

class Information extends Component
{
    public Employee $employee;
    public $tabStep;

    public function mount(Employee $employee):void
    {
        $this->employee = $employee;
        $this->tabStep = 1;
    }

    public function getToStep($step): void
    {
        $this->tabStep = $step;
    }

    public function render(): View
    {
        return view('livewire.employees.show.information');
    }
}
