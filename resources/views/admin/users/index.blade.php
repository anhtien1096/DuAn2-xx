@extends('layouts.admin')

@section('title', trans('admin.user.index'))

@section('styles')
    {!! Html::style('plugins/datatables/dataTables.bootstrap.css') !!}
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">@lang('admin.user.index')</h3>
        </div>
        <div class="box-body">
            <table class="table table-striped" id="list">
                    <thead>
                    <tr>
                      	<th style="width: 10px">#</th>
                      	<th>@lang('admin.user.name')</th>
                      	<th>@lang('admin.user.username')</th>
                      	<th>@lang('admin.user.email')</th>
                      	<th>@lang('admin.user.role')</th>
                      	<th>@lang('admin.user.created')</th>
                      	<th>@lang('admin.user.tool')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($data as $item)
                    <tr>
                      	<td>{{ $i++ }}.</td>
                      	<td>{{ $item->fullname }}</td>
                      	<td>{{ $item->username }}</td>
                      	<td>{{ $item->email }}</td>
                      	<td>@if($item->role == 2)<span class="badge bg-red">@lang('admin.user.admin')</span>@else<span class="badge bg-blue">@lang('admin.user.user')</span>@endif</td>
                      	<td>{{ $item->created_at }}</td>
                      	<td>
                      		@if($item->role == 1)
                          {!! link_to_route('users.show', trans('admin.user.setadmin'), ['users' => $item->id], ['class' => 'yesok btn btn-xs btn-info']) !!}
                          {!! link_to_route('users.destroy', trans('admin.user.deleted'), ['users' => $item->id], ['class' => 'delete btn btn-xs btn-danger']) !!}
                      		@endif
                      	</td>
                    </tr>
                    @endforeach
              	</tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
{!! Html::script('plugins/datatables/jquery.dataTables.min.js') !!}
{!! Html::script('plugins/datatables/dataTables.bootstrap.min.js') !!}
@endsection