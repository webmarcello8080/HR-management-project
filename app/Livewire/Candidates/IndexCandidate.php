<?php

namespace App\Livewire\Candidates;

use App\Models\Candidate;
use App\Services\CandidateSearchService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class IndexCandidate extends Component
{
    public Collection $candidates;
    public string $search = '';

    public function mount(): void
    {
        $this->candidates = Candidate::all();
    }

    public function updatedSearch(): void
    {
        $searchService = new CandidateSearchService;
        $this->candidates = $searchService->search($this->search);
    }

    #[On('refreshParent')]
    public function render(): View
    {
        return view('livewire.candidates.index-candidate');
    }
}
