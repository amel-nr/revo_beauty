@extends('frontend.layouts.app')

@section('content')

@php
            
    $orderU = \App\Order::where('user_id', Auth::user()->id);
    $log = new \App\Membership_user_log;
    $tiers = new \App\Membership;

    $u_log = $log->where('user_id',Auth::user()->id)->with('membership')->orderBy('created_at','desc')->first();
    if(!isset($u_log)){
        $log->user_id = Auth::user()->id;
        $log->member_id = 1;
        $log->save();
    }
    $order = $orderU->where('payment_status',"paid")->whereBetween('created_at',[$u_log->created_at,$u_log->ends_on]);
    $totalOrder = $order->sum('grand_total');
    //dd($totalOrder);

    $n_tier = $tiers->where('min',">=",$u_log->membership->min)->first();
    $next = '';
    $next_max = '';
    $to_next = 0;
    $ct = $u_log->membership->title;
    if(isset($n_tier)){
        if($n_tier->id == $u_log->member_id){
            $n_tier = $tiers->where('min',">=",$n_tier->min)->get()[1];
        }
        $next = $n_tier->title;
        $next_max = $n_tier->min;
        $to_next = (int)$next_max - (int)$totalOrder;
    }
    

    

    function toRp($max){return 'Rp. '.strrev(implode('.',str_split(strrev(strval($max)),3)));}
   

    function percentage($max,$min,$input){
        $range = $max-$min;
        $correctedStartValue = $input-$min;
        $percentage = ($correctedStartValue * 100) / $range;
        return $percentage;
    }
    
    $percent = $totalOrder != 0 ? ($totalOrder/$next_max)*100 : '';
    //dd($percent)
