@section('page-title', 'All Vacancies')
<div class="rounded-container">
    <div class="flex items-center justify-between gap-5 mb-5">
        <form action="">
        </form>
        <div class="flex items-center justify-center gap-5">
            <a class="btn btn-purple btn-big" href="{{ route('vacancy.create') }}">Add New Vacancy</a>
        </div>
    </div>
    <div class="flex gap-5">
        <div class="rounded-container basis-1/3">
            <div class="flex items-center gap-2">
                <div class="w-3 h-3 bg-yellow rounded-full"></div>
                <h6 class="mb-0">Active Vacancies</h6>
            </div>
            @foreach ($activeVacancies as $vacancy)
                @include('partials\vacancies\vacancy-card')
            @endforeach
        </div>
        <div class="rounded-container basis-1/3">
            <div class="flex items-center gap-2">
                <div class="w-3 h-3 bg-red rounded-full"></div>
                <h6 class="mb-0">Inactive Vacancies</h6>
            </div>
        </div>
        <div class="rounded-container basis-1/3">
            <div class="flex items-center gap-2">
                <div class="w-3 h-3 bg-green rounded-full"></div>
                <h6 class="mb-0">Completed Vacancies</h6>
            </div>        
        </div>
    </div>
</div>