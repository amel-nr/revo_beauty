@extends('frontend.layouts.app')

@section('content')

@include('frontend.inc.blog_header')
<div class="row mb-3"><a href="#" class="center-block" id="back" style="margin:auto;display:none"><i class="fa fa-backward"></i></a></div>
<div id="data" class="row pt-5 mx-0">
</div>

<div id="dblog">
        <div>
            <h1 class="text-center pt-5 font-weight-bold blog-title-mobile">{{$blog->title}}<h1>
        </div>
        <!-- <div class="row pt-3">
            <div class="col-10 mx-auto">
                <img class="d-block w-100 lazyload" src="{{ asset('frontend/images/placeholder-rect.jpg') }}" alt="">
            </div>
        </div> -->
        <div class="row">
            <img src="{{asset('/blog/thumbnail/'.$blog->thumbnail)}}" style="margin-top:50px;margin-left: auto;margin-right: auto;width: 70%;" alt="">
            <div class="col-10 mx-auto pt-3" style="font-weight: 600;">
                <p style="font-size: 14px; text-align: justify;">{!! $blog->content !!}</p>
            </div>
        </div>
        <!-- <div class="row pt-3">
            <div class="col-10 mx-auto">
                <img class="d-block w-100 lazyload" src="{{ asset('frontend/images/placeholder-rect.jpg') }}" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-10 mx-auto pt-3" style="font-weight: 600;">
                <p style="font-size: 14px; text-align: justify;">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                    enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum."</p>
                <p style="font-size: 14px; text-align: justify;">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                    enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum."</p>
            </div>
        </div> -->
        <div class="container">
            <div class="row pt-3">
                <div class="col-10 mx-auto">
                    {{--<div class="row">
                        @php
                            $idproduct = json_decode($blog->product_recommend);
                        @endphp
                        @if($idproduct != 0)
                            <p>Produk Rekomendasi :</p>
                        @endif
                    </div>--}}
                   {{--<div class="row">
                        @if($idproduct != null)
                        
                        @foreach($idproduct as $key => $id)
                        @php 
                            $product = App\Product::where('id',$id)->first();
                            $flash_product = \App\FlashDealProduct::where('product_id', $product->id)->first();
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

                            

                            <div class="col-3 align-items-center justify-content-center text-center card-product">
                                <div class="content-product width-100" style="position: relative;">
                                    <div class="dummy" style="padding-top: 126.66666666666%; background-color: white;"></div>
                                    <a href="{{route('product',['slug'=>$product->slug])}}" class="d-block product-image h-100" style="position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
                                        <img class="img-fit lazyload m-auto ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" src="{{ asset('frontend/images/placeholder.jpg') }}" data-src="{{asset($product->thumbnail_img)}}" alt="{{ __($product->name) }}" style="width: 100%; height: 100%; object-fit: contain;">
                                    </a>
                                    <i class="fa fa-heart-o" aria-hidden="true" style="position: absolute; top: 0; right: 0; margin: 10px; color: #F3795C; font-size: 20px;" onclick="addToWishList({{ $product->id }});"></i>
                                    @if(home_price($product->id) != home_discounted_price($product->id))
                                        @if($flash_product)
                                            @if($flash_product->discount_type == 'percent')
                                                <p class="mb-0 py-2 px-4" style="position: absolute; top: 0; left: 0; margin-top: 20px; background-color: #F3795C; color: white;">{{ __($flash_product->discount) }}%</p>
                                            @elseif($flash_product->discount_type == 'amount')
                                                <p class="mb-0 py-2 px-4" style="position: absolute; top: 0; left: 0; margin-top: 20px; background-color: #F3795C; color: white;">Potongan Rp {{ __($flash_product->discount) }}</p>
                                            @endif
                                        @else
                                            @if($product->discount_type == 'percent')
                                                <p class="mb-0 py-2 px-4" style="position: absolute; top: 0; left: 0; margin-top: 20px; background-color: #F3795C; color: white;">{{ __($product->discount) }}%</p>
                                            @elseif($product->discount_type == 'amount')
                                                <p class="mb-0 py-2 px-4" style="position: absolute; top: 0; left: 0; margin-top: 20px; background-color: #F3795C; color: white;">Potongan Rp {{ __($product->discount) }}</p>
                                            @endif
                                        @endif
                                    @else
                                        <p class="d-none"></p>
                                    @endif
                                <div class="content-hover">
                                    @if ($product->choice_options != null && count($product_variant) > 0)
                                        <a href="#"><div class="content-hide addtobag"  onclick="showAddToBagModal({{ $product->id }})">
                                            <p>ADD TO BAG</p>
                                        </div></a>
                                    @elseif ($qty == 0 AND $product->digital == 0)
                                        <a href="#"><div class="content-hide addtobag"  onclick="showAddToBagModal({{ $product->id }})">
                                            <p>ADD TO BAG</p>
                                        </div></a>

                                    @else
                                    <a href="#"><div class="content-hide addtobag"  onclick="addToBag({{ $product->id }})">
                                    <form id="option-choice-form">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="id" value="{{$product->id}}">
                                            <p>ADD TO BAG</p>
                                        </div>
                                    </form>
                                    </a>
                                    @endif
                                        <a href="#"><div class="content-hide quickview" onclick="showAddToCartModal({{ $product->id }})">
                                            <p>QUICK VIEW</p>
                                        </div></a>
                                </div>
                                </div>
                                @if(isset($product->brand['name']))
                                    <p style="font-weight: 700; font-size: 16px; margin-top: 15px; margin-bottom: 0;">
                                        {{ __($product->brand['name']) }}
                                    </p>
                                @else
                                    <p style="font-weight: 700; font-size: 16px; margin-top: 15px; margin-bottom: 0; visibility: hidden;">
                                        .
                                    </p>
                                @endif
                                <p style="margin: 0;">{{ __($product->name) }}</p>
                                <span class="product-category" style="margin: 0;">{{ __($product->subsubcategory['name']) }}</span>
                                <p style="font-weight: 700; margin: 0;">
                                    @if(home_price($product->id) != home_discounted_price($product->id))
                                        <del class="old-product-price strong-400">
                                            {{ home_price($product->id) }}
                                        </del><br>
                                    @endif
                                    <span class="product-price strong-600">
                                            {{ home_discounted_price($product->id) }}
                                    </span>
                                </p>
                                @php
                                    $total = 0;
                                    $total += $product->reviews->count();
                                @endphp
                                <p>{{ renderStarRating($product->rating) }}({{ $total }})</p>
                            </div> 
                        @endforeach
                        @endif

                            <!-- <div class="col-3">
                                <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                            </div>
                            <div class="col-3">
                                <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                            </div>
                            <div class="col-3">
                                <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                            </div> -->
                    </div>--}}
                </div>
            </div>
        </div>
</div>
@include('frontend.inc.blog_footer')
            
@endsection

@section('script')

    <script>
        $(document).ready(function(){
            $(".blog-filter").click(function(){
                $(".text-blog-filter").css("color", "black");
                $(this).find('p').css("color", "#f3795c");
                $(".blog-filter").css("border-bottom", "none");
                $(this).css("border-bottom", "3px solid #f3795c");
            });
        });
    </script>

@endsection