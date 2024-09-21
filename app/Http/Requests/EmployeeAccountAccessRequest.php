<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeAccountAccessRequest extends FormRequest
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
        $userId = $this->employee ? $this->employee?->user?->id : null;

        return [
            'email' => 'required|email:rfc,dns|' . Rule::unique('users')->ignore($userId),
            'roles' => 'required|array',
            'slack_id' => 'nullable|min:3',
            'skype_id' => 'nullable|min:3',
            'github_id' => 'nullable|min:3',
        ];
    }
}
