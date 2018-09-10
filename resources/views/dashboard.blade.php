@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <br/>
            <br/>

            <div class="card">
                <div class="card-header"><h2>My Dashboard</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <table class="table table-striped">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">Title</th>
                                <th scope="col"></th>
                              </tr>
                            </thead>
                            <tbody>

                            @if(count($myposts) > 0)
                                @foreach($myposts as $postItem)
                                    <tr>
                                        <th scope="row">{{$postItem->postTitle}}</td>
                                        <td><a href="/posts/{{$postItem->postId}}/edit">Edit</a></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="2">No posts.</td>
                                </tr>
                            @endif
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<br/>


@endsection
