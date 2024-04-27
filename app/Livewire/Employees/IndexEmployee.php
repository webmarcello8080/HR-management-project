<?php

namespace App\Livewire\Employees;

use App\Models\Employee;
use App\Services\EmployeeSearchService;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;

class IndexEmployee extends Component
{
    use WithPagination;

    public string $search = '';

    public function updatedSearch():void
    {
        $this->resetPage();
    }

    #[On('refreshParent')]
    public function render(): View
    {
        $perPage = Session::get('per_page', 10);

        if(!$this->search){
            $employees = Employee::orderBy('first_name')->paginate($perPage);
        } else {
            $searchService = new EmployeeSearchService;
            $employees = $searchService->search(['keyword' => $this->search])->orderBy('first_name')->paginate($perPage);
        }

        return view('livewire.employees.index-employee', [
            'employees' => $employees,
        ]);
    }
}
