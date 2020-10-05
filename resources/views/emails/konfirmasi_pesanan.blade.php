<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @media only screen and (max-width: 768px){
            .text{
                font-size: 16px !important;
            }

            .text-title{
                font-size: 20px !important;
            }

            .text-right{
                float: right !important;
            }

            .text-total{
                font-size: 16px !important;
            }

            .text-sub{
                font-size: 14px !important;
            }

            .text-footer{
                font-size: 12px !important;
            }

            .container{
                padding: 5px 20px !important;
            }

            .container .text span{
                width: 50% !important;
            }

            .download{
                font-size: 18px !important;
            }

            .img-title{
                width: 200px !important;
            }

            .img-1{
                height: 50px !important;
            }

            .img-2{
                height: 35px !important;
            }

            .oh-happy-skin{
                font-size: 35px !important;
            }

            .img-sosmed{
                width: 30px !important;
                height: 30px !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .img-feature{
                margin: 0 !important;
            }

            .product{
                display: block !important;
            }
        }
    </style>
</head>
<body style="margin: 0;">
    @php
    $order = \App\Models\Order::where('id',$order_id)->first();
    $shipping = json_decode($order->shipping_info);
    $costumer_address = \App\Models\CustomerAdres::find($order->customer_addres_id);
    $mitrans  = json_decode($order->mitrans_val);
    @endphp
    <div style="background-color: #F3795C; padding-top: 1px; padding-bottom: 1px;">
        <p style="color: white; text-align: center;">GRATIS ONGKIR DENGAN PEMBELANJAAN {{ single_price($order->user->user_tier->free_shiping_min_order) }}</p>
    </div>
    <div style="background-color: white; border-bottom: 1px solid #F3795C;">
        <img src="https://myponnylive.com/public/img/Rectangle.png" alt="" class="img-title" style="margin: auto; display: block; width: 250px; padding-top: 20px; padding-bottom: 20px;">
    </div>
    <div style="background-color: white; text-align: center; width: 85%; margin-left: auto; margin-right: auto;">
        <h2 style="font-size: 28px; padding-top: 20px;">SILAHKAN SELESAIKAN PEMBAYARAN KAMU</h2>
        <p class="text" style="text-align: left; font-size: 26px; padding-top: 30px; padding-bottom: 50px;">Hi {{ $order->user->name }} {{ $order->user->last_name }},<br><br>
            Terima kasih sudah berbelanja! Kami akan mengirimkan pesanan setelah kami
            menerima pembayaran kamu. Segera selesaikan pembayaran kamu paling lambat
            <b>{{ date('d F Y', strtotime("+2 day", $order->date)) }}</b> untuk mencegah pesanan kamu dibatalkan.</p>
        <div class="container" style="background-color: #FDF9F0; border: 1px solid #F3795C; border-radius: 10px; padding: 5px 40px; text-align: left;">
            <p class="text" style="font-size: 26px; font-weight: 600;"><span style="width: 30%; display: inline-block; font-weight: 500;">Nomor Pesanan</span>: {{ $order->code }}</p>
            <p class="text" style="font-size: 26px; font-weight: 600;"><span style="width: 30%; display: inline-block; font-weight: 500;">Tanggal Pesanan</span>: {{ date('d F Y', $order->date) }}</p>
            <p class="text" style="font-size: 26px; font-weight: 600;"><span style="width: 30%; display: inline-block; font-weight: 500;">Total Pesanan</span>: {{ single_price($order->grand_total+$order->uniq_tf_manual) }}</p>
            <p class="text" style="font-size: 26px; font-weight: 600;"><span style="width: 30%; display: inline-block; font-weight: 500;">Status Pembayaran</span>: Menunggu Pembayaran</p>
            <p class="text" style="font-size: 26px; font-weight: 600;"><span style="width: 30%; display: inline-block; font-weight: 500;">Metode Pembayaran</span>: {{ $order->statusOrder->param_2 }}</p>
        </div>
        <div style="background-color: #FDF9F0; border: 1px solid #F3795C; border-radius: 10px; text-align: left; overflow: hidden; margin-top: 35px;">
            <div style="background-color: #F3795C;">
                <p class="text" style="color: white; margin: 0; text-align: center; font-size: 26px; font-weight: 600; padding: 15px 0;">PESANAN KAMU</p>
            </div>
             @if (count($order->orderDetails) > 0)
                @php
                $subtotal =0;
                $dapatPoint = 0;
                @endphp
                @foreach ($order->orderDetails as $key => $value)
                @php
                $product = \App\Product::where('id',$value->product_id)->with('brand')->first();
                
                $subtotal += $value->quantity*$value->price;
                $dapatPoint += $product->earn_point*$value->quantity;
                @endphp
                <div class="container product" style="padding: 30px; box-sizing: border-box; display: flex; border-bottom: 1px solid #F3795C;">
                    <div style="flex: 1 0 0; padding-left: 10px; padding-right: 10px;">
                        <img class="img-fit lazyload m-auto ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" src="{{ asset($product->thumbnail_img) }}"  alt="{{ __($product->name) }}" style="max-width: 100%;">
                    </div>
                    <div style="flex: 2 0 0; padding-left: 10px; padding-right: 10px;">
                        @if(isset($product->brand->name))
                        <p class="text-title" style="font-size: 30px; font-weight: 700; margin: 0; margin-bottom: 10px;">{{ $product->brand->name }}</p>
                        @endif
                        <p class="text" style="font-size: 20px; margin: 0; margin-bottom: 5px;max-width: 250px;">{{ $product->name }}</p>
                        <p class="text" style="font-size: 20px; margin: 0; margin-bottom: 5px;">{{ $product->tagline }}</p>
                        @if($value->variation != '' || $value->variation != null )
                        <p class="text" style="font-size: 20px; margin: 0; margin-bottom: 5px;">Ukuran : {{ $value->variation }}</p>
                        @endif
                        <p class="text" style="font-size: 20px; margin: 0; margin-bottom: 5px;">Jumlah : {{ $value->quantity }}</p>
                    </div>
                     @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                       <div style="flex: 1 0 0; padding-left: 10px; padding-right: 10px;">
                            <p class="text-total" style="font-size: 22px; color: #F3795C; margin: 0;">

                                <del style="color: black;">{{ home_base_price($product->id) }}</del>
                            <br>
                                {{ single_price($value->price) }}
                            </p>
                        </div>
                    @else
                       <div style="flex: 1 0 0; padding-left: 10px; padding-right: 10px;">
                            <p class="text-total" style="font-size: 22px; margin: 0;">

                                {{ single_price($value->price) }}
                            </p>
                        </div>
                    @endif
                    
                    <div style="flex: 1 0 0; padding-left: 10px; padding-right: 10px;">
                        <p class="text-total text-right" style="font-size: 22px; color: black; margin: 0;">
                            {{ single_price($value->price * $value->quantity) }}
                            
                        </p>
                    </div>
                    <div style="clear: right;"></div>
                </div>



                @endforeach
             @endif
            @php
            $dapatPoint = 0;
            $poin_member =$order->user->user_tier->poin_order/100;
            $ultah = date('d-m', strtotime($order->user->tgl_lahir));
            $today = date('d-m');
            if($ultah == $today )
            {
                $dapatPoint += ($subtotal*$poin_member)*2;
            }else{
                $dapatPoint += $subtotal*$poin_member;
            }

            @endphp
            <div class="container" style="padding: 30px 50px; box-sizing: border-box; border-top: 3px solid #F3795C;">
                <p class="text-sub" style="font-size: 22px; text-align: left; margin: 0; margin-bottom: 20px;">SUB TOTAL<span class="text-total" style="float: right;">{{ single_price($subtotal) }}</span></p>
                @if($order->coupon_discount > 0)
                <p class="text-sub" style="font-size: 22px; text-align: left; margin: 0; margin-bottom: 20px;">PROMO DISKON<span class="text-total" style="float: right;">{{ single_price($order->coupon_discount) }}</span></p>
                @endif
                @if($shipping->cost == $order->free_ongkir)
                <p class="text-sub" style="font-size: 22px; text-align: left; margin: 0;">BIAYA PENGIRIMAN<span class="text-total" style="float: right;">GRATIS</span></p>
                @else
                <p class="text-sub" style="font-size: 22px; text-align: left; margin: 0;">BIAYA PENGIRIMAN<span class="text-total" style="float: right;">{{ single_price($shipping->cost) }}</span></p>
                <p class="text-sub" style="font-size: 22px; text-align: left; margin: 0;">GRATIS BIAYA PENGIRIMAN<span class="text-total" style="float: right;">{{ single_price($order->free_ongkir) }}</span></p>
                @endif
            </div>
            <div class="container" style="padding: 30px 50px; box-sizing: border-box; border-top: 1px solid #F3795C;">
                <p class="text-sub" style="font-size: 22px; text-align: left; margin: 0; font-weight: 700;">TOTAL<span class="text-total" style="float: right;">{{ single_price($order->grand_total+$order->uniq_tf_manual) }}</span></p>
            </div>
            <div class="container" style="padding: 30px 50px; box-sizing: border-box; border-top: 1px solid #F3795C;">
                <p class="text-sub" style="font-size: 22px; text-align: left; margin: 0; color: #F3795C;">Poin yang di dapat<span class="text-total" style="float: right;">+{{ $dapatPoint }}</span></p>
            </div>
        </div>
        <p class="text-footer" style="font-size: 22px; text-align: center; padding-top: 20px; padding-bottom: 20px;">
            Jika kamu punya pertanyaan dan masukan kamu boleh<br>
            mengirimkan email ke <a href="mailto:timphoebe@ponnybeaute.co.id" style="color: #F3795C;">timphoebe@ponnybeaute.co.id</a><br>
            Setiap hari Senin - Jumat pukul 09.00 - 17.00 dan<br>
            Sabtu pukul 09.00 - 14.00</p>
    </div>
    <div style="background-color: #FEF0E0; padding-top: 10px; padding-bottom: 10px; text-align: center;">
        <p class="download" style="font-size: 22px; display: inline-block; vertical-align: middle; font-weight: 500;">DOWNLOAD APLIKASI KAMI</p>
        <img src="https://myponnylive.com/public/frontend/images/playstore.png" alt="" class="img-1" style="height: 70px; vertical-align: middle;">
        <img src="https://myponnylive.com/public/frontend/images/appstore.png" alt="" class="img-2" style="height: 50px; vertical-align: middle;">
    </div>
    <div style="background-color: #F3795C; text-align: center; padding-top: 1px; padding-bottom: 1px;">
        <h1 class="oh-happy-skin" style="color: white; font-weight: 700; font-size: 50px;">OH HAPPY SKIN.</h1>
        <p style="color: white; display: inline-block;">
            <img src="https://myponnylive.com/public/frontend/images/pengiriman-white.png" alt="" class="img-feature" style="height: 30px; margin-right: 5px; vertical-align: middle;">
            PENGIRIMAN KILAT
        </p>
        <p style="color: white; display: inline-block;">
            <img src="https://myponnylive.com/public/frontend/images/bpom-white.png" alt="" class="img-feature" style="height: 30px; margin-left: 30px; margin-right: 5px; vertical-align: middle;">
            PRODUK TERDAFTAR BPOM
        </p>
        <p style="color: white; display: inline-block;">
            <img src="https://myponnylive.com/public/frontend/images/konsumen-white.png" alt="" class="img-feature" style="height: 30px; margin-left: 30px; margin-right: 5px; vertical-align: middle;">
            LAYANAN KONSUMEN
        </p>
        <p style="color: white; display: inline-block;">
            <img src="https://myponnylive.com/public/frontend/images/kemasan-white.png" alt="" class="img-feature" style="height: 30px; margin-left: 30px; margin-right: 5px; vertical-align: middle;">
            KEMASAN AMAN
        </p>
    </div>
    <div style="background-color: #FEF0E0; padding-top: 20px; padding-bottom: 20px; text-align: center;">
        <img class="img-sosmed" src="https://myponnylive.com/public/frontend/images/instagram.png" style="padding-left: 30px; padding-right: 30px;">
        <img class="img-sosmed" src="https://myponnylive.com/public/frontend/images/facebook.png" style="padding-left: 30px; padding-right: 30px;">
        <img class="img-sosmed" src="https://myponnylive.com/public/frontend/images/pinterest.png" style="padding-left: 30px; padding-right: 30px;">
        <img class="img-sosmed" src="https://myponnylive.com/public/frontend/images/twitter.png" style="padding-left: 30px; padding-right: 30px;">
        <img class="img-sosmed" src="https://myponnylive.com/public/frontend/images/youtube.png" style="padding-left: 30px; padding-right: 30px;">
    </div>
</body>
</html>