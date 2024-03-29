<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('page-title') | {{ config('app.name') }}</title>

        @vite(['resources/scss/app.scss', 'resources/js/app.js'])

    </head>
    <body>
        <main class="external-container flex gap-8">
            @include('partials\side-menu')
            <div class="grow">
                @yield('content', $slot ?? '')
            </div>
        </main>
    </body>
</html>
