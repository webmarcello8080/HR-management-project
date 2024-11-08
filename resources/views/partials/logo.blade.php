@if ($setting_logo)
    <div class="mb-8"><img src="{{ $setting_logo }}" alt=""></div>
@elseif($setting_company_name)
    <h2 class="mb-8 text-center"><a class="no-underline" href="{{ route('home') }}">{{ $setting_company_name }}</a></h2>
@else
    <h2 class="mb-8 text-center"><a class="no-underline" href="{{ route('home') }}">{{ env('APP_NAME'), 'LogoHere' }}</a></h2>
@endif
