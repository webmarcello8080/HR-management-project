<?php

namespace App\Livewire\Partials;

use Livewire\Component;

class UserBadge extends Component
{
    public bool $displayUserMenu = false;

    public function toggleMenu()
    {
        $this->displayUserMenu = !$this->displayUserMenu;
    }

    public function render()
    {
        return view('livewire.partials.user-badge');
    }
}
