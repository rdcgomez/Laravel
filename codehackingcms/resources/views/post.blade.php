@extends('layouts.blog-post') 

@section('content')
    

<!-- Blog Post -->

<!-- Title -->
<h1>{{$post->title}}</h1>

<!-- Author -->
<p class="lead">
    by <a href="#">{{$post->user->name}}</a>
</p>

<hr>

<!-- Date/Time -->
<p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

<hr>

<!-- Preview Image -->
<img class="img-responsive" src="{{$post->photo->file}}" alt="">

<hr>

<!-- Post Content -->
<p>{{$post->body}}</p>

<hr>

@if (Session::has('comment_flash') ) 
    {{session('comment_flash')}} 
@endif

<!-- Blog Comments -->

@if (Auth::check())
<!-- Comments Form -->
<div class="well">
    <h4>Leave a Comment:</h4>

      {!! Form::open ( ['method' => 'POST',	
                        'action' => ['PostCommentsController@store'] ])    !!}	
                  
        <input type="hidden" name="post_id" value="{{$post->id}}">

        <div class="form-group">
          <textarea name="body" class="form-control" rows="3"></textarea>
        </div>

        <div class="form-group">	
          <button class="btn btn-primary" type="submit">Comment</button>	
        </div>	
        
      {!! Form::close() !!}
        
</div>

@endif

<hr>

{{-- @if (Session::has('reply_flash') )
    {{session('reply_flash')}}
@endif --}}

<!-- Posted Comments -->
@if (count($comments) > 0)

@foreach ($comments as $comment)

  <!-- Comment -->
  <div class="media">
    <a class="pull-left" href="#">
        <img height="64" class="media-object" src="{{$comment->photo}}" alt="">
    </a>
      <div class="media-body">
          <h4 class="media-heading">{{$comment->author}}
            <small>{{$comment->created_at->diffForHumans()}}</small>
          </h4>
          <p>{{$comment->body}}</p>
          
          @if (Auth::check())
            <div class="comment-reply-container">
                            
              <button class="toggle-reply btn btn-primary">Reply</button>
              
              <div class="comment-reply">
                {!! Form::open ( ['method' => 'POST',	
                                  'action' => ['CommentRepliesController@store'] ])    !!}
                                  
                      <input type="hidden" name="comment_id" value="{{$comment->id}}">

                      <div class="form-group">
                        <textarea name="body" rows="1" class="form-control"></textarea>
                      </div>
                      
                      <div class="form-group">	
                        <button class="btn btn-primary" type="submit">Reply</button>	
                      </div>	
                {!! Form::close() !!}
              </div>	
            </div>	

          @endif

            @if ( count($comment->replies) > 0 )

              @foreach ($comment->replies as $reply)

                @if ($reply->is_active == 1)
                  <!-- Nested Comment -->
                  <div class="media">
                      <a class="pull-left" href="#">
                          <img height="64" class="media-object" src="{{$comment->photo}}" alt="">
                      </a>
                      <div class="media-body">
                          <h4 class="media-heading">{{$reply->author}}
                              <small>{{$reply->created_at->diffForHumans()}}</small>
                          </h4>
                          <p>{{$reply->body}}</p>
                      </div>
                      @if (Auth::check())
                      <div class="comment-reply-container">
                        
                        <button class="toggle-reply btn btn-primary">Reply</button>
                        
                        <div class="comment-reply">
                              {!! Form::open ([ 'method' => 'POST',	
                                                'action' => ['CommentRepliesController@store'] ])    !!}

                                <div class="form-group">
                                  <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                  <textarea name="body" rows="1" class="form-control"></textarea>
                                </div>
                                
                                <div class="form-group">	
                                  <button class="btn btn-primary" type="submit">Reply</button>	
                                </div>	
                              
                              {!! Form::close() !!}
                        </div>
                      </div>
                      @endif
                  </div>
                <!-- End Nested Comment -->
                @endif

              @endforeach

            @endif

      </div> 
  </div>

@endforeach

@endif

@endsection

@section('scripts')
    <script>
      $(".comment-reply-container .toggle-reply").click(function () {
        $(this).next().slideToggle("slow");
      })
    </script>
@endsection