@extends('frontend.layouts.app')

@section('content')
    <div id="page-content">
        <section class="py-4" style="background-color: #FCF8F0;">
            <div class="container">
               
                <div class="row py-5">
                    <div class="col-xl-5 mx-auto text-center">
                        <i class="fa fa-check-circle" style="color: #F3795C; font-size: 75px;" aria-hidden="true"></i>
                        <h1 class="h2 mt-4 font-weight-bold">TERIMA KASIH!</h1>
                        <div class="mt-5">
                            <h6 class="h6 font-weight-bold mb-0 d-inline px-5 py-1 kode-transaksi-mobile" style="background-color: white; border-radius: 30px;">Transaksi {{ isset($order_code) ? $order_code : '' }}</h6>
                        </div>
                        <h6 class="h6 mt-4 mb-0" style="font-weight: 600;">Pesananmu sudah kami terima.</h6>
                        <h6 class="h6 mt-1 mb-0" style="font-weight: 600;">Cek email untuk lihat bukti pembelanjaanmu.</h6>
                        <h6 class="h6 mt-1 mb-0" style="font-weight: 600;">Terima kasih sudah berbelanja di Ponny Beaute.</h6>
                        <h6 class="h6 mt-1 mb-5" style="font-weight: 600;">Phoebe tunggu review-mu</h6>
                        <a href="{{ url('/')  }}" type="button" class="btn btn-danger text-center btn-pakai py-2 px-5 mt-3 mb-5" style="font-size: 20px; font-weight: 600;">BELANJA LAGI</a>
                    </div>
                </div>
                
            </div>
        </section>
    </div>
@endsection
