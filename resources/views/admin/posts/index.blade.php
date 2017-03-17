@extends('layouts.admin')

@section('title', trans('admin.post.index'))

@section('styles')
    {!! Html::style('plugins/datatables/dataTables.bootstrap.css') !!}
@endsection

@section('scripts')
    {!! Html::script('plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('plugins/datatables/dataTables.bootstrap.min.js') !!}
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">@lang('admin.post.index')</h3>
        </div>
        <div class="box-body">
            <table class="table table-striped" id="list">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('admin.post.thumbnail')</th>
                        <th>@lang('admin.post.title')</th>
                        <th>@lang('admin.post.usercreated')</th>
                        <th>@lang('admin.post.userupdate')</th>
                        <th>@lang('admin.post.categories')</th>
                        <th>@lang('admin.post.time')</th>
                        <th>@lang('admin.post.tool')</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i = 0)
                    @foreach($posts as $post)
                        @php($i++)
                        <tr>
                            <td>{!! $i !!}</td>
                            <td><img src="{!! $post->thumbnail !!}" width="50px"></td>
                            <td>{!! link_to_route('posts.edit', $post->title, ['posts' => $post->id]) !!}</td>
                            <td>{!! $post->user_created !!}</td>
                            <td>{!! $post->user_update !!}</td>
                            <td>{!! $post->cate_id !!}</td>
                            <td>{!! $post->updated_at !!}</td>
                            <td>
                                {!! link_to_route('posts.edit', 'Sửa', ['posts' => $post->id], ['class' => 'btn btn-xs btn-info']) !!}
                                {!! link_to_route('posts.destroy', 'Xóa', ['posts' => $post->id], ['class' => 'delete btn btn-xs btn-danger']) !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection