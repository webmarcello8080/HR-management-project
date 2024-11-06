@section('page-title', 'Settings')
@section('page-subtitle', 'All System Settings')
<div class="rounded-container">
    <form wire:submit='save'>
        <div class="setting-container">
            <div class="mb-5">
                <h6 class="mb-0">Company Information</h6>
                <div class="small-caption">Insert your company information</div>    
            </div>
            {{-- {{var_dump($settings)}} --}}
            <div class="flex justify-center gap-5 mb-5">
                <div class="flex-1 flex-grow">
                    <label class="input-label" for="">Company Name</label>
                    <input type="text" wire:model.blur='company_name' class="input-element" placeholder="Company Name">
                    @error('company_name') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="flex-1 flex-grow">
                    <label class="input-label" for="">Company Address</label>
                    <input type="text" wire:model.blur='company_address' class="input-element" placeholder="Company Address">
                    @error('company_address') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex justify-center gap-5 mb-5">
                <div class="flex-1 flex-grow">
                    <label class="input-label" for="">Company Phone</label>
                    <input type="text" wire:model.blur='company_phone' class="input-element" placeholder="Company Phone">
                    @error('company_phone') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="flex-1 flex-grow">
                    <label class="input-label" for="">Company Email</label>
                    <input type="text" wire:model.blur='company_email' class="input-element" placeholder="Company Email">
                    @error('company_email') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="setting-container">
            <div class="flex flex-wrap items-center justify-between pb-5">
                <div>
                    <h6 class="mb-0">Favicon</h6>
                    <div class="small-caption">Insert a small icon for the favicon</div>    
                </div>
                <div class="flex gap-4 items-center">
                    @if ($favicon && !$errors->get('favicon'))
                        <div class="w-16 h-16">
                            <img class="w-full h-full object-cover" src="{{ $favicon }}">
                        </div>
                    @endif
                    <div class="flex flex-col">
                        <input type="file" wire:model.blur='favicon' >
                        @error('favicon') <span class="error">{{ $message }}</span> @enderror    
                    </div>
                    @if ($favicon)
                        <div>
                            <a class="btn btn-small btn-grey" wire:confirm="Are you sure you want to permanently remove this image?" wire:click='removeFavicon'>Remove Image</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="flex justify-end gap-5">
            <button type="reset" class="btn btn-transparent btn-big">Cancel</button>
            <button type="submit" class="btn btn-purple btn-big">Save</button>
        </div>
    </form>
</div>