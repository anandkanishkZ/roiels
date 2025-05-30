@extends('layouts.backend')
@section('title', $panel . ' ' . $action)
@section('content')
   @include('backend.includes.breadcrumb')

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$action}} {{$panel}}  <a href="{{route($base_route . '.index')}}" class="btn btn-info">  <i class="fa fa-pen"></i> Manage {{$panel}} </a>  <a href="{{route($base_route . '.create')}}" class="btn btn-primary">  <i class="fa fa-plus"></i> Create {{$panel}}</a></h3>
            </div>
            <div class="card-body">
               <div class="table table-responsive">
                   <table class="table table-bordered">
                    <thead>
                    <th>Title</th>
                    <th>Value</th>
                    </thead>
                       <tbody>
                       <tr>
                           <td>Name</td>
                           <td>{{$data['row']->name}}</td>
                       </tr>
                       <tr>
                           <td>Email</td>
                           <td>{{$data['row']->email}}</td>
                       </tr>
                       <tr>
                           <td>Phone</td>
                           <td>{{$data['row']->phone}}</td>
                       </tr>
                       <tr>
                           <td>Image</td>
                           <td><img src="{{asset($image_path . '/' . $data['row']->image)}}" alt="{{$data['row']->title}}" width="100" height="100" i> </td>
                       </tr>
                       <tr>
                           <td>Review</td>
                           <td>{{$data['row']->review}}</td>
                       </tr>
                       <tr>
                           <td>Status</td>
                           <td>@if($data['row']->status == 1) <p class="text text-success">Active</p>@else <p class="text text-danger">De Active</p>@endif</td>
                       </tr>
                       </tbody>
                   </table>
               </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{route($base_route . '.edit', $data['row']->id)}}" class="btn btn-info"><i class="fa fa-pen"></i> Edit</a>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    @endsection
