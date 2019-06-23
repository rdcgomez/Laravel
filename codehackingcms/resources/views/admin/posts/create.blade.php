@extends('layouts.admin')

@section('content')
    

    <h1>Create Posts</h1>
<div class="row">
    <form method="POST" action="{{action('AdminPostsController@store')}}" enctype="multipart/form-data"> {{ csrf_field() }}
    
        <div class="form-group">
            <label name="title">Title:</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="form-group">
            <label name="category_id">Category:</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label name="photo_id">Photo:</label>
            <input type="file" name="photo_id" id="photo_id">
        </div>

        <div class="form-group">
            <label name="body">Description:</label>
            <textarea name="body" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit">Create Post</button>
        </div>

    </form>

</div>

@include('admin.includes.form_error')

@endsection