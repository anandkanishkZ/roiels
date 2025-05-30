@extends('layouts.backend')
@section('title', 'Manage ' . $panel)
@section('content')
    @include('backend.includes.breadcrumb')

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$panel}} {{$action}} <a href="{{route($base_route . '.create')}}" class="btn btn-info">  <i class="fa fa-plus"></i> Create {{$panel}}</a></h3>
            </div>
            <div class="card-body">
                @include('backend.includes.flash_messge')
                <div class="table table-responsive">
                    <table class="table table-bordered" id="table">
                        <thead>
                        <th>S.N</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                        </thead>
                        <tbody>
                        @foreach($data['rows'] as $index=> $row)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$row->title}}</td>
                            <td>{!! substr($row->description, 0,20) !!}</td>
                           <td>
                                @if($row->status == 1)
                                    <p class="text text-success">Active</p>
                                    @else
                                    <p class="text text-danger">De active</p>
                                    @endif
                            </td>
                            <td>
                                <a href="{{route($base_route . '.edit', $row->id)}}" class="btn btn-info"><i class="fa fa-pen"></i></a>
                                <form action="{{route($base_route . '.destroy', $row->id)}}" method="post" onclick="return confirm('Are You Sure Do You Want To Delete This Data')" style="display: inline-block;">
                                @csrf
                                @METHOD('delete')
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                                <a href="{{route($base_route . '.show', $row->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                            </td>

                        </tr>
                            @endforeach
                        </tbody>
                    </table>
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
