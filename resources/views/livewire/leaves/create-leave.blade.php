@section('page-title', 'Create/Edit Leave')
@section('page-subtitle', 'All Leaves > Create/Edit Leave')
<div class="rounded-container">
    <form wire:submit='save'>
        <div class="flex justify-center gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <input type="text" wire:model.blur='from_date' onfocus="(this.type='date')" onblur="(this.type='text')" class="input-element" placeholder="Date From">
                @error('from_date') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <input type="text" wire:model.blur='to_date' onfocus="(this.type='date')" onblur="(this.type='text')" class="input-element" placeholder="Date To">
                @error('to_date') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-center gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <input type="number" wire:model.blur='days' step="0.1" class="input-element" placeholder="Number of Days">
                @error('days') <span class="error">{{ $message }}</span> @enderror
            </div>
            @can('admin')
                <div class="flex-1 flex-grow">
                    <select wire:model.blur='leave_status' class="input-element">
                        <option value="">Leave Status</option>
                        @foreach (\App\Enums\LeaveStatus::cases() as $status)
                            <option value="{{ $status->value }}">{{ $status->name }}</option>
                        @endforeach
                    </select>
                    @error('leave_status') <span class="error">{{ $message }}</span> @enderror
                </div>
            @endcan
        </div>
        <div class="flex justify-end gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <textarea wire:model.blur='reason' class="input-element" rows="4" spellcheck="false"></textarea>
                @error('reason') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        @can('admin')
            <div class="flex justify-end gap-5 mb-5">
                <div class="flex-1 flex-grow">
                    <select wire:model.blur='employee_id' class="input-element">
                        <option value="">Select Employee</option>
                        @foreach (\App\Models\Employee::orderBy('first_name')->get() as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->getFullName() }}</option>
                        @endforeach
                    </select>
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
