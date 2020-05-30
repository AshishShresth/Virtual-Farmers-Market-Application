<?php

namespace App\Http\Controllers;

use App\Category;
use App\Image;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Images;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        $categories = Category::all();
        //return view('posts.index')->withPosts($posts);
        return view('posts.index')->with(
            [
                'posts' => $posts,
                'categories' => $categories,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create')->with([
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        $dt = now();
        foreach ($request->file('post_images.*') as $key => $file) {
            $extension = $file->extension();

            $path = 'post_images/' . implode('.', [
                    $dt->format('YmdHis'),
                    $key,
                    $extension
                ]);

            $image = Images::make($file);
            $image->crop(140, 140, 25, 25);
            //$image->fit(300, 60);

            Storage::put($path, (string) $image->encode());

            $photo = new Image();
            $photo->image_url = $path;
            $photo->post_id = $post->id;
            $photo->save();
        }


//        if ($request->hasFile('post_images')){
//            $images = $request->file('post_images');
//            foreach ($images as $image){
//                $filenameWithExt = $image->getClientOriginalName();
//                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
//                $extension = $image->getClientOriginalExtension();
//                $fileNameToStore = $filename.'_'.time().'.'.$extension;
//                $path = $image->storeAs('post_images', $fileNameToStore);
//                $image = new Image();
//                $image->image_url = $fileNameToStore;
//                $image->post_id = $post->id;
//                $image->save();
//            }
//        }
        return redirect('/dashboard')->with('success', 'Your post has been successfully posted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $images = $post->images;

        return view('posts.show')->with([
            'post' => $post,
            'images' => $images
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        //check for correct user
        if (auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized page');
        }
        return view('posts.edit')->with(
            [
                'post' => $post,
                'categories' => $categories,
            ]);
    }

    public function image($id){
        $post = Post::find($id);
        $images = $post->images;
        //check for correct user
        if (auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized page');
        }
        return view('posts.image')->with(
            [
                'post' => $post,
                'images' => $images
            ]);
    }

    public function addImage( Request $request, $id){
        $post = Post::find($id);
        $request->validate(
            [
                'post_images' => 'nullable',
                'post_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        $dt = now();
        foreach ($request->file('post_images.*') as $key => $file) {
            $extension = $file->extension();

            $path = 'post_images/' . implode('.', [
                    $dt->format('YmdHis'),
                    $key,
                    $extension
                ]);

            $image = Images::make($file);
            $image->crop(140, 140, 25, 25);
            //$image->fit(300, 60);

            Storage::put($path, (string) $image->encode());

            $photo = new Image();
            $photo->image_url = $path;
            $photo->post_id = $post->id;
            $photo->save();
        }
//        if ($request->hasFile('post_images')){
//            $images = $request->file('post_images');
//            foreach ($images as $image){
//                $filenameWithExt = $image->getClientOriginalName();
//                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
//                $extension = $image->getClientOriginalExtension();
//                $fileNameToStore = $filename.'_'.time().'.'.$extension;
//                $path = $image->storeAs('post_images', $fileNameToStore);
//                $image = new Image();
//                $image->image_url = $fileNameToStore;
//                $image->post_id = $post->id;
//                $image->save();
//            }
//        }
        return redirect('/dashboard')->with('success', 'Image uploaded successfully');
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
            ]);

        //dd( $request);

        $user = Auth::user();

        $post = Post::find($id);
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


//        if ($request->hasFile('post_images')){
//            $images = $request->file('post_images');
//            foreach ($images as $image){
//                $filenameWithExt = $image->getClientOriginalName();
//                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
//                $extension = $image->getClientOriginalExtension();
//                $fileNameToStore = $filename.'_'.time().'.'.$extension;
//                $path = $image->storeAs('post_images', $fileNameToStore);
//                $image = new Image();
//                $image->image_url = $fileNameToStore;
//                $image->post_id = $post->id;
//                $image->save();
//            }
//        }
        return redirect('/dashboard')->with('success', 'Your post has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        //Check if the post exists before deleting
        if (!isset($post)){
            //return redirect()->route('posts')->with('error', 'No post found');
            return redirect('/posts')->with('error', 'No post found');
        }

        //check for correct user
        if (auth()->user()->id !==$post->user_id){
            //return redirect()->route('posts')->with('error', 'Unauthorized page');
            return redirect('/posts')->with('error', 'Unauthorized page');
        }

        $post->delete();
        return redirect('/dashboard')->with('success', 'Post Deleted');
    }

}
