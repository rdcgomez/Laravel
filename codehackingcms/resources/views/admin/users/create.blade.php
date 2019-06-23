@extends('layouts.admin')

@section('content')

<h1>Create Users</h1>

<div class="row">
    <form method="POST" action="{{action('AdminUsersController@store')}}" enctype="multipart/form-data"> {{ csrf_field() }}

        <div class="form-group">
            <label name="name">Name:</label>
            <input class="form-control" type="text" name="name">
        </div>

        <div class="form-group">
            <label name="email">Email:</label>
            <input class="form-control" type="email" name="email">
        </div>

        <div class="form-group">
            <label name="role_id">Role:</label>
            <select class="form-control" id="role_id" name="role_id">
                @foreach ($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label name="is_active">Status:</label>
            <select class="form-control" id="is_active" name="is_active">
                    <option value="0">Not Active</option>
                    <option value="1">Active</option>
            </select>
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
            <button class="btn btn-primary" type="submit">Create User</button>
        </div>
    </form>
</div>
@include('admin.includes.form_error')

@endsection