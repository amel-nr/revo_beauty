@extends('frontend.layouts.app')

@section('content')

    <div id="page-content">
       
        <section class="py-4" style="background-color: #FCF8F0;">
            <div class="container">
                <h1 class="h5 font-weight-bold text-center">SELESAIKAN PEMBAYARAN</h1>
                <div class="row">
                    <div class="col-lg-6 mx-auto rounded" style="border: 1px solid #F3795C; background-color: #FCF8F0;">
                        <div class="row text-center" style="color: white;">
                            <div class="col-4 py-5" style="background-color: #F3795C;">
                                <h1 class="h6">NOMOR PESANAN</h1>
                                <h1 class="h4 font-weight-bold m-0">{{ isset($order->code) ? $order->code : '' }}</h1>
                            </div>
                            <div class="col-4 py-5" style="background-color: #F3795C; border-left: 1px solid #FCF8F0; border-right: 1px solid #FCF8F0;">
                                <h1 class="h6">TOTAL PESANAN</h1>
                                <h1 class="h4 font-weight-bold m-0">{{ single_price($order->grand_total) }}</h1>
                            </div>
                            <div class="col-4 py-5" style="background-color: #F3795C;">
                                <h1 class="h6">KODE UNIK</h1>
                                <h1 class="h4 font-weight-bold m-0">{{ single_price($order->uniq_tf_manual) }}</h1>
                            </div>
                        </div>
                        <div class="container width-80 text-center py-4">
                            <p class="m-0" style="font-weight: 600; font-size: 16px;">TRANSFER KE</p>
                            @if($order->payment_type == 'manual_bca')
                            <img src="{{ asset('frontend/images/metode-pembayaran/bca-02.png') }}" class="width-30 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                            <p class="m-0" style="font-weight: 600; font-size: 16px;">a/n {{ env('MANUAL_REK_BCA_AN') }}</p>
                            <h1 class="h4 font-weight-bold m-0">{{ env('MANUAL_REK_BCA') }}</h1>
                            @elseif($order->payment_type == 'manual_mandiri')
                            <img src="{{ asset('frontend/images/metode-pembayaran/mandiri-02.png') }}" class="width-30 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                            <p class="m-0" style="font-weight: 600; font-size: 16px;">a/n {{ env('MANUAL_REK_MANDIRI_AN') }}</p>
                            <h1 class="h4 font-weight-bold m-0">{{ env('MANUAL_REK_MANDIRI') }}</h1>
                            @elseif($order->payment_type == 'manual_permata')
                            <img src="{{ asset('frontend/images/metode-pembayaran/permata-02.png') }}" class="width-30 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                            <p class="m-0" style="font-weight: 600; font-size: 16px;">a/n {{ env('MANUAL_REK_PERMATA_AN') }}</p>
                            <h1 class="h4 font-weight-bold m-0">{{ env('MANUAL_REK_PERMATA') }}</h1>
                            @endif
                            <button href="#" type="button" class="btn btn-danger btn-round btn-pilih mt-2 mb-4 px-4 py-0" onclick="copyToClipboard('norek')" >Salin</button>
                            <p class="m-0" style="font-weight: 600; font-size: 16px;">JUMLAH YANG HARUS DIBAYAR</p>
                            <h1 class="h4 font-weight-bold m-0">{{ single_price($order->grand_total+$order->uniq_tf_manual) }}</h1>
                           
                            <button type="button" class="btn btn-danger btn-round btn-pilih mt-2 mb-4 px-4 py-0" onclick="copyToClipboard('jmlBayar')">Salin</button>
                            <p>Pastikan kamu melakukan pembayaran dalam waktu 24 jam
                                setelah pesanan dibuat untuk menghindari pembatalan otomatis
                                dan silahkan lakukan konfirmasi pembayaran jika kamu sudah
                                melakukan pembayaran di halaman my account.</p>
                            <a href="{{ route('purchase_history.index') }}" type="button" class="btn btn-danger text-center btn-pakai mt-3 py-2 width-60" style="font-weight: 700;">OK</a>
                            <a href="{{ route('confirmation_payment',encrypt($order->id)) }}" type="button" class="btn text-center mt-3 py-2 width-60" style="font-weight: 400; color: #F3795C; background-color: white;">KONFIRMASI PEMBAYARAN</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script>
        function copyToClipboard(btn){
            // var el_code = document.getElementById('referral_code');
            
            var jumlahBayar ='{{ $order->grand_total+$order->uniq_tf_manual }}';
            @if($order->payment_type == 'manual_bca')
            var norek = '{{ env('MANUAL_REK_BCA') }}';     
            @elseif($order->payment_type == 'manual_mandiri')
            var norek = '{{ env('MANUAL_REK_MANDIRI') }}';
            @elseif($order->payment_type == 'manual_permata')
            var norek = '{{  env('MANUAL_REK_PERMATA') }}';
            @endif
            
             var dummy = document.createElement("textarea");
            // if(btn == 'code'){
            //     if(el_code != null && c_b != null){
            //         el_code.select();
            //         document.execCommand('copy');
            //         c_b .innerHTML  = c_b.dataset.attrcpy;
            //     }
            // }

            if(btn == 'jmlBayar'){
                document.body.appendChild(dummy);
                //Be careful if you use texarea. setAttribute('value', value), which works with "input" does not work with "textarea". – Eduard
                dummy.value = jumlahBayar;
                dummy.select();
                document.execCommand("copy");
                document.body.removeChild(dummy);
            
            }else if(btn == 'norek'){
                document.body.appendChild(dummy);
                //Be careful if you use texarea. setAttribute('value', value), which works with "input" does not work with "textarea". – Eduard
                dummy.value = norek;
                dummy.select();
                document.execCommand("copy");
                document.body.removeChild(dummy);
            }
        }
    </script>
@endsection
