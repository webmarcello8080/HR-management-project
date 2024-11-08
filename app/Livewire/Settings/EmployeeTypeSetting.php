<?php

namespace App\Livewire\Settings;

use App\Models\EmployeeType;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EmployeeTypeSetting extends Component
{
    #[Validate('required|string|min:3')]
    public $name = '';

    // create a new Employee type if name inserted doesn't exist already in database
    public function newEmployeeType():void
    {
        $validated = $this->validate();

        EmployeeType::firstOrCreate(['name' => $validated['name']]);

        $this->reset();
    }

    // delete employee type if ID exist
    public function removeType($typeId):void
    {
        $employeeType = EmployeeType::find($typeId);

        if ($employeeType) {
            $employeeType->delete();
        }
    }

    public function render()
    {
        return view('livewire.settings.employee-type-setting', [
            'employeeTypes' => EmployeeType::all(),
        ]);
    }
}
