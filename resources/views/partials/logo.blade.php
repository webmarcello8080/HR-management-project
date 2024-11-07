@if (app(App\Settings\GeneralSettings::class)->logo)
    <div class="mb-8"><img src="{{ app(App\Settings\GeneralSettings::class)->logo }}" alt=""></div>
@elseif(app(App\Settings\GeneralSettings::class)->company_name)
    <h2 class="mb-8 text-center"><a class="no-underline" href="{{ route('home') }}">{{ app(App\Settings\GeneralSettings::class)->company_name }}</a></h2>
@else
    <h2 class="mb-8 text-center"><a class="no-underline" href="{{ route('home') }}">{{ env('APP_NAME'), 'LogoHere' }}</a></h2>
@endif
