<?php

namespace App\Livewire\Employees\Tabs;

use App\Http\Requests\EmployeePersonalInformationRequest;
use App\Models\Employee;
use App\Services\CreateEmployeeService;
use App\Traits\ConvertEmptyStringsToNull;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Spatie\LivewireFilepond\WithFilePond;

class PersonalInformation extends Component
{
    use WithFilePond, ConvertEmptyStringsToNull;

    public Employee $employee;
    public $existing_media;
    #[Validate]
    public $first_name;
    #[Validate]
    public $last_name;
    #[Validate]
    public $mobile_number;
    #[Validate]
    public $email;
    #[Validate]
    public $profile_image;
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

        $this->fill(
            $employee->only('first_name', 'last_name', 'mobile_number', 'email', 'profile_image', 'dob', 'marital_status', 'gender', 'nationality', 'address', 'city', 'country', 'post_code'),
        );
    }

    public function save(): void
    {
        $validated = $this->validate();

        if($this->profile_image instanceof TemporaryUploadedFile){
            $validated['profile_image'] = asset('storage/' . $this->profile_image->store('profile-image', 'public'));
        }

        $employeeService = new CreateEmployeeService;
        $employeeService->createEmployee($this->employee, $validated);

        $this->dispatch('next-step', employee: $this->employee);
    }

    public function render(): View
    {
        return view('livewire.employees.tabs.personal-information');
    }
}
