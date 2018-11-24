@extends('layouts.app')

@section('content')
    
<h1>Create View</h1>

<form method="POST" action="/posts">  {{ csrf_field() }}

    <input type="text" name="title" placeholder="Enter title">
   
    <input type="submit" name="submit" value="Submit">
    
</form>

{!!Form::open() !!}

    {!!Form::label('username', 'Title:')!!}
    {!!Form::text('username', null, ['placeholder' => 'Edit Title']) !!}

<div class="form-group">

    {!!Form::submit('Create New Post', ['class' => 'btn btn-primary'])!!}
    
</div>

{!! Form::close() !!}

@endsection

