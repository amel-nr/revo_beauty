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
        height: 70%;
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

    #avatar-consultation-container {
        display: inline-block;
        position: relative;
        width: 100%;
    }

    #avatar-consultation-dummy {
        margin-top: 100%;
    }

    #avatar-consultation-element {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: white;
    }
    .lds-ripple {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
    }
    .lds-ripple div {
        position: absolute;
        border: 4px solid #f3795c;
        opacity: 1;
        border-radius: 50%;
        animation: lds-ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
    }
    .lds-ripple div:nth-child(2) {
        animation-delay: -0.5s;
    }
    @keyframes lds-ripple {
        0% {
            top: 36px;
            left: 36px;
            width: 0;
            height: 0;
            opacity: 1;
        }
        100% {
            top: 0px;
            left: 0px;
            width: 72px;
            height: 72px;
            opacity: 0;
        }
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
        <h1 class="text-center pt-5">Tunggu sebentar...</h1>
        <p class="text-center pt-3 pb-2" style="font-size: 36px; font-weight: 500; line-height: 2rem;">Kamu akan segera dihubungkan</p>
        <div class="lds-ripple mx-auto d-block mb-5"><div></div><div></div></div>
        @for($i=1; $i<=3; $i++)
        <div class="row pb-5">
            <div class="col-8 mx-auto">
                <div class="row p-4 rounded" style="background-color: white;">
                    <div class="col-md-2 col-8 mx-md-0 mx-auto my-auto py-2">
                        <div id="avatar-consultation-container">
                            <div id="avatar-consultation-dummy"></div>
                            <div id="avatar-consultation-element" class="rounded-circle" style="background-image: url('{{ asset('frontend/images/placeholder.jpg') }}'); background-repeat: no-repeat; background-size: cover; background-position: center; width: 100%;"></div>
                        </div>
                    </div>
                    <div class="col-md-10 col-12 my-auto">
                        <p class="heading-3 font-weight-bold">Dr. Soetomo</p>
                        <p class="mb-1" style="font-size: 18px;">Graduated From : Universitas Indonesia</p>
                        <p class="mb-0" style="font-size: 18px;">Tempat Praktik : RSUD Dr. Soetomo, Surabaya</p>
                    </div>
                </div>
            </div>
        </div>
        @endfor    
    </div>
</section>
@endsection

@section('script')

@endsection