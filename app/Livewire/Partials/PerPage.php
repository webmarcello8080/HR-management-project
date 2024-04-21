<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class PerPage extends Component
{
    public $perPageOptions = [5, 10, 25, 50, 100]; 
    public $perPage;

    public function mount(): void
    {
        $this->perPage = Session::get('per_page', 10);
    }

    public function updatedPerPage(): void
    {
        Session::put('per_page', $this->perPage);
        $this->dispatch('refreshParent');
    }

    public function render(): View
    {
        return view('livewire.partials.per-page');
    }
}
