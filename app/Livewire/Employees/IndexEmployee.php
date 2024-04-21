<?php

namespace App\Livewire\Employees;

use App\Models\Employee;
use App\Services\EmployeeSearchService;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class IndexEmployee extends Component
{
    use WithPagination;

    public string $search = '';

    public function updatedSearch():void
    {
        $this->resetPage();
    }

    public function render(): View
    {
        if(!$this->search){
            $employees = Employee::paginate(3);
        } else {
            $searchService = new EmployeeSearchService;
            $employees = $searchService->search(['keyword' => $this->search])->paginate(3);
        }

        return view('livewire.employees.index-employee', [
            'employees' => $employees,
        ]);
    }
}
