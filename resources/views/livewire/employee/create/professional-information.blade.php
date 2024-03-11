<div>
    <form wire:submit='save'>
        <div class="flex items-center justify-end gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <input type="text" wire:model.blur='unique_id' class="input-element" placeholder="Employee ID">
                @error('unique_id') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <input type="text" wire:model.blur='designation' class="input-element" placeholder="Enter Designation">
                @error('designation') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex items-center justify-end gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <input type="text" wire:model.blur='joining_date' onfocus="(this.type='date')" onblur="(this.type='text')" class="input-element" placeholder="Joining Date">
                @error('joining_date') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <select wire:model.blur='working_day' class="input-element">
                    <option value="">Working Days</option>
                    @foreach (\App\Enums\WorkingDay::cases() as $day)
                        <option value="{{ $day->value }}">{{ $day->name }}</option>
                    @endforeach
                </select>
                @error('working_day') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex items-center justify-end gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <select wire:model.blur='employee_type_id' class="input-element">
                    <option value="">Employee Type</option>
                    @foreach (\App\Models\EmployeeType::all() as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                @error('employee_type_id') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <select wire:model.blur='department_id' class="input-element">
                    <option value="">Department</option>
                    @foreach (\App\Models\Department::all() as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
                @error('department_id') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex items-center justify-end gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <select wire:model.blur='location_id' class="input-element">
                    <option value="">Location</option>
                    @foreach (\App\Models\Location::all() as $location)
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                    @endforeach
                </select>
                @error('location_id') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex items-center justify-end gap-5">
            <button type="reset" class="btn btn-transparent btn-big">Cancel</button>
            <button type="submit" class="btn btn-purple btn-big">Save</button>
        </div>
    </form>
</div>
