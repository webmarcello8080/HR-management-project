<div class="pagination-navigation">
    @if ($paginator->hasPages())
        <div class="pagination-wrapper " role="navigation" aria-label="Pagination Navigation">
            <span>
                @if ($paginator->onFirstPage())
                    <span>&#129120;</span>
                @else
                    <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev">&#129120;</button>
                @endif
            </span>
 
            @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="current-link">{{ $page }}</span>
                @else
                    <a class="pagination-link" wire:click="gotoPage({{ $page }})" href="#">{{ $page }}</a>
                @endif
            @endforeach

            <span>
                @if ($paginator->onLastPage())
                    <span>&#129122;</span>
                @else
                    <button wire:click="nextPage" wire:loading.attr="disabled" rel="next">&#129122;</button>
                @endif
            </span>
        </div>
    @endif
</div>