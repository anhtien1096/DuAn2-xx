@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="text-center">
            <h2>
                <div class="content">
                    404 Not Found. Trang này không tồn tại hoặc đã bị xóa!
                </div>
            </h2>
            <div class="ui stacked segment">

                <a class="btn btn-danger" onclick="history.back()">
                    <i class="fa fa-arrow-left"></i>
                    Trở lại
                </a>
                <a class="btn btn-danger" href="{{ url('/') }}">
                    <i class="fa fa-home"></i>
                    Về trang chủ
                </a>
            </div>
        </div>
    </div>
</div>

@endsection


