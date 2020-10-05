@extends('frontend.layouts.app')

@section('content')

<section class="gry-bg pb-4 profile wsh" style="background-color: #FCF8F0;">
    <h1 class="font-weight-bold h3 mb-5 py-5 text-center" style="background-color: #F3795C; color: white;">PHOEBE’S SQUAD</h1>
    @include('frontend.inc.account_mobile_menu')
    <div class="container">
        <div class="row cols-xs-space cols-sm-space cols-md-space">
            <div class="col-lg-3 d-none d-lg-block">
                @if(Auth::user()->user_type == 'seller')
                @include('frontend.inc.seller_side_nav')
                @elseif(Auth::user()->user_type == 'customer')
                @include('frontend.inc.customer_side_nav')
                @endif
            </div>

            <div class="col-lg-9">
                <div class="text-center" style="border-bottom: 1px solid #F3795C;">
                    <h1 class="title-account py-2 mb-0 font-weight-bold heading heading-4">DAFTAR KEINGINAN</h1>
                </div>
                @if(isset($wishlists) && count($wishlists) > 0)
                <div class="row py-3">
                    <div class="col-md-6 col-12">
                        <div class="row">
                            <div class="col-4 pr-0" style="border-right: 1px solid #F3795C;">
                                <label class="checkbox-container mb-0">
                                    <p class="mb-0" style="line-height: 20px; vertical-align: middle;">Pilih Semua</p>
                                    <input type="checkbox" id="pilih-semua">
                                    <span class="checkbox-checkmark"></span>
                                </label>
                            </div>
                            <div class="col-5 p-0">
                                <a href="#" class="btn-all" id="add-all">
                                    <img src="{{asset('img/cart.png')}}" class="ml-3 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 20px;">
                                    <p class="mb-0 d-inline ml-1 text-dark" style="line-height: 20px; vertical-align: middle;">Pindahkan Ke Tas</p>
                                </a>
                            </div>
                            <div class="col-3 pl-0">
                                <a href="#" class="btn-all" id="delete-all">
                                    <i class="fa fa-trash-o" aria-hidden="true" style="font-size: 20px; vertical-align: middle; line-height: 20px; color: #F3795C;"></i>
                                    <p class="mb-0 d-inline ml-1 text-dark" style="line-height: 20px; vertical-align: middle;">Hapus</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($wishlists as $key => $wishlist)
                @if ($wishlist->product != null)
                @php
                $brand = \App\Brand::find($wishlist->product->brand_id);
                @endphp
                <div class="row py-4" style="border-bottom: 1px solid #F3795C;">
                    <div class="col-1 my-auto">
                        <label class="checkbox-container mb-0">
                            <input type="checkbox" class="items-cheked" data-pid="{{$wishlist->product->id}}" id="items-cheked{{$wishlist->id}}" name="checked" data-id="{{$wishlist->id}}" data-variant="{{$wishlist->product->choice_options}}">
                            <span class="checkbox-checkmark"></span>
                        </label>
                    </div>
                    <div class="col-md-3 col-5">
                        <div>
                            <a href="{{ route('product', $wishlist->product->slug) }}">
                                <img src="{{ isset($wishlist->product->thumbnail_img) ? asset($wishlist->product->thumbnail_img) : asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                            </a>

                            <i class="fa fa-heart" style="color: #F3795C; font-size: 16px; position: absolute; top: 10px; right: 25px;" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="col-md-4 col-6 my-auto wished">
                        @if(isset($brand))
                        <p class="font-weight-bold mb-0" style="font-size: 16px;">{{ $brand->name }}</p>
                        @endif
                        <p class="mb-0" style="font-size: 12px; line-height: 14px;">{{ $wishlist->product->name }}</p>
                        <p class="mb-0 font-weight-bold" style="font-size: 14px;">{{ home_discounted_base_price($wishlist->product->id) }}</p>
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
                    <div class="col-md-3 col-8 offset-md-0 offset-2 py-3 my-auto">
                        <button type="button" class="btn btn-danger text-center btn-lihatlebihbanyak py-2 width-100" onclick="showAddToCartModal({{ $wishlist->product->id }})">
                            <p class="mb-0 text-center" style="font-weight: 600;">MASUKKAN KERANJANG</p>
                        </button>
                    </div>
                    <div class="col-1 py-3 my-auto">
                        <a href="#" onclick="removeFromWishlist({{ $wishlist->id }})"><i class="fa fa-trash-o" style="color: #F3795C; font-size: 30px;" aria-hidden="true"></i></a>
                    </div>
                </div>

                @endif
                @endforeach
                @else
                <div class="py-5 text-center">
                    <p class="mb-0" style="font-size: 16px;">Ini adalah tempat menyimpan produk kesukaanmu biar nggak salah beli.</p>
                    <p style="font-size: 16px;">Tunjukin Wishlist ini ke sahabat dan keluarga terdekat! Siapa tau mereka mau beliin...</p>
                    <p style="font-size: 16px;">Wishlist-mu masih kosong, nih. Yuk, lihat-lihat produk menarik di Ponny Beaute!</p>
                    <a href="{{ url('/') }}" type="button" class="btn btn-danger text-center btn-pakai py-2 px-5 mt-3" style="font-size: 16px; font-weight: 600;">LANJUT BELANJA</a>
                </div>
                @endif

                {{--<div class="main-content">
                        <!-- Page title -->
                        <div class="page-title">
                            <div class="row align-items-center">
                                <div class="col-md-6 col-12">
                                    <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                        {{__('Wishlist')}}
                </h2>
            </div>
            <div class="col-md-6 col-12">
                <div class="float-md-right">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home') }}">{{__('Home')}}</a></li>
                        <li><a href="{{ route('dashboard') }}">{{__('Dashboard')}}</a></li>
                        <li class="active"><a href="{{ route('wishlists.index') }}">{{__('Wishlist')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Wishlist items -->

    <div class="row shop-default-wrapper shop-cards-wrapper shop-tech-wrapper mt-4">
        @foreach ($wishlists as $key => $wishlist)
        @if ($wishlist->product != null)
        <div class="col-xl-4 col-6" id="wishlist_{{ $wishlist->id }}">
            <div class="card card-product mb-3 product-card-2">
                <div class="card-body p-3">
                    <div class="card-image">
                        <a href="{{ route('product', $wishlist->product->slug) }}" class="d-block" style="background-image:url('{{ asset($wishlist->product->thumbnail_img) }}');">
                        </a>
                    </div>

                    <h2 class="heading heading-6 strong-600 mt-2 text-truncate-2">
                        <a href="{{ route('product', $wishlist->product->slug) }}">{{ $wishlist->product->name }}</a>
                    </h2>
                    <div class="star-rating star-rating-sm mb-1">
                        {{ renderStarRating($wishlist->product->rating) }}
                    </div>
                    <div class="mt-2">
                        <div class="price-box">
                            @if(home_base_price($wishlist->product->id) != home_discounted_base_price($wishlist->product->id))
                            <del class="old-product-price strong-400">{{ home_base_price($wishlist->product->id) }}</del>
                            @endif
                            <span class="product-price strong-600">{{ home_discounted_base_price($wishlist->product->id) }}</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer p-3">
                    <div class="product-buttons">
                        <div class="row align-items-center">
                            <div class="col-2">
                                <a href="#" class="link link--style-3" data-toggle="tooltip" data-placement="top" title="Remove from wishlist" onclick="removeFromWishlist({{ $wishlist->id }})">
                                    <i class="la la-close"></i>
                                </a>
                            </div>
                            <div class="col-10">
                                <button type="button" class="btn btn-block btn-base-1 btn-circle btn-icon-left" onclick="showAddToCartModal({{ $wishlist->product->id }})">
                                    <i class="la la-shopping-cart mr-2"></i>{{__('Add to cart')}}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>

    <div class="pagination-wrapper py-4">
        <ul class="pagination justify-content-end">
            {{ $wishlists->links() }}
        </ul>
    </div>


    </div>--}}
    <div class="pagination-wrapper py-4">
        <ul class="pagination justify-content-end">
            {{ $wishlists->links() }}
        </ul>
    </div>
    </div>
    </div>
    </div>
</section>

<div class="modal fade" id="addToCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
        <div class="modal-content position-relative">
            <div class="c-preloader">
                <i class="fa fa-spin fa-spinner"></i>
            </div>
            <button type="button" class="close absolute-close-btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div id="addToCart-modal-body">

            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $(".video-siaran").hide()

        $('#pilih-semua').change(function() {
            if (this.checked) {
                $('.items-cheked').each(function(i, item) {
                    $(item).prop('checked', true);
                });
            } else {
                $('.items-cheked').each(function(i, item) {
                    $(item).prop('checked', false);
                });
            }
        });

        $(".items-cheked").change(function () {
            this.checked ? '': $("#pilih-semua").prop('checked',false)
        })


        $(".btn-all").on('click', function(e) {
            e.stopPropagation()
            e.preventDefault();
            let idBtn = $(this).attr('id')
            let wished = $('.wished').length;
            var allVals = [];
            $(".items-cheked:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });

            if (allVals.length < 1) {
                alert("pilih minimal 1 produk");
            } else {
                let check = '';
                if (allVals.length == wished) {
                    if (idBtn == "add-all") {
                        check = confirm('pindahkan semua ke keranjang?');
                    }else{
                        check = confirm('Semua wishlist akan terhapus');
                    }
                } else {
                    if (idBtn == "add-all") {
                        check = confirm('Pindahkan ke keranjang produk berikut?');
                    }else{
                        check = confirm('Hapus produk ini?');
                    }
                }
                if (check) {
                    if (idBtn == "add-all") {
                        addTobagAll(allVals)
                    }else{
                        destroyFromWishlist(allVals)
                    }
                }
            }
        })
    });


    function removeFromWishlist(id) {
        $.post(`{{ route('wishlists.remove') }}`, {
                _token: '{{ csrf_token() }}',
                id: id
            },
            function(data) {
                location.reload()
            })
    }
    function destroyFromWishlist(id) {
        $.post(`{{ route('wishlists.destroy') }}`, {
                _token: '{{ csrf_token() }}',
                id: id
            },
            function(data) {
                location.reload()
            })
    }



 function addTobagAll(id) {
            //  id.forEach(function(el,i) {
            //     let variants = $('#items-cheked'+el).data("variant")
            //     let pid = $('#items-cheked'+el).data("pid")
            //     let vw = "vw"
            //     addToBag(pid, vw)
            // });
            // $('.c-preloader').hide();
            $.get("{{route('cart.addToCartAll')}}", fun)
}

</script>
@endsection