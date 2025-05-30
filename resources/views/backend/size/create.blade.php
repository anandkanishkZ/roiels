@extends('layouts.backend')
@section('title', $panel . ' ' . $action)
@section('js')
    <script>
        $(document).ready(function(){
            var y = 1;
            $(".btnAddMoreItinery").click(function(){
                y++;
                $("#sizeTable tr:last").after(
                    '<tr>'
                    + '<td><input type="text" name="title[]" class="form-control" placeholder="Enter Size" required></td>'
                    + '<td><button type="button" class="btn btn-danger itineryRemoveBtn" onclick="return confirm(\'Are You Sure  Do You Want To Delete This Data ?\')"><i class="fa fa-trash"></i></button></td>'
                    + '</tr>'
                );
            });
            $("#sizeTable").on('click','.itineryRemoveBtn', function(){
                $(this).parents('tr').remove();
                y--;
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
            {{Form::open(['route' => $base_route . '.store', 'method' => 'post', 'files' => true])}}
            <div class="card-body">
                @include('backend.includes.flash_messge')
                @include($view_path . '.mainForm', ['page' => 'create'])
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Save</button>
                <button type="submit" class="btn btn-danger"> <i class="fa fa-redo"></i> Cancel</button>
            </div>
            {{Form::close()}}
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    @endsection
