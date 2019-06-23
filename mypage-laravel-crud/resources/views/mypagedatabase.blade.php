@extends('layout.app')

@section('content')

  <center>
    <div id="crud">
      <label>VISITOR'S DATABASE</label>
        <table align="center">
          <tr>
            <th colspan="10"><a href="{{route('index')}}">Homepage</a></th>
          </tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email Address</th>
          <th>City</th>
          <th>Contact</th>
          <th>Website</th>
          <th>Gender</th>
          <th colspan="3">Operations</th>
          
          @foreach ($users as $user)

          <tr>
            <td>{{$user->first_name}}</td>
            <td>{{$user->last_name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->city}}</td>
            <td>{{$user->contact}}</td>
            <td>{{$user->url_website}}</td>
            <td>{{$user->gender}}</td>
            <td><a href="{{route('edit.user', $user->id)}}"><i class='far fa-edit'></i></a></td>
            <td><a href="{{route('delete.user', $user->id)}}"><i class='far fa-trash-alt'></i></a></td>
          </tr> 

          @endforeach
        </table>
    </div>
  </center>

@endsection