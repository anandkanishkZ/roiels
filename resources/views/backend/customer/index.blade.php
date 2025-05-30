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
            <div class="card-body">
                @include('backend.includes.flash_messge')
                <div class="table table-responsive">
                    <table class="table table-bordered" id="table">
                        <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Actions</th>
                        </thead>
                        <tbody>
                        @foreach($data['rows'] as $index=> $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->phone}}</td>
                            <td>
                                @if($row->status == 1)
                                    <p class="text text-success">Active</p>
                                    @else
                                    <p class="text text-danger">De active</p>
                                    @endif
                            </td>
                            <td>
                                <a href="{{route($base_route . '.edit', $row->id)}}" class="btn btn-info"><i class="fa fa-pen"></i></a>
                               @if($row->status == 0)
                               <form action="{{route($base_route . '.destroy', $row->id)}}" method="post" onclick="return confirm('Are You Sure Do You Want To Delete This Data')" style="display: inline-block;">
                                @csrf
                               @METHOD('delete')
                                   <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                               </form>
                               @endif
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
