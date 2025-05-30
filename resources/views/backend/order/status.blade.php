@extends('layouts.backend')
@section('title', $panel, 'Status')
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
                        <li class="breadcrumb-item active">Status</li>
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
                <h3 class="card-title">Manage Order  <a href="{{route($base_route . '.index')}}" class="btn btn-info">  <i class="fa fa-pen"></i> Manage {{$panel}}</a></h3>
            </div>
        
            {{Form::model($data['row'], ['route' => ['backend.order.status.update', $data['row']->id], 'method' => 'post', 'files' => true])}}
            @METHOD('PUT')
            <div class="card-body">
                @include('backend.includes.flash_messge')
                <div class="form-group">
        <label for="title">Change Status</label>
        <br/>
        @foreach($data['rows'] as $row)
        {{Form::radio('status', $row->title, true)}} {{$row->title}} <br/>
        @endforeach
        
    </div>
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
