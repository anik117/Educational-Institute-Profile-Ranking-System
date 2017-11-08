<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'SRS') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <ul class="nav navbar-nav">
              <li><a href="/">Home</a></li>
              <li><a href="/area">Area</a></li>
              <li><a href="/school">School</a></li>
              {{-- <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Schools <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">View All</a></li>
                  <li><a href="#">Reports</a></li>
                  <li><a href="#">Progress</a></li>
                </ul>
              </li> --}}
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    {{-- <li>
                        @hasanyrole('deo|ah|hm|sa')
                            <a href="">Notification <span class="badge">2</span></a>
                        @endhasanyrole
                    </li> --}}
                    <li class="dropdown">
                        @hasanyrole('deo|ah|hm|sa')
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Notification <span class="badge">2</span></a>
                        @endhasanyrole
                      <ul class="dropdown-menu">
                        <li><a href="#">New user added in the system</a></li>
                        <li><a href="#">A user removed from the system</a></li>
                      </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="">Profile</a>
                            </li>
                            <li>
                                @role('deo')
                                    <a href="/admin">Admin Dashboard</a>
                                @endrole
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>