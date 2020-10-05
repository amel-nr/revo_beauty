@extends('layouts.app')

@section('content')

    <div class="panel">
    	<div class="panel-body">
    		<div class="invoice-masthead">
    			<div class="invoice-text">
    				<h3 class="h1 text-thin mar-no text-primary">{{ __('Detail Pembelian') }}</h3>
    			</div>
    		</div>
            <div class="row">
                @php
                    $delivery_status = $order->delivery_status;
                    $payment_status = $order->payment_status;
                    $costumer_address = \App\Models\CustomerAdres::find($order->customer_addres_id);
                    $shipping = json_decode($order->shipping_info);
                    $status_bayar = \App\Models\Mvariable::where(['var_id' => 'status_bayar'])->get();
                    $status_kirim = \App\Models\Mvariable::where(['var_id' => 'status_kirim'])->get();
                @endphp
                <div class="col-lg-offset-6 col-lg-3">
                    <label for=update_payment_status"">{{__('Status Pembayaran')}}</label>
                    <select class="form-control demo-select2"  data-minimum-results-for-search="Infinity" id="update_payment_status">
                        @foreach ($status_bayar as $key => $value)
                         @if($payment_status ==  $value->param_1)
                         <option value="{{ $value->param_1 }}" selected>{{ $value->param_2 }}</option>
                         @else
                         <option value="{{ $value->param_1 }}">{{ $value->param_2 }}</option>
                         @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-3">
                    <label for=update_delivery_status"">{{__('Status Pengiriman')}}</label>
                    <select class="form-control demo-select2"  data-minimum-results-for-search="Infinity" id="update_delivery_status">
                        @foreach ($status_kirim as $key => $value)
                         @if($delivery_status ==  $value->param_1)
                         <option value="{{ $value->param_1 }}" selected>{{ $value->param_2 }}</option>
                         @else
                         <option value="{{ $value->param_1 }}">{{ $value->param_2 }}</option>
                         @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <hr>
    		<div class="invoice-bill row">
    			<div class="col-sm-6 text-xs-center">
                    @if(isset($costumer_address))
    				<address>
        				<strong class="text-main">{{ $costumer_address->nama_depan }} {{ $costumer_address->nama_belakang }}</strong><br>
                         +62{{ $costumer_address->nomor_hp }}<br>
        				 {{ $costumer_address->alamat_lengkap }}<br> {{ $costumer_address->kecamatan }}, {{ $costumer_address->city_name }}, {{ $costumer_address->province }} ({{ $costumer_address->postal_code }})<br><br>
                         @if(isset($order->confrim_resi))
                         <p class="mt-3"><a href="{{ route('orders.tracking',encrypt($order->id)) }}" style="font-size: 16px; color: #F3795C;"><u>{{$order->confrim_resi}}</u></a> <i class="fa fa-pencil" style="font-size: 19px; color: #F3795C;cursor: pointer;" data-toggle="modal" data-target="#exampleModal"></i></p>
                         @else
                          <p class="mt-3"><a href="#" data-toggle="modal" data-target="#exampleModal" style="font-size: 16px; color: #F3795C;"><u>Input Nomor Resi</u></a></p>
                         @endif
                    </address>
                    @endif
                  
                    @if ($order->order_confrim != null)
                        <br>
                        <strong class="text-main">{{ __('Payment Information') }}</strong><br>
                         Nama Bank: {{ $order->order_confrim->bank }}<br> 
                         Nomer Rek: {{ $order->order_confrim->an_rek }}<br>
                         Atas Nama: {{ $order->order_confrim->no_rek }}
                        <br><br>
                        <a href="{{ asset( $order->order_confrim->upload_img ) }}" target="_blank"><img src="{{ asset( $order->order_confrim->upload_img ) }}" alt="" height="100"></a>
                    @endif
    			</div>
    			<div class="col-sm-6 text-xs-center">
    				<table class="invoice-details">
    				<tbody>
    				<tr>
    					<td class="text-main text-bold">
    						{{__('Nomor Pesanan')}}
    					</td>
    					<td class="text-right text-info text-bold">
    						{{ $order->code }}
    					</td>
    				</tr>
    				<tr>
    					<td class="text-main text-bold">
    						{{__('Status Pesanan')}}
    					</td>
                        @php
                            $status = $order->orderDetails->first()->delivery_status;
                            $status_order = \App\Models\Mvariable::where(['var_id' => 'status_order','param_1' => $order->payment_status,'param_2' => $order->delivery_status ])->first();
                        @endphp
    					<td class="text-right">
                            @if(isset($status_order))
                                @if($order->delivery_status == 'delivered')
                                    <span class="badge badge-success">{{ $status_order->param_3 }}</span>
                                @else
                                    <span class="badge badge-info">{{ $status_order->param_3 }}</span>
                                @endif
                            @endif
    					</td>
    				</tr>
    				<tr>
    					<td class="text-main text-bold">
    						{{__('Tanggal Pesanan')}}
    					</td>
    					<td class="text-right">
    						{{ date('d-m-Y h:i A', $order->date) }} (UTC)
    					</td>
    				</tr>
                    <tr>
    					<td class="text-main text-bold">
    						{{__('Total')}}
    					</td>
    					<td class="text-right">
                           
    						{{ single_price($order->grand_total+ $order->orderDetails->sum('tax')) }}
    					</td>
    				</tr>
                    <tr>
    					<td class="text-main text-bold">
    						{{__('Metode Pembayaran')}}
    					</td>
    					<td class="text-right">
                            @if($order->payment_type == 'mt_tf_bca')
                            BCA Virtual Account
                            @elseif($order->payment_type == 'mt_tf_mdr')
                            Mandiri Virtual Account
                            @elseif($order->payment_type == 'mt_tf_bni')
                            BNI Virtual Account
                            @elseif($order->payment_type == 'mt_tf_permata')
                            Permata Virtual Account
                            @elseif($order->payment_type == 'manual_bca')
                            BCA Transfer Manual
                            @elseif($order->payment_type == 'manual_mandiri')
                            Mandiri Transfer Manual
                            @elseif($order->payment_type == 'manual_permata')
                            Permata Transfer Manual
                            @elseif($order->payment_type == 'ovo')
                            OVO
                            @elseif($order->payment_type == 'gopay')
                            GO-PAY
                            @elseif($order->payment_type == 'Indomaret')
                            Indomaret
                            @elseif($order->payment_type == 'alfamart')
                            Alfamart
                            @elseif($order->payment_type == 'qris')
                            QRIS
                            @endif
    					</td>
    				</tr>
                    <tr>
                        <td class="text-main text-bold">
                            {{__('Ekspedisi')}}
                        </td>
                        <td class="text-right">
                            @if(isset($shipping))
                            {{ strtoupper($shipping->code) }} {{ $shipping->services }}
                            @endif
                        </td>
                    </tr>
    				</tbody>
    				</table>
    			</div>
    		</div>
    		<hr class="new-section-sm bord-no">
    		<div class="row">
    			<div class="col-lg-12 table-responsive">
    				<table class="table table-bordered invoice-summary">
        				<thead>
            				<tr class="bg-trans-dark">
                                <th class="min-col">#</th>
                                <th width="10%">
            						{{__('Foto Produk')}}
            					</th>
            					<th class="text-uppercase">
            						{{__('Deskripsi')}}
            					</th>
            					<th class="min-col text-center text-uppercase">
            						{{__('Jumlah')}}
            					</th>
            					<th class="min-col text-center text-uppercase">
            						{{__('Harga')}}
            					</th>
            					<th class="min-col text-right text-uppercase">
            						{{__('Total')}}
            					</th>
            				</tr>
        				</thead>
        				<tbody>
                            @php
                                $admin_user_id = \App\User::where('user_type', 'admin')->first()->id;
                                $count = 1;
                                $tmpOrder = \App\Models\Order::where('id',$order->id)->with('orderProductPoints','orderSamples')->first();
                            @endphp
                            @foreach ($order->orderDetails->where('seller_id', $admin_user_id) as $key => $orderDetail)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>
                                        @if ($orderDetail->product != null)
                    						<a href="{{ route('product', $orderDetail->product->slug) }}" target="_blank"><img height="50" src={{ asset($orderDetail->product->thumbnail_img) }}/></a>
                                        @else
                                            <strong>{{ __('N/A') }}</strong>
                                        @endif
                                    </td>
                					<td>
                                        @if ($orderDetail->product != null)
                    						<strong><a href="{{ route('product', $orderDetail->product->slug) }}" target="_blank">{{ $orderDetail->product->name }}</a></strong>
                    						<small>{{ $orderDetail->variation }}</small>
                                        @else
                                            <strong>{{ __('Product Unavailable') }}</strong>
                                        @endif
                					</td>
                					<td class="text-center">
                						{{ $orderDetail->quantity }}
                					</td>
                					<td class="text-center">
                						{{ single_price($orderDetail->price/$orderDetail->quantity) }}
                					</td>
                                    <td class="text-center">
                						{{ single_price($orderDetail->price) }}
                					</td>
                				</tr>
                            @endforeach
                            @foreach ($tmpOrder->orderProductPoints as $key => $value)
                                 @php
                                    $_tmpp =json_decode($value->log_product_point); 
                                    $product = \App\Product::where('id',$_tmpp->product_id)->with('brand')->first();
                                @endphp
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>
                                        @if ($product != null)
                                            <a href="{{ route('product', $product->slug) }}" target="_blank"><img height="50" src={{ asset($product->thumbnail_img) }}/></a>
                                        @else
                                            <strong>{{ __('N/A') }}</strong>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($product != null)
                                            <strong><a href="{{ route('product', $product->slug) }}" target="_blank">{{ $product->name }}</a></strong><br>
                                            <strong style="color: black;">(tukar poin)</strong>
                                        @else
                                            <strong>{{ __('Product Unavailable') }}</strong>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{ $value->quantity }}
                                    </td>
                                    <td class="text-center">
                                        GRATIS
                                    </td>
                                    <td class="text-center">
                                        GRATIS
                                    </td>
                                </tr>

                            @endforeach
                            @foreach ($tmpOrder->orderSamples as $key => $value)
                                 @php
                                    $_tmpp = \App\Models\Sample::find($value->sample_id); 
                                    $product = \App\Product::where('id',$_tmpp->product_id)->with('brand')->first();
                                @endphp
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>
                                        @if ($product != null)
                                            <a href="{{ route('product', $product->slug) }}" target="_blank"><img height="50" src={{ asset($product->thumbnail_img) }}/></a>
                                        @else
                                            <strong>{{ __('N/A') }}</strong>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($product != null)
                                            <strong><a href="{{ route('product', $product->slug) }}" target="_blank">{{ $product->name }}</a></strong><br>
                                            <strong style="color: black;">(sample)</strong>
                                        @else
                                            <strong>{{ __('Product Unavailable') }}</strong>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{ $value->quantity }}
                                    </td>
                                    <td class="text-center">
                                        GRATIS
                                    </td>
                                    <td class="text-center">
                                        GRATIS
                                    </td>
                                </tr>

                            @endforeach

        				</tbody>
    				</table>
    			</div>
    		</div>
    		<div class="clearfix">
    			<table class="table invoice-total">
    			<tbody>
    			<tr>
    				<td>
    					<strong>{{__('Sub Total')}} :</strong>
    				</td>
    				<td>
    					{{ single_price($order->orderDetails->where('seller_id', $admin_user_id)->sum('price')) }}
    				</td>
    			</tr>
    			<tr>
    				<td>
    					<strong>{{__('Voucher')}} :</strong>
    				</td>
    				<td>
    					{{ single_price($order->coupon_discount) }}
    				</td>
    			</tr>
                <tr>
    				<td>
    					<strong>{{__('Shipping')}} :</strong>
    				</td>
    				<td>
    					{{ single_price( $shipping->cost ) }}
    				</td>
    			</tr>
                <tr>
                    <td>
                        <strong>{{__('Free Shipping')}} :</strong>
                    </td>
                    <td>
                        {{ single_price( $order->free_ongkir ) }}
                    </td>
                </tr>
    			<tr>
    				<td>
    					<strong>{{__('TOTAL')}} :</strong>
    				</td>
    				<td class="text-bold h4">
    					{{ single_price($order->grand_total+ $order->orderDetails->sum('tax')) }}
    				</td>
    			</tr>
    			</tbody>
    			</table>
    		</div>
    		<div class="text-right no-print" style="display: none;">
    			<a href="{{ route('customer.invoice.download', $order->id) }}" class="btn btn-default"><i class="demo-pli-printer icon-lg"></i></a>
    		</div>
    	</div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Input Nomor Resi Pengiriman</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="{{ route('order.confrim_courier') }}">
          <div class="modal-body">
           
              @csrf
              <input type="hidden" name="order_id" value="{{ $order->id }}">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Courier:</label>
                <select class="form-control" id="confrim_courier" name="confrim_courier" required>
                    <option value="jne" {{ isset($order->confrim_courier) && $order->confrim_courier == 'jne' ? 'selected' : '' }}>Jalur Nugraha Ekakurir (JNE)</option>
                    <option value="jnt" {{ isset($order->confrim_courier) && $order->confrim_courier == 'j&t' ? 'selected' : '' }}>J&T Express (J&T)</option>
                    <option value="ninja" {{ isset($order->confrim_courier) && $order->confrim_courier == 'ninja' ? 'selected' : '' }} >Ninja Xpress (NINJA)</option>
                    <option value="sicepat" {{ isset($order->confrim_courier) && $order->confrim_courier == 'sicepat' ? 'selected' : '' }}>Sicepat</option>
                    <option value="grab" {{ isset($order->confrim_courier) && $order->confrim_courier == 'grab' ? 'selected' : '' }} >GRAB</option>
                    <option value="gojek" {{ isset($order->confrim_courier) && $order->confrim_courier == 'gojek' ? 'selected' : '' }} >GOJEK</option>
                </select>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Nomor Resi:</label>
                <textarea class="form-control" id="message-text" required name="confrim_resi">{{ isset($order->confrim_resi) ? $order->confrim_resi : '' }}</textarea>
              </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" name="submit" class="btn btn-primary" value="Save"/>
          </div>
          </form>
        </div>
      </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $('#update_delivery_status').on('change', function(){
            var order_id = {{ $order->id }};
            var status = $('#update_delivery_status').val();
            $.post('{{ route('orders.update_delivery_status') }}', {_token:'{{ @csrf_token() }}',order_id:order_id,status:status}, function(data){
                showAlert('success', 'Delivery status has been updated');
                location.reload();
            });
        });

        $('#update_payment_status').on('change', function(){
            var order_id = {{ $order->id }};
            var status = $('#update_payment_status').val();
            $.post('{{ route('orders.update_payment_status') }}', {_token:'{{ @csrf_token() }}',order_id:order_id,status:status}, function(data){
                showAlert('success', 'Payment status has been updated');
                // location.reload();
            });
        });
    </script>
@endsection
