<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use Livewire\Component;

class Index extends Component
{
    public function mount(){
    }

    public function render()
    {
        return view('livewire.employee.index');
    }
}
