@extends('frontend.layouts.app')

@section('content')   
    <section class="py-4 gry-bg" id="" style="background-color: #ffffff;">
        @if(Session::has('cart') && count(Session::get('cart')) > 0)
        <div class="container" id="cart-summary">
            <h1 class="h5 font-weight-bold">KERANJANG BELANJA</h1>
            <div class="row">
                <div class="col-md-8 col-12">
                    <div class="row text-center rounded m-0" style="border: 1px solid #C3AED6; background-color: #ffffff;">
                        <div class="col-6 py-2 sample-area" style="border-right: 1px solid #C3AED6;">
                            <p class="m-0 font-weight-bold" style="font-size: 11px;">Dapatkan 2 sampel gratis disetiap pembelian</p>
                            <p class="m-0 font-weight-bold sample-btn sample-area" style="cursor: pointer;">PILIH SAMPEL YANG KAMU INGINKAN <i class="fa fa-chevron-down sample-arrow" aria-hidden="true" style="color: #FFAAA5; font-size: 14px;"></i></p>
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
                            <p class="m-0 font-weight-bold" style="font-size: 11px;">kamu memiliki <u>{{ isset($point) ? $point : 0 }} POIN</u></p>
                            <p class="m-0 font-weight-bold tukarpoin-btn tukarpoin-area" style="font-size: 11px; cursor: pointer;">TUKAR POIN MU  <i class="fa fa-chevron-down tukarpoin-arrow" aria-hidden="true" style="color: #FFAAA5; font-size: 14px;"></i></p>
                            @else
                       
                            <p class="m-0 font-weight-bold" style="font-size: 11px;"><a class="tukarpoin-link" href="#modalLogin" data-target="#modalLogin" data-toggle="modal" style="color: black;"><u>Masuk</u></a> untuk melihat poin kamu</p>
                            <p class="m-0 font-weight-bold tukarpoin-btn tukarpoin-area" style="font-size: 11px; cursor: pointer;">dan tukarkan dengan hadiah menarik <i class="fa fa-chevron-down tukarpoin-arrow" aria-hidden="true" style="color: #F3795C; font-size: 14px;"></i></p>
                            @endif
                        </div>
                    </div>
                    <div class="container p-4 sample-container" style="border: 1px solid #FFAAA5; display: none">
                         @include('frontend.partials.sample_product')
                    </div>
                    <div class="container py-4 tukarpoin-container" style="border: 1px solid #FFAAA5; display: none">
                        <div class="row">
                            <div class="col-4 text-center">
                                <p style="font-weight: 700; margin: 0;"><a href="#" onclick="showPointType(1);" style="color: #FFAAA5;"><u><200 POIN </u></a></p>
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
                    <div class="rounded my-4" style="border: 1px solid #C3AED6; border-radius: 3px;">
                        <div class="container" style="background-color: #ffffff;">
                            <h2 class="py-2 m-0 font-weight-bold" style="color: black; font-size: 14px;">BARANG DI KERANJANG BELANJA</h2>
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
                            <div class="row" style="border-bottom: 1px solid #D1D1D1;">
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
                                            @if ($cartItem['variant'] != null)
                                            <p>Ukuran : {{ $cartItem['variant'] }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-2 col-12 p-0 cart-product-price">
                                            @if($product != null)
                                            @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                                <p class="mb-0" style="font-size: 14px;">
                                                    <s>{{ home_base_price($product->id) }}</s><span style="color: #FFAAA5;"> ({{ $product->discount }}%)</span>
                                                </p>
                                            @endif
                                            @endif
                                            <p class="font-weight-bold" style="color: #FFAAA5; font-size: 14px;">{{ single_price($cartItem['price']) }}</p>
                                        </div>
                                        <div class="col-md-2 col-12 p-0 cart-product-price">
                                            @if($cartItem['digital'] != 1)
                                                <div class="input-group input-group--style-2 pr-4" style="width: 135px;">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-number" type="button" data-type="minus" data-field="quantity[{{ $key }}]" style="border: none;">
                                                            <i class="la la-minus"></i>
                                                        </button>
                                                    </span>
                                                        <input type="text" name="quantity[{{ $key }}]" class="form-control input-number text-center" placeholder="1" value="{{ $cartItem['quantity'] }}" min="1" max="10" onchange="updateQuantity({{ $key }}, this)" style="border: none; border-bottom: 1px solid #D1D1D1;">
                                                        <span class="input-group-btn">
                                                        <button class="btn btn-number" type="button" data-type="plus" data-field="quantity[{{ $key }}]" style="border: none;">
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
                                        <a href="#" onclick="removeFromCartView(event, {{ $key }});" type="button"><i class="fa fa-trash-o" aria-hidden="true" style="font-size: 26px; color: #FFAAA5;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @if (Session::has('productPoint') && count(Session::get('productPoint')) > 0)
                        @foreach (Session::get('productPoint') as $key => $value)
                        @php
                        $cond = isset($value->product_id) ? $value->product_id : 0;
                        $product = \App\Product::where('id',$cond)->with('brand')->first();
                        @endphp
                        
                            <div class="container pt-3 px-4">
                                <div class="row" style="border-bottom: 1px solid #FFAAA5;">
                                    <div class="col-md-2 col-6">
                                        <img src="{{ asset($product != null ? $product->thumbnail_img : "placeholder-rect.jpg") }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                    </div>
                                    <div class="col-md-10 col-6">
                                        <div class="row">
                                            <div class="col-md-5 col-12">
                                                @if (isset($product->brand->name))
                                                    <p class="font-weight-bold mb-0" style="font-size: 16px;">{{ $product != null ? $product->brand->name : ""}}</p>
                                                @endif
                                                <p class="mb-0">{{ $product != null ? $product->name : "" }}</p>
                                                <p class="mb-2">The best result for acne skin</p>
                                                <p>Ukuran : {{ $product != null ? $product->satuan_ukuran : "" }}</p>
                                                <p class="font-weight-bold mb-0" style="font-size: 14px;">Tukar Poin</p>
                                            </div>
                                            <div class="col-md-2 col-12 p-0 cart-product-price">
                                                <p class="font-weight-bold" style="color: #FFAAA5; font-size: 14px;"></p>
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
                                            <a href="#" onclick="removeSampleFromTukarPoin(event, {{ isset($value->id) ? $value->id : 0  }});" type="button"><i class="fa fa-trash-o" aria-hidden="true" style="font-size: 26px; color: #FFAAA5;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        @endforeach
                        @endif   

                        @if (Session::has('sample') && count(Session::get('sample')) > 0)
                        @foreach (Session::get('sample') as $key => $value)
                        @php
                        $cond = isset($value->product_id) ? $value->product_id : 0;
                        $product = \App\Product::where('id',$cond)->with('brand')->first();
                        @endphp
                        @if($product != null)
                        <div class="container pt-3 px-4">
                            <div class="row" style="border-bottom: 1px solid #FFAAA5;">
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
                                            <p class="font-weight-bold" style="color: #FFAAA5; font-size: 14px;"></p>
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
                                        <a href="#" onclick="removeSampleFromCartView(event, {{ isset($value->id) ? $value->id : 0 }});" type="button"><i class="fa fa-trash-o" aria-hidden="true" style="font-size: 26px; color: #FFAAA5;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-4 col-12" id="cart-summarydata">
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
                        
                    </div>
            </div>
        </div>
        @else
            <div class="dc-header p-5 text-center">
                <p class="mb-0" style="font-size: 16px;">Ups, kamu belum menambahkan barang di keranjang,</p>
                <p style="font-size: 16px;">yuk mulai berbelanja!</p>
                <a href="{{ route('home') }}" type="button" class="btn btn-danger text-center btn-pakai py-2 px-5 mt-3" style="font-size: 16px; font-weight: 600;">BELANJA SEKARANG</a>
            </div>
        @endif 


    </section>

    <!-- Modal -->
    <div class="modal fade" id="GuestCheckout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-zoom" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">{{__('Login')}}</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="p-3">
                        <form class="form-default" role="form" action="{{ route('cart.login.submit') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="input-group input-group--style-1">
                                    <input type="email" name="email" class="form-control" placeholder="{{__('Email')}}">
                                    <span class="input-group-addon">
                                        <i class="text-md la la-user"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group input-group--style-1">
                                    <input type="password" name="password" class="form-control" placeholder="{{__('Password')}}">
                                    <span class="input-group-addon">
                                        <i class="text-md la la-lock"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <a href="{{ route('password.request') }}" class="link link-xs link--style-3">{{__('Forgot password?')}}</a>
                                    <br>
                                    <a href="{{ route('user.registration') }}" class="link link-xs link--style-3">{{__('Register Now')}}</a>
                                </div>
                                <div class="col-md-6 text-right">
                                    <button type="submit" class="btn btn-styled btn-base-1 px-4">{{__('Sign in')}}</button>
                                </div>
                            </div>
                        </form>

                    </div>
                     @if(\App\BusinessSetting::where('type', 'google_login')->first()->value == 1 || \App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1 || \App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1)
                        <div class="or or--1 mt-3 text-center">
                            <span>or</span>
                        </div>
                        <div class="p-3 pb-0">
                            @if (\App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1)
                                <a href="{{ route('social.login', ['provider' => 'facebook']) }}" class="btn btn-styled btn-block btn-facebook btn-icon--2 btn-icon-left px-4 mb-3">
                                    <i class="icon fa fa-facebook"></i> {{__('Login with Facebook')}}
                                </a>
                            @endif
                            @if(\App\BusinessSetting::where('type', 'google_login')->first()->value == 1)
                                <a href="{{ route('social.login', ['provider' => 'google']) }}" class="btn btn-styled btn-block btn-google btn-icon--2 btn-icon-left px-4 mb-3">
                                    <i class="icon fa fa-google"></i> {{__('Login with Google')}}
                                </a>
                            @endif
                            @if (\App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1)
                            <a href="{{ route('social.login', ['provider' => 'twitter']) }}" class="btn btn-styled btn-block btn-twitter btn-icon--2 btn-icon-left px-4 mb-3">
                                <i class="icon fa fa-twitter"></i> {{__('Login with Twitter')}}
                            </a>
                            @endif
                        </div>
                    @endif
                    @if (\App\BusinessSetting::where('type', 'guest_checkout_active')->first()->value == 1)
                        <div class="or or--1 mt-0 text-center">
                            <span>or</span>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('checkout.shipping_info') }}" class="btn btn-styled btn-base-1">{{__('Guest Checkout')}}</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $("input[type='number']").inputSpinner()
    </script>    

    <script type="text/javascript">
    $(document).ready(function () {
        rekom()
        $(".video-siaran").hide()
    })

    

    function removeSampleFromCartView(e, key){
        e.preventDefault();
        $.post('{{ route('cart.removeSampleFromCart') }}', { _token:'{{ csrf_token() }}', sample_id:key }, function(data){
            $('#cart-summary').html(data);
            // $('#cart-summary').html(data.detail);
            // $('#cart-summarydata').html(data.summary);
        });
    }

    function removeSampleFromTukarPoin(e, key){
        e.preventDefault();
        $.post('{{ route('cart.removeSampleFromTukarPoin') }}', { _token:'{{ csrf_token() }}', product_id:key }, function(data){
            $('#cart-summary').html(data);
            rekom()
        });
    }

    function showCheckoutModal(){
        $('#GuestCheckout').modal();
    }

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
@endsection
