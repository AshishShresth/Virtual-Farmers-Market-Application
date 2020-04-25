<nav class="navbar navbar-expand-lg fixed-top navbar-dark  px-lg-5">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('storage/post_images/logo/logo.png') }}" alt="VFM Logo" class="brand-image"
                 style="opacity: .8; width: 50px; height: 50px">
            <span class="brand-text font-weight-light">VFM</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fas fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav justify-content-center ml-auto">
                <li class="{{ Request::is('posts') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('posts.index') }}">Home</a>
                </li>
                <li class="{{ Request::is('kalimati-price') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('dailyPrice')}}">Kalimati Price</a>
                </li>
            </ul>
            <!--Search bar-->
            <form method="post" class="form-inline my-2 my-lg-0" action="{{route('search')}}">
                @csrf
                <input class="form-control mr-sm-2 " name="search" id="searchPost" type="search" placeholder="Search..." aria-label="Search" style="border-radius: 50px; width:250px !important;">
                <button class="btn btn-primary my-2 my-sm-0" type="submit" style="border-radius: 25px;"><i class="fas fa-search"></i> Search</button>
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
                    <li class="nav-item dropdown" id="markAsRead" onclick="markNotificationAsRead('{{ count(auth()->user()->unreadNotifications) }}')">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Notifications <span class="badge badge-pill badge-primary">{{ count(auth()->user()->unreadNotifications) }}</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @forelse(auth()->user()->unreadNotifications as $notification)
{{--                                @include('inc.notification'\Str::snake_case(class_basename($noification->type)))--}}
{{--                                <a class="dropdown-item" href="#">{{ $noification->type }}</a>--}}
                                <a class="dropdown-item" href="{{route('posts.show',$notification->data['post']['id'])}}">
                                    {{$notification->data['user']['first_name']}} placed a bid on your post<strong>{{$notification->data['post']['product_name']}}</strong>
                                </a>
                                @empty
                                <a class="dropdown-item" href="#">No unread notifications</a>
                            @endforelse
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->first_name }} <span class="fas fa-angle-down"></span>
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