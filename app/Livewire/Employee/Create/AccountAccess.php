<?php

namespace App\Livewire\Employee\Create;

use App\Models\EmployeeAccount;
use Livewire\Component;
use Livewire\Attributes\Validate;

class AccountAccess extends Component
{
    #[Validate('required|email|unique:employee_accounts,email')]
    public $email;
    #[Validate('nullable|min:3')]
    public $slack_id;
    #[Validate('nullable|min:3')]
    public $skype_id;
    #[Validate('nullable|min:3')]
    public $github_id;
    public $employee_id;

    public function mount($employee_id){
        $this->employee_id = $employee_id;
    }

    public function save(){
        $validated = $this->validate();
        $validated['employee_id'] = $this->employee_id;

        $employee_information = EmployeeAccount::create($validated);

        $this->dispatch('next-step', employeeId: $this->employee_id);

        session()->flash('status', 'Employee successfully created.');
 
        $this->redirectRoute('employee.index');
    }

    public function render()
    {
        return view('livewire.employee.create.account-access');
    }
}
