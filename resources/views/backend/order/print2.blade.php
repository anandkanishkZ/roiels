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
        <th>Sidhadeal Purchase Summary: {{$order->id}}</th>

    </tr>
    <tr>
        @foreach($carts as $cart)
            @php($product = \App\Models\Product::find($cart->product_id))
            @php($vendor = \App\Models\Vendor::where('id', $product->vendor)->get())
        @endforeach
            @if(count($vendor->toArray()) > 0)
        @php($vendor_logo = 'https://sidhadeal.com/images/vendor/dashboard/' . $vendor[0]->image)
            @endif
        <th>  <h2>
                @if(count($vendor->toArray()) > 0)
                <img src="{{$vendor_logo}}" style="vertical-align:middle" height="50px"> &nbsp; {{$vendor[0]->company_name}}
            @endif
            </h2>
            <table style="width: 100%;border:none">
                <tr>
                    <th>Order ID:</th>
                    <td>{{$order->id}}</td>
                </tr>
                <tr>
                    <th>Purchase Summary Number <br>(Seller Bill No):</th>
                    <td>{{$order->id}}</td>
                </tr>
                <tr>
                    <th>Payment Method</th>
                    <td>{{$order->payment_mode}}</td>
                </tr>
                <tr>
                    <th>Order Date:</th>
                    <td>{{$order->order_date}}</td>
                </tr>
            </table>
            <table style="width: 100%;border:none;margin-top:1em">
                <tr>
                    <th>Bill To: {{$order->name}}</th>
                    <td>Delivery To: {{$order->name}}</td>
                </tr>
                <tr>
                    <th>Address: {{$order->shipping}}</th>
                    <th>Address: {{$order->shipping}}</th>
                </tr>
                <tr>
                    <th>Phone: {{$order->phone}}</th>
                    <th>Phone: {{$order->phone}}</th>
                </tr>
                <tr>
                    <th>Mobile: {{$order->mobile}}</th>
                    <th>Mobile: {{$order->mobile}}</th>
                </tr>
            </table>
            <h3>Your Order Items Details:</h3>
            <table style="width: 100%;border:none;margin-top:1em">
                <tbody>
                <tr style="background: #dbdbdb">
                    <th>SN</th>
                    <th>Product Name</th>
                    <th>ID</th>
                    <th>Attributes</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total Price</th>
                </tr>
                @foreach($carts as $cart)
                @php($product = \App\Models\Product::find($cart->product_id))
                <tr>
                    <td>1</td>
                    <td>{{$product->title}}</td>
                    <td>{{$cart->id}}</td>
                    <td>{{$cart->size}}, {{$cart->color}}</td>
                    <td>{{$cart->quantity}}</td>
                    <td>Rs. {{$cart->price}}/-</td>
                    <td>Rs. {{$cart->price}}/-</td>
                </tr>
                @endforeach
                </tbody>
            </table>

            <table style="width: 40%;border:none;float:right;">
                <tr>
                    <th>Sub Total</th>
                    <td>Rs. {{$order->subtotal}}-</td>
                </tr>
                <tr>
                    <th>Tax</th>
                    <td>{{$order->subtotal * 2 / 100}}</td>
                </tr>
                <tr>
                    <th>Shipping Cost</th>
                    <td>+0</td>
                </tr>
                <tr>
                    <th>Total Bill</th>
                    <td><strong>Rs. {{$order->total_amount}}-</strong></td>
                </tr>

            </table>
            <p style="border-bottom:none;font-size:14px;margin-top:11em;color:grey">Print Date:15 Oct 2020,18:48</p>
        </th>
    </tr>
</table>
</body>
</html>








