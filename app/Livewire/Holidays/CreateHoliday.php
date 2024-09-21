<?php

namespace App\Livewire\Holidays;

use App\Http\Requests\HolidayRequest;
use App\Models\Holiday;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Attributes\Validate;

class CreateHoliday extends Component
{
    public Holiday $holiday;
    #[Validate]
    public $date;
    #[Validate]
    public $name;

    public function rules(){
        return (new HolidayRequest())->rules();
    }

    public function mount():void{
        $this->holiday = new Holiday();
    }

    public function save(): void
    {
        $validated = $this->validate();

        $this->holiday->fill($validated);
        $this->holiday->save();

        $this->close();
    }

    public function close(): void
    {
        $this->dispatch('closeModal');
    }

    public function render():View
    {
        return view('livewire.holidays.create-holiday');
    }
}
