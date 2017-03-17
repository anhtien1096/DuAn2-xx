@extends('layouts.admin')

@section('title', trans('admin.cate.index'))

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
            <h3 class="box-title">@lang('admin.cate.index')</h3>
        </div>
        <div class="box-body">
            <table class="table table-striped" id="list">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('admin.cate.name')</th>
                        <th>@lang('admin.cate.slug')</th>
                        <th>@lang('admin.cate.parent')</th>
                        <th>@lang('admin.cate.updatedat')</th>
                        <th>@lang('admin.cate.tool')</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i = 0)
                    @foreach($categories as $category)
                        @php($i++)
                        <tr>
                            <td>{!! $i !!}</td>
                            <td>{!! link_to_route('categories.edit', $category->name, ['category' => $category->id]) !!}</td>
                            <td>{!! $category->slug !!}</td>
                            <td>
                                {!! $category->parent !!}
                            </td>
                            <td>{!! $category->updated_at !!}</td>
                            <td>
                                {!! link_to_route('categories.edit', 'Sửa', ['category' => $category->id], ['class' => 'btn btn-xs btn-info']) !!}
                                {!! link_to_route('categories.destroy', 'Xóa', ['category' => $category->id], ['class' => 'delete btn btn-xs btn-danger']) !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection