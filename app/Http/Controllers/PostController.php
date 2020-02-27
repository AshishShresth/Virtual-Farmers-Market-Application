<?php

namespace App\Http\Controllers;

use App\Category;
use App\Image;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(){
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
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
        $request->validate(
            [
            'product_name' => 'required',
            'quantity' => 'required',
            'price_per_kg' => 'required',
            'date_of_harvest' => 'required',
            'post_category' => 'required',
            'current_address' => 'required',
            'product_description' => 'required',
            'district' => 'required',
                'post_images' => 'required',
                'post_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //dd( $request);

        $user = Auth::user();

        $post = new Post();
        $post->product_name = $request->input('product_name');
        $post->quantity = $request->input('quantity');
        $post->price_per_kg = $request->input('price_per_kg');
        $post->date_of_harvest = $request->input('date_of_harvest');
        $post->category_id = intval($request->input('post_category'));
        $post->current_address = $request->input('current_address');
        $post->district = $request->input('district');
        $post->product_description = $request->input('product_description');
        $post->user_id = $user->id;
        $post->save();


        if ($request->hasFile('post_images')){
            $images = $request->file('post_images');
            foreach ($images as $image){
                $filenameWithExt = $image->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $path = $image->storeAs('public/post_images', $fileNameToStore);
                $image = new Image();
                $image->image_url = $fileNameToStore;
                $image->post_id = $post->id;
                $image->save();
            }
        }

        return redirect()->route('posts');
    }

    public function newPost(){
        $categories = Category::all();
        return view('posts.new-post')->with([
            'categories' => $categories,
        ]);
    }
}
