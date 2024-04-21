<div class="flex items-center gap-3">
    <span class="caption">Showing</span>
    <select class="input-element" wire:model.live="perPage">
        @foreach($perPageOptions as $option)
            <option value="{{ $option }}">{{ $option }}</option>
        @endforeach
    </select>
</div>
