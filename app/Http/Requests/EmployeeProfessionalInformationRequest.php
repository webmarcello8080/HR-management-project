<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeProfessionalInformationRequest extends FormRequest
{
    protected $employee;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    // Allow setting employee manually
    public function setEmployee($employee)
    {
        $this->employee = $employee;
        return $this; // Return instance to allow chaining
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $employeeId = $this->employee ? $this->employee?->employeeInformation?->id : null;

        return [
            'unique_id' => 'required|min:3|' . Rule::unique('employee_information')->ignore($employeeId),
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
}
