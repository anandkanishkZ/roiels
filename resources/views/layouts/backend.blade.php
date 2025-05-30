<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="{{asset('images/configuration/' . $configuration->logo)}}" type="image/gif" sizes="16x16">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    @yield('css')

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('home')}}" class="nav-link"><i class="fa fa-home"></i> Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('frontend.home.index')}}" target="_blank" class="nav-link"><i class="fa fa-eye"></i> View Site</a>
            </li>
        </ul>

        <!-- SEARCH FORM -->

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->

            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fa fa-user"></i> Hi, {{\Illuminate\Support\Facades\Auth::user()->name}}
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header"> User : {{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                    <div class="dropdown-divider"></div>
                    <a href="{{route('backend.user.passwordForm')}}" class="dropdown-item">
                        <i class="fa fa-pen"></i> &nbsp; Update Password
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-item dropdown-footer"><i class="fa fa-sign-out-alt"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('home')}}" class="brand-link">
            <img src="{{asset('images/configuration/' . $configuration->logo)}}"
                 alt="{{$configuration->name}}"
                 class=""
                 style="opacity: .8">
{{--            <span class="brand-text font-weight-light">{{$configuration->name}}</span>--}}
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="#" class="d-block">Welcome, <strong>{{\Illuminate\Support\Facades\Auth::user()->name}}</strong></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fa fa-images"></i>
                            <p>
                                &nbsp; Slider Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('backend.slider.create')}}" class="nav-link">
                                    <i class="fa fa-plus"></i>
                                    <p> &nbsp;Create</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('backend.slider.index')}}" class="nav-link">
                                    <i class="fa fa-pen"></i>
                                    <p> &nbsp;Manage</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fa fa-list-alt"></i>
                            <p>
                                &nbsp; Category Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('backend.category.create')}}" class="nav-link">
                                    <i class="fa fa-plus"></i>
                                    <p> &nbsp;Create</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('backend.category.index')}}" class="nav-link">
                                    <i class="fa fa-pen"></i>
                                    <p> &nbsp;Manage</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fa fa-list-alt"></i>
                            <p>
                                &nbsp; SubCategory Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('backend.subcategory.create')}}" class="nav-link">
                                    <i class="fa fa-plus"></i>
                                    <p> &nbsp;Create</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('backend.subcategory.index')}}" class="nav-link">
                                    <i class="fa fa-pen"></i>
                                    <p> &nbsp;Manage</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fa fa-shopping-cart"></i>
                            <p>
                                &nbsp; Product Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('backend.product.create')}}" class="nav-link">
                                    <i class="fa fa-plus"></i>
                                    <p> &nbsp;Create</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('backend.product.index')}}" class="nav-link">
                                    <i class="fa fa-pen"></i>
                                    <p> &nbsp;Manage</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview" style="background-color: #282e33;">
                            <li class="nav-item">
                                <a href="{{route('backend.color.create')}}" class="nav-link">
                                    <i class="fa fa-circle"></i>
                                    <p> &nbsp;Color Management </p>
                                </a>
                            </li>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('backend.size.index')}}" class="nav-link">
                                    <i class="fa fa-square"></i>
                                    <p> &nbsp;Size Management</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fa fa-percent"></i>
                            <p>
                                &nbsp; Coupon Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('backend.coupon.create')}}" class="nav-link">
                                    <i class="fa fa-plus"></i>
                                    <p> &nbsp;Create</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('backend.coupon.index')}}" class="nav-link">
                                    <i class="fa fa-pen"></i>
                                    <p> &nbsp;Manage</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fa fa-luggage-cart"></i>
                            <p>
                                &nbsp; Order Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('backend.order.index')}}" class="nav-link">
                                    <i class="fa fa-pen"></i>
                                    <p> &nbsp;Manage</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview" style="background-color: #282e33;">
                            <li class="nav-item">
                                <a href="{{route('backend.status.create')}}" class="nav-link">
                                    <i class="fa fa-circle"></i>
                                    <p> &nbsp;Status Management </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fa fa-file"></i>
                            <p>
                                &nbsp; Page Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('backend.page.create')}}" class="nav-link">
                                    <i class="fa fa-plus"></i>
                                    <p> &nbsp;Create</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('backend.page.index')}}" class="nav-link">
                                    <i class="fa fa-pen"></i>
                                    <p> &nbsp;Manage</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fa fa-inbox"></i>
                            <p>
                                &nbsp; Brand Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('backend.brand.create')}}" class="nav-link">
                                    <i class="fa fa-plus"></i>
                                    <p> &nbsp;Create</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('backend.brand.index')}}" class="nav-link">
                                    <i class="fa fa-pen"></i>
                                    <p> &nbsp;Manage</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fa fa-newspaper"></i>
                            <p>
                                &nbsp; Advertise Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('backend.advertise.create')}}" class="nav-link">
                                    <i class="fa fa-plus"></i>
                                    <p> &nbsp;Create</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('backend.advertise.index')}}" class="nav-link">
                                    <i class="fa fa-pen"></i>
                                    <p> &nbsp;Manage</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fa fa-comment"></i>
                            <p>
                                &nbsp; Review Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('backend.review.index')}}" class="nav-link">
                                    <i class="fa fa-pen"></i>
                                    <p> &nbsp;Manage</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                   <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            <p>
                                &nbsp; Site Configuration
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('backend.configuration.index')}}" class="nav-link">
                                    <i class="fa fa-pen"></i>
                                    <p> &nbsp;Manage</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @php($userRole = \Illuminate\Support\Facades\Auth::user()->role)
                    @if($userRole == 'administrator')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fa fa-user"></i>
                            <p>
                                &nbsp; User Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('backend.user.index')}}" class="nav-link">
                                    <i class="fa fa-pen"></i>
                                    <p> &nbsp;Manage</p>
                                </a>
                            </li>
                        </ul>
<!--                         <ul class="nav nav-treeview" style="background-color: #282e33;">
                            <li class="nav-item">
                                <a href="{{route('backend.vendor.index')}}" class="nav-link">
                                    <i class="fa fa-industry"></i>
                                    <p> &nbsp;Vendor Management </p>
                                </a>
                            </li>
                        </ul> -->
                        <ul class="nav nav-treeview" style="background-color: #282e33;">
                            <li class="nav-item">
                                <a href="{{route('backend.customer.index')}}" class="nav-link">
                                    <i class="fa fa-user-circle"></i>
                                    <p> &nbsp;Customer Management </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                        @endif
                    <li class="nav-item has-treeview">
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="nav-link">
                            <i class="fa fa-sign-out-alt"></i>
                            <p>
                                &nbsp;Logout
                            </p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       @yield('content')
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Powered by </b> <a href="https://megasoft.net.np" target="_new">MegaSoft</a>
        </div>
        <strong>Copyright &copy; {{date('Y')}} <a href="#"> {{$configuration->name}}</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('backend/dist/js/demo.js')}}"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
@yield('js')
<script>
    $(document).ready(function() {
    $("#title").keyup(function(){
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
        $("#slug").val(Text);
    });
        $('#table').DataTable();
    } );
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };

    CKEDITOR.replace('description', options);


</script>
<script src="{{asset('js/config.js')}}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</body>
</html>
