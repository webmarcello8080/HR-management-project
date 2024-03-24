<div class="rounded-container">
    <div class="flex items-end justify-start gap-5 mb-5 border-b border-gray/20">
        <div class="tab @if($formStep == 1) active @endif">@svg('user', 'w-6 h-6') <span>Personal Information</span></div>
        <div class="tab @if($formStep == 2) active @endif">@svg('briefcase', 'w-6 h-6') <span>Professional Information</span></div>
        <div class="tab @if($formStep == 3) active @endif">@svg('lock', 'w-6 h-6') <span>Account Access</span></div>
    </div>
    @if ($formStep == 1)
        @livewire('employees.tabs.personalInformation')
    @endif
    @if ($formStep == 2)
        @livewire('employees.tabs.professionalInformation', ['employee' => $employee])
    @endif
    @if ($formStep == 3)
        @livewire('employees.tabs.accountAccess', ['employee' => $employee])
    @endif
</div>
