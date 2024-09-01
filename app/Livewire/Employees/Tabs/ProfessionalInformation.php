<?php

namespace App\Livewire\Employees\Tabs;

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

    public function mount(Employee $employee){
        $this->employee = $employee;
        $this->employee_info = $employee->employeeInformation ?? new EmployeeInformation();
        $this->unique_id = $this->employee_info->unique_id;
        $this->designation = $this->employee_info->designation;
        $this->joining_date = $this->employee_info->joining_date;
        $this->annual_salary = $this->employee_info->annual_salary;
        $this->days_of_holiday = $this->employee_info->days_of_holiday;
        $this->working_day = $this->employee_info->working_day;
        $this->employee_type_id = $this->employee_info->employee_type_id;
        $this->department_id = $this->employee_info->department_id;
        $this->location_id = $this->employee_info->location_id;
    }

    public function rules(){
        return [
            'unique_id' => 'required|min:3|unique:employee_information,unique_id,' . $this->employee_info->id,
            'designation' => 'required|min:3',
            'joining_date' => 'required|date',
            'days_of_holiday' => 'required|numeric',
            'annual_salary' => 'nullable|numeric',
            'working_day' => 'required',
            'employee_type_id' => 'nullable',
            'department_id' => 'nullable',
            'location_id' => 'nullable',
        ];
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
