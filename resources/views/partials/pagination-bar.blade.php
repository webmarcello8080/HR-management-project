<div class="mt-4 flex items-center justify-between gap-4">
    @livewire('partials.per-page')
    <div class="caption">Page {{ $collection->currentPage() }} of {{ $collection->lastPage() }} out of {{ $collection->total() }} records found</div>
    <div>{{ $collection->links('partials.pagination') }}</div>
</div>