@php
    $ogimg = json_decode($detailedProduct->photos);
@endphp

@extends('frontend.layouts.app')

@section('meta_title'){{ $detailedProduct->meta_title }}@stop

@section('meta_description'){{ $detailedProduct->meta_description }}@stop

@section('meta_keywords'){{ $detailedProduct->tags }}@stop

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $detailedProduct->meta_title }}">
    <meta itemprop="description" content="{{ $detailedProduct->meta_description }}">
    <meta itemprop="image" content="{{ asset($detailedProduct->meta_img) }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ $detailedProduct->meta_title }}">
    <meta name="twitter:description" content="{{ $detailedProduct->meta_description }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ asset($detailedProduct->meta_img) }}">
    <meta name="twitter:data1" content="{{ single_price($detailedProduct->unit_price) }}">
    <meta name="twitter:label1" content="Price">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $detailedProduct->meta_title }}" />
    <meta property="og:type" content="product" />
    <meta property="og:url" content="{{ route('product', $detailedProduct->slug) }}" />
    <meta property="og:image:secure_url" content="{{ asset($ogimg[0]) }}" />
    <meta property="og:image" content="{{ asset($ogimg[0]) }}" />
    <meta property="og:description" content="{{ $detailedProduct->meta_description }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
    <meta property="og:price:amount" content="{{ single_price($detailedProduct->unit_price) }}" />

@endsection

@section('style')
<style>
    .img-profile-review-container {
        display: inline-block;
        position: relative;
        width: 100%;
    }

    .img-profile-review-dummy {
        margin-top: 100%;
    }

    .img-profile-review {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: silver
    }
</style>
@endsection

