<?php

namespace App\Livewire\Employees\Tabs;

use App\Http\Requests\EmployeeProfessionalInformationRequest;
use App\Models\Employee;
use App\Models\EmployeeInformation;
use App\Traits\ConvertEmptyStringsToNull;
use Livewire\Component;
use Livewire\Attributes\Validate;

class ProfessionalInformation extends Component
{
    use ConvertEmptyStringsToNull;

    public EmployeeInformation $employee_info;
    public Employee $employee;
    #[Validate]
    public $unique_id;
    #[Validate]
    public $designation;
    #[Validate]
    public $joining_date;
    #[Validate]
    public $annual_salary;
    #[Validate]
    public $days_of_holiday;
    #[Validate]
    public $working_day;
    #[Validate]
    public $employee_type_id;
    #[Validate]
    public $department_id;
    #[Validate]
    public $location_id;

    public function rules(){
        return (new EmployeeProfessionalInformationRequest())->setEmployee($this->employee)->rules();
    }

    public function mount(Employee $employee){
        $this->employee = $employee;
        $this->employee_info = $employee->employeeInformation ?? new EmployeeInformation();
        $this->fill(
            $employee->employeeInformation->only('unique_id', 'designation', 'annual_salary', 'days_of_holiday', 'working_day', 'employee_type_id', 'department_id', 'location_id'),
        );
        $this->joining_date = $employee->employeeInformation->joining_date?->format('Y-m-d');
    }

    public function save(){
        $validated = $this->validate();
        $validated['employee_id'] = $this->employee->id;

        $this->employee_info->fill($validated);
        $this->employee_info->save();

        $this->dispatch('next-step', employee: $this->employee);
    }

    public function render()
    {
        return view('livewire.employees.tabs.professional-information');
    }
}
