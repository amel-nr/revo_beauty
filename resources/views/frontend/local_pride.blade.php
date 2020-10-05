@extends('frontend.layouts.app')

@section('style')
    <style>
        .dropdown-toggle::after{
            display: none;
        }
        @media (min-width: 992px) {
            .navbar .navbar-nav .nav-links {
                padding: .5rem 1rem;
                margin-top: 0;
                margin-bottom: 0;
            }
        }
    </style>
@endsection

@section('content')

    <div style="background-color: #fcf8F0;">
        <img src="{{ $banner }}" class="w-100 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
        <div class="container">
            <h2 class="text-center pt-5 font-weight-bold">Produk Unggulan</h2>
            <div class="row pb-3" style="border-bottom: 1px solid #f3795c;">
                <div class="col-md-3 col-6 my-auto d-inline-block text-center">
                    <img src="{{ asset('frontend/images/local-pride/fss.png') }}" class="produk-unggulan-1 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                </div>
                <div class="col-md-3 col-6 my-auto d-inline-block text-center">
                    <img src="{{ asset('frontend/images/local-pride/votre.png') }}" class="produk-unggulan-2 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                </div>
                <div class="col-md-3 col-6 my-auto d-inline-block text-center">
                    <img src="{{ asset('frontend/images/local-pride/avoskin.png') }}" class="produk-unggulan-3 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                </div>
                <div class="col-md-3 col-6 my-auto d-inline-block text-center">
                    <img src="{{ asset('frontend/images/local-pride/kleveru.png') }}" class="produk-unggulan-4 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                </div>
            </div>
            <h2 class="text-center pt-5 font-weight-bold">Kenapa Produk Lokal?</h2>
            <div class="row" style="border-bottom: 1px solid #f3795c;">
                <div class="col-4 d-inline-block pr-0 pl-0 pt-5 text-center">
                    <img src="{{ asset('frontend/images/local-pride/sesuai-kulit.png') }}" class="local-pride-1 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 90px;">
                    <p class="mt-2" style="font-weight: 600; font-size: 14px;">Sesuai Kondisi<br>Kulit Indonesia</p>
                </div>
                <div class="col-4 d-inline-block pt-3 pr-0 pl-0 text-center">
                    <img src="{{ asset('frontend/images/local-pride/harga.png') }}" class="local-pride-2 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} pt-5 mb-0" alt="" style="height: 120px;">
                    <p class="mt-2" style="font-weight: 600; font-size: 14px;">Harga Ramah<br>di Kantong</p>
                </div>
                <div class="col-4 d-inline-block pt-1 pr-0 pl-0 text-center">
                    <img src="{{ asset('frontend/images/local-pride/dukung.png') }}" class="local-pride-3 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} pt-5" alt="" style="height: 135px;">
                    <p class="mt-2" style="font-weight: 600; font-size: 14px;">Dukung Kreasi<br>Anak Bangsa</p>
                </div>
            </div>
            <div class="row mb-2 text-center pt-4">
                <div class="col">
                    <h3 style="font-weight: 700;">Best Seller</h3>
                </div>
            </div>
            <div class="row align-items-center text-center pb-4" style="border-bottom: 1px solid #f3795c;" id="section_best_selling_local_pride">
                
            </div>
            @include('frontend.inc.products_section')
        </div>
    </div>

@endsection