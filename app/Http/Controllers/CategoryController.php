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
                'categories' => Category::all(),
                'levels' => Category::where(['parent_id'=>0])->get()
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
           'category_title' => 'required',

        ]);

        $category = new Category();
        $category->title = $request->get('category_title');
        $category->parent_id = $request->get('parent_id');
        $category->save();
        return redirect()->back()->with('message', 'New Category Created');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        //Check if the post exists before deleting
        if (!isset($category)){
            //return redirect()->route('posts')->with('error', 'No post found');
            return redirect('/categories')->with('error', 'No category found');
        }

        $category->delete();
        return redirect('/categories')->with('success', 'Post Deleted');
    }

    public function subCat(){
        return Category::with('childs')->where('parent_id');
    }
}
