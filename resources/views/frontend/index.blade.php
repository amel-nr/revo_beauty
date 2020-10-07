@extends('frontend.layouts.app')

@section('style')
<style>
    .top-navbar{
        background-color: transparent;
        position: absolute;
    }
    .top-navbar:hover {
        background-color: #ffffff;
    }
    .top-navbar-fixed {
        position: fixed;
        top: 0;
        width: 100%;
        background-color: #ffffff; 
    }
    .best-phoebe-title{
        font-weight: 700;
        padding: 10px 50px;
        color: black;
        border-bottom: 3px solid #ddd;
    }
    .best-phoebe-title.active{
        font-weight: 700;
        padding: 10px 50px;
        color: #FFAAA5;
        border-bottom: 3px solid #FFAAA5;
    }
    #distance{
        height: 0 !important;
    }
</style>
@endsection

@section('content')
    <section class="home-banner-area" style="background-color: #ffffff;">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach (\App\Slider::where('published', 1)->get() as $key => $slider)
                    @if ($key==0)
                        <li data-target="#carouselExampleControls" data-slide-to="{{ $key }}" class="active"></li>
                    @else
                        <li data-target="#carouselExampleControls" data-slide-to="{{ $key }}"></li>
                    @endif
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach (\App\Slider::where('published', 1)->get() as $key => $slider)
                    @if ($key==0)
                        <div class="carousel-item active">
                            <a href="{{ $slider->link }}" target="_blank">
                            <img class="d-block w-100 lazyload" src="{{ asset('frontend/images/placeholder-rect.jpg') }}" data-src="{{ asset($slider->photo) }}" alt="{{ env('APP_NAME')}} promo">
                            </a>
                        </div>
                    @else
                        <div class="carousel-item">
                            <a href="{{ $slider->link }}" target="_blank">
                            <img class="d-block w-100 lazyload" src="{{ asset('frontend/images/placeholder-rect.jpg') }}" data-src="{{ asset($slider->photo) }}" alt="{{ env('APP_NAME')}} promo">
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true" style="width: 30px; height: 30px;"></span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true" style="width: 30px; height: 30px;"></span>
            </a>
        </div>
        <div class="container" style="padding-top: 30px;">
            <nav class="nav justify-content-center nav-best-phoebe">
                <h6><a class="nav-link best-phoebe-title" id="bbs" href="#">BEST SELLER</a></h6>
                <h6><a class="nav-link best-phoebe-title" id="bpc" href="#">OUR PICKS</a></h6>
            </nav>
            <div class="my-5 text-center container pb-4" id="bestsell" style="border-bottom: 1px solid #D1D1D1;">
                <div class="row mb-2">
                    <div class="col text-center">
                        <h3 style="font-weight: 700;" id="tbs">Best Seller</h3>
                    </div>
                </div>
                <div class="row d-flex align-items-center" id="section_best_selling">
                    
                </div>
            </div>
            <!-- <div class="my-5 text-center container" id="pchoice" style="border-bottom: 1px solid #FFAAA5;display:none;">
                <div class="row mb-2">
                    <div class="col text-center">
                        <h3 style="font-weight: 700;" id="tpchoice">Our Picks</h3>
                    </div>
                </div>
                <div class="row d-flex align-items-center" id="section_pc">
                    
                </div>
            </div> -->
            <div class="my-5 text-center container">
                <div class="row mb-2">
                    <div class="col text-center">
                        <h3 style="font-weight: 700;">Shop by Brands</h3>
                    </div>
                </div>
                <div class="row d-flex align-items-center" id="section_news_sell">
                    
                </div>
            </div>
        </div>
            @php
                $flash_deal = \App\FlashDeal::where('status', 1)->first();
              
            @endphp
            @if($flash_deal != null && strtotime(date('d-m-Y H:i')) >= $flash_deal->start_date && strtotime(date('d-m-Y H:i')) <= $flash_deal->end_date)
        <div class="my-5 pb-5 text-center" style="background-color: #F9CAC1;">
            <div class="row">
                <div class="col-md-3 col-8 mx-auto text-center py-3">
                    <img src="{{ asset('frontend\images\flash-sale.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                </div>
            </div>
            <div style="background-color: #FADFD2;">
                <div class="container p-4" style="background-color: #FADFD2;">
                    <div class="section-title-1 clearfix ">
                        <h3 class="heading-5 strong-700 mb-0 float-left">
                            {{__('BERAKHIR DALAM')}}
                        </h3>
                        <div class="flash-deal-box float-left">
                            <div class="countdown countdown--style-1 countdown--style-1-v1 " data-countdown-date="{{ date('m/d/Y H:i', $flash_deal->end_date) }}" data-countdown-label="show"></div>
                        </div>
                        <ul class="inline-links float-right">
                            <li><a href="{{ route('flash-deal-details', $flash_deal->slug) }}" class="btn btn-danger text-center btn-mskkeranjang ml-3 float-right active" style="background-color: #F3795C">Lihat Semua</a></li>
                        </ul>
                    </div>
                    <div class="row d-flex align-items-center" id="section_flash_deal">

                    </div>
                </div>
            </div>
        </div>
        @endif

        {{--@php
            $flash_deal = \App\FlashDeal::where('status', 1)->where('featured', 1)->first();
            
        @endphp
        @if($flash_deal != null && strtotime(date('d-m-Y H:i')) >= $flash_deal->start_date && strtotime(date('d-m-Y H:i')) <= $flash_deal->end_date)
        <div class="container my-5 p-4 rounded" style="background-color: #FADFD2;">
            <div class="section-title-1 clearfix ">
                <h3 class="heading-5 strong-700 mb-0 float-left">
                    {{__("Today's Deal")}}

                </h3>
                <div class="flash-deal-box float-left">
                    <div class="countdown countdown--style-1 countdown--style-1-v1 " data-countdown-date="{{ date('m/d/Y H:i', $flash_deal->end_date) }}" data-countdown-label="show"></div>
                </div>
                <ul class="inline-links float-right">
                    <li><a href="{{ route('flash-deal-details', $flash_deal->slug) }}" class="btn btn-danger text-center btn-mskkeranjang ml-3 float-right active" style="background-color: #F3795C">Lihat Semua</a></li>
                </ul>
            </div>
            <div class="row pt-4 text-center">
                @foreach ($flash_deal->flash_deal_products as $key => $flash_deal_product)
                @php
                    $product = \App\Product::find($flash_deal_product->product_id);
                    $product_variant=json_decode($product->choice_options);
                    $qty = 0;
                    if($product->variant_product){
                        foreach ($product->stocks as $key => $stock) {
                            $qty += $stock->qty;
                        }
                    }
                    else{
                        $qty = $product->current_stock;
                    }
                @endphp
                @if ($product != null && $product->published != 0)
                <div class="col-3 align-items-center justify-content-center">
                    <div class="content-product">
                        
                        <a href="{{ route('product', $product->slug) }}" class="d-block product-image h-100">
                            <img class="img-fit lazyload mx-auto ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" src="{{ asset('frontend/images/placeholder.jpg') }}" data-src="{{ asset($product->thumbnail_img) }}" alt="{{ __($product->name) }}">
                        </a>
                        <i class="fa fa-heart-o" aria-hidden="true" style="position: absolute; top: 0; right: 0; margin: 10px; color: #F3795C; font-size: 20px;" onclick="addToWishList({{ $product->id }});"></i>
                        <div class="content-hover">
                        @if ($product->choice_options != null && count($product_variant) > 0)
                            <a href="#"><div class="content-hide addtobag"  onclick="showAddToBagModal({{ $product->id }})">
                                <p style="font-weight: 700;">ADD TO BAG</p>
                            </div></a>
                        @elseif ($qty == 0 AND $product->digital == 0)
                            <a href="#"><div class="content-hide addtobag"  onclick="showAddToBagModal({{ $product->id }})">
                                <p style="font-weight: 700;">ADD TO BAG</p>
                            </div></a>
                        @else
                            <a href="#"><div class="content-hide addtobag"  onclick="addToBag({{ $product->id }})">
                                <p style="font-weight: 700;">ADD TO BAG</p>
                            </div></a>
                        @endif
                            <a href="#"><div class="content-hide quickview" onclick="showAddToCartModal({{ $product->id }})">
                                <p style="font-weight: 700;">QUICK VIEW</p>
                            </div></a>
                        </div>
                    </div>
                    <p style="font-weight: 700; font-size: 16px; margin-top: 15px; margin-bottom: 0;">
                        {{ __($product->brand['name']) }}
                    </p>
                    <p style="margin: 0;">{{ __($product->name) }}</p>
                    <p style="font-weight: 700; margin: 0;">
                        @if(home_price($product->id) != home_discounted_price($product->id))
                            <del class="old-product-price strong-400">{{ home_price($product->id) }}</del>
                        @endif
                        <span class="product-price strong-600">
                            {{ home_discounted_price($product->id) }}
                        </span>
                    </p>
                    <p> {{ renderStarRating2($product->rating) }}(5)</p>
                </div>  
                @endif
                @endforeach
            </div>
        </div>
        @endif--}}
        
        <div style="background-color: #F6E5F5; position: relative; padding: 50px 0;">
            <p class="mb-0 heading-1" style="text-align: center; position: absolute; width: 100%; top: -10px; font-weight: 700; color: #FFAAA5;">OUR DIARY.</p>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-12 text-right">
                        <iframe class="video-phoebe" width="420" height="315" src="https://www.youtube.com/embed/5ou09YALCJw">
                        </iframe>
                    </div>
                    <div class="col-md-6 col-12">
                        <p class="heading-4" style="font-weight: 700; margin: 20px 0;">Menuju Glowing Bersama Phoebe</p>
                        <p class="deskripsi-video-phoebe" style="font-size: 16px; width: 60%;">Siapa nih yang masih suka bingung sama skincare routine atau baru mau mulai pakai skincare?</p>
                        <p class="deskripsi-video-phoebe" style="font-size: 16px; width: 60%;">Biar nggak salah langkah, kamu bisa tonton video baru dari Ponny Beaute dalam series: Belajar Bareng Phoebe!</p>
                        <a name="" id="" class="btn btn-danger lihatlebihbanyak" href="#" role="button">Lihat lebih banyak</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="my-5 text-center container">
                <div class="row mb-2">
                    <div class="col-md-3 col-8 p-0 mx-auto">
                        <h4 style="font-weight: 700;">Recommended for You</h4>
                    </div>
                </div>
                <div class="row align-items-center pt-4">
                    <div class="col-1 align-items-center justify-content-center p-0">
                        <a href="#carouselExampleIndicatorsBlog" role="button" data-slide="prev" class="product-slider">
                            <div class="carousel-nav-icon">
                                <i class="fa fa-chevron-left" aria-hidden="true" style="font-size: 30px; color: #8675A9;"></i>
                            </div>
                        </a>
                        <a href="#carouselExampleIndicatorsBlogMobile" role="button" data-slide="prev" class="product-slider-mobile">
                            <div class="carousel-nav-icon">
                                <i class="fa fa-chevron-left" aria-hidden="true" style="font-size: 30px;"></i>
                            </div>
                        </a>
                    </div>
                    <div class="col-10">
                        <!--Start carousel-->
                        <div id="blog-section">
                            <div class="row">
                                <div class="col-3">
                                    <img src="{{ asset('frontend/images/produk_2.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} float-left" alt="" style="height: 250px;">
                                    <div class="py-2 w-100" style="position:absolute; padding-bottom: 50px; padding-right: 50px;" >
                                        <img src="{{ asset('frontend/images/heart.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} float-right" alt="" style="height: 27px;">
                                    </div>
                                    <p class="mb-0 pt-3 text-left" style="font-weight: 700; font-size: 20px; margin-top: 255px;">THE ORDINARY</p>
                                    <p class="mb-0 text-left">Niacinamide 10% + Zinc 1%</p>
                                    <p class="text-left" style="font-weight: 600; font-size: 18px;">Rp 215.000</p> 
                                </div>
                                <div class="col-3">
                                    <img src="{{ asset('frontend/images/produk_2.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} float-left" alt="" style="height: 250px;">
                                    <div class="py-2 w-100" style="position:absolute; padding-bottom: 50px; padding-right: 50px;" >
                                        <img src="{{ asset('frontend/images/heart.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} float-right" alt="" style="height: 27px;">
                                    </div>
                                    <p class="mb-0 pt-3 text-left" style="font-weight: 700; font-size: 20px; margin-top: 255px;">THE ORDINARY</p>
                                    <p class="mb-0 text-left">Niacinamide 10% + Zinc 1%</p>
                                    <p class="text-left" style="font-weight: 600; font-size: 18px;">Rp 215.000</p> 
                                </div>
                                <div class="col-3">
                                    <img src="{{ asset('frontend/images/produk_2.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} float-left" alt="" style="height: 250px;">
                                    <div class="py-2 w-100" style="position:absolute; padding-bottom: 50px; padding-right: 50px;" >
                                        <img src="{{ asset('frontend/images/heart.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} float-right" alt="" style="height: 27px;">
                                    </div>
                                    <p class="mb-0 pt-3 text-left" style="font-weight: 700; font-size: 20px; margin-top: 255px;">THE ORDINARY</p>
                                    <p class="mb-0 text-left">Niacinamide 10% + Zinc 1%</p>
                                    <p class="text-left" style="font-weight: 600; font-size: 18px;">Rp 215.000</p> 
                                </div>
                                <div class="col-3">
                                    <img src="{{ asset('frontend/images/produk_2.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} float-left" alt="" style="height: 250px;">
                                    <div class="py-2 w-100" style="position:absolute; padding-bottom: 50px; padding-right: 50px;" >
                                        <img src="{{ asset('frontend/images/heart.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} float-right" alt="" style="height: 27px;">
                                    </div>
                                    <p class="mb-0 pt-3 text-left" style="font-weight: 700; font-size: 20px; margin-top: 255px;">THE ORDINARY</p>
                                    <p class="mb-0 text-left">Niacinamide 10% + Zinc 1%</p>
                                    <p class="text-left" style="font-weight: 600; font-size: 18px;">Rp 215.000</p> 
                                </div>
                            </div>
                        </div>
                        <!--End carousel-->
                    </div>
                    <div class="col-1 align-items-center justify-content-center p-0">
                        <a href="#carouselExampleIndicatorsBlog" role="button" data-slide="next" class="product-slider">
                            <div class="carousel-nav-icon">
                                <i class="fa fa-chevron-right" aria-hidden="true" style="font-size: 30px; color: #8675A9;"></i>
                            </div>
                        </a>
                        <a href="#carouselExampleIndicatorsBlogMobile" role="button" data-slide="next" class="product-slider-mobile">
                            <div class="carousel-nav-icon">
                                <i class="fa fa-chevron-right" aria-hidden="true" style="font-size: 30px;"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container pt-5">
            <div class="row">
                <div class="col-11 text-center pl-5">
                    <h3 class="pl-5" style="font-weight: 700;">Blog</h3>
                </div>
                <div class="col-1">
                    <p><a href="#" style="color: black; text-decoration: underline; font-size: 15px;">See more</a></p>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-4 text-right">
                    <img src="{{ asset('frontend/images/produk_1.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 160px;">
                </div>
                <div class="col-8">
                    <p class="mb-0" style="font-size: 20px; font-weight: 600;">Waktu yang tepat untuk AHA 30% + BHA 2% Peeling Solution</p>
                    <p class="pt-2" style="font-size: 17px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                    <div class="row pt-5">
                        <div class="col-8">
                            <p class="mb-0" style="font-size: 17px; font-weight: 600;">Ofeelia Parveen in Tips and Tricks</p>
                            <p class="pt-1" style="font-size: 15px;">Aug 28 <span><i class="fas fa-circle"></i></span> 5 min read</p>
                        </div>
                        <div class="col-4 pt-3">
                            <div class="row">
                                <div class="col-6 pr-3 text-right">
                                    <img src="{{ asset('frontend/images/bookmark.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 20px;">
                                </div>
                                <div class="col-6 pl-0">
                                    <img src="{{ asset('frontend/images/more.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 20px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-4 text-right">
                    <img src="{{ asset('frontend/images/produk_1.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 160px;">
                </div>
                <div class="col-8">
                    <p class="mb-0" style="font-size: 20px; font-weight: 600;">Waktu yang tepat untuk AHA 30% + BHA 2% Peeling Solution</p>
                    <p class="pt-2" style="font-size: 17px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                    <div class="row pt-5">
                        <div class="col-8">
                            <p class="mb-0" style="font-size: 17px; font-weight: 600;">Ofeelia Parveen in Tips and Tricks</p>
                            <p class="pt-1" style="font-size: 15px;">Aug 28 <span><i class="fas fa-circle"></i></span> 5 min read</p>
                        </div>
                        <div class="col-4 pt-3">
                            <div class="row">
                                <div class="col-6 pr-3 text-right">
                                    <img src="{{ asset('frontend/images/bookmark.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 20px;">
                                </div>
                                <div class="col-6 pl-0">
                                    <img src="{{ asset('frontend/images/more.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 20px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-4 text-right">
                    <img src="{{ asset('frontend/images/produk_1.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 160px;">
                </div>
                <div class="col-8">
                    <p class="mb-0" style="font-size: 20px; font-weight: 600;">Waktu yang tepat untuk AHA 30% + BHA 2% Peeling Solution</p>
                    <p class="pt-2" style="font-size: 17px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                    <div class="row pt-5">
                        <div class="col-8">
                            <p class="mb-0" style="font-size: 17px; font-weight: 600;">Ofeelia Parveen in Tips and Tricks</p>
                            <p class="pt-1" style="font-size: 15px;">Aug 28 <span><i class="fas fa-circle"></i></span> 5 min read</p>
                        </div>
                        <div class="col-4 pt-3">
                            <div class="row">
                                <div class="col-6 pr-3 text-right">
                                    <img src="{{ asset('frontend/images/bookmark.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 20px;">
                                </div>
                                <div class="col-6 pl-0">
                                    <img src="{{ asset('frontend/images/more.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 20px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center py-5">
            <a name="" id="" class="btn btn-danger followphoebe" href="https://www.instagram.com/ponnybeaute/" role="button" style="background-color: #FFAAA5; border: 1px solid #FFAAA5; color: #ffffff;"><i class="fa fa-instagram" aria-hidden="true" style="margin-right: 5px;"></i>FOLLOW</a>
        </div>
    </section>
    

    
    <!-- Modal -->
    <div class="modal hide fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: #ffffff; border: 1px solid #FFAAA5;">
                <div class="modal-header" style="border-bottom: transparent;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="heading-3 mt-3" style="text-align: center; font-weight: 700;">HALO BEAUTIES !</p>
                    <p style="text-align: center; width: 80%; display: block; margin: 0 auto;">Nikmati diskon 10% untuk pesanan pertamamu. Mau? Tulis email aktifmu di bawah ini dan Phoebe akan kirim kode promonya ke email.</p>
                    <div class="form-group">
                    <label for=""></label>
                    <input type="email" class="form-control" name="" id="" aria-describedby="emailHelpId" placeholder="Email" style="padding: 10px; width: 60%; display: block; margin: 0 auto; border-color: #D1D1D1;">
                    </div>
                    <button type="button" class="btn btn-primary" style="display: block; margin: 0 auto; background-color: #FFAAA5; border: none; padding: 10px 40px; border-radius: 5px; margin-bottom: 50px;">DAFTAR</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){

            $.post('{{ route('home.section.featured') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_featured').html(data);
                slickInit();
            });

            lbs();

            $("#bpc").on("click", function (e) {
                e.preventDefault()
                lpc()
            })
            $("#bbs").on("click", function (e) {
                e.preventDefault()
                lbs()
            })


            $.post('{{ url('home/section/news_sell') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_news_sell').html(data);
                slickInit();
                initGlobalRate();
                $("#carouselExampleIndicators1, #carouselExampleIndicators1Mobile").on('slid.bs.carousel', function () {
                    slickInit();
                    initGlobalRate();
                });
            });
            $.post('{{ url('home/section/flash_deal') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_flash_deal').html(data);
                slickInit();
                initGlobalRate();
                $("#carouselExampleIndicators3, #carouselExampleIndicators3Mobile").on('slid.bs.carousel', function () {
                    slickInit();
                    initGlobalRate();
                });
            });
            $.post('{{ route('home.section.home_categories') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_home_categories').html(data);
                slickInit();
                initGlobalRate();
            });

            $.post('{{ route('home.section.best_sellers') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_best_sellers').html(data);
                slickInit();
                initGlobalRate();
            });
        });

        function lbs() {
            $.post('{{ url('home/section/best_sell') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_best_selling').html(data);
                $("#tbs").text("Best Seller");
                $("#bbs").addClass("active");
                $("#bpc").removeClass("active");
                slickInit();
                initGlobalRate();
                $("#carouselExampleIndicators, #carouselExampleIndicatorsMobile").on('slid.bs.carousel', function () {
                    slickInit();
                    initGlobalRate();
                });
            });
        }

        function lpc() {
            $.get("{{route('lpc')}}", function (data) {
                $('#section_best_selling').html(data);
                $("#tbs").text("Phoebe's Choice");
                $("#bpc").addClass("active");
                $("#bbs").removeClass("active");
                slickInit();
                initGlobalRate();
                $("#carouselExampleIndicators, #carouselExampleIndicatorsMobile").on('slid.bs.carousel', function () {
                    slickInit();
                    initGlobalRate();
                });
            })
        }

    </script>
    <script>
        @if(Auth::check() == false ) 
        $(window).on('load',function(){
            $('#modelId').modal('show');
        });
        @endif

        $(document).ready(function () {
            $.get('{{route("blog.section")}}', function (data) {
                $("#blog-section").html(data);
            })
        })
    </script>
@endsection
