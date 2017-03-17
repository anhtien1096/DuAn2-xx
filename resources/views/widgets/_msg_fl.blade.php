@if(Session::has('msg_success'))
<section class="content_msg">
    <div class="alert alert-success">
        <a class="close" data-dismiss="alert">×</a>
        <strong>Thành công!</strong> {!!Session::get('msg_success')!!}
    </div>
</section>
@endif

@if(Session::has('msg_error'))
<section class="content_msg">
    <div class="alert alert-danger">
        <a class="close" data-dismiss="alert">×</a>
        <strong>Lỗi CMNR!</strong> {!!Session::get('msg_error')!!}
    </div>
</section>
@endif