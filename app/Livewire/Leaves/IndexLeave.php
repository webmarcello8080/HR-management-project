<?php

namespace App\Livewire\Leaves;

use App\Models\Leave;
use App\Services\LeaveSearchService;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Session;

class IndexLeave extends Component
{
    use WithPagination;
    
    public string $search = '';
    public string $search_date = '';

    public function updated(): void
    {
        $this->resetPage();
    }

    #[On('refreshParent')]
    public function render(): View
    {
        $perPage = Session::get('per_page', 10);

        if(!$this->search && !$this->search_date){
            $leaves = Leave::orderBy('from_date', 'desc')->paginate($perPage);
        } else{
            $searchService = new LeaveSearchService;
            $leaves = $searchService->search($this->search, $this->search_date)->orderBy('from_date', 'desc')->paginate($perPage);
        }

        return view('livewire.leaves.index-leave', [
            'leaves' => $leaves,
        ]);
    }
}
