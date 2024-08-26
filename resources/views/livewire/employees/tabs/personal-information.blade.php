<div>
    <form wire:submit='save'>
        <div class="flex items-center justify-center gap-5 mb-5">
            @if ($existing_media && !$profile_image)
                <div class="w-16 h-16">
                    <img class="w-full h-full object-cover" src="{{ $existing_media }}">
                </div>
            @endif
            @if ($profile_image && !$errors->get('profile_image'))
                <div class="w-16 h-16">
                    <img class="w-full h-full object-cover" src="{{ $profile_image->temporaryUrl() }}">
                </div>
            @endif
            <div class="flex-1 flex-grow">
                <input type="file" wire:model.blur='profile_image' >
                @error('profile_image') <span class="error">{{ $message }}</span> @enderror
            </div>
            {{-- if media exists you can delete it from server and DB --}}
            @if ($existing_media)
                <div>
                    <a class="btn btn-small btn-grey" wire:click='removeMedia'>Remove Image</a>
                </div>
            @endif
        </div>
        <div class="flex justify-center gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <input type="text" wire:model.blur='first_name' class="input-element" placeholder="First Name">
                @error('first_name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <input type="text" wire:model.blur='last_name' class="input-element" placeholder="Last Name">
                @error('last_name') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-center gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <input type="text" wire:model.blur='mobile_number' class="input-element" placeholder="Mobile Number">
                @error('mobile_number') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <input type="email" wire:model.blur='email' class="input-element" placeholder="Email Address">
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-center gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <input type="text" wire:model.blur='dob' onfocus="(this.type='date')" onblur="(this.type='text')" class="input-element" placeholder="DOB">
                @error('dob') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <select wire:model.blur='marital_status' class="input-element">
                    <option value="">Marital Status</option>
                    @foreach (\App\Enums\MaritalStatus::cases() as $status)
                        <option value="{{ $status->value }}">{{ $status->name }}</option>
                    @endforeach
                </select>
                @error('marital_status') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-center gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <select wire:model.blur='gender' class="input-element">
                    <option value="">Select Gender</option>
                    @foreach (\App\Enums\Gender::cases() as $gender)
                        <option value="{{ $gender->value }}">{{ $gender->name }}</option>
                    @endforeach
                </select>
                @error('gender') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <input type="text" wire:model.blur='nationality' class="input-element" placeholder="Nationality">
                @error('nationality') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-center gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <input type="text" wire:model.blur='address' class="input-element" placeholder="Address">
                @error('address') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-center gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <input type="text" wire:model.blur='city' class="input-element" placeholder="City">
                @error('city') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <input type="text" wire:model.blur='country' class="input-element" placeholder="Country">
                @error('country') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <input type="text" wire:model.blur='post_code' class="input-element" placeholder="Post Code">
                @error('post_code') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-end gap-5">
            <button type="reset" class="btn btn-transparent btn-big">Cancel</button>
            <button type="submit" class="btn btn-purple btn-big">Save</button>
        </div>
    </form>
</div>
