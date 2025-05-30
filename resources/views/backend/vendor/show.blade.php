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
                           <td>Company</td>
                           <td>{{$data['row']->company_name}}</td>
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
                           <td>Parmanent Address</td>
                           <td>{{$data['row']->address}}</td>
                       </tr>
                       <tr>
                           <td>Temporary Address</td>
                           <td>{{$data['row']->temporary_address}}</td>
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
                           <td>Pan Number</td>
                           <td>{{$data['row']->pan}}</td>
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
                           <td>Contact Person's Email</td>
                           <td>{{$data['row']->contact_person_email}}</td>
                       </tr>
                       <tr>
                           <td>Contact Person's Address</td>
                           <td>{{$data['row']->contact_person_address}}</td>
                       </tr>
                        <tr>
                           <td>About Company</td>
                           <td>{{$data['row']->about}}</td>
                       </tr>
                        <tr>
                           <td>Bank Name</td>
                           <td>{{$data['row']->bank}}</td>
                       </tr>
                        <tr>
                           <td>Branch</td>
                           <td>{{$data['row']->branch}}</td>
                       </tr>
                        <tr>
                           <td>Account Holder Name</td>
                           <td>{{$data['row']->account_name}}</td>
                       </tr>
                        <tr>
                           <td>Account Number</td>
                           <td>{{$data['row']->account_number}}</td>
                       </tr>
                        <tr>
                           <td>Website</td>
                           <td>{{$data['row']->website}}</td>
                       </tr>
                       <tr>
                           <td>Logo</td>
                           <td>
                               @if($data['row']->image)
                               <img src="{{asset('/images/vendor/dashboard/' . $data['row']->image)}}" alt="{{$data['row']->title}}" width="100" height="100" i>
                               @else
                               <p class="text-danger">Logo Not Found</p>
                               @endif
                               </td>
                       </tr>
                       <tr>
                           <td>Legal Doucmnets</td>
                           <td>
                               @if($data['row']->image2)
                               <img src="{{asset('/images/vendor/dashboard/' . $data['row']->image2)}}" alt="{{$data['row']->title}}" width="100" height="100" i>
                               @else
                               <p class="text-danger">Document Not Found</p>
                               @endif
                                </td>
                       </tr>
                       <tr>
                           <td>Status</td>
                           <td>@if($data['row']->status == 1) <p class="text text-success">Active</p>@else <p class="text text-danger">In Active</p>@endif</td>
                       </tr>
                        <tr>
                           <td>Verify</td>
                           <td>@if($data['row']->verify == 1) <p class="text text-success">Yes</p>@else <p class="text text-danger">No</p>@endif</td>
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
