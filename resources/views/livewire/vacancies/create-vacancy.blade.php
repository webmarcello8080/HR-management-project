@section('page-title', 'Create/Edit Vancancy')
@section('page-subtitle', 'All Vancancies > Create/Edit Vacancy')
<div class="rounded-container">
    <form wire:submit='save'>
        <div class="flex justify-center gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <label class="input-label" for="">Working Hours (in hours)</label>
                <input type="text" wire:model.blur='title' class="input-element" placeholder="Vacancy Title">
                @error('title') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow" wire:ignore>
                <label class="input-label" for="">Working Hours (in hours)</label>
                <input type="text" wire:model.blur='expiring_date' onfocus="(this.type='date')" onblur="(this.type='text')" class="input-element" placeholder="Expiring Date">
                @error('expiring_date') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-center gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <label class="input-label" for="">Amount Offered ({{ $setting_currency }})</label>
                <input type="text" wire:model.blur='amount' class="input-element" placeholder="Amount">
                @error('amount') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <label class="input-label" for="">What the Amount per</label>
                <input type="text" wire:model.blur='amount_per' class="input-element" placeholder="What the Amount per">
                @error('amount_per') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-center gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <label class="input-label" for="">Vacancy Status</label>
                <x-select-search :data="\App\Enums\VacancyStatus::toArray()" wire:model="vacancy_status" x-on:blur="$wire.submit()" placeholder="Vacancy Status"/>
                @error('vacancy_status') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <label class="input-label" for="">Working Day</label>
                <x-select-search :data="\App\Enums\WorkingDay::toArray()" wire:model="working_day" x-on:blur="$wire.submit()" placeholder="Working Day"/>
                @error('working_day') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-center gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <label class="input-label" for="">Department</label>
                <x-select-search :data="\App\Models\Department::convertToArray('name')" wire:model="department_id" x-on:blur="$wire.submit()" placeholder="Department"/>
                @error('department_id') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <label class="input-label" for="">Employee Type</label>
                <x-select-search :data="\App\Models\EmployeeType::convertToArray('name')" wire:model="employee_type_id" x-on:blur="$wire.submit()" placeholder="Employee Type"/>
                @error('employee_type_id') <span class="error">{{ $message }}</span> @enderror
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
            @if ($vacancy->getKey())
                <a wire:click='delete' wire:confirm='Are you sure you want to delete this vacancy?' class="btn btn-red btn-big">@svg('trash', 'w-6 h-6')</a>
            @endif
        </div>
    </form>
</div>
