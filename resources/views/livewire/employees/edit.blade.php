<div class="rounded-container">
    <div class="flex items-end justify-start gap-5 mb-5 border-b border-gray/20">
        <div class="tab cursor-pointer @if($formStep == 1) active @endif" wire:click='getToStep(1)'>Personal Information</div>
        <div class="tab cursor-pointer @if($formStep == 2) active @endif" wire:click='getToStep(2)'>Professional Information</div>
        <div class="tab cursor-pointer @if($formStep == 3) active @endif" wire:click='getToStep(3)'>Account Access</div>
    </div>
    @if ($formStep == 1)
        @livewire('employees.edit.personalInformation', ['employee_id' => $employee_id])
    @endif
    @if ($formStep == 2)
        @livewire('employees.edit.professionalInformation', ['employee_id' => $employee_id])
    @endif
    @if ($formStep == 3)
        @livewire('employees.edit.accountAccess', ['employee_id' => $employee_id])
    @endif
</div>
