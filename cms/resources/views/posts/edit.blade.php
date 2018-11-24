@extends('layouts.app')

@section('content')
    
<h1>Edit View</h1>

<form method="POST" action="/posts/{{$posts->id}}">  {{ csrf_field() }}

    <input type="hidden" name="_method" value="PUT">

    <input type="text" name="title" value="{{$posts->title}}">
    
    <input type="submit" name="submit" value="Update">
    
</form>

<form method="POST" action="/posts/{{$posts->id}}"> {{ csrf_field() }}

    <input type="hidden" name="_method" value="DELETE">
    <input type="submit" name="submit" value="Delete Title"></a>

</form>

@endsection