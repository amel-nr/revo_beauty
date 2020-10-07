@extends('frontend.layouts.app')

@section('style')
<style>
    p:not(.lead){
        font-size: 18px;
        line-height: normal;
        text-align: justify;
    }
    li{
        font-size: 18px;
        line-height: normal;
        margin-bottom: 1rem;
    }
</style>
@endsection

@section('content')
<section style="background-color: #fcf8F0;">
    <div style="background: #FACAC3 url({{ asset('frontend/images/atribut.png') }}) no-repeat center center; background-size: cover; padding: 100px 0;">
        <p class="mb-0 font-weight-bold text-center" style="font-size: 64px; color: white; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black;">OH HAPPY SKIN.</p>
    </div>
    <div class="container py-5">
        {{-- <div class="row"> --}}
            <div class="row my-5">
                <div class="col-12">
                    <div class="text-center mx-auto">
                        <h4 class="mb-4" style="font-weight: bold;">TENTANG PONNY BEAUTE</h4>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col">
                    <a href="#" class="button-tentang-ponny about-ponny-button" style="color: #f3795c;"><p class="mb-0 pb-4" style="font-size: 20px; font-weight: 600; ">Apa itu Ponny Beaute</p></a>
                </div>
                <div class="col">
                    <a href="#" class="button-tentang-ponny our-promise-button" style="color: black;"><p class="mb-0 pb-4" style="font-size: 20px; font-weight: 600;">Keunggulan Kami</p></a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="about-ponny pb-5">
                        <p class="font-weight-bold">BELANJA PRODUK KECANTIKAN LEBIH TEPAT DAN NYAMAN</p>
                        <p>Sejak 2014, Ponny Beaute adalah beauty e-commerce yang menyediakan produk dari
                            premium brands dan kini juga mulai mengajak brand lokal untuk bergabung. Tidak hanya
                            sembarang menjual produk, kami juga ingin mengedukasi para konsumen dengan memberi
                            solusi akan masalah kulit wajah mereka melalui produk yang tepat. Ponny Beaute akan terus
                            berkembang dan meningkatkan kualitas pelayanan seiring berjalannya waktu.</p>
                        <p>Ponny Beaute berjanji untuk tidak hanya melayani para pembeli saja, tetapi juga
                            memberikan upaya terbaik yang melebihi dedikasi kami dalam bidang customer service.
                            Sebagai buah dari komitmen ini, kami selalu berusaha agar dapat mendampingi masingmasing pembeli untuk mempertemukan mereka dengan beragam produk kecantikan terbaik
                            yang tersedia, dengan cara menjawab pertanyaan, memberikan petunjuk dan masukan, serta
                            meninjau masalah kecantikan yang mereka alami.</p>
                    </div>
                    <div class="our-promise" style="display: none;">
                        <div class="row pb-4">
                            <div class="col-md-3 col-4 my-auto text-center">
                                <img src="{{ asset('frontend/images/pengiriman.png') }}" alt="" style="height: 60px;">
                                <p class="pt-2 text-center" style="color: #f3795c; font-weight: bold; font-size: 14px;">PENGIRIMAN <br> KILAT</p>
                            </div>
                            <div class="col-md-9 col-8 my-auto">
                                <div class="" style="font-weight: 600; font-size: 18px;">Kami menggunakan jasa ekspedisi yang bisa menjangkau seluruh wilayah Indonesia agar pesananmu sampai tepat waktu. </div>
                            </div>
                        </div>
                        <div class="row pb-4">
                            <div class="col-md-3 col-4 my-auto text-center">
                                <img src="{{ asset('frontend/images/bpom.png') }}" alt="" style="height: 65px;">
                                <p class="pt-2 text-center" style="color: #f3795c; font-weight: bold; font-size: 14px;">PRODUK <br> TERDAFTAR BPOM</p>
                            </div>
                            <div class="col-md-9 col-8 my-auto">
                                <div class="" style="font-weight: 600; font-size: 18px;">Kami menyediakan produk terbaik yang ber-BPOM dan original dari berbagai negara. </div>
                            </div>
                        </div>
                        <div class="row pb-4">
                            <div class="col-md-3 col-4 my-auto text-center">
                                <img src="{{ asset('frontend/images/konsumen.png') }}" alt="" style="height: 60px;">
                                <p class="pt-2 text-center" style="color: #f3795c; font-weight: bold; font-size: 14px;">LAYANAN <br> KONSUMEN</p>
                            </div>
                            <div class="col-md-9 col-8 my-auto">
                                <div class="" style="font-weight: 600; font-size: 18px;">Kami bisa bantu merekomendasikan produk terbaik dengan menjawab pertanyaan dan memberikan solusi untuk jenis dan masalah kulitmu.</div>
                            </div>
                        </div>
                        <div class="row pb-4">
                            <div class="col-md-3 col-4 my-auto text-center">
                                <img src="{{ asset('frontend/images/kemasan.png') }}" alt="" style="height: 80px;">
                                <p class="pt-2 text-center" style="color: #f3795c; font-weight: bold; font-size: 14px;">KEMASAN <br> AMAN</p>
                            </div>
                            <div class="col-md-9 col-8 my-auto">
                                <div class="" style="font-weight: 600; font-size: 18px;">Kami selalu menggunakan bahan terpilih untuk melindungi pesananmu agar tidak terpecah belah dan sampai dengan selamat di tanganmu.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {{-- </div> --}}
    </div>
</section>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $(".button-tentang-ponny").click(function(){
            $(".button-tentang-ponny").css("color", "black");
            $(this).css("color", "#f3795c");
        });
        $(".about-ponny-button").click(function(){
            $(".about-ponny").show(300);
            $(".our-promise").hide(300);
        });
        $(".our-promise-button").click(function(){
            $(".about-ponny").hide(300);
            $(".our-promise").show(300);
        });
    });
</script>
@endsection