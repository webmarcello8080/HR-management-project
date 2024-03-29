@section('page-title', 'Create Employee')
<div class="rounded-container">
    <form wire:submit='save'>
        <div class="flex justify-center gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <input type="text" wire:model.blur='title' class="input-element" placeholder="Vacancy Title">
                @error('title') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <input type="text" wire:model.blur='expiring_date' onfocus="(this.type='date')" onblur="(this.type='text')" class="input-element" placeholder="Expiring Date">
                @error('expiring_date') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-center gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <input type="text" wire:model.blur='amount' class="input-element" placeholder="Amount">
                @error('amount') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <input type="text" wire:model.blur='amount_per' class="input-element" placeholder="What the Amount per">
                @error('amount_per') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-center gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <select wire:model.blur='vacancy_status' class="input-element">
                    <option value="">Vacancy Status</option>
                    @foreach (\App\Enums\VacancyStatus::cases() as $status)
                        <option value="{{ $status->value }}">{{ $status->name }}</option>
                    @endforeach
                </select>
                @error('vacancy_status') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <select wire:model.blur='working_day' class="input-element">
                    <option value="">Working Day</option>
                    @foreach (\App\Enums\WorkingDay::cases() as $day)
                        <option value="{{ $day->value }}">{{ $day->name }}</option>
                    @endforeach
                </select>
                @error('working_day') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-center gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <select wire:model.blur='department_id' class="input-element">
                    <option value="">Department</option>
                    @foreach (\App\Models\Department::all() as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
                @error('department_id') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <select wire:model.blur='employee_type_id' class="input-element">
                    <option value="">Employee Type</option>
                    @foreach (\App\Models\EmployeeType::all() as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                @error('employee_type_id') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-end gap-5 mb-5">
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
        <div class="flex justify-end gap-5">
            <button type="reset" class="btn btn-transparent btn-big">Cancel</button>
            <button type="submit" class="btn btn-purple btn-big">Save</button>
        </div>
    </form>
</div>
