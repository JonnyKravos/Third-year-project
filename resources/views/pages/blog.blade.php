@extends('layouts/app')

@section('title', '| Blog')

@section('content')    
      <div class="row">
        <div class="col-md-12">
          <div class="jumbotron">
            <h1>Test forum</h1>
            <p class="lead">Testing forum for implementation for papers</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">popular post</a></p>
          </div>
        </div>
      </div><!-- End of row -->

      <div class="row">
        <div class="col-md-8">

          @foreach($forumposts as $forumpost)

            <div class="post">
              <h3>{{ $forumpost->title}}</h3>
              <p>{{ substr($forumpost->body, 0, 199)}}{{ strlen($forumpost->body) > 200 ? "..." : "" }}</p>
              <a href="#" class="btn btn-primary">Read more</a>
            </div>

            <hr>

          @endforeach

        </div>

        <div class="col-md-3 col-md-offset-1">
          <h2>Sidebar</h2>
        </div>
      </div>
@endsection