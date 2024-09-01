<div>
    <form wire:submit='save'>
        <div class="flex justify-end gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <input type="text" wire:model.lazy='unique_id' class="input-element" placeholder="Employee ID">
                @error('unique_id') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <input type="text" wire:model.lazy='designation' class="input-element" placeholder="Enter Designation">
                @error('designation') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-end gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <input type="text" wire:model.lazy='joining_date' onfocus="(this.type='date')" onblur="(this.type='text')" class="input-element" placeholder="Joining Date">
                @error('joining_date') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <input type="number" wire:model.lazy='days_of_holiday' step="0.1" class="input-element" placeholder="Days of Holiday">
                @error('days_of_holiday') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-end gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <x-select-search :data="\App\Enums\WorkingDay::toArray()" wire:model="working_day" x-on:blur="$wire.submit()" placeholder="Working Days"/>
                @error('working_day') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <x-select-search :data="\App\Models\EmployeeType::getArrayName()" wire:model="employee_type_id" x-on:blur="$wire.submit()" placeholder="Employee Type"/>
                @error('employee_type_id') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-end gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <x-select-search :data="\App\Models\Department::getArrayName()" wire:model="department_id" x-on:blur="$wire.submit()" placeholder="Department"/>
                @error('department_id') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <x-select-search :data="\App\Models\Location::getArrayName()" wire:model="location_id" x-on:blur="$wire.submit()" placeholder="Location"/>
                @error('location_id') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-end gap-5">
            <button type="reset" class="btn btn-transparent btn-big">Cancel</button>
            <button type="submit" class="btn btn-purple btn-big">Save</button>
        </div>
    </form>
</div>
