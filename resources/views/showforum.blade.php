@extends('layouts.app')
@section('title', '| Create New Forum')
@section('content')
<?php use App\Forum;
//use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Request;
$forums = Forum::find($id); 
$reviews = DB::table('reviews')->where('forum_id',$id)->get();
$reviews = json_decode($reviews,true); 
$email = DB::table('forums')->where('id',$id)->value('email');
//$users = DB::table('users')->where('email',$forums->email)->get();
//$users = json_decode($users,true); 
$creator = DB::table('users')->where('email',$email)->value('name');
$emailcheck = '';
if(Auth::check())
            $emailcheck =  Auth::user()->email

?>

<div class="container"> 
  <div class="row">   
    <div class="col-md-7">
      <h1>Film Name: {{$forums->filmname}}</h1>
      <h3>Film Profile:</h3> 
      <p> {{$forums->profile}}</p>
    </div> 
    <div class="col-md-5">
      <div class="well">
        <dl class="dl-horizontal">
          <label>Url:</label>
          <p><a href="{{$forums->filmlink}}" target="_blank">{{$forums->filmlink}}</a></p>
        </dl>

        <dl class="dl-horizontal">
          <label>Tag:</label>
          <p>{{ $forums->tags }}</p>
        </dl>

        <dl class="dl-horizontal">          
          <p><strong>{{ $creator }}</strong> &nbsp created at &nbsp{{ date('M j, Y h:ia', strtotime($forums->created_at)) }}</p>
        </dl>

        <dl class="dl-horizontal">
          <label>Last Updated:</label>
          <p>{{ date('M j, Y h:ia', strtotime($forums->updated_at)) }}</p>
        </dl>
        
        
        @if($email == $emailcheck)
        <div class="row">
          <div class="col-sm-3">
            {!! Html::linkRoute('forums.edit', 'Edit', array($forums->id), array('class' => 'btn btn-primary btn-block')) !!}
          </div>
          <div class="col-sm-3">
            {!! Form::open(['route' => ['forums.destroy', $forums->id], 'method' => 'DELETE']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

            {!! Form::close() !!}
          </div>
          </div>
        @endif
        <br />
        @if(Auth::check())
          <div class="row">
          <div class="col-sm-5">
           <!-- {!! Form::open(['route' => ['reviews.create']]) !!}

            {!! Form::submit('Create New Review', ['class' => 'btn btn-success btn-block']) !!}

            {!! Form::hidden('id',$forums['id'])!!}

            {!! Form::close() !!}-->
            <a href="{{ route('reviews.create') }}" class="btn btn-success">Create New Review</a>
          </div>
          </div>
        
        @endif

      </div>
    
</div>   
  </div> 

  <div class="featurette" id="about">
            <div class="row">
                @foreach ($reviews as $review)
                    <div class="col-md-8">
                        <div class="well">
                            <div class="media">        
                                <div class="col-md-6">
                                    <div class="media-body">
                                        <h3 class="media-heading"><strong>{{ $review['title'] }}</strong></h3>
                                        <p class="text-right">Created At: {{ date('M j, Y', strtotime($review['created_at'])) }}</p>
                                        <p>{{ substr(strip_tags($review['content']), 0, 50) }}{{ strlen(strip_tags($review['content'])) > 50 ? "..." : "" }}</p>
                                        <a href="{{ route('reviews.show', $review['id']) }}" class="btn btn-primary">Read More</a>           
                                    </div> <!-- media body -->
                                </div> <!-- col-md-6 -->
                            </div> <!-- media -->
                        </div> <!-- well -->
                    </div> <!-- col-md-8 -->

                @endforeach


        </div>

    </div>

</div>

@endsection