@endphp


    <section class="gry-bg pb-4 profile" style="background-color: #FCF8F0;">
        <h1 class="font-weight-bold h3 mb-5 py-5 text-center" style="background-color: #F3795C; color: white;">PHOEBE’S SQUAD</h1>
        @include('frontend.inc.account_mobile_menu')
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-3 d-none d-lg-block">
                    @include('frontend.inc.customer_side_nav')
                </div>
                <div class="col-lg-9">
                    <div class="text-center rounded mb-5" style="overflow: hidden;">
                        <div style="background-color: #F3795C;">
                            <h1 class="py-3 mb-0 font-weight-bold heading heading-3" style="color: white;">Hi, {{ Auth::user()->name }} {{ Auth::user()->last_name }}</h1>
                        </div>
                        <div class="py-4" style="background-color: white;">
                            <h1 class="mb-0 font-weight-bold heading heading-2">HAPPY SKIN REWARD</h1>
                            <p>{{toRp($totalOrder)}}{{$next_max != '' ? ' / '. toRP($next_max):''}}</p>
                            <div class="row">
                                <div class="col-3 text-right font-weight-bold">
                                    <p class="mb-1" style="text-transform: uppercase;">{{$ct}}</p>
                                </div>
                            
                                <div class="col-6">
                                    <div class="progress" style="background-color: #FCE6E0;">
                                        <div class="progress-bar" role="progressbar" style="width: {{$to_next > 0? $percent:'100'}}%; background-color: #F3795C;" aria-valuenow="{{$to_next > 0? $percent:'100'}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            @if($to_next > 0)
                                <div class="col-3 text-left font-weight-bold">
                                    <p class="mb-1" style="text-transform: uppercase;">{{$next}}</p>
                                </div>
                            @endif
                            </div>
                            @if($to_next > 0)
                            <p class="font-weight-bold mb-0" style="font-size: 10px;">Belanja {{toRp($to_next)}} lagi untuk naik tingkat ke <span style="text-transform: capitalize;">{{$next}}</span></p>
                            @else
                            <p class="font-weight-bold mb-0" style="font-size: 10px;">Luar biasa! anda sudah mencapai level <span style="text-transform: capitalize;">maximum</span></p>
                            @endif
                        </div>
                        <div class="py-2" style="background-color: #F9C0B0;">
                            <p class="mb-0" style="font-size: 11px; line-height: 1rem;">Selamat datang di Happy Skin Reward! Level membership kamu berada di tingkat Dewy Skin.</p>
                            <p class="mb-0" style="font-size: 11px; line-height: 1rem;">Yuk, belanja dan kumpulkan poin lebih banyak untuk ke tingkat Oh Happy Skin! Cari tau berbagai reward menarik di <a href="#" style="color: white;"><u>Keuntungan Happy Skin Reward.</u></a></p>
                        </div>
                    </div>
                    @php
                    $order = \App\Order::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->first();
                    if(isset($order)){
                        $status_order = \App\Models\Mvariable::where(['var_id' => 'status_order','param_1' => $order->payment_status,'param_2' => $order->delivery_status ])->first();
                    }
                    @endphp
                    @if(isset($order))
                    <div class="rounded mb-3" style="overflow: hidden; border: 1px solid #F3795C;">
                        <div class="text-center" style="border-bottom: 1px solid #F3795C;">
                            <h1 class="py-2 mb-0 font-weight-bold heading heading-4">PESANAN</h1>
                        </div>
                        <div class="py-4 px-md-5">
                            <div class="row">
                                <div class="col">
                                    <p class="px-3" style="font-size: 18px; font-weight: 600;">{{ date('d-m-Y', $order->date) }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-6">
                                    @if (count($order->orderDetails) > 0)
                                    @foreach ($order->orderDetails as $key => $value)
                                    @php
                                        $product = \App\Product::where('id',$value->product_id)->with('brand')->first();
                                    @endphp
                                    <div class="col-12 pr-0 mb-2">
                                        <img src="{{ isset($product->thumbnail_img) ? asset($product->thumbnail_img) : asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                    </div>
                                    @endforeach
                                    @endif

                                    @if (count($order->orderDetailPoint) > 0)
                                    @foreach ($order->orderDetailPoint as $key => $value)
                                    @php
                                    $productpoint = \App\Models\ProductPoint::where('id',$value->product_point_id)->first();
                                    $product = \App\Product::where('id',$productpoint->product_id)->with('brand')->first();
                                    @endphp
                                    <div class="col-12 pr-0 mb-2">
                                        <img src="{{ isset($product->thumbnail_img) ? asset($product->thumbnail_img) : asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                    </div>
                                    @endforeach
                                    @endif

                                    @if (count($order->orderDetailSample) > 0)
                                    @foreach ($order->orderDetailSample as $key => $value)
                                    @php
                                    $sample = \App\Models\Sample::where('id',$value->sample_id)->first();
                                    $product = \App\Product::where('id',$sample->product_id)->with('brand')->first();
                                    @endphp
                                    <div class="col-12 pr-0 mb-2">
                                        <img src="{{ isset($product->thumbnail_img) ? asset($product->thumbnail_img) : asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                    </div>
                                    @endforeach
                                    @endif
                                 
                                    
                                </div>
                                <div class="col-md-3 col-6">
                                    <p style="font-size: 18px; font-weight: 600;">#{{ $order->code }}</p>
                                </div>
                                <div class="col-md-3 col-6">
                                    <p class="px-3" style="font-size: 18px; font-weight: 600;">
                                        @if(isset($status_order))
                                            {{ $status_order->param_3 }}
                                        @endif
                                    </p>
                                </div>
                                <div class="col-md-3 col-6">
                                    <p style="font-size: 18px; font-weight: 600;">{{ single_price($order->grand_total+$order->uniq_tf_manual) }}</p>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('purchase_history') }}" type="button" class="btn btn-danger text-center btn-pakai py-1 width-100 rounded-0" style="font-size: 17px; font-weight: 600;">LIHAT SEMUA</a>
                    </div>
                    @else
                    <div class="text-center rounded mb-3" style="overflow: hidden; border: 1px solid #F3795C;">
                        <div style="border-bottom: 1px solid #F3795C;">
                            <h1 class="py-2 mb-0 font-weight-bold heading heading-4">PESANAN</h1>
                        </div>
                        <div class="py-4">
                            <p class="mb-0" style="font-size: 16px;">Ups, kamu belum melakukan pembelian di Ponny Beaute,</p>
                            <p style="font-size: 16px;">yuk mulai berbelanja!</p>
                            <a href="#" type="button" class="btn btn-danger text-center btn-pakai py-2 mt-3">BELANJA SEKARANG</a>
                        </div>
                    </div>
                    @endif
                    
                    @php
                    $review_user = \App\Review::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->with('user')->first();
                    @endphp
                    @if(isset($review_user))
                    <div class="rounded mb-3" style="overflow: hidden; border: 1px solid #F3795C;">
                        <div class="text-center" style="border-bottom: 1px solid #F3795C;">
                            <h1 class="py-2 mb-0 font-weight-bold heading heading-4">REVIEW</h1>
                        </div>
                        <div class="py-4 px-5">
                            <div class="row">
                                <div class="col-md-7 col-12 pl-0">
                                    <p class="font-weight-bold" style="font-size: 18px;">{{ $review_user->user->name }} {{ $review_user->user->last_name }}</p>
                                    <table><tbody>
                                        <tr>
                                            <td><input type="hidden" class="rating rating-product" data-filled="fa fa-heart custom-heart" data-empty="fa fa-heart custom-heart-empty" value="{{ $review_user->rating }}" disabled="disabled"/>
                                        </div></td>
                                            <td><span class="badge badge-light ml-2" style="font-size: 90%; background-color: white; vertical-align: super;">Verified by Phoebe</span></td>
                                        </tr>
                                    </tbody></table>
                                    <p style="font-size: 16px;">{{ $review_user->comment }}</p>
                                </div>
                                <div class="col-md-5 col-12 my-auto">
                                    <div class="row">
                                        @php
                                        $photos =  json_decode($review_user->photos);
                                        @endphp
                                        @if(isset($photos) && count($photos) > 0)
                                        @foreach ($photos as $key => $photo)
                                        <div class="col-4 pl-0 mb-2">
                                            <img src="{{ asset($photo) }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('review') }}" type="button" class="btn btn-danger text-center btn-pakai py-1 width-100 rounded-0" style="font-size: 17px; font-weight: 600;">LIHAT SEMUA</a>
                    </div>
                    @else
                    <div class="text-center rounded mb-3" style="overflow: hidden; border: 1px solid #F3795C;">
                        <div style="border-bottom: 1px solid #F3795C;">
                            <h1 class="py-2 mb-0 font-weight-bold heading heading-4">REVIEW</h1>
                        </div>
                        <div class="py-4">
                            <p class="mb-0" style="font-size: 16px;">UPS!</p>
                            <p class="mb-0" style="font-size: 16px;">Beauties, kamu belum menulis review produk ini.</p>
                            <p style="font-size: 16px;">Yuk, bagikan pengalamanmu menggunakan produk ini untuk pengguna yang lain.</p>
                            <a href="#" type="button" class="btn btn-danger text-center btn-pakai py-2 mt-3">BELANJA SEKARANG</a>
                        </div>
                    </div>
                    @endif

                    @php
                    $wishlist = \App\Wishlist::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->first();
                    @endphp
                    @if(isset($wishlist))
                    <div class="rounded mb-3" style="overflow: hidden; border: 1px solid #F3795C;">
                        <div class="text-center" style="border-bottom: 1px solid #F3795C;">
                            <h1 class="py-2 mb-0 font-weight-bold heading heading-4">DAFTAR KEINGINAN</h1>
                        </div>
                        @php
                        $brand = \App\Brand::find($wishlist->product['brand_id']);
                        @endphp
                        <div class="py-4 px-md-5">
                            <div class="row px-4">
                                <div class="col-md-3 col-6">
                                    <img src="{{ isset($wishlist->product->thumbnail_img) ? asset($wishlist->product->thumbnail_img) : asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                    <i class="fa fa-heart" aria-hidden="true" style="position: absolute; top: 0; right: 0; margin: 10px 25px; color: #F3795C; font-size: 20px;"></i>
                                </div>
                                <div class="col-md-5 col-6 my-auto">
                                    @if(isset($brand))
                                    <p class="font-weight-bold mb-0" style="font-size: 16px;">{{ $brand->name }}</p>
                                    @endif
                                    <p class="mb-0" style="font-size: 12px; line-height: 14px;">{{ $wishlist->product['name'] }}</p>
                                    <p class="mb-0 font-weight-bold" style="font-size: 14px;">{{ home_discounted_base_price($wishlist->product['id']) }}</p>
                                    @if(home_base_price($wishlist->product->id) != home_discounted_base_price($wishlist->product->id))
                                    <p class="mb-0" style="font-size: 12px; line-height: 14px;"><s>{{ home_base_price($wishlist->product->id) }}</s><span style="color: #F3795C;">({{ $wishlist->product->discount }}%)</span></p>
                                    @endif
                                    @php
                                        $total = 0;
                                        $total += $wishlist->product->reviews->count();
                                    @endphp
                                   
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <input type="hidden" class="rating rating-product" data-filled="fa fa-heart custom-heart" data-empty="fa fa-heart custom-heart-empty" value="{{$wishlist->product->rating}}" disabled="disabled"/>
                                            </td>
                                            <td>({{ $total }})</td>
                                        </tr>        
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4 col-12 py-4 text-right my-auto">
                                    <a href="#" onclick="showAddToCartModal({{ $wishlist->product->id }})" type="button" class="btn btn-danger text-center btn-pakai py-2" style="font-size: 12px; font-weight: 600;">MASUKKAN KERANJANG</a>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('wishlists') }}" type="button" class="btn btn-danger text-center btn-pakai py-1 width-100 rounded-0" style="font-size: 17px; font-weight: 600;">LIHAT SEMUA</a>
                    </div>
                    @else
                    <div class="text-center rounded mb-3" style="overflow: hidden; border: 1px solid #F3795C;">
                        <div style="border-bottom: 1px solid #F3795C;">
                            <h1 class="py-2 mb-0 font-weight-bold heading heading-4">DAFTAR KEINGINAN</h1>
                        </div>
                        <div class="py-4">
                            <p class="mb-0" style="font-size: 16px;">Wishlist-mu masih kosong, nih.</p>
                            <p style="font-size: 16px;">Yuk, lihat-lihat produk menarik di Ponny Beaute!</p>
                            <a href="#" type="button" class="btn btn-danger text-center btn-pakai py-2 mt-3">BELANJA SEKARANG</a>
                        </div>
                    </div>
                    @endif
                    


                    <!-- Page title -->
                    {{--<div class="page-title">
                        <div class="row align-items-center">
                            <div class="col-md-6 col-12">
                                <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                    {{__('Dashboard')}}
                                </h2>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="float-md-right">
                                    <ul class="breadcrumb">
                                        <li><a href="{{ route('home') }}">{{__('Home')}}</a></li>
                                        <li class="active"><a href="{{ route('dashboard') }}">{{__('Dashboard')}}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- dashboard content -->
                    <div class="">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="dashboard-widget text-center green-widget mt-4 c-pointer">
                                    <a href="javascript:;" class="d-block">
                                        <i class="fa fa-shopping-cart"></i>
                                        @if(Session::has('cart'))
                                            <span class="d-block title">{{ count(Session::get('cart'))}} {{__('Product(s)')}}</span>
                                        @else
                                            <span class="d-block title">0 {{__('Product')}}</span>
                                        @endif
                                        <span class="d-block sub-title">{{__('in your cart')}}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="dashboard-widget text-center red-widget mt-4 c-pointer">
                                    <a href="javascript:;" class="d-block">
                                        <i class="fa fa-heart"></i>
                                        <span class="d-block title">{{ count(Auth::user()->wishlists)}} {{__('Product(s)')}}</span>
                                        <span class="d-block sub-title">{{__('in your wishlist')}}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="dashboard-widget text-center yellow-widget mt-4 c-pointer">
                                    <a href="javascript:;" class="d-block">
                                        <i class="fa fa-building"></i>
                                        @php
                                            $orders = \App\Order::where('user_id', Auth::user()->id)->get();
                                            $total = 0;
                                            foreach ($orders as $key => $order) {
                                                $total += count($order->orderDetails);
                                            }
                                        @endphp
                                        <span class="d-block title">{{ $total }} {{__('Product(s)')}}</span>
                                        <span class="d-block sub-title">{{__('you ordered')}}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-box bg-white mt-4">
                                    <div class="form-box-title px-3 py-2 clearfix ">
                                        {{__('Saved Shipping Info')}}
                                        <div class="float-right">
                                            <a href="{{ route('profile') }}" class="btn btn-link btn-sm">{{__('Edit')}}</a>
                                        </div>
                                    </div>
                                    <div class="form-box-content p-3">
                                        <table>
                                            <tr>
                                                <td>{{__('Address')}}:</td>
                                                <td class="p-2">{{ Auth::user()->address }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{__('Country')}}:</td>
                                                <td class="p-2">
                                                    @if (Auth::user()->country != null)
                                                        {{ \App\Country::where('code', Auth::user()->country)->first()->name }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{__('City')}}:</td>
                                                <td class="p-2">{{ Auth::user()->city }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{__('Postal Code')}}:</td>
                                                <td class="p-2">{{ Auth::user()->postal_code }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{__('Phone')}}:</td>
                                                <td class="p-2">{{ Auth::user()->phone }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-box bg-white mt-4">
                                    <div class="form-box-title px-3 py-2 clearfix ">
                                        {{__('Purchased Package')}}
                                    </div>
                                    @php
                                        $customer_package = \App\CustomerPackage::find(Auth::user()->customer_package_id);
                                    @endphp
                                    <div class="form-box-content p-3">
                                        @if($customer_package != null)
                                            <div class="form-box-content p-2 category-widget text-center">
                                                <center><img alt="Package Logo" src="{{ asset($customer_package->logo) }}" style="height:100px; width:90px;"></center>
                                                <left> <strong><p>{{__('Product Upload')}}: {{ $customer_package->product_upload }} {{__('Times')}}</p></strong></left>
                                                <strong><p>{{__('Product Upload Remaining')}}: {{ Auth::user()->remaining_uploads }} {{__('Times')}}</p></strong>
                                                <strong><p><div class="name mb-0">{{__('Current Package')}}: {{ $customer_package->name }} <span class="ml-2"><i class="fa fa-check-circle" style="color:green"></i></span></div></p></strong>
                                            </div>
                                        @else
                                            <div class="form-box-content p-2 category-widget text-center">
                                                <center><strong><p>{{__('Package Removed')}}</p></strong></center>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>--}}

                </div>
            </div>
        </div>
    </section>

@endsection
