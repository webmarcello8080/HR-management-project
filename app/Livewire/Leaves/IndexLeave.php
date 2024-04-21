<?php

namespace App\Livewire\Leaves;

use App\Models\Leave;
use App\Services\LeaveSearchService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class IndexLeave extends Component
{
    public Collection $leaves;
    public string $search = '';
    public string $search_date = '';

    public function mount(): void
    {
        $this->leaves = Leave::all();
    }

    public function updated(): void
    {
        $searchService = new LeaveSearchService;
        $this->leaves = $searchService->search($this->search, $this->search_date);
    }

    #[On('refreshParent')]
    public function render(): View
    {
        return view('livewire.leaves.index-leave');
    }
}
