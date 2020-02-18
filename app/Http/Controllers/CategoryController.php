<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Resources\CategoriesResource;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //GET ALL
    public function index(){
        // TODO:
        return view('categories.categories')->with(
            [
                //'categories' => new CategoriesResource( Category::paginate() ),
                'categories' => Category::all()
            ]
        );

    }

    //GET specific one with $id
    public function show($id){
        return view('categories.category')->with([
            'category' => Category::find( $id )
        ]);
    }

    //POST
    public function store(Request $request){
        $request->validate([
           'category_title' => 'required'
        ]);

        $category = new Category();
        $category->title = $request->get('category_title');
        $category->save();
        return redirect()->back()->with('message', 'New Category Created');
    }
}
