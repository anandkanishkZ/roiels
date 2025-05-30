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
                <h3 class="card-title">{{$panel}} {{$action}}  <a href="{{route($base_route . '.index')}}" class="btn btn-info">  <i class="fa fa-pen"></i> Manage {{$panel}}</a></h3>
            </div>
            <div class="card-body">
                @include('backend.includes.flash_messge')
                <div class="table table-responsive">
                    <table class="table table-bordered" id="table">
                        <thead>
                            <th>S.N</th>
                            <th>Customer</th>
                            <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Description</th>
                        <th>Vendor</th>

                        <th>Order Date</th>
                        <th>Status</th>

                        </thead>
                        <tbody>
                            @php($i = 1)
                        @foreach($data['orders'] as $order)
                        @php($product = \App\Models\Product::find($order->product_id))
                            <tr>
                               <td>{{$i++}}</td>
                               <td>{{$data['order']->name}}</td>
                               <td>{{$product->title}}</td>
                               <td>{{$order->quantity}}</td>
                               <td>{{$order->price}}</td>
                                <td>{{$order->size}}</td>
                                <td>{{$order->color}}</td>
                                <td>{{$order->description}}</td>
                                <td>{{$order->vendor}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>{{$data['order']->order_status}}</td>
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
