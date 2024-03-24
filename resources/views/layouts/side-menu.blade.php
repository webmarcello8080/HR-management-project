<div class="gray-container basis-72 grow-0 shrink-0">
    <h2>LogoHere</h2>
    <nav>
        nav here
    </nav>
    
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>