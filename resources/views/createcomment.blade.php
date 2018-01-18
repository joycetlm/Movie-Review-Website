@extends('layouts.app')
@section('title', '| Create New Comment')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Comment</h1>
            <hr>
            {!! Form::open(array('route' => 'comments.store'))!!}
               {{ Form::label('comment', 'Comment:')}}
               {{ Form::textarea('comment', null, array('class' => 'form-control', 'required' => ''))}}
               {{ Form::submit('Submit New Comment', array('class'=> 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px;'))}}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
