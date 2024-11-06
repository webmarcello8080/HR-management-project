<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('partials.head')
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
