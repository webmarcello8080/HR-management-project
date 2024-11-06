<?php

namespace App\Livewire\Leaves;

use App\Models\Leave;
use Illuminate\View\View;
use Livewire\Component;

class LineLeave extends Component
{
    public Leave $leave;
    public bool $display_user;

    public function mount(Leave $leave, bool $display_user): void
    {
        $this->leave = $leave;
        $this->display_user = $display_user;
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
