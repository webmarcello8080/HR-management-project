<?php

namespace App\Livewire\Employees\Tabs;

use App\Models\Employee;
use App\Models\EmployeeAccount;
use App\Services\CreateEmployeeService;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\Attributes\Validate;

class AccountAccess extends Component
{
    public EmployeeAccount $employee_account;
    public Employee $employee;
    #[Validate]
    public $roles = [];
    #[Validate]
    public $email;
    #[Validate]
    public $slack_id;
    #[Validate]
    public $skype_id;
    #[Validate]
    public $github_id;

    public function mount(Employee $employee): void{
        $this->employee = $employee;
        $this->employee_account = $employee->employeeAccount ?? new EmployeeAccount();
        $this->email = $employee?->user?->email;
        $this->slack_id = $this->employee_account->slack_id;
        $this->skype_id = $this->employee_account->skype_id;
        $this->github_id = $this->employee_account->github_id;
        // get roles IDs from user
        $roleIds = $employee?->user?->roles()->pluck('roles.id')->toArray();
        $this->roles = $roleIds ? array_fill_keys($roleIds, true) : [];
    }

    public function rules(): array{
        return [
            'email' => 'required|email|unique:users,email,' . $this->employee?->user?->id,
            'roles' => 'required|array',
            'slack_id' => 'nullable|min:3',
            'skype_id' => 'nullable|min:3',
            'github_id' => 'nullable|min:3',
        ];
    }

    public function save(): void{
        // validate
        $validated = $this->validate();
        $validated['employee_id'] = $this->employee->id;

        $employeeService = new CreateEmployeeService;
        $employeeService->createEmployeeAccount($this->employee_account, $this->employee, $validated);

        session()->flash('status', 'Employee successfully created.');
 
        $this->redirectRoute('employee.index');
    }

    public function render(): View
    {
        return view('livewire.employees.tabs.account-access');
    }
}
