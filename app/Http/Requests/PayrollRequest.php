<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PayrollRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'payroll_date' => 'required|date',
            'annual_salary' => 'required|numeric',
            'gross_pay' => 'required|numeric',
            'deduction_percentage' => 'nullable|numeric',
            'deduction' => 'nullable|numeric',
            'insurance' => 'nullable|numeric',
            'net_pay' => 'required|numeric',
            'employee_id' => 'required|integer',
        ];
    }
}