@section('content')
    <!-- SHOP GRID WRAPPER -->
    @php
        $flash_product = \App\FlashDealProduct::where('product_id', $detailedProduct->id)->first();
    @endphp
    <section class="product-details-area gry-bg" style="background-color: #ffffff;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-12 p-4">
                    @if(is_array(json_decode($detailedProduct->photos)) && count(json_decode($detailedProduct->photos)) > 0)
                        <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="width-100 xzoom img-fluid lazyload ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" data-src="{{ asset(json_decode($detailedProduct->photos)[0]) }}" xoriginal="{{ asset(json_decode($detailedProduct->photos)[0]) }}" alt="">
                        <div class="row py-4">
                            @foreach (json_decode($detailedProduct->photos) as $key => $photo)
                                <div class="col-4">
                                    <a href="{{ asset($photo) }}">
                                        <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="width-100 xzoom-gallery lazyload img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" data-src="{{ asset($photo) }}"  @if($key == 0) xpreview="{{ asset($photo) }}" @endif alt="">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col-md-8 col-12 p-4">
                    <div class="row">
                        <div class="col-md-9 col-12">
                            <h1 class="font-weight-bold h4">{{ __($detailedProduct->brand['name']) }}</h1>
                            <p class="mb-0" style="font-size: 16px;">{{ __($detailedProduct->name) }}</p>
                            <p class="mb-0" style="font-size: 16px;">{{ __($detailedProduct->tagline) }}</p>
                            <p class="mb-0 py-3">
                                @php
                                    $total = 0;
                                    $total += $detailedProduct->reviews->count();
                                @endphp
                               
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>
                                            
                                            <input type="hidden" class="rating rating-product" data-filled="fa fa-heart custom-heart" data-empty="fa fa-heart custom-heart-empty" value="{{$detailedProduct->rating}}" disabled="disabled"/>
                                        </td>
                                        <td>({{ $total }})</td>
                                    </tr>        
                                    </tbody>
                                </table>
                                @if(home_price($detailedProduct->id) != home_discounted_price($detailedProduct->id))
                                    <p style="font-size: 18px;">
                                        <s>{{ home_price($detailedProduct->id) }}</s>
                                        <span class="ml-1" style="font-size: 22px; color: #FFAAA5;">{{ home_discounted_price($detailedProduct->id) }}</span>
                                        @if($flash_product)
                                            @if($flash_product->discount_type == 'percent')
                                                <span class="badge badge-primary ml-2 px-2" style="font-size: 65%; background-color: #FFAAA5;">{{ __($flash_product->discount) }}%</span>
                                            @elseif($flash_product->discount_type == 'amount')
                                                <span class="badge badge-primary ml-2 px-2" style="font-size: 65%; background-color: #FFAAA5;">Potongan Rp {{ __($flash_product->discount) }}</span>
                                            @endif
                                        @else
                                            @if($detailedProduct->discount_type == 'percent')
                                                <span class="badge badge-primary ml-2 px-2" style="font-size: 65%; background-color: #FFAAA5;">{{ __($detailedProduct->discount) }}%</span>
                                            @elseif($detailedProduct->discount_type == 'amount')
                                                <span class="badge badge-primary ml-2 px-2" style="font-size: 65%; background-color: #FFAAA5;">Potongan Rp {{ __($detailedProduct->discount) }}</span>
                                            @endif
                                        @endif
                                    </p>
                                @else
                                    <p style="font-size: 22px; color: #FFAAA5;">{{ home_discounted_price($detailedProduct->id) }}</p>
                                @endif
                            <form id="option-choice-form">
                                @php
                                    $qty = 0;
                                    if($detailedProduct->variant_product){
                                        foreach ($detailedProduct->stocks as $key => $stock) {
                                            $qty += $stock->qty;
                                        }
                                    }
                                    else{
                                        $qty = $detailedProduct->current_stock;
                                    }
                                @endphp
                                @csrf
                                    <input type="hidden" name="id" value="{{ $detailedProduct->id }}">
                                        @if ($detailedProduct->choice_options != null)
                                            @foreach (json_decode($detailedProduct->choice_options) as $key => $choice)
                                                <div class="row">
                                                    <div class="col-2 my-auto">
                                                        <p>{{ \App\Attribute::find($choice->attribute_id)->name }}:</p>
                                                    </div>
                                                    <div class="col-10 pl-0">
                                                        <ul class="list-inline checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-2">
                                                            @foreach ($choice->values as $key => $value)
                                                                <li>
                                                                    <input type="radio" id="{{ $choice->attribute_id }}-{{ $value }}" name="attribute_id_{{ $choice->attribute_id }}" value="{{ $value }}" @if($key == 0) checked @endif>
                                                                    <label for="{{ $choice->attribute_id }}-{{ $value }}">{{ $value }}</label>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

                                        @if (count(json_decode($detailedProduct->colors)) > 0)
                                            <div class="row no-gutters">
                                                <div class="col-2 my-auto">
                                                    <div class="product-description-label mt-2">{{__('Color')}}:</div>
                                                </div>
                                                <div class="col-10">
                                                    <ul class="list-inline checkbox-color mb-1">
                                                        @foreach (json_decode($detailedProduct->colors) as $key => $color)
                                                            <li>
                                                                <input type="radio" id="{{ $detailedProduct->id }}-color-{{ $key }}" name="color" value="{{ $color }}" @if($key == 0) checked @endif>
                                                                <label style="background: {{ $color }};" for="{{ $detailedProduct->id }}-color-{{ $key }}" data-toggle="tooltip"></label>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>

                                            <hr>
                                        @endif

                                        <div class="row">
                                            <div class="col-md-2 col-6 my-auto">
                                                <p class="mb-0">JUMLAH:</p>
                                            </div>
                                            <div class="col-md-3 col-6 pl-0">
                                                <div class="input-group input-group--style-2 pr-3" style="width: 160px;">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-number" type="button" data-type="minus" data-field="quantity" disabled="disabled" style="border: none;">
                                                            <i class="la la-minus"></i>
                                                        </button>
                                                    </span>
                                                    <input type="text" name="quantity" class="form-control input-number text-center" placeholder="1" value="1" min="1" max="10" style="border: none; border-bottom: 1px solid #D1D1D1;">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-number" type="button" data-type="plus" data-field="quantity" style="border: none;">
                                                            <i class="la la-plus"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-12 btn-add-container">
                                                @if ($detailedProduct->digital == 1)
                                                    <button type="button" class="btn btn-danger text-center btn-mskkeranjang ml-3" onclick="addToCart({{ $detailedProduct->id }})">MASUKKAN KERANJANG</button>
                                                @elseif($qty > 0)
                                                    <button type="button" class="btn btn-danger text-center btn-mskkeranjang ml-3" onclick="buyNow()">MASUKKAN KERANJANG</button>
                                                @else
                                                    <button type="button" class="btn btn-danger text-center btn-mskkeranjang ml-3" disabled>STOCK BARANG HABIS</button>
                                                @endif
                                                <div class="d-inline rounded-circle text-center ml-2" style="cursor: pointer; font-size: 120%; background-color: #FAE0D4; color: #FFAAA5; padding: 3px 7px;">
                                                    <i class="fa fa-heart-o" aria-hidden="true" onclick="addToWishList({{ $detailedProduct->id }})"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row py-3 d-none" id="chosen_price_div">
                                            <div class="col-md-2 col-6 my-auto">
                                                <div class="product-description-label font-weight-bold" style="font-size: 16px;">{{__('TOTAL')}}:</div>
                                            </div>
                                            <div class="col-md-10 col-6 pl-0">
                                                <div class="product-price">
                                                    <p id="chosen_price" class="font-weight-bold mb-0" style="font-size: 26px; color: #FFAAA5;">

                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($qty == 0 AND $detailedProduct->digital == 0)
                                        <div class="py-2">
                                            <p class="mb-0">Beritahu saya jika barang sudah tersedia kembali</p>
                                        </div>
                                        <div class="pb-3">
                                            <div class="row">
                                                <div class="col-md-8 col-7">
                                                    <div class="form-group">
                                                        <input type="email"
                                                            class="form-control rounded" name="email" id="register-email" aria-describedby="helpId" placeholder="Masukkan alamat email" style="padding: 10px; border-color: #FFAAA5; font-size: 12px;" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-5 pl-0">
                                                    <button type="button" class="btn btn-danger text-center btn-mskkeranjang" style="padding: 10px; font-size: 12px;">BERITAHU SAYA</button>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                            </form>
                        </div>
                        <div class="col-md-3 col-6">
                            @if( isset($detailedProduct->nomer_bpom))
                                <p class="border border-dark rounded font-weight-bold text-center p-1">BPOM {{ __($detailedProduct->nomer_bpom) }}</p>
                            @endif
                            <h6 class="font-weight-bold" style="font-size: 10px;">BAGIKAN :</h6>
                            <a href="mailto:info@example.com?&subject=&body={{url('/product').'/'.$detailedProduct->slug}}"><i class="fa fa-envelope-o mr-2" style="font-size: 20px; color: #B8B6B0;" aria-hidden="true"></i></a>
                            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url('/product').'/'.$detailedProduct->slug}}"><i class="fa fa-facebook mr-2" style="font-size: 20px; color: #B8B6B0;" aria-hidden="true"></i></a>
                            <a target="_blank" href="https://pinterest.com/pin/create/button/?url={{url('/product').'/'.$detailedProduct->slug}}&media={{asset(json_decode($detailedProduct->photos)[0])}}"><i class="fa fa-pinterest-p mr-2" style="font-size: 20px; color: #B8B6B0;" aria-hidden="true"></i></a>
                            <a target="_blank" href="https://twitter.com/share?url={{url('/product').'/'.$detailedProduct->slug}}"><i class="fa fa-twitter mr-2" style="font-size: 20px; color: #B8B6B0;" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="rounded border mt-4" style="border-color: #FFAAA5 !important;">
                        <div class="container" style="border-bottom: 10px solid #FFAAA5;">
                            <h1 class="font-weight-bold h6 py-2 m-0">KETERANGAN</h1>
                        </div>
                        <div class="container" style="border-bottom: 5px solid #FFAAA5;">
                            <p class="py-2 m-0 text-justify">{!! __($detailedProduct->description) !!}</p>
                        </div>
                        <div class="container" style="border-bottom: 5px solid #FFAAA5;">
                            <div class="row">
                                <div class="col-4" style="border-right: 5px solid #FFAAA5;">
                                    <h1 class="font-weight-bold h6 py-2 m-0">BAHAN AKTIF</h1>
                                </div>
                                <div class="col-8">
                                    <h1 class="font-weight-bold h6 py-2 m-0">KOMPOSISI</h1>
                                </div>
                            </div>
                        </div>
                        <div class="container" style="border-bottom: 5px solid #FFAAA5;">
                            <div class="row">
                                @php
                                $bahan_aktif = explode(',',$detailedProduct->bahan_aktif);
                                @endphp
                                <div class="col-4" style="border-right: 5px solid #FFAAA5;">
                                    @foreach ($bahan_aktif as $key => $value)
                                        <p class="py-2 m-0" style="border-bottom: 1px solid #FFAAA5;">{{ $value }}</p>
                                    @endforeach
                                </div>
                                <div class="col-8">
                                    <p class="py-2 m-0 text-justify">{!! __($detailedProduct->komposisi) !!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="container" style="border-bottom: 5px solid #FFAAA5;">
                            <h1 class="font-weight-bold h6 py-2 m-0">CARA PENGGUNAAN</h1>
                        </div>
                        <div class="container">
                            <p class="py-2 m-0 font-weight-bold text-justify">{!! __($detailedProduct->penggunaan) !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-4" style="border-bottom: 1px solid black;">
                <p class="m-0" style="color: black; font-size: 14px;">Apakah kamu pernah mencoba produk ini?</p>
                <p class="m-0" style="color: #6C6D70; font-size: 12px;">Ayo bagi pengalamanmu mencoba produk ini dengan teman phoebe yang lain</p>
                @if(Auth::check())
                <button type="button" onclick="showReviewModal({{$detailedProduct->id}})" class="btn btn-danger btn-round btn-loginregister px-5 mt-3">Tulis Review</button>
                @else
                <a href="#modalLogin" data-target="#modalLogin" type="button" data-toggle="modal" class="btn btn-danger btn-round btn-loginregister px-5 mt-3">Tulis Review</a>
                @endif
            </div>
            <div id="product_review" >
            @include('frontend.partials.review_detail_product',['id' => $detailedProduct->id])

            </div>
            @if(\App\Models\Review::where('product_id',$detailedProduct->id)->count()>4 &&  !isset($type))
            <div class="container p-4 text-center" style="border-bottom: 1px solid #FFAAA5;">
                <button type="button" class="btn btn-danger text-center btn-lihatlebihbanyak py-2 px-5 mb-4" onclick="loadmoreReview()" >LIHAT LEBIH BANYAK</button>
            </div>
            @endif
            
            
            <div class="my-5 text-center container">
                    <div class="row mb-2">
                        <div class="col text-center">
                            <h4 style="font-weight: 700;">Produk Rekomendasi</h4>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center" id="produkrekom">
                        
                    </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript">
        var offset = 4;
        var jml = {{ \App\Models\Review::where('product_id',$detailedProduct->id)->count() }};
        $(document).ready(function() {
    		$('#share').share({
    			networks: ['facebook','twitter','linkedin','tumblr','in1','stumbleupon','digg'],
    			theme: 'square'
    		});
            getVariantPrice();
            rekom();
    	});

        function loadmoreReview()
        {
            $('.btn-lihatlebihbanyak').hide();
            $.post('{{ route('partial.review') }}', {_token:'{{ csrf_token() }}', product_id: {{ $detailedProduct->id }},'offset' : offset }, function(data){
                $('#product_review').append(data);
                offset+=4;
                if( offset <= jml) $('.btn-lihatlebihbanyak').show(300);
                initGlobalRate();

            });
        }

        function CopyToClipboard(containerid) {
            if (document.selection) {
                var range = document.body.createTextRange();
                range.moveToElementText(document.getElementById(containerid));
                range.select().createTextRange();
                document.execCommand("Copy");

            } else if (window.getSelection) {
                var range = document.createRange();
                document.getElementById(containerid).style.display = "block";
                range.selectNode(document.getElementById(containerid));
                window.getSelection().addRange(range);
                document.execCommand("Copy");
                document.getElementById(containerid).style.display = "none";

            }
            showFrontendAlert('success', 'Copied');
        }

        function show_chat_modal(){
            @if (Auth::check())
                $('#chat_modal').modal('show');
            @else
                $('#login_modal').modal('show');
            @endif
        }

        function rekom() {
            $.get("{{route('produk.rekom')}}", function (data) {
                $("#produkrekom").html(data)
            })
        }
        

    </script>
@endsection
