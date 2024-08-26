@section('page-title', 'Create/Edit Attendance')
@section('page-subtitle', 'All Attendances > Create/Edit Attendance')
<div class="rounded-container">
    <form wire:submit='save'>
        <div class="flex justify-center gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <input type="text" wire:model.blur='date' onfocus="(this.type='date')" onblur="(this.type='text')" class="input-element" placeholder="Attendance Date">
                @error('date') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <input type="text" wire:model.blur='start_time' onfocus="(this.type='time')" onblur="(this.type='text')" class="input-element" placeholder="Start Time">
                @error('start_time') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <input type="text" wire:model.blur='finish_time' onfocus="(this.type='time')" onblur="(this.type='text')" class="input-element" placeholder="Finish Time">
                @error('finish_time') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-center gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <input type="number" step="0.01" wire:model.blur='break_time' class="input-element" placeholder="Break Time (in minutes)">
                @error('break_time') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <input type="number" step="0.01" wire:model.blur='working_hours' class="input-element" placeholder="Working Hours (in hours)">
                @error('working_hours') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-end gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <select wire:model.blur='employee_type_id' class="input-element">
                    <option value="">Employee Type</option>
                    @foreach (\App\Models\EmployeeType::all() as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                @error('employee_type_id') <span class="error">{{ $message }}</span> @enderror
            </div>
            @can('admin')
                <div class="flex-1 flex-grow">
                    <select wire:model.blur='employee_id' class="input-element">
                        <option value="">Select Employee</option>
                        @foreach (\App\Models\Employee::orderBy('first_name')->get() as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->getFullName() }}</option>
                        @endforeach
                    </select>
                    @error('employee_id') <span class="error">{{ $message }}</span> @enderror
                </div>
            @endcan
        </div>
        <div class="flex justify-end gap-5">
            <button type="reset" class="btn btn-transparent btn-big">Cancel</button>
            <button type="submit" class="btn btn-purple btn-big">Save</button>
        </div>
    </form>
</div>