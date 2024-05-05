@section('page-title', 'Edit Employee')
@section('page-subtitle', 'All Employees > Edit ' . $employee->getFullName())
<div class="rounded-container">
    <div class="flex items-end justify-start gap-5 mb-5 border-b border-gray/20">
        <div class="tab cursor-pointer @if($formStep == 1) active @endif" wire:click='getToStep(1)'>@svg('user', 'w-6 h-6') <span>Personal Information</span></div>
        <div class="tab cursor-pointer @if($formStep == 2) active @endif" wire:click='getToStep(2)'>@svg('briefcase', 'w-6 h-6') <span>Professional Information</span></div>
        <div class="tab cursor-pointer @if($formStep == 3) active @endif" wire:click='getToStep(3)'>@svg('lock', 'w-6 h-6') <span>Account Access</span></div>
    </div>
    @if ($formStep == 1)
        @livewire('employees.tabs.personalInformation', ['employee' => $employee], key('personal-information'))
    @endif
    @if ($formStep == 2)
        @livewire('employees.tabs.professionalInformation', ['employee' => $employee], key('professional-information'))
    @endif
    @if ($formStep == 3)
        @livewire('employees.tabs.accountAccess', ['employee' => $employee], key('account-access'))
    @endif
</div>
