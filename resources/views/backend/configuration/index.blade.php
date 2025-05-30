@extends('layouts.backend')
@section('title', 'Manage ' . $panel)
@section('content')
    @include('backend.includes.breadcrumb')

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$panel}} {{$action}} </h3>
            </div>
            {{Form::model($data['row'], ['route' => [$base_route . '.update', $data['row']->id], 'method' => 'post', 'files' => true])}}
            @METHOD('put')
            <div class="card-body">
                @include('backend.includes.flash_messge')
                @include($view_path . '.mainForm', ['page' => 'edit'])
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
