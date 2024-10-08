<?php

namespace App\Livewire\Leaves;

use App\Http\Requests\LeaveRequest;
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
        return (new LeaveRequest())->rules();
    }

    public function mount(Leave $leave): void
    {
        $this->leave = $leave ?? new Leave();
        $this->from_date = $this->leave->from_date ? $this->leave->from_date->format('Y-m-d') : null;
        $this->to_date = $this->leave->to_date ? $this->leave->to_date->format('Y-m-d') : null;
        $this->leave_status = auth()->user()->hasRole('employee') ? 1 : $this->leave->leave_status;
        $this->employee_id = auth()->user()->hasRole('employee') ? auth()->user()->employee->id : $this->leave->employee_id;
        $this->fill(
            $leave->only('days', 'reason'),
        );
    }

    public function save(): void
    {
        $validated = $this->validate();

        $this->leave->fill($validated);
        $this->leave->save();

        session()->flash('status', 'Leave successfully submitted.');

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
