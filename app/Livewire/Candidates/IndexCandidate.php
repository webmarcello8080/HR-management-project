<?php

namespace App\Livewire\Candidates;

use App\Models\Candidate;
use App\Services\CandidateSearchService;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Session;

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
        $perPage = Session::get('per_page', 10);

        if(!$this->search){
            $candidates = Candidate::paginate($perPage);
        } else {
            $searchService = new CandidateSearchService;
            $candidates = $searchService->search($this->search)->paginate($perPage);
        }

        return view('livewire.candidates.index-candidate', [
            'candidates' => $candidates
        ]);
    }
}
