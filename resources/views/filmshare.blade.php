@extends('layouts.app')
@section('title', '| Film Forum Home Page')
@section('content')
<?php use Illuminate\Support\Facades\DB;$i=0; $forums = DB::table('forums')->get(); $forums = json_decode($forums,true);?>
<div class="container">
        <div class="row">
            <div class="col-md-12">
            {!! Form::open(['method'=>'GET','route' => ['reviews.index'],'class'=>'navbar-form ','role'=>'search'])!!}
                    <div class = "input-group review-search-form">
                    <input type="text" name="search" class="form-control" placeholder="Search For Reviews">
                    <!--{!! Form::submit('Search', ['class' => 'btn btn-primary   btn-sm']) !!} -->               
                    </div>  
            {!! Form::close()!!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                  <h1>Welcome to Film Forum!</h1>
                  <p class="lead">Find the films you are interested in and share ideas with others!</p>
                </div>
            </div>
        </div> <!-- end of header .row -->
        <div class="featurette" id="about">
            <div class="row">
                @foreach ($forums as $forum)
                    <div class="col-md-8">
                        <div class="well">
                            <div class="media">        
                                <div class="col-md-6">
                                    <div class="media-body">
                                        <h3 class="media-heading"><strong>{!! $forum['filmname'] !!}</strong></h3>
                                        <p class="text-right">Tag: {{ $forum['tags'] }}</p>
                                        <p>{{ substr(strip_tags($forum['profile']), 0, 300) }}{{ strlen(strip_tags($forum['profile'])) > 300 ? "..." : "" }}</p>
                                        <a href="{{ route('forums.show', $forum['id']) }}" class="btn btn-primary">Read More</a>           
                                    </div> <!-- media body -->
                                </div> <!-- col-md-6 -->
                            </div> <!-- media -->
                        </div> <!-- well -->
                    </div> <!-- col-md-8 -->

                @endforeach


        </div>

    </div> <!-- feaurette -->

</div> <!-- container -->

@endsection