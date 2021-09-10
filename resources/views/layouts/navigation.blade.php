<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-warning fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"><h2>Best Beers Brewdog</h2></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item @if(str_contains(Request::path(), 'beers'))  {{'active'}} @else {{ '' }} @endif">
                    <a class="nav-link text-white" href="{{ url('beers/1') }}">{{ __('Beers') }}</a>
                </li>
                @guest
                    <li class="nav-item {{ Request::path() === 'login' ? 'active': '' }}">
                        <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item {{ Request::path() === 'register' ? 'active': '' }}">
                            <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item {{ Request::path() === 'dashboard' ? 'active': '' }}">
                        <a class="nav-link text-white" href="{{ route('dashboard') }}">{{ Auth::user()->name }}</a>
                    </li>
                    <li class="nav-item {{ Request::path() === 'your-beer' ? 'active': '' }}">
                        <a class="nav-link text-white" href="{{ route('your-beer') }}">Your Beers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }} <img class="play-icon img-fluid p-1" src="{{ asset('img/logout.png') }}" alt="logout icon"></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
