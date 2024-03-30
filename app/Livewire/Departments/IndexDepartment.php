<?php

namespace App\Livewire\Departments;

use App\Models\Department;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class IndexDepartment extends Component
{
    public Collection $departments;

    public function mount(){
        $this->departments = Department::all();
    }

    public function render()
    {
        return view('livewire.departments.index-department');
    }
}
