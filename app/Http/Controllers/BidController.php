<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Session;

class BidController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bids = Bid::with(['user', 'post'])->get();
        return view( 'bids.bids')->withbids( $bids);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
        $this->validate($request, array(
            'product_quantity' => 'required',
            'bidding_price' => 'required',
            'message' => 'required|max:500',
        ));

        $post = Post::find($post_id);
        $user = Auth::user();
        $firstName = $user->first_name;
        $lastName = $user->last_name;
        $name = $firstName." ".$lastName;

        $bid = new Bid();
        $bid->product_quantity = $request->input('product_quantity');
        $bid->bidding_price = $request->input('bidding_price');
        $bid->message = $request->input('message');
        $bid->user_id = $user->id;
        $bid->bidder_name = $name;
        $bid->bidder_phone = $user->phone_number;
        //$bid->post()->associate($post); //here is the error
        $bid->post_id = $post->id;

        $bid->save();
        return redirect()->back()->with('message', 'Bid Placed');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($bid_id)
    {
        return view('bids.singleBid')->withBids( Bid::find($bid_id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }

}
