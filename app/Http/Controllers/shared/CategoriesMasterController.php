<?php


namespace App\Http\Controllers\shared;

use App\Category;
use App\Http\Resources\CategoriesResource;
use Illuminate\Http\Request;



class CategoriesMasterController{
    //GET ALL
    public function index(){
        // TODO:
        return new CategoriesResource( Category::paginate() );

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
