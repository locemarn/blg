@extends('user/app')

@section('bg-img',asset('user/img/home-bg.jpg'))
@section('title','Bitfumes Blog')
@section('sub-heading','Learn Together and Grow Together')
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
	<style>
		#count:hover{
			color: rgb(255, 0, 0);
			text-decoration: none;
		}
	</style>
@endsection
@section('main-content')
	<!-- Main Content -->
	<div class="container">
	    <div class="row" id="app">
	        <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
	            <posts 
	            v-for='value in blog'
	            :title=value.title
	            :subtitle=value.subtitle
	            :created_at=value.created_at
	            :key=value.index
	            :post-id = value.id
	            login = "{{ Auth::check() }}"
	            :likes = value.likes.length
	            :slug = value.slug
	            ></posts>
	            <!-- Pager -->
	            <ul class="pager">
	                <li class="next">
	                	{{ $posts->links() }}
	                </li>
	            </ul>
	        </div>
	    </div>
	</div>

	<hr>
@endsection
@section('footer')
	<script src="{{ asset('js/app.js') }}"></script>
@endsection