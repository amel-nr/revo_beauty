    @if(Session::has('cart') && count(Session::get('cart')) > 0)
    <h1 class="h5 font-weight-bold">KERANJANG BELANJA</h1>
    <div class="row">
        <div class="col-md-8 col-12">
            <div class="row text-center rounded m-0" style="border: 1px solid #F3795C;">
                <div class="col-6 py-2 sample-area" style="border-right: 1px solid #F3795C;">
                    <p class="m-0 font-weight-bold" style="font-size: 11px;">Dapatkan 2 sampel gratis disetiap pembelian</p>
                    <p class="m-0 font-weight-bold sample-btn sample-area" style="cursor: pointer;">PILIH SAMPEL YANG KAMU INGINKAN <i class="fa fa-chevron-down sample-arrow" aria-hidden="true" style="color: #F3795C; font-size: 14px;"></i></p>
                </div>
                <div class="col-6 py-2 tukarpoin-area">
                    @if (Auth::check() && (Auth::user()->user_type == 'customer' || Auth::user()->user_type == 'seller'))
                    @php
                    $point = Auth::user()->point;
                    if(Session::has('productPoint'))
                    {
                        foreach (Session::get('productPoint') as $key => $value)
                        {
                            if (isset($jml_point)) {
                                $point -= $value->jml_point;
                            }
                            
                        }
                    }
                    @endphp
                    <p class="m-0 font-weight-bold" style="font-size: 11px;">kamu memiliki <u>{{ $point ? $point : 0 }} POIN</u></p>
                    <p class="m-0 font-weight-bold tukarpoin-btn tukarpoin-area" style="font-size: 11px; cursor: pointer;">TUKAR POIN MU  <i class="fa fa-chevron-down tukarpoin-arrow" aria-hidden="true" style="color: #F3795C; font-size: 14px;"></i></p>
                    @else
               
                    <p class="m-0 font-weight-bold" style="font-size: 11px;"><a class="tukarpoin-link" href="#modalLogin" data-target="#modalLogin" data-toggle="modal" style="color: black;"><u>Masuk</u></a> untuk melihat poin kamu</p>
                    <p class="m-0 font-weight-bold tukarpoin-btn tukarpoin-area" style="font-size: 11px; cursor: pointer;">dan tukarkan dengan hadiah menarik <i class="fa fa-chevron-down tukarpoin-arrow" aria-hidden="true" style="color: #F3795C; font-size: 14px;"></i></p>
                    @endif
                </div>
            </div>
            <div class="container p-4 sample-container" style="border: 1px solid #F3795C; display: none">
                 @include('frontend.partials.sample_product')
            </div>
            <div class="container py-4 tukarpoin-container" style="border: 1px solid #F3795C; display: none">
                <div class="row">
                    <div class="col-4 text-center">
                        <p style="font-weight: 700; margin: 0;"><a href="#" onclick="showPointType(1);"style="color: #F3795C;"><u>100 POIN</u></a></p>
                    </div>
                    <div class="col-4 text-center">
                        <p style="font-weight: 700; margin: 0;"><a href="#" onclick="showPointType(2);" style="color: black;">200-500 POIN</a></p>
                    </div>
                    <div class="col-4 text-center">
                        <p style="font-weight: 700; margin: 0;"><a href="#" onclick="showPointType(3);" style="color: black;">500+ POIN</a></p>
                    </div>
                </div>
                 @include('frontend.partials.product_point')

            </div>
            <div class="rounded my-4" style="border: 1px solid #F3795C;">
                <div class="container" style="background-color: #F3795C;">
                    <h2 class="py-2 m-0 font-weight-bold" style="color: white; font-size: 14px;">BARANG DI KERANJANG BELANJA</h2>
                </div>
                @php
                $total = 0;
                @endphp
                @foreach (Session::get('cart') as $key => $cartItem)
                @php
                $product = \App\Product::where('id',$cartItem['id'])->with('brand')->first();
                $total = $total + $cartItem['price']*$cartItem['quantity'];
                $product_name_with_choice = $product->name;
                if ($cartItem['variant'] != null) {
                    $product_name_with_choice = $product->name.' - '.$cartItem['variant'];
                }
                // if(isset($cartItem['color'])){
                //     $product_name_with_choice .= ' - '.\App\Color::where('code', $cartItem['color'])->first()->name;
                // }
                // foreach (json_decode($product->choice_options) as $choice){
                //     $str = $choice->name; // example $str =  choice_0
                //     $product_name_with_choice .= ' - '.$cartItem[$str];
                // }
                @endphp
                <div class="container pt-3 px-4">
                    <div class="row" style="border-bottom: 1px solid #F3795C;">
                        <div class="col-md-2 col-6 pb-3">
                            <img src="{{ asset($product->thumbnail_img) }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                        </div>
                        <div class="col-md-10 col-6">
                            <div class="row">
                                <div class="col-md-5 col-12">
                                    @if (isset($product->brand->name))
                                        <p class="font-weight-bold mb-0" style="font-size: 16px;">{{ $product->brand->name }}</p>
                                    @endif
                                    <p class="mb-0">{{ $product_name_with_choice }}</p>
                                    <p class="mb-2">The best result for acne skin</p>
                                    <p>Ukuran : {{ $product->satuan_ukuran }}</p>
                                </div>
                                <div class="col-md-2 col-12 p-0 cart-product-price">
                                    @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                        <p class="mb-0" style="font-size: 14px;">
                                            <s>{{ home_base_price($product->id) }}</s><span style="color: #F3795C;"> ({{ $product->discount }}%)</span>
                                        </p>
                                    @endif
                                    <p class="font-weight-bold" style="color: #F3795C; font-size: 14px;">{{ single_price($cartItem['price']) }}</p>
                                </div>
                                <div class="col-md-2 col-12 p-0 cart-product-price">
                                    @if($cartItem['digital'] != 1)
                                        <div class="input-group input-group--style-2 pr-4" style="width: 135px;">
                                            <span class="input-group-btn">
                                                <button class="btn btn-number" type="button" data-type="minus" data-field="quantity[{{ $key }}]">
                                                    <i class="la la-minus"></i>
                                                </button>
                                            </span>
                                                <input type="text" name="quantity[{{ $key }}]" class="form-control input-number" placeholder="1" value="{{ $cartItem['quantity'] }}" min="1" max="10" onchange="updateQuantity({{ $key }}, this)">
                                                <span class="input-group-btn">
                                                <button class="btn btn-number" type="button" data-type="plus" data-field="quantity[{{ $key }}]">
                                                    <i class="la la-plus"></i>
                                                </button>
                                            </span>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-3 col-12 cart-product-total">
                                    <p class="font-weight-bold text-right" style="font-size: 18px;">
                                    {{ single_price(($cartItem['price']+$cartItem['tax'])*$cartItem['quantity']) }}
                                    </p>
                                </div>
                            </div>
                            <div class="text-right pb-3">
                                <a href="#" onclick="removeFromCartView(event, {{ $key }});" type="button"><i class="fa fa-trash-o" aria-hidden="true" style="font-size: 26px; color: #F3795C;"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                @if (Session::has('productPoint') && count(Session::get('productPoint')) > 0)
                @foreach (Session::get('productPoint') as $key => $value)
                @if ($value != null) {
                @php
                $product = \App\Product::where('id',$value->product_id)->with('brand')->first();
                @endphp
                <div class="container pt-3 px-4">
                    <div class="row" style="border-bottom: 1px solid #F3795C;">
                        <div class="col-md-2 col-6">
                            <img src="{{ asset($product->thumbnail_img) }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                        </div>
                        <div class="col-md-10 col-6">
                            <div class="row">
                                <div class="col-md-5 col-12">
                                    @if (isset($product->brand->name))
                                        <p class="font-weight-bold mb-0" style="font-size: 16px;">{{ $product->brand->name }}</p>
                                    @endif
                                    <p class="mb-0">{{ $product->name }}</p>
                                    <p class="mb-2">The best result for acne skin</p>
                                    <p>Ukuran : {{ $product->satuan_ukuran }}</p>
                                    <p class="font-weight-bold mb-0" style="font-size: 14px;">Tukar Poin</p>
                                </div>
                                <div class="col-md-2 col-12 p-0 cart-product-price">
                                    <p class="font-weight-bold" style="color: #F3795C; font-size: 14px;"></p>
                                </div>
                                <div class="col-md-2 col-12 p-0 cart-product-price">
                                </div>
                                <div class="col-md-3 col-12 cart-product-total">
                                    <p class="font-weight-bold text-right" style="font-size: 18px;">
                                    GRATIS
                                    </p>
                                </div>
                            </div>
                            <div class="text-right pb-3">
                                <a href="#" onclick="removeSampleFromTukarPoin(event, {{ $value->id }});" type="button"><i class="fa fa-trash-o" aria-hidden="true" style="font-size: 26px; color: #F3795C;"></i></a>
                            </div>

                        </div>
                    </div>
                </div>
                @endif  
                @endforeach
                @endif  


                @if (Session::has('sample') && count(Session::get('sample')) > 0)
                @foreach (Session::get('sample') as $key => $value)
                @php
                $product = \App\Product::where('id',$value->product_id)->with('brand')->first();
                @endphp
                @isset($product)
                <div class="container pt-3 px-4">
                    <div class="row" style="border-bottom: 1px solid #F3795C;">
                        <div class="col-md-2 col-6">
                            <img src="{{ asset($product->thumbnail_img) }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                        </div>
                        <div class="col-md-10 col-6">
                            <div class="row">
                                <div class="col-md-5 col-12">
                                    @if (isset($product->brand->name))
                                        <p class="font-weight-bold mb-0" style="font-size: 16px;">{{ $product->brand->name }}</p>
                                    @endif
                                    <p class="mb-0">{{ $product->name }}</p>
                                    <p class="font-weight-bold mb-0" style="font-size: 14px;">Sampel</p>
                                </div>
                                <div class="col-md-2 col-12 p-0 cart-product-price">
                                    <p class="font-weight-bold" style="color: #F3795C; font-size: 14px;"></p>
                                </div>
                                <div class="col-md-2 col-12 p-0 cart-product-price">
                                </div>
                                <div class="col-md-3 col-12 cart-product-total">
                                    <p class="font-weight-bold text-right" style="font-size: 18px;">
                                    GRATIS
                                    </p>
                                </div>
                            </div>
                            <div class="text-right pb-3">
                                <a href="#" onclick="removeSampleFromCartView(event, {{ $value->id }});" type="button"><i class="fa fa-trash-o" aria-hidden="true" style="font-size: 26px; color: #F3795C;"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endisset
                @endforeach
                @endif   

            </div>
        </div>
        <div class="col-md-4 col-12">
             @include('frontend.partials.cart_summary2')
        </div>
    </div>
    <div class="my-5 text-center container">
        <div class="row mb-2">
            <div class="col text-center">
                <h4 style="font-weight: 700;">Produk Rekomendasi</h4>
            </div>
        </div>
        <div class="row d-flex align-items-center" id="cartprodukrekom">
            <div class="col-1 d-flex align-items-center justify-content-center">
                <a href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <div class="carousel-nav-icon">
                        <i class="fa fa-chevron-left" aria-hidden="true" style="font-size: 30px;"></i>
                    </div>
                </a>
            </div>
            <div class="col-10">
                <!--Start carousel-->
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col align-items-center justify-content-center">
                                <div class="content-product">
                                    <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                    <i class="fa fa-heart-o" aria-hidden="true" style="position: absolute; top: 0; right: 0; margin: 10px; color: #F3795C; font-size: 20px;"></i>
                                    <div class="content-hover">
                                        <div class="content-hide addtobag">
                                            <p>ADD TO BAG</p>
                                        </div>
                                        <div class="content-hide quickview">
                                            <p>QUICK VIEW</p>
                                        </div>
                                    </div>
                                </div>
                                <p style="font-weight: 700; font-size: 16px; margin-top: 15px; margin-bottom: 0;">Skin Game</p>
                                <p style="margin: 0;">Acne Warrior</p>
                                <p style="font-weight: 700; margin: 0;">Rp. 125.000</p>
                                <p><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #F3795C;"></i><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #F3795C;"></i><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #F3795C;"></i><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #F3795C;"></i><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #FBD2CD;"></i>(5)</p>
                            </div>
                            <div class="col align-items-center justify-content-center">
                                <div class="content-product">
                                    <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                    <i class="fa fa-heart-o" aria-hidden="true" style="position: absolute; top: 0; right: 0; margin: 10px; color: #F3795C; font-size: 20px;"></i>
                                    <div class="content-hover">
                                        <div class="content-hide addtobag">
                                            <p>ADD TO BAG</p>
                                        </div>
                                        <div class="content-hide quickview">
                                            <p>QUICK VIEW</p>
                                        </div>
                                    </div>
                                </div> 
                                <p style="font-weight: 700; font-size: 16px; margin-top: 15px; margin-bottom: 0;">Skin Game</p>
                                <p style="margin: 0;">Acne Warrior</p>
                                <p style="font-weight: 700; margin: 0;">Rp. 125.000</p>
                                <p><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #F3795C;"></i><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #F3795C;"></i><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #F3795C;"></i><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #F3795C;"></i><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #FBD2CD;"></i>(5)</p>
                            </div>
                            <div class="col align-items-center justify-content-center">
                                <div class="content-product">
                                    <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                    <i class="fa fa-heart-o" aria-hidden="true" style="position: absolute; top: 0; right: 0; margin: 10px; color: #F3795C; font-size: 20px;"></i>
                                    <div class="content-hover">
                                        <div class="content-hide addtobag">
                                            <p>ADD TO BAG</p>
                                        </div>
                                        <div class="content-hide quickview">
                                            <p>QUICK VIEW</p>
                                        </div>
                                    </div>
                                </div>
                                <p style="font-weight: 700; font-size: 16px; margin-top: 15px; margin-bottom: 0;">Skin Game</p>
                                <p style="margin: 0;">Acne Warrior</p>
                                <p style="font-weight: 700; margin: 0;">Rp. 125.000</p>
                                <p><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #F3795C;"></i><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #F3795C;"></i><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #F3795C;"></i><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #F3795C;"></i><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #FBD2CD;"></i>(5)</p>
                            </div>
                            <div class="col align-items-center justify-content-center">
                                <div class="content-product">
                                    <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                    <i class="fa fa-heart-o" aria-hidden="true" style="position: absolute; top: 0; right: 0; margin: 10px; color: #F3795C; font-size: 20px;"></i>
                                    <div class="content-hover">
                                        <div class="content-hide addtobag">
                                            <p>ADD TO BAG</p>
                                        </div>
                                        <div class="content-hide quickview">
                                            <p>QUICK VIEW</p>
                                        </div>
                                    </div>
                                </div>
                                <p style="font-weight: 700; font-size: 16px; margin-top: 15px; margin-bottom: 0;">Skin Game</p>
                                <p style="margin: 0;">Acne Warrior</p>
                                <p style="font-weight: 700; margin: 0;">Rp. 125.000</p>
                                <p><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #F3795C;"></i><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #F3795C;"></i><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #F3795C;"></i><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #F3795C;"></i><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #FBD2CD;"></i>(5)</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col align-items-center justify-content-center">
                                <div class="content-product">
                                    <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                    <i class="fa fa-heart-o" aria-hidden="true" style="position: absolute; top: 0; right: 0; margin: 10px; color: #F3795C; font-size: 20px;"></i>
                                    <div class="content-hover">
                                        <div class="content-hide addtobag">
                                            <p>ADD TO BAG</p>
                                        </div>
                                        <div class="content-hide quickview">
                                            <p>QUICK VIEW</p>
                                        </div>
                                    </div>
                                </div>
                                <p style="font-weight: 700; font-size: 16px; margin-top: 15px; margin-bottom: 0;">Skin Game</p>
                                <p style="margin: 0;">Acne Warrior</p>
                                <p style="font-weight: 700; margin: 0;">Rp. 125.000</p>
                                <p><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #F3795C;"></i><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #F3795C;"></i><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #F3795C;"></i><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #F3795C;"></i><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #FBD2CD;"></i>(5)</p>
                            </div>
                            <div class="col align-items-center justify-content-center">
                                <div class="content-product">
                                    <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                    <i class="fa fa-heart-o" aria-hidden="true" style="position: absolute; top: 0; right: 0; margin: 10px; color: #F3795C; font-size: 20px;"></i>
                                    <div class="content-hover">
                                        <div class="content-hide addtobag">
                                            <p>ADD TO BAG</p>
                                        </div>
                                        <div class="content-hide quickview">
                                            <p>QUICK VIEW</p>
                                        </div>
                                    </div>
                                </div>
                                <p style="font-weight: 700; font-size: 16px; margin-top: 15px; margin-bottom: 0;">Skin Game</p>
                                <p style="margin: 0;">Acne Warrior</p>
                                <p style="font-weight: 700; margin: 0;">Rp. 125.000</p>
                                <p><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #F3795C;"></i><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #F3795C;"></i><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #F3795C;"></i><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #F3795C;"></i><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #FBD2CD;"></i>(5)</p>
                            </div>
                            <div class="col align-items-center justify-content-center">
                                <div class="content-product">
                                    <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                    <i class="fa fa-heart-o" aria-hidden="true" style="position: absolute; top: 0; right: 0; margin: 10px; color: #F3795C; font-size: 20px;"></i>
                                    <div class="content-hover">
                                        <div class="content-hide addtobag">
                                            <p>ADD TO BAG</p>
                                        </div>
                                        <div class="content-hide quickview">
                                            <p>QUICK VIEW</p>
                                        </div>
                                    </div>
                                </div>
                                <p style="font-weight: 700; font-size: 16px; margin-top: 15px; margin-bottom: 0;">Skin Game</p>
                                <p style="margin: 0;">Acne Warrior</p>
                                <p style="font-weight: 700; margin: 0;">Rp. 125.000</p>
                                <p><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #F3795C;"></i><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #F3795C;"></i><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #F3795C;"></i><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #F3795C;"></i><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #FBD2CD;"></i>(5)</p>
                            </div>
                            <div class="col align-items-center justify-content-center">
                                <div class="content-product">
                                    <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                    <i class="fa fa-heart-o" aria-hidden="true" style="position: absolute; top: 0; right: 0; margin: 10px; color: #F3795C; font-size: 20px;"></i>
                                    <div class="content-hover">
                                        <div class="content-hide addtobag">
                                            <p>ADD TO BAG</p>
                                        </div>
                                        <div class="content-hide quickview">
                                            <p>QUICK VIEW</p>
                                        </div>
                                    </div>
                                </div>
                                <p style="font-weight: 700; font-size: 16px; margin-top: 15px; margin-bottom: 0;">Skin Game</p>
                                <p style="margin: 0;">Acne Warrior</p>
                                <p style="font-weight: 700; margin: 0;">Rp. 125.000</p>
                                <p><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #F3795C;"></i><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #F3795C;"></i><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #F3795C;"></i><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #F3795C;"></i><i class="fa fa-heart" aria-hidden="true" style="margin: 2px; color: #FBD2CD;"></i>(5)</p>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <!--End carousel-->
            </div>
            <div class="col-1 d-flex align-items-center justify-content-center"><a  href="#carouselExampleIndicators" data-slide="next">
                <div class="carousel-nav-icon">
                    <i class="fa fa-chevron-right" aria-hidden="true" style="font-size: 30px;"></i>
                </div>
                </a>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        cartQuantityInitialize();
        function showPointType(type)
        {
            if(type == 1)
            {
                $("#productpoint_1").show(300);
                $("#productpoint_2").hide(300);
                $("#productpoint_3").hide(300);
            }else if(type == 2)
            {
                $("#productpoint_1").hide(300);
                $("#productpoint_2").show(300);
                $("#productpoint_3").hide(300);
            }else{
                $("#productpoint_1").hide(300);
                $("#productpoint_2").hide(300);
                $("#productpoint_3").show(300);
            }
            
        }
    </script>
    @else
    <div class="dc-header">
        <h3 class="heading heading-6 strong-700">{{__('Your Cart is empty')}}</h3>
    </div>
    @endif

        
<script>

    $(document).ready(function () {
        rekom()
    })
</script>
                    