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

<table style="width:50%;margin:auto;">
    <tr>
        <th>
            <table style="width: 100%;border:none">
                <tr>
                    <th>Order Item Ckecklist:</th>
                    <td>{{date('d M Y')}}</td>
                </tr>
            </table>
            <table style="width: 100%;border:none;margin-top:1em">
                <tbody>
                <tr style="background: #dbdbdb">
                    <th>SN</th>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th>Order No.</th>
                    <th>Qty
                    </th>
                </tr>
                @foreach($carts as $cart)
                    @php($product = \App\Models\Product::find($cart->product_id))
                    @php($vendor = \App\Models\Vendor::where('id', $product->vendor)->get())
                    @php($productImage = 'https://sidhadeal.com/images/product/' . $product->image)
                <tr>
                    <td>1</td>
                    <td>{{$product->id}}</td>
                    <td>{{$product->title}}</td>
                    <td><img src="{{$productImage}}"  height="70px"></td>
                    <td>{{$order->id}}</td>
                    <td>{{$cart->quantity}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <table style="width: 40%;border:none;float:right;">
                <tr>
                    <th>Total Items</th>
                    <td> {{count($carts)}}</td>
                    <td>Rs. {{$cart->price}}-</td>
                </tr>
            </table>
            <table style="width: 100%;border:none;">
                <tr>
                    <th style="text-align: center;">
                        @if(count($vendor->toArray()) > 0)
                            @php($vendor_logo = 'https://sidhadeal.com/images/vendor/dashboard/' . $vendor[0]->image)
                        <img src="{{$vendor_logo}}" height="50">
                        @endif
                    </th>
                    <th style="text-align: center;padding-top:4em"> ............................................. <br>Signature</th>
                    <td style="text-align: center;">
                        @if(count($vendor->toArray()) > 0)
                        Vender : {{$vendor[0]->company_name}}
                    @endif
                    </td>
                    <td style="text-align: center;padding-top:4em"> ............................................. <br>Signature</td>
                </tr>
            </table>
            <div  style="clear:both;text-align: center;"><p>Vendor Copy</p></div>
        </th>
    </tr>
</table>
<div style="width:50%;margin:auto;">
    <div style="height:30px;margin-bottom:2em;clear:both;width:100%;border-bottom:dashed 1px #000;">&nbsp;</div>
</div>
<table style="width:50%;margin:auto;">
    <tr>
        <th>
            <table style="width: 100%;border:none">
                <tr>
                    <th>Order Item Ckecklist:</th>
                    <td>{{date('d M Y')}}</td>
                </tr>
            </table>
            <table style="width: 100%;border:none;margin-top:1em">
                <tbody>
                <tr style="background: #dbdbdb">
                    <th>SN</th>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th>Order No.</th>
                    <th>Qty</th>
                </tr>
                @foreach($carts as $cart)
                    @php($product = \App\Models\Product::find($cart->product_id))
                    @php($vendor = \App\Models\Vendor::where('id', $product->vendor)->get())
                    @php($productImage = 'https://sidhadeal.com/images/product/' . $product->image)
                    <tr>
                        <td>1</td>
                        <td>{{$product->id}}</td>
                        <td>{{$product->title}}</td>
                        <td><img src="{{$productImage}}"  height="70px"></td>
                        <td>{{$order->id}}</td>
                        <td>{{$cart->quantity}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <table style="width: 40%;border:none;float:right;">
                <tr>
                    <th>Total Items</th>
                    <td> {{count($carts)}}</td>
                    <td>Rs. {{$cart->price}}-</td>
                </tr>
            </table>
            <table style="width: 100%;border:none;">
                <tr>
                    <th style="text-align: center;">
                        @if(count($vendor->toArray()) > 0)
                            @php($vendor_logo = 'https://sidhadeal.com/images/vendor/dashboard/' . $vendor[0]->image)
                            <img src="{{$vendor_logo}}" height="50">
                        @endif
                    </th>
                    <th style="text-align: center;padding-top:4em"> ............................................. <br>Signature</th>
                    <td style="text-align: center;">
                        @if(count($vendor->toArray()) > 0)
                            Vender : {{$vendor[0]->company_name}}
                        @endif
                    </td>
                    <td style="text-align: center;padding-top:4em"> ............................................. <br>Signature</td>
                </tr>
            </table>
            <div  style="clear:both;text-align: center;"><p>Sidhadeal Copy</p></div>
        </th>
    </tr>
</table>

</body>
</html>








