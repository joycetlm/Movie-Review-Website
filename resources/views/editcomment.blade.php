@extends('layouts.app')
@section('title', '| Edit Comment')
@section('content')
<div class="container">
    <div class="row">
        {!! Form::model($comments, ['route' => ['comments.update', $comments->id], 'method' => 'PUT']) !!}
        <div class="col-md-8 ">
            <h1>Edit Comment</h1>
            <hr>
            {!! Form::open(array('route' => 'comments.store'))!!}
               {{ Form::label('content', 'Content:')}}
               {{ Form::hidden('review_id',$comments->review_id)}}
               {{ Form::textarea('content', $comments->content, ["class" => 'form-control'])}}
            
           
        </div>
        <div class="col-md-4">
            <div class="well">
              <dl class="dl-horizontal">
          <dt>Created At:</dt>
          <dd>{{ date('M j, Y h:ia', strtotime($comments->created_at)) }}</dd>
        </dl>

        <dl class="dl-horizontal">
          <dt>Last Updated:</dt>
          <dd>{{ date('M j, Y h:ia', strtotime($comments->updated_at)) }}</dd>
        </dl>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            {!! Html::linkRoute('reviews.show', 'Cancel', array($comments->review_id), array('class' => 'btn btn-danger btn-block')) !!}
          </div>
          <div class="col-sm-6">
            {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
          </div>
        </div>

      </div>
    </div>
     {!! Form::close() !!}
    </div>
</div>
@endsection