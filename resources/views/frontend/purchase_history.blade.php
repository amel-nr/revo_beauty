@extends('frontend.layouts.app')

@section('content')

    <section class="gry-bg pb-4 profile" style="background-color: #FCF8F0;">
        <h1 class="font-weight-bold h3 mb-5 py-5 text-center" style="background-color: #F3795C; color: white;">PHOEBE’S SQUAD</h1>
        <div class="container">
            @include('frontend.inc.account_mobile_menu')
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-3 d-none d-lg-block">
                    @if(Auth::user()->user_type == 'seller')
                        @include('frontend.inc.seller_side_nav')
                    @elseif(Auth::user()->user_type == 'customer')
                        @include('frontend.inc.customer_side_nav')
                    @endif
                </div>

                <div class="col-lg-9">
                    @if (count($orders) > 0)
                    <div class="text-center" style="border-bottom: 1px solid #F3795C;">
                        <h1 class="py-2 mb-0 font-weight-bold heading heading-4">PESANAN</h1>
                    </div>
                   
                        <div class="py-4">
                        <div class="row" style="border-bottom: 2px solid #F3795C;">
                            <div class="col-md-3 col-6">
                                <h1 class="py-2 mb-0 font-weight-bold heading heading-4">ORDER</h1>
                            </div>
                            <div class="col-md-3 col-6">
                                <h1 class="py-2 mb-0 font-weight-bold heading heading-4">DATE</h1>
                            </div>
                            <div class="col-md-3 col-6">
                                <h1 class="py-2 mb-0 font-weight-bold heading heading-4">STATUS</h1>
                            </div>
                            <div class="col-md-3 col-6">
                                <h1 class="py-2 mb-0 font-weight-bold heading heading-4">TOTAL</h1>
                            </div>
                        </div>

                        @foreach ($orders as $key => $order)
                            @php
                            $komplain = \App\Models\OrdersKomplain::where('order_id',$order->id)->first();
                            $status_order = \App\Models\Mvariable::where(['var_id' => 'status_order','param_1' => $order->payment_status,'param_2' => $order->delivery_status ])->first();
                            @endphp
                            <div class="row my-2" style="border-bottom: 1px solid #ddd; border-top: 1px solid #ddd;">
                                <div class="col-md-3 col-6">
                                    <h1 class="py-2 mb-0 heading heading-5" style="font-weight: 600;"> <a href="#{{ $order->code }}" onclick="show_purchase_history_details({{ $order->id }})">#{{ $order->code }}</a></h1>
                                </div>
                                <div class="col-md-3 col-6">
                                    <h1 class="py-2 mb-0 heading heading-5" style="font-weight: 600;">{{ date('d-m-Y', $order->date) }}</h1>
                                </div>
                                <div class="col-md-3 col-6">
                                    
                                    <h1 class="py-2 mb-0 heading heading-5" style="font-weight: 600;">
                                        @if(isset($status_order))
                                            {{ $status_order->param_3 }}
                                        @endif
                                    </h1>
                                </div>
                                <div class="col-md-3 col-6">
                                    <h1 class="py-2 mb-0 heading heading-5" style="font-weight: 600;"> {{ single_price($order->grand_total+$order->uniq_tf_manual) }}</h1>
                                </div>
                            </div>
                            <div class="row pt-3">
                            @if (count($order->orderDetails) > 0)
                                <div class="col-md-4 col-12">
                                @foreach ($order->orderDetails as $key => $value)
                                    @php
                                    $product = \App\Product::where('id',$value->product_id)->with('brand')->first();
                                    $shipping = json_decode($order->shipping_info);
                                    $costumer_address = \App\Models\CustomerAdres::find($order->customer_addres_id);
                                    $mitrans  = json_decode($order->mitrans_val);
                                    @endphp
                                    @if(isset($product))
                                    <div class="row px-4"  style="margin-bottom: 5px;">
                                        <div class="col-6 pl-0">
                                            <img src="{{ isset($product->thumbnail_img) ? asset($product->thumbnail_img) : asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                        </div>
                                        <div class="col-6 pl-0">
                                            @if(isset($product->brand->name))
                                            <p class="font-weight-bold mb-0" style="font-size: 18px;">{{ $product->brand->name }}</p>
                                            @endif
                                            <p class="mb-0" style="font-size: 13px; line-height: 16px;">{{ $product->name }}</p>
                                            <p class="mb-0" style="font-size: 13px; line-height: 16px;">Qty {{ $value->quantity }}</p>
                                            <p class="mb-0 font-weight-bold" style="font-size: 15px;">{{ single_price($value->price) }}</p>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                @php
                                    $tmpOrder = \App\Models\Order::where('id',$order->id)->with('orderProductPoints','orderSamples')->first();
                                @endphp

                                @foreach ($tmpOrder->orderProductPoints as $key => $value)
                                   @php
                                    $_tmpp =json_decode($value->log_product_point); 
                                    $product = \App\Product::where('id',$_tmpp->product_id)->with('brand')->first();
                                    $shipping = json_decode($order->shipping_info);
                                    $costumer_address = \App\Models\CustomerAdres::find($order->customer_addres_id);
                                    $mitrans  = json_decode($order->mitrans_val);
                                    @endphp
                                    @if(isset($product))
                                    <div class="row px-4" style="margin-bottom: 5px;">
                                        <div class="col-6 pl-0">
                                            <img src="{{ isset($product->thumbnail_img) ? asset($product->thumbnail_img) : asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                        </div>
                                        <div class="col-6 pl-0">
                                            @if(isset($product->brand))
                                            <p class="font-weight-bold mb-0" style="font-size: 18px;">{{ $product->brand->name }}</p>
                                            @endif
                                            <p class="mb-0" style="font-size: 13px; line-height: 16px;">{{ $product->name }}</p>
                                            <p class="mb-0" style="font-size: 13px; line-height: 16px;">Qty {{ $value->quantity }}</p>
                                            <p class="mb-0" style="font-size: 13px; line-height: 16px;">(tukar poin)</p>
                                            <p class="mb-0 font-weight-bold" style="font-size: 15px;">GRATIS</p>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                @foreach ($tmpOrder->orderSamples as $key => $value)
                                   @php
                                    $_tmpp = \App\Models\Sample::find($value->sample_id); 
                                    $product = \App\Product::where('id',$_tmpp->product_id)->with('brand')->first();
                                    $shipping = json_decode($order->shipping_info);
                                    $costumer_address = \App\Models\CustomerAdres::find($order->customer_addres_id);
                                    $mitrans  = json_decode($order->mitrans_val);

                                    @endphp
                                    @if(isset($product))
                                    <div class="row px-4"  style="margin-bottom: 5px;">
                                        <div class="col-6 pl-0">
                                            <img src="{{ isset($product->thumbnail_img) ? asset($product->thumbnail_img) : asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                        </div>
                                        <div class="col-6 pl-0">
                                            @if(isset($product->brand))
                                            <p class="font-weight-bold mb-0" style="font-size: 18px;">{{ $product->brand->name }}</p>
                                            @endif
                                            <p class="mb-0" style="font-size: 13px; line-height: 16px;">{{ $product->name }}</p>
                                            <p class="mb-0" style="font-size: 13px; line-height: 16px;">Qty {{ $value->quantity }}</p>
                                            <p class="mb-0" style="font-size: 13px; line-height: 16px;">(sample)</p>
                                            <p class="mb-0 font-weight-bold" style="font-size: 15px;">GRATIS</p>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                </div>
                                <div class="col-md-4 col-6">
                                    <h2 class="mb-0 heading heading-5" style="font-weight: 600;">Subtotal</h2>
                                    <h3 class="mb-3 heading heading-5" style="font-weight: 400;">{{ single_price($order->orderDetails->sum('price')) }}</h3>
                                    
                                    <h2 class="mb-0 heading heading-5" style="font-weight: 600;">Voucher</h2>
                                    <h3 class="mb-3 heading heading-5" style="font-weight: 400;">{{ single_price($order->coupon_discount) }}</h3>
                                    <h2 class="mb-0 heading heading-5" style="font-weight: 600;">Shipping</h2>
                                    <h3 class="mb-3 heading heading-5" style="font-weight: 400;">{{ single_price($shipping->cost) }}</h3>
                                    <h2 class="mb-0 heading heading-5" style="font-weight: 600;">Free Shipping</h2>
                                    <h3 class="mb-3 heading heading-5" style="font-weight: 400;">{{ single_price($order->free_ongkir) }}</h3>
                                    <h2 class="mb-0 heading heading-5" style="font-weight: 600;">TOTAL</h2>
                                    @if($order->payment_type == 'manual_bca' || $order->payment_type == 'manual_mandiri' || $order->payment_type == 'manual_permata'  )
                                    <h3 class="mb-3 heading heading-5" style="font-weight: 400;">{{ single_price($order->grand_total+$order->uniq_tf_manual) }}</h3>
                                    @else
                                    <h3 class="mb-3 heading heading-5" style="font-weight: 400;">{{ single_price($order->grand_total) }}</h3>
                                    @endif
                                </div>
                                <div class="col-md-4 col-6">
                                    <h2 class="mb-0 heading heading-5" style="font-weight: 600;">Payment Method</h2>
                                    @if(isset($mitrans) && $order->payment_type == 'mt_tf_bca')

                                    <h3 class="mb-3 heading heading-5" style="font-weight: 400;">BCA Virtual<br>
                                        No. {{ $mitrans->va_numbers[0]->va_number }}
                                    </h3>
                                    @elseif(isset($mitrans) && $order->payment_type == 'mt_tf_bni')

                                    <h3 class="mb-3 heading heading-5" style="font-weight: 400;">BNI Virtual<br>
                                        No. {{ $mitrans->va_numbers[0]->va_number }}
                                    </h3>
                                    @elseif(isset($mitrans) && $order->payment_type == 'mt_tf_permata')

                                    <h3 class="mb-3 heading heading-5" style="font-weight: 400;">Permata Virtual<br>
                                        No. {{ $mitrans->permata_va_number }}
                                    </h3>
                                    @elseif( isset($mitrans) && $order->payment_type == 'mt_tf_mdr')
                                     <h3 class="mb-3 heading heading-5" style="font-weight: 400;">Mandiri Bill Payment<br>
                                        Bill key: {{ $mitrans->bill_key }}<br>
                                        Biller code: {{ $mitrans->biller_code}}
                                    </h3>
                                    @elseif( isset($mitrans) && $order->payment_type == 'Indomaret')
                                     <h3 class="mb-3 heading heading-5" style="font-weight: 400;">Indomaret<br>
                                         Code: {{ $mitrans->payment_code}}
                                    </h3>
                                    @elseif( isset($mitrans) && $order->payment_type == 'alfamart')
                                     <h3 class="mb-3 heading heading-5" style="font-weight: 400;">Alfamart<br>
                                         Code: {{ $mitrans->payment_code}}
                                    </h3>
                                    @elseif( isset($mitrans) && $order->payment_type == 'gopay')
                                     <h3 class="mb-3 heading heading-5" style="font-weight: 400;">GOPAY<br>
                                        
                                    </h3>
                                    @elseif( isset($mitrans) && $order->payment_type == 'ovo')
                                     <h3 class="mb-3 heading heading-5" style="font-weight: 400;">OVO<br>
                                         
                                    </h3>
                                    @elseif( isset($mitrans) && $order->payment_type == 'qris')
                                     <h3 class="mb-3 heading heading-5" style="font-weight: 400;">QRIS<br>
                                        
                                    </h3>
                                    @elseif($order->payment_type == 'manual_bca')
                                     <h3 class="mb-3 heading heading-5" style="font-weight: 400;">Transfer BCA (Manual)<br>
                                        
                                    </h3>
                                    @elseif($order->payment_type == 'manual_mandiri')
                                     <h3 class="mb-3 heading heading-5" style="font-weight: 400;">Transfer Mandiri (Manual)<br>
                                        
                                    </h3>
                                    @elseif($order->payment_type == 'manual_permata')
                                     <h3 class="mb-3 heading heading-5" style="font-weight: 400;">Transfer Permata (Manual)<br>
                                        
                                    </h3>
                                    @endif

                                    <h2 class="mb-0 heading heading-5" style="font-weight: 600;">Delivery Address</h2>
                                    <h3 class="mb-3 heading heading-5" style="font-weight: 400;">
                                        <address>
                                            <u>{{ $costumer_address->nama_depan }} {{ $costumer_address->nama_belakang }}</u><br>
                                             +62{{ $costumer_address->nomor_hp }}<br>
                                             {{ $costumer_address->alamat_lengkap }}<br> {{ $costumer_address->kecamatan }}, {{ $costumer_address->city_name }}, {{ $costumer_address->province }} ({{ $costumer_address->postal_code }})
                                        </address>
                                    </h3>
                                </div>
                            @endif
                            </div>
                            <div class="mb-5">
                                @if(isset($komplain))
                                    @if($komplain->statusKomplain->param_3 == 'request_upload_resi')
                                    <a href="#" type="button"  class="btn btn-danger text-center btn-pakai px-3 font-weight-bold" onclick="modalInputResiOrderRefund('{{ encrypt($komplain->id)}}');">ISI NOMOR RESI PENGEMBALIAN</a>
                                    @elseif($komplain->statusKomplain->param_3 == 'upload_bukti_refund')
                                    <a href="#" type="button"  class="btn btn-danger text-center btn-pakai px-3 font-weight-bold" onclick="modalBuktiTransfer('{{ $komplain->photos_bukti_transfer }}')">Lihat Bukti Pengembalian dana</a>
                                    @endif

                                @else
                                    @if( isset($order->confrim_resi) )
                                        <p class="mt-3"><a href="{{ route('orders.tracking',encrypt($order->id)) }}" style="font-size: 16px; color: #F3795C;"><u>Lacak Pesanan</u></a></p>
                                    @endif
                                    @if($order->payment_status == 'unpaid')
                                    <div class="py-2">
                                        @if( isset($mitrans) && $order->payment_type == 'gopay' || $order->payment_type == 'qris' || $order->payment_type == 'ovo' )
                                        <a href="{{ route('order.qr',encrypt($order->id)) }}" type="button"  class="btn btn-danger text-center btn-pakai px-3 font-weight-bold">BAYAR SEKARANG</a>
                                        @elseif($order->payment_type == 'manual_bca' || $order->payment_type == 'manual_mandiri' || $order->payment_type == 'manual_permata'  )
                                        
                                           
                                            <a href="{{ route('order_confirmed',encrypt($order->id)) }}" type="button"  class="btn btn-danger text-center btn-pakai px-3 font-weight-bold">BAYAR 
                                        SEKARANG</a>
                                        @else
                                        <a href="#" type="button" data-toggle="modal" data-target="#modalLangkahPembayaran" class="btn btn-danger text-center btn-pakai px-3 font-weight-bold">BAYAR SEKARANG</a>
                                        @endif
                                    </div>
                                    

                                    @elseif($order->delivery_status == 'on_delivery' || $order->delivery_status == 'delivered' )

                                    <div class="row">
                                        <div class="col-md-8 col-12 mx-auto">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="py-2">
                                                        <button  class="btn btn-danger text-center btn-pakai w-100 font-weight-bold py-2" onclick="modalConfrimOrder('{{ encrypt($order->id) }}')">Terima Barang</button>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    @php
                                                    $tgl_terkirim = strtotime($order->tgl_terkirim);
                                                    $tgl_berakhir = strtotime(\Carbon\Carbon::now()->subDays(2)->format('Y-m-d H:m:s'));
        
                                                    @endphp
                                                    @if($order->delivery_status == 'delivered' && isset($order->tgl_terkirim) && $tgl_berakhir >$tgl_terkirim )
                                                    <div class="py-2">
                                                        <button type="button" class="btn btn-danger text-center btn-komplain w-100 font-weight-bold py-2" disabled>Komplain</button>
                                                    </div>
                                                    @else

                                                    <div class="py-2">
                                                        <button type="button" onclick="modalKomplain({{$order->id}});" class="btn btn-danger text-center btn-komplain w-100 font-weight-bold py-2">Komplain</button>
                                                    </div>
                                                    @endif
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                    @elseif($order->payment_status == 'waiting_confrim' && $order->payment_type == 'manual_bca' || $order->payment_type == 'manual_mandiri' || $order->payment_type == 'manual_permata')
                                    <a href="{{ route('confirmation_payment',encrypt($order->id)) }}" type="button"  class="btn btn-danger text-center btn-pakai px-3 font-weight-bold">UBAH BUKTI PEMBAYARAN</a>
                                    @endif


                                @endif
                                
                            </div>
                        @endforeach
                    </div>
                    @endif

                    @if(count($orders_complted) > 0)
                    <div class="text-center" style="border-bottom: 1px solid #F3795C;">
                        <h1 class="py-2 mb-0 font-weight-bold heading heading-4">RIWAYAT PESANAN</h1>
                    </div>
                    <div class="py-4">
                        @foreach ($orders_complted as $key => $order)
                        <div class="row">
                            <div class="col-md-3 col-12 py-2">
                                <h1 class="mb-0 heading heading-5" style="font-weight: 600;">{{ date('d/m/Y', $order->date) }}</h1>
                            </div>
                            
                            <div class="col-md-9 col-12 py-2">
                                @if (count($order->orderDetails) > 0)
                                @foreach ($order->orderDetails as $key => $value)
                                    @php
                                    $product = \App\Product::where('id',$value->product_id)->with('brand')->first();
                                    
                                    @endphp
                                    @if(isset($product))
                                    <div class="row mb-3">
                                       
                                        <div class="col-md-3 col-12 py-2">
                                            @if(!isset($value->review_id))
                                            <button onclick="showReviewModalOrder({{ $product->id }},{{ $value->id }});"  type="button" class="btn btn-danger text-center btn-pakai px-5 font-weight-bold">REVIEW</button>
                                            @endif
                                        </div>
                                        
                                        <div class="col-md-3 col-6 py-2">
                                            <img src="{{ isset($product->thumbnail_img) ? asset($product->thumbnail_img) : asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                        </div>
                                        <div class="col-6 py-2">
                                            @if(isset($product->brand->name))
                                            <p class="font-weight-bold mb-0" style="font-size: 18px;">{{ $product->brand->name }}</p>
                                            @endif
                                            <p class="mb-0" style="font-size: 13px; line-height: 16px;">{{ $product->name }}</p>
                                            <p class="mb-0" style="font-size: 13px; line-height: 16px;">Qty {{ $value->quantity }}</p>
                                            <p class="mb-0 font-weight-bold" style="font-size: 15px;">{{ single_price($value->price) }}</p>
                                            <h1 class="py-2 mb-0 heading heading-5" style="font-weight: 600;">#{{ $product->id }}</h1>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                @endif
                                @if (count($order->orderDetailSample) > 0)
                                @foreach ($order->orderDetailSample as $key => $value)
                                    @php
                                    $sample = \App\Models\Sample::where('id',$value->sample_id)->first();
                                    $product = \App\Product::where('id',$sample->product_id)->with('brand')->first();
                                    @endphp
                                    @if(isset($product))
                                    <div class="row mb-3">
                                       
                                        <div class="col-md-3 col-12 py-2">
                                            @if(!isset($value->review_id))
                                            <button onclick="showReviewModalSample({{ $product->id }},{{ $value->id }});"  type="button" class="btn btn-danger text-center btn-pakai px-5 font-weight-bold">REVIEW</button>
                                            @endif
                                        </div>
                                        
                                        <div class="col-md-3 col-6 py-2">
                                            <img src="{{ isset($product->thumbnail_img) ? asset($product->thumbnail_img) : asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                        </div>
                                        <div class="col-6 py-2">
                                            @if(isset($product->brand->name))
                                            <p class="font-weight-bold mb-0" style="font-size: 18px;">{{ $product->brand->name }}</p>
                                            @endif
                                            <p class="mb-0" style="font-size: 13px; line-height: 16px;">{{ $product->name }}</p>
                                            <p class="mb-0" style="font-size: 13px; line-height: 16px;">Qty {{ $value->quantity }}</p>
                                            <p class="mb-0 font-weight-bold" style="font-size: 15px;">GRATIS</p>
                                            <p class="mb-0 font-weight-bold" style="font-size: 15px;">(Sample)</p>
                                            <h1 class="py-2 mb-0 heading heading-5" style="font-weight: 600;">#{{ $product->id }}</h1>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                @endif
                                @if (count($order->orderDetailPoint) > 0)
                                @foreach ($order->orderDetailPoint as $key => $value)
                                    @php
                                    $productpoint = \App\Models\ProductPoint::where('id',$value->product_point_id)->first();
                                    $product = \App\Product::where('id',$productpoint->product_id)->with('brand')->first();
                                    @endphp
                                    @if(isset($product))
                                    <div class="row mb-3">
                                       
                                        <div class="col-md-3 col-12 py-2">
                                            @if(!isset($value->review_id))
                                            <button onclick="showReviewModalProductPoin({{ $product->id }},{{ $value->id }});"  type="button" class="btn btn-danger text-center btn-pakai px-5 font-weight-bold">REVIEW</button>
                                            @endif
                                        </div>
                                        
                                        <div class="col-md-3 col-6 py-2">
                                            <img src="{{ isset($product->thumbnail_img) ? asset($product->thumbnail_img) : asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                        </div>
                                        <div class="col-6 py-2">
                                            @if(isset($product->brand->name))
                                            <p class="font-weight-bold mb-0" style="font-size: 18px;">{{ $product->brand->name }}</p>
                                            @endif
                                            <p class="mb-0" style="font-size: 13px; line-height: 16px;">{{ $product->name }}</p>
                                            <p class="mb-0" style="font-size: 13px; line-height: 16px;">Qty {{ $value->quantity }}</p>
                                            <p class="mb-0 font-weight-bold" style="font-size: 15px;">GRATIS</p>
                                            <p class="mb-0 font-weight-bold" style="font-size: 15px;">(Tukar Poin)</p>
                                            <h1 class="py-2 mb-0 heading heading-5" style="font-weight: 600;">#{{ $product->id }}</h1>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                @endif
                            </div>
                        </div>
                        @endforeach
                    
                    </div>

                    @endif
                    @if(count($orders_complted) == 0 &&  count($orders) == 0)
                    <div class="py-5 text-center">
                        <p class="mb-0" style="font-size: 16px;">Ups, kamu belum melakukan pembelian di Ponny Beaute,</p>
                        <p style="font-size: 16px;">yuk mulai berbelanja!</p>
                        <a href="{{ route('home') }}" type="button" class="btn btn-danger text-center btn-pakai py-2 px-5 mt-3" style="font-size: 16px; font-weight: 600;">BELANJA SEKARANG</a>
                    </div>
                    @endif

                    
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="order_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="c-preloader">
                    <i class="fa fa-spin fa-spinner"></i>
                </div>
                <div id="order-details-modal-body">

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="payment_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="modal-header">
                    <h5 class="modal-title strong-600 heading-5">{{__('Make Payment')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="payment_modal_body"></div>
            </div>
        </div>
    </div>

    <div class="modal hide fade" id="modalLangkahPembayaran" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: #FCF8F0;">
                <div class="modal-header">
                    <p class="mb-0 pl-3" style="font-weight: 700; font-size: 16px;">LANGKAH PEMBAYARAN</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body py-4" style="width: 90%; margin: 0 auto;">
                    <div id="accordionVAStepBCA" class="accordion rounded" style="border: 1px solid #F3795C;">
                        <div class="card border-0">
                            <button type="button" data-toggle="collapse" data-target="#collapseOneVAStepBCA" aria-expanded="true" aria-controls="collapseOneVAStepBCA" class="btn btn-link text-dark font-weight-bold collapsible-link-step" style="background-color: #FCF8F0; border-radius: 0 !important; text-decoration: none; border-bottom: 1px solid #F3795C;">
                                <div id="headingOneVAStepBCA" class="card-header border-0" style="background-color: #FCF8F0; color: black !important;">
                                    <h2 class="h6 mb-0" style="font-weight: 600;">
                                        ATM BCA
                                    </h2>
                                </div>
                            </button>
                            <div id="collapseOneVAStepBCA" aria-labelledby="headingOneVAStepBCA" data-parent="#accordionVAStepBCA" class="collapse show" style="background-color: #FCF8F0; border-bottom: 1px solid #F3795C;">
                                <div class="card-body pt-3">
                                    <ol style="font-size: 14px; padding-inline-start: 25px;">
                                        <li class="mb-1">Masukkan Kartu ATM BCA, ketik PIN, lalu pilih menu Transaksi Lainnya</li>
                                        <li class="mb-1">Pilih menu Transfer dan Ke Rekening BCA Virtual Account, lalu masukkan nomor virtual account yang sudah diberikan</li>
                                        <li class="mb-1">Masukkan nominal total tagihan belanja Anda, cek kembali jumlah transfer, lalu pilih Ya (OK)</li>
                                        <li class="mb-1">Pembayaranmu diverifikasi secara otomatis</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="card border-0">
                            <button type="button" data-toggle="collapse" data-target="#collapseTwoVAStepBCA" aria-expanded="false" aria-controls="collapseTwoVAStepBCA" class="btn btn-link text-dark font-weight-bold collapsible-link-step" style="background-color: #FCF8F0; border-radius: 0 !important; text-decoration: none; border-bottom: 1px solid #F3795C;">
                                <div id="headingTwoVAStepBCA" class="card-header border-0" style="background-color: #FCF8F0; color: black !important;">
                                    <h2 class="h6 mb-0" style="font-weight: 600;">
                                        MOBILE BANKING
                                    </h2>
                                </div>
                            </button>
                            <div id="collapseTwoVAStepBCA" aria-labelledby="headingTwoVAStepBCA" data-parent="#accordionVAStepBCA" class="collapse" style="background-color: #FCF8F0; border-bottom: 1px solid #F3795C;">
                                <div class="card-body pt-3">
                                    <ol style="font-size: 14px; padding-inline-start: 25px;">
                                        <li class="mb-1">Buka aplikasi BCA Mobile, ketik kode akses, lalu pilih menu m-BCA, kemudian m-Transfer</li>
                                        <li class="mb-1">Pilih menu BCA Virtual Account di bawah sub-judul Transfer, lalu masukkan nomor virtual account yang sudah diberikan</li>
                                        <li class="mb-1">Masukkan nominal total tagihan belanja Anda lalu pilih Send, dan masukkan PIN m-BCA Anda, lalu pilih OK/YES</li>
                                        <li class="mb-1">Pembayaranmu diverifikasi secara otomatis</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="card border-0">
                            <button type="button" data-toggle="collapse" data-target="#collapseThreeVAStepBCA" aria-expanded="false" aria-controls="collapseThreeVAStepBCA" class="btn btn-link text-dark font-weight-bold collapsible-link-step" style="background-color: #FCF8F0; border-radius: 0 !important; text-decoration: none;">
                                <div id="headingThreeVAStepBCA" class="card-header border-0" style="background-color: #FCF8F0; color: black !important;">
                                    <h2 class="h6 mb-0" style="font-weight: 600;">
                                        INTERNET BANKING
                                    </h2>
                                </div>
                            </button>
                            <div id="collapseThreeVAStepBCA" aria-labelledby="headingThreeVAStepBCA" data-parent="#accordionVAStepBCA" class="collapse" style="background-color: #FCF8F0; border-top: 1px solid #F3795C;">
                                <div class="card-body pt-3">
                                    <ol style="font-size: 14px; padding-inline-start: 25px;">
                                        <li class="mb-1">Masuk ke halaman log-in dan pilih menu Transfer Dana</li>
                                        <li class="mb-1">Pilih menu Transfer ke BCA Virtual Account, lalu masukkan nomor virtual account yang sudah diberikan, lalu Lanjutkan</li>
                                        <li class="mb-1">Masukkan nominal total tagihan belanja Anda, pilih Lanjutkan</li>
                                        <li class="mb-1">Cek kembali detail pembayaran, lalu masukkan kode yang diperoleh dari KeyBCA Appli 1, kemudian klik Kirim</li>
                                        <li class="mb-1">Pembayaranmu diverifikasi secara otomatis</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                   {{-- <div class="rounded" style="border: 1px solid #F3795C;">
                        <div class="card border-0">
                            <div class="btn text-dark font-weight-bold text-left" style="cursor: auto; background-color: #FCF8F0; border-radius: 0 !important; text-decoration: none; border-bottom: 1px solid #F3795C;">
                                <div class="card-header border-0" style="background-color: #FCF8F0; color: black !important;">
                                    <h2 class="h6 mb-0" style="font-weight: 600;">
                                        GOPAY
                                    </h2>
                                </div>
                            </div>
                            <div style="background-color: #FCF8F0;">
                                <div class="card-body pt-3">
                                    <ol style="font-size: 14px; padding-inline-start: 25px;">
                                        <li class="mb-1">Masukkan nomor handphone yang terdaftar di GOPAY, lanjutkan dengan klik ‘Bayar Sekarang’, agar dialihkan ke halaman Midtrans</li>
                                        <li class="mb-1">Buka aplikasi GOJEK, klik Bayar di bawah judul GOPAY</li>
                                        <li class="mb-1">Pindai kode QR yang tertera di layar, masukkan PIN, dan selesaikan proses pem
                                            bayaran (proses pembayaran akan kadaluarsa dalam 15 menit setelah ‘Bayar
                                            Sekarang’.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>--}}
                </div>
            </div>
        </div>
    </div>



<div class="modal hide fade bd-example-modal-lg" id="modalPengajuanKomplain" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background-color: #FCF8F0;">
            <div class="c-preloader">
                <i class="fa fa-spin fa-spinner"></i>
            </div>
            <div class="modal-header">
                <p class="mb-0 pl-3" style="font-weight: 700; font-size: 16px;">PENGAJUAN KOMPLAIN</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('komplain.create') }}"  enctype="multipart/form-data" id="form-komplain">

            </form>
        </div>
    </div>
</div>

<div class="modal hide fade" id="modalPesananDiterima" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #FCF8F0;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('order.complete') }}" method="POST">
            @csrf
            <input type="hidden" name="order_id" id="order_id">
            <div class="modal-body py-4 text-center" style="width: 90%; margin: 0 auto;">
                <p style="font-weight: 700; font-size: 20px;">Pesanan Diterima</p>
                <p>Saya telah memastikan bahwa produk telah saya terima dan tidak ada masalah. Saya tidak akan mengajukan pengembalian barang atau dana setelah ini.</p>
                <div class="row mt-4 justify-content-center">
                    <div class="col-md-4 col-6">
                        <button type="button" class="btn text-center btn-nantisaja py-2 width-100" onclick="$('#modalPesananDiterima').modal('toggle');"><p class="mb-0 text-center" style="font-weight: 600;" >NANTI SAJA</p></button>
                    </div>
                    <div class="col-md-4 col-6">
                        <button type="submit" class="btn btn-danger text-center btn-lihatlebihbanyak py-2 width-100"><p class="mb-0 text-center" style="font-weight: 600;">KONFIRMASI</p></button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal hide fade" id="modalInputResi" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #FCF8F0;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('komplain.resi') }}" method="POST">
            @csrf
            <input type="hidden" name="komplain_id" id="komplain_id">
            <div class="modal-body py-4 text-center" style="width: 90%; margin: 0 auto;">
                <p style="font-weight: 700; font-size: 20px;">Isi Resi Pengembalian</p>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Kurir</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="jenis">
                      <option value="jne">JNE</option>
                      <option value="ninja">NINJA</option>
                      <option value="J&T">J&T</option>
                      <option value="sicepat">SICEPAT</option>
                    </select>
                  </div>
                <div class="form-group">
                <label for="exampleFormControlInput1">No. Resi Pengiriman</label>
                    <input type="text" name="no_resi" class="form-control" id="exampleFormControlInput1" required>
                </div>
                <div class="row mt-4 justify-content-center">
                    <div class="col-4">
                        <button type="submit" class="btn btn-danger text-center btn-lihatlebihbanyak py-2 width-100"><p class="mb-0 text-center" style="font-weight: 600;">KONFIRMASI</p></button>
                    </div>
                    <div class="col-4">
                        <button type="button" class="btn text-center btn-nantisaja py-2 width-100" onclick="$('#modalInputResi').modal('toggle');"><p class="mb-0 text-center" style="font-weight: 600;" >NANTI SAJA</p></button>
                    </div>
                    
                </div>
                  
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal hide fade" id="modalLihatBukti" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #FCF8F0;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body py-4 text-center" style="width: 90%; margin: 0 auto;">
                <div class="row" id="body-foto-bukti">
                   
                    
                </div>
                  
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('script')
<script type="text/javascript">
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };
    $('#order_details').on('hidden.bs.modal', function () {
        location.reload();
    })
