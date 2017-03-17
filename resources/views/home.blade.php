@extends('layouts.app')

@section('content')

<div class="news-scroll">

@include('widgets/_header_news_list') <!-- List tin tức mới -->

<div class="container">
    <div class="bground">
        <div class="main">
        @include('widgets/_slide_news') <!-- Slide mews -->

        @include('widgets/_category_get_posts') 

        @include('widgets/_list_posts') 

        </div>

        <div class="sidebar">
        @include('widgets/_sidebar') <!-- Slide mews -->
        </div>
        
    </div>
</div>

@endsection
