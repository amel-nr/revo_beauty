<div class="promote-navbar" style="background-color: #FFAAA5;">
    <div class="container">
        <div class="d-flex justify-content-between nav-promote">
            @if(Auth::check())
                <div class="p-2 bd-highlight"></div>
                <div class="p-2 bd-highlight" style="color: white;">GRATIS ONGKIR DENGAN PEMBELANJAAN {{ single_price(Auth::user()->user_tier->free_shiping_min_order) }}</div>
                <div class="p-2 bd-highlight"><a href="#" style="text-decoration: underline; color: white;">PROMOSI<i class="fa fa-chevron-right" aria-hidden="true" style="padding-left: 10px;"></i></a></div>
            @else
                <div class="p-2 bd-highlight text-center w-100" style="color: white;">LOGIN UNTUK MENDAPATKAN GRATIS ONGKIR & PROMO MENARIK LAINNYA</div>
            @endif
        </div>
    </div>
</div>
<div id="mobile-nav" style="background-color: #ffffff;">
    @include('frontend.inc.side_nav')
</div>
<div id="mobile-nav-overlay"></div>
<div class="header bg-white">
    <!-- Top Bar -->
    <div class="top-navbar" style="border-bottom: none;">
        <div class="container">
            <div class="row py-3">
                <div class="col-md-4 col-6 text-center my-auto">
                    <a href="{{ url('/') }}">
                    <img id="main-logo-header" src="{{asset('img/Rectangle.png')}}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                    </a>
                </div>
                <div class="col-md-4  form-group my-auto"></div>
                <div class="col-md-4 col-6 text-right my-auto">
                    <div class="d-inline">
                        <a href="#" id="navbarDropdownProfile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{asset('frontend/images/search.png')}}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width: 30px; margin-left: 15px;">
                        </a>
                        <a href="#" id="sidebarCollapse" role="button" style="vertical-align: middle; margin-left: 10px;">
                            <i class="fa fa-bars" aria-hidden="true" style="color: #FFAAA5; font-size: 22px;"></i>
                        </a>
                    </div>
                    <div class="d-inline">
                        <a href="#" id="navbarDropdownCart" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{asset('frontend/images/cart.png')}}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width: 30px; margin-left: 15px;">
                            @if(Session::has('cart'))
                            @php
                            $totalitemCart= 0;
                            foreach (Session::get('cart') as $key => $value){
                            $totalitemCart +=$value['quantity'];
                            }
                            @endphp
                                <span class="badge  badge badge-pill badge-secondary" id="cart_items_sidenav" style="background-color: #FFAAA5; top: -15px; position: relative;">{{ $totalitemCart }}</span>
                            @else
                                <span class="badge  badge badge-pill badge-secondary" id="cart_items_sidenav" style="background-color: #FFAAA5; top: -15px; position: relative;">0</span>
                            @endif
                        </a>
                        <div class="dropdown-menu" id="navbarDropdownCartMenu" aria-labelledby="navbarDropdownCart" style="border-color: #FFAAA5; border-radius: 5px; margin-top: 50px; margin-right: 100px; width: 350px; background-color: #ffffff;">
                            <div class="container" id="dropdown_cart" style="padding: 20px 30px;">
                                @include('frontend.partials.item_dropdown_cart')
                            </div>
                        </div>
                    </div>
                    @auth
                    <a href="{{ route('wishlists.index') }}" id="wishlist" class="profile-wishlist">
                        <img src="{{asset('frontend/images/heart.png')}}"  class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width: 30px; margin-left: 15px;">
                        @if(Auth::check())
                            <span class="nav-box-number badge badge-pill badge-secondary" style="background-color: #FFAAA5; top: -15px; position: relative;">{{ count(Auth::user()->wishlists)}}</span>
                        @else
                            <span class="nav-box-number badge badge-pill badge-secondary" style="background-color: #FFAAA5; top: -15px; position: relative;">0</span>
                        @endif
                    </a>
                    <p class="d-inline pl-3" style="border-right: 2px solid #8675A9;"></p>
                    <div class="d-inline profile-wishlist">
                        <a href="#" class="pr-3" id="navbarDropdownProfile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{asset('frontend/images/profile.png')}}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width: 30px; margin-left: 15px;">
                            <p class="d-inline pl-2" style="color: #000000; font-size: 17px;">My Account</p> <br>
                            <a href="#modalLogin" data-target="#modalLogin" data-toggle="modal" style="color: #8675A9; font-size: 15px;">Login /</a>
                            <a href="#modalRegister" data-target="#modalRegister" data-toggle="modal" class="pr-3" style="color: #8675A9;">Register</a>
                        </a> 
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownProfile" style="border-color: #FFAAA5; border-radius: 5px; margin-top: 50px; margin-right: 100px; width: 300px; background-color: #ffffff;">
                        <div class="container" style="padding: 20px 30px;">
                            <div class="row">
                                <div class="col-4 text-right" style="padding: 10px;">
                                    <div class="rounded-circle" style="border: 2px solid black; background-image: url('{{ isset(Auth::user()->avatar_original) ? asset(Auth::user()->avatar_original) : image_avatar(Auth::user()->gender) }}'); background-repeat: no-repeat; background-size: cover; background-position: center; width: 70px; height: 70px;">
                                        <!-- <img src="{{ isset(Auth::user()->avatar_original) ? asset(Auth::user()->avatar_original) : image_avatar(Auth::user()->gender) }}" class="w-100 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt=""> -->
                                    </div>
                                </div>
                                <div class="col-8 text-left" style="padding: 10px;">
                                    <p style="font-weight: 700; font-size: 16px; margin-bottom: 0; margin-top: 10px;">Hi, {{ Auth::user()->name }}!</p>
                                    <p style="font-weight: 700; font-size: 12px; margin-bottom: 0;">{{ Auth::user()->point }} POINTS</p>
                                </div>
                            </div>
                            <ul class="list-group text-center">
                                <a href="{{ route('dashboard') }}"><li class="list-group-item" style="border-bottom: 1px solid #F3795C; background-color: #FEF6E8;">AKUN SAYA</li></a>
                                <a href="{{ route('purchase_history.index') }}"><li class="list-group-item" style="border-bottom: 1px solid #F3795C; background-color: #FEF6E8;">PESANAN</li></a>
                                <a href="{{ route('reviews.review') }}"><li class="list-group-item" style="border-bottom: 1px solid #F3795C; background-color: #FEF6E8;">ULASAN</li></a>
                                <a href="{{ route('happy_skin') }}"><li class="list-group-item" style="border-bottom: 1px solid #F3795C; background-color: #FEF6E8;">HAPPY SKIN REWARDS</li></a>
                                <!-- <a href=""><li class="list-group-item" style="border: none; background-color: #FEF6E8;">KONFIRMASI PEMBAYARAN</li></a> -->
                            </ul>
                            <a href="{{ route('logout') }}" type="button" class="btn btn-danger text-center btn-keluar" style="margin-top: 20px;">KELUAR</a>
                        </div>
                    </div>
                    </div>
                    @else
                    <a href="#modalLogin" data-target="#modalLogin" data-toggle="modal" type="button" id="login-button" class="btn btn-danger btn-round btn-loginregister login-register" style="margin-left: 15px;">LOGIN</a>
                    <a href="#modalRegister" data-target="#modalRegister" data-toggle="modal"  type="button" id="register-button" class="btn btn-danger btn-round btn-loginregister login-register" style="margin-left: 15px;">REGISTER</a>
                    @endauth
                    <div class="d-inline">
                        <a href="#" id="navbarDropdownSearch" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="vertical-align: middle; text-align: right;">
                            <i class="fa fa-search" aria-hidden="true" style="color: #F3795C; font-size: 22px;"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownSearch" style="border-color: #F3795C; border-radius: 5px; margin-top: 40px; width: 350px; margin-right: 0; background-color: #FEF6E8;">
                            <div class="container" style="padding: 20px 30px;">
                                <form id="search-form" class="form-inline" role="form" action="{{ route('search') }}" method="GET">
                                    <div class="input-group">
                                        <input type="text" aria-label="Search" id="search" name="q" class="form-control search-form" style="border-radius: 30px 0px 0px 30px; width: 250px; border-right: 1px solid white;" placeholder="Cari Merk atau Produk">
                                        <span class="input-group-btn">
                                            <button type="submit" style="border-radius: 0px 30px 30px 0px; cursor:pointer; background-color: white; border-color: #ddd; margin-left: -2px; border-left: 1px solid white;" class="btn btn-danger search-btn"><i class="fa fa-search" style="color: #F3795C;"></i>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light" id="navbar-menu-content">
                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="font-size: 12px;">
                    <ul class="navbar-nav w-100 nav-justified">
                        <li class="nav-item dropdown position-static">
                            <a class="nav-link nav-link-top" href="#" id="navbarDropdownBrands" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: black; font-weight: 700;">
                            BRANDS
                            </a>
                            <div class="dropdown-menu w-100" style="top: auto; background-color: #ffffff;" aria-labelledby="navbarDropdownBrands">
                                <div class="row w-100 p-5 m-0" style="background-color: #ffffff;">
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <a href="#" style="color: black; font-weight: 600;" class="button-brandfilter1"><p class="mb-2">A</p></a>
                                                        <a href="#" style="color: black; font-weight: 600;" class="button-brandfilter1"><p class="mb-2">E</p></a>
                                                        <a href="#" style="color: black; font-weight: 600;" class="button-brandfilter1"><p class="mb-2">I</p></a> 
                                                        <a href="#" style="color: black; font-weight: 600;" class="button-brandfilter1"><p class="mb-2">M</p></a> 
                                                        <a href="#" style="color: black; font-weight: 600;" class="button-brandfilter1"><p class="mb-2">Q</p></a> 
                                                        <a href="#" style="color: black; font-weight: 600;" class="button-brandfilter1"><p class="mb-2">U</p></a> 
                                                        <a href="#" style="color: black; font-weight: 600;" class="button-brandfilter1"><p class="mb-2">Y</p></a> 
                                                    </div>
                                                    <div class="col-3">
                                                        <a href="#" style="color: black; font-weight: 600;" class="button-brandfilter1"><p class="mb-2">B</p></a> 
                                                        <a href="#" style="color: black; font-weight: 600;" class="button-brandfilter1"><p class="mb-2">F</p></a> 
                                                        <a href="#" style="color: black; font-weight: 600;" class="button-brandfilter1"><p class="mb-2">J</p></a> 
                                                        <a href="#" style="color: black; font-weight: 600;" class="button-brandfilter1"><p class="mb-2">N</p></a> 
                                                        <a href="#" style="color: black; font-weight: 600;" class="button-brandfilter1"><p class="mb-2">R</p></a> 
                                                        <a href="#" style="color: black; font-weight: 600;" class="button-brandfilter1"><p class="mb-2">V</p></a> 
                                                        <a href="#" style="color: black; font-weight: 600;" class="button-brandfilter1"><p class="mb-2">Z</p></a> 
                                                    </div>
                                                    <div class="col-3">
                                                        <a href="#" style="color: black; font-weight: 600;" class="button-brandfilter1"><p class="mb-2">C</p></a> 
                                                        <a href="#" style="color: black; font-weight: 600;" class="button-brandfilter1"><p class="mb-2">G</p></a>
                                                        <a href="#" style="color: black; font-weight: 600;" class="button-brandfilter1"><p class="mb-2">K</p></a> 
                                                        <a href="#" style="color: black; font-weight: 600;" class="button-brandfilter1"><p class="mb-2">O</p></a> 
                                                        <a href="#" style="color: black; font-weight: 600;" class="button-brandfilter1"><p class="mb-2">S</p></a> 
                                                        <a href="#" style="color: black; font-weight: 600;" class="button-brandfilter1"><p class="mb-2">W</p></a> 
                                                        <a href="#" style="color: #F3795C; font-weight: 600;" class="button-brandfilter1"><p class="mb-2">All</p></a> 
                                                    </div>
                                                    <div class="col-3">
                                                        <a href="#" style="color: black; font-weight: 600;" class="button-brandfilter1"><p class="mb-2">D</p></a> 
                                                        <a href="#" style="color: black; font-weight: 600;" class="button-brandfilter1"><p class="mb-2">H</p></a> 
                                                        <a href="#" style="color: black; font-weight: 600;" class="button-brandfilter1"><p class="mb-2">L</p></a> 
                                                        <a href="#" style="color: black; font-weight: 600;" class="button-brandfilter1"><p class="mb-2">P</p></a> 
                                                        <a href="#" style="color: black; font-weight: 600;" class="button-brandfilter1"><p class="mb-2">T</p></a> 
                                                        <a href="#" style="color: black; font-weight: 600;" class="button-brandfilter1"><p class="mb-2">X</p></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 pl-5" id="allbrand" style="height: 244px; overflow: auto;">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8" style="height: 244px; overflow: auto;">
                                        <div class="row" id="allbrandlogo">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <p style="border-right: 1px solid #F6E5F5; height: 21px; margin-top: 16px;"></p>
                        <li class="nav-item dropdown position-static">
                            <a class="nav-link nav-link-top" href="#" id="navbarDropdownSkinCare" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: black; font-weight: 700; width: 150px; margin-left: auto; margin-right: auto;">
                            SKIN CARE
                            </a>
                            <div class="dropdown-menu w-100" style="top: auto; background-color: #FCF8F0;" aria-labelledby="navbarDropdownSkinCare">
                                <div class="row w-100 p-5 m-0" style="background-color: #FCF8F0;">
                                    <div class="col-8">
                                        <div class="card-columns">
                                        @php
                                        function sub_category($cid){
                                            return $sub_category = \App\SubCategory::with('subsubcategories')
                                        ->where('category_id',$cid)->get();
                                        }
                                        @endphp
                                        @foreach(sub_category(5) as $key => $sc)
                                            <div class="card mb-3" style="background-color: transparent; border: none;">
                                                <a href="#" style="font-size: 18px; font-weight: 600; color: black;"><p class="mb-0">{{$sc->name}}</p> </a>
                                                @foreach($sc->subsubcategories as $k => $ssc) 
                                                <a href="{{route('products.subsubcategory',['subsubcategory_slug' => $ssc->slug])}}" style="color: black; font-size: 16px;" class="skincare-button"><p class="mb-0">{{$ssc->name}} </p> </a>
                                                @endforeach
                                            </div>
                                        @endforeach
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="col-6">
                                                <img src="{{ asset('frontend/images/preferensi-produk/indonesia.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                            </div>
                                            <div class="col-6">
                                                <img src="{{ asset('frontend/images/preferensi-produk/indonesia.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <p style="border-right: 1px solid #F6E5F5; height: 21px; margin-top: 16px;"></p>
                        <li class="nav-item dropdown position-static">
                            <a class="nav-link nav-link-top" href="#" id="navbarDropdownHair" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: black; font-weight: 700; width: 180px; margin-left: auto; margin-right: auto;">
                            HAIR & MAKE UP 
                            </a>
                            <div class="dropdown-menu w-100" style="top: auto; background-color: #FCF8F0;" aria-labelledby="navbarDropdownHair">

                                <div class="row w-100 p-5 m-0" style="background-color: #FCF8F0;">
                                    <div class="col-4">
                                    @foreach(sub_category(6) as $key => $sc)
                                    <div class="mb-3">
                                        <p class="heading-5 mb-0" style="font-size: 18px; font-weight: 600;">{{$sc->name}}</p>
                                        @foreach($sc->subsubcategories as $k => $ssc) 
                                        <a href="{{route('products.subsubcategory',['subsubcategory_slug' => $ssc->slug])}}" style="color: black; font-size: 16px;" class="hair-beauty-button"><p class="mb-0">{{$ssc->name}}</p></a>
                                        @endforeach
                                    </div>
                                    @endforeach
                                    </div>
                                    <div class="col-8">
                                        <div class="row">
                                            <div class="col-4">
                                                <img src="{{ asset('frontend/images/preferensi-produk/indonesia.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                            </div>
                                            <div class="col-4">
                                                <img src="{{ asset('frontend/images/preferensi-produk/indonesia.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                            </div>
                                            <div class="col-4">
                                                <img src="{{ asset('frontend/images/preferensi-produk/indonesia.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <p style="border-right: 1px solid #F6E5F5; height: 21px; margin-top: 16px;"></p>
                        <li class="nav-item dropdown position-static">
                            <a class="nav-link nav-link-top" href="#" id="navbarDropdownTools" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: black; font-weight: 700;">
                            TOOLS 
                            </a>
                            <div class="dropdown-menu w-100" style="top: auto; background-color: #FCF8F0;" aria-labelledby="navbarDropdownTools">
                                <div class="row w-100 p-5 m-0" style="background-color: #FCF8F0;">
                                    <div class="col-4">
                                    @foreach(sub_category(7) as $key => $sc)
                                        <a href="{{route('products.subcategory',['subcategory_slug' => $sc->slug])}}" style="color: black; font-weight: 600;" class="tools-button"><p class="mb-1" style="font-size: 16px;">{{$sc->name}}</p></a>
                                    @endforeach
                                    </div>
                                    <div class="col-8">
                                        <div class="row">
                                            <div class="col-4">
                                                <img src="{{ asset('frontend/images/preferensi-produk/indonesia.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                            </div>
                                            <div class="col-4">
                                                <img src="{{ asset('frontend/images/preferensi-produk/indonesia.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                            </div>
                                            <div class="col-4">
                                                <img src="{{ asset('frontend/images/preferensi-produk/indonesia.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <p style="border-right: 1px solid #F6E5F5; height: 21px; margin-top: 16px;"></p>
                        <li class="nav-item dropdown position-static">
                            <a class="nav-link nav-link-top" href="#" id="navbarDropdownSkin" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: black; font-weight: 700; width: 170px; margin-left: auto; margin-right: auto;">
                            SKIN CONCERN 
                            </a>
                            <div class="dropdown-menu w-100" style="top: auto; background-color: #FCF8F0;" aria-labelledby="navbarDropdownSkin">
                                <div class="row w-100 p-5 m-0" style="background-color: #FCF8F0;">
                                    <div class="col-3" style="border-right: #f3795c solid 1px;">
                                        @php
                                        $skinconcern = \App\skinConcern::all();
                                        @endphp
                                        @foreach($skinconcern as $k => $sc)
                                        <a href="{{route('products.skinconcern',['skinconcern' => $sc->slug])}}" style="color: black; font-weight: 600;" class="concern-button"><p class="mb-1" style="font-size: 16px;">{{$sc->name}}</p></a>
                                        @endforeach
                                        <!-- <a href="#" style="color: black; font-weight: 600;" class="concern-button"><p class="mb-1" style="font-size: 16px;">ANTI-AGING / WRINKLES</p></a>
                                        <a href="#" style="color: black; font-weight: 600;" class="concern-button"><p class="mb-1" style="font-size: 16px;">DRYNESS / HYDRATION</p></a>
                                        <a href="#" style="color: black; font-weight: 600;" class="concern-button"><p class="mb-1" style="font-size: 16px;">OIL CONTROL / PORES</p></a>
                                        <a href="#" style="color: black; font-weight: 600;" class="concern-button"><p class="mb-1" style="font-size: 16px;">PIGMENTATION & BLEMISH</p></a>
                                        <a href="#" style="color: black; font-weight: 600;" class="concern-button"><p class="mb-1" style="font-size: 16px;">REDNESS</p></a>
                                        <a href="#" style="color: black; font-weight: 600;" class="concern-button"><p class="mb-1" style="font-size: 16px;">SENSITIVE</p></a> -->
                                    </div>
                                    <div class="col-9 pl-5">
                                        <p style="color: black; font-size: 18px; font-weight: 600;">TEMUKAN JENIS KULITMU!</p>
                                        <div class="row">
                                        @php
                                        $skintype = \App\skinType::all();
                                        @endphp

                                        @foreach($skintype as $key => $st)
                                            <div class="col d-inline-block text-center skin-type" style="cursor: pointer;">
                                            <a href="{{route('products.skintype',['skintype' => $st->slug])}}">
                                                <img src="{{ asset('frontend/images/beauty-profile-modal').'/'.$st->icon }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                <p class="mb-0 pt-2" style="color: black; font-size: 14px;">{{$st->name}}</p>
                                            </a>
                                            </div>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <p style="border-right: 1px solid #F6E5F5; height: 21px; margin-top: 16px;"></p>
                        <a class="nav-link nav-link-top" href="{{ route('skinklopedia') }}" style="font-weight: 700; color: #FFAAA5;">SKINKLOPEDIA</a>
                        <a class="nav-link nav-link-top" href="{{ route('local_pride') }}" style="font-weight: 700; color: #FFAAA5;">LOCAL PRIDE</a>
                        <a class="nav-link nav-link-top" href="{{ route('shop_sale') }}" style="font-weight: 700; color: #FFAAA5;">SHOP SALE</a>
                    </ul>
                </div>
            </nav>
