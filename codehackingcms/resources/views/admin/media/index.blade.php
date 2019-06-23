@extends('layouts.admin')   

@section('content')
    <h1>Media</h1>

    @if($photos)
    <form action="/admin/delete/media" method="POST" class="form-inline"> {{ csrf_field() }} {{ method_field('delete') }}
        <div class="form-group">
          <select name="checkBoxArray" class="form-control">
            <option value="delete" >Delete</option>
          </select>
        </div>

        <div class="form-group">
            <button class="btn btn-danger" type="submit">Delete</button>	
        </div>

      <table class="table">
          <thead>
              <tr>
                  <th><input type="checkbox" id="options"></th>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Created</th>
              </tr>
          </thead>

          <tbody>
            @foreach ($photos as $photo)
              <tr>
                  <th><input  class="checkBoxes"  type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></th> 
                  <th>{{$photo->id}}</th>
                  <th><img height="50" src="{{$photo->file ? $photo->file : 'http://placehold.it/400x400'}}" alt=""></th>
                  <th>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'no date'}}</th>
              </tr>
          </tbody>
          @endforeach

      </table>
    </form>
    @endif
@include('admin.includes.form_error')
@endsection

@section('scripts')

<script>
  $(document).ready(function(){

    $('#options').click(function () {
        
        if(this.checked){
          $('.checkBoxes').each(function () {
            this.checked = true;
          });
        }else {
          $('.checkBoxes').each(function () {
            this.checked = false;
          });
        }
        
    });

  });
</script>
  
@endsection