<div class="table-row border-b border-b-grey/20 border-l-4 {{ $holiday->date->isPast() ? 'border-l-grey/20' : 'border-l-purple' }}">
    <span class="table-cell py-3 pl-3">{{ $holiday->date->format('F d, Y') }}</span>
    <span class="table-cell py-3">{{ $holiday->date->format('l') }}</span>
    <span class="table-cell py-3">{{ $holiday->name }}</span>
    <span class="table-cell py-3 cursor-pointer" wire:click='delete' wire:confirm='Are you sure you want to delete this holiday?'>@svg('trash', 'w-6 h-6')</span>
</div>