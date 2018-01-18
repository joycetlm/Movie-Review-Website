@extends('layouts.app')
@section('title', '| Film Forum Home Page')
@section('content')
<?php use App\Forum;
//use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Request; 
//use Auth;
$reviews = DB::table('reviews')->where('email',Auth::user()->email)->get();
$reviews = json_decode($reviews,true); 
$comments = DB::table('comments')->where('email',Auth::user()->email)->get();
//$users = DB::table('users')->where('email',$forums->email)->get();
$comments = json_decode($comments,true); 
$username = Auth::user()->name;
$email = Auth::user()->email;
?>
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1>{{$username}} 's Profile</h1>
                    <h3>Email: {{$email}}</h3>
                </div>
            </div>
        </div> <!-- end of header .row -->
        <h3>Review History</h3>
        <br />
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
        <hr>
        <h3>Comment History</h3>
        <div class="featurette" id="about">
            <div class="row">
                @foreach ($comments as $comment)
                    <div class="col-md-8">
                        <div class="well">
                            <div class="media">        
                                <div class="col-md-6">
                                    <div class="media-body">
                                        <h3 class="media-heading"><strong>{{ $comment['content'] }}</strong></h3>
                                        <p class="text-right">Created At: {{ date('M j, Y', strtotime($comment['created_at'])) }}</p>
                                                  
                                    </div> <!-- media body -->
                                </div> <!-- col-md-6 -->
                            </div> <!-- media -->
                        </div> <!-- well -->
                    </div> <!-- col-md-8 -->

                @endforeach
        </div>

    </div>

</div> <!-- container -->

@endsection