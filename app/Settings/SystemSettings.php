<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SystemSettings extends Settings
{
    /**
     * @var string The currency of the site
     */
    public string $currency = '1';

    /**
     * @var string The currency of the site
     */
    public string $date_format = '';

    /**
     * @var string The favicon of the site
     */
    public ?string $favicon = null;

    public static function group(): string
    {
        return 'system';
    }

}