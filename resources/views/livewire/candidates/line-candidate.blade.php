<div class="table-row border-b border-b-gray/20 ">
    <span class="table-cell py-3 pl-3">{{ $candidate->full_name }}</span>
    <span class="table-cell py-3">{{ $candidate?->vacancy?->title }}</span>
    <span class="table-cell py-3">{{ $candidate->created_at->format('F d, Y') }}</span>
    <span class="table-cell py-3">{{ $candidate->email }}</span>
    <span class="table-cell py-3">{{ $candidate->phone }}</span>
    <span class="table-cell py-3">
        <div class="budge budge-{{ $statusColours[$candidate->candidate_status->value - 1] }}">{{ $candidate->candidate_status->name }}</div>
    </span>
    <span class="table-cell align-middle py-3">
        <div class="flex items-center gap-2">
            <a href="{{ route('candidate.edit', $candidate) }}">@svg('edit', 'w-6 h-6')</a>
            <a class="cursor-pointer" wire:click='delete' wire:confirm='Are you sure you want to delete this candidate?'>@svg('trash', 'w-6 h-6')</a>
        </div>
    </span>
</div>