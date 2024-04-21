<?php

namespace App\Livewire\Leaves;

use App\Models\Leave;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class IndexLeave extends Component
{
    public Collection $leaves;

    public function mount(): void
    {
        $this->leaves = Leave::all();
    }

    #[On('refreshParent')]
    public function render(): View
    {
        return view('livewire.leaves.index-leave');
    }
}
