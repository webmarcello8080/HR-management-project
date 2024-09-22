<?php

namespace App\Livewire\Employees\Tabs;

use App\Http\Requests\EmployeeAccountAccessRequest;
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

    public function rules(): array{
        return (new EmployeeAccountAccessRequest())->setEmployee($this->employee)->rules();
    }

    public function mount(Employee $employee): void{
        $this->employee = $employee;
        $this->employee_account = $employee->employeeAccount ?? new EmployeeAccount();
        $this->email = $employee?->user?->email;
        $this->fill(
            $employee->employeeAccount->only('slack_id', 'skype_id', 'github_id'),
        );

        // get roles IDs from user
        $roleIds = $employee?->user?->roles()->pluck('roles.id')->toArray();
        $this->roles = $roleIds ? array_fill_keys($roleIds, true) : [];
    }

    public function save(): void{
        // validate
        $validated = $this->validate();
        $validated['employee_id'] = $this->employee->id;

        $employeeService = new CreateEmployeeService;
        $employeeService->createEmployeeAccount($this->employee_account, $this->employee, $validated);

        session()->flash('status', 'Employee successfully submitted.');
 
        $this->redirectRoute('employee.index');
    }

    public function render(): View
    {
        return view('livewire.employees.tabs.account-access');
    }
}
