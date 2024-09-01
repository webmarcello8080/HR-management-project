<?php

namespace App\Livewire\Employees\Tabs;

use App\Models\Employee;
use App\Services\CreateEmployeeService;
use App\Traits\ConvertEmptyStringsToNull;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class PersonalInformation extends Component
{
    use WithFileUploads, ConvertEmptyStringsToNull;

    public Employee $employee;
    public $existing_media;
    #[Validate]
    public $profile_image;
    #[Validate]
    public $first_name;
    #[Validate]
    public $last_name;
    #[Validate]
    public $mobile_number;
    #[Validate]
    public $email;
    #[Validate]
    public $dob;
    #[Validate]
    public $marital_status;
    #[Validate]
    public $gender;
    #[Validate]
    public $nationality;
    #[Validate]
    public $address;
    #[Validate]
    public $city;
    #[Validate]
    public $country;
    #[Validate]
    public $post_code;

    public function rules()
    {
        return [
            'profile_image' => 'nullable|image|max:2048',
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'mobile_number' => 'nullable|min:3',
            'email' => 'required|min:3|email:rfc,dns|unique:employees,email,' . $this->employee->id,
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

    public function mount(Employee $employee = null)
    {
        $this->employee = $employee ?? new Employee();
        $this->existing_media = $this->employee->exists ? $this->employee->getMediaUrl('profile_image') : null;
        $this->first_name = $this->employee->first_name;
        $this->last_name = $this->employee->last_name;
        $this->mobile_number = $this->employee->mobile_number;
        $this->email = $this->employee->email;
        $this->dob = $this->employee->dob;
        $this->marital_status = $this->employee->marital_status;
        $this->gender = $this->employee->gender;
        $this->nationality = $this->employee->nationality;
        $this->address = $this->employee->address;
        $this->city = $this->employee->city;
        $this->country = $this->employee->country;
        $this->post_code = $this->employee->post_code;
    }

    public function save(): void
    {
        $validated = $this->validate();

        $employeeService = new CreateEmployeeService;
        $employeeService->createEmployee($this->employee, $validated, 'profile_image');

        $this->dispatch('next-step', employee: $this->employee);
    }

    public function removeMedia(): void
    {
        $this->employee->clearMediaCollection('profile_image');
        $this->existing_media = '';
    }

    public function render(): View
    {
        return view('livewire.employees.tabs.personal-information');
    }
}
