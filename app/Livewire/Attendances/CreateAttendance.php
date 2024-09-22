<?php

namespace App\Livewire\Attendances;

use App\Http\Requests\AttendanceRequest;
use App\Models\Attendance;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateAttendance extends Component
{
    public Attendance $attendance;
    #[Validate]
    public $date;
    #[Validate]
    public $start_time;
    #[Validate]
    public $finish_time;
    #[Validate]
    public $break_time;
    #[Validate]
    public $working_hours;
    #[Validate]
    public $employee_type_id;
    #[Validate]
    public $employee_id;

    public function rules(): array
    {
        return (new AttendanceRequest())->rules();
    }

    public function mount(Attendance $attendance): void
    {
        $this->attendance = $attendance ?? new Attendance();
        $this->fill(
            $attendance->only('start_time', 'finish_time', 'break_time', 'working_hours', 'employee_type_id'),
        );

        $this->date = $this->attendance->date ? $this->attendance->date->format('Y-m-d') : null;
        $this->employee_id = auth()->user()->hasRole('employee') ? auth()->user()->employee->id : $this->attendance->employee_id;
    }

    public function updated(): void
    {
        if($this->start_time && $this->finish_time){
            $start_components = explode(":", $this->start_time);
            $start_minutes = intval($start_components[0]) * 60 + intval($start_components[1]);

            $finish_components = explode(":", $this->finish_time);
            $finish_minutes = intval($finish_components[0]) * 60 + intval($finish_components[1]);

            $this->working_hours = number_format(($finish_minutes - $start_minutes - ($this->break_time ?? 0)) / 60, 2) ;
        }
    }

    public function save(): void
    {
        $validated = $this->validate();

        $this->attendance->fill($validated);
        $this->attendance->save();

        session()->flash('status', 'Attendance successfully submitted.');

        if(auth()->user()->hasRole('employee')){
            $this->redirectRoute('employee.show', auth()->user()->employee);
        } else {
            $this->redirectRoute('attendance.index');
        }
    }

    public function render(): View
    {
        return view('livewire.attendances.create-attendance');
    }
}
