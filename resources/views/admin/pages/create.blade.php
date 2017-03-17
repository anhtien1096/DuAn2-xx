@extends('layouts.admin')

@section('title')Tạo Trang @endsection

@section('content')
<div class="content">
	<div class="box box-danger">
	    <div class="box-header with-border">
	      	<h3 class="box-title">@lang('admin.pages.title')</h3>
	    </div>
	    <div class="box-body">
        {!! Form::model($pages, ['method' => is_active('pages.create') ? 'POST' : 'PUT', 'autocomplete' => 'off', 'route' => is_active('pages.create') ? 'pages.store': ['pages.update', $pages->id]]) !!}
            <div class="col-md-8">
                <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                    {!! Form::label('name', trans('admin.pages.name')) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => trans('admin.pages.name')]) !!}
                    @if($errors->has('name'))
                        <span class="help-block">{!! $errors->first('name') !!}</span>
                    @endif
                </div>
                <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
                    {!! Form::label('description', trans('admin.pages.description')) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'id' => 'editor1', 'placeholder' => trans('admin.pages.description')]) !!}
                    @if($errors->has('description'))
                        <span class="help-block">{!! $errors->first('description') !!}</span>
                    @endif
                </div>
                <div class="form-group {!! $errors->has('content') ? 'has-error' : '' !!}">
                    {!! Form::label('content', trans('admin.pages.content')) !!}
                    {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'id' => 'editor2', 'content' => trans('admin.pages.content')]) !!}
                    @if($errors->has('content'))
                        <span class="help-block">{!! $errors->first('content') !!}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group pull-right">
                    {!! Form::submit(trans('admin.pages.submit'), ['class' => 'btn btn-lg btn-primary']) !!}
                </div>
            </div>    
        {!! Form::close() !!}
    </div>
</div>
@endsection

@section('scripts')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
<script>
    $('#editor1').ckeditor();
    $('#editor2').ckeditor();
</script>
@endsection