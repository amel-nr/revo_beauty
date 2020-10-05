@extends('frontend.layouts.app')

@section('style')
<style>
    .list {
        list-style: none;
        padding: 0;
    }
    .list li {
        padding-left: 2em;
        margin-bottom: 5px;
    }
    .list li:before {
        content: "\f004";
        color: #F3795C;
        font-family: FontAwesome;
        display: inline-block;
        margin-left: -1.3em;
        width: 1.3em;
    }
</style>
@endsection

@section('content')

<div class="modal hide fade" id="modalKupon" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #FCF8F0; border: none;">
            <div class="modal-header pb-0" style="border: none; background-color: #F3795C;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">                        <span aria-hidden="true" style="color: white; font-size: 30px;">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0" style="width: 100%; margin: 0 auto;">
                <h3 class="font-weight-bold text-center pb-4" style="color: white; background-color: #F3795C;">Kupon Thayers</h3>
                <div class="container width-90 py-3">
                    <div class="row">
                        <div class="col-5 p-3 rounded" style="border: 1px solid #F3795C;">
                            <p class="font-weight-bold mb-2">KETERANGAN</p>
                            <p class="mb-0" style="line-height: 13px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                        <div class="col-7 pr-0">
                            <div class="p-0 rounded" style="border: 1px solid #F3795C;">
                                <div class="row mx-0" style="border-bottom: 1px solid #F3795C;">
                                    <div class="col-2" style="border-right: 1px dashed #F3795C;">
                                        <i class="fa fa-percent text-center py-4" aria-hidden="true" style="color: #F3795C; font-size: 16px;"></i>
                                    </div>
                                    <div class="col-10 my-auto">
                                        <p class="mb-0" style="font-size: 9px; line-height: 10px;">Minimum Pembelian</p>
                                        <p class="mb-0 font-weight-bold">Rp 150.000</p>
                                    </div>
                                </div>
                                <div class="row mx-0">
                                    <div class="col-2" style="border-right: 1px dashed #F3795C;">
                                        <i class="fa fa-calendar text-center py-4" aria-hidden="true" style="color: #F3795C; font-size: 16px;"></i>
                                    </div>
                                    <div class="col-10 my-auto">
                                        <p class="mb-0" style="font-size: 9px; line-height: 10px;">Periode</p>
                                        <p class="mb-0 font-weight-bold">1-31 Agustus 2020</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row rounded mt-3" style="border: 1px solid #F3795C;">
                        <div class="col-8 py-3">
                            <div class="row">
                                <div class="col-2 my-auto pr-0">
                                    <img src="{{ asset('frontend/images/coupon.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                </div>
                                <div class="col-8">
                                    <p class="mb-0" style="font-size: 9px; line-height: 10px;">Kode Promo</p>
                                    <p class="mb-0 font-weight-bold">HBDPHOEBE06</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 py-3 text-center" style="background-color: #F3795C;">
                            <i class="fa fa-clone" aria-hidden="true" style="color: white; line-height: 32px"></i><span style="color: white; line-height: 32px" class="ml-1">SALIN KODE</span>
                        </div>
                    </div>
                    <div class="row pt-4 px-0" style="border-bottom: 1px dashed #F3795C;"></div>
                    <p class="font-weight-bold my-3 text-left">SYARAT & KETENTUAN</p>
                    <ul class="list">
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<section style="background-color: #FCF8F0;">
    <div class="position-relative">
        @php
            $gb = DB::table('banners')->where("url","#promosi")->first();
        @endphp
        <img src="{{ isset($gb) ? asset($gb->photo) : asset('frontend/images/placeholder-landscape.jpg') }}" class="w-100 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
        <h1 class="mb-0 font-weight-bold position-absolute text-center" style="top: 50%; left: 50%; transform: translate(-50%, -50%);">PROMOSI</h1>
    </div>
    <div class="container text-center py-5">
        <h4 class="font-weight-bold mb-4">Kupon Diskon</h4>
        <div class="row pb-5" style="border-bottom: 1px solid #F3795C;">
            <div class="col-1 d-flex align-items-center justify-content-center product-slider">
                <a href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <div class="carousel-nav-icon">
                        <i class="fa fa-chevron-left" aria-hidden="true" style="font-size: 30px;"></i>
                    </div>
                </a>
            </div>
            <div class="col-10 product-slider">
                <!--Start carousel-->
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($coupons as $key => $items)
                        <div class="carousel-item {{ $key==0 ? 'active' : ''}}">
                            <div class="row">
                            @foreach($items as $coupon)
                                <div class="col-3 px-2">
                                    <div class="width-100 position-relative">
                                        <div style="padding-top: 100%; background-color: white;"></div>
                                        <a href="#" class="h-100 position-absolute" style="top: 0; bottom: 0; left: 0; right: 0;">
                                            @if($coupon->banner!=null)
                                            <img src="{{ asset($coupon->banner) }}" class="w-100 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width: 100%; height: 100%; object-fit: contain;" onclick="showCouponModal({{ $coupon->id }})">
                                            @else
                                            <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="w-100 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width: 100%; height: 100%; object-fit: contain;" onclick="showCouponModal({{ $coupon->id }})">
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-1 d-flex align-items-center justify-content-center product-slider"><a href="#carouselExampleIndicators" data-slide="next">
                <div class="carousel-nav-icon">
                    <i class="fa fa-chevron-right" aria-hidden="true" style="font-size: 30px;"></i>
                </div>
                </a>
            </div>
            <div class="col-1 align-items-center justify-content-center product-slider-mobile my-auto px-0">
                <a href="#carouselExampleIndicatorsMobile" role="button" data-slide="prev">
                    <div class="carousel-nav-icon">
                        <i class="fa fa-chevron-left" aria-hidden="true" style="font-size: 30px;"></i>
                    </div>
                </a>
            </div>
            <div class="col-10 product-slider-mobile">
                <!--Start carousel-->
                <div id="carouselExampleIndicatorsMobile" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($coupons_mobile as $key => $items)
                        <div class="carousel-item {{ $key==0 ? 'active' : ''}}">
                            <div class="row">
                            @foreach($items as $coupon)
                                <div class="col-6 px-2">
                                    <div class="width-100 position-relative">
                                        <div style="padding-top: 100%; background-color: white;"></div>
                                        <a href="#" class="h-100 position-absolute" style="top: 0; bottom: 0; left: 0; right: 0;">
                                            @if($coupon->banner!=null)
                                            <img src="{{ asset($coupon->banner) }}" class="w-100 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width: 100%; height: 100%; object-fit: contain;" onclick="showCouponModal({{ $coupon->id }})">
                                            @else
                                            <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="w-100 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width: 100%; height: 100%; object-fit: contain;" onclick="showCouponModal({{ $coupon->id }})">
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-1 align-items-center justify-content-center product-slider-mobile my-auto px-0"><a href="#carouselExampleIndicatorsMobile" data-slide="next">
                <div class="carousel-nav-icon">
                    <i class="fa fa-chevron-right" aria-hidden="true" style="font-size: 30px;"></i>
                </div>
                </a>
            </div>
        </div>
        <h4 class="font-weight-bold mb-4 mt-5">Promosi</h4>
        <div class="row mb-5">
            @php
                $promo = DB::table("promotion")->get()
            @endphp
            @foreach($promo as $p)
            <div class="col-6 text-center mb-5 px-4">
                <div class="rounded width-100 position-relative" style="border: 1px solid #f3795c; overflow: hidden;">
                    <div style="padding-top: 100%; background-color: white;"></div>
                    <div class="h-100 position-absolute" style="top: 0; bottom: 0; left: 0; right: 0;">
                        <img src="{{ asset($p->banner) }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" style="width: 100%; height: 100%; object-fit: contain;" alt="">
                    </div>
                    {{--<p class="my-5 width-90 mx-auto" style="font-size: 18px;">{{$p->caption}}</p>
                    <div style=" background-color:#f3795c; border: 1px solid #f3795c; color:white;display:none">
                        <a href="#modalKupon" data-toggle="modal" data-target="#modalKupon"><h5 class="mb-0 py-3" style="color: white; font-weight: 600;">YUK, LIHAT PROMO</h5></a>
                    </div>--}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
            
@endsection

@section('script')

@endsection