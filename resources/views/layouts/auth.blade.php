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
        <main class="external-container h-[95vh] flex gap-8">
            <div class="basis-1/2 grow-0 shrink-0 rounded-2xl overflow-hidden">
				<img class="w-full h-full object-cover" src="{{ asset('/images/homepage.jpg') }}" alt="">
			</div>
            <div class="grow">
                @yield('content')
            </div>
        </main>
    </body>
</html>
