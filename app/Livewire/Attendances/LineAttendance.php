<?php

namespace App\Livewire\Attendances;

use App\Models\Attendance;
use Illuminate\View\View;
use Livewire\Component;

class LineAttendance extends Component
{
    public Attendance $attendance;
    public bool $display_user;

    public function mount(Attendance $attendance, bool $display_user): void
    {
        $this->attendance = $attendance;
        $this->display_user = $display_user;
    }

    public function delete(): void
    {
        $this->attendance->delete();
        $this->dispatch('refreshParent');
    }

    public function render(): View
    {
        return view('livewire.attendances.line-attendance');
    }
}
