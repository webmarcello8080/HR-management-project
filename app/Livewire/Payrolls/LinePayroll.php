<?php

namespace App\Livewire\Payrolls;

use App\Models\Payroll;
use Illuminate\View\View;
use Livewire\Component;

class LinePayroll extends Component
{
    public Payroll $payroll;
    public bool $display_user;

    public function mount(Payroll $payroll, bool $display_user): void
    {
        $this->payroll = $payroll;
        $this->display_user = $display_user;
    }

    public function delete(): void
    {
        $this->payroll->delete();
        $this->dispatch('refreshParent');
    }

    public function render(): View
    {
        return view('livewire.payrolls.line-payroll');
    }
}
