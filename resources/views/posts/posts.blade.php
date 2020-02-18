@extends ( 'layouts.app' )

@section( 'content' )

    <div class="row mt-4">
        @foreach( $posts as $post)

            <div class="col-md-8 mt-2 mb-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->product_name}} </h5>
                        <p class="card-title">{{$post->id}} </p>
                        <a href="{{ route('show-post', ['id' => $post->id]) }}" class="btn btn-primary">Go To Post</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="col-md-12">
        {{ $posts->links() }}
    </div>

@endsection