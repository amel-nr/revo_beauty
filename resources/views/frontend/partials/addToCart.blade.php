{{--<div class="modal-body p-4">
    <div class="row no-gutters cols-xs-space cols-sm-space cols-md-space">
        <div class="col-lg-6">
            <div class="product-gal sticky-top d-flex flex-row-reverse">
                @if(is_array(json_decode($product->photos)) && count(json_decode($product->photos)) > 0)
                    <div class="product-gal-img">
                        <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="xzoom img-fluid lazyload"
                             src="{{ asset('frontend/images/placeholder.jpg') }}"
                             data-src="{{ asset(json_decode($product->photos)[0]) }}"
                             xoriginal="{{ asset(json_decode($product->photos)[0]) }}"/>
                    </div>
                    <div class="product-gal-thumb">
                        <div class="xzoom-thumbs">
                            @foreach (json_decode($product->photos) as $key => $photo)
                                <a href="{{ asset($photo) }}">
                                    <img src="{{ asset('frontend/images/placeholder.jpg') }}"
                                         class="xzoom-gallery lazyload"
                                         src="{{ asset('frontend/images/placeholder.jpg') }}" width="80"
                                         data-src="{{ asset($photo) }}"
                                         @if($key == 0) xpreview="{{ asset($photo) }}" @endif>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="col-lg-6">
            <!-- Product description -->
            <div class="product-description-wrapper">
                <!-- Product title -->
                <h2 class="product-title">
                    {{ __($product->name) }}
                </h2>

                @if(home_price($product->id) != home_discounted_price($product->id))

                    <div class="row no-gutters mt-4">
                        <div class="col-2">
                            <div class="product-description-label">{{__('Price')}}:</div>
                        </div>
                        <div class="col-10">
                            <div class="product-price-old">
                                <del>
                                    {{ home_price($product->id) }}
                                    <span>/{{ $product->unit }}</span>
                                </del>
                            </div>
                        </div>
                    </div>

                    <div class="row no-gutters mt-3">
                        <div class="col-2">
                            <div class="product-description-label mt-1">{{__('Discount Price')}}:</div>
                        </div>
                        <div class="col-10">
                            <div class="product-price">
                                <strong>
                                    {{ home_discounted_price($product->id) }}
                                </strong>
                                <span class="piece">/{{ $product->unit }}</span>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row no-gutters mt-3">
                        <div class="col-2">
                            <div class="product-description-label">{{__('Price')}}:</div>
                        </div>
                        <div class="col-10">
                            <div class="product-price">
                                <strong>
                                    {{ home_discounted_price($product->id) }}
                                </strong>
                                <span class="piece">/{{ $product->unit }}</span>
                            </div>
                        </div>
                    </div>
                @endif

                @if (\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated && $product->earn_point > 0)
                    <div class="row no-gutters mt-4">
                        <div class="col-2">
                            <div class="product-description-label">{{ __('Club Point') }}:</div>
                        </div>
                        <div class="col-10">
                            <div class="d-inline-block club-point bg-soft-base-1 border-light-base-1 border">
                                <span class="strong-700">{{ $product->earn_point }}</span>
                            </div>
                        </div>
                    </div>
                @endif

                <hr>

                @php
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

                <form id="option-choice-form">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">

                    <!-- Quantity + Add to cart -->
                    @if($product->digital !=1)
                        @if ($product->choice_options != null)
                            @foreach (json_decode($product->choice_options) as $key => $choice)

                                <div class="row no-gutters">
                                    <div class="col-2">
                                        <div
                                            class="product-description-label mt-2 ">{{ \App\Attribute::find($choice->attribute_id)->name }}
                                            :
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <ul class="list-inline checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-2">
                                            @foreach ($choice->values as $key => $value)
                                                <li>
                                                    <input type="radio" id="{{ $choice->attribute_id }}-{{ $value }}"
                                                           name="attribute_id_{{ $choice->attribute_id }}"
                                                           value="{{ $value }}" @if($key == 0) checked @endif>
                                                    <label
                                                        for="{{ $choice->attribute_id }}-{{ $value }}">{{ $value }}</label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                            @endforeach
                        @endif

                        @if (count(json_decode($product->colors)) > 0)
                            <div class="row no-gutters">
                                <div class="col-2">
                                    <div class="product-description-label mt-2">{{__('Color')}}:</div>
                                </div>
                                <div class="col-10">
                                    <ul class="list-inline checkbox-color mb-1">
                                        @foreach (json_decode($product->colors) as $key => $color)
                                            <li>
                                                <input type="radio" id="{{ $product->id }}-color-{{ $key }}"
                                                       name="color" value="{{ $color }}" @if($key == 0) checked @endif>
                                                <label style="background: {{ $color }};"
                                                       for="{{ $product->id }}-color-{{ $key }}"
                                                       data-toggle="tooltip"></label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <hr>
                        @endif

                        <div class="row no-gutters">
                            <div class="col-2">
                                <div class="product-description-label mt-2">{{__('Quantity')}}:</div>
                            </div>
                            <div class="col-10">
                                <div class="product-quantity d-flex align-items-center">
                                    <div class="input-group input-group--style-2 pr-3" style="width: 160px;">
                                        <span class="input-group-btn">
                                            <button class="btn btn-number" type="button" data-type="minus"
                                                    data-field="quantity" disabled="disabled">
                                                <i class="la la-minus"></i>
                                            </button>
                                        </span>
                                        <input type="text" name="quantity" class="form-control input-number text-center"
                                               placeholder="1" value="1" min="1" max="10">
                                        <span class="input-group-btn">
                                            <button class="btn btn-number" type="button" data-type="plus"
                                                    data-field="quantity">
                                                <i class="la la-plus"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <div class="avialable-amount">(<span
                                            id="available-quantity">{{ $qty }}</span> {{__('available')}})
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                    @endif

                    <div class="row no-gutters pb-3 d-none" id="chosen_price_div">
                        <div class="col-2">
                            <div class="product-description-label">{{__('Total Price')}}:</div>
                        </div>
                        <div class="col-10">
                            <div class="product-price">
                                <strong id="chosen_price">

                                </strong>
                            </div>
                        </div>
                    </div>

                </form>

                <div class="d-table width-100 mt-3">
                    <div class="d-table-cell">
                        <!-- Add to cart button -->
                        @if ($product->digital == 1)
                            <button type="button"
                                    class="btn btn-styled btn-alt-base-1 c-white btn-icon-left strong-700 hov-bounce hov-shaddow ml-2 add-to-cart"
                                    onclick="addToCart({{ $product->id }})">
                                <i class="la la-shopping-cart"></i>
                                <span class="d-none d-md-inline-block"> {{__('Add to cart')}}</span>
                            </button>
                        @elseif($qty > 0)
                            <button type="button"
                                    class="btn btn-styled btn-alt-base-1 c-white btn-icon-left strong-700 hov-bounce hov-shaddow ml-2 add-to-cart"
                                    onclick="addToCart({{ $product->id }})">
                                <i class="la la-shopping-cart"></i>
                                <span class="d-none d-md-inline-block"> {{__('Add to cart')}}</span>
                            </button>
                        @else
                            <button type="button" class="btn btn-styled btn-base-3 btn-icon-left strong-700" disabled>
                                <i class="la la-cart-arrow-down"></i> {{__('Out of Stock')}}
                            </button>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>--}}
