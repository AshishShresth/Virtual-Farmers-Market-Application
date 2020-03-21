@extends ( 'layouts.app' )

@section( 'content' )
    <div class="container gedf-wrapper">
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-6 gedf-main">
                @foreach( $posts as $post)
                    <div class="card gedf-card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3><a class="card-link" href="/posts/{{$post->id}}">{{$post->product_name}}</a></h3>
                            </div>
                        </div>
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img class="" src="http://via.placeholder.com/300x180" alt="Card image cap">
                            </div>
                            <div class="card-body">
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