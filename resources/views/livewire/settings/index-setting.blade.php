@section('page-title', 'Settings')
@section('page-subtitle', 'All System Settings')
<div class="rounded-container">
    @livewire('settings.company-setting')

    <div class="rounded-container">
        @livewire('settings.employee-type-setting')
        @livewire('settings.department-setting')
        @livewire('settings.location-setting')
    </div>
</div>
