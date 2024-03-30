<?php

namespace App\Livewire\Employees;

use App\Models\Employee;
use App\Services\EmployeeSearchService;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class IndexEmployee extends Component
{
    public Collection $employees;
    public string $search = '';

    public function mount(){
        $this->employees = Employee::all();
    }

    public function updatedSearch(): void
    {
        $searchService = new EmployeeSearchService;
        $this->employees = $searchService->search(['keyword' => $this->search]);
    }

    public function render()
    {
        return view('livewire.employees.index-employee');
    }
}
