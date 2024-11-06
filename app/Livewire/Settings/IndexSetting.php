<?php

namespace App\Livewire\Settings;

use App\Http\Requests\GeneralSettingsRequest;
use App\Models\SettingMedia;
use App\Settings\GeneralSettings;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class IndexSetting extends Component
{
    use WithFileUploads;

    #[Validate]
    public $company_name;
    #[Validate]
    public $company_address;
    #[Validate]
    public $company_phone;
    #[Validate]
    public $company_email;
    #[Validate]
    public $favicon;

    public function rules(){
        return (new GeneralSettingsRequest())->rules();
    }

    public function mount(): void
    {
        $settings = resolve(GeneralSettings::class);
        $this->company_name = $settings->company_name;
        $this->company_address = $settings->company_address;
        $this->company_phone = $settings->company_phone;
        $this->company_email = $settings->company_email;
        $this->favicon = $settings->favicon;
    }

    public function removeFavicon(): void
    {
        $siteSettings = SettingMedia::firstOrCreate([]);
        $siteSettings->clearMediaCollection('favicon');
        $this->favicon = null;
    }

    public function save(): void
    {
        $validated = $this->validate();

        $settings = new GeneralSettings();
        $settings->fill($validated);

        if ($validated['favicon']) {
            $siteSettings = SettingMedia::firstOrCreate([]);
            $media = $siteSettings->addMedia($validated['favicon']->path())->toMediaCollection('favicon');
            $settings->favicon = $media->getUrl();
        }

        $settings->save();

        session()->flash('status', 'Settings updated.');

        $this->redirectRoute('setting.index');
    }

    public function render(): View
    {
        return view('livewire.settings.index-setting');
    }
}
