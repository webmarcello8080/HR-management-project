<?php

namespace App\Livewire\Candidates;

use App\Models\Candidate;
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

    #[On('refreshParent')]
    public function render(): View
    {
        return view('livewire.candidates.index-candidate');
    }
}
