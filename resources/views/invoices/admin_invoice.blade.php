<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <meta http-equiv="Content-Type" content="text/html;"/>
    <meta charset="UTF-8">
	<style media="all">
		*{
			margin: 0;
			padding: 0;
			line-height: 1.3;
			font-family: sans-serif;
			color: #333542;
		}
		body{
			font-size: .875rem;
		}
		.gry-color *,
		.gry-color{
			color:#878f9c;
		}
		table{
			width: 100%;
		}
		table th{
			font-weight: normal;
		}
		table.padding th{
			padding: .5rem .7rem;
		}
		table.padding td{
			padding: .7rem;
		}
		table.sm-padding td{
			padding: .2rem .7rem;
		}
		.border-bottom td,
		.border-bottom th{
			border-bottom:1px solid #eceff4;
		}
		.text-left{
			text-align:left;
		}
		.text-right{
			text-align:right;
		}
		.small{
			font-size: .85rem;
		}
		.currency{

		}
	</style>
</head>
<body>
	<div style="margin-left:auto;margin-right:auto;">

		@php
			$generalsetting = \App\GeneralSetting::first();
			
             $costumer_address = \App\Models\CustomerAdres::find($order->customer_addres_id);
             $shipping_address = json_decode($order->shipping_address);
             $shipping_info = json_decode($order->shipping_info);

                   
		@endphp

		<div style="background: #eceff4;padding: 1.5rem;">
			<table>
				<tr>
					<td>
						
						<img loading="lazy"  src="{{ asset('img/Rectangle.png') }}" height="40" style="display:inline-block;">
						
					</td>
					<td style="font-size: 2.5rem;" class="text-right strong">INVOICE</td>
				</tr>
			</table>
			<table>
				<tr>
					<td class="gry-color small">{{ $generalsetting->address }}</td>
					<td class="text-right"></td>
				</tr>
				<tr>
					<td class="gry-color small">Email: {{ $generalsetting->email }}</td>
					<td class="text-right small"><span class="gry-color small">Order ID:</span> <span class="strong">{{ $order->code }}</span></td>
				</tr>
				<tr>
					<td class="gry-color small">Phone: {{ $generalsetting->phone }}</td>
					<td class="text-right small"><span class="gry-color small">Order Date:</span> <span class=" strong">{{ date('d-m-Y', $order->date) }}</span></td>
				</tr>
			</table>

		</div>


		<div style="padding: 1.5rem;padding-bottom: 0">
			<address>
				<strong class="text-main">{{ $costumer_address->nama_depan }} {{ $costumer_address->nama_belakang }}</strong><br>
                 +62{{ $costumer_address->nomor_hp }}<br>
				 {{ $costumer_address->alamat_lengkap }}<br> {{ $costumer_address->kecamatan }}, {{ $costumer_address->city_name }}, {{ $costumer_address->province }} ({{ $costumer_address->postal_code }})<br><br>
                 
            </address>
		</div>

	    <div style="padding: 1.5rem;">
			<table class="padding text-left small border-bottom">
				<thead>
	                <tr class="gry-color" style="background: #eceff4;">
	                    <th width="35%">Product Name</th>
						<th width="15%">Delivery Type</th>
	                    <th width="10%">Qty</th>
	                    <th width="15%">Unit Price</th>
	                    <th width="10%">Tax</th>
	                    <th width="15%" class="text-right">Total</th>
	                </tr>
				</thead>
				<tbody class="strong">
	                @foreach ($order->orderDetails as $key => $orderDetail)
		                @if ($orderDetail->product != null)
							<tr class="">
								<td>{{ $orderDetail->product->name }} ({{ $orderDetail->variation }})</td>
								<td>
									@if ($orderDetail->shipping_type != null && $orderDetail->shipping_type == 'home_delivery')
										{{ __('Home Delivery') }}
									@elseif ($orderDetail->shipping_type == 'pickup_point')
										@if ($orderDetail->pickup_point != null)
											{{ $orderDetail->pickup_point->name }} ({{ __('Pickip Point') }})
										@endif
									@endif
								</td>
								<td class="gry-color">{{ $orderDetail->quantity }}</td>
								<td class="gry-color currency">{{ single_price($orderDetail->price/$orderDetail->quantity) }}</td>
								<td class="gry-color currency">{{ single_price($orderDetail->tax/$orderDetail->quantity) }}</td>
			                    <td class="text-right currency">{{ single_price($orderDetail->price+$orderDetail->tax) }}</td>
							</tr>
		                @endif
					@endforeach
	            </tbody>
			</table>
		</div>

	    <div style="padding:0 1.5rem;">
	        <table style="width: 40%;margin-left:auto;" class="text-right sm-padding small strong">
		        <tbody>
			        <tr>
			            <th class="gry-color text-left">Sub Total</th>
			            <td class="currency">{{ single_price($order->orderDetails->sum('price')) }}</td>
			        </tr>
			        <tr>
			            <th class="gry-color text-left">Voucher</th>
			            <td class="currency">{{ single_price($order->coupon_discount) }}</td>
			        </tr>
			        @if($shipping_info)
			        <tr>
			            <th class="gry-color text-left">Shipping Cost</th>
			            <td class="currency">{{ single_price( $shipping_info->cost ) }}</td>
			        </tr>
			        @endif
			        <tr class="border-bottom">
			            <th class="gry-color text-left">Free Shipping</th>
			            <td class="currency"> {{ single_price( $order->free_ongkir ) }}</td>
			        </tr>
			        <tr>
			            <th class="text-left strong">Grand Total</th>
			            <td class="currency">{{ single_price($order->grand_total+ $order->orderDetails->sum('tax')) }}</td>
			        </tr>

		        </tbody>
		    </table>
	    </div>

	</div>
</body>
</html>
