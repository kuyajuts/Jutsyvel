<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show'] ]);
    }

    public function index()
    {
        /*
        $user_id = auth()->user('id');
        echo $user_id;

        $posts = DB::table('posts')
                        ->join('users', 'posts.user_id', '=', 'users.id')
                        ->where('posts.user_id', '=', $user_id->id)
                        ->orderBy('created_at','desc')
                        ->get(['users.name', 'posts.postId', 'posts.postTitle', 'posts.postBody'])
                        ->paginate(5);
        */

        $user_id = auth()->user('id');
        $posts = User::find($user_id);
        $final = Post::select('posts.postId', 'posts.postTitle', 'posts.postBody', 'users.name', 'posts.created_at')
                        ->join('users', 'posts.user_id', '=', 'users.id')
                        ->orderBy('created_at','desc')
                        ->paginate(5);

        echo $final;


        return view('posts.index')->with('posts', $final);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'postTitle' => 'required',
            'postBody' => 'required'

        ]);

        $post = new Post;
        $post->postTitle = $request->input('postTitle');
        $post->postBody = $request->input('postBody');
        $post->user_id = auth()->user()->id;
        $post->isActive = true;
        $post->isDeleted = false;
        $post->save();

        return redirect('/posts')->with('success', 'New Blog Post created.');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::where('postId', $id)->first();
        return view('posts.show')->with('post', $post);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $post = Post::where('postId', $id)->first();

        if(auth()->user()->id !==$post->user_id){
            return redirect('posts')->with('error', 'Unauthorized.');

        }

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'postTitle' => 'required',
            'postBody' => 'required'

        ]);

        $post = Post::where('postId', $id)->first();
            if(!empty($post)){
                $post->postTitle = $request->input('postTitle');
                $post->postBody = $request->input('postBody');
                $post->user_id = auth()->user()->id;
                $post->isActive = true;
                $post->isDeleted = false;
                $post->save();
            }


        return redirect('/posts/' . $id)->with('success', ' Blog Post has been updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
