<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('page-title') | {{ config('app.name') }}</title>

    @if ($setting_favicon)
        <link rel="icon" href="{{ $setting_favicon }}">
    @endif

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    @filepondScripts
</head>