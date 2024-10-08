<div>
    <form wire:submit='save'>
        <div class="flex justify-end gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <label class="input-label" for="">Internal Email</label>
                <input type="text" wire:model.blur='email' class="input-element" placeholder="Internal Email">
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <label class="input-label" for="">Slack ID</label>
                <input type="text" wire:model.blur='slack_id' class="input-element" placeholder="Enter Slack ID">
                @error('slack_id') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-end gap-5 mb-5">
            <div class="flex-1 flex-grow">
                <label class="input-label" for="">Skype ID</label>
                <input type="text" wire:model.blur='skype_id' class="input-element" placeholder="Enter Skype ID">
                @error('skype_id') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex-grow">
                <label class="input-label" for="">Github ID</label>
                <input type="text" wire:model.blur='github_id' class="input-element" placeholder="Enter Github ID">
                @error('github_id') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-start gap-5 mb-5">
            <h6 class="mb-0">Select Roles:</h6>
            @foreach (\App\Models\Role::convertToArray('name') as $key => $role)
                <label class="inline-flex items-center">
                    <input wire:model.blur='roles.{{ $key}}' value="{{ $key}}" type="checkbox" class="input-checkbox" name="roles[]">
                    <span class="ml-2">{{ $role }}</span>
                </label>
            @endforeach
            @error('roles') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="flex justify-end gap-5">
            <button type="reset" class="btn btn-transparent btn-big">Cancel</button>
            <button type="submit" class="btn btn-purple btn-big">Save</button>
        </div>
    </form>
</div>
