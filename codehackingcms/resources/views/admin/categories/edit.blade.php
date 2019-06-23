@extends('layouts.admin')

@section('content')
    
<h1>Edit Category</h1>

    <div class="col-sm-6">
        {!! Form::model ($category, [ 'method' => 'PATCH',
                                      'action' => ['AdminCategoriesController@update', $category->id] ])    !!}
    
            <div class="form-group">
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name',null, ['class'=>'form-control']) !!}
                {{-- <label name="name">Name:</label>
                <input type="text" name="name" class="form-control"> --}}
            </div>
    
            <div class="form-group">
                <button class="btn btn-primary col-sm-6" type="submit" >Update Category</button>
            </div>
    
        {!! Form::close() !!}
    
        {!! Form::open ([ 'method' => 'DELETE',
                          'action' => ['AdminCategoriesController@destroy', $category->id] ])    !!}

            <div class="form-group">
                <button class="btn btn-danger col-sm-6" type="submit">Delete Category</button>
            </div>

        {!! Form::close() !!}

        
    </div>

@include('admin.includes.form_error')

@endsection