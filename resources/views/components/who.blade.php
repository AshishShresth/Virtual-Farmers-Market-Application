@if (Route::has('login'))
    <div class="row pl-2 pr-4">
        @auth
            <a class="btn btn-primary" href="{{ url('/home') }}">Home</a>
        @else
            <div class="col-8">
                <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
            </div>
            @if (Route::has('register'))
                <div class="col-4" >
                    <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
                </div>
            @endif
        @endauth
    </div>
@endif

{{--@if(Auth::guard('web')->check())--}}
{{--    <p class="text-success">--}}
{{--        You are Logged in as <strong>{{ Auth::user()->first_name }}</strong>--}}
{{--    </p>--}}
{{--@else--}}
{{--    <p class="text-danger">--}}
{{--        You are Logged out as a <strong></strong>--}}
{{--    </p>--}}
{{--@endif--}}

{{--@if(Auth::guard('admin')->check())--}}
{{--    <p class="text-success">--}}
{{--        You are Logged in as <strong>Admin</strong>--}}
{{--    </p>--}}
{{--@else--}}
{{--    <p class="text-danger">--}}
{{--        You are Logged out as a <strong>Admin</strong>--}}
{{--    </p>--}}
{{--@endif--}}