<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class SearchController extends Controller
{
    public function search (Request $request){
       $search = $request->input('search');
       //dd($search);
       $post = DB::table('posts')
           ->where('product_name', "LIKE", '%'.$search.'%')
           ->paginate(10);

       $pagination = $post->appends(array(
           'search' => $request->input('search')
       ));

        return view('posts.searchResults',[
            'searchPost' => $post
        ])->withDetails($post)->withQuery($search);

    }


    public function advanceSearch(Request $request, Post $post, Category $category){
        /**
        $title = $request->input('title');
        //dd($title);
        $district = $request->input('district');
        //dd($district);
        $category = $request->input('post_category');
        dd($category);
        $post = DB::table('posts')
            ->join('categories', 'categories.id',  '=', 'posts.category_id')
            ->where('posts.product_name', "LIKE", '%'.$title.'%')
            ->orWhere('posts.district', "LIKE", '%'.$district.'%')
            ->orWhere('categories.title', "LIKE", '%'.$category.'%');

        return view('posts.advance-search-results',[
            'searchPost' => $post
        ])->withDetails($post)->withQuery($title);
         */
        $title = $request->input('title');
        //dd($title);
        $district = $request->input('district');
        //dd($district);
        $category = $request->input('post_category');
        //dd($category);
        $post = DB::table('posts')
            ->where('product_name', "LIKE", '%'.$title.'%')
            ->orWhere('district', "LIKE", '%'.$district.'%')
            ->orWhere('category_id', "LIKE", '%'.$category.'%')
            ->paginate(10);

        $pagination = $post->appends(array(
            'search' => $request->input('search')
        ));

        return view('posts.searchResults',[
            'searchPost' => $post
        ])->withDetails($post)->withQuery($post);
    }





}
