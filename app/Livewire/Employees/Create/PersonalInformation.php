<?php

namespace App\Livewire\Employees\Create;

use App\Models\Employee;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class PersonalInformation extends Component
{
    use WithFileUploads;

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
            'email' => 'required|min:3|email|unique:employees,email',
            'dob' => 'required|date',
            'marital_status' => 'required|integer',
            'gender' => 'required|integer',
            'nationality' => 'required|min:3',
            'address' => 'required|min:3',
            'city' => 'required|min:3',
            'country' => 'nullable|min:3',
            'post_code' => 'required|min:3',
        ];
    }

    public function save(){
        $validated = $this->validate();

        $employee = Employee::create($validated);

        $this->dispatch('next-step', employeeId: $employee->id);
    }

    public function render()
    {
        return view('livewire.employees.create.personal-information');
    }
}
