<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class SettingMedia extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'setting_media';

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('favicon')->singleFile();
    }
}
