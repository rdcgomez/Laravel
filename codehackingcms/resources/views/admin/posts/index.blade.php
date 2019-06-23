@extends('layouts.admin')

@section('content')
    

    <h1>Posts</h1>

    @if (Session::has('deleted_post'))

    <p class="bg-danger">{{session()->pull('deleted_post')}}</p>

    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>User</th>
                <th>Category</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
        </thead>
        <tbody>

        @if ($posts)
            
            @foreach ($posts as $post)
            <tr>
                <th>{{$post->id}}</th>
                <th><img height="50" src="{{$post->photo->file or 'http://placehold.it/400x400' }} " alt=""></th>
                <th><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->user->name}}</a></th>
                <th>{{$post->category->name or 'None'}}</th>
                <th>{{$post->title}}</th>
                <th>{{str_limit($post->body, 30)}}</th>
                <th>{{$post->created_at->diffForHumans()}}</th>
                <th>{{$post->updated_at->diffForHumans()}}</th>
                <th><a href="{{route('home.post', $post->slug)}}">View Post</a></th>
                <th><a href="{{route('admin.comments.show', $post->id)}}">View Comments</a></th>
            </tr>
            @endforeach

        @endif
        </tbody>
    </table>

    <div class="row">
      <div class="col-sm-6 col-sm-offset-5">
        {{$posts->render()}}
      </div>
    </div>

@endsection