@extends('layouts.app')

@section('content')
@php
    $delivery_status = $order->orderDetails->first()->delivery_status;
    $payment_status = $order->payment_status;
    $costumer_address = \App\Models\CustomerAdres::find($order->customer_addres_id);
    $shipping = json_decode($order->shipping_info);

@endphp
    <div class="panel">
    	<div class="panel-body">
    		<div class="invoice-masthead">
    			<div class="invoice-text">
    				<h3 class="h1 text-thin mar-no text-primary">{{ __('Detail Komplain') }}</h3>
    			</div>
    		</div>
    		<div class="invoice-bill row">
    			<div class="col-sm-6 text-xs-center">
                    @if(isset($costumer_address))
    				<address>
        				<strong class="text-main">{{ $costumer_address->nama_depan }} {{ $costumer_address->nama_belakang }}</strong><br>
                         +62{{ $costumer_address->nomor_hp }}<br>
        				 {{ $costumer_address->alamat_lengkap }}<br> {{ $costumer_address->kecamatan }}, {{ $costumer_address->city_name }}, {{ $costumer_address->province }} ({{ $costumer_address->postal_code }})<br><br>
                    </address>
                    @endif
                  
                    @if ($order->manual_payment && is_array(json_decode($order->manual_payment_data, true)))
                        <br>
                        <strong class="text-main">{{ __('Informasi Pembayaran') }}</strong><br>
                        Nama: {{ json_decode($order->manual_payment_data)->name }}, Jumlah: {{ single_price(json_decode($order->manual_payment_data)->amount) }}, ID Transaksi: {{ json_decode($order->manual_payment_data)->trx_id }}
                        <br>
                        <a href="{{ asset(json_decode($order->manual_payment_data)->photo) }}" target="_blank"><img src="{{ asset(json_decode($order->manual_payment_data)->photo) }}" alt="" height="100"></a>
                    @endif
    			</div>
    			<div class="col-sm-6 text-xs-center">
                    @if(isset($order->order_confrim))
                    <p class="mt-3"><a href="{{ route('confirmation_payment',encrypt($order->id)) }}" style="font-size: 16px; color: #F3795C;"><u>Lihat Bukti Pembayaran</u></a></p>
                    @endif
                    
    				<table class="invoice-details">
    				<tbody>
    				<tr>
    					<td class="text-main text-bold">
    						{{__('Kode Pesanan')}}
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
                            @elseif($order->payment_type == 'manual_bca')
                            BCA Manual
                            @elseif($order->payment_type == 'manual_mandiri')
                            Mandiri Manual
                            @elseif($order->payment_type == 'manual_permata')
                            Permata Manual
                            @endif
    					</td>
    				</tr>
                    <tr>
                        <td class="text-main text-bold">
                            {{__('Metode Pengiriman')}}
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
            <br>
            <p style="font-weight: 700; font-size: 16px;">Detail Pesanan</p>
    		<hr>
    		<div class="row">
    			<div class="col-lg-12 table-responsive">
    				<table class="table table-bordered invoice-summary">
        				<thead>
            				<tr class="bg-trans-dark">
                                <th class="min-col">#</th>
                                <th width="10%">
            						{{__('Foto')}}
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
                                            <strong>{{ __('Tidak Ada') }}</strong>
                                        @endif
                                    </td>
                					<td>
                                        @if ($orderDetail->product != null)
                    						<strong><a href="{{ route('product', $orderDetail->product->slug) }}" target="_blank">{{ $orderDetail->product->name }}</a></strong>
                    						<small>{{ $orderDetail->variation }}</small>
                                        @else
                                            <strong>{{ __('Produk Tidak Tersedia') }}</strong>
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
                                            <strong>{{ __('Tidak Ada') }}</strong>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($product != null)
                                            <strong><a href="{{ route('product', $product->slug) }}" target="_blank">{{ $product->name }}</a></strong><br>
                                            <strong style="color: black;">(tukar poin)</strong>
                                        @else
                                            <strong>{{ __('Produk Tidak Tersedia') }}</strong>
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
                                            <strong>{{ __('Tidak Ada') }}</strong>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($product != null)
                                            <strong><a href="{{ route('product', $product->slug) }}" target="_blank">{{ $product->name }}</a></strong><br>
                                            <strong style="color: black;">(sample)</strong>
                                        @else
                                            <strong>{{ __('Produk Tidak Tersedia') }}</strong>
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
    			{{--<tr>
    				<td>
    					<strong>{{__('Pajak')}} :</strong>
    				</td>
    				<td>
    					{{ single_price($order->orderDetails->where('seller_id', $admin_user_id)->sum('tax')) }}
    				</td>
    			</tr>--}}
                <tr>
    				<td>
    					<strong>{{__('Ongkos Kirim')}} :</strong>
    				</td>
    				<td>
    					{{ single_price( $shipping->cost ) }}
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
            <p style="font-weight: 700; font-size: 16px;">Detail Komplain<span class="badge badge-info" style="margin-left: 5px;">{{ $komplain->statusKomplain->param_2 }}</span></p>
            <hr>

            <div class="row" style="margin:10px;">
               <p class="text-bold">Barang yang dikomplain</p><br>
                <div class="row">
                    @foreach ($order->orderDetails->whereIn('id', json_decode($komplain->product_komplain)) as $key => $orderDetail)

                    <div class="col-sm-4">
                        <div class="col-sm-3">
                            <img src="{{ isset($orderDetail->product->thumbnail_img) ? asset($orderDetail->product->thumbnail_img) : asset('frontend/images/placeholder.jpg') }}" width="70" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                        </div>
                        <div class="col-sm-6">
                            @if(isset($orderDetail->product->brand->name))
                            <p class="font-weight-bold mb-0" style="font-size: 18px;">{{ $orderDetail->product->brand->name }}</p>
                            @endif
                            <p class="mb-0" style="font-size: 13px; line-height: 16px;">{{ $orderDetail->product->name }}</a></strong>
                                            <small>{{ $orderDetail->variation }}</small></p>
                            {{--<p class="mb-0 font-weight-bold" style="font-size: 15px;">{{ single_price($orderDetail->price) }}</p>--}}
                        </div>
                        
                    </div>
                    @endforeach
                    
                </div>
            </div>
            <div class="row" style="margin:10px;">
                <p class="text-bold">Foto</p>
                <div class="row"> 
                @php
                $photos =  json_decode($komplain->photos_komplain);
                @endphp
                @if(isset($photos) && count($photos) > 0)
                @foreach ($photos as $key => $photo)
                <div class="col-sm-2">
                    <img src="{{ asset($photo) }}" height="100" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                </div>
                @endforeach
                @endif
                </div>
            </div>
            <br>
            <div class="row" style="margin:2px;">
                <div class="col-sm-6">
                   <p class="text-bold">Masalah</p>
                   <label>- {{ $komplain->masalah->param_2 }}</label>
                   <p class="text-bold">Solusi</p>
                   <label>- {{ $komplain->solusiKomplain->param_2 }}</label>
                </div>
                <div class="col-sm-6">
                    <p class="text-bold">Catatan</p>
                    <p>{{ $komplain->catatan}}</p>
                </div>
            </div>
            @if(isset($komplain->nomer_resi_pengembalian))
             <div class="row" style="margin:2px;">
                <div class="col-sm-6">
                   <p class="text-bold">Nomor resi pengembalian</p>
                   <label>- {{ $komplain->nomer_resi_pengembalian }} ({{ $komplain->jenis_resi_pengembalian }})</label>

                </div>
                
            </div>
            @endif
            @if(isset($komplain->photos_bukti_transfer))
            <div class="row" style="margin:10px;">
                <p class="text-bold">Foto bukti transfer</p>
                <div class="row"> 
                @php
                $photos =  json_decode($komplain->photos_bukti_transfer);
                @endphp
                @if(isset($photos) && count($photos) > 0)
                @foreach ($photos as $key => $photo)
                <div class="col-sm-2">
                    <img src="{{ asset($photo) }}" height="100" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                </div>
                @endforeach
                @endif
                </div>
            </div>
            @endif
            <hr>
            {{--@if($komplain->statusKomplain->param_3 == 'request' || $komplain->statusKomplain->param_3 == 'dalam_verifikasi' )
            <div class="row" style="margin:2px;">
                <button  class="btn btn-success text-center btn-pakai w-100 font-weight-bold py-2" data-toggle="modal" data-target="#modal-tindakan">Ya, Komplain Selesai</button>
                <button class="btn btn-danger text-center btn-pakai w-100 font-weight-bold py-2">Tidak</button>
                
            </div>
            @endif--}}
            @if($komplain->statusKomplain->param_3 != 'completed') 
            <div class="row">
                <button class="btn btn-success text-center btn-pakai w-100 font-weight-bold py-2" onclick="selesai_komplain();">Komplain Selesai</button>
                
            </div>
            @endif
    	</div>
    </div>

    <div class="modal"  tabindex="-1" role="dialog" id="modal-tindakan">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Pilih Tindakan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{ route('komplain.status', encrypt($komplain->id)) }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="request_upload_resi" required>
              <label class="form-check-label" for="exampleRadios1">
                Kirim Permintaan resi pengiriman pengembalian
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="upload_bukti_refund" required>
              <label class="form-check-label" for="exampleRadios2">
                Upload bukti transfer pengembalian dana
              </label>
              <div id="upload-bukti" style="min-height: 200px;">
             
              </div>
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
          </form>
        </div>
      </div>
    </div>
@endsection

@section('script')
<script type="text/javascript">
    function selesai_komplain()
    {
        if (confirm('Apa Anda yakin komplain selesai?')) {
          // Save it!
          
            $.post('{{ route('komplain.selesai') }}', { _token : '{{ @csrf_token() }}', id : {{ $komplain->id}} }, function(data){
                location.reload();
            });
        } else {
          // Do nothing!
          console.log('Thing was not saved to the database.');
        }

    }
    $(document).ready(function(){
        $("#upload-bukti").spartanMultiImagePicker({
            fieldName:        'photos[]',
            maxCount:         10,
            rowHeight:        '200px',
            groupClassName:   'col-md-4 col-sm-4 col-xs-6',
            maxFileSize:      '',
            dropFileLabel : "Drop Here",
            onExtensionErr : function(index, file){
                console.log(index, file,  'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr : function(index, file){
                console.log(index, file,  'file size too big');
                alert('File size too big');
            }
        });

         $('input:radio[name=status]').change(function() {
            if (this.value == 'upload_bukti_refund') {
                $('.spartan_image_input').attr("required",true);
            }
            else if (this.value == 'transfer') {
                 $('.spartan_image_input').attr("required",false);
            }
        });




    });
</script>
@endsection

