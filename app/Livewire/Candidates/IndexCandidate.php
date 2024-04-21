<?php

namespace App\Livewire\Candidates;

use App\Models\Candidate;
use App\Services\CandidateSearchService;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class IndexCandidate extends Component
{
    use WithPagination;

    public string $search = '';

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    #[On('refreshParent')]
    public function render(): View
    {
        if(!$this->search){
            $candidates = Candidate::paginate(3);
        } else {
            $searchService = new CandidateSearchService;
            $candidates = $searchService->search($this->search)->paginate(3);
        }

        return view('livewire.candidates.index-candidate', [
            'candidates' => $candidates
        ]);
    }
}
