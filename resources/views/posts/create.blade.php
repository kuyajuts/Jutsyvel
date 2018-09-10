@extends('layout.app')
@section('content')

<br/>

    <h2>New Blog Post</h2>

<br/>


<div class="card">
    <div class="card-body">
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('postTitle', 'Post Title')}}
            {{Form::text('postTitle', '', ['class' => 'form-control', 'placeholder' => 'Your post title here.'])}}
        </div>

        <div class="form-group">
                {{Form::label('postBody', 'Message')}}
                {{Form::textarea('postBody', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Your post title here.'])}}
        </div>

        {{Form::submit('Post',['class' => 'btn btn-primary'])}}

    {!! Form::close() !!}
     </div>
</div>

@endsection
