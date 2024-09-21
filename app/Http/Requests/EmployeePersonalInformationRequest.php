<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeePersonalInformationRequest extends FormRequest
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
        $employeeId = $this->employee ? $this->employee->id : null;

        return [
            'profile_image' => 'nullable|image|max:2048',
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'mobile_number' => 'nullable|min:3',
            'email' => 'required|min:3|email:rfc,dns|' . Rule::unique('employees')->ignore($employeeId),
            'dob' => 'required|date',
            'marital_status' => 'nullable',
            'gender' => 'required',
            'nationality' => 'nullable|min:3',
            'address' => 'required|min:3',
            'city' => 'required|min:3',
            'country' => 'nullable|min:3',
            'post_code' => 'required|min:3',
        ];
    }
}
