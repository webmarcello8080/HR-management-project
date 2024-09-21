<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacancyRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:200',
            'expiring_date' => 'nullable|date',
            'vacancy_status' => 'required',
            'working_day' => 'required',
            'department_id' => 'nullable',
            'location_id' => 'nullable',
            'employee_type_id' => 'nullable',
            'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'amount_per' => 'required|string|min:3',
        ];
    }
}
