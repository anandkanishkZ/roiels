@extends('layouts.backend')
@section('title', $configuration->name)
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="fa fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Slider</span>
                                <span class="info-box-number">{{count(\App\Models\Slider::all())}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="fa fa-images"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Cateory</span>
                                <span class="info-box-number">{{count(\App\Models\Category::all())}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-warning"><i class="fa fa-info"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Subcategory</span>
                                <span class="info-box-number">{{count(\App\Models\Subcategory::all())}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-danger"><i class="fa fa-gifts"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Product</span>
                                <span class="info-box-number">{{count(\App\Models\Product::all())}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">

                </div>
            </div>
        <div class="card-body">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger"><i class="fa fa-blog"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Order</span>
                            <span class="info-box-number">{{count(\App\Models\Order::all())}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning"><i class="fa fa-car"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Advertise</span>
                            <span class="info-box-number">{{count(\App\Models\Advertise::all())}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="fa fa-mail-bulk"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Email</span>
                            <span class="info-box-number">{{count(\App\Models\Contact::all())}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fa fa-user"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">User</span>
                            <span class="info-box-number">{{count(\App\User::all())}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->


            </div>


        </div>
            <!-- /.card-body -->
            <div class="card-footer">

            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    @endsection

