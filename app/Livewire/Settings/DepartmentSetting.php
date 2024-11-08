<?php

namespace App\Livewire\Settings;

use App\Models\Department;
use Livewire\Attributes\Validate;
use Livewire\Component;

class DepartmentSetting extends Component
{
    #[Validate('required|string|min:3')]
    public $name = '';

    // create a new Department if name inserted doesn't exist already in database
    public function newDepartment():void
    {
        $validated = $this->validate();

        Department::firstOrCreate(['name' => $validated['name']]);

        $this->reset();
    }

    // delete Department if ID exist
    public function removeDepartment($typeId):void
    {
        $department = Department::find($typeId);

        if ($department) {
            $department->delete();
        }
    }

    public function render()
    {
        return view('livewire.settings.department-setting', [
            'departments' => Department::all(),
        ]);
    }
}
