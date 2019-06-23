@extends('layouts.admin')

@section('content')

    
<h1>Edit Posts</h1>

    <div class="row">
        <div class="col-sm-3">

            <img height="2" length="2" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
            
        </div>

        <div class="col-sm-9">
                {!! Form::model($post, ['method'=>'PATCH', 
                                        'action'=>['AdminPostsController@update', $post->id], 
                                        'files'=>true]) !!}
            
                <div class="form-group">
                    <label name="title">Title:</label>
                <input value="{{$post->title}}" type="text" name="title" class="form-control">
                </div>
        
                <div class="form-group">
                    <label name="category_id">Category:</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach ($categories as $category => $id)

                            <option value="{{ $id }}" {{ ($post->category_id == $id ? 'selected' : '') }} > {{ $category }}

                            {{-- OR --}}

                            {{-- <option value="{{ $id }}"
                                @if ($id == $post->category_id )
                                    selected
                                @endif
                                >{{ $category }}
                            </option> --}}

                        @endforeach
                    </select>
                </div>
        
                <div class="form-group">
                    <label name="photo_id">Photo:</label>
                    <input type="file" name="photo_id" id="photo_id">
                </div>
        
                <div class="form-group">
                    <label name="body">Description:</label>
                    <textarea name="body" cols="30" rows="10" class="form-control" >{{$post->body}}</textarea>
                </div>
        
                <div class="form-group">
                    <button class="btn btn-primary col-sm-6" type="submit">Update Post</button>
                </div>

            {!! Form::close() !!}

            {!! Form::open(['method' => 'DELETE',
                            'action' => ['AdminPostsController@destroy', $post->id] ]) !!}

                <div class="form-group">
                        <button class="btn btn-danger col-sm-6" type="submit">Delete Post</button>
                </div>

            {!! Form::close() !!}
        </div>

    </div>

@include('admin.includes.form_error')

@endsection