@extends('layouts.admin')

@section('content')

<h1>Edit Users</h1>

<div class="row">

    <div class="col-sm-3">
        <img height="2" length="2" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">

    </div>

    <div class="col-sm-9">
        {!! Form::model($user, ['method'=>'PATCH', 
                                'action'=>['AdminUsersController@update', $user->id], 
                                'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name',null, ['class'=>'form-control']) !!}
            </div>
        
            <div class="form-group">
                {!! Form::label('email','Email:') !!}
                {!! Form::email('email',null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {{-- {!! Form::label('role_id','Role:') !!}
                {!! Form::select('role_id',$roles, null, ['class'=>'form-control']) !!} --}}

                {{-- OR --}}
                
                <label name="role_id">Role:</label>
                <select class="form-control" id="role_id" name="role_id">
                    @foreach ($roles as $role => $rolename)
                            <option value="{{ $role }}" {{ ($user->role_id == $role ? 'selected' : '') }} > {{ $rolename }}</option>
                    @endforeach 
                </select>
            </div>

            <div class="form-group">
                {!! Form::label('is_active','Status:') !!}
                {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), null, ['class'=>'form-control']) !!}
            
            </div>

            <div class="form-group">
                <label name="photo_id">Photo:</label>
                <input type="file" name="photo_id" id="photo_id">
            </div>

            <div class="form-group">
                <label name="password">Password:</label>
                <input class="form-control" type="password" name="password" id="password">
            </div>

            <div class="form-group">
                <button class="btn btn-primary col-sm-6" type="submit">Update</button>
            </div>

        {!! Form::close() !!}


        {!! Form::open(['method'=>'DELETE', 
                        'action'=>['AdminUsersController@destroy', $user->id] ]) !!}

            <div class="form-group">
                <button class="btn btn-danger col-sm-6" type="submit">Delete User</button>
            </div>

        {!! Form::close() !!}   
    </div>

</div>

<div class="row">
    @include('admin.includes.form_error')
</div>

@endsection