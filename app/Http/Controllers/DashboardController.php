<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user('id');
        $posts = User::find($user_id);
        $final = User::select('posts.postId', 'posts.postTitle', 'posts.postBody', 'users.name', 'posts.created_at')
                        ->join('posts', 'users.id', '=', 'posts.user_id')
                        ->where('posts.user_id', '=', $user_id->id)
                        ->orderBy('created_at','desc')
                        ->paginate(5);

        return view('dashboard')->with('myposts', $final);
    }
}
