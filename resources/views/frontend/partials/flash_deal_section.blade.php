@php
    $flash_deal = \App\FlashDeal::where('status', 1)->first();

    $userID = Auth::check() ? Auth::user()->id : 0;
@endphp
<div class="col-1 p-0 align-items-center justify-content-center product-slider">
    <a href="#carouselExampleIndicators3" role="button" data-slide="prev">
        <div class="carousel-nav-icon">
            <i class="fa fa-chevron-left" aria-hidden="true" style="font-size: 30px;"></i>
        </div>
    </a>
</div>
<div class="col-10 product-slider">
    <!--Start carousel-->
    <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
        @foreach ($products  as $key => $items)
            <div class="carousel-item {{ $key==0 ? 'active' : ''}}">
                <div class="row">
                    @foreach ($items as $key => $product)
                    @if($product!=null)
                    @php
                        $qty = 0;
                        
                        if(isset($flash_deal)){
                        $flash_product = \App\FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $product->id)->first();
                        $product_variant=json_decode($product->choice_options);
                        if($product->variant_product){
                            foreach ($product->stocks as $key => $stock) {
                                $qty += $stock->qty;
                            }
                        }
                        else{
                            $qty = $product->current_stock;
                        }
                        }
                        $wishlist_product = \App\Wishlist::where('user_id', $userID)->where('product_id', $product->id)->first();
                        $wishlist_check = isset($wishlist_product) ? 'fa-heart' : 'fa-heart-o';
                        $wishlist_func = isset($wishlist_product) ? 'removeFromWishlist('.$wishlist_product->id.');' : 'addToWishList('.$product->id.');';
                    @endphp
                    <div class="col-3 align-items-center justify-content-center">
                        <div class="content-product width-100" style="position: relative;">
                            <div class="dummy" style="padding-top: 126.66666666666%; background-color: white;"></div>
                            <a href="{{ route('product', $product->slug) }}" class="d-block product-image h-100" style="position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
                                <img class="img-fit lazyload m-auto ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" src="{{ asset('frontend/images/placeholder.jpg') }}" data-src="{{ asset($product->thumbnail_img) }}" alt="{{ __($product->name) }}" style="width: 100%; height: 100%; object-fit: contain;">
                            </a>
                            <i class="fa {{ $wishlist_check }}" aria-hidden="true" style="position: absolute; top: 0; right: 0; margin: 10px; color: #F3795C; font-size: 20px;" onclick="{{ $wishlist_func }}"></i>
                            @if(home_price($product->id) != home_discounted_price($product->id))
                                @if($flash_product->discount_type == 'percent')
                                    <p class="mb-0 py-2 px-4" style="position: absolute; top: 0; left: 0; margin-top: 20px; background-color: #F3795C; color: white;">{{ __($flash_product->discount) }}%</p>
                                @elseif($flash_product->discount_type == 'amount')
                                    <p class="mb-0 py-2 px-4" style="position: absolute; top: 0; left: 0; margin-top: 20px; background-color: #F3795C; color: white;">Potongan Rp {{ __($flash_product->discount) }}</p>
                                @endif
                            @else
                                <p class="d-none"></p>
                            @endif

                            @if ($qty == 0 AND $product->digital == 0)
                                <div class="content-out-of-stock">
                            @else
                                <div class="content-hover">
                            @endif

                            @if ($product->choice_options != null && count($product_variant) > 0)
                                <a href="#"><div class="content-hide addtobag"  onclick="showAddToBagModal({{ $product->id }})">
                                    <p>ADD TO BAG</p>
                                </div></a>
                            @elseif ($qty == 0 AND $product->digital == 0)
                                <a href="#"><div class="content-hide addtobag">
                                    <p>TERJUAL HABIS</p>
                                </div></a>
                            @else
                                <a href="#"><div class="content-hide addtobag"  onclick="addToBag({{ $product->id }})">
                                    <p>ADD TO BAG</p>
                                </div></a>
                            @endif

                            @if ($qty == 0 AND $product->digital == 0)

                            @else
                                <a href="#"><div class="content-hide quickview" onclick="showAddToCartModal({{ $product->id }})">
                                    <p>QUICK VIEW</p>
                                </div></a>
                            @endif
                            </div>
                        </div>
                        <div style="background-color: white; padding-top: 15px; border: 1px solid #F3795C; border-top: none;">
                            @if(isset($product->brand['name']))
                                <p class="title-name" style="font-weight: 700; font-size: 16px; margin-top: 15px; margin-bottom: 0;">
                                    {{ __($product->brand['name']) }}
                                </p>
                            @else
                                <p class="title-name" style="font-weight: 700; font-size: 16px; margin-top: 15px; margin-bottom: 0; visibility: hidden;">
                                    .
                                </p>
                            @endif
                            <p style="margin: 0;">{{ \Illuminate\Support\Str::limit($product->name, 25, $end='...') }}</p>
                            <p class="product-price strong-600" style="font-weight: 700; margin: 0; font-size: 15px;">
                                {{ home_discounted_price($product->id) }}
                            </p>
                            @if(home_price($product->id) != home_discounted_price($product->id))
                            <p style="margin: 0; color: #F3795C;">
                                <del class="old-product-price strong-400" style="color: #6C6D70;">{{ home_price($product->id) }}</del> 
                                @if($flash_product->discount_type == 'percent')
                                    ({{ __($flash_product->discount) }}%)
                                @elseif($flash_product->discount_type == 'amount')
                                    (- Rp. {{ __($flash_product->discount) }})
                                @endif
                            </p>
                            @else
                                <p style="margin: 0; visibility: hidden;">.</p>
                            @endif
                            @php
                                $total = 0;
                                $total += $product->reviews->count();
                            @endphp
                            <div class="row d-flex justify-content-center"> 
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <input type="hidden" class="rating rating-product" data-filled="fa fa-heart custom-heart" data-empty="fa fa-heart custom-heart-empty" value="{{$product->rating}}" disabled="disabled"/>
                                        </td>
                                        <td>({{ $total }})</td>
                                    </tr>        
                                    </tbody>
                                </table>
                            </div>
                            {{--@if ($qty == 0 AND $product->digital == 0)
                                <div class="progress mx-auto" style="background-color: #FCE6E0; height: 8px; width: 80%; margin-bottom: 0; visibility: hidden;">
                                    <div class="progress-bar" role="progressbar" style="width: 40%; background-color: #F3795C;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            @else
                                <div class="progress mx-auto" style="background-color: #FCE6E0; height: 8px; width: 80%; margin-bottom: 0;">
                                    <div class="progress-bar" role="progressbar" style="width: 40%; background-color: #F3795C;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            @endif
                            <!-- <p>Segera Habis</p> -->
                            <p>Tersisa 19</p>
                            <!-- <p>Masih Tersedia</p>
                            <p>Tersedia dalam harga normal</p> -->--}}
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        @endforeach

            
            
        </div>
    </div>
    <!--End carousel-->
