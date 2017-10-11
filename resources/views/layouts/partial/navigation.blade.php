<nav class="navbar navbar-default navbar-static-top">
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
            <a href="{{ url('/') }}" class="navbar-brand"> {{ config('app.name', 'LaravelBBS') }}</a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side of Navbar -->
            <ul class="nav navbar-nav">&nbsp;<li><a href="">LEFT MENU</a></li></ul>

            <!-- Right Side of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('sessions.create') }}">Login</a></li>
                    <li><a href="{{ route('users.create') }}">Register</a></li>
                @else
                    <li class="dropdown open">
                        <a href=# class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul role="menu" class="dropdown-menu" >
                            <li>
                                <a href="{{ route('sessions.destroy') }}">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>