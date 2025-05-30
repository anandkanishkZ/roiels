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
                           <td>Full Name</td>
                           <td>{{$data['row']->name}}</td>
                       </tr>
                       <tr>
                           <td>Company</td>
                           <td>{{$data['row']->company}}</td>
                       </tr>
                       <tr>
                           <td>Country</td>
                           <td>{{$data['row']->country}}</td>
                       </tr>

                       <tr>
                           <td>City</td>
                           <td> {{$data['row']->city}}</td>
                       </tr>
                       <tr>
                           <td>Street</td>
                           <td>{{$data['row']->street}}</td>
                       </tr>
                       <tr>
                           <td>Phone</td>
                           <td>{{$data['row']->phone}}</td>
                       </tr>
                       <tr>
                           <td>Mobile</td>
                           <td>{{$data['row']->mobile}}</td>
                       </tr>
                       <tr>
                           <td>Email</td>
                           <td>{{$data['row']->email}}</td>
                       </tr>
                       <tr>
                           <td>Shipping Address</td>
                           <td>{{$data['row']->shipping}}</td>
                       </tr>
                       <tr>
                           <td>Order Note</td>
                           <td>{{$data['row']->note}}</td>
                       </tr>
                       <tr>
                           <td>Order Date</td>
                           <td>{{$data['row']->order_date}}</td>
                       </tr>
                       <tr>
                           <td>Order Status</td>
                           <td>{{$data['row']->order_status}}</td>
                       </tr>
                       <tr>
                           <td>Payment Mode</td>
                           <td>{{$data['row']->payment_mode}}</td>
                       </tr>
                       <tr>
                           <td>Total Amount</td>
                           <td>{{$data['row']->total_amount}}</td>
                       </tr>
                       <tr>
                           <td>Status</td>
                           <td>{{$data['row']->status}}</td>
                       </tr>


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
