<?php

namespace App\Livewire\Settings;

use App\Models\EmployeeType;
use Livewire\Component;

class EmployeeTypeSetting extends Component
{
    public function render()
    {
        return view('livewire.settings.employee-type-setting', [
            'employeeTypes' => EmployeeType::all(),
        ]);
    }
}
