<?php

namespace App\Livewire\Candidates;

use App\Models\Candidate;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateCandidate extends Component
{
    public Candidate $candidate;
    #[Validate]
    public string $full_name;
    #[Validate]
    public string $email;
    #[Validate]
    public string $phone;
    #[Validate]
    public int $candidate_status;
    #[Validate]
    public int $vacancy_id;

    public function rules(){
        return [
            'full_name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required|min:3',
            'candidate_status' => 'required|integer',
            'vacancy_id' => 'required|integer',
        ];
    }

    public function mount(Candidate $candidate): void
    {
        $this->candidate = $candidate ?? new Candidate();
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
