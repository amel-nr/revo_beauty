<!--MAIN NAVIGATION-->
<!--===================================================-->
<nav id="mainnav-container">
    <div id="mainnav">

        <!--Menu-->
        <!--================================-->
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content">

                    <!--Profile Widget-->
                    <!--================================-->
                    {{-- <div id="mainnav-profile" class="mainnav-profile">
                        <div class="profile-wrap text-center">
                            <div class="pad-btm">
                                <img loading="lazy"  class="img-circle img-md" src="{{ asset('img/profile-photos/1.png') }}" alt="Profile Picture">
                            </div>
                            <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                <span class="pull-right dropdown-toggle">
                                    <i class="dropdown-caret"></i>
                                </span>
                                <p class="mnp-name">{{Auth::user()->name}}</p>
                                <span class="mnp-desc">{{Auth::user()->email}}</span>
                            </a>
                        </div>
                        <div id="profile-nav" class="collapse list-group bg-trans">
                            <a href="#" class="list-group-item">
                                <i class="demo-pli-male icon-lg icon-fw"></i> View Profile
                            </a>
                            <a href="#" class="list-group-item">
                                <i class="demo-pli-gear icon-lg icon-fw"></i> Settings
                            </a>
                            <a href="#" class="list-group-item">
                                <i class="demo-pli-information icon-lg icon-fw"></i> Help
                            </a>
                            <a href="#" class="list-group-item">
                                <i class="demo-pli-unlock icon-lg icon-fw"></i> Logout
                            </a>
                        </div>
                    </div> --}}


                    <!--Shortcut buttons-->
                    <!--================================-->
                    <div id="mainnav-shortcut" class="hidden">
                        <ul class="list-unstyled shortcut-wrap">
                            <li class="col-xs-3" data-content="My Profile">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-mint">
                                    <i class="demo-pli-male"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Messages">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-warning">
                                    <i class="demo-pli-speech-bubble-3"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Activity">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-success">
                                    <i class="demo-pli-thunder"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Lock Screen">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-purple">
                                    <i class="demo-pli-lock-2"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--================================-->
                    <!--End shortcut buttons-->


                    <ul id="mainnav-menu" class="list-group">

                        <!--Category name-->
                        {{-- <li class="list-header">Navigation</li> --}}

                        <!--Menu list item-->
                        <li class="{{ areActiveRoutes(['admin.dashboard'])}}">
                            <a class="nav-link" href="{{route('admin.dashboard')}}">
                                <i class="fa fa-home"></i>
                                <span class="menu-title">{{__('Dashboard')}}</span>
                            </a>
                        </li>

                        @if (\App\Addon::where('unique_identifier', 'pos_system')->first() != null && \App\Addon::where('unique_identifier', 'pos_system')->first()->activated)

                            <li>
                                <a href="#">
                                    <i class="fa fa-print"></i>
                                    <span class="menu-title">{{__('POS Manager')}}</span>
                                    <i class="arrow"></i>
                                </a>

                                <!--Submenu-->
                                <ul class="collapse">
                                    <li class="{{ areActiveRoutes(['poin-of-sales.index', 'poin-of-sales.create'])}}">
                                        <a class="nav-link" href="{{route('poin-of-sales.index')}}">{{__('POS Manager')}}</a>
                                    </li>
                                    <li class="{{ areActiveRoutes(['poin-of-sales.activation'])}}">
                                        <a class="nav-link" href="{{route('poin-of-sales.activation')}}">{{__('POS Configuration')}}</a>
                                    </li>
                                </ul>
                            </li>
                        @endif                        

                        @if(Auth::user()->user_type == 'admin' || in_array('16', json_decode(Auth::user()->staff->role->permissions)))
                        <li class="{{ areActiveRoutes(['membership.index'])}}">
                            <a href="{{route('membership.index')}}">
                                <i class="fa fa-users"></i>
                                <span class="menu-title">{{__('Membership')}}</span>
                            </a>
                        </li>
                        @endif
                        <!-- Product Menu -->
                        @if(Auth::user()->user_type == 'admin' || in_array('1', json_decode(Auth::user()->staff->role->permissions)))
                            <li>
                                <a href="#">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="menu-title">{{__('Produk')}}</span>
                                    <i class="arrow"></i>
                                </a>

                                <!--Submenu-->
                                <ul class="collapse">
                                    <li class="{{ areActiveRoutes(['brands.index', 'brands.create', 'brands.edit'])}}">
                                        <a class="nav-link" href="{{route('brands.index')}}">{{__('Brand')}}</a>
                                    </li>
                                    <li class="{{ areActiveRoutes(['categories.index', 'categories.create', 'categories.edit'])}}">
                                        <a class="nav-link" href="{{route('categories.index')}}">{{__('Kategori')}}</a>
                                    </li>
                                    <li class="{{ areActiveRoutes(['subcategories.index', 'subcategories.create', 'subcategories.edit'])}}">
                                        <a class="nav-link" href="{{route('subcategories.index')}}">{{__('Sub Kategori')}}</a>
                                    </li>
                                    <li class="{{ areActiveRoutes(['subsubcategories.index', 'subsubcategories.create', 'subsubcategories.edit'])}}">
                                        <a class="nav-link" href="{{route('subsubcategories.index')}}">{{__('Sub Sub Kategori')}}</a>
                                    </li>
                                    <li class="{{ areActiveRoutes(['products.admin', 'products.create', 'products.admin.edit'])}}">
                                        <a class="nav-link" href="{{route('products.admin')}}">{{__('Daftar Produk')}}</a>
                                    </li>
                                    <li class="{{ areActiveRoutes(['sample.create', 'sample', 'sample.edit'])}}">
                                        <a class="nav-link" href="{{route('sample')}}">{{__('Daftar Sampel')}}</a>
                                    </li>
                                    <li class="{{ areActiveRoutes(['pointproduct.create', 'pointproduct', 'pointproduct.edit'])}}">
                                        <a class="nav-link" href="{{route('pointproduct')}}">{{__('Penukaran Poin Produk')}}</a>
                                    </li>
                                    <li class="{{ areActiveRoutes(['admin.phoebechoice'])}}">
                                        <a class="nav-link" href="{{route('admin.phoebechoice')}}">{{__('Phoebes-Choice')}}</a>
                                    </li>
                                    
                                    {{--@if(\App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1)
                                        <li class="{{ areActiveRoutes(['products.seller', 'products.seller.edit'])}}">
                                            <a class="nav-link" href="{{route('products.seller')}}">{{__('Seller Products')}}</a>
                                        </li>
                                    @endif--}}
                                    {{--@if(\App\BusinessSetting::where('type', 'classified_product')->first()->value == 1)
                                        <li class="{{ areActiveRoutes(['classified_products'])}}">
                                            <a class="nav-link" href="{{route('classified_products')}}">{{__('Classified Product')}}</a>
                                        </li>
                                    @endif--}}
                                    {{--<li class="{{ areActiveRoutes(['product_bulk_upload.index'])}}">
                                        <a class="nav-link" href="{{route('product_bulk_upload.index')}}">{{__('Impor Produk')}}</a>
                                    </li>--}}
                                    {{--<li class="{{ areActiveRoutes(['product_bulk_export.export'])}}">
                                        <a class="nav-link" href="{{route('product_bulk_export.index')}}">{{__('Ekspor Produk')}}</a>
                                    </li>--}}
                                    <li>
                                    <a href="#">
                                        <span class="menu-title">{{__('Data Kulit')}}</span>
                                        <i class="arrow"></i>
                                    </a>
                                        <ul class="collapse">
                                            <li class="{{ areActiveRoutes(['skinType.create','skin.store'])}}">
                                                <a class="nav-link" href="{{route('skinType.create')}}">{{__('Jenis Kulit')}}</a>
                                            </li>
                                            <li class="{{ areActiveRoutes(['skinConcern.create','skin.store'])}}">
                                                <a class="nav-link" href="{{route('skinConcern.create')}}">{{__('Permasalahan Kulit')}}</a>
                                            </li>
                                        </ul>
                                    </li>
                                    @php
                                        $review_count = DB::table('reviews')
                                                    ->orderBy('code', 'desc')
                                                    ->join('products', 'products.id', '=', 'reviews.product_id')
                                                    ->where('products.user_id', Auth::user()->id)
                                                    ->where('reviews.viewed', 0)
                                                    ->select('reviews.id')
                                                    ->distinct()
                                                    ->count();
                                    @endphp
                                    <li class="{{ areActiveRoutes(['reviews.index'])}}">
                                        <a class="nav-link" href="{{route('reviews.index')}}">{{__('Daftar Ulasan Produk')}}@if($review_count > 0)<span class="pull-right badge badge-info">{{ $review_count }}</span>@endif</a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        {{--<li>
                            <a href="#">
                                <i class="fa fa-list"></i>
                                <span class="menu-title">{{__('Digital Products')}}</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li class="{{ areActiveRoutes(['digitalproducts.index', 'digitalproducts.create', 'digitalproducts.edit'])}}">
                                    <a class="nav-link" href="{{route('digitalproducts.index')}}">{{__('Products')}}</a>
                                </li>
                            </ul>
                        </li>--}}

                        @if(Auth::user()->user_type == 'admin' || in_array('2', json_decode(Auth::user()->staff->role->permissions)))
                        <li class="{{ areActiveRoutes(['flash_deals.index', 'flash_deals.create', 'flash_deals.edit'])}}">
                            <a class="nav-link" href="{{ route('flash_deals.index') }}">
                                <i class="fa fa-bolt"></i>
                                <span class="menu-title">{{__('Flash Sale')}}</span>
                            </a>
                        </li>
                        @endif

                        @if(Auth::user()->user_type == 'admin' || in_array('3', json_decode(Auth::user()->staff->role->permissions)))
                            @php
                                $orders = DB::table('orders')
                                            ->orderBy('code', 'desc')
                                            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                                            ->where('order_details.seller_id', \App\User::where('user_type', 'admin')->first()->id)
                                            ->where('orders.viewed', 0)
                                            ->select('orders.id')
                                            ->distinct()
                                            ->count();
                            @endphp
                        <li class="{{ areActiveRoutes(['orders.index.admin', 'orders.show'])}}">
                            <a class="nav-link" href="{{ route('orders.index.admin') }}">
                                <i class="fa fa-shopping-basket"></i>
                                <span class="menu-title">{{__('Daftar Pembelian Produk')}} @if($orders > 0)<span class="pull-right badge badge-info">{{ $orders }}</span>@endif</span>
                            </a>
                        </li>
                        @endif
                        @if(Auth::user()->user_type == 'admin' || in_array('17', json_decode(Auth::user()->staff->role->permissions)))
                        <li class="{{ areActiveRoutes(['komplain.show'])}}">
                            <a class="nav-link" href="{{ route('komplain.show') }}">
                                <i class="fa fa-shopping-basket"></i>
                                <span class="menu-title">{{__('Pengajuan Komplain')}}</span>
                            </a>
                        </li>
                        @endif 
                        @if(Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'staff' || in_array('17', json_decode(Auth::user()->staff->role->permissions)))
                        <li class="{{ areActiveRoutes(['admin.get.tf.manual'])}}">
                            <a class="nav-link" href="{{ route('admin.get.tf.manual') }}">
                                <i class="fa fa-money"></i>
                                <span class="menu-title">{{__('Rekening Bank Lain')}}</span>
                            </a>
                        </li>
                        @endif

                        {{--@if(Auth::user()->user_type == 'admin' || in_array('14', json_decode(Auth::user()->staff->role->permissions)))
                        <li class="{{ areActiveRoutes(['pick_up_point.order_index','pick_up_point.order_show'])}}">
                            <a class="nav-link" href="{{ route('pick_up_point.order_index') }}">
                                <i class="fa fa-money"></i>
                                <span class="menu-title">{{__('Pick-up Point Order')}}</span>
                            </a>
                        </li>
                        @endif--}}

                        {{--@if(Auth::user()->user_type == 'admin' || in_array('4', json_decode(Auth::user()->staff->role->permissions)))
                        <li class="{{ areActiveRoutes(['sales.index', 'sales.show'])}}">
                            <a class="nav-link" href="{{ route('sales.index') }}">
                                <i class="fa fa-money"></i>
                                <span class="menu-title">{{__('Total sales')}}</span>
                            </a>
                        </li>
                        @endif--}}

                        {{--@if (\App\Addon::where('unique_identifier', 'refund_request')->first() != null)
                            <li>
                                <a href="#">
                                    <i class="fa fa-refresh"></i>
                                    <span class="menu-title">{{__('Refund Request')}}</span>
                                    <i class="arrow"></i>
                                </a>

                                <!--Submenu-->
                                <ul class="collapse">
                                    <li class="{{ areActiveRoutes(['refund_requests_all', 'reason_show'])}}">
                                        <a class="nav-link" href="{{route('refund_requests_all')}}">{{__('Refund Requests')}}
                                            @if(count(\App\RefundRequest::where('admin_seen',0)->get()) > 0)<span class="pull-right badge badge-info">{{ count(\App\RefundRequest::where('admin_seen',0)->get()) }}</span>@endif
                                        </a>
                                    </li>
                                    <li class="{{ areActiveRoutes(['paid_refund'])}}">
                                        <a class="nav-link" href="{{route('paid_refund')}}">{{__('Approved Refund')}}</a>
                                    </li>
                                    <li class="{{ areActiveRoutes(['refund_time_config'])}}">
                                        <a class="nav-link" href="{{route('refund_time_config')}}">{{__('Refund Configuration')}}</a>
                                    </li>
                                </ul>
                            </li>
                        @endif--}}

                        {{--@if((Auth::user()->user_type == 'admin' || in_array('5', json_decode(Auth::user()->staff->role->permissions))) && \App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1)
                        <li>
                            <a href="#">
                                <i class="fa fa-user-plus"></i>
                                <span class="menu-title">{{__('Sellers')}}</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li class="{{ areActiveRoutes(['sellers.index', 'sellers.create', 'sellers.edit', 'sellers.payment_history','sellers.approved','sellers.profile_modal'])}}">
                                    @php
                                        $sellers = \App\Seller::where('verification_status', 0)->where('verification_info', '!=', null)->count();
                                        //$withdraw_req = \App\SellerWithdrawRequest::where('viewed', '0')->get();
                                    @endphp
                                    <a class="nav-link" href="{{route('sellers.index')}}">{{__('Seller List')}} @if($sellers > 0)<span class="pull-right badge badge-info">{{ $sellers }}</span> @endif</a>
                                </li>
                                <li class="{{ areActiveRoutes(['withdraw_requests_all'])}}">
                                    <a class="nav-link" href="{{ route('withdraw_requests_all') }}">{{__('Seller Withdraw Requests')}}</a>
                                </li>
                                <li class="{{ areActiveRoutes(['sellers.payment_histories'])}}">
                                    <a class="nav-link" href="{{ route('sellers.payment_histories') }}">{{__('Seller Payments')}}</a>
                                </li>
                                <li class="{{ areActiveRoutes(['business_settings.vendor_commission'])}}">
                                    <a class="nav-link" href="{{ route('business_settings.vendor_commission') }}">{{__('Seller Commission')}}</a>
                                </li>
                                <li class="{{ areActiveRoutes(['seller_verification_form.index'])}}">
                                    <a class="nav-link" href="{{route('seller_verification_form.index')}}">{{__('Seller Verification Form')}}</a>
                                </li>
                            </ul>
                        </li>
                        @endif--}}

                        @if(Auth::user()->user_type == 'admin' || in_array('6', json_decode(Auth::user()->staff->role->permissions)))
                        <li>
                            <a href="#">
                                <i class="fa fa-user-plus"></i>
                                <span class="menu-title">{{__('Konsumen')}}</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li class="{{ areActiveRoutes(['customers.index'])}}">
                                    <a class="nav-link" href="{{ route('customers.index') }}">{{__('Daftar Konsumen')}}</a>
                                </li>
                                {{--<li class="{{ areActiveRoutes(['customer_packages.index','customer_packages.edit'])}}">
                                    <a class="nav-link" href="{{ route('customer_packages.index') }}">{{__('Classified Packages')}}</a>
                                </li>--}}
                            </ul>
                        </li>
                        @endif
                        @php
                            $conversation = \App\Conversation::where('receiver_id', Auth::user()->id)->where('receiver_viewed', '1')->get();
                        @endphp
                        {{--<li class="{{ areActiveRoutes(['conversations.admin_index', 'conversations.admin_show'])}}">
                            <a class="nav-link" href="{{ route('conversations.admin_index') }}">
                                <i class="fa fa-comment"></i>
                                <span class="menu-title">{{__('Pesan')}}</span>
                                @if (count($conversation) > 0)
                                    <span class="pull-right badge badge-info">{{ count($conversation) }}</span>
                                @endif
                            </a>
                        </li>--}}
                        @if(Auth::user()->user_type == 'admin' || in_array('18', json_decode(Auth::user()->staff->role->permissions)))
                        <li class="{{ areActiveRoutes(['recomendation.index', 'recomendation.create', 'recomendation.edit'])}}">
                            <a class="nav-link" href="{{ route('recomendation.index') }}">
                                <i class="fa fa-bolt"></i>
                                <span class="menu-title">{{__('Rekomendasi Produk')}}</span>
                            </a>
                        </li>
                        @endif
                        @if(Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'staff' || in_array('18', json_decode(Auth::user()->staff->role->permissions)))
                        <li class="{{ areActiveRoutes(['admin.bestsell'])}}">
                            <a class="nav-link" href="{{ route('admin.bestsell') }}">
                                <i class="fa fa-dollar"></i>
                                <span class="menu-title">{{__('Produk Best-Sell')}}</span>
                            </a>
                        </li>
                        @endif

                        @if(Auth::user()->user_type == 'admin' || in_array('19', json_decode(Auth::user()->staff->role->permissions)))
                        <li>
                            <a href="#">
                                <i class="fa fa-file"></i>
                                <span class="menu-title">{{__('Laporan')}}</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li class="{{ areActiveRoutes(['stock_report.index'])}}">
                                    <a class="nav-link" href="{{ route('stock_report.index') }}">{{__('Laporan Stok')}}</a>
                                </li>
                                <li class="{{ areActiveRoutes(['in_house_sale_report.index'])}}">
                                    <a class="nav-link" href="{{ route('in_house_sale_report.index') }}">{{__('Laporan Penjualan')}}</a>
                                </li>
                                {{--<li class="{{ areActiveRoutes(['seller_report.index'])}}">
                                    <a class="nav-link" href="{{ route('seller_report.index') }}">{{__('Seller Report')}}</a>
                                </li>--}}
                                {{--<li class="{{ areActiveRoutes(['seller_sale_report.index'])}}">
                                    <a class="nav-link" href="{{ route('seller_sale_report.index') }}">{{__('Seller Based Selling Report')}}</a>
                                </li>--}}
                                <li class="{{ areActiveRoutes(['wish_report.index'])}}">
                                    <a class="nav-link" href="{{ route('wish_report.index') }}">{{__('Laporan Daftar Keinginan')}}</a>
                                </li>
                            </ul>
                        </li>
                        @endif

                        {{--@if(Auth::user()->user_type == 'admin' || in_array('7', json_decode(Auth::user()->staff->role->permissions)))
                        <li>
                            <a href="#">
                                <i class="fa fa-envelope"></i>
                                <span class="menu-title">{{__('Messaging')}}</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li class="{{ areActiveRoutes(['newsletters.index'])}}">
                                    <a class="nav-link" href="{{route('newsletters.index')}}">{{__('Newsletters')}}</a>
                                </li>

                                @if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null)
                                    <li class="{{ areActiveRoutes(['sms.index'])}}">
                                        <a class="nav-link" href="{{route('sms.index')}}">{{__('SMS')}}</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                        @endif--}}

                        @if(Auth::user()->user_type == 'admin')
                        <li>
                            <a href="#">
                                <i class="fa fa-briefcase"></i>
                                <span class="menu-title">{{__('Pengaturan Bisnis')}}</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li class="{{ areActiveRoutes(['activation.index'])}}">
                                    <a class="nav-link" href="{{route('activation.index')}}">{{__('Aktivasi')}}</a>
                                </li>
                                <li class="{{ areActiveRoutes(['payment_method.index'])}}">
                                    <a class="nav-link" href="{{ route('payment_method.index') }}">{{__('Metode Pembayaran')}}</a>
                                </li>
                                <li class="{{ areActiveRoutes(['smtp_settings.index'])}}">
                                    <a class="nav-link" href="{{ route('smtp_settings.index') }}">{{__('Pengaturan SMTP')}}</a>
                                </li>
                                <li class="{{ areActiveRoutes(['google_analytics.index'])}}">
                                    <a class="nav-link" href="{{ route('google_analytics.index') }}">{{__('Google Analytics')}}</a>
                                </li>
                                {{--<li class="{{ areActiveRoutes(['facebook_chat.index'])}}">
                                    <a class="nav-link" href="{{ route('facebook_chat.index') }}">{{__('Facebook Chat & Pixel')}}</a>
                                </li>--}}
                                <li class="{{ areActiveRoutes(['social_login.index'])}}">
                                    <a class="nav-link" href="{{ route('social_login.index') }}">{{__('Pengaturan Media Sosial')}}</a>
                                </li>
                                <li class="{{ areActiveRoutes(['currency.index'])}}">
                                    <a class="nav-link" href="{{route('currency.index')}}">{{__('Mata Uang')}}</a>
                                </li>
                                <li class="{{ areActiveRoutes(['languages.index', 'languages.create', 'languages.store', 'languages.show', 'languages.edit'])}}">
                                    <a class="nav-link" href="{{route('languages.index')}}">{{__('Bahasa')}}</a>
                                </li>
                            </ul>
                        </li>
                        @endif

                        @if(Auth::user()->user_type == 'admin' || in_array('9', json_decode(Auth::user()->staff->role->permissions)))
                        <li>
                            <a href="#">
                                <i class="fa fa-desktop"></i>
                                <span class="menu-title">{{__('Pengaturan Tampilan')}}</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li class="{{ areActiveRoutes(['home_settings.index', 'home_banners.index', 'sliders.index', 'home_categories.index', 'home_banners.create', 'home_categories.create', 'home_categories.edit', 'sliders.create'])}}">
                                    <a class="nav-link" href="{{route('home_settings.index')}}">{{__('Beranda')}}</a>
                                </li>
                                <li class="{{ areActiveRoutes(['admin.promotion'])}}">
                                        <a class="nav-link" href="{{route('admin.promotion')}}">{{__('Banner Promosi')}}</a>
                                </li>
                                {{--<li>
                                    <a href="#">
                                        <span class="menu-title">{{__('Halaman Kebijakan')}}</span>
                                        <i class="arrow"></i>
                                    </a>

                                    <!--Submenu-->
                                    <ul class="collapse">

                                        <li class="{{ areActiveRoutes(['sellerpolicy.index'])}}">
                                            <a class="nav-link" href="{{route('sellerpolicy.index', 'seller_policy')}}">{{__('Seller Policy')}}</a>
                                        </li>
                                        <li class="{{ areActiveRoutes(['returnpolicy.index'])}}">
                                            <a class="nav-link" href="{{route('returnpolicy.index', 'return_policy')}}">{{__('Return Policy')}}</a>
                                        </li>
                                        <li class="{{ areActiveRoutes(['supportpolicy.index'])}}">
                                            <a class="nav-link" href="{{route('supportpolicy.index', 'support_policy')}}">{{__('Support Policy')}}</a>
                                        </li>
                                        <li class="{{ areActiveRoutes(['terms.index'])}}">
                                            <a class="nav-link" href="{{route('terms.index', 'terms')}}">{{__('Terms & Conditions')}}</a>
                                        </li>
                                        <li class="{{ areActiveRoutes(['privacypolicy.index'])}}">
                                            <a class="nav-link" href="{{route('privacypolicy.index', 'privacy_policy')}}">{{__('Privacy Policy')}}</a>
                                        </li>
                                    </ul>

                                </li>--}}
                                {{--<li class="{{ areActiveRoutes(['links.index', 'links.create', 'links.edit'])}}">
                                    <a class="nav-link" href="{{route('links.index')}}">{{__('Useful Link')}}</a>
                                </li>--}}
                                <li class="{{ areActiveRoutes(['generalsettings.index'])}}">
                                    <a class="nav-link" href="{{route('generalsettings.index')}}">{{__('Pengaturan Umum')}}</a>
                                </li>
                                <li class="{{ areActiveRoutes(['generalsettings.logo'])}}">
                                    <a class="nav-link" href="{{route('generalsettings.logo')}}">{{__('Pengaturan Logo')}}</a>
                                </li>
                                <li class="{{ areActiveRoutes(['generalsettings.color'])}}">
                                    <a class="nav-link" href="{{route('generalsettings.color')}}">{{__('Pengaturan Warna')}}</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        
                        @if(Auth::user()->user_type == 'admin' || in_array('12', json_decode(Auth::user()->staff->role->permissions)))
                        <li>
                            <a href="#">
                                <i class="fa fa-gear"></i>
                                <span class="menu-title">{{__('Pengaturan Toko')}}</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li class="{{ areActiveRoutes(['attributes.index','attributes.create','attributes.edit'])}}">
                                    <a class="nav-link" href="{{route('attributes.index')}}">{{__('Atribut Produk')}}</a>
                                </li>
                                <li class="{{ areActiveRoutes(['coupon.index','coupon.create','coupon.edit'])}}">
                                    <a class="nav-link" href="{{route('coupon.index')}}">{{__('Kupon')}}</a>
                                </li>
                                <li class="{{ areActiveRoutes(['coupon.ultah'])}}">
                                    <a class="nav-link" href="{{route('coupon.ultah')}}">{{__('Kupon Ulang Tahun')}}</a>
                                </li>
                                {{--<li class="{{ areActiveRoutes(['setting.ongkir'])}}">
                                    <a class="nav-link" href="{{route('setting.ongkir')}}">{{__('Subsidi Ongkir')}}</a>
                                </li>
                                <li>
                                    <li class="{{ areActiveRoutes(['pick_up_points.index','pick_up_points.create','pick_up_points.edit'])}}">
                                        <a class="nav-link" href="{{route('pick_up_points.index')}}">{{__('Pickup Point')}}</a>
                                    </li>
                                </li>--}}
                            </ul>
                        </li>
                        @endif

                        @if (\App\Addon::where('unique_identifier', 'affiliate_system')->first() != null)
                            @if(Auth::user()->user_type == 'admin' || in_array('20', json_decode(Auth::user()->staff->role->permissions)))
                            <li>
                                <a href="#">
                                    <i class="fa fa-link"></i>
                                    <span class="menu-title">{{__('Pengaturan Affiliate')}}</span>
                                    <i class="arrow"></i>
                                </a>

                                <!--Submenu-->
                                <ul class="collapse">
                                    {{--<li class="{{ areActiveRoutes(['affiliate.configs'])}}">
                                        <a class="nav-link" href="{{route('affiliate.configs')}}">{{__('Affiliate Configurations')}}</a>
                                    </li>--}}
                                    {{--<li class="{{ areActiveRoutes(['affiliate.index'])}}">
                                        <a class="nav-link" href="{{route('affiliate.index')}}">{{__('Opsi Affiliate')}}</a>
                                    </li>--}}
                                    <li class="{{ areActiveRoutes(['affiliate.users', 'affiliate_users.show_verification_request', 'affiliate_user.payment_history'])}}">
                                        <a class="nav-link" href="{{route('affiliate.users')}}">{{__('Pengguna Affiliate')}}</a>
                                    </li>
                                    <li class="{{ areActiveRoutes(['affiliate.payment'])}}">
                                        <a class="nav-link" href="{{route('affiliate.payment')}}">{{__('Pembayaran Affiliate')}}</a>
                                    </li>
                                    <li class="{{ areActiveRoutes(['refferals.users'])}}">
                                        <a class="nav-link" href="{{route('refferals.users')}}">{{__('Pengguna Kode Refferal')}}</a>
                                    </li>
                                </ul>
                            </li>
                            @endif
                        @endif

                        @if (\App\Addon::where('unique_identifier', 'offline_payment')->first() != null)
                            <li>
                                <a href="#">
                                    <i class="fa fa-bank"></i>
                                    <span class="menu-title">{{__('Offline Payment System')}}</span>
                                    <i class="arrow"></i>
                                </a>

                                <!--Submenu-->
                                <ul class="collapse">
                                    <li class="{{ areActiveRoutes(['manual_payment_methods.index', 'manual_payment_methods.create', 'manual_payment_methods.edit'])}}">
                                        <a class="nav-link" href="{{ route('manual_payment_methods.index') }}">{{__('Manual Payment Methods')}}</a>
                                    </li>
                                    <li class="{{ areActiveRoutes(['offline_wallet_recharge_request.index'])}}">
                                        <a class="nav-link" href="{{ route('offline_wallet_recharge_request.index') }}">{{__('Offline Wallet Rechage')}}</a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        @if (\App\Addon::where('unique_identifier', 'paytm')->first() != null)
                            <li>
                                <a href="#">
                                    <i class="fa fa-mobile"></i>
                                    <span class="menu-title">{{__('Paytm Payment Gateway')}}</span>
                                    <i class="arrow"></i>
                                </a>

                                <!--Submenu-->
                                <ul class="collapse">
                                    <li class="{{ areActiveRoutes(['paytm.index'])}}">
                                        <a class="nav-link" href="{{route('paytm.index')}}">{{__('Set Paytm Credentials')}}</a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        @if (\App\Addon::where('unique_identifier', 'club_point')->first() != null)
                            @if(Auth::user()->user_type == 'admin' || in_array('21', json_decode(Auth::user()->staff->role->permissions)))
                            <li>
                                <a href="#">
                                    <i class="fa fa-btc"></i>
                                    <span class="menu-title">{{__('Sistem Poin')}}</span>
                                    <i class="arrow"></i>
                                </a>

                                <!--Submenu-->
                                <ul class="collapse">
                                    <li class="{{ areActiveRoutes(['club_points.configs'])}}">
                                        <a class="nav-link" href="{{route('club_points.configs')}}">{{__('Konfigurasi Poin')}}</a>
                                    </li>
                                    <li class="{{ areActiveRoutes(['set_product_points', 'product_club_point.edit'])}}">
                                        <a class="nav-link" href="{{route('set_product_points')}}">{{__('Tetapkan Poin Produk')}}</a>
                                    </li>
                                     <li class="{{ areActiveRoutes(['set_member_points'])}}">
                                        <a class="nav-link" href="{{route('set_member_points')}}">{{__('Member Poin')}}</a>
                                    </li>
                                    {{--<li class="{{ areActiveRoutes(['club_points.index', 'club_point.details'])}}">
                                        <a class="nav-link" href="{{route('club_points.index')}}">{{__('User Points')}}</a>
                                    </li>--}}
                                </ul>
                            </li>
                            @endif
                        @endif

                        @if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null)
                            <li>
                                <a href="#">
                                    <i class="fa fa-mobile"></i>
                                    <span class="menu-title">{{__('OTP System')}}</span>
                                    <i class="arrow"></i>
                                </a>

                                <!--Submenu-->
                                <ul class="collapse">
                                    <li class="{{ areActiveRoutes(['otp.configconfiguration'])}}">
                                        <a class="nav-link" href="{{route('otp.configconfiguration')}}">{{__('OTP Configurations')}}</a>
                                    </li>
                                    <li class="{{ areActiveRoutes(['otp_credentials.index'])}}">
                                        <a class="nav-link" href="{{route('otp_credentials.index')}}">{{__('Set OTP Credentials')}}</a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        {{--@if(Auth::user()->user_type == 'admin' || in_array('13', json_decode(Auth::user()->staff->role->permissions)))
                            @php
                                $support_ticket = DB::table('tickets')
                                            ->where('viewed', 0)
                                            ->select('id')
                                            ->count();
                            @endphp
                        <li class="{{ areActiveRoutes(['support_ticket.admin_index', 'support_ticket.admin_show'])}}">
                            <a class="nav-link" href="{{ route('support_ticket.admin_index') }}">
                                <i class="fa fa-support"></i>
                                <span class="menu-title">{{__('Suppot Ticket')}} @if($support_ticket > 0)<span class="pull-right badge badge-info">{{ $support_ticket }}</span>@endif</span>
                            </a>
                        </li>
                        @endif--}}

                        {{--@if(Auth::user()->user_type == 'admin' || in_array('11', json_decode(Auth::user()->staff->role->permissions)))
                        <li class="{{ areActiveRoutes(['seosetting.index'])}}">
                            <a class="nav-link" href="{{ route('seosetting.index') }}">
                                <i class="fa fa-search"></i>
                                <span class="menu-title">{{__('Pengaturan SEO')}}</span>
                            </a>
                        </li>
                        @endif--}}

                        @if(Auth::user()->user_type == 'admin' || in_array('10', json_decode(Auth::user()->staff->role->permissions)))
                        <li>
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <span class="menu-title">{{__('Staff')}}</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li class="{{ areActiveRoutes(['staffs.index', 'staffs.create', 'staffs.edit'])}}">
                                    <a class="nav-link" href="{{ route('staffs.index') }}">{{__('Daftar staff')}}</a>
                                </li>
                                <li class="{{ areActiveRoutes(['roles.index', 'roles.create', 'roles.edit'])}}">
                                    <a class="nav-link" href="{{route('roles.index')}}">{{__('Hak akses')}}</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if(Auth::user()->user_type == 'admin')
                            <li class="{{ areActiveRoutes(['addons.index', 'addons.create'])}}">
                                <a class="nav-link" href="{{ route('addons.index') }}">
                                    <i class="fa fa-wrench"></i>
                                    <span class="menu-title">{{__('Addon Fitur')}}</span>
                                </a>
                            </li>
                        @endif
                        @if(Auth::user()->user_type == 'admin' || in_array('22', json_decode(Auth::user()->staff->role->permissions)))
                        <li class="{{ areActiveRoutes(['admin.blog.manage','admin.blog.create'])}}">
                            <a class="nav-link" href="{{route('admin.blog.manage')}}">
                                <i class="fa fa-book"></i>
                                    <span class="menu-title">{{__('Blog')}}</span>
                            </a>
                        </li>
                        @endif
                        @if(Auth::user()->user_type == 'admin' || in_array('23', json_decode(Auth::user()->staff->role->permissions)))
                        <li class="{{ areActiveRoutes(['admin.forum.room','admin.forum.room.store'])}}">
                            <a class="nav-link" href="{{route('admin.forum.room')}}">
                                <i class="fa fa-users"></i>
                                    <span class="menu-title">{{__('Forum')}}</span>
                            </a>
                        </li>
                        @endif
                        @if(Auth::user()->user_type == 'admin' || in_array('24', json_decode(Auth::user()->staff->role->permissions)))
                        <li class="{{ areActiveRoutes(['admin.skinlopedia.list','admin.skinlopedia'])}}">
                            <a class="nav-link" href="{{route('admin.skinlopedia.list')}}">
                                <i class="fa fa-globe"></i>
                                    <span class="menu-title">{{__('Skinklopedia')}}</span>
                            </a>
                        </li>
                        <li class="{{ areActiveRoutes(['admin.faq.land'])}}">
                                <a class="nav-link" href="{{route('admin.faq.land')}}">
                                    <i class="fa fa-question-circle"></i>
                                        <span class="menu-title">{{__('FAQ')}}</span>
                                </a>
                        </li>
                        @endif

                        <li class="{{ areActiveRoutes(['siaran'])}}">
                                <a class="nav-link" href="#" target="popup" onclick="window.open('{{route('siaran')}}','name','width=800,height=800')">
                                    <i class="fa fa-bullhorn"></i>
                                        <span class="menu-title">{{__('Siaran Langsung')}}</span>
                                </a>
                        </li>

                       
                        

                    </ul>
                </div>
            </div>
        </div>
        <!--================================-->
        <!--End menu-->

    </div>
</nav>
