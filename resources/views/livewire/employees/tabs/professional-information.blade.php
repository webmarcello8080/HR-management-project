<div>
    <form wire:submit='save'>
        <div class="flex justify-end gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <label class="input-label" for="">Employee ID</label>
                <input type="text" wire:model.blur='unique_id' class="input-element" placeholder="Employee ID">
                @error('unique_id') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <label class="input-label" for="">Enter Designation</label>
                <input type="text" wire:model.blur='designation' class="input-element" placeholder="Enter Designation">
                @error('designation') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-end gap-5 mb-5">
            <div class="flex-1 flex-grow" wire:ignore>
                <label class="input-label" for="">Joining Date</label>
                <input type="text" wire:model.blur='joining_date' onfocus="(this.type='date')" onblur="(this.type='text')" class="input-element" placeholder="Joining Date">
                @error('joining_date') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow" wire:ignore>
                <label class="input-label" for="">Annula Salary ({{ $setting_currency }})</label>
                <input type="number" step="0.01" wire:model.blur='annual_salary' class="input-element" placeholder="Annual Salary">
                @error('annual_salary') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-end gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <label class="input-label" for="">Days of Holiday</label>
                <input type="number" wire:model.blur='days_of_holiday' step="0.1" class="input-element" placeholder="Days of Holiday">
                @error('days_of_holiday') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <label class="input-label" for="">Working Days</label>
                <x-select-search :data="\App\Enums\WorkingDay::toArray()" wire:model="working_day" x-on:blur="$wire.submit()" placeholder="Working Days"/>
                @error('working_day') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-end gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <label class="input-label" for="">Employee Type</label>
                <x-select-search :data="\App\Models\EmployeeType::convertToArray('name')" wire:model="employee_type_id" x-on:blur="$wire.submit()" placeholder="Employee Type"/>
                @error('employee_type_id') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <label class="input-label" for="">Department</label>
                <x-select-search :data="\App\Models\Department::convertToArray('name')" wire:model="department_id" x-on:blur="$wire.submit()" placeholder="Department"/>
                @error('department_id') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-end gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <label class="input-label" for="">Location</label>
                <x-select-search :data="\App\Models\Location::convertToArray('name')" wire:model="location_id" x-on:blur="$wire.submit()" placeholder="Location"/>
                @error('location_id') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-end gap-5">
            <button type="reset" class="btn btn-transparent btn-big">Cancel</button>
            <button type="submit" class="btn btn-purple btn-big">Save</button>
        </div>
    </form>
</div>
