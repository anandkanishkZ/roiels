@extends('layouts.backend')
@section('title', $action . ' ' . $panel)
@section('css')
    <style>
        .required:after{
            color: red;
            font-size: 15px;
            font-family: Tahoma;
            content: '*';
        }
    </style>
    @endsection
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
                 alert();
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
            {{Form::open(['route' => $base_route . '.store', 'method' => 'post', 'files' => true, 'id' => 'form'])}}
            <div class="card-body">
                @include('backend.includes.flash_messge')
                 @include($view_path . '.mainform', ['page' => 'create'])
               
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Save</button>
                <button type="reset" class="btn btn-danger"> <i class="fa fa-redo"></i> Cancel</button>
            </div>
        {{Form::close()}}
        <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    @endsection
