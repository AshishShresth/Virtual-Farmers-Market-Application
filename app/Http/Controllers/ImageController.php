<?php

namespace App\Http\Controllers;

use App\Image;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    public function index(){

    }

    public function show($id){

    }

    public function store( Request $request){
        $user = Auth::user();

        $post = new Post();

        $request->validate(
            [
                'post_images' => 'nullable',
                'post_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        if ($request->hasFile('post_images')){
            $images = $request->file('post_images');
            foreach ($images as $image){
                $filenameWithExt = $image->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $path = $image->storeAs('post_images', $fileNameToStore);
                $image = new Image();
                $image->image_url = $fileNameToStore;
                $image->post_id = $post->id;
                $image->save();
            }
        }
    }
}
