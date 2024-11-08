@section('page-title', 'Create/Edit Candidate')
@section('page-subtitle', 'All Candidate > Create/Edit Candidate')
<div class="rounded-container">
    <form wire:submit='save'>
        <div class="flex justify-center gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <label class="input-label" for="payroll_date">Payroll Date</label>
                <input type="text" wire:model.blur='payroll_date' onfocus="(this.type='date')" onblur="(this.type='text')" class="input-element" placeholder="Payroll Date">
                @error('payroll_date') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <label class="input-label" for="">Select Employee</label>
                <x-select-search :data="\App\Models\Employee::getFullNameArray()" wire:model="employee_id" x-on:blur="$wire.updated()" placeholder="Select Employee"/>
                @error('employee_id') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-center gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <label class="input-label" for="">Annual Salary ({{ $setting_currency }})</label>
                <input type="number" step="0.01" wire:model.blur='annual_salary' class="input-element" placeholder="Annual Salary">
                @error('annual_salary') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <label class="input-label" for="">Gross Pay ({{ $setting_currency }})</label>
                <input type="number" step="0.01" wire:model.blur='gross_pay' class="input-element" placeholder="Gross Pay">
                @error('gross_pay') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-center gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <label class="input-label" for="">Deduction Percentage %</label>
                <input type="number" step="0.01" wire:model.blur='deduction_percentage' class="input-element" placeholder="Deduction Percentage">
                @error('deduction_percentage') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <label class="input-label" for="">Deduction ({{ $setting_currency }})</label>
                <input type="number" step="0.01" wire:model.blur='deduction' class="input-element" placeholder="Deduction">
                @error('deduction') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-center gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <label class="input-label" for="">Insurance ({{ $setting_currency }})</label>
                <input type="number" step="0.01" wire:model.blur='insurance' class="input-element" placeholder="Insurance">
                @error('insurance') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <label class="input-label" for="">Net Pay ({{ $setting_currency }})</label>
                <input type="number" step="0.01" wire:model.blur='net_pay' class="input-element" placeholder="Net Pay">
                @error('net_pay') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-end gap-5">
            <button type="reset" class="btn btn-transparent btn-big">Cancel</button>
            <button type="submit" class="btn btn-purple btn-big">Save</button>
        </div>
    </form>
</div>