<?php

namespace App\Livewire\Settings;

use App\Models\Location;
use Livewire\Attributes\Validate;
use Livewire\Component;

class LocationSetting extends Component
{
    #[Validate('required|string|min:3')]
    public $name = '';

    // create a new Location if name inserted doesn't exist already in database
    public function newLocation():void
    {
        $validated = $this->validate();

        Location::firstOrCreate(['name' => $validated['name']]);

        $this->reset();
    }

    // delete Location if ID exist
    public function removeLocation($typeId):void
    {
        $location = Location::find($typeId);

        if ($location) {
            $location->delete();
        }
    }
    public function render()
    {
        return view('livewire.settings.location-setting', [
            'locations' => Location::all(),
        ]);
    }
}
