<div class="rounded-container">
    <div class="flex items-end justify-start gap-5 mb-5 border-b border-gray/20">
        <div class="tab @if($formStep == 1) active @endif">Personal Information</div>
        <div class="tab @if($formStep == 2) active @endif">Professional Information</div>
        <div class="tab @if($formStep == 3) active @endif">Account Access</div>
    </div>
    @if ($formStep == 1)
        @livewire('employees.create.personalInformation')
    @endif
    @if ($formStep == 2)
        @livewire('employees.create.professionalInformation', ['employee_id' => $employeeId])
    @endif
    @if ($formStep == 3)
        @livewire('employees.create.accountAccess', ['employee_id' => $employeeId])
    @endif
</div>
