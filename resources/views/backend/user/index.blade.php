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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                        </thead>
                        <tbody>
                        @foreach($data['rows'] as $index=> $row)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{ucfirst($row->role)}}</td>
                            <td>
                                @if($row->role == 'editor')
                                <form action="{{route($base_route . '.destroy', $row->id)}}" method="post" onclick="return confirm('Are You Sure Do You Want To Delete This Data')" style="display: inline-block;">
                                @csrf
                                @METHOD('delete')
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                                    @endif
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
