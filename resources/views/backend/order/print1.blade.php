<!DOCTYPE html>
<html>
<head>
    <title>{{$order->name}}</title>
    <style>
        table{
            border: 2px solid #868686;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            font-size: 16px;
            border: 1px solid #868686;
        }
        p {
            font-size: 18px;
            border-bottom: solid 1px #ccc;
        }
    </style>
</head>
<body>

<table style="width:100%;margin:auto;">
    <tr>
        <th style="text-align: right;">Order Id:</th>
        <td>{{$order->id}}</td>
    </tr>
    <tr>
        <th style="text-align: center;"><img src="https://sidhadeal.com/images/configuration/1599837808_logo.png" width="150"></th>
        <td>
            @foreach($carts as $cart)
                @php($product = \App\Models\Product::find($cart->product_id))
                <p><strong>	Product Name : {{$product->title}}  </strong> </p>
                <p> Product Weight : {{$product->weight}} </p>
                <p> Product L*W*B cm : {{$product->length}} X {{$product->weight}} X {{$product->width}} </p>
            @endforeach
            <p> Payment Method : {{$order->payment_mode}}</p>
            <p> Order Date : {{$order->order_date}}</p>
            <p style="border-bottom:none">Total Amount : {{$order->total_amount}}</p>
        </td>
    </tr>
    <tr>
        <th style="text-align: center;"> <img src="https://sidhadeal.com/images/barcode.png"></th>
        <td>
            <p><strong>Recipient: {{$order->name}} </strong> </p>
            <p> Address: {{$order->shipping}} </p>
            <p> Phone: {{$order->phone}}</p>
            <p> Mobile: {{$order->mobile}} </p><br>
            <p><strong> Sender: @if($product->vendor) {{$product->vendor}}@else <p class="text-danger">Not Found</p>@endif</strong></p>
            <p style="border-bottom:none">Item: {{count($carts)}}</p>
        </td>
    </tr>
    <tr>
        <th style="text-align: right;">Print Date:</th>
        <td>{{date('d M Y')}}</td>
    </tr>
</table>

</body>
</html>

