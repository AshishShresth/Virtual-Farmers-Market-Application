<?php

namespace App\Http\Controllers\Api;

use App\Bid;
use App\Http\Controllers\BidController;
use App\Http\Controllers\Controller;
use App\Http\Resources\BidResource;
use Illuminate\Http\Request;

class BidApiController extends Controller
{

    public function index(){
        {
            $bids = Bid::paginate();
            return BidResource::collection( $bids );
        }
    }


}
