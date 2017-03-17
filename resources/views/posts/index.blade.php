@extends('layouts.app')

@section('content')

<div class="news-scroll">

@include('widgets/_header_news_list') <!-- List tin tức mới -->

<div class="container">
    <div class="bground">
        <div class="main">

        @include('widgets/_post') 


        </div>

        <div class="sidebar">
        @include('widgets/_sidebar') <!-- Slide mews -->
        </div>
        
    </div>
</div>

@endsection
