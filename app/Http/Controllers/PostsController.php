<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(5);
        return view('posts.index')->with('posts',$posts);
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
