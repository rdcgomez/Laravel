@extends('layouts.admin')

@section('content')



<h1>Categories</h1>


<div class="col-sm-6">
    {!! Form::open (['method' => 'POST',
                    'action' => 'AdminCategoriesController@store' ])    !!}

        <div class="form-group">
            <label name="name">Name:</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <button class="btn btn-primary col-sm-4" type="submit" >Create Category</button>
        </div>

    {!! Form::close() !!}
</div>

<div class="col-sm-6">

    @if ($categories)

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created</th>
                </tr>
            </thead>

            @foreach ($categories as $category)
            <tbody>
                <tr>
                    <th>{{$category->id}}</th>
                    <th><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></th>
                    <th>{{$category->created_at ? $category->created_at->diffForHumans() : 'no date'}}</th>
                </tr>
            </tbody>
            @endforeach

        </table>
        
    @endif


</div>

@include('admin.includes.form_error')
@endsection