<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="token" content="{{csrf_token()}}">
    @yield('meta')

    <title>Admin | @yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/skin-red.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/sweetalert.css')}}">
    <script type="text/javascript">
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token()
        ]) !!}
    </script>
    @yield('styles')
</head>
<body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <a href="{{asset('admin')}}" class="logo">
                <span class="logo-mini"><b>N</b>2N</span>
                <span class="logo-lg"><b>Admin</b>N2N</span>
            </a>

            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
              
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('uploads/img/avatar.png')}}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ Auth::user()->fullname }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="{{asset('uploads/img/avatar.png')}}" class="img-circle" alt="User Image">

                                <p>
                                    {{ Auth::user()->fullname }}
                                    <small>{{ Auth::user()->username }}</small>
                                </p>
                            </li>
                      
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ asset('user') }}" class="btn btn-default btn-flat">Trang cá nhân</a>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Đăng xuất
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">

        <section class="sidebar">

            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('uploads/img/avatar.png')}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->fullname }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <ul class="sidebar-menu">
                <li class="header">MENU CHÍNH</li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-link"></i> <span>Bài viết</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{!! route('posts.index') !!}">@lang('admin.post.index')</a></li>
                        <li><a href="{!! route('posts.create') !!}">@lang('admin.post.create')</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="javascript:;">
                        <i class="fa fa-link"></i> <span>Chuyên mục</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{!! route('categories.index') !!}">@lang('admin.cate.index')</a></li>
                        <li><a href="{!! route('categories.create') !!}">@lang('admin.cate.create')</a></li>
                    </ul>
                </li>
                <li class=""><a href="{{asset('admin/users')}}"><i class="fa fa-link"></i> <span>Thành viên</span></a></li>
                <li class=""><a href="#"><i class="fa fa-link"></i> <span>Bình luận</span></a></li>
                <li class="treeview">
                    <a href="javascript:;">
                        <i class="fa fa-link"></i> <span>@lang('admin.pages.title')</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{!! route('pages.index') !!}">@lang('admin.pages.index')</a></li>
                        <li><a href="{!! route('pages.create') !!}">@lang('admin.pages.create')</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-link"></i> <span>Công cụ</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#">Quảng cáo</a></li>
                        <li><a href="#"></a></li>
                    </ul>
                </li>
            </ul>
        </section>
    </aside>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                @yield('title')
            </h1>
        </section>

        <section class="content">

         @include('widgets/_msg_fl')

        @yield('content')

        </section>
    </div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
          Anything you want
        </div>
            <strong>Copyright &copy; 2016 <a href="#">N2 Company</a>.</strong> PT11111-WEB - Dự Án 2 - FPOLY 11.1.
    </footer>

<script src="{{asset('js/jquery-1.11.3.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/app.min.js')}}"></script>
<script src="{{asset('js/sweetalert.min.js')}}"></script>
@yield('scripts')
{!! Html::script('js/custom.js') !!}

</body>
</html>