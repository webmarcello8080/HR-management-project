<?php

namespace App\Livewire\Payrolls;

use App\Models\Payroll;
use App\Services\PayrollSearchService;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Session;

class IndexPayroll extends Component
{
    use WithPagination;
    
    public string $search = '';
    public string $search_date = '';

    public function updated(): void
    {
        $this->resetPage();
    }

    #[On('refreshParent')]
    public function render()
    {
        $perPage = Session::get('per_page', 10);

        if(!$this->search && !$this->search_date){
            $payrolls = Payroll::orderBy('payroll_date', 'desc')->paginate($perPage);
        } else{
            $searchService = new PayrollSearchService;
            $payrolls = $searchService->search($this->search, $this->search_date)->orderBy('payroll_date', 'desc')->paginate($perPage);
        }

        return view('livewire.payrolls.index-payroll', [
            'payrolls' => $payrolls,
        ]);
    }
}
