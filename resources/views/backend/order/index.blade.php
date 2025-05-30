@extends('layouts.backend')
@section('title', 'Manage ' . $panel)
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
    <script>
    $(document).ready(function() {
    $('#table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
           'csv', 'excel','pdf','print'
        ]
    } );
} );
        $(".selectStatus").change(function(){
          var orderId = $(this).closest('tr').prop('id');
          var statusValue = $(this).val();
          var path = '{{route('backend.order.orderStatusUpdateOrderId')}}';
            $.ajax({
                type: 'POST',
                url: path,
                data: { 'orderId' : orderId, 'statusValue' : statusValue},
                success: function(res){
                    alert(res);
                }
            })
        });
    </script>
    @endsection
@section('content')
    @include('backend.includes.breadcrumb')

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                @include('backend.includes.flash_messge')
                <div class="table table-responsive">
                    <table class="table table-bordered" id="table">
                        <thead>
                            <th>S.N</th>
                            <th>Order Id</th>
                        <th>Customer</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Country</th>
                        <th>City</th>
              
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                        </thead>
                        <tbody>
                            @php($i = 1)
                        @foreach($data['orders'] as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$i++}}</td>
                                <td>
                                    {{$order->name}}
                                </td>
                                <td>
                                    {{$order->email}}
                                </td>
                                 <td>
                                    {{$order->mobile}}
                                </td>
                                 <td>
                                    {{$order->country}}
                                </td>
                                 <td>
                                    {{$order->city}}
                                </td>
                            
                                 <td>
                                    {{$order->created_at}}
                                </td>
                                 <td>
                                    {{$order->order_status}}
                                </td>
                                 <td>
                                   <a href="{{route('backend.order.show', $order->id)}}" class="btn btn-info">Show</a>
                                   <br/>
                                   <br/>
                                    <a href="{{route('backend.order.detail', $order->id)}}" class="btn btn-primary">Detail</a>
                                    <br/>
                                    <br/>
                                    <form action="{{route($base_route . '.destroy', $order->id)}}" method="post" onclick="return confirm('Are You Sure Do You Want To Delete This Data')" style="display: inline-block;">
                               @csrf
                                @METHOD('delete')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                                <br/>
                                   <br/>
                                    <a href="{{route('backend.order.status', $order->id)}}" class="btn btn-success">Status</a>
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
