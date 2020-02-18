@extends( 'layouts.app' )

@section( 'content' )
    <div class="row mt-4">
        @foreach( $users as $user)

            <div class="col-md-4 mt-2 mb-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{$user->first_name}} {{$user->last_name}}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="col-md-12">
        {{ $users->links() }}
    </div>
@endsection