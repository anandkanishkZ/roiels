@extends('layouts.backend')
@section('title', 'Manage ' . $panel)
@section('content')
    @include('backend.includes.breadcrumb')

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$panel}} {{$action}}</h3>
            </div>
            <div class="card-body">
                @include('backend.includes.flash_messge')
                <div class="table table-responsive">
                    <table class="table table-bordered" id="table">
                        <thead>
                        <th>S.N</th>
                        <th>Package Name</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th>Received Date</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        @foreach($data['rows'] as $index=> $row)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$row->package->title}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->phone}}</td>
                                <td>{{$row->message}}</td>
                                @php($date = date_create($row->created_at))
                                <td>{{date_format($date, 'd F Y')}}</td>
                                <td>
                                    <form action="{{route('backend.contact.destroy', $row->id)}}" method="post" onclick="return confirm('Are You Sure Do You Want To Delete This Data ?')">
                                        @METHOD('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
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
