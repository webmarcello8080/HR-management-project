<?php

namespace App\Livewire\Partials;

use Livewire\Component;

class UserBudge extends Component
{
    public bool $displayUserMenu = false;

    public function toggleMenu()
    {
        $this->displayUserMenu = !$this->displayUserMenu;
    }

    public function render()
    {
        return view('livewire.partials.user-budge');
    }
}
