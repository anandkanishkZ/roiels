@extends('layouts.backend')
@section('title', 'Manage ' . $panel)
@section('css')
    <style>
        .expire{
            background-color: #d9534f;
            padding: .2em .6em .3em;
            font-size: 75%;
            font-weight: 700;
            color: #fff;
            text-align: center;
            border-radius: .25em;
        }
    </style>
    @endsection
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
                        <th>Code</th>
                        <th>Discount (%)</th>
                        <th>Expiry</th>
                        <th>Actions</th>
                        </thead>
                        <tbody>
                        @foreach($data['rows'] as $index=> $row)
                            @php($expire = $row->expiry)
                            @php($date = date('Y-m-d'))
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$row->title}}</td>
                            <td>{{$row->code}}</td>
                            <td>{{$row->discount}}</td>
                            <td>{{$row->expiry}}
                                @if($expire < $date)
                                <span class="expire">Expired</span></td>
                            @endif
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
