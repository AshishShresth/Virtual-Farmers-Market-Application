<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('profile.dashboard')->with('posts', $user->posts);


    }
}
