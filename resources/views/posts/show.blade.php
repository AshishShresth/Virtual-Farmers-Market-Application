@extends ( 'layouts.app' )

@section( 'content' )
    <div class="col-md-8 mt-2 mb-2">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$post->product_name}} </h5>
                <p>Product Quantity: {{ $post->quantity }}</p>
                <p>Price per kilogram: Rs.{{ $post->price_per_kg }}</p>
                <p>Date of harvest: {{ $post->date_of_harvest }}</p>
                <p>District: {{ $post->district }}</p>
                <p>Product description: {{ $post->product_description }}</p>
                <p>User: {{$post->user->first_name}} {{$post->user->last_name}}</p>
                <p>Category: {{$post->category->title}}</p>
                <p>This post was created at: {{$post->created_at}}</p>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-4">
            @foreach($images as $image)
                <img src="{{ asset( 'storage/post_images/'.$image->image_url)}}" class="img-thumbnail">
            @endforeach
        </div>
    </div>
@endsection