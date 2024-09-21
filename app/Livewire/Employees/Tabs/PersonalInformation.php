<?php

namespace App\Livewire\Employees\Tabs;

use App\Http\Requests\EmployeePersonalInformationRequest;
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
        return (new EmployeePersonalInformationRequest())->setEmployee($this->employee)->rules();
    }

    public function mount(Employee $employee = null)
    {
        $this->employee = $employee ?? new Employee();
        $this->existing_media = $this->employee->exists ? $this->employee->getMediaUrl('profile_image') : null;

        $this->fill(
            $employee->only('first_name', 'last_name', 'mobile_number', 'email', 'dob', 'marital_status', 'gender', 'nationality', 'address', 'city', 'country', 'post_code'),
        );
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
