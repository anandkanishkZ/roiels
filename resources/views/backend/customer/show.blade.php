@extends('layouts.backend')
@section('title', $panel . ' ' . $action)
@section('content')
   @include('backend.includes.breadcrumb')

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$action}} {{$panel}}  <a href="{{route($base_route . '.index')}}" class="btn btn-info">  <i class="fa fa-pen"></i> Manage {{$panel}} </a> </h3>
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
                           <td>Id</td>
                           <td>{{$data['row']->id}}</td>
                       </tr>
                       <tr>
                           <td>Name</td>
                           <td>{{$data['row']->name}}</td>
                       </tr>
                       <tr>
                           <td>Username</td>
                           <td>{{$data['row']->username}}</td>
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
                           <td>Country</td>
                           <td>{{$data['row']->country}}</td>
                       </tr>
                       <tr>
                           <td>City</td>
                           <td>{{$data['row']->city}}</td>
                       </tr>
                       <tr>
                           <td>State</td>
                           <td>{{$data['row']->state}}</td>
                       </tr>
                       <tr>
                           <td>Street Address</td>
                           <td>{{$data['row']->street}}</td>
                       </tr>

                       <tr>
                           <td>Status</td>
                           <td>@if($data['row']->status == 1) <p class="text text-success">Active</p>@else <p class="text text-danger">De Active</p>@endif</td>
                       </tr>
                       <tr>
                           <td>Created At</td>
                           @php($create_at = date_create($data['row']->created_at))
                           <td>{{date_format($create_at, 'd F Y')}}</td>
                       </tr>
                       @if($data['row']->updated_by != '')
                       <tr>
                           <td>Updated At</td>
                           @php($updated_at = date_create($data['row']->updated_at))
                           <td>{{date_format($updated_at, 'd F Y')}}</td>
                       </tr>
                           @endif
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
