@extends('layout.app')
@section('content')

<br/>

<h1>Blog Posts</h1>

<br/>

  @if(count($posts) > 0)
       @foreach ($posts as $post)

        <div class="card">
                <div class="card-header">
                    <h2><a href="/posts/{{$post->postId}}">{{$post->postTitle}}</a></h2>
                </div>
                <div class="card-body">
                <p class="card-text">{!! $post->postBody !!}</p>
                </div>
                <div class="card-footer text-muted text-right">
                    <i>Written at {{$post->created_at}}</i>
                </div>
            </div>

           <br/>
       @endforeach

       {{$posts->links()}}

  @else
    <div class="card bg-dark">
        <div class="card-body">
            <p class="card-text">No posts found.</p>
        </div>
    </div>
  @endif



@endsection
