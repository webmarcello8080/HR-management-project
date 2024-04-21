<?php

namespace App\Livewire\Departments;

use App\Models\Department;
use App\Services\EmployeeSearchService;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;

class ShowDepartment extends Component
{
    use WithPagination;

    public Department $department;
    public string $search = '';

    public function mount(Department $department): void
    {
        $this->department = $department;
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    #[On('refreshParent')]
    public function render(): View
    {
        $perPage = Session::get('per_page', 10);
        $searchService = new EmployeeSearchService;
        $employees = $searchService->search(['keyword' => $this->search, 'department_id' => $this->department->id])->paginate($perPage);

        return view('livewire.departments.show-department', [
            'employees' => $employees,
        ]);
    }
}
