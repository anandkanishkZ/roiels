@extends('layouts.backend')
@section('title', $panel . ' ' . $action)
@section('js')
    <script>
        $(document).ready(function(){
            $("#category_id").on('change', function(){
                var id = $(this).val();
                var path = '{{route('backend.productline.getSubcategoryByCategoryID')}}';
                $.ajax({
                    type: 'POST',
                    data: {'id' : id},
                    url: path,
                    beforeSend: function(){
                        $("#subcategory_id").html('<option>loading...</option>');
                    },
                    success: function(res){
                        $("#subcategory_id").empty();
                        $("#subcategory_id").html(res);
                    },
                    error: function(){
                        alert('Sorry Data Not Found');
                    }
                });
            });
        });
    </script>
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$panel}} Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">{{$action}} {{$panel}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$action}} {{$panel}}   <a href="{{route($base_route . '.index')}}" class="btn btn-info">  <i class="fa fa-pen"></i> Manage {{$panel}}</a></h3>
            </div>
            {{Form::model($data['row'], ['route' => [$base_route . '.update', $data['row']->id], 'method' => 'post', 'files' => true])}}
            @METHOD('put')
            <div class="card-body">
                @include('backend.includes.flash_messge')
                @include($view_path . '.mainform', ['page' => 'edit'])
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary"> <i class="fa fa-pen"></i> Update</button>
            </div>
        {{Form::close()}}
        <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
@endsection
