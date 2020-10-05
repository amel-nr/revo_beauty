@php
    $flash_product = \App\FlashDealProduct::where('product_id', $product->id)->first();
@endphp
<div class="modal-body p-5" style="background-color: #FCF8F0;">
    <div class="row">
        <div class="col-md-4 col-10 pl-3 pr-1">
            <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="xzoom img-fluid lazyload img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                             src="{{ asset('frontend/images/placeholder.jpg') }}"
                             data-src="{{ asset($product->thumbnail_img) }}" alt="{{ __($product->name) }}"
                             xoriginal="{{ asset(json_decode($product->photos)[0]) }}"/>
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
       

        <div class="col-md-8 col-12 content-add-to-bag">
            @if( isset( $product->brand->name))
            <h1 class="font-weight-bold h5 mb-0">{{ $product->brand->name }}</h1>
            @endif
            <p class="mb-0" style="font-size: 14px;">{{ $product->name }}</p>
            <p class="my-3" style="font-size: 16px;">
            @if(home_price($product->id) != home_discounted_price($product->id))
                <s>{{ home_price($product->id) }}</s>
            @endif
                <span class="font-weight-bold ml-1" style="font-size: 20px; color: #F3795C;">{{ home_discounted_price($product->id) }}</span>
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
            </p>
             <form id="option-choice-form">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
            @if($product->digital !=1)
                @if ($product->choice_options != null)
                    @foreach (json_decode($product->choice_options) as $key => $choice)
                        <div class="row">
                            <div class="col-3">
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
                        <div class="col-3">
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

                <div class="row no-gutters" style="display: none;">
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

            @endif
            <div class="pb-2">
               
                @if ($product->digital == 1)
                    <button type="button" class="btn btn-danger text-center btn-mskkeranjang" onclick="addToBag({{ $product->id }})">MASUKKAN KERANJANG</button>
                @elseif($qty > 0)
                    <button type="button" class="btn btn-danger text-center btn-mskkeranjang" onclick="addToBag({{ $product->id }})">MASUKKAN KERANJANG</button>
                @else
                    <button type="button" class="btn btn-danger text-center btn-mskkeranjang" disabled>STOCK BARANG HABIS</button>
                    

                @endif
            </div>
            </form>
            @if ($qty == 0 AND $product->digital == 0)
            <div class="py-2">
                <p class="mb-0">Beritahu saya jika barang sudah</p>
                <p class="mb-0">tersedia kembali</p>
            </div>
            <div>
                <div class="form-group">
                    <input type="email"
                        class="form-control rounded" name="email" id="register-email" aria-describedby="helpId" placeholder="Masukkan alamat email" style="padding: 10px; border-color: #F3795C; font-size: 12px;" required>
                </div>
                <button type="button" class="btn btn-danger text-center btn-mskkeranjang" style="padding: 10px; font-size: 12px;">BERITAHU SAYA</button>
            </div>
            @endif
        </div>
    </div>
</div>

<script type="text/javascript">
    cartQuantityInitialize();
    $('#option-choice-form input').on('change', function () {
        getVariantPrice();
    });
</script>
