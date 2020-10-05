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
        <h2 style="font-size: 28px; padding-top: 20px;">PESANAN KAMU SUDAH DIKIRIM!</h2>
        <p class="text" style="text-align: left; font-size: 26px; padding-top: 30px; padding-bottom: 50px;">Hi {{ $order->user->name }} {{ $order->user->last_name }},<br><br>
            Sebentar lagi pesanan kamu sampai di tempat tujuan. Pesanan kamu sudah dikirim
            oleh Tim Phoebe. Yeay!</p>
        <div class="container" style="background-color: #FDF9F0; border: 1px solid #F3795C; border-radius: 10px; padding: 5px 40px; text-align: left;">
            <p class="text" style="font-size: 26px; font-weight: 600;"><span style="width: 30%; display: inline-block; font-weight: 500;">Nomor Pesanan</span>: {{ $order->code }}</p>
            <p class="text" style="font-size: 26px; font-weight: 600;"><span style="width: 30%; display: inline-block; font-weight: 500;">Tanggal Pesanan</span>: {{ date('d F Y', $order->date) }}</p>
            <p class="text" style="font-size: 26px; font-weight: 600;"><span style="width: 30%; display: inline-block; font-weight: 500;">Metode Pengiriman</span>: 
            @if($order->confrim_courier == 'jne')
            Jalur Nugraha Ekakurir (JNE)
            @elseif($order->confrim_courier == 'jnt')
            J&T Express (J&T)
            @elseif($order->confrim_courier == 'ninja')
            Ninja Xpress (NINJA)
            @elseif($order->confrim_courier == 'sicepat')
            Sicepat
            @elseif($order->confrim_courier == 'grab')
            GRAB
            @elseif($order->confrim_courier == 'gojek')
            GOJEK
            @endif

            </p>
            <p class="text" style="font-size: 26px; font-weight: 600;"><span style="width: 30%; display: inline-block; font-weight: 500;">Nomor Pengiriman</span>: {{ $order->confrim_resi }}</p>
            <p class="text" style="font-size: 26px; font-weight: 600;"><span style="width: 30%; display: inline-block; font-weight: 500;">Metode Pembayaran</span>: {{ $order->statusOrder->param_2 }}</p>
            <hr style="border-top: 1px solid #F3795C">
            <p class="text" style="font-size: 26px; font-weight: 600;">Alamat Pengiriman</p>
            <p class="text" style="font-size: 26px; font-weight: 500;">{{ $order->userOrderAddress->nama_depan }} {{ $order->userOrderAddress->nama_belakang }}</p>
            <p class="text" style="font-size: 26px; font-weight: 500;">{{ $order->userOrderAddress->alamat_lengkap }}</p>
            <p class="text" style="font-size: 26px; font-weight: 500;">{{ $order->userOrderAddress->province }}</p>
            <p class="text" style="font-size: 26px; font-weight: 500;">{{ $order->userOrderAddress->portal_code }}</p>
            <p class="text" style="font-size: 26px; font-weight: 500;">+62{{ $order->userOrderAddress->nomor_hp }}</p>
            
        </div>
        <p class="text-footer" style="font-size: 22px; text-align: center; padding-top: 20px; padding-bottom: 20px;">Jika kamu punya pertanyaan dan masukan kamu boleh<br>
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