</div>
<div class="col-1 p-0 align-items-center justify-content-center product-slider"><a  href="#carouselExampleIndicators3" data-slide="next">
    <div class="carousel-nav-icon">
        <i class="fa fa-chevron-right" aria-hidden="true" style="font-size: 30px;"></i>
    </div>
    </a>
</div>

<div class="col-1 p-0 align-items-center justify-content-center product-slider-mobile">
    <a href="#carouselExampleIndicators3Mobile" role="button" data-slide="prev">
        <div class="carousel-nav-icon">
            <i class="fa fa-chevron-left" aria-hidden="true" style="font-size: 30px;"></i>
        </div>
    </a>
</div>
<div class="col-10 product-slider-mobile">
    <!--Start carousel-->
    <div id="carouselExampleIndicators3Mobile" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
        @foreach ($products_mobile  as $key => $items)
            <div class="carousel-item {{ $key==0 ? 'active' : ''}}">
                <div class="row">
                    @foreach ($items as $key => $product)
                    @if($product!=null)
                    @php
                        $flash_product = \App\FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $product->id)->first();
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
                        $wishlist_product = \App\Wishlist::where('user_id', $userID)->where('product_id', $product->id)->first();
                        $wishlist_check = isset($wishlist_product) ? 'fa-heart' : 'fa-heart-o';
                        $wishlist_func = isset($wishlist_product) ? 'removeFromWishlist('.$wishlist_product->id.');' : 'addToWishList('.$product->id.');';
                    @endphp
                    <div class="col-6 align-items-center justify-content-center">
                        <div class="content-product width-100" style="position: relative;">
                            <div class="dummy" style="padding-top: 126.66666666666%; background-color: white;"></div>
                            <a href="{{ route('product', $product->slug) }}" class="d-block product-image h-100" style="position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
                                <img class="img-fit lazyload m-auto ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" src="{{ asset('frontend/images/placeholder.jpg') }}" data-src="{{ asset($product->thumbnail_img) }}" alt="{{ __($product->name) }}" style="width: 100%; height: 100%; object-fit: contain;">
                            </a>
                            <i class="fa {{ $wishlist_check }}" aria-hidden="true" style="position: absolute; top: 0; right: 0; margin: 10px; color: #F3795C; font-size: 20px;" onclick="{{ $wishlist_func }}"></i>
                            @if(home_price($product->id) != home_discounted_price($product->id))
                                @if($flash_product->discount_type == 'percent')
                                    <p class="mb-0 py-2 px-4" style="position: absolute; top: 0; left: 0; margin-top: 20px; background-color: #F3795C; color: white;">{{ __($flash_product->discount) }}%</p>
                                @elseif($flash_product->discount_type == 'amount')
                                    <p class="mb-0 py-2 px-4" style="position: absolute; top: 0; left: 0; margin-top: 20px; background-color: #F3795C; color: white;">- Rp {{ __($flash_product->discount) }}</p>
                                @endif
                            @else
                                <p class="d-none"></p>
                            @endif

                            @if ($qty == 0 AND $product->digital == 0)
                                <div class="content-out-of-stock">
                            @else
                                <div class="content-hover">
                            @endif

                            @if ($product->choice_options != null && count($product_variant) > 0)
                                <a href="#"><div class="content-hide addtobag"  onclick="showAddToBagModal({{ $product->id }})">
                                    <p>ADD TO BAG</p>
                                </div></a>
                            @elseif ($qty == 0 AND $product->digital == 0)
                                <a href="#"><div class="content-hide addtobag">
                                    <p>TERJUAL HABIS</p>
                                </div></a>
                            @else
                                <a href="#"><div class="content-hide addtobag"  onclick="addToBag({{ $product->id }})">
                                    <p>ADD TO BAG</p>
                                </div></a>
                            @endif

                            @if ($qty == 0 AND $product->digital == 0)

                            @else
                                <a href="#"><div class="content-hide quickview" onclick="showAddToCartModal({{ $product->id }})">
                                    <p>QUICK VIEW</p>
                                </div></a>
                            @endif
                            </div>
                        </div>
                        <div style="background-color: white; padding-top: 15px; border: 1px solid #F3795C; border-top: none;">
                            @if(isset($product->brand['name']))
                                <p class="title-name" style="font-weight: 700; font-size: 16px; margin-top: 15px; margin-bottom: 0;">
                                    {{ __($product->brand['name']) }}
                                </p>
                            @else
                                <p class="title-name" style="font-weight: 700; font-size: 16px; margin-top: 15px; margin-bottom: 0; visibility: hidden;">
                                    .
                                </p>
                            @endif
                            <p style="margin: 0;">{{ \Illuminate\Support\Str::limit($product->name, 25, $end='...') }}</p>
                            <p class="product-price strong-600" style="font-weight: 700; margin: 0; font-size: 15px;">
                                {{ home_discounted_price($product->id) }}
                            </p>
                            @if(home_price($product->id) != home_discounted_price($product->id))
                            <p style="margin: 0; color: #F3795C;">
                                <del class="old-product-price strong-400" style="color: #6C6D70;">{{ home_price($product->id) }}</del> 
                                @if($flash_product->discount_type == 'percent')
                                    ({{ __($flash_product->discount) }}%)
                                @elseif($flash_product->discount_type == 'amount')
                                    (- Rp. {{ __($flash_product->discount) }})
                                @endif
                            </p>
                            @else
                                <p style="margin: 0; visibility: hidden;">.</p>
                            @endif
                            @php
                                $total = 0;
                                $total += $product->reviews->count();
                            @endphp
                            <div class="row d-flex justify-content-center"> 
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>
                                            
                                            <input type="hidden" class="rating rating-product" data-filled="fa fa-heart custom-heart" data-empty="fa fa-heart custom-heart-empty" value="{{$product->rating}}" disabled="disabled"/>
                                        </td>
                                        <td>({{ $total }})</td>
                                    </tr>        
                                    </tbody>
                                </table>
                            </div>
                            {{--@if ($qty == 0 AND $product->digital == 0)
                                <div class="progress mx-auto" style="background-color: #FCE6E0; height: 8px; width: 80%; margin-bottom: 0; visibility: hidden;">
                                    <div class="progress-bar" role="progressbar" style="width: 40%; background-color: #F3795C;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            @else
                                <div class="progress mx-auto" style="background-color: #FCE6E0; height: 8px; width: 80%; margin-bottom: 0;">
                                    <div class="progress-bar" role="progressbar" style="width: 40%; background-color: #F3795C;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            @endif
                            <!-- <p>Segera Habis</p> -->
                            <p>Tersisa 19</p>
                            <!-- <p>Masih Tersedia</p>
                            <p>Tersedia dalam harga normal</p> -->--}}
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        @endforeach

            
            
        </div>
    </div>
    <!--End carousel-->
</div>
<div class="col-1 p-0 align-items-center justify-content-center product-slider-mobile"><a  href="#carouselExampleIndicators3Mobile" data-slide="next">
    <div class="carousel-nav-icon">
        <i class="fa fa-chevron-right" aria-hidden="true" style="font-size: 30px;"></i>
    </div>
    </a>
</div>

