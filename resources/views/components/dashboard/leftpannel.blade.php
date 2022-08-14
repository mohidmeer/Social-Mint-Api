
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
            <li  class="menu-title">Home</li><!-- /.menu-title -->
            
                <li class="{{ Route::is('home') ? 'active' : 'null'}}">
                    <a href="{{route('home')}}"><i class="menu-icon fa fa-laptop"></i>Dashboard</a>
                </li>
                <li  class="menu-title">Social Media</li><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown {{ (request()->is('home/facebook' )) || (request()->is('home/instagram' )) || (request()->is('home/twitter' ))? 'active show' : '' }} ">
                    <a href="#" class="dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="{{ (request()->is('home/facebook' )) || (request()->is('home/instagram' )) || (request()->is('home/twitter' ))? 'true' : 'false' }}"> <i class="menu-icon fa fa-cogs"></i>Accounts</a>
                    <ul  class="sub-menu children dropdown-menu {{ (request()->is('home/facebook' )) || (request()->is('home/instagram' )) || (request()->is('home/twitter' ))? 'show' : '' }}">
                        <li id="{{Route::is('facebook') ? 'textact' : 'null'}}" ><i class=" fa fa-facebook"></i><a  href="{{route('facebook')}}">Facebook</a></li>
                        <li id="{{Route::is('instagram') ? 'textact' : 'null'}}" ><i class="fa fa-instagram"></i><a href="{{route('instagram')}}">Instagram </a></li>
                        <li id="{{Route::is('twitter') ? 'textact' : 'null'}}" ><i class="fa fa-twitter"></i><a href="{{route('twitter')}}">Twitter</a></li>
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


