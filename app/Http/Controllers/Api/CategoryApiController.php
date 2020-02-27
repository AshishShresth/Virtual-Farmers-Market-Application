<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
//use App\Http\Controllers\shared\CategoriesMasterController;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostsResource;
use Illuminate\Http\Request;
use App\Http\Resources\CategoriesResource;

class CategoryApiController extends Controller
{
    public function index(){
        $categories = Category::all();
        return CategoryResource::collection( $categories );
        //return new CategoriesResource( $categories );
    }

    public function posts( $id){
        $posts = Category::find($id)->posts()->paginate();
        return PostResource::collection($posts);
        //$category = Category::find($id);
        //$posts = $category->posts; // we have defined the post relation in the category model
        //return new PostsResource( $posts );
    }
}
