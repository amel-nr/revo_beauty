@extends('frontend.layouts.app')

@section('content')

    @if($flash_deal->status == 1 && strtotime(date('d-m-Y')) <= $flash_deal->end_date)
    <div style="background-color: #FCF8F0;">
        <section style="background-color: #F9CAC1;">
            <div class="row py-4">
                <div class="col-md-5 col-8 mx-auto">
                    <div class="row">
                        <div class="col-md-7 col-12 text-center">
                            <img src="{{ asset('frontend\images\flash-sale.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                        </div>
                        <div class="col-md-5 col-12 text-center my-auto">
                            <div class="flash-deal-box">
                                <div class="countdown countdown--style-1 countdown--style-1-v1 " data-countdown-date="{{ date('m/d/Y H:i', $flash_deal->end_date) }}" data-countdown-label="show"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="text-center pt-4">
            <div class="container">
                <img src="{{ asset($flash_deal->banner) }}" alt="{{ $flash_deal->title }}" class="img-fit w-100">
            </div>
        </section>
        <section class="pb-4">
            <div class="container">
                {{--<div class="text-center my-4" style="color: #F3795C;">
                    <h1 class="h3 font-weight-bold">{{ $flash_deal->title }}</h1>
                </div>--}}
                <div class="row mt-5 text-center">
                    @foreach ($products as $key => $product)
                        @php
                            // $product = \App\Product::find($flash_deal_product->product_id);
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
                        @endphp
                        <div class="col-md-3 col-6 align-items-center justify-content-center">
                            <div class="content-product width-100" style="position: relative;">
                                <div class="dummy" style="padding-top: 126.66666666666%; background-color: white;"></div>
                                <a href="{{ route('product', $product->slug) }}" class="d-block product-image h-100" style="position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
                                    <img class="img-fit lazyload m-auto ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" src="{{ asset('frontend/images/placeholder.jpg') }}" data-src="{{ asset($product->thumbnail_img) }}" alt="{{ __($product->name) }}" style="width: 100%; height: 100%; object-fit: contain;">
                                </a>
                                <i class="fa fa-heart-o" aria-hidden="true" style="position: absolute; top: 0; right: 0; margin: 10px; color: #F3795C; font-size: 20px;" onclick="addToWishList({{ $product->id }});"></i>
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
                            <div style="padding-top: 15px;">
                                @if(isset($product->brand['name']))
                                    <p style="font-weight: 700; font-size: 16px; margin-top: 15px; margin-bottom: 0;">
                                        {{ __($product->brand['name']) }}
                                    </p>
                                @else
                                    <p style="font-weight: 700; font-size: 16px; margin-top: 15px; margin-bottom: 0; visibility: hidden;">
                                        .
                                    </p>
                                @endif
                                <p style="margin: 0;">{{ \Illuminate\Support\Str::limit($product->name, 30, $end='...') }}</p>
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
                                <p> {{ renderStarRating($product->rating) }}({{ $total }})</p>
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
                    @endforeach
                </div>
                <nav class="mt-5" aria-label="Page navigation example" style="float: right;">
                {{ $products->links() }}
                    <!-- <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&lt;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&gt;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul> -->
                </nav>
                <p class="mb-0 mt-5 float-right" style="padding: 0.625rem 0.875rem; line-height: 1.25;">Showing {{ $products->count() }} of {{ $products->total() }}</p>
                <div class="mb-5" style="clear: right;"></div>
            </div>
        </section>
    </div>
    @else
        <div style="background-color:{{ $flash_deal->background_color }}">
            <section class="text-center pt-3">
                <div class="container ">
                    <img src="{{ asset($flash_deal->banner) }}" alt="{{ $flash_deal->title }}" class="img-fit">
                </div>
            </section>
            <section class="pb-4">
                <div class="container">
                    <div class="text-center text-{{ $flash_deal->text_color }}">
                        <h1 class="h3 my-4">{{ $flash_deal->title }}</h1>
                        <p class="h4">{{ __('This offer has been expired.') }}</p>
                    </div>
                </div>
            </section>
        </div>
    @endif
@endsection
