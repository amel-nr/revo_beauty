@extends('frontend.layouts.app')

@section('style')
<style>
    .list-ruang li:hover{
        background-color: #F6AA97;
    }

    .list-ruang .active{
        background-color: #F6AA97;
    }
</style>
@endsection

@section('content')

<section style="background-color: #FCF8F0;">
    <div class="row py-2" style="background-color: #F3795C;">
        <div class="col-5 mx-auto text-center">
            <div class="row">
                <div class="col-6">
                    <a href="{{ route('forum') }}"><h4 class="mb-0 font-weight-bold" style="color: white;">BERANDA</h4></a>
                </div>
                <div class="col-6">
                    <a href="{{ route('forum_ruang') }}"><h4 class="mb-0 font-weight-bold" style="color: white;">RUANG</h4></a>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center py-5" style="background-color: #FADFD2;">
        <h3 style="color: #f3795c;" class="mb-0 font-weight-bold">PHOEBE SQUAD</h3>
        <div class="row">
            <div class="col-3 mx-auto">
                <img src="{{ asset('frontend/images/forum.png') }}" class="w-100 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
            </div>
        </div>
        <p class="mb-0" style="font-weight: 600; font-size: 24px; line-height: 34px;">Berbincang mengenai seputar skincare dan permasalahannya.<br>
        Temukan berbagai topik, dan rekomendasi produk yang cocok untuk kulitmu</p>
    </div>
    <div class="container py-4">
        <div class="row my-4">
            <div class="col-md-5 form-group p-0">
                <form id="search-form" class="form-inline d-block" role="form" action="" method="GET">
                    <div class="input-group">
                        <input type="text" aria-label="Search" id="search" name="q" class="form-control search-form px-4 py-2" style="border-radius: 30px 0px 0px 30px; border-right: 1px solid white; font-size: 18px;" placeholder="Cari Topik">
                        <span class="input-group-btn">
                            <button type="submit" style="border-radius: 0px 30px 30px 0px; cursor:pointer; background-color: white; border-color: #ddd; margin-left: -2px; border-left: 1px solid white;" class="btn btn-primary search-btn py-2"><i class="fa fa-search" style="color: #F3795C; font-size: 18px; line-height: 1.5;"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="row px-4 py-5 rounded" style=" border: 1px solid #f3795c;">
            <div class="col-3">
                <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="rounded-circle w-100 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
            </div>
            <div class="col-9">
                <h1 class="font-weight-bold">Kulit Berminyak </h1>
                <div class="row pb-4">
                    <div class="col-3">
                        <img src="{{ asset('frontend/images/forum/users.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 36px;">
                        <p class="mb-0 d-inline ml-2" style="color: #F3795C; font-size: 24px; vertical-align: middle;">1200</p>
                    </div>
                    <div class="col-3">
                        <img src="{{ asset('frontend/images/forum/comments.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 36px;">
                        <p class="mb-0 d-inline ml-2" style="color: #F3795C; font-size: 24px; vertical-align: middle;">500</p>
                    </div>
                </div>
                <p style="font-size: 20px; font-weight: 600;">Ga Setiap saat harus glowing</p>
                <a name="" id="" class="btn btn-danger rounded btn-pakai" href="#" role="button">Bergabung</a>
                <a name="" id="" class="btn btn-danger rounded btn-komplain ml-3" href="#" role="button">Mulai Obrolan</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-3">
                <ul style="list-style: none; padding-left: 0;" class="list-ruang">
                    <li class="active"><a href="#" style="color: black;"><p class="my-2 ml-3" style="font-size: 26px; font-weight: 600; line-height: 50px;">Terbaru</p></a></li>
                    <li><a href="#" style="color: black;"><p class="my-2 ml-3" style="font-size: 26px; font-weight: 600; line-height: 50px;">Populer</p></a></li>
                    <li><a href="#" style="color: black;"><p class="my-5" style="font-size: 26px; font-weight: 700;">Topik Populer</p></a></li>
                    <li><a href="#" style="color: black;"><p class="my-2 ml-3" style="font-size: 26px; font-weight: 600; line-height: 50px;">Skincare</p></a></li>
                    <li><a href="#" style="color: black;"><p class="my-2 ml-3" style="font-size: 26px; font-weight: 600; line-height: 50px;">Ponny Beaute</p></a></li>
                    <li><a href="#" style="color: black;"><p class="my-2 ml-3" style="font-size: 26px; font-weight: 600; line-height: 50px;">Komunitas</p></a></li>
                </ul>
            </div>
            <div class="col-6">
                @for($i=1; $i<=2; $i++)
                <div class="p-4 rounded mb-4" style="border: 1px solid #f3795c;">
                    <p style="margin: 0; font-size: 14px;">Balasan Terbaru di <b>Kulit Berminyak</b></p>
                    <h4 class="font-weight-bold">Sunscreen yang bikin muka makin berminyak dan tambah berminyak</h4>
                    <p style="margin: 0; font-size: 14px; color: #6C6D70;">Posted 20-07-2020 10:27 | Diupdate 1 jam yang lalu</p>
                    <div class="mt-3">
                        <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="rounded-circle img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 36px;">
                        <b class="ml-2" style="font-size: 16px;">Phoebe</b>
                        <span class="badge badge-danger" style="background-color: #F3795C;">Dewy Skin</span>
                    </div>
                    <p class="mt-1" style="text-align: justify; font-size: 16px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. <a href="{{ route('forum_ruang_detail_selengkapnya') }}" style="color: #1074BC;">...baca selengkapnya</a></p>
                    <div class="p-3" style="border: 1px solid #f3795c;">
                        <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="rounded-circle img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 36px;">
                        <b class="ml-2" style="font-size: 16px;">Phoebe</b>
                        <span class="badge badge-danger" style="background-color: #F3795C;">Dewy Skin</span>
                        <p style="margin: 0; font-size: 14px; float: right; color: #6C6D70;">Posted 20-07-2020 10:27</p>
                        <p class="mt-1" style="margin: 0; text-align: justify; font-size: 16px;"><b>Reply: </b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. <a href="{{ route('forum_ruang_detail_selengkapnya') }}" style="color: #1074BC;">...baca selengkapnya</a></p>
                    </div>
                    <div class="mt-3">
                        <i class="fa fa-heart-o" style="color: #f3795c; font-size: 24px; vertical-align: middle;"></i><span class="ml-1" style="font-size: 16px; vertical-align: middle;">52</span>
                        <a href="#modalBalas" data-toggle="modal" data-target="#modalBalas" style="color: #333;"><i class="fa fa-reply ml-3" style="color: #f3795c; font-size: 24px; vertical-align: middle;"></i><span class="ml-1" style="font-size: 16px; vertical-align: middle;">Balas</span></a><span class="ml-3" style="font-size: 16px; vertical-align: middle;"> | &nbsp; &nbsp; 39 Balasan</span>
                        <i class="fa fa-share-square-o" style="color: #f3795c; font-size: 24px; float: right; vertical-align: middle;"></i>
                    </div>
                </div>
                @endfor
            </div>
            <div class="col-3 rounded" style="padding: 0; border: 1px solid #f3795c; height: fit-content;">
                <div style="display: flex; justify-content: space-between; background-color: #f3795c;">
                    <div class="p-3" style="color: white; font-size: 18px;">Topik Terpopuler</div>
                    <div class="p-3" style="color: white; font-size: 18px;"><i class="fa fa-angle-right"></i></div>
                </div>
                <div style="padding: 10px 15px;">
                    <a href="#"><span class="badge badge-danger m-1" style="background-color: #F3795C; font-size: 16px;">skincare</span></a>
                    <a href="#"><span class="badge badge-danger m-1" style="background-color: #F3795C; font-size: 16px;">jerawat</span></a>
                    <a href="#"><span class="badge badge-danger m-1" style="background-color: #F3795C; font-size: 16px;">serum</span></a>
                    <a href="#"><span class="badge badge-danger m-1" style="background-color: #F3795C; font-size: 16px;">mosturizer</span></a>
                    <a href="#"><span class="badge badge-danger m-1" style="background-color: #F3795C; font-size: 16px;">kulit kering</span></a>
                </div>
            </div>
        </div>
    </div>
</section>
            
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $(".list-ruang li").click(function(){
            $(".list-ruang li").removeClass("active");
            $(this).addClass("active");
        });
    });
</script>
@endsection