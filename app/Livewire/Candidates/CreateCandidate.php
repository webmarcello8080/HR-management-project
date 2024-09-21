<?php

namespace App\Livewire\Candidates;

use App\Http\Requests\CandidateRequest;
use App\Models\Candidate;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateCandidate extends Component
{
    public Candidate $candidate;
    #[Validate]
    public string|null $full_name;
    #[Validate]
    public string|null $email;
    #[Validate]
    public string|null $phone;
    #[Validate]
    public $candidate_status;
    #[Validate]
    public $vacancy_id;

    public function rules(){
        return (new CandidateRequest())->rules();
    }

    public function mount(Candidate $candidate): void
    {
        $this->candidate = $candidate ?? new Candidate();
        $this->full_name = $this->candidate->full_name;
        $this->email = $this->candidate->email;
        $this->phone = $this->candidate->phone;
        $this->phone = $this->candidate->phone;
        $this->candidate_status = $this->candidate->candidate_status;
        $this->vacancy_id = $this->candidate->vacancy_id;
    }

    public function save(): void
    {
        $validated = $this->validate();

        $this->candidate->fill($validated);
        $this->candidate->save();

        $this->redirectRoute('candidate.index');
    }

    public function render(): View
    {
        return view('livewire.candidates.create-candidate');
    }
}
