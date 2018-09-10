@extends('layout.app')
@section('content')

<br/>

    <div class="card">
            <div class="card-header">
                    <h2 class="float-left">{{$post->postTitle}}</h2>
                    <a href="/posts/{{$post->postId}}/edit" class="btn btn-default float-right">Edit</a>
            </div>
            <div class="card-body">
                    {!!$post->postBody !!}
            </div>
            <div class="card-footer text-muted text-right">
            Written on {{$post->created_at}}
            </div>
    <div>

</div>



@endsection
