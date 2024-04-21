<?php

namespace App\Livewire\Leaves;

use App\Models\Leave;
use Illuminate\View\View;
use Livewire\Component;

class LineLeave extends Component
{
    public Leave $leave;
    public array $statusColours = ['yellow', 'green', 'red'];

    public function mount(Leave $leave): void
    {
        $this->leave = $leave;
    }

    public function delete(): void
    {
        $this->leave->delete();
        $this->dispatch('refreshParent');
    }

    public function render(): View
    {
        return view('livewire.leaves.line-leave');
    }
}
