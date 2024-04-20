<?php

namespace App\Livewire\Candidates;

use App\Models\Candidate;
use Illuminate\View\View;
use Livewire\Component;

class LineCandidate extends Component
{
    public Candidate $candidate;
    public array $statusColours = ['green', 'yellow', 'red'];

    public function mount(Candidate $candidate): void
    {
        $this->candidate = $candidate;
    }

    public function delete(): void
    {
        $this->candidate->delete();
        $this->dispatch('refreshParent');
    }

    public function render(): View
    {
        return view('livewire.candidates.line-candidate');
    }
}
