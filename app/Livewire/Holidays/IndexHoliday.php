<?php

namespace App\Livewire\Holidays;

use App\Models\Holiday;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\Attributes\On; 

class IndexHoliday extends Component
{
    public Collection $holidays;
    public int $year;
    public bool $showModal = false;

    public function mount(): void
    {
        $this->year = date('Y');
    }

    #[On('closeModal')]
    public function toggleModal(): void
    {
        $this->showModal = !$this->showModal;
    }

    #[On('refreshParent')]
    public function render()
    {
        $this->holidays = Holiday::filterByYear($this->year);

        return view('livewire.holidays.index-holiday');
    }
}
