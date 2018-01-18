@extends('layouts.app')
@section('title', '| Create New Forum')
@section('content')
<div class="container"> 
<h1>Search Results:</h1>
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
