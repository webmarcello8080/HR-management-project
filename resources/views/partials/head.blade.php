<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('page-title') | {{ config('app.name') }}</title>

    @if (app(App\Settings\SystemSettings::class)->favicon)
        <link rel="icon" href="{{ app(App\Settings\SystemSettings::class)->favicon }}">
    @endif

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    @filepondScripts
</head>