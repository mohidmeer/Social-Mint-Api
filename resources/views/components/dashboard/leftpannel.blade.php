@php
$styleexp= (request()->is('home/facebook' ))
|| (request()->is('home/instagram' ))
|| (request()->is('home/twitter' ))
|| (request()->is('home/reddit' ))
|| (request()->is('home/telegram' ))
|| (request()->is('home/discord' ))
|| (request()->is('home/pintrest' ))
? 'active show' : '';

$style= (request()->is('home/facebook' ))
|| (request()->is('home/instagram' ))
|| (request()->is('home/reddit' ))
|| (request()->is('home/telegram' ))
|| (request()->is('home/discord' ))
|| (request()->is('home/pintrest' ))
|| (request()->is('home/twitter' ))? 'true' : 'false';

@endphp


<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="menu-title">Home</li><!-- /.menu-title -->

                <li class="{{ Route::is('home') ? 'active' : 'null'}}">
                    <a href="{{route('home')}}"><i class="menu-icon fa fa-laptop"></i>Dashboard</a>
                </li>
                <li class="menu-title">Social Media</li><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown {{ $styleexp  }} ">
                    <a href="#" class="dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="{{ $style }}"> <i class="menu-icon fa fa-cogs"></i>Accounts</a>
                    <ul class="sub-menu children dropdown-menu {{ $styleexp }}">
                        <li id="{{Route::is('facebook') ? 'textact' : 'null'}}"><i class=" fa fa-facebook"></i><a href="{{route('facebook')}}">Facebook</a></li>
                        <li id="{{Route::is('instagram') ? 'textact' : 'null'}}"><i class="fa fa-instagram"></i><a href="{{route('instagram')}}">Instagram </a></li>
                        <li id="{{Route::is('twitter') ? 'textact' : 'null'}}"><i class="fa fa-twitter"></i><a href="{{route('twitter')}}">Twitter</a></li>
                        <li id="{{Route::is('reddit') ? 'textact' : 'null'}}"><i class="fa fa-reddit"></i><a href="{{route('reddit')}}">Reddit</a></li>
                        <li id="{{Route::is('telegram') ? 'textact' : 'null'}}"><i class="fa fa-telegram"></i><a href="{{route('telegram')}}">Telegram</a></li>
                        <li id="{{Route::is('discord') ? 'textact' : 'null'}} ">
                            <i class="fa {{Route::is('discord') ? 'text-primary' : 'null'}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-discord" viewBox="0 0 16 16">
                                    <path d="M13.545 2.907a13.227 13.227 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.19 12.19 0 0 0-3.658 0 8.258 8.258 0 0 0-.412-.833.051.051 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.041.041 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032c.001.014.01.028.021.037a13.276 13.276 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019c.308-.42.582-.863.818-1.329a.05.05 0 0 0-.01-.059.051.051 0 0 0-.018-.011 8.875 8.875 0 0 1-1.248-.595.05.05 0 0 1-.02-.066.051.051 0 0 1 .015-.019c.084-.063.168-.129.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.052.052 0 0 1 .053.007c.08.066.164.132.248.195a.051.051 0 0 1-.004.085 8.254 8.254 0 0 1-1.249.594.05.05 0 0 0-.03.03.052.052 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.235 13.235 0 0 0 4.001-2.02.049.049 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.034.034 0 0 0-.02-.019Zm-8.198 7.307c-.789 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612Zm5.316 0c-.788 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612Z" />
                                </svg>
                            </i>
                            <a class="{{Route::is('discord') ? 'text-primary' : 'null'}}" href="{{route('discord')}}">Discord</a>
                        </li>
                        <li id="{{Route::is('pintrest') ? 'textact' : 'null'}} ">
                        <i class="fa {{Route::is('pintrest') ? 'text-primary' : 'null'}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pinterest" viewBox="0 0 16 16">
                                <path d="M8 0a8 8 0 0 0-2.915 15.452c-.07-.633-.134-1.606.027-2.297.146-.625.938-3.977.938-3.977s-.239-.479-.239-1.187c0-1.113.645-1.943 1.448-1.943.682 0 1.012.512 1.012 1.127 0 .686-.437 1.712-.663 2.663-.188.796.4 1.446 1.185 1.446 1.422 0 2.515-1.5 2.515-3.664 0-1.915-1.377-3.254-3.342-3.254-2.276 0-3.612 1.707-3.612 3.471 0 .688.265 1.425.595 1.826a.24.24 0 0 1 .056.23c-.061.252-.196.796-.222.907-.035.146-.116.177-.268.107-1-.465-1.624-1.926-1.624-3.1 0-2.523 1.834-4.84 5.286-4.84 2.775 0 4.932 1.977 4.932 4.62 0 2.757-1.739 4.976-4.151 4.976-.811 0-1.573-.421-1.834-.919l-.498 1.902c-.181.695-.669 1.566-.995 2.097A8 8 0 1 0 8 0z" />
                            </svg>
                        </i>
                        <a class="{{Route::is('pintrest') ? 'text-primary' : 'null'}}" href="{{route('pintrest')}}">Pintrest</a>
                        </li>

            </ul>
            </li>


            <li class="menu-title">Api</li><!-- /.menu-title -->

            <li class="{{  Route::is('api') ? 'active' : 'null' }}">
                <a href="{{route('api')}}"> <i class="menu-icon fa fa-key"></i>Api Key</a>

            </li>
            <li>
                <!-- <a href="{{route('post')}}"> <i class="menu-icon ti-share"></i>Post</a> -->
            </li>
            <li class="menu-title">Manage Users Users</li><!-- /.menu-title -->
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Accounts</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-puzzle-piece "></i><a href="">Add New</a></li>
                    <li><i class="fa fa-id-badge"></i><a href="">Edit</a></li>

                </ul>
            </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>