@extends('user/app')

@section('bg-img', asset('user/img/jakub-kriz-120818-unsplash.jpg'))
@section('head')

@endsection
@section('title','Welcome,')
@section('sub-heading', 'to Blog ' . Auth::user()->name . '!' )
@section('credits', 'Photo by Jakub Kriz on Unsplash')



