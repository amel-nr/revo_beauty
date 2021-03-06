
<!-- <section class="slice-sm footer-top-bar bg-white">
    <div class="container sct-inner">
        <div class="row no-gutters">
            <div class="col-lg-3 col-md-6">
                <div class="footer-top-box text-center">
                    <a href="{{ route('sellerpolicy') }}">
                        <i class="la la-file-text"></i>
                        <h4 class="heading-5">{{__('Seller Policy')}}</h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-top-box text-center">
                    <a href="{{ route('returnpolicy') }}">
                        <i class="la la-mail-reply"></i>
                        <h4 class="heading-5">{{__('Return Policy')}}</h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-top-box text-center">
                    <a href="{{ route('supportpolicy') }}">
                        <i class="la la-support"></i>
                        <h4 class="heading-5">{{__('Support Policy')}}</h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-top-box text-center">
                    <a href="{{ route('profile') }}">
                        <i class="la la-dashboard"></i>
                        <h4 class="heading-5">{{__('My Profile')}}</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section> -->


<!-- FOOTER -->
<footer id="footer" class="footer" style="background-color: #ffffff; position: relative;">
    <div class="container">
        <div style="border-bottom: 1px solid #D1D1D1;"></div>
        <div class="row w-100" style="padding: 50px 0;">
            <div class="col">
                <p class="heading-6" style="font-weight: 700; color: #FFAAA5;">TENTANG KAMI</p>
                <p style="border-bottom: 2px solid #8675A9; width: 30px;"></p>
                <p><a href="{{ route('about_us') }}" style="color: black; font-size: 14px;">Tentang Ponny Beaute</a></p>
                <p><a href="{{ route('blog') }}" style="color: black; font-size: 14px;">Blog</a></p>
                <p><a href="{{ route('kebijakan_privasi') }}" style="color: black; font-size: 14px;">Kebijakan Privasi</a></p>
                <p><a href="{{ route('syarat_ketentuan') }}" style="color: black; font-size: 14px;">Syarat & Ketentuan</a></p>
            </div>
            <div class="col">
                <p class="heading-6" style="color: #FFAAA5; font-weight: 700;">LAYANAN</p>
                <p style="border-bottom: 2px solid #8675A9; width: 30px;"></p>
                <p><a href="{{ route('delivery') }}" style="color: black; font-size: 14px;">Pengiriman</a></p>
                <p><a href="{{ route('return_exchange') }}" style="color: black; font-size: 14px;">Penukaran dan Pengembalian</a></p>
                <p><a href="{{ route('metode_pembayaran') }}" style="color: black; font-size: 14px;">Metode Pembayaran</a></p>
                <p><a href="{{ route('faq') }}" style="color: black; font-size: 14px;">FAQ</a></p>
                <p><a href="{{ route('contact_us') }}" style="color: black; font-size: 14px;">Hubungi Kami</a></p>
                <p><a href="{{ route('new_affiliate') }}" style="color: black; font-size: 14px;">Affiliate with Us</a></p>
                <p><a href="{{ route('consultation') }}" style="color: black; font-size: 14px;">Konsultasi</a></p>
            </div>
            <div class="col">
                <p class="heading-6" style="color: #FFAAA5; font-weight: 700;">REVO SQUAD</p>
                <p style="border-bottom: 2px solid #8675A9; width: 30px;"></p>
                <p><a href="{{ route('dashboard') }}" style="color: black; font-size: 14px;">My Account</a></p>
                <p><a href="{{ route('happy_skin') }}" style="color: black; font-size: 14px;">Happy Skin Reward</a></p>
                <a href="{{ route('forum') }}"><img src="{{ asset('frontend/images/forum.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 24px;"></a>
            </div>
            <div class="col-md-5 col-12">
                <p class="heading-6" style="color: #8675A9; font-weight: 700; font-size: 14px;">Promo Eksklusif & Diskon 10%</p>
                <div class="form-group">
                  <input type="email" class="form-control" name="" id="" aria-describedby="emailHelpId" placeholder="Email" style="background-color: #ffffff; font-size: 12px; width: 70%; display: inline; border-color: #FFAAA5;">
                  
                  <p style="color: black; font-size: 9px; line-height: 14px; margin-top: 5px;">Daftarkan email aktifmu untuk mendapat informasi promo di Revo Beauty. <br> Dapatkan juga kode promo eksklusif hanya untuk kamu dan diskon 10% untuk pembelian pertamamu.</p>
                </div>
                <p class="heading-6" style="color: #8675A9; font-weight: 700; margin-top: 30px; line-height: 30px;">CONNECT WITH US</p>
                <ul class="pl-0">
                    <li class="lingkaran" style="border: 2px solid #FFAAA5; border-radius: 100%;">
                        <a href="https://www.facebook.com"><i class="fa fa-facebook align-center" aria-hidden="true" style="font-size: 25px; vertical-align: middle; margin-left: 11px; margin-top: 7px; color: #FFAAA5;"></i></a>
                    </li>
                    <li class="lingkaran m-2" style="border: 2px solid #FFAAA5; border-radius: 100%;">
                        <a href="https://www.instagram.com"><i class="fa fa-instagram align-center" aria-hidden="true" style="font-size: 28px; vertical-align: middle; margin-left: 7px; margin-top: 4px; color: #FFAAA5;"></i></a>
                    </li>
                    <li class="lingkaran" style="border: 2px solid #FFAAA5; border-radius: 100%;">
                        <a href="https://www.pinterest.com"><i class="fa fa-pinterest align-center" aria-hidden="true" style="font-size: 28px; vertical-align: middle; margin-left: 7px; margin-top: 4px; color: #FFAAA5;"></i></a>
                    </li>
                    <li class="lingkaran m-2" style="border: 2px solid #FFAAA5; border-radius: 100%;">
                        <a href="https://www.twitter.com"><i class="fa fa-twitter align-center" aria-hidden="true" style="font-size: 28px; vertical-align: middle; margin-left: 7px; margin-top: 4px; color: #FFAAA5;"></i></a>
                    </li>
                    <li class="lingkaran" style="border: 2px solid #FFAAA5; border-radius: 100%;">
                        <a href="https://www.youtube.com"><i class="fa fa-youtube-play align-center" aria-hidden="true" style="font-size: 25px; vertical-align: middle; margin-left: 6px; margin-top: 6px; color: #FFAAA5;"></i></a>
                    </li>
                </ul>
                <p class="heading-6" style="color: #8675A9; font-weight: 700; margin-top: 30px;">GET THE APP</p>
                <img src="{{ asset('frontend/images/playstore.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 50px;">
                <img src="{{ asset('frontend/images/appstore.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 42px; padding: 4px 0;">
            </div>
        </div>
        <div class="row pt-0" style="margin-top: 0;">
            <div class="col-6">
                <p class="heading-6" style="color: #FFAAA5; font-weight: 700; margin-top: 30px;">PILIHAN PEMBAYARAN</p>
                <img src="{{ asset('frontend/images/metode-pembayaran/visa-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 60px;">
                <img src="{{ asset('frontend/images/metode-pembayaran/mastercard-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 60px;">
                <img src="{{ asset('frontend/images/metode-pembayaran/jcb-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 60px;">
                <img src="{{ asset('frontend/images/metode-pembayaran/bca-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 60px;">
                <img src="{{ asset('frontend/images/metode-pembayaran/bni-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 60px;">
                <img src="{{ asset('frontend/images/metode-pembayaran/mandiri-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 60px;">
                
                <img src="{{ asset('frontend/images/metode-pembayaran/bri-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 60px;">
                <img src="{{ asset('frontend/images/metode-pembayaran/digibank-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 60px;">
                <img src="{{ asset('frontend/images/metode-pembayaran/uob-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 60px;">
                <img src="{{ asset('frontend/images/metode-pembayaran/paninbank-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 60px;">
                <img src="{{ asset('frontend/images/metode-pembayaran/americanexpress-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 60px;">
                <img src="{{ asset('frontend/images/metode-pembayaran/ovo-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 60px;">
                
                <img src="{{ asset('frontend/images/metode-pembayaran/linkaja-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 60px;">
                <img src="{{ asset('frontend/images/metode-pembayaran/vospay-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 60px;">
                <img src="{{ asset('frontend/images/metode-pembayaran/gopay-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 60px;">
                <img src="{{ asset('frontend/images/metode-pembayaran/indomaret-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 60px;">
                <img src="{{ asset('frontend/images/metode-pembayaran/permata-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 60px;">
                <img src="{{ asset('frontend/images/metode-pembayaran/cimbclicks-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 60px;">
            </div>
            <div class="col-6">
                <p>Copyright ©2020 REVO BEAUTY. All rights reserved</p>
            </div>
        </div>
        <div style="border-bottom: 1px solid #D1D1D1; padding-bottom: 15px;"></div>
    </div>
    <!-- <div class="footer-top">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                @php
                    $generalsetting = \App\GeneralSetting::first();
                @endphp
                <div class="col-lg-5 col-xl-4 text-center text-md-left">
                    <div class="col">
                        <a href="{{ route('home') }}" class="d-block">
                            @if($generalsetting->logo != null)
                                <img loading="lazy"  src="{{ asset($generalsetting->logo) }}" alt="{{ env('APP_NAME') }}" height="44">
                            @else
                                <img loading="lazy"  src="{{ asset('frontend/images/logo/logo.png') }}" alt="{{ env('APP_NAME') }}" height="44">
                            @endif
                        </a>
                        <p class="mt-3">{{ $generalsetting->description }}</p>
                        <div class="d-inline-block d-md-block">
                            <form class="form-inline" method="POST" action="{{ route('subscribers.store') }}">
                                @csrf
                                <div class="form-group mb-0">
                                    <input type="email" class="form-control" placeholder="{{__('Your Email Address')}}" name="email" required>
                                </div>
                                <button type="submit" class="btn btn-base-1 btn-icon-left">
                                    {{__('Subscribe')}}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 offset-xl-1 col-md-4">
                    <div class="col text-center text-md-left">
                        <h4 class="heading heading-xs strong-600 text-uppercase mb-2">
                            {{__('Contact Info')}}
                        </h4>
                        <ul class="footer-links contact-widget">
                            <li>
                               <span class="d-block opacity-5">{{__('Address')}}:</span>
                               <span class="d-block">{{ $generalsetting->address }}</span>
                            </li>
                            <li>
                               <span class="d-block opacity-5">{{__('Phone')}}:</span>
                               <span class="d-block">{{ $generalsetting->phone }}</span>
                            </li>
                            <li>
                               <span class="d-block opacity-5">{{__('Email')}}:</span>
                               <span class="d-block">
                                   <a href="mailto:{{ $generalsetting->email }}">{{ $generalsetting->email  }}</a>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="col text-center text-md-left">
                        <h4 class="heading heading-xs strong-600 text-uppercase mb-2">
                            {{__('Useful Link')}}
                        </h4>
                        <ul class="footer-links">
                            @foreach (\App\Link::all() as $key => $link)
                                <li>
                                    <a href="{{ $link->url }}" title="">
                                        {{ $link->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 col-lg-2">
                    <div class="col text-center text-md-left">
                       <h4 class="heading heading-xs strong-600 text-uppercase mb-2">
                          {{__('My Account')}}
                       </h4>

                       <ul class="footer-links">
                            @if (Auth::check())
                                <li>
                                    <a href="{{ route('logout') }}" title="Logout">
                                        {{__('Logout')}}
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('user.login') }}" title="Login">
                                        {{__('Login')}}
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ route('purchase_history.index') }}" title="Order History">
                                    {{__('Order History')}}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('wishlists.index') }}" title="My Wishlist">
                                    {{__('My Wishlist')}}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('orders.track') }}" title="Track Order">
                                    {{__('Track Order')}}
                                </a>
                            </li>
                        </ul>
                    </div>
                    @if (\App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1)
                        <div class="col text-center text-md-left">
                            <div class="mt-4">
                                <h4 class="heading heading-xs strong-600 text-uppercase mb-2">
                                    {{__('Be a Seller')}}
                                </h4>
                                <a href="{{ route('shops.create') }}" class="btn btn-base-1 btn-icon-left">
                                    {{__('Apply Now')}}
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom py-3 sct-color-3">
        <div class="container">
            <div class="row row-cols-xs-spaced flex flex-items-xs-middle">
                <div class="col-md-4">
                    <div class="copyright text-center text-md-left">
                        <ul class="copy-links no-margin">
                            <li>
                                © {{ date('Y') }} {{ $generalsetting->site_name }}
                            </li>
                            <li>
                                <a href="{{ route('terms') }}">{{__('Terms')}}</a>
                            </li>
                            <li>
                                <a href="{{ route('privacypolicy') }}">{{__('Privacy policy')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="text-center my-3 my-md-0 social-nav model-2">
                        @if ($generalsetting->facebook != null)
                            <li>
                                <a href="{{ $generalsetting->facebook }}" class="facebook" target="_blank" data-toggle="tooltip" data-original-title="Facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                        @endif
                        @if ($generalsetting->instagram != null)
                            <li>
                                <a href="{{ $generalsetting->instagram }}" class="instagram" target="_blank" data-toggle="tooltip" data-original-title="Instagram">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                        @endif
                        @if ($generalsetting->twitter != null)
                            <li>
                                <a href="{{ $generalsetting->twitter }}" class="twitter" target="_blank" data-toggle="tooltip" data-original-title="Twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                        @endif
                        @if ($generalsetting->youtube != null)
                            <li>
                                <a href="{{ $generalsetting->youtube }}" class="youtube" target="_blank" data-toggle="tooltip" data-original-title="Youtube">
                                    <i class="fa fa-youtube"></i>
                                </a>
                            </li>
                        @endif
                        @if ($generalsetting->google_plus != null)
                            <li>
                                <a href="{{ $generalsetting->google_plus }}" class="google-plus" target="_blank" data-toggle="tooltip" data-original-title="Google Plus">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="col-md-4">
                    <div class="text-center text-md-right">
                        <ul class="inline-links">
                            @if (\App\BusinessSetting::where('type', 'paypal_payment')->first()->value == 1)
                                <li>
                                    <img loading="lazy" alt="paypal" src="{{ asset('frontend/images/icons/cards/paypal.png')}}" height="20">
                                </li>
                            @endif
                            @if (\App\BusinessSetting::where('type', 'stripe_payment')->first()->value == 1)
                                <li>
                                    <img loading="lazy" alt="stripe" src="{{ asset('frontend/images/icons/cards/stripe.png')}}" height="20">
                                </li>
                            @endif
                            @if (\App\BusinessSetting::where('type', 'sslcommerz_payment')->first()->value == 1)
                                <li>
                                    <img loading="lazy" alt="sslcommerz" src="{{ asset('frontend/images/icons/cards/sslcommerz.png')}}" height="20">
                                </li>
                            @endif
                            @if (\App\BusinessSetting::where('type', 'instamojo_payment')->first()->value == 1)
                                <li>
                                    <img loading="lazy" alt="instamojo" src="{{ asset('frontend/images/icons/cards/instamojo.png')}}" height="20">
                                </li>
                            @endif
                            @if (\App\BusinessSetting::where('type', 'razorpay')->first()->value == 1)
                                <li>
                                    <img loading="lazy" alt="razorpay" src="{{ asset('frontend/images/icons/cards/rozarpay.png')}}" height="20">
                                </li>
                            @endif
                            @if (\App\BusinessSetting::where('type', 'paystack')->first()->value == 1)
                                <li>
                                    <img loading="lazy" alt="paystack" src="{{ asset('frontend/images/icons/cards/paystack.png')}}" height="20">
                                </li>
                            @endif
                            @if (\App\BusinessSetting::where('type', 'cash_payment')->first()->value == 1)
                                <li>
                                    <img loading="lazy" alt="cash on delivery" src="{{ asset('frontend/images/icons/cards/cod.png')}}" height="20">
                                </li>
                            @endif
                            @if (\App\Addon::where('unique_identifier', 'offline_payment')->first() != null && \App\Addon::where('unique_identifier', 'offline_payment')->first()->activated)
                                @foreach(\App\ManualPaymentMethod::all() as $method)
                                  <li>
                                    <img loading="lazy" alt="{{ $method->heading }}" src="{{ asset($method->photo)}}" height="20">
                                </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</footer>
