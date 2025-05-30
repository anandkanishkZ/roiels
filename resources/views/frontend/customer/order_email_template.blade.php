<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table  style="background-color:#ffffff;border:1px solid #dedede;border-radius:3px;margin:auto" width="600" cellspacing="0" cellpadding="0" border="0">
		<tbody>
			<tr>
				<td valign="top" align="center">
					<table style="background-color:#467ecb;color:#ffffff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;border-radius:3px 3px 0 0" width="100%" cellspacing="0" cellpadding="0" border="0">
						<tbody>
							<tr>
								<td style="padding:36px 48px;display:block">
									<h1 style="font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;margin:0;text-align:left;color:#ffffff">Invoice for order #{{$orderId}}</h1>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td valign="top" align="center">
					<table width="600" cellspacing="0" cellpadding="0" border="0">
						<tbody>
							<tr>
								<td style="background-color:#ffffff" valign="top">
									<table width="100%" cellspacing="0" cellpadding="20" border="0">
										<tbody>
											<tr>
												<td style="padding:48px 48px 32px" valign="top">
													<div style="color:#636363;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left">
														<p style="margin:0 0 16px">Hi {{$name}},</p>
														<p style="margin:0 0 16px">
														Thank you for your order.
														Here are the details of your order placed on {{date('Y M d')}}:	</p>
														<p style="margin:0 0 16px">Pay with cash upon delivery.</p>
														<h2 style="color:#3e72b9;display:block;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left">
														    
														    [Order #{{$orderId}}] ({{date('Y M d')}})
														    <br/>
														    Product Code : {{$code}} 
														    </h2>
														<div style="margin-bottom:40px">
															<table style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;width:100%;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif" cellspacing="0" cellpadding="6" border="1">
																<thead>
																	<tr>
																		<th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Product</th>
																		<th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Quantity</th>
																		<th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Price</th>
																	</tr>
																</thead>
																<tbody>
																    @foreach($data as $cart)
																	<tr>
																		<td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;word-wrap:break-word">
																			{{$cart->name}}	
																		</td>
																		<td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif">
																			{{$cart->qty}}		
																		</td>
																		<td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif">	
																			<span><span>₨</span> {{$cart->price}}</span>
																		</td>
																	</tr>
																	@endforeach
																													
																</tbody>
																<tfoot>
																	<tr>
																		<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px">Subtotal:</th>
																		<td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px"><span><span>₨</span> {{$subtotal}}</span></td>
																	</tr>
																	<tr>
																		<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Payment Method:</th>
																		<td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Cash on Delivery</td>
																	</tr>
																	<tr>
																		<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Delivery:</th>
																		<td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Within 1-3 Days</td>
																	</tr>
																	<tr>
																		<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Total:</th>
																		<td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"><span><strong><span>₨</span> {{$total}}</span></strong></td>
																	</tr>
																</tfoot>
															</table>
														</div>
														<table style="width:100%;vertical-align:top;margin-bottom:40px;padding:0" cellspacing="0" cellpadding="0" border="0">
															<tbody>
																<tr>
																	<td style="text-align:left;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;border:0;padding:0" width="50%" valign="top">
																		<h2 style="color:#3e72b9;display:block;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left">Billing address</h2>
																		<address style="padding:12px;color:#636363;border:1px solid #e5e5e5">
																			<br>{{$name}},
																			<br> Shipping Address : {{$shipping}}
																			<br><a href="tel:9841382917" style="color:#3e72b9;font-weight:normal;text-decoration:underline" target="_blank">{{$phone}}</a>	
																			<br><a href="mailto:{{$configuration->email}}" target="_blank">{{$email}}</a>
																		</address>
																	</td>
																</tr>
															</tbody>
														</table>
														<p style="margin:0 0 16px">Thanks for using <a href="http://roiels.com" target="_blank">roiels.com</a>!</p>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>

</body>
</html>