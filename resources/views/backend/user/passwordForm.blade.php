@extends('layouts.backend')
@section('title', $panel . ' ' . $action)
@section('content')
   @include('backend.includes.breadcrumb')

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$panel}} {{$action}}</h3>
            </div>
            {{Form::open(['route' => $base_route . '.updatePassword','method' => 'post'])}}
            @METHOD('put')
            <div class="card-body">
                @include('backend.includes.flash_messge')
                <div class="col-md-6">
                   <div class="form-group">
                      <label for="password">Password</label>
                       {{Form::text('password', null, ['class' => 'form-control','placeholder' => 'Enter Password'])}}
                       @include('backend.includes.single_input_validation', ['field' => 'password'])
                   </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password_confirmation"> Confirm Password</label>
                        {{Form::text('password_confirmation', null, ['class' => 'form-control','placeholder' => 'Enter Confirm Password'])}}
                        @include('backend.includes.single_input_validation', ['field' => 'password_confirmation'])
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button class="btn btn-info" type="submit"> <i class="fa fa-pen"></i> Update</button>
            </div>
        {{Form::close()}}
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    @endsection
