<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('partials.head')
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
