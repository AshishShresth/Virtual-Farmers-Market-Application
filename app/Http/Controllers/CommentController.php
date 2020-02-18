<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        $comments = Comment::with(['user', 'post'])->paginate();
        return view( 'comments.comments')->withComments( $comments);
    }

    public function show($id){
        return view('comments.comment')->withComments( Comment::find($id));
    }

    public function store( Request $request){

    }
}
