<div class="sidebar sidebar--style-3 no-border stickyfill p-0">
    <div class="widget mb-0" style="background-color: #FCF8F0;">
        <div class="widget-profile-box text-center p-3">
            @if (Auth::user()->avatar_original != null)
                <div class="image" style="background-image:url('{{ asset(Auth::user()->avatar_original) }}')"></div>
            @else
                <img src="{{ image_avatar(Auth::user()->gender) }}" class="image rounded-circle">
            @endif
            <div class="name"><h1 class="py-2 mb-0 font-weight-bold heading heading-4">{{ Auth::user()->name }}</h1></div>
        </div>
        <div class="widget-profile-menu">
            <ul class="categories categories--style-3">
                <li>
                    <a href="{{ route('dashboard') }}" class="{{ areActiveRoutesHome(['dashboard'])}}">
                        <span class="category-name">
                            {{__('Dashboard')}}
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile') }}" class="{{ areActiveRoutesHome(['profile'])}}">
                        <span class="category-name">
                            {{__('Detail Akun')}}
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('address') }}" class="{{ areActiveRoutesHome(['address'])}}">
                        <span class="category-name">
                            {{__('Alamat')}}
                        </span>
                    </a>
                </li>

                @if(\App\BusinessSetting::where('type', 'classified_product')->first()->value == 1)
                {{--<li>
                    <a href="{{ route('customer_products.index') }}" class="{{ areActiveRoutesHome(['customer_products.index', 'customer_products.create', 'customer_products.edit'])}}">
                        <span class="category-name">
                            {{__('Classified Products')}}
                        </span>
                    </a>
                </li>--}}
                @endif
                @php
                $delivery_viewed = App\Order::where('user_id', Auth::user()->id)->where('delivery_viewed', 0)->get()->count();
                $payment_status_viewed = App\Order::where('user_id', Auth::user()->id)->where('payment_status_viewed', 0)->get()->count();
                $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
                $club_point_addon = \App\Addon::where('unique_identifier', 'club_point')->first();
                @endphp
                <li>
                    <a href="{{ route('purchase_history.index') }}" class="{{ areActiveRoutesHome(['purchase_history.index'])}}">
                        <span class="category-name">
                            {{__('Pesanan')}}
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('reviews.review') }}" class="{{ areActiveRoutesHome(['reviews.review'])}}">
                        <span class="category-name">
                            {{__('Review')}}
                        </span>
                    </a>
                </li>
                {{--<li>
                    <a href="{{ route('digital_purchase_history.index') }}" class="{{ areActiveRoutesHome(['digital_purchase_history.index'])}}">
                        <span class="category-name">
                            {{__('Downloads')}}
                        </span>
                    </a>
                </li>--}}

               {{-- @if ($refund_request_addon != null && $refund_request_addon->activated == 1)
                    <li>
                        <a href="{{ route('customer_refund_request') }}" class="{{ areActiveRoutesHome(['customer_refund_request'])}}">
                            <span class="category-name">
                                {{__('Sent Refund Request')}}
                            </span>
                        </a>
                    </li>
                @endif--}}

                <li>
                    <a href="{{ route('wishlists.index') }}" class="{{ areActiveRoutesHome(['wishlists.index'])}}">
                        <span class="category-name">
                            {{__('Daftar Keinginan')}}
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('beauty_profile') }}" class="{{ areActiveRoutesHome(['beauty_profile'])}}">
                        <span class="category-name">
                            {{__('Beauty Profile')}}
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user_affiliate') }}" class="{{ areActiveRoutesHome(['user_affiliate'])}}">
                        <span class="category-name">
                            {{__('Affiliate')}}
                        </span>
                    </a>
                </li>
                <li>
                    <div class="name"><h1 class="py-3 mb-0 font-weight-bold heading heading-5" style="padding: 1rem 0.55rem;">HAPPY SKIN</h1></div>
                </li>
                <li>
                    <a href="{{ route('happy_skin') }}" class="{{ areActiveRoutesHome(['happy_skin'])}} border-0">
                        <span class="category-name">
                            {{__('Keuntungan Happy Skin Reward')}}
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('rewards') }}" class="{{ areActiveRoutesHome(['rewards'])}}">
                        <span class="category-name">
                            {{__('Rewards')}}
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('point_history') }}" class="{{ areActiveRoutesHome(['point_history'])}}">
                        <span class="category-name">
                            {{__('Point History')}}
                        </span>
                    </a>
                </li>

                {{--@if (\App\BusinessSetting::where('type', 'conversation_system')->first()->value == 1)
                    @php
                        $conversation = \App\Conversation::where('sender_id', Auth::user()->id)->where('sender_viewed', 0)->get();
                    @endphp
                    <li>
                        <a href="{{ route('conversations.index') }}" class="{{ areActiveRoutesHome(['conversations.index', 'conversations.show'])}}">
                            <span class="category-name">
                                {{__('Conversations')}}
                                @if (count($conversation) > 0)
                                    <span class="ml-2" style="color:green"><strong>({{ count($conversation) }})</strong></span>
                                @endif
                            </span>
                        </a>
                    </li>
                @endif
                
                @if (\App\BusinessSetting::where('type', 'wallet_system')->first()->value == 1)
                    <li>
                        <a href="{{ route('wallet.index') }}" class="{{ areActiveRoutesHome(['wallet.index'])}}">
                            <span class="category-name">
                                {{__('My Wallet')}}
                            </span>
                        </a>
                    </li>
                @endif

                @if ($club_point_addon != null && $club_point_addon->activated == 1)
                    <li>
                        <a href="{{ route('earnng_point_for_user') }}" class="{{ areActiveRoutesHome(['earnng_point_for_user'])}}">
                            <span class="category-name">
                                {{__('Earning Points')}}
                            </span>
                        </a>
                    </li>
                @endif

                @if (\App\Addon::where('unique_identifier', 'affiliate_system')->first() != null && \App\Addon::where('unique_identifier', 'affiliate_system')->first()->activated && Auth::user()->affiliate_user != null && Auth::user()->affiliate_user->status)
                    <li>
                        <a href="{{ route('affiliate.user.index') }}" class="{{ areActiveRoutesHome(['affiliate.user.index', 'affiliate.payment_settings'])}}">
                            <span class="category-name">
                                {{__('Affiliate System')}}
                            </span>
                        </a>
                    </li>
                @endif
                @php
                    $support_ticket = DB::table('tickets')
                                ->where('client_viewed', 0)
                                ->where('user_id', Auth::user()->id)
                                ->count();
                @endphp
                <li>
                    <a href="{{ route('support_ticket.index') }}" class="{{ areActiveRoutesHome(['support_ticket.index'])}}">
                        <span class="category-name">
                            {{__('Support Ticket')}} @if($support_ticket > 0)<span class="ml-2" style="color:green"><strong>({{ $support_ticket }} {{ __('New') }})</strong></span></span>@endif
                        </span>
                    </a>
                </li>--}}
            </ul>
        </div>
        {{--@if (\App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1)
            <div class="widget-seller-btn pt-4">
                <a href="{{ route('shops.create') }}" class="btn btn-anim-primary w-100">{{__('Be A Seller')}}</a>
            </div>
        @endif--}}
    </div>
</div>
