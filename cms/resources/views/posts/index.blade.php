@extends('layouts.app')

@section('content')
    
<ul>

    @foreach ($posts as $data)
    <li><a href="{{route('posts.show', $data->id)}}">{{$data->title}}</a></li>
    @endforeach
    
</ul>



@endsection