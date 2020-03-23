@extends ( 'layouts.app' )

@section( 'content' )
    <div class="col-md-12 mt-5 mb-5">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{$post->product_name}} </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p>Product Quantity: {{ $post->quantity }}</p>
                        <p>Price per kilogram: Rs.{{ $post->price_per_kg }}</p>
                        <p>Date of harvest: {{ $post->date_of_harvest }}</p>
                        <p>District: {{ $post->district }}</p>
                        <p>Product description: {{ $post->product_description }}</p>
                        <p>User: {{$post->user->first_name}} {{$post->user->last_name}}</p>
                        <p>Category: {{$post->category->title}}</p>
                        <p>This post was created at: {{$post->created_at}}</p>
                    </div>
                    <div class="col-md-6">
                        <img style="width: 100%" src="/storage/cover_images/{{$post->cover_image}}">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--
    <div class="row mt-4">
        <div class="col-md-4">
            <img style="width: 100%" src="/storage/cover_images/{{$post->cover_image}}">
        </div>
    </div>
    -->
@endsection