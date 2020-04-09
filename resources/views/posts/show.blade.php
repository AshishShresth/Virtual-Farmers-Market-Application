@extends ( 'layouts.app' )

@section( 'content' )
    <div class="col-md-12 mt-5 mb-5">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">{{$post->product_name}} </h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p>Product Quantity: {{ $post->quantity }}</p>
                        <p>Price per kilogram: Rs.{{ $post->price_per_kg }}</p>
                        <p>Date of harvest: {{ $post->date_of_harvest }}</p>
                        <p>District: {{ $post->district }}</p>
                        <p>Product description: {{ $post->product_description }}</p>
                        <p>Category: {{$post->category->title}}</p>
                        <p>This post was created at: {{$post->created_at}}</p>
                    </div>
                    <div class="col-md-6">
                        <img style="width: 100%" src="/storage/cover_images/{{$post->cover_image}}">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#BidModal">
                    Place A Bid
                </button>

                <!-- Modal -->
                <div class="modal fade" id="BidModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Bid Price To Buy</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container h-100" style="max-width: 800px;">
                                    <h2>Place A Bid</h2>
                                    <form method="post" action="{{ route('bids.store', [$post->id]) }}" >
                                        @csrf
                                        <div class="row align-items-center h-100">
                                            <div class="form-group col-md-6">
                                                <label for="productQuantity">Product Quantity:</label>
                                                <input type="number" class="form-control" name="product_quantity" id="product_quantity">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="biddingPrice">Bidding Price Per KG:</label>
                                                <input type="number" class="form-control" name="bidding_price" id="bidding_price">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="message">Message:</label>
                                                <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Place your query..."></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Place bid</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3>Seller Details</h3>
            </div>
            <div class="card-body">
                <p>Sold By: {{$post->user->first_name}} {{$post->user->last_name}}</p>
                <p>Seller Email Address: {{$post->user->email}}</p>
                <p>Phone Number: {{$post->user->phone_number}}</p>
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