<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneralSettingsRequest extends FormRequest
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
            'company_name' => 'required|string|max:255',
            'company_address' => 'required|string|max:255',
            'company_phone' => 'nullable|string|max:255',
            'company_email' => 'nullable|email:rfc,dns|max:255',
            'favicon' => 'nullable|image|max:1000',
        ];
    }
}
