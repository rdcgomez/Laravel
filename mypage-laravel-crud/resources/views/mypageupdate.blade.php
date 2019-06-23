@extends('layout.app')

@section('content')

<center>

  <div id="crud">
    <label>UPDATE INFORMATION</label>
      {!! Form::model($user, ['method' => 'PUT', 
                              'action' => ['VisitorsController@update', $user->id] ])    !!}	
        <table align="center">
          <tr><td><input type="text"   name="first_name"     placeholder="First Name"     value="{{$user->first_name}}">  </td></tr>
          <tr><td><input type="text"   name="last_name"      placeholder="Last Name"      value="{{$user->last_name}}">   </td></tr>
          <tr><td><input type="text"   name="city_name"      placeholder="City"           value="{{$user->city}}">        </td></tr>
          <tr><td><input type="text"   name="email_address"  placeholder="Email Address"  value="{{$user->email}}">       </td></tr>
          <tr><td><input type="number" name="contact_number" placeholder="Contact Number" value="{{$user->contact}}">     </td></tr>
          <tr><td><input type="url"    name="url_website"    placeholder="Website"        value="{{$user->url_website}}"> </td></tr>
          <tr><td>
            <button type="submit" name="btn-update"><strong>UPDATE</strong></button>
            <button type="submit" name="btn-cancel"><strong>Cancel</strong></button>
          </td></tr>
        </table>
      {!! Form::close() !!}
  </div>

</center>
    
@endsection