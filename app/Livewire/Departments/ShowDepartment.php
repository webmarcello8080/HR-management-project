<?php

namespace App\Livewire\Departments;

use App\Models\Department;
use App\Models\Employee;
use App\Services\EmployeeSearchService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Component;

class ShowDepartment extends Component
{
    public Department $department;
    public Collection $employees;
    public string $search = '';

    public function mount(Department $department): void
    {
        $this->department = $department;
        $this->employees = Employee::whereHas('employeeInformation', function ($query) use ($department) {
            $query->WhereHas('department', function ($query) use ($department) {
                $query->where('id', 'like', '%' . $department->id . '%');
            });
        })->get();
    }

    public function updatedSearch(): void
    {
        $searchService = new EmployeeSearchService;
        $this->employees = $searchService->search(['keyword' => $this->search, 'department_id' => $this->department->id]);
    }

    public function render(): View
    {
        return view('livewire.departments.show-department');
    }
}
