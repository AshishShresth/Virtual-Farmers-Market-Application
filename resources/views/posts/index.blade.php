@extends ( 'layouts.app' )

@section( 'content' )
    <div class="container gedf-wrapper">
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-6 gedf-main">
                @foreach( $posts as $post)
                    <div class="card gedf-card">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img style="width: 100%" src="/storage/cover_images/{{$post->cover_image}}">
                            </div>
                            <div class="card-body">
                                <h3><a class="card-link" href="/posts/{{$post->id}}">{{$post->product_name}}</a></h3>
                                <div class="card-text">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo recusandae nulla rem eos ipsa praesentium esse magnam nemo dolor
                                    sequi fuga quia quaerat cum, obcaecati hic, molestias minima iste voluptates.
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="/posts/{{$post->id}}" class="btn btn-primary">View Details</a></h3>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <div class="col-md-12">
        {{ $posts->links() }}
    </div>

@endsection