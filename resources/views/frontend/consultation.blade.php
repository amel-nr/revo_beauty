@extends('frontend.layouts.app')

@section('style')
<style>
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

    #svg-container{
        position: relative;
        margin: 0;
        padding: 0;
        background: url('{{ asset('frontend/images/konsultasi.jpg') }}');
        background-size: cover;
        width: 100%;
        height: 65%;
    }

    #svg-con{
        background-color: rgba(250, 202, 195, 0.7);
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    #curve{
        position: absolute;
        bottom: 0;
        width: 100%;
    }

    #curve path{
        fill: #fcf8f0;
    }

    .btn-konsultasi:hover{
        background-color: #f25735 !important;
    }
</style>
@endsection

@section('content')
<section style="background-color: #fcf8f0; position: relative;">
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 150vh; z-index: 0;">
        <div id="svg-container">
            <div id="svg-con">
                <svg
                    id="curve"
                    xmlns:svg="http://www.w3.org/2000/svg"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 297 30.43">
                    <g
                        transform="translate(0,-79.112)">
                        <path
                        d="M 98.738183,79.112317 C 85.904796,79.135124 41.069016,86.142311 2.6350033e-5,93.975492 V 109.54199 H 296.99997 V 83.611784 C 203.28059,113.423 165.34737,78.993943 98.738183,79.112317 Z"/>
                    </g>
                </svg>
            </div>
        </div>
    </div>
    <div class="container" style="position: relative;">
        <h1 class="text-center pt-5">Hi Friends,</h1>
        <p class="text-center pt-3 consultation-title" style="font-size: 36px; font-weight: 500;">Kamu bisa konsultasi dengan dokter langsung</p>
        <p class="text-center consultation-title" style="font-size: 36px; font-weight: 500;">melalui video call</p>
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="row pt-5">
                    <div class="col-md-4 col-12 py-2">
                        <a name="" id="" class="btn btn-danger rounded btn-konsultasi" href="{{ route('consultation_buy') }}" role="button" style="background-color: #f3795c;border-color: #f3795c; font-size: 21px; font-weight: 500; width: 100%;">BELI</a>
                    </div>
                    <div class="col-md-4 col-12 py-2">
                        <a name="" id="" class="btn btn-danger rounded btn-konsultasi" href="{{ route('consultation_voucher') }}" role="button" style="background-color: #f3795c;border-color: #f3795c; font-size: 21px; font-weight: 500; width: 100%;">TUKAR</a>
                    </div>
                    <div class="col-md-4 col-12 py-2">
                        <a name="" id="" class="btn btn-danger rounded btn-konsultasi" href="{{ route('consultation_start') }}" role="button" style="background-color: #f3795c;border-color: #f3795c; font-size: 21px; font-weight: 500; width: 100%;">KONSULTASI</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-5 mt-5">
            <div class="col-10 mx-auto rounded" style="background-color: white; border-radius: 3px;">
                <div class="py-5 px-4">
                    <h3 style="font-weight: 700;">Layanan Konsultasi</h3>
                    <p class="pt-3 text-justify" style="font-size: 22px; font-weight: 500;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy 
                        nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi
                        enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis 
                        nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in 
                        hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit 
                        praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                </div>
            </div>
        </div>
        <div class="row" style="border-bottom: 1px solid #f3795c;">
            <div class="col-10 mx-auto py-5 mb-5">
                <a name="" id="" class="btn btn-danger rounded btn-konsultasi" href="{{ route('consultation_start') }}" role="button" style="background-color: #f3795c;border-color: #f3795c; font-size: 23px; font-weight: 500; width: 100%;">Yuk, Mulai Konsultasi</a>
            </div>
        </div>
        <h1 class="text-center pt-4 font-weight-bold">FAQ</h1>
        <div class="accordion md-accordion pt-3 pb-5" id="accordionEx1" role="tablist" aria-multiselectable="true">
            <div class="card" style="background-color: #fcf8F0; border: none; border-bottom: #f3795c solid 1px;">
                <a data-toggle="collapse" data-parent="#accordionEx1" href="#collapse1" aria-expanded="false"
                    aria-controls="collapse1" style="text-decoration: none;">  
                    <div class="card-header" role="tab" id="heading1" style="background-color: #fcf8F0; border: none;">
                        <h7 class="mb-0" style="color: black; font-weight: 600; font-size: 17px;">
                            PENGIRIMAN BERASAL DARI MANA? <span class="float-right"> <i class="fa fa-minus" aria-hidden="true" style="color: #f3795c;"></i></span>
                        </h7> 
                    </div>
                </a>
                <div id="collapse1" class="collapse" role="tabpanel" aria-labelledby="heading1"
                    data-parent="#accordionEx1">
                    <div class="card-body">
                        <p style="font-size: 14px;">Semua pengiriman yang dilakukan Ponny Beaute berasal dari Jakarta, Indonesia</p>
                    </div>
                    </div>
            </div>
            <div class="card pt-3" style="background-color: #fcf8F0; border: none; border-bottom: #f3795c solid 1px;">
                <a data-toggle="collapse" data-parent="#accordionEx1" href="#collapse2" aria-expanded="false"
                    aria-controls="collapse2" style="text-decoration: none;">  
                    <div class="card-header" role="tab" id="heading2" style="background-color: #fcf8F0; border: none;">
                        <h7 class="mb-0" style="color: black; font-weight: 600; font-size: 17px;">
                            PENGIRIMAN BERASAL DARI MANA? <span class="float-right"> <i class="fa fa-minus" aria-hidden="true" style="color: #f3795c;"></i></span>
                        </h7> 
                    </div>
                </a>
                <div id="collapse2" class="collapse" role="tabpanel" aria-labelledby="heading2"
                    data-parent="#accordionEx1">
                    <div class="card-body">
                        <p style="font-size: 14px;">Semua pengiriman yang dilakukan Ponny Beaute berasal dari Jakarta, Indonesia</p>
                    </div>
                    </div>
            </div>
            <div class="card pt-3" style="background-color: #fcf8F0; border: none; border-bottom: #f3795c solid 1px;">
                <a data-toggle="collapse" data-parent="#accordionEx1" href="#collapse3" aria-expanded="false"
                    aria-controls="collapse3" style="text-decoration: none;">  
                    <div class="card-header" role="tab" id="heading3" style="background-color: #fcf8F0; border: none;">
                        <h7 class="mb-0" style="color: black; font-weight: 600; font-size: 17px;">
                            PENGIRIMAN BERASAL DARI MANA? <span class="float-right"> <i class="fa fa-minus" aria-hidden="true" style="color: #f3795c;"></i></span>
                        </h7> 
                    </div>
                </a>
                <div id="collapse3" class="collapse" role="tabpanel" aria-labelledby="heading3"
                    data-parent="#accordionEx1">
                    <div class="card-body">
                        <p style="font-size: 14px;">Semua pengiriman yang dilakukan Ponny Beaute berasal dari Jakarta, Indonesia</p>
                    </div>
                    </div>
            </div>
            <div class="card pt-3" style="background-color: #fcf8F0; border: none; border-bottom: #f3795c solid 1px;">
                <a data-toggle="collapse" data-parent="#accordionEx1" href="#collapse4" aria-expanded="false"
                    aria-controls="collapse4" style="text-decoration: none;">  
                    <div class="card-header" role="tab" id="heading4" style="background-color: #fcf8F0; border: none;">
                        <h7 class="mb-0" style="color: black; font-weight: 600; font-size: 17px;">
                            PENGIRIMAN BERASAL DARI MANA? <span class="float-right"> <i class="fa fa-minus" aria-hidden="true" style="color: #f3795c;"></i></span>
                        </h7> 
                    </div>
                </a>
                <div id="collapse4" class="collapse" role="tabpanel" aria-labelledby="heading4"
                    data-parent="#accordionEx1">
                    <div class="card-body">
                        <p style="font-size: 14px;">Semua pengiriman yang dilakukan Ponny Beaute berasal dari Jakarta, Indonesia</p>
                    </div>
                    </div>
            </div>
            <div class="card pt-3" style="background-color: #fcf8F0; border: none; border-bottom: #f3795c solid 1px;">
                <a data-toggle="collapse" data-parent="#accordionEx1" href="#collapse5" aria-expanded="false"
                    aria-controls="collapse5" style="text-decoration: none;">  
                    <div class="card-header" role="tab" id="heading5" style="background-color: #fcf8F0; border: none;">
                        <h7 class="mb-0" style="color: black; font-weight: 600; font-size: 17px;">
                            PENGIRIMAN BERASAL DARI MANA? <span class="float-right"> <i class="fa fa-minus" aria-hidden="true" style="color: #f3795c;"></i></span>
                        </h7> 
                    </div>
                </a>
                <div id="collapse5" class="collapse" role="tabpanel" aria-labelledby="heading5"
                    data-parent="#accordionEx1">
                    <div class="card-body">
                        <p style="font-size: 14px;">Semua pengiriman yang dilakukan Ponny Beaute berasal dari Jakarta, Indonesia</p>
                    </div>
                    </div>
            </div>
            <div class="card pt-3" style="background-color: #fcf8F0; border: none; border-bottom: #f3795c solid 1px;">
                <a data-toggle="collapse" data-parent="#accordionEx1" href="#collapse6" aria-expanded="false"
                    aria-controls="collapse6" style="text-decoration: none;">  
                    <div class="card-header" role="tab" id="heading6" style="background-color: #fcf8F0; border: none;">
                        <h7 class="mb-0" style="color: black; font-weight: 600; font-size: 17px;">
                            PENGIRIMAN BERASAL DARI MANA? <span class="float-right"> <i class="fa fa-minus" aria-hidden="true" style="color: #f3795c;"></i></span>
                        </h7> 
                    </div>
                </a>
                <div id="collapse6" class="collapse" role="tabpanel" aria-labelledby="heading6"
                    data-parent="#accordionEx1">
                    <div class="card-body">
                        <p style="font-size: 14px;">Semua pengiriman yang dilakukan Ponny Beaute berasal dari Jakarta, Indonesia</p>
                    </div>
                    </div>
            </div>
            <div class="card pt-3" style="background-color: #fcf8F0; border: none; border-bottom: #f3795c solid 1px;">
                <a data-toggle="collapse" data-parent="#accordionEx1" href="#collapse7" aria-expanded="false"
                    aria-controls="collapse7" style="text-decoration: none;">  
                    <div class="card-header" role="tab" id="heading7" style="background-color: #fcf8F0; border: none;">
                        <h7 class="mb-0" style="color: black; font-weight: 600; font-size: 17px;">
                            PENGIRIMAN BERASAL DARI MANA? <span class="float-right"> <i class="fa fa-minus" aria-hidden="true" style="color: #f3795c;"></i></span>
                        </h7> 
                    </div>
                </a>
                <div id="collapse7" class="collapse" role="tabpanel" aria-labelledby="heading7"
                    data-parent="#accordionEx1">
                    <div class="card-body">
                        <p style="font-size: 14px;">Semua pengiriman yang dilakukan Ponny Beaute berasal dari Jakarta, Indonesia</p>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')

@endsection