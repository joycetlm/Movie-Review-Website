@extends('layouts.app')
@section('title', '| Edit Review')
@section('content')
<div class="container">
    <div class="row">
        {!! Form::model($reviews, ['route' => ['reviews.update', $reviews->id], 'method' => 'PUT']) !!}
        <div class="col-md-8 ">
            <h1>Edit Review</h1>
            <hr>
            {!! Form::open(array('route' => 'reviews.store'))!!}
               {{ Form::label('title', 'Title:')}}
               {{ Form::text('title',$reviews->title , ["class" => 'form-control'])}}
               {{ Form::label('content', 'Content:')}}
               {{ Form::hidden('forum_id',$reviews->forum_id)}}
               {{ Form::textarea('content', $reviews->content, ["class" => 'form-control'])}}
            
           
        </div>
        <div class="col-md-4">
            <div class="well">
              <dl class="dl-horizontal">
          <dt>Created At:</dt>
          <dd>{{ date('M j, Y h:ia', strtotime($reviews->created_at)) }}</dd>
        </dl>

        <dl class="dl-horizontal">
          <dt>Last Updated:</dt>
          <dd>{{ date('M j, Y h:ia', strtotime($reviews->updated_at)) }}</dd>
        </dl>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            {!! Html::linkRoute('reviews.show', 'Cancel', array($reviews->id), array('class' => 'btn btn-danger btn-block')) !!}
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