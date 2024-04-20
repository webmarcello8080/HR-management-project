<?php

namespace App\Livewire\Holidays;

use App\Models\Holiday;
use Illuminate\View\View;
use Livewire\Component;

class LineHoliday extends Component
{
    public Holiday $holiday;

    public function mount(Holiday $holiday): void
    {
        $this->holiday = $holiday;
    }

    public function delete(): void
    {
        $this->holiday->delete();
        $this->dispatch('refreshParent');
    }

    public function render(): View
    {
        return view('livewire.holidays.line-holiday');
    }
}
