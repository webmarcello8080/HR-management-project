<?php

namespace App\Livewire\Employees\Create;

use App\Models\EmployeeAccount;
use Livewire\Component;
use Livewire\Attributes\Validate;

class AccountAccess extends Component
{
    #[Validate]
    public $email;
    #[Validate]
    public $slack_id;
    #[Validate]
    public $skype_id;
    #[Validate]
    public $github_id;
    public $employee_id;

    public function mount($employee_id){
        $this->employee_id = $employee_id;
    }

    public function rules(){
        return [
            'email' => 'required|email|unique:employee_accounts,email',
            'slack_id' => 'nullable|min:3',
            'skype_id' => 'nullable|min:3',
            'github_id' => 'nullable|min:3',
        ];
    }

    public function save(){
        $validated = $this->validate();
        $validated['employee_id'] = $this->employee_id;

        EmployeeAccount::create($validated);

        session()->flash('status', 'Employee successfully created.');
 
        $this->redirectRoute('employee.index');
    }

    public function render()
    {
        return view('livewire.employees.create.account-access');
    }
}
