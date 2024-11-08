<?php

namespace App\Livewire\Settings;

use Illuminate\View\View;
use Livewire\Component;

class IndexSetting extends Component
{
    public int $activeStep = 1;

    public function getToStep($step): void{
        $this->activeStep = $step;
    }

    public function render(): View
    {
        return view('livewire.settings.index-setting');
    }
}
