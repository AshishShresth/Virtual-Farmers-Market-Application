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
        // TODO:
    }

    //POST
    public function store(Request $request){
        // TODO:
    }
}
