@extends('user/app')

@section('bg-img', asset('user/img/post-bg.jpg') )
@section('title', $post->title)
@section('sub-heading', $post->subtitle)

@section('main-content')
<!-- Post Content -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.12&appId=356223664894518&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<article>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
          <small>Created at: {{ $post->created_at->diffForHumans() }}</small>
          @foreach ($post->categories as $category)
            <small class="pull-right" style="margin-right: 20px;">
              {{ $category->name }}
            </small>      
          @endforeach
            
        {!! htmlspecialchars_decode($post->body) !!}
            <hr>
        {{--  Tag clouds  --}}
        <h3>Tag Clouds</h3>
        @foreach ($post->tags as $tag)
          <small class="pull-left" style="margin-right: 20px; border-radius:5px; border:1px solid gray; padding: 3px;background:gray; color:#fff;">
            {{ $tag->name }}
          </small>      
        @endforeach
      </div>
      <hr>
      <div class=" col-lg-8 col-md-10 mx-auto" style="margin-top:100px;">
        <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="10"></div>
      </div>
    </div>
  </div>
</article>

<hr>
@endsection