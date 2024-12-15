<form wire:submit='save'>
    <div class="setting-container">
        <p class="mb-5">Update the system settings</p>    
        <div class="flex flex-wrap items-center justify-between pb-5">
            <div>
                <h6 class="mb-0">Favicon</h6>
                <div class="small-caption">Insert your favicon</div>
                @error('favicon') <span class="error">{{ $message }}</span> @enderror
            </div>
            <x-filepond::upload wire:model="favicon" />
        </div>
    </div>
    <div class="setting-container">
        <div class="flex flex-wrap items-center justify-between pb-5">
            <div>
                <h6 class="mb-0">Currency</h6>
                <div class="small-caption">Insert your currency</div>
                @error('currency') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div wire:ignore class=" basis-52 shrink-0 grow-0">
                <x-select-search :data="\App\Enums\Currency::toArray()" wire:model="currency" x-on:blur="$wire.submit()" placeholder="Select Currency"/>
            </div>
        </div>
    </div>
    <div class="setting-container">
        <div class="flex flex-wrap items-center justify-between gap-5 pb-5">
            <div>
                <h6 class="mb-0">Date Format</h6>
                <div class="small-caption">Insert date format</div>
                @error('currency') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class=" flex flex-wrap gap-5">
                @foreach ($date_formats as $key => $date)
                    <div>
                        <label for="date-format-{{$key}}">
                            <input type="radio" wire:model='date_format' name="" value="{{ $key }}" id="date-format-{{$key}}">
                            {{ $date }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="flex justify-end gap-5">
        <button type="reset" class="btn btn-transparent btn-big">Cancel</button>
        <button type="submit" class="btn btn-purple btn-big">Save</button>
    </div>
</form>
