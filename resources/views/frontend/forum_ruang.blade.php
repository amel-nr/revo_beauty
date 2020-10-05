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

        .dropdown-menu {
            min-width: 0 !important;
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
        <h1 style="color: #f3795c; font-size: 48px;" class="mb-0 font-weight-bold">RUANG</h1>
        <p class="mb-0" style="font-weight: 600; font-size: 24px; line-height: 34px;">Temukan berbagai topik menarik seputar skincare yang kamu sukai<br>
        dan berbincang dengan member lainnya.</p>
        <div class="row mt-4">
            <div class="col-md-4 p-0 form-group mx-auto">
                <form id="search-form" class="form-inline mx-auto d-block" role="form" action="" method="GET">
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
    </div>
    <div class="container py-4">
        <div class="row text-left" style=" border-bottom: 1px solid #f3795c">
            <div class="col-3 pr-0">
                <a href="#"><h4 class="font-weight-bold" style="color: black;">Semua Ruang</h4></a>
            </div>
            <div class="col-3 pl-0">
                <a href="#"><h4 class="font-weight-bold" style="color: black;">Ruang Saya</h4></a>
            </div>
        </div>
        <nav class="navbar navbar-expand-md">
            <div class="container">
                <div class="navbar-collapse collapse" id="main-nav-1" style="justify-content: flex-end;">
                    <ul class="navbar-nav pt-4">
                        <li class="nav-item mr-2" style="background-color: #fcf8F0; border: 1px solid #f3795c; border-radius: 5px; overflow: hidden;">
                            <a href="#" class="nav-link nav-links dropdown-toggle filter2-button filter-button" data-toggle="dropdown" data-target="#" style="background-color: #fcf8F0; border-color: #f3795c; color: black;"><i class="fa fa-sliders" aria-hidden="true"></i>Filter</a>
                            <div class="dropdown-menu mt-2 p-4" style="background-color: #FCF8F0; border: 1px solid #f3795c; left: auto;">
                                <div>
                                    <label class="checkbox-container mb-2">
                                        <p class="mb-0" style="line-height: 20px; vertical-align: middle;">Makeup</p>
                                        <input type="checkbox">
                                        <span class="checkbox-checkmark"></span>
                                    </label>
                                </div>
                                <div>
                                    <label class="checkbox-container mb-2">
                                        <p class="mb-0" style="line-height: 20px; vertical-align: middle;">Skincare</p>
                                        <input type="checkbox">
                                        <span class="checkbox-checkmark"></span>
                                    </label>
                                </div>
                                <div>
                                    <label class="checkbox-container mb-2">
                                        <p class="mb-0" style="line-height: 20px; vertical-align: middle;">Hair</p>
                                        <input type="checkbox">
                                        <span class="checkbox-checkmark"></span>
                                    </label>
                                </div>
                                <div>
                                    <label class="checkbox-container mb-2">
                                        <p class="mb-0" style="line-height: 20px; vertical-align: middle;">Ponny Beaute</p>
                                        <input type="checkbox">
                                        <span class="checkbox-checkmark"></span>
                                    </label>
                                </div>
                                <div>
                                    <label class="checkbox-container mb-2">
                                        <p class="mb-0" style="line-height: 20px; vertical-align: middle;">Lainnya</p>
                                        <input type="checkbox">
                                        <span class="checkbox-checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item" style="background-color: #FCF8F0; border: 1px solid #f3795c; border-radius: 5px; overflow: hidden;">
                            <a href="#" class="nav-link nav-links dropdown-toggle filter2-button filter-button" data-toggle="dropdown" data-target="#" style="background-color: #fcf8F0; border-color: #f3795c; color: black;"><i class="fa fa-chevron-down" aria-hidden="true"></i>Urutkan</a>
                            <div class="dropdown-menu mt-2 py-2 px-1" style="background-color: #FCF8F0; border: 1px solid #f3795c; left: auto;">
                                <a class="dropdown-item" href="#">Trending</a>
                                <a class="dropdown-item" href="#">Populer</a>
                                <a class="dropdown-item" href="#">A - Z</a>
                            </div>
                        </li>
                    </ul>   
                </div>
            </div>
        </nav>
        <div class="row mb-5">
            @for($i=1; $i<=6; $i++)
            <div class="col-4 text-center pt-1 my-4">
                <div style="border: 1px solid #f3795c;">
                    <img src="{{ asset('frontend/images/placeholder-rect.jpg') }}" class="w-100 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                    <a href="{{ route('forum_ruang_detail') }}"><h4 class="font-weight-bold mt-2" style="color: black;">Kulit Berminyak</h4></a>
                    <div class="container px-5">
                        <div class="row text-center pb-3" style="border-bottom: 1px solid #f3795c;">
                            <div class="col-6">
                                <img src="{{ asset('frontend/images/forum/users.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                <p class="mb-0 d-inline" style="color: #F3795C; font-size: 16px; vertical-align: middle;">1200</p>
                            </div>
                            <div class="col-6">
                                <img src="{{ asset('frontend/images/forum/comments.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                <p class="mb-0 d-inline" style="color: #F3795C; font-size: 16px; vertical-align: middle;">500</p>
                            </div>
                        </div>
                    </div>
                    <p class="pt-2 pb-4" style="font-size: 16px;">Ga Setiap saat harus glowing</p>
                    <div style=" background-color:#f3795c; border: 1px solid #f3795c; color:white;">
                        <a href="#"><h4 class="mb-0 py-1" style="color: white;">GABUNG</h4></a>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</section>
            
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $(".filter-button").focus(function(){
            $(this).css({"background-color": "#f3795c", "color": "white"});
        });
        $(".filter-button").blur(function(){
            $(this).css({"background-color": "#fcf8F0", "color": "black"});
        });
    });
</script>
@endsection