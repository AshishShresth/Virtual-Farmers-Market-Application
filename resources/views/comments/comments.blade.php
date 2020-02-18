@extends ( 'layouts.app' )

@section( 'content' )

        <div class="row mt-4">
                @foreach( $comments as $comment)

                        <div class="col-md-4 mt-2 mb-2">
                                <div class="card">
                                        <div class="card-body">
                                                <h5 class="card-title">{{$comment->user->first_name}} {{$comment->user->last_name}}</h5>
                                                <p class="card-text">{{ $comment->message }}</p>
                                                <a href="{{ $comment->post->link() }}" class="btn btn-primary">Go To Post</a>
                                        </div>
                                </div>
                        </div>
                @endforeach
        </div>

        <div class="col-md-12">
               {{ $comments->links() }}
        </div>

@endsection