@section('page-title', 'Create/Edit Attendance')
@section('page-subtitle', 'All Attendances > Create/Edit Attendance')
<div class="rounded-container">
    <form wire:submit='save'>
        <div class="flex justify-center gap-5 mb-5">
            <div class="flex-1 flex-grow" wire:ignore>
                <label class="input-label" for="">Attendance Date</label>
                <input type="text" wire:model.blur='date' onfocus="(this.type='date')" onblur="(this.type='text')" class="input-element" placeholder="Attendance Date">
                @error('date') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow" wire:ignore>
                <label class="input-label" for="">Start Time</label>
                <input type="text" wire:model.blur='start_time' onfocus="(this.type='time')" onblur="(this.type='text')" class="input-element" placeholder="Start Time">
                @error('start_time') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow" wire:ignore>
                <label class="input-label" for="">Finish Time</label>
                <input type="text" wire:model.blur='finish_time' onfocus="(this.type='time')" onblur="(this.type='text')" class="input-element" placeholder="Finish Time">
                @error('finish_time') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-center gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <label class="input-label" for="">Break Time (in minutes)</label>
                <input type="number" step="1" wire:model.blur='break_time' class="input-element" placeholder="Break Time (in minutes)">
                @error('break_time') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <label class="input-label" for="">Working Hours (in hours)</label>
                <input type="number" step="0.01" wire:model.blur='working_hours' class="input-element" placeholder="Working Hours (in hours)">
                @error('working_hours') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-end gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <label class="input-label" for="">Employee Type</label>
                <x-select-search :data="\App\Models\EmployeeType::convertToArray('name')" wire:model="employee_type_id" x-on:blur="$wire.submit()" placeholder="Employee Type"/>
                @error('employee_type_id') <span class="error">{{ $message }}</span> @enderror
            </div>
            @can('admin')
                <div class="flex-1 flex-grow">
                    <label class="input-label" for="">Select Employee</label>
                    <x-select-search :data="\App\Models\Employee::getFullNameArray()" wire:model="employee_id" x-on:blur="$wire.submit()" placeholder="Select Employee"/>
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