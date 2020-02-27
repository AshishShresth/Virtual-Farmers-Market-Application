<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BidResource;
use App\Http\Resources\CommentResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\ReportResource;
use App\Http\Resources\UserResource;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function index(){
        $users = User::paginate();
        return UserResource::collection( $users );
    }

    public function posts( $id ){
        $user = User::find( $id );
        $posts = $user->posts;
        return PostResource::collection( $posts );

    }

    public function bids( $id ){
        $user = User::find( $id );
        $bids = $user->bids;
        return BidResource::collection( $bids );
    }

    public function reports( $id ){
        $user = User::find( $id );
        $reports = $user->reports;
        return ReportResource::collection( $reports );
    }


}
