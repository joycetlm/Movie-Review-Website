@extends('layouts.app')
@section('title', '| Create New Forum')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Forum</h1>
            <hr>
            {!! Form::open(array('route' => 'forums.store'))!!}
               {{ Form::label('filmname', 'Filmname:')}}
               {{ Form::text('filmname', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255'))}}
               {{ Form::label('filmlink', 'Filmlink:')}}
               {{ Form::text('filmlink', null, array('class' => 'form-control', 'required' => ''))}}
               {{ Form::label('profile', 'Profile:')}}
               {{ Form::textarea('profile', null, array('class' => 'form-control', 'required' => ''))}}
               {{ Form::label('tags', 'Tag:')}}
               {{ Form::select('tags', ['other'=>'other', 'action'=>'action', 'comedy'=>'comedy', 'romance'=>'romance', 'cartoon'=>'cartoon'], array('class' => 'form-control', 'style' => 'margin-top:20px;')) }}
               {{ Form::submit('Submit New Forum', array('class'=> 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px;'))}}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
