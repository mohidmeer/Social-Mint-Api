

<nav class="navbar navbar-expand-lg navbar-dark  p-4 " style="font-size: 20px;">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"> {{ config('app.name', 'Laravel') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse container" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto ">
                @guest
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('docs') }}">Docs</a>
                </li>
                @else
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('api') }}">Api</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('docs') }}">Docs</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a></li>
                    </ul>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>








<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> -->
    @csrf
</form>