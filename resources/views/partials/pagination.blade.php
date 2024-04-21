<div class="mt-4 flex items-center justify-between gap-4">
    <div></div>
    <div class="caption">Showing {{ $collection->currentPage() }} of {{ $collection->lastPage() }} out of {{ $collection->total() }} records</div>
    <div>{{ $collection->links() }}</div>
</div>