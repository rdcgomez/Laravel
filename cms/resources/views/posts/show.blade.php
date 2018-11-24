@extends('layouts.app')

@section('content')
    
<h1>Show View</h1>

<h1>{{$posts->title}}</h1>

<a href="{{route('posts.edit', $posts->id)}}"><input type="submit" value="Edit Title"></a>

@endsection