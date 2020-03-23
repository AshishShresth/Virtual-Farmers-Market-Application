@if(Auth::guard('web')->check())
    <p class="text-success">
        You are Logged in as <strong>{{ Auth::user()->first_name }}</strong>
    </p>
@else
    <p class="text-danger">
        You are Logged out as a <strong></strong>
    </p>
@endif

@if(Auth::guard('admin')->check())
    <p class="text-success">
        You are Logged in as <strong>Admin</strong>
    </p>
@else
    <p class="text-danger">
        You are Logged out as a <strong>Admin</strong>
    </p>
@endif