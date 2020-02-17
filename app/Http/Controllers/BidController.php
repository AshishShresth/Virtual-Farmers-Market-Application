<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Category;
use App\Http\Resources\BidsResource;
use Illuminate\Http\Request;

class BidController extends Controller
{
    //GET ALL
    public function index(){
        // TODO:
        return view('bids.bids')->with(
            [
                'bids' => Bid::all()
            ]
        );

    }

    //GET specific one with $id
    public function show($id){
        // TODO:
    }

    //POST
    public function store(Request $request){
        // TODO:
    }
}
