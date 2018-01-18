@extends('layouts.app')
@section('title', '| Create New Forum')
@section('content')

<?php 
use Illuminate\Support\Facades\DB;
use App\Comment;
use App\Review;
use Illuminate\Http\Request;
$reviews = Review::find($id);
//$reviews = DB::table('reviews')->where('id',$id)->get();$reviews = json_decode($reviews,true);
$filmname = DB::table('forums')->where('id',$reviews->forum_id)->value('filmname');
$comments = DB::table('comments')->where('review_id',$id)->get();$comments = json_decode($comments,true);
$remail = DB::table('reviews')->where('id',$id)->value('email');
$rcreator = DB::table('users')->where('email',$remail)->value('name');
$emailcheck = '';
if(Auth::check())
            $emailcheck =  Auth::user()->email
?>
<div class="container"> 
  <div class="row">   
    <div class="col-md-12">
    <div class="col-md-7">
      <h1> <strong>{{$reviews->title}}</strong></h1>
      <h3>{{$reviews->content}}</h3> 
    </div>
    <div class="col-md-5">
      <div class="well">
        <dl class="dl-horizontal">
          <p><strong>Review For :　{{ $filmname }}</strong></p>
        </dl>
        <dl class="dl-horizontal">
          <p><strong>{{ $rcreator }}</strong> &nbsp created at &nbsp{{ date('M j, Y h:ia', strtotime($reviews['created_at'])) }}</p>
        </dl>

        <dl class="dl-horizontal">
          <label>Last Updated:</label>
          <p>{{ date('M j, Y h:ia', strtotime($reviews['updated_at'])) }}</p>
        </dl>
        <hr>
        @if($remail == $emailcheck)
        <div class="row">
          <div class="col-sm-4">
            {!! Html::linkRoute('reviews.edit', 'Edit', array($reviews['id']), array('class' => 'btn btn-primary btn-block')) !!}
          </div>
          <div class="col-sm-4">
            {!! Form::open(['route' => ['reviews.destroy', $reviews->id], 'method' => 'DELETE']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

            {!! Form::close() !!}

          </div>
          
        </div>
        @endif

      </div>
      </div>
</div>   
  </div> 
<hr>
@if(Auth::check())
  <div class="row">     

            {!! Form::open(array('route' =>['comments.store'] ))!!}
                <div class="col-md-8 ">
               {{ Form::text('content', null, array('class' => 'form-control', 'required' => ''))}}
               </div>

               <div class="col-md-3 ">
               {{ Form::hidden('id',$reviews['id'])}}
               {{ Form::submit('Create New Comment', array('class'=> 'btn btn-success btn-block', 'style' => 'margin-top:20px;'))}}
               </div>
            {!! Form::close() !!}
    </div>
  @endif

<hr>
  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <th>#</th>
          <th>Creator</th>
          <th>Content</th>
          <th>Created At</th>
          <th></th>
        </thead>

        <tbody>
          
          @foreach ($comments as $comment)
          <?php
            $email = $comment['email']; $creator = DB::table('users')->where('email',$email)->value('name');
          ?>  
            <tr>
              <th>{{ $comment['id'] }}</th>
              <td>{{ $creator }}</td>
              <td>{{ $comment['content'] }}</td>
              <td>{{ date('M j, Y', strtotime($comment['created_at'])) }}</td>
              @if($email == $emailcheck)
              <td><div class="row">
          <div class="col-sm-3">
            {!! Html::linkRoute('comments.edit', 'Edit', array($comment['id']), array('class' => 'btn btn-primary btn-block')) !!}
          </div>
          <div class="col-sm-3">
            {!! Form::open(['route' => ['comments.destroy', $comment['id']], 'method' => 'DELETE']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

            {!! Form::close() !!}

          </div>
          
        </div></td>@endif


            </tr>

          @endforeach

        </tbody>
      </table>

      
    </div>
  </div>
  

</div>

@endsection
