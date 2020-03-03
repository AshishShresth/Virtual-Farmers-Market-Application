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
    //public function __construct()
    //{
        //$this->middleware('auth', ['except' => ['index', 'show']]);
    //}

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

        return redirect()->route('posts')->with('success', 'Post created');
    }

    public function newPost(){
        $categories = Category::all();
        return view('posts.new-post')->with([
            'categories' => $categories,
        ]);
    }

    public function edit($id){
        $post = Post::find($id);
        //check for correct user
        if (auth()->user()->id !==$post->user-id){
            return redirect('/posts')->with('error', 'Unauthorized page');
        }
        return view('posts.edit')->with('post', $post);
    }

    public function update(Request $request, $id){
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

        return redirect()->route('posts')->with('success', 'Post updated');
    }

    public function destroy($id){
        $post = Post::find($id);
        //Check if the post exists before deleting
        if (!isset($post)){
            return redirect()->route('posts')->with('error', 'No post found');
            //return redirect('/posts')->with('error', 'No post found');
        }

        //check for correct user
        if (auth()->user()->id !==$post->user_id){
            return redirect()->route('posts')->with('error', 'Unauthorized page');
            //return redirect('/posts')->with('error', 'Unauthorized page');
        }

        $post->delete();
        return redirect()->route('posts')->with('success', 'Post Deleted');
    }



}
