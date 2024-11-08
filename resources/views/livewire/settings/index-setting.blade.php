@section('page-title', 'Settings')
@section('page-subtitle', 'All System Settings')
<div class="rounded-container">
    @livewire('settings.company-setting')
    @livewire('settings.employee-type-setting')
</div>
