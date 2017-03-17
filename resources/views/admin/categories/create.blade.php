@extends('layouts.admin')

@section('title', trans('admin.cate.index'))

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">@lang('admin.cate.create')</h3>
        </div>
        <div class="box-body">
            {!! Form::model($category, ['method' => is_active('categories.create') ? 'POST' : 'PUT', 'autocomplete' => 'off',
                                            'route' => is_active('categories.create') ? 'categories.store': ['categories.update', $category->id]]) !!}
                <div class="col-md-8">
                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                        {!! Form::label('name', trans('admin.cate.name')) !!}
                        {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => trans('admin.cate.name')]) !!}
                        @if($errors->has('name'))
                            <span class="help-block">{!! $errors->first('name') !!}</span>
                        @endif
                    </div>
                    <div class="form-group {!! $errors->has('slug') ? 'has-error' : '' !!}">
                        {!! Form::label('slug', trans('admin.cate.slug')) !!}
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon3">{!! config('app.url') !!}/</span>
                            {!! Form::text('slug', old('slug'), ['class' => 'form-control', 'placeholder' => trans('admin.cate.slug')]) !!}
                        </div>
                        @if($errors->has('slug'))
                            <span class="help-block">{!! $errors->first('slug') !!}</span>
                        @endif
                    </div>
                    <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
                        {!! Form::label('description', trans('admin.cate.description')) !!}
                        {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'placeholder' => trans('admin.cate.description')]) !!}
                        @if($errors->has('description'))
                            <span class="help-block">{!! $errors->first('description') !!}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group {!! $errors->has('status') ? 'has-error' : '' !!}">
                        {!! Form::label('status', trans('admin.cate.status')) !!}
                        {!! Form::select('status', ['Nháp', 'Đăng'], 1 ,['class' => 'form-control']) !!}
                        @if($errors->has('status'))
                            <span class="help-block">{!! $errors->first('status') !!}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::label('add_to_menu', trans('admin.cate.add_to_menu')) !!}
                        {!! Form::number('add_to_menu', old('add_to_menu'),['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group {!! $errors->has('order') ? 'has-error' : '' !!}">
                        {!! Form::label('order', trans('admin.cate.order')) !!}
                        {!! Form::number('order', old('order'), ['class' => 'form-control', 'placeholder' => trans('admin.cate.order')]) !!}
                        @if($errors->has('order'))
                            <span class="help-block">{!! $errors->first('order') !!}</span>
                        @endif
                    </div>
                    <div class="form-group {!! $errors->has('parent') ? 'has-error' : '' !!}">
                        {!! Form::label('parent', trans('admin.cate.parent')) !!}
                        {!! Form::select('parent', $categories, null ,['class' => 'form-control', 'placeholder' => 'Trống']) !!}
                        @if($errors->has('parent'))
                            <span class="help-block">{!! $errors->first('parent') !!}</span>
                        @endif
                    </div>
                    <div class="form-group pull-right">
                        {!! Form::submit(trans('admin.cate.submit'), ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection