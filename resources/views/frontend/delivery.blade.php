@extends('frontend.layouts.app')

@section('style')
<style>
    p:not(.lead){
        font-size: 18px;
        line-height: normal;
    }
    li{
        font-size: 18px;
        line-height: normal;
    }
    .accordion .card a[aria-expanded="false"] .card-header h7 span i:before {
        content: "\f067"
    }

    .accordion .card a[aria-expanded="true"] .card-header h7 span i:before {
        content: "\f068"
    }

    .accordion .card a[aria-expanded="false"] .card-header h7{
        color: black !important;
    }

    .accordion .card a[aria-expanded="true"] .card-header h7{
        color: #f3795c !important;
    }

    .card-body {
        padding-top: 0;
        padding-bottom: 0;
    }
</style>
@endsection

@section('content')
<section style="background-color: #fcf8F0;">
    <div class="container py-4">
        <div class="text-center py-5" style="background-color: #FACAC3;">
            <h1 class="mb-0 py-5 font-weight-bold title-delivery">PENGIRIMAN</h1>
        </div>
        <p class="pt-5 heading-3" style="font-weight: 700;">GRATIS ONGKOS KIRIM JABODETABEK </p>
        <p>Dengan minimum pembelanjaan Rp 250.000,- <br>
            Kamu bisa dapet gratis ongkos kirim dengan maksimal subsidi dari ongkos kirim Rp.20.000,-</p>
        <p>Tidak terbatas untuk seluruh partner logistik yang tersedia. Jika ongkos kirim melebihi Rp 20.000, kamu cukup membayar selisihnya saja.</p>
        <p class="pt-3 heading-3" style="font-weight: 700;">PARTNER LOGISTIK </p>
        <div class="row" style="border-bottom: 1px solid #F3795C;">
            <div class="col-3 my-auto px-5 img-courier">
                <img src="{{ asset('frontend/images/logistik/jne.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} w-100" alt="">
            </div>
            <div class="col-3 my-auto px-5 img-courier">
                <img src="{{ asset('frontend/images/logistik/ninja.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} w-100" alt="">
            </div>
            <div class="col-3 my-auto px-5 img-courier">
                <img src="{{ asset('frontend/images/logistik/jnt.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} w-100" alt="">
            </div>
            <div class="col-3 my-auto px-5 img-courier">
                <img src="{{ asset('frontend/images/logistik/sicepat.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} w-100" alt="">
            </div>
        </div>
        <h1 class="font-weight-bold text-center mt-5">FAQs</h1>
        <div class="accordion md-accordion pt-3" id="accordionEx" role="tablist" aria-multiselectable="true">
            @for($i=1; $i<=7; $i++)
            <div class="card py-2" style="background-color: #fcf8F0; border: none; border-top: 1px solid #f3795c;">
                <a data-toggle="collapse" data-parent="#accordionEx" href="#collapse{{$i}}" aria-expanded="false"
                    aria-controls="collapse{{$i}}" style="text-decoration: none;">  
                    <div class="card-header" role="tab" id="heading{{$i}}" style="background-color: #fcf8F0; border: none;">
                        <h7 class="mb-0" style="color: black; font-weight: 600; font-size: 17px;">
                            PENGIRIMAN BERASAL DARI MANA? <span class="float-right"> <i class="fa fa-plus" aria-hidden="true" style="color: #f3795c;"></i></span>
                        </h7> 
                    </div>
                </a>
                <div id="collapse{{$i}}" class="collapse" role="tabpanel" aria-labelledby="heading{{$i}}"
                    data-parent="#accordionEx">
                    <div class="card-body">
                        <p>Semua pengiriman yang dilakukan Ponny Beaute berasal dari Jakarta, Indonesia</p>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</section>
@endsection

@section('script')

@endsection