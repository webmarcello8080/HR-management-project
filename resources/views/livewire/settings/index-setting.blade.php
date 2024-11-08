@section('page-title', 'Settings')
@section('page-subtitle', 'All System Settings')
<div class="rounded-container">
    <div class="flex items-end justify-start gap-5 mb-5 border-b border-grey/20">
        <div class="tab cursor-pointer @if($activeStep == 1) active @endif" wire:click='getToStep(1)'>@svg('company', 'w-6 h-6') <span>Company Information</span></div>
        <div class="tab cursor-pointer @if($activeStep == 2) active @endif" wire:click='getToStep(2)'>@svg('system', 'w-6 h-6') <span>System Information</span></div>
        <div class="tab cursor-pointer @if($activeStep == 3) active @endif" wire:click='getToStep(3)'>@svg('variables', 'w-6 h-6') <span>Variables</span></div>
    </div>
    @if ($activeStep == 1)
        @livewire('settings.company-setting')
    @endif
    @if ($activeStep == 2)
        <h3>something here</h3>
    @endif
    @if ($activeStep == 3)
        @livewire('settings.employee-type-setting')
        @livewire('settings.department-setting')
        @livewire('settings.location-setting')
    @endif    
</div>
