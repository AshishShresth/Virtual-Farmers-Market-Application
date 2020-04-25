<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostsResource;
use App\Post;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
   public function index(){
       $posts = Post::with(['user', 'category', 'images',  'bids'])->paginate(); //eager loading the with refers to the relationship defined in the post model
       // Return collection of posts as a resource
       //return new PostsResource( $posts );
       return PostResource::collection( $posts );
   }
}
