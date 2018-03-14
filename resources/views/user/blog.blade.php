@extends('user/app')

@section('bg-img', asset('user/img/home-bg.jpg') )
@section('title', 'Blog')
@section('sub-heading', 'Blog sub-heading')
@section('head')
  <style>
    .fa-thumbs-up:hover {
      color: red;
    }
  </style>
@endsection
@section('main-content')
<!-- Main Content -->
<div class="container">
  <div class="row" id="app">
    <div class="col-lg-8 col-md-10 mx-auto">
      @foreach ($posts as $post)
            
        <div class="post-preview">
          <a href="{{ route('post', $post->slug) }}">
            <h2 class="post-title">
              {{ $post->title }}
            </h2>
            <h3 class="post-subtitle">
                {{ $post->subtitle }}
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
            {{ $post->created_at->diffForHumans() }}
            <a href="">
              <small>0</small>
              <i class="fa fa-thumbs-up" aria-hidden="true"></i>
            </a>
          </p>
          </div>
          <hr>
      @endforeach
      
      <!-- Pager -->
      <ul class="pager" style="list-style-type: none;">
        <li class="next">
          {{ $posts->links() }}
        </li>
      </ul>
    </div>
  </div>
</div>

<hr>
@endsection
