@extends('layouts.admin')

@section('title')Quản lý Trang @endsection

@section('content')
<div class="box box-danger">
    <div class="box-header">
        <h3 class="box-title">Danh sách trang</h3>
    </div>
    <div class="pull-right">
        {{ link_to_route('pages.create', 'Tạo Trang') }}
    </div>
    <div class="box-body no-padding">
        <table class="table table-striped">
            <tbody>
                <tr>
                  	<th style="width: 10px">#</th>
                    <th>Tên trang</th>
                  	<th>Đường dẫn</th>
                    <th>Ngày tạo</th>
                  	<th>Công cụ</th>
                </tr>
                <?php $i=1 ?>
                @foreach($data as $item)
                <tr>
                  	<td>{{ $i++ }}.</td>
                    <td>{!! link_to_route('pages.edit', $item->name, ['item' => $item->id]) !!}</td>
                    <td>{{ $item->slug }}</td>
                  	<td>{{ $item->created_at }}</td>
                    <td>
                        {!! link_to_route('pages.edit', 'Sửa', ['item' => $item->id], ['class' => 'btn btn-xs btn-xs btn-info']) !!}
                        {!! link_to_route('pages.destroy', 'Xóa', ['item' => $item->id], ['class' => 'delete btn btn-xs btn-danger']) !!}
                    </td>
                </tr>
                @endforeach
          	</tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var hidden = {

        linkSelector : "a#hidden",

        init: function() {
            $(this.linkSelector).on('click', {self:this}, this.handleClick);
        },

        handleClick: function(event) {
            event.preventDefault();

            var self = event.data.self;
            var link = $(this);

            swal({
                title: "Lưu trữ trang",
                text: "Trang sẽ không được công khai nhưng bạn vẫn có thể khôi phục trang?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Lữu trữ trang!",
                closeOnConfirm: true
            },
            function(isConfirm){
                if(isConfirm){
                    window.location = link.attr('href');
                }
                else{
                    swal("cancelled", "Category deletion Cancelled", "error");
                }
            });

        },
    };
    hidden.init();
</script><!--  Script Confirm Alert!!! -->
@endsection