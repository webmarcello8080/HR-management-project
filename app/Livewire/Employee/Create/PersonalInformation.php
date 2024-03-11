<?php

namespace App\Livewire\Employee\Create;

use App\Models\Employee;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class PersonalInformation extends Component
{
    use WithFileUploads;

    #[Validate('image|max:1024')]
    public $profile_image;
    #[Validate('required|min:3')]
    public $first_name;
    #[Validate('required|min:3')]
    public $last_name;
    #[Validate('nullable|min:3')]
    public $mobile_number;
    #[Validate('required|min:3|email|unique:employees,email')]
    public $email;
    #[Validate('required|date')]
    public $dob;
    #[Validate('required|integer')]
    public $marital_status;
    #[Validate('required|integer')]
    public $gender;
    #[Validate('required|min:3')]
    public $nationality;
    #[Validate('required|min:3')]
    public $address;
    #[Validate('required|min:3')]
    public $city;
    #[Validate('nullable|min:3')]
    public $country;
    #[Validate('required|min:3')]
    public $post_code;

    public function save(){
        $validated = $this->validate();

        $employee = Employee::create($validated);

        $this->dispatch('next-step', employeeId: $employee->id);
    }

    public function render()
    {
        return view('livewire.employee.create.personal-information');
    }
}
