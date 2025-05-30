
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

    <title>{{$configuration->title}}</title>
    <style>
        * { margin: 0; padding: 0; }
        body { font: 14px/1.4 Georgia, serif; }
        #page-wrap { width: 800px; margin: 0 auto; }

        textarea { border: 0; font: 14px Georgia, Serif; overflow: hidden; resize: none; }
        table { border-collapse: collapse; }
        table td, table th { border: 1px solid black; padding: 5px; }

        #header { height: 15px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 20px; padding: 8px 0px; }

        #address { width: 250px; height: 150px; float: left; }
        #customer { overflow: hidden; }

        #logo { text-align: right; float: right; position: relative; margin-top: 25px; border: 1px solid #fff; max-width: 540px; max-height: 100px; overflow: hidden; }
        #logo:hover, #logo.edit { border: 1px solid #000; margin-top: 0px; max-height: 125px; }
        #logoctr { display: none; }
        #logo:hover #logoctr, #logo.edit #logoctr { display: block; text-align: right; line-height: 25px; background: #eee; padding: 0 5px; }
        #logohelp { text-align: left; display: none; font-style: italic; padding: 10px 5px;}
        #logohelp input { margin-bottom: 5px; }
        .edit #logohelp { display: block; }
        .edit #save-logo, .edit #cancel-logo { display: inline; }
        .edit #image, #save-logo, #cancel-logo, .edit #change-logo, .edit #delete-logo { display: none; }
        #customer-title { font-size: 20px; font-weight: bold; float: left; }


        #meta td { text-align: right;  }
        #meta td.meta-head { text-align: left; background: #eee; }
        #meta td textarea { width: 100%; height: 20px; text-align: right; }

        #items { clear: both; width: 100%; margin: 30px 0 0 0; border: 1px solid black; }
        #items th { background: #eee; }
        #items textarea { width: 80px; height: 50px; }
        #items tr.item-row td { border: 0; vertical-align: top; }
        #items td.description { width: 300px; }
        #items td.item-name { width: 175px; }
        #items td.description textarea, #items td.item-name textarea { width: 100%; }
        #items td.total-line { border-right: 0; text-align: right; }
        #items td.total-value { border-left: 0; padding: 10px; }
        #items td.total-value textarea { height: 20px; background: none; }
        #items td.balance { background: #eee; }
        #items td.blank { border: 0; }

        #terms { text-align: center; margin: 20px 0 0 0; }
        #terms h5 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif; letter-spacing: 10px; border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
        #terms textarea { width: 100%; text-align: center;}

        textarea:hover, textarea:focus, #items td.total-value textarea:hover, #items td.total-value textarea:focus, .delete:hover { background-color:#EEFF88; }

        .delete-wpr { position: relative; }
        .delete { display: block; color: #000; text-decoration: none; position: absolute; background: #EEEEEE; font-weight: bold; padding: 0px 3px; border: 1px solid; top: -6px; left: -22px; font-family: Verdana; font-size: 12px; }
        #hiderow,
        .delete {
            display: none;
        }
    </style>

</head>

<body>

<div id="page-wrap" style="margin-top: 20px;">

    <div id="header">INVOICE</div>

    <div id="identity">

        <div id="address" style="margin-left:10px; ">{{$order->name}}
            {{$order->city}}, {{$order->country}}

            Phone: {{$order->phone}}</div>

        <div id="logo">
            <img src="http://nes.grafiastech.com/images/configuration/1586855963_web_logo.png" alt="logo"  style="margin-right: 30px;"/>
        </div>

    </div>

    <div style="clear:both"></div>

    <div id="customers">

        <div id="customer-title" style="margin-left: 10px;">{{$order->name}}</div>

        <table id="meta" style="width:765px;margin-left: 460px;">
            <tr>
                <td class="meta-head">Order Code</td>
                <td><div class="due">{{$order->id}}</div></td>
            </tr>
            <tr>

                <td class="meta-head">Date</td>
                <td><div class="due">{{$order->created_at}}</div></td>
            </tr>
            <tr>
                <td class="meta-head">Amount Due</td>
                <td><div class="due">Rs {{$order->total_amount}}</div></td>
            </tr>

        </table>

    </div>

    <table id="items" style="width:96%;margin-left: 20px;">

        <tr>
            <th colspan="2">Item</th>
            <th>Unit Cost</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
        @foreach($carts as $cart)
            @php($product = \App\Models\Product::find($cart->product_id))
        <tr class="item-row">
            <td class="item-name" colspan="2"><div class="delete-wpr"><div>{{$product->title}}</div> </div></td>
            <td><div class="due">Rs {{$cart->price}}</div></td>
            <td><div class="due">{{$cart->quantity}}</div></td>
            <td><span class="price">Rs {{$cart->price}}</span></td>
        </tr>
        @endforeach



        <tr id="hiderow">

        </tr>

        <tr>
            <td colspan="2" class="blank"> </td>
            <td colspan="2" class="total-line">Subtotal</td>
            <td class="total-value"><div id="subtotal">Rs {{$order->subtotal}}</div></td>
        </tr>
        <tr>

            <td colspan="2" class="blank"> </td>
            <td colspan="2" class="total-line">Total</td>
            <td class="total-value"><div id="total">Rs {{$order->total_amount}}</div></td>
        </tr>
        <tr>
            <td colspan="2" class="blank"> </td>
            <td colspan="2" class="total-line">Amount Paid</td>

            <td class="total-value"><div id="total"> Rs 0.00</div></td>
        </tr>
        <tr>
            <td colspan="2" class="blank"> </td>
            <td colspan="2" class="total-line balance">Balance Due</td>
            <td class="total-value balance"><div class="due">Rs {{$order->total_amount}}</div></td>
        </tr>

    </table>

    <div id="terms">
        <h5>IMPORTANT NOTICE</h5>
        <div>
            This is an electronic generated invoice so doesn't require any signature. Please read all terms and polices for returns, replacement and other issues.</div>
    </div>
    <button type="button" class="btn btn-success">Download Invoice</button>
    <button type="button" class="btn btn-success">Back To Home</button>

</div>

</body>

</html>