function modalConfrimOrder(id)
{
    $('#order_id').val(id);
    $('#modalPesananDiterima').modal('toggle');

}

function modalInputResiOrderRefund(id)
{
    $('#komplain_id').val(id);
    $('#modalInputResi').modal('toggle');

}

function modalBuktiTransfer(data)
{
    
    var photos= JSON.parse(data);
    console.log(data);
    $('#body-foto-bukti').html('');
    $.each(photos,function(i,v){
        var a = ' <div class="col-6"><img src="{{ asset("/") }}/'+v+'" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt=""></div>';
        $('#body-foto-bukti').append(a);
    });

    $('#modalLihatBukti').modal('toggle');
}

function modalKomplain(idorder)
{
    $('#form-komplain').html(null);
    $('#modalPengajuanKomplain').modal();
    $('.c-preloader').show();
    $.post('{{ route("komplain.form") }}', {
            _token: '{{ csrf_token() }}',
            order_id: idorder
        },
        function(data) {
            $('.c-preloader').hide();
            $('#form-komplain').html(data);
            initkomplain();
    });
   
}


function initkomplain() {
    $("#upload-photo-komplain").spartanMultiImagePicker({
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

    $('#setuju-komplain').change(function(){
        $('#btn-submit-komplain').prop("disabled", false);
    });

}


</script>



@endsection
