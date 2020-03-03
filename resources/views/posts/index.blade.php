@extends ( 'layouts.app' )

@section( 'content' )

    <div class="row mt-4">
        @foreach( $posts as $post)

            <div class="col-md-8 mt-2 mb-2">
                <div class="card">
                    <div class="card-body">
                        <h3><a href="/posts/{{$post->id}}">{{$post->product_name}}</a></h3>
                        <p class="card-title">{{$post->id}} </p>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="col-md-12">
        {{ $posts->links() }}
    </div>

@endsection