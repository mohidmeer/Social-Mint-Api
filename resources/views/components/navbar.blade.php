<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm p-4 " style="font-size:25px ;">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto  ">
            <!-- Authentication Links -->
            @guest
           
            <li class="nav-item ms-2">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            <li class="nav-item ms-2">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            <li class="nav-item ms-2">  
            <a class="nav-link"  href="{{ route('docs') }}">Docs</a>
            </li>
            @else
            <li class="nav-item ms-2">
            <a class="nav-link"  href="{{ route('home') }}">Dashboard</a>
            </li>
            <li class="nav-item ms-2">
            <a class="nav-link"  href="{{ route('api') }}">Api</a>
            </li>
        
            <li class="nav-item ms-2 dropdown">
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

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
    </form>