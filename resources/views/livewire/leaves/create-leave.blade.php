@section('page-title', 'Create/Edit Leave')
@section('page-subtitle', 'All Leaves > Create/Edit Leave')
<div class="rounded-container">
    <form wire:submit='save'>
        <div class="flex justify-center gap-5 mb-5">
            <div class="flex-1 flex-grow" wire:ignore>
                <label class="input-label" for="">Date From</label>
                <input type="text" wire:model.blur='from_date' onfocus="(this.type='date')" onblur="(this.type='text')" class="input-element" placeholder="Date From">
                @error('from_date') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow" wire:ignore>
                <label class="input-label" for="">Date To</label>
                <input type="text" wire:model.blur='to_date' onfocus="(this.type='date')" onblur="(this.type='text')" class="input-element" placeholder="Date To">
                @error('to_date') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-center gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <label class="input-label" for="">Number of Days</label>
                <input type="number" wire:model.blur='days' step="0.1" class="input-element" placeholder="Number of Days">
                @error('days') <span class="error">{{ $message }}</span> @enderror
            </div>
            @can('admin')
                <div class="flex-1 flex-grow">
                    <label class="input-label" for="">Leave Status</label>
                    <x-select-search :data="\App\Enums\LeaveStatus::toArray()" wire:model="leave_status" x-on:blur="$wire.submit()" placeholder="Leave Status"/>
                    @error('leave_status') <span class="error">{{ $message }}</span> @enderror
                </div>
            @endcan
        </div>
        <div class="flex justify-end gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <label class="input-label" for="">Reson to Leave</label>
                <textarea wire:model.blur='reason' class="input-element" rows="4" spellcheck="false"></textarea>
                @error('reason') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        @can('admin')
            <div class="flex justify-end gap-5 mb-5">
                <div class="flex-1 flex-grow">
                    <label class="input-label" for="">Select Employee</label>
                    <x-select-search :data="\App\Models\Employee::getFullNameArray()" wire:model="employee_id" x-on:blur="$wire.submit()" placeholder="Select Employee"/>
                    @error('employee_id') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
        @endcan
        <div class="flex justify-end gap-5">
            <button type="reset" class="btn btn-transparent btn-big">Cancel</button>
            <button type="submit" class="btn btn-purple btn-big">Save</button>
        </div>
    </form>
</div>
