<?php

namespace App\Providers;

use App\View\Composers\SettingsComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // pass settings information to all the pages
        View::composer(['*'], SettingsComposer::class);
    }
}
