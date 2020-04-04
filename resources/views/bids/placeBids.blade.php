@extends ( 'layouts.app' )

@section( 'content' )
    <div class="container h-100" style="max-width: 800px;">
        <!--col-md-8 col-md-offset-2 -->
        <h2>Place A Bid</h2>
        <form method="post"  action="{{ route('bids.store') }} " enctype="multipart/form-data">
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
@endsection