<!--             <div class="row">
                <div class="text-right d-none d-lg-block" style="width: 100%;">
                    <ul class="inline-links">
                        @if (\App\BusinessSetting::where('type', 'classified_product')->first()->value)
                            <li>
                                <a href="{{ route('customer_packages_list_show') }}" class="top-bar-item">{{__('Classified Packages')}}</a>
                            </li>
                        @endif
                        <li>
                            <a href="{{ route('orders.track') }}" class="top-bar-item">{{__('Track Order')}}</a>
                        </li>
                        @if (\App\Addon::where('unique_identifier', 'affiliate_system')->first() != null && \App\Addon::where('unique_identifier', 'affiliate_system')->first()->activated)
                            <li>
                                <a href="{{ route('affiliate.apply') }}" class="top-bar-item">{{__('Be an affiliate partner')}}</a>
                            </li>
                        @endif
                        @auth
                        <li>
                            <a href="{{ route('dashboard') }}" class="top-bar-item">{{__('My Panel')}}</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" class="top-bar-item">{{__('Logout')}}</a>
                        </li>
                        @else
                        <li>
                            <a href="#modalLogin" class="top-bar-item" data-target="#modalLogin" data-toggle="modal">{{__('Login')}}</a>
                        </li>
                        <li>
                            <a href="#modalRegister" class="top-bar-item" data-target="#modalRegister" data-toggle="modal">{{__('Registration')}}</a>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div> -->
        </div>
    </div>
    <!-- END Top Bar -->

    <!-- mobile menu -->
    {{--<div class="mobile-side-menu d-lg-none">
        <div class="side-menu-overlay opacity-0" onclick="sideMenuClose()"></div>
        <div class="side-menu-wrap opacity-0">
            <div class="side-menu closed">
                <div class="side-menu-header ">
                    <div class="side-menu-close" onclick="sideMenuClose()">
                        <i class="la la-close"></i>
                    </div>

                    @auth
                        <div class="widget-profile-box px-3 py-4 d-flex align-items-center">
                            @if (Auth::user()->avatar_original != null)
                                <div class="image " style="background-image:url('{{ asset(Auth::user()->avatar_original) }}')"></div>
                            @else
                                <div class="image " style="background-image:url('{{ asset('frontend/images/user.png') }}')"></div>
                            @endif

                            <div class="name">{{ Auth::user()->name }}</div>
                        </div>
                        <div class="side-login px-3 pb-3">
                            <a href="{{ route('logout') }}">{{__('Sign Out')}}</a>
                        </div>
                    @else
                        <div class="widget-profile-box px-3 py-4 d-flex align-items-center">
                                <div class="image " style="background-image:url('{{ asset('frontend/images/icons/user-placeholder.jpg') }}')"></div>
                        </div>
                        <div class="side-login px-3 pb-3">
                            <a href="#modalLogin" data-target="#modalLogin" data-toggle="modal">{{__('Sign In')}}</a>
                            <a href="#modalRegister" data-target="#modalRegister" data-toggle="modal">{{__('Registration')}}</a>
                        </div>
                    @endauth
                </div>
                <div class="side-menu-list px-3">
                    <ul class="side-user-menu">
                        <li>
                            <a href="{{ route('home') }}">
                                <i class="la la-home"></i>
                                <span>{{__('Home')}}</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('dashboard') }}">
                                <i class="la la-dashboard"></i>
                                <span>{{__('Dashboard')}}</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('purchase_history.index') }}">
                                <i class="la la-file-text"></i>
                                <span>{{__('Purchase History')}}</span>
                            </a>
                        </li>
                        @auth
                            @php
                                $conversation = \App\Conversation::where('sender_id', Auth::user()->id)->where('sender_viewed', '1')->get();
                            @endphp
                            @if (\App\BusinessSetting::where('type', 'conversation_system')->first()->value == 1)
                                <li>
                                    <a href="{{ route('conversations.index') }}" class="{{ areActiveRoutesHome(['conversations.index', 'conversations.show'])}}">
                                        <i class="la la-comment"></i>
                                        <span class="category-name">
                                            {{__('Conversations')}}
                                            @if (count($conversation) > 0)
                                                <span class="ml-2" style="color:green"><strong>({{ count($conversation) }})</strong></span>
                                            @endif
                                        </span>
                                    </a>
                                </li>
                            @endif
                        @endauth
                        <li>
                            <a href="{{ route('compare') }}">
                                <i class="la la-refresh"></i>
                                <span>{{__('Compare')}}</span>
                                @if(Session::has('compare'))
                                    <span class="badge" id="compare_items_sidenav">{{ count(Session::get('compare'))}}</span>
                                @else
                                    <span class="badge" id="compare_items_sidenav">0</span>
                                @endif
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('cart') }}">
                                <i class="la la-shopping-cart"></i>
                                <span>{{__('Cart')}}</span>
                                @if(Session::has('cart'))
                                    <span class="badge" id="cart_items_sidenav">{{ count(Session::get('cart'))}}</span>
                                @else
                                    <span class="badge" id="cart_items_sidenav">0</span>
                                @endif
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('wishlists.index') }}">
                                <i class="la la-heart-o"></i>
                                <span>{{__('Wishlist')}}</span>
                            </a>
                        </li>

                        @if (\App\BusinessSetting::where('type', 'wallet_system')->first()->value == 1)
                            <li>
                                <a href="{{ route('wallet.index') }}">
                                    <i class="la la-dollar"></i>
                                    <span>{{__('My Wallet')}}</span>
                                </a>
                            </li>
                        @endif

                        <li>
                            <a href="{{ route('profile') }}">
                                <i class="la la-user"></i>
                                <span>{{__('Manage Profile')}}</span>
                            </a>
                        </li>

                        @php
                        $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
                        $club_point_addon = \App\Addon::where('unique_identifier', 'club_point')->first();
                        @endphp
                        @if ($refund_request_addon != null && $refund_request_addon->activated == 1)
                            <li>
                                <a href="{{ route('customer_refund_request') }}" class="{{ areActiveRoutesHome(['customer_refund_request'])}}">
                                    <i class="la la-file-text"></i>
                                    <span class="category-name">
                                        {{__('Sent Refund Request')}}
                                    </span>
                                </a>
                            </li>
                        @endif

                        @if ($club_point_addon != null && $club_point_addon->activated == 1)
                            <li>
                                <a href="{{ route('earnng_point_for_user') }}" class="{{ areActiveRoutesHome(['earnng_point_for_user'])}}">
                                    <i class="la la-dollar"></i>
                                    <span class="category-name">
                                        {{__('Earning Points')}}
                                    </span>
                                </a>
                            </li>
                        @endif

                        <li>
                            <a href="{{ route('support_ticket.index') }}" class="{{ areActiveRoutesHome(['support_ticket.index', 'support_ticket.show'])}}">
                                <i class="la la-support"></i>
                                <span class="category-name">
                                    {{__('Support Ticket')}}
                                </span>
                            </a>
                        </li>

                    </ul>
                    @if (Auth::check() && Auth::user()->user_type == 'seller')
                        <div class="sidebar-widget-title py-0">
                            <span>{{__('Shop Options')}}</span>
                        </div>
                        <ul class="side-seller-menu">
                            <li>
                                <a href="{{ route('seller.products') }}">
                                    <i class="la la-diamond"></i>
                                    <span>{{__('Products')}}</span>
                                </a>
                            </li>

                            @if (\App\Addon::where('unique_identifier', 'pos_system')->first() != null && \App\Addon::where('unique_identifier', 'pos_system')->first()->activated)
                                <li>
                                    <a href="{{route('poin-of-sales.seller_index')}}">
                                        <i class="la la-fax"></i>
                                        <span>
                                            {{__('POS Manager')}}
                                        </span>
                                    </a>
                                </li>
                            @endif

                            <li>
                                <a href="{{ route('orders.index') }}">
                                    <i class="la la-file-text"></i>
                                    <span>{{__('Orders')}}</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('shops.index') }}">
                                    <i class="la la-cog"></i>
                                    <span>{{__('Shop Setting')}}</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('withdraw_requests.index') }}">
                                    <i class="la la-money"></i>
                                    <span>
                                        {{__('Money Withdraw')}}
                                    </span>
                                </a>
                            </li>

                            @php
                                $conversation = \App\Conversation::where('receiver_id', Auth::user()->id)->where('receiver_viewed', '1')->get();
                            @endphp
                            @if (\App\BusinessSetting::where('type', 'conversation_system')->first()->value == 1)
                                <li>
                                    <a href="{{ route('conversations.index') }}" class="{{ areActiveRoutesHome(['conversations.index', 'conversations.show'])}}">
                                        <i class="la la-comment"></i>
                                        <span class="category-name">
                                            {{__('Conversations')}}
                                            @if (count($conversation) > 0)
                                                <span class="ml-2" style="color:green"><strong>({{ count($conversation) }})</strong></span>
                                            @endif
                                        </span>
                                    </a>
                                </li>
                            @endif

                            <li>
                                <a href="{{ route('payments.index') }}">
                                    <i class="la la-cc-mastercard"></i>
                                    <span>{{__('Payment History')}}</span>
                                </a>
                            </li>
                        </ul>
                        <div class="sidebar-widget-title py-0">
                            <span>{{__('Earnings')}}</span>
                        </div>
                        <div class="widget-balance py-3">
                            <div class="text-center">
                                <div class="heading-4 strong-700 mb-4">
                                    @php
                                        $orderDetails = \App\OrderDetail::where('seller_id', Auth::user()->id)->where('created_at', '>=', date('-30d'))->get();
                                        $total = 0;
                                        foreach ($orderDetails as $key => $orderDetail) {
                                            if($orderDetail->order != null && $orderDetail->order != null && $orderDetail->order->payment_status == 'paid'){
                                                $total += $orderDetail->price;
                                            }
                                        }
                                    @endphp
                                    <small class="d-block text-sm alpha-5 mb-2">{{__('Your earnings (current month)')}}</small>
                                    <span class="p-2 bg-base-1 rounded">{{ single_price($total) }}</span>
                                </div>
                                <table class="text-left mb-0 table w-75 m-auto">
                                    <tbody>
                                        <tr>
                                            @php
                                                $orderDetails = \App\OrderDetail::where('seller_id', Auth::user()->id)->get();
                                                $total = 0;
                                                foreach ($orderDetails as $key => $orderDetail) {
                                                    if($orderDetail->order != null && $orderDetail->order->payment_status == 'paid'){
                                                        $total += $orderDetail->price;
                                                    }
                                                }
                                            @endphp
                                            <td class="p-1 text-sm">
                                                {{__('Total earnings')}}:
                                            </td>
                                            <td class="p-1">
                                                {{ single_price($total) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            @php
                                                $orderDetails = \App\OrderDetail::where('seller_id', Auth::user()->id)->where('created_at', '>=', date('-60d'))->where('created_at', '<=', date('-30d'))->get();
                                                $total = 0;
                                                foreach ($orderDetails as $key => $orderDetail) {
                                                    if($orderDetail->order != null && $orderDetail->order->payment_status == 'paid'){
                                                        $total += $orderDetail->price;
                                                    }
                                                }
                                            @endphp
                                            <td class="p-1 text-sm">
                                                {{__('Last Month earnings')}}:
                                            </td>
                                            <td class="p-1">
                                                {{ single_price($total) }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                    <!-- <div class="sidebar-widget-title py-0">
                        <span>Categories</span>
                    </div>
                    <ul class="side-seller-menu">
                        @foreach (\App\Category::all() as $key => $category)
                            <li>
                            <a href="{{ route('products.category', $category->slug) }}" class="text-truncate">
                                <img class="cat-image lazyload" src="{{ asset('frontend/images/placeholder.jpg') }}" data-src="{{ asset($category->icon) }}" width="13" alt="{{ __($category->name) }}">
                                <span>{{ __($category->name) }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul> -->
                </div>
            </div>
        </div>
    </div>--}}
    <!-- end mobile menu -->

    <!-- <div class="position-relative logo-bar-area">
        <div class="">
            <div class="container">
                <div class="row no-gutters align-items-center">
                    <div class="col-lg-3 col-8">
                        <div class="d-flex">
                            <div class="d-block d-lg-none mobile-menu-icon-box"> -->
                                <!-- Navbar toggler  -->
                                <!-- <a href="" onclick="sideMenuOpen(this)">
                                    <div class="hamburger-icon">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                            </div> -->

                            <!-- Brand/Logo -->
                            <!-- <a class="navbar-brand w-100" href="{{ route('home') }}">
                                @php
                                    $generalsetting = \App\GeneralSetting::first();
                                @endphp
                                @if($generalsetting->logo != null)
                                    <img src="{{ asset($generalsetting->logo) }}" alt="{{ env('APP_NAME') }}">
                                @else
                                    <img src="{{ asset('frontend/images/logo/logo.png') }}" alt="{{ env('APP_NAME') }}">
                                @endif
                            </a>

                            @if(Route::currentRouteName() != 'home' && Route::currentRouteName() != 'categories.all')
                                <div class="d-none d-xl-block category-menu-icon-box">
                                    <div class="dropdown-toggle navbar-light category-menu-icon" id="category-menu-icon">
                                        <span class="navbar-toggler-icon"></span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-9 col-4 position-static">
                        <div class="d-flex w-100">
                            <div class="search-box flex-grow-1 px-4">
                                <form action="{{ route('search') }}" method="GET">
                                    <div class="d-flex position-relative">
                                        <div class="d-lg-none search-box-back">
                                            <button class="" type="button"><i class="la la-long-arrow-left"></i></button>
                                        </div>
                                        <div class="w-100">
                                            <input type="text" aria-label="Search" id="search" name="q" class="w-100" placeholder="{{__('I am shopping for...')}}" autocomplete="off">
                                        </div>
                                        <div class="form-group category-select d-none d-xl-block">
                                            <select class="form-control selectpicker" name="category">
                                                <option value="">{{__('All Categories')}}</option>
                                                @foreach (\App\Category::all() as $key => $category)
                                                <option value="{{ $category->slug }}"
                                                    @isset($category_id)
                                                        @if ($category_id == $category->id)
                                                            selected
                                                        @endif
                                                    @endisset
                                                    >{{ __($category->name) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button class="d-none d-lg-block" type="submit">
                                            <i class="la la-search la-flip-horizontal"></i>
                                        </button>
                                        <div class="typed-search-box d-none">
                                            <div class="search-preloader">
                                                <div class="loader"><div></div><div></div><div></div></div>
                                            </div>
                                            <div class="search-nothing d-none">

                                            </div>
                                            <div id="search-content">

                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>

                            <div class="logo-bar-icons d-inline-block ml-auto">
                                <div class="d-inline-block d-lg-none">
                                    <div class="nav-search-box">
                                        <a href="#" class="nav-box-link">
                                            <i class="la la-search la-flip-horizontal d-inline-block nav-box-icon"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="d-none d-lg-inline-block">
                                    <div class="nav-compare-box" id="compare">
                                        <a href="{{ route('compare') }}" class="nav-box-link">
                                            <i class="la la-refresh d-inline-block nav-box-icon"></i>
                                            <span class="nav-box-text d-none d-xl-inline-block">{{__('Compare')}}</span>
                                            @if(Session::has('compare'))
                                                <span class="nav-box-number">{{ count(Session::get('compare'))}}</span>
                                            @else
                                                <span class="nav-box-number">0</span>
                                            @endif
                                        </a>
                                    </div>
                                </div>
                                <div class="d-none d-lg-inline-block">
                                    <div class="nav-wishlist-box" id="wishlist">
                                        <a href="{{ route('wishlists.index') }}" class="nav-box-link">
                                            <i class="la la-heart-o d-inline-block nav-box-icon"></i>
                                            <span class="nav-box-text d-none d-xl-inline-block">{{__('Wishlist')}}</span>
                                            @if(Auth::check())
                                                <span class="nav-box-number">{{ count(Auth::user()->wishlists)}}</span>
                                            @else
                                                <span class="nav-box-number">0</span>
                                            @endif
                                        </a>
                                    </div>
                                </div>
                                <div class="d-inline-block" data-hover="dropdown">
                                    <div class="nav-cart-box dropdown" id="cart_items">
                                        <a href="" class="nav-box-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="la la-shopping-cart d-inline-block nav-box-icon"></i>
                                            <span class="nav-box-text d-none d-xl-inline-block">{{__('Cart')}}</span>
                                            @if(Session::has('cart'))
                                                <span class="nav-box-number">{{ count(Session::get('cart'))}}</span>
                                            @else
                                                <span class="nav-box-number">0</span>
                                            @endif
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right px-0">
                                            <li>
                                                <div class="dropdown-cart px-0">
                                                    @if(Session::has('cart'))
                                                        @if(count($cart = Session::get('cart')) > 0)
                                                            <div class="dc-header">
                                                                <h3 class="heading heading-6 strong-700">{{__('Cart Items')}}</h3>
                                                            </div>
                                                            <div class="dropdown-cart-items c-scrollbar">
                                                                @php
                                                                    $total = 0;
                                                                @endphp
                                                                @foreach($cart as $key => $cartItem)
                                                                    @php
                                                                        $product = \App\Product::find($cartItem['id']);
                                                                        $total = $total + $cartItem['price']*$cartItem['quantity'];
                                                                    @endphp
                                                                    <div class="dc-item">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="dc-image">
                                                                                <a href="{{ route('product', $product->slug) }}">
                                                                                    <img src="{{ asset('frontend/images/placeholder.jpg') }}" data-src="{{ asset($product->thumbnail_img) }}" class="img-fluid lazyload" alt="{{ __($product->name) }}">
                                                                                </a>
                                                                            </div>
                                                                            <div class="dc-content">
                                                                                <span class="d-block dc-product-name text-capitalize strong-600 mb-1">
                                                                                    <a href="{{ route('product', $product->slug) }}">
                                                                                        {{ __($product->name) }}
                                                                                    </a>
                                                                                </span>

                                                                                <span class="dc-quantity">x{{ $cartItem['quantity'] }}</span>
                                                                                <span class="dc-price">{{ single_price($cartItem['price']*$cartItem['quantity']) }}</span>
                                                                            </div>
                                                                            <div class="dc-actions">
                                                                                <button onclick="removeFromCart({{ $key }})">
                                                                                    <i class="la la-close"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <div class="dc-item py-3">
                                                                <span class="subtotal-text">{{__('Subtotal')}}</span>
                                                                <span class="subtotal-amount">{{ single_price($total) }}</span>
                                                            </div>
                                                            <div class="py-2 text-center dc-btn">
                                                                <ul class="inline-links inline-links--style-3">
                                                                    <li class="px-1">
                                                                        <a href="{{ route('cart') }}" class="link link--style-1 text-capitalize btn btn-base-1 px-3 py-1">
                                                                            <i class="la la-shopping-cart"></i> {{__('View cart')}}
                                                                        </a>
                                                                    </li>
                                                                    @if (Auth::check())
                                                                    <li class="px-1">
                                                                        <a href="{{ route('checkout.shipping_info') }}" class="link link--style-1 text-capitalize btn btn-base-1 px-3 py-1 light-text">
                                                                            <i class="la la-mail-forward"></i> {{__('Checkout')}}
                                                                        </a>
                                                                    </li>
                                                                    @endif
                                                                </ul>
                                                            </div>
                                                        @else
                                                            <div class="dc-header">
                                                                <h3 class="heading heading-6 strong-700">{{__('Your Cart is empty')}}</h3>
                                                            </div>
                                                        @endif
                                                    @else
                                                        <div class="dc-header">
                                                            <h3 class="heading heading-6 strong-700">{{__('Your Cart is empty')}}</h3>
                                                        </div>
                                                    @endif
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hover-category-menu" id="hover-category-menu">
            <div class="container">
                <div class="row no-gutters position-relative">
                    <div class="col-lg-3 position-static">
                        <div class="category-sidebar" id="category-sidebar">
                            <div class="all-category">
                                <span>{{__('CATEGORIES')}}</span>
                                <a href="{{ route('categories.all') }}" class="d-inline-block">See All ></a>
                            </div>
                            <ul class="categories">
                                @foreach (\App\Category::all()->take(11) as $key => $category)
                                    @php
                                        $brands = array();
                                    @endphp
                                    <li class="category-nav-element" data-id="{{ $category->id }}">
                                        <a href="{{ route('products.category', $category->slug) }}">
                                            <img class="cat-image lazyload" src="{{ asset('frontend/images/placeholder.jpg') }}" data-src="{{ asset($category->icon) }}" width="30" alt="{{ __($category->name) }}">
                                            <span class="cat-name">{{ __($category->name) }}</span>
                                        </a>
                                        @if(count($category->subcategories)>0)
                                            <div class="sub-cat-menu c-scrollbar">
                                                <div class="c-preloader">
                                                    <i class="fa fa-spin fa-spinner"></i>
                                                </div>
                                            </div>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> -->
    <!-- Navbar -->

    <!-- <div class="main-nav-area d-none d-lg-block">
        <nav class="navbar navbar-expand-lg navbar--bold navbar--style-2 navbar-light bg-default">
            <div class="container">
                <div class="collapse navbar-collapse align-items-center justify-content-center" id="navbar_main">
                    <ul class="navbar-nav">
                        @foreach (\App\Search::orderBy('count', 'desc')->get()->take(5) as $key => $search)
                            <li class="nav-item">
                                <a class="nav-link nav-link-top" href="{{ route('suggestion.search', $search->query) }}">{{ $search->query }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
    </div> -->
</div>

<script>
function sideNavBrand(hp, hk) {
    $.get("{{route('product.sidenavbrand', ['hp'=>'first_letter', 'hk'=>'second_letter'])}}".replace('first_letter', hp).replace('second_letter', hk),function (data) {
        $('.filter-alphabet-side-nav').hide();
        $('#filtersidenav').show();
        $('.title-side-nav').text(hp+' - '+hk);
        let content = '';
        data.forEach(function (product) {
            let url = "{{route('products.brand','product_slug')}}".replace("product_slug", product.slug);
            content += 
            `<a href="`+url+`" class="list-group-item list-side-menu">`+product.name.toUpperCase()+`</a>`;
        });
        $("#filtersidenav").html(content);
    })

}

function sideNavSkinCare(subcategory, name) {
    $.get("{{route('product.sidenavskincare', ['subcategory'=>'sc'])}}".replace('sc', subcategory),function (data) {
        $('.filter-skincare-side-nav').hide();
        $('#filterskincaresidenav').show();
        let str = name.toUpperCase();
        $('.title-side-nav').text(str);
        let content = '';
        data.forEach(function (product) {
            let url = "{{route('products.subsubcategory','product_slug')}}".replace("product_slug", product.slug);
            content += 
            `<a href="`+url+`" class="list-group-item list-side-menu">`+product.name.toUpperCase()+`</a>`;
        });
        $("#filterskincaresidenav").html(content);
    })

}

$(document).ready(function () {

    allbrand();

    $(".button-brandfilter1").click(function () {
        let filt = $(this).find("p").html()
        let content = ''
        let logo = ''

        if (filt.toLowerCase() == "all") {
            $("#allbrand").html("")
            $("#allbrandlogo").html("")
            allbrand()
            return
        }

        $.getJSON("{{route('show.all.brand')}}", function (data) {
            $.each(data, function (key, value) {
            let urL = "{{route('products.brand',['brand_slug'=>'sbrand'])}}".replace('sbrand',value.slug)
                if (value.name.toLowerCase().startsWith(filt.toLowerCase())) {
                   content += `<a href="`+ urL +`" style="font-weight: 600; color: black;" class="button-brandfilter2"><p class="mb-2">`+ value.name +`</p></a>`;
                   logo += `<div class="col-4 mb-5">
                                <img src="{{ asset('`+ value.logo +`') }}" class="img-fluid" alt="">
                            </div>`;
                }
            })
            $("#allbrand").html(content)
            $("#allbrandlogo").html(logo)
        })

    })

    function allbrand() {
        $.getJSON("{{route('show.all.brand')}}", function (data) {
            $.each(data, function (key, value) {
                let urL = "{{route('products.brand',['brand_slug'=>'sbrand'])}}".replace('sbrand',value.slug)
                $("#allbrand").append(`
                    <a href="`+ urL +`" style="font-weight: 600; color: black;" class="button-brandfilter2"><p class="mb-2">`+ value.name +`</p></a>
                `)
                $("#allbrandlogo").append(`
                <div class="col-4 mb-5">
                    <img src="{{ asset('`+ value.logo +`') }}" class="img-fluid" alt="">
                </div>
                `)
            })
        })
    }
    // ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}
})
</script>