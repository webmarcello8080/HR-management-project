<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceRequest extends FormRequest
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
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'finish_time' => 'required|date_format:H:i|after:start_time',
            'break_time' => 'required|numeric',
            'working_hours' => 'required|numeric',
            'employee_type_id' => 'nullable|integer',
            'employee_id' => 'required|integer',
        ];
    }
}
