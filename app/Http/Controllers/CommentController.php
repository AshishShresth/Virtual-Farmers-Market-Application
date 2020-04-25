<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Comment;
use App\Events\NewComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(Bid $bid ){
        return response()->json($bid->comments()->with('user')->latest()->get());
    }



    public function show($id){
        return view('comments.comment')->withComments( Comment::find($id));
    }

    public function store( Request $request, Bid $bid){
        $request->validate(
            [
                'message' => 'required',
            ]);

        $comment = $bid->comments()->create([
            'message' => $request->message,
            'user_id' =>Auth::id(),
        ]);

        $comment = Comment::where('id', $comment->id)->with('user')->first();

        //event(new NewComment($comment));
        broadcast(new NewComment($comment))->toOthers();

        return $comment->toJson();
    }
}