@php
    $flash_product = \App\FlashDealProduct::where('product_id', $product->id)->first();
@endphp
<div class="modal-body p-5" style="background-color: #FCF8F0;">
    <div class="row">
        <div class="col-md-5 col-12 pl-3 pr-5">
            @if(is_array(json_decode($product->photos)) && count(json_decode($product->photos)) > 0)
            <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="xzoom img-fluid lazyload img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                             src="{{ asset('frontend/images/placeholder.jpg') }}"
                             data-src="{{ asset(json_decode($product->photos)[0]) }}"
                             xoriginal="{{ asset(json_decode($product->photos)[0]) }}"/>

            <div class="row py-3 xzoom-thumbs" style="margin: 0 -10px;">
                 @foreach (json_decode($product->photos) as $key => $photo)
                    <a href="{{ asset($photo) }}" class="col-4" style="padding: 0 10px;">
                        <img src="{{ asset('frontend/images/placeholder.jpg') }}"
                             class="xzoom-gallery lazyload img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                             src="{{ asset('frontend/images/placeholder.jpg') }}" width="80"
                             data-src="{{ asset($photo) }}"
                             @if($key == 0) xpreview="{{ asset($photo) }}" @endif>
                    </a>
                @endforeach
            </div>
             @endif
        </div>
        @php
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
       

        <div class="col-md-7 col-12">
            @if( isset( $product->brand->name))
            <h1 class="font-weight-bold h5 mb-0">{{ $product->brand->name }}</h1>
            @endif
            <p class="mb-0" style="font-size: 14px;">{{ $product->name }}</p>
            @php
                $total = 0;
                $total += $product->reviews->count();
            @endphp
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
            @if( isset($product->nomer_bpom))
                <p class="border border-dark rounded font-weight-bold text-center py-1 px-2 d-inline">BPOM {{ $product->nomer_bpom }}</p>
            @endif
            <p class="my-3" style="font-size: 16px;">
            @if(home_price($product->id) != home_discounted_price($product->id))
                <s>{{ home_price($product->id) }}</s>
            @endif
                <span class="font-weight-bold ml-1 harg" style="font-size: 20px; color: #F3795C;">{{ $product->sm ? $product->sm : home_discounted_price($product->id) }}</span>
                @if(!$product->sm)
                @if(home_price($product->id) != home_discounted_price($product->id))
                    @if($flash_product)
                        @if($flash_product->discount_type == 'percent')
                            <span class="badge badge-primary ml-2 px-2" style="font-size: 65%; background-color: #F3795C;">{{ __($flash_product->discount) }}%</span>
                        @elseif($flash_product->discount_type == 'amount')
                            <span class="badge badge-primary ml-2 px-2" style="font-size: 65%; background-color: #F3795C;">Potongan Rp {{ __($flash_product->discount) }}</span>
                        @endif
                    @else
                        @if($product->discount_type == 'percent')
                            <span class="badge badge-primary ml-2 px-2" style="font-size: 65%; background-color: #F3795C;">{{ __($product->discount) }}%</span>
                        @elseif($product->discount_type == 'amount')
                            <span class="badge badge-primary ml-2 px-2" style="font-size: 65%; background-color: #F3795C;">Potongan Rp {{ __($product->discount) }}</span>
                        @endif
                    @endif
                @endif
            @endif
            </p>
             <form id="option-choice-form">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
            @if($product->digital !=1)
                @if ($product->choice_options != null)
                    @foreach (json_decode($product->choice_options) as $key => $choice)
                        <div class="row">
                            <div class="col-2">
                                <p style="font-weight: 600;">{{ \App\Attribute::find($choice->attribute_id)->name }}:</p>
                            </div>

                            <div class="col-10">
                                <ul class="list-inline checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-2">
                                    @foreach ($choice->values as $key => $value)
                                        <li>
                                            <input type="radio" id="{{ $choice->attribute_id }}-{{ $value }}"
                                                   name="attribute_id_{{ $choice->attribute_id }}"
                                                   value="{{ $value }}" @if($key == 0) checked @endif>
                                            <label
                                                for="{{ $choice->attribute_id }}-{{ $value }}">{{ $value }}</label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                @endif

                @if (count(json_decode($product->colors)) > 0)
                    <div class="row no-gutters">
                        <div class="col-2">
                            <div class="product-description-label mt-2">{{__('Color')}}:</div>
                        </div>
                        <div class="col-10">
                            <ul class="list-inline checkbox-color mb-1">
                                @foreach (json_decode($product->colors) as $key => $color)
                                    <li>
                                        <input type="radio" id="{{ $product->id }}-color-{{ $key }}"
                                               name="color" value="{{ $color }}" @if($key == 0) checked @endif>
                                        <label style="background: {{ $color }};"
                                               for="{{ $product->id }}-color-{{ $key }}"
                                               data-toggle="tooltip"></label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <hr>
                @endif

                <div class="row no-gutters">
                    <div class="col-2">
                        <div class="product-description-label mt-2"  style="font-weight: 600;">{{__('Jumlah')}}:</div>
                    </div>
                    <div class="col-10">
                        <div class="product-quantity d-flex align-items-center">
                            <div class="input-group input-group--style-2 pr-3" style="width: 160px;">
                                <span class="input-group-btn">
                                    <button class="btn btn-number" type="button" data-type="minus"
                                            data-field="quantity" disabled="disabled">
                                        <i class="la la-minus"></i>
                                    </button>
                                </span>
                                <input type="text" name="quantity" class="form-control input-number text-center"
                                       placeholder="1" value="1" min="1" max="10">
                                <span class="input-group-btn">
                                    <button class="btn btn-number" type="button" data-type="plus"
                                            data-field="quantity">
                                        <i class="la la-plus"></i>
                                    </button>
                                </span>
                            </div>
                            <div class="avialable-amount">(<span
                                    id="available-quantity">{{ $qty }}</span> {{__('tersedia')}})
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
            @endif
            <div class="py-3">
               
                @if ($product->digital == 1)
                    <button type="button" class="btn btn-danger text-center btn-mskkeranjang" onclick="addToCart({{ $product->id }})">MASUKKAN KERANJANG</button>
                @elseif($qty > 0)
                    <button type="button" class="btn btn-danger text-center btn-mskkeranjang" onclick="buyNow()">MASUKKAN KERANJANG</button>
                @else
                    <button type="button" class="btn btn-danger text-center btn-mskkeranjang" disabled>STOCK BARANG HABIS</button>
                    

                @endif
                <div class="rounded-circle text-center ml-2 d-inline" style="font-size: 120%; background-color: #FAE0D4; color: #F3795C; padding: 3px 7px; cursor: pointer;"><i class="fa fa-heart-o" aria-hidden="true" onclick="addToWishList({{ $product->id }});"></i></div>
            </div>
            </form>
            @if ($qty == 0 AND $product->digital == 0)
            <div class="py-2">
                <p class="mb-0">Beritahu saya jika barang sudah tersedia kembali</p>
            </div>
            <div class="pb-3">
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <input type="email"
                                class="form-control rounded" name="email" id="register-email" aria-describedby="helpId" placeholder="Masukkan alamat email" style="padding: 10px; border-color: #F3795C; font-size: 12px;" required>
                        </div>
                    </div>
                    <div class="col-4 pl-0">
                        <button type="button" class="btn btn-danger text-center btn-mskkeranjang" style="padding: 10px; font-size: 12px;">BERITAHU SAYA</button>
                    </div>
                </div>
            </div>
            @endif
            <a href="{{ route('product', $product->slug) }}" style="color: #F3795C; font-weight: 600;">SELENGKAPNYA</a>
        </div>
    </div>
</div>


<script type="text/javascript">
    cartQuantityInitialize();
    initGlobalRate();
    $('#option-choice-form input').on('change', function () {
        getVariantPrice();
    });
</script>
