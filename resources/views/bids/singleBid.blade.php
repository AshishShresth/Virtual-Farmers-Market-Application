@extends ( 'layouts.app' )

@section( 'content' )
    <div class="row">
        <div class="col-md-4 ">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$bids->user->first_name}} {{$bids->user->last_name}}</h5>
                    <p class="card-text"><strong>Product Quantity:</strong> {{ $bids->product_quantity }} kg</p>
                    <p class="card-text"><strong>Bidding Price:</strong> Rs.{{ $bids->bidding_price }}/kg</p>
                    <a href="{{ $bids->post->link() }}" class="btn btn-primary">Go To Post</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">Message</div>
                <div class="card-body">
                    <div style="margin-bottom:50px;">
                        <textarea class="form-control" rows="3" name="message" placeholder="Leave a comment" ></textarea>
                        <button class="btn btn-success" style="margin-top:10px">Save message</button>
                    </div>
                    <div class="media" style="margin-top:20px;">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="http://placeimg.com/80/80" alt="...">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">John Doe said...</h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                            <span style="color: #aaa;">on Dec 15, 2017</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

