<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::paginate();
        return view('posts.posts')->withPosts($posts);
    }

    public function show($id){
        $post = Post::find($id);
        $images = $post->images;

        return view('posts.post')->with([
            'post' => $post,
            'images' => $images
        ]);
    }

    public function store(Request $request){

    }
}
