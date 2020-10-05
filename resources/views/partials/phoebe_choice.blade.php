<div class="row mt-4" id="contentp">
    @foreach ($pc as $key => $productchoice)    
        @php
            $product = $productchoice->product;
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
                <a href="{{ route('product', ['slug' => $product->slug]) }}" class="d-block product-image h-100" style="position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
                    <img class="img-fit lazyload m-auto ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" src="{{ asset('frontend/images/placeholder.jpg') }}" data-src="{{ asset($product->thumbnail_img) }}" alt="{{ __($product->name) }}" style="width: 100%; height: 100%; object-fit: contain;">
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
                        <p>ADD TO BAG</p>
                    </div></a>
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
</div>
<div class="products-pagination p-3">
    <nav class="mt-5" aria-label="Page navigation example" style="float: right;">
        {{ $products->links() }}
    </nav>
    <p class="mb-0 mt-5 float-right" style="padding: 0.625rem 0.875rem; line-height: 1.25;">Showing <span id="showing">{{ $products->count() }}</span> of {{ $products->total() }}</p>
    <div class="mb-5" style="clear: right;"></div>
</div>