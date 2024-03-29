<?php

namespace App\Livewire\Employees;

use App\Models\Employee;
use Livewire\Component;

class IndexEmployee extends Component
{
    public $employees;

    public function mount(){
        $this->employees = Employee::all();
    }

    public function render()
    {
        return view('livewire.employees.index-employee');
    }
}
