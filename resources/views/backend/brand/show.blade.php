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
                           <td>Slug</td>
                           <td>{{$data['row']->slug}}</td>
                       </tr>
                       <tr>
                           <td>Description</td>
                           <td>{!! $data['row']->description !!}</td>
                       </tr>
                       <tr>
                           <td>Rank</td>
                           <td>{{$data['row']->rank}}</td>
                       </tr>
                       <tr>
                           <td>Image</td>
                           <td><img src="{{asset($image_path . '/' . $data['row']->image)}}" alt="{{$data['row']->title}}" width="100" height="100" i> </td>
                       </tr>
                       <tr>
                           <td>Meta Title</td>
                           <td>{{$data['row']->meta_title}}</td>
                       </tr>
                       <tr>
                           <td>Meta Keyword</td>
                           <td>{{$data['row']->meta_keyword}}</td>
                       </tr>
                       <tr>
                           <td>Meta Description</td>
                           <td>{{$data['row']->meta_description}}</td>
                       </tr>
                       <tr>
                           <td>Status</td>
                           <td>@if($data['row']->status == 1) <p class="text text-success">Active</p>@else <p class="text text-danger">De Active</p>@endif</td>
                       </tr>
                       <tr>
                           <td>Created By</td>
                           <td>{{\Illuminate\Support\Facades\Auth::user($data['row']->created_by)->name}}</td>
                       </tr>
                       <tr>
                           <td>Created At</td>
                           @php($create_at = date_create($data['row']->created_at))
                           <td>{{date_format($create_at, 'd F Y')}}</td>
                       </tr>
                       @if($data['row']->updated_by != '')
                       <tr>
                           <td>Updated By</td>
                           <td>{{\Illuminate\Support\Facades\Auth::user($data['row']->updated_by)->name}}</td>
                       </tr>
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
