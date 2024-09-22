@section('page-title', 'All Payrolls')
@section('page-subtitle', 'See All Payrolls')
<div class="rounded-container">
    <div class="flex items-center justify-between gap-5 mb-5">
        <div class="flex items-center gap-5" wire:ignore>
            <input wire:model.live.debounce.500ms='search' type="text" class="input-element" placeholder="Search"/>
            <input wire:model.live.debounce.500ms='search_date' type="test" onfocus="(this.type='date')" onblur="(this.type='text')" class="input-element" placeholder="Search Date"/>
        </div>
        <div class="flex items-center justify-center gap-5">
            <a class="btn btn-purple btn-big" href="{{ route('payroll.create') }}">Add New Payroll</a>
        </div>
    </div>
    @include('partials.payrolls.payroll-table', ['payrolls' => $payrolls, 'display_user' => true])
    @include('partials.bottom-table-bar', ['collection' => $payrolls])
</div>