<div class="table w-full border-collapse">
    <div class="table-row border-b border-grey/20">
        @if ($display_user)
            <span class="caption table-cell py-2">Employee</span>
        @endif
        <span class="caption table-cell py-2">Date</span>
        <span class="caption table-cell py-2">Annual Salary</span>
        <span class="caption table-cell py-2">Gross Pay</span>
        <span class="caption table-cell py-2">Net Pay</span>
        @can('admin')
            <span class="caption table-cell py-2">Actions</span>
        @endcan
    </div>
    @if (count($payrolls))
        @foreach ($payrolls as $payroll)
            @livewire('payrolls.line-payroll', ['payroll' => $payroll, 'display_user' => $display_user], key('payroll-' . $payroll->id))
        @endforeach 
    @else
        <h6 class="my-5 caption">No payrolls found</h6>
    @endif
</div>
