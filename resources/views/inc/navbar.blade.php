<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light px-lg-5">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('storage/post_images/logo/logo.png') }}" alt="VFM Logo" class="brand-image"
                 style="opacity: .8; width: 70px; height: 70px">
            <span class="brand-text font-weight-light">VFM</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav justify-content-center ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('dailyPrice')}}">Kalimati Price</a>
                </li>
            </ul>
            <!--Search bar-->
            <form method="post" class="form-inline my-2 my-lg-0" action="{{route('search')}}">
                @csrf
                <input class="form-control mr-sm-2 " name="search" id="searchPost" type="search" placeholder="Search..." aria-label="Search" style="border-radius: 25px; width:250px !important;">
                <button class="btn btn-primary my-2 my-sm-0" type="submit" style="border-radius: 25px;"><i class="fa fa-search"></i>Search</button>
            </form>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->first_name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="/dashboard">Dashboard</a>

                            <a class="dropdown-item" href="{{ route('categories') }}">
                                {{ __('Categories') }}
                            </a>

                            <a class="dropdown-item" href="{{ route('comments') }}">
                                {{ __('Comments') }}
                            </a>

                            <a class="dropdown-item" href="{{ route('users') }}">
                                {{ __('Users') }}
                            </a>

                            <a class="dropdown-item" href="{{ route('posts.index') }}">
                                {{ __('Posts') }}
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>

        </div>
    </div>
</nav>