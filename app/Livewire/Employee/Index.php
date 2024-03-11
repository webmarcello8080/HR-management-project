<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use Livewire\Component;

class Index extends Component
{
    public $employees;

    public function mount(){
        $this->employees = Employee::all();
    }

    public function render()
    {
        return view('livewire.employee.index');
    }
}
