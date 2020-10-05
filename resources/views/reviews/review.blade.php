@extends('frontend.layouts.app')

@section('content')

    <section class="gry-bg pb-4 profile" style="background-color: #FCF8F0;">
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
                    
                    @if(isset($reviews) && count($reviews) > 0)
                    <div class="text-center" style="border-bottom: 1px solid #F3795C;">
                        <h1 class="py-2 mb-0 font-weight-bold heading heading-4">REVIEW</h1>
                    </div>
                    @foreach ($reviews as $key => $value)
                                        <div class="py-4" style="border-bottom: 1px solid #F3795C">
                        <a href="{{ route('product', $value->product->slug) }}" style="color: black;">
                            <h1 class="mb-0 font-weight-bold h4">{{ $value->product->name }}</h1>
                        </a>
                        <table><tbody>
                            <tr>
                                <td><div class="rating-view" data-value="{{ $value->rating }}">
                            </div></td>
                                <td><span class="badge badge-light ml-2" style="font-size: 90%; background-color: white; vertical-align: super;">Verified by Phoebe</span></td>
                            </tr>
                        </tbody></table>
                        <p class="mb-0" style="font-size: 18px;">
                        {{ $value->comment }}
                        </p>
                       
                        <div class="row" style="margin-top: 5px;">
                            @php
                            $photos =  json_decode($value->photos);
                            @endphp
                            @if(isset($photos) && count($photos) > 0)
                            @foreach ($photos as $key => $photo)
                            <div class="col-md-2 col-4">
                                <img src="{{ asset($photo) }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <div class="row pt-4">
                            <div class="col-md-3 col-6">
                                <p class="mb-0 font-weight-bold" style="font-size: 14px;">Kemasan</p>
                                <p style="font-size: 12px;">Buka produk ini ribet nggak, sih?<span style="visibility: hidden;">dummy text</span></p>
                                <div class="rating-view" data-value="{{ $value->rating_kemasan }}">
                                    
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <p class="mb-0 font-weight-bold" style="font-size: 14px;">Kegunaan</p>
                                <p style="font-size: 12px;">Produk ini bekerja optimal nggak?<span style="visibility: hidden;">dummy text</span></p>
                                <div class="rating-view" data-value="{{ $value->rating_kegunaan }}">
                                    
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <p class="mb-0 font-weight-bold" style="font-size: 14px;">Efektif</p>
                                <p style="font-size: 12px;">Apa kamu dapat hasil yang cocok dengan kulitmu?</p>
                                <div class="rating-view" data-value="{{ $value->rating_efektif }}">
                                    
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <p class="mb-0 font-weight-bold" style="font-size: 14px;">Harga</p>
                                <p style="font-size: 12px;">Sesuai dengan kualitasnya, harga produk ini...</p>
                                <div class="rating-view" data-value="{{ $value->rating_harga }}">
                                    
                                </div>
                            </div>
                        </div>
                    </div>    
                    @endforeach

                    @else
                    <div class="py-5 text-center">
                        <p class="mb-0" style="font-size: 16px;">UPS!</p>
                        <p class="mb-0" style="font-size: 16px;">Beauties, kamu belum menulis review produk ini.</p>
                        <p style="font-size: 16px;">Yuk, bagikan pengalamanmu menggunakan produk ini untuk pengguna yang lain.</p>
                        <a href="{{ url('/') }}" type="button" class="btn btn-danger text-center btn-pakai py-2 px-5 mt-3" style="font-size: 16px; font-weight: 600;">BELANJA SEKARANG</a>
                    </div>
                    @endif
                

                <div class="pagination-wrapper py-4">
                    <ul class="pagination justify-content-end">
                        {{ $reviews->links() }}
                    </ul>
                </div>
                </div>
                
            </div>
        </div>
    </section>

@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function(){
    $('.rating-view').each(function(i, item) {
        $(item).jsRapStar({
            star:"♥",
            starHeight:30,
            length:5,
            step:true,
            value:$(item).data('value'),
            enabled:false,
            colorFront:'#F3795C',
            colorBack:'#FBD2CD',
        });
    });
});
</script>

@endsection
