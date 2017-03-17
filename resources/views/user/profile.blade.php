@extends('layouts.app')

@section('content')
<div class="container">
	<h3 class="text-center">
    Chào, {{ Auth::user()->username }}.
    </h3>
</div>
@endsection
