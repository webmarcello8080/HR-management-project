<?php

namespace App\Livewire\Holidays;

use App\Models\Holiday;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\Attributes\On; 

class IndexHoliday extends Component
{
    public int $year = 0;
    public bool $showModal = false;

    #[On('closeModal')]
    public function toggleModal(): void
    {
        $this->showModal = !$this->showModal;
    }

    #[On('refreshParent')]
    public function render()
    {
        if(!$this->year){
            $this->year = date('Y');
        }

        return view('livewire.holidays.index-holiday', [
            'holidays' => Holiday::filterByYear($this->year),
            'year' => $this->year,
        ]);
    }
}
