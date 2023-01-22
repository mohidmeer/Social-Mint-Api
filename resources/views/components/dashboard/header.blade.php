<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('dashboard/images/logo.png')}}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="" alt="Logo"></a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
    
        <div class="header-menu">
                <a type="button" href="{{route('pricing')}}" class=" mt-2"><i class="fa fa-star"></i>&nbsp; Upgrade Plan</a>
            <div class="user-area dropdown float-right ">
                <a href="#" class="dropdown-toggle active " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <p>{{ Auth::user()->name }}</p>
                </a>
               

                <div class="user-menu dropdown-menu">

                    <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>Logout</a>
                 
                 @if (auth()->user()->subscribed('Starter') || auth()->user()->subscribed('Enterprise') )
                 <a class="nav-link" href="{{route('portal')}}"><i class="fa fa-dollar"></i>Billing Portal</a>
                 @endif
                </div>
            </div>

        </div>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
    </form>
</header>