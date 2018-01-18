@extends('layouts.app')
@section('title', '| Edit Forum')
@section('content')
<div class="container">
    <div class="row">
        {!! Form::model($forums, ['route' => ['forums.update', $forums->id], 'method' => 'PUT']) !!}
        <div class="col-md-8 ">
            <h1>Create New Forum</h1>
            <hr>
            {!! Form::open(array('route' => 'forums.store'))!!}
               {{ Form::label('filmname', 'Filmname:')}}
               {{ Form::text('filmname',$forums->filmname , ["class" => 'form-control'])}}
               {{ Form::label('filmlink', 'Filmlink:')}}
               {{ Form::text('filmlink', $forums->filmlink, ["class" => 'form-control'])}}
               {{ Form::label('profile', 'Profile:')}}
               {{ Form::textarea('profile', $forums->profile, ["class" => 'form-control'])}}
               {{ Form::label('tags', 'Tag:')}}
               {{ Form::select('tags', ['other'=>'other', 'action'=>'action', 'comedy'=>'comedy', 'romance'=>'romance', 'cartoon'=>'cartoon'], ["class" => 'form-control']) }}
            
           
        </div>
        <div class="col-md-4">
            <div class="well">
              <dl class="dl-horizontal">
          <dt>Created At:</dt>
          <dd>{{ date('M j, Y h:ia', strtotime($forums->created_at)) }}</dd>
        </dl>

        <dl class="dl-horizontal">
          <dt>Last Updated:</dt>
          <dd>{{ date('M j, Y h:ia', strtotime($forums->updated_at)) }}</dd>
        </dl>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            {!! Html::linkRoute('forums.show', 'Cancel', array($forums->id), array('class' => 'btn btn-danger btn-block')) !!}
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