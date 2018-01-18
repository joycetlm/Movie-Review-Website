@extends('layouts.app')
@section('title', '| Create New Review')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Review</h1>
            <hr>
            {!! Form::open(array('route' => 'reviews.store'))!!}
               {{ Form::label('title', 'Title:')}}
               {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255'))}}
               {{ Form::label('content', 'Content:')}}
               {{ Form::hidden('forum_id',$forum_id)}}
               {{ Form::textarea('content', null, array('class' => 'form-control', 'required' => ''))}}
               {{ Form::submit('Submit New Review', array('class'=> 'btn btn-success btn-block', 'style' => 'margin-top:20px;'))}}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection


