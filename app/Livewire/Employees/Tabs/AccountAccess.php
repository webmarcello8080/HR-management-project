<?php

namespace App\Livewire\Employees\Tabs;

use App\Models\Employee;
use App\Models\EmployeeAccount;
use Livewire\Component;
use Livewire\Attributes\Validate;

class AccountAccess extends Component
{
    public EmployeeAccount $employee_account;
    public Employee $employee;
    #[Validate]
    public $email;
    #[Validate]
    public $slack_id;
    #[Validate]
    public $skype_id;
    #[Validate]
    public $github_id;

    public function mount(Employee $employee){
        $this->employee = $employee;
        $this->employee_account = $employee->employeeAccount ?? new EmployeeAccount();
        $this->email = $this->employee_account->email;
        $this->slack_id = $this->employee_account->slack_id;
        $this->skype_id = $this->employee_account->skype_id;
        $this->github_id = $this->employee_account->github_id;

    }

    public function rules(){
        return [
            'email' => 'required|email|unique:employee_accounts,email,' . $this->employee_account->id,
            'slack_id' => 'nullable|min:3',
            'skype_id' => 'nullable|min:3',
            'github_id' => 'nullable|min:3',
        ];
    }

    public function save(){
        $validated = $this->validate();
        $validated['employee_id'] = $this->employee->id;

        $this->employee_account->fill($validated);
        $this->employee_account->save();

        session()->flash('status', 'Employee successfully created.');
 
        $this->redirectRoute('employee.index');
    }

    public function render()
    {
        return view('livewire.employees.tabs.account-access');
    }
}
