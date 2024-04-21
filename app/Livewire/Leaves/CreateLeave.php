<?php

namespace App\Livewire\Leaves;

use App\Models\Leave;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateLeave extends Component
{
    public Leave $leave;
    #[Validate]
    public $from_date;
    #[Validate]
    public $to_date;
    #[Validate]
    public $days;
    #[Validate]
    public $leave_status;
    #[Validate]
    public $reason;
    #[Validate]
    public $employee_id;

    public function rules(): array
    {
        return [
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
            'days' => 'required|numeric',
            'leave_status' => 'required',
            'reason' => 'nullable|string',
            'employee_id' => 'required|integer',
        ];
    }

    public function mount(Leave $leave): void
    {
        $this->leave = $leave ?? new Leave();
        $this->from_date = $this->leave->from_date ? $this->leave->from_date->format('Y-m-d') : null;
        $this->to_date = $this->leave->to_date ? $this->leave->to_date->format('Y-m-d') : null;
        $this->days = $this->leave->days;
        $this->leave_status = auth()->user()->hasRole('employee') ? 1 : $this->leave->leave_status;
        $this->reason = $this->leave->reason;
        $this->employee_id = auth()->user()->hasRole('employee') ? auth()->user()->employee->id : $this->leave->employee_id;
    }

    public function save(): void
    {
        $validated = $this->validate();

        $this->leave->fill($validated);
        $this->leave->save();

        if(auth()->user()->hasRole('employee')){
            $this->redirectRoute('employee.show', auth()->user()->employee);
        } else {
            $this->redirectRoute('leave.index');
        }
    }

    public function render(): View
    {
        return view('livewire.leaves.create-leave');
    }
}
