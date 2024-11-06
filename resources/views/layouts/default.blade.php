<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('page-title') | {{ config('app.name') }}</title>

        @if(app(App\Settings\GeneralSettings::class)->favicon)
            <link rel="icon" href="{{ app(App\Settings\GeneralSettings::class)->favicon }}" type="image/x-icon">
        @endif

        @vite(['resources/scss/app.scss', 'resources/js/app.js'])

    </head>
    <body>
        <main class="external-container flex items-start gap-8">
            @include('partials.side-menu')
            <div class="grow">
                @include('partials.top-bar')
                @yield('content', $slot ?? '')
            </div>
        </main>
    </body>
</html>
