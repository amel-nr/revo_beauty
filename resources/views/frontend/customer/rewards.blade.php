@extends('frontend.layouts.app')

@section('style')
    <style>
        .member{
            font-family: rage-italic, "Open Sans", sans-serif !important;
            font-size: 152px;
            color: white;
            }
    </style>
@endsection

@section('content')

    <section class="gry-bg pb-4 profile" style="background-color: #FCF8F0;">
        <h1 class="font-weight-bold h3 mb-5 py-5 text-center" style="background-color: #F3795C; color: white;">PHOEBE’S SQUAD</h1>
        @include('frontend.inc.account_mobile_menu')
        <div class="container" id="predeem">
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
                        <h1 class="title-address py-2 mb-0 font-weight-bold heading heading-4">REWARDS</h1>
                    </div>
                            @php
                                $u_log_mmbr = \App\Membership_user_log::where('user_id',Auth::user()->id)->with('membership')->orderBy('created_at','desc')->first();
                                //dd($u_log_mmbr);
                                $tier_name = $u_log_mmbr->membership->title;
                                //dd($u_log_mmbr);
                            @endphp
                    <div class="row pt-4">
                        <div class="col-md-5 col-12">
                            <div class="mt-3 py-4 text-center" style="background-color: #f3795c; height: 140px;">
                                <p class="mt-3 member" style="font-size: 50px; text-transform: capitalize;">{{$tier_name}}</p>
                                <p class="mb-2 mx-4" style="color: white; font-size: 17px; text-transform:uppercase;">skin</p>
                                <p class="mb-0 mt-2 text-center" style="color: white; font-weight: 600; font-size: 16px;">{{Auth::user()->point}} POINTS</p>
                            </div>

                            <div class="py-3" style="background-color: white;">
                                <div class="row mx-2">
                                    <div class="col-4">
                                        <p class="text-center mb-0" style="font-weight: 600; font-size: 10px; color: black; line-height: 12px;">{{Auth::user()->name.' '.Auth::user()->last_name}}</p>
                                    </div>
                                    <div class="col-4">
                                        <p class="text-center mb-0" style="font-weight: 600; font-size: 10px; color: black; line-height: 12px;">Berlaku hingga</p> 
                                        <p class="text-center mb-0" style="font-weight: 600; font-size: 10px; color: black; line-height: 12px;">21 Mei 2021</p>
                                    </div>
                                    <div class="col-4">
                                        <a href="#"><p class="text-center mb-0" style="font-weight: 600; font-size: 10px; color: black; line-height: 12px;"><u>Riwayat Poin</u></p></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-12">
                            <div class="mt-3 py-5" style="background-color: #f3795c; height: 140px;">
                                <p class="mx-4" style="color: white; font-weight: bold; font-size: 30px;">AMBIL</p>
                                <p class="mb-0 mx-4" style="color: white; font-weight: bold; font-size: 30px;">HADIAHMU!</p>
                            </div>
                            <div class="text-center py-3" style="background-color: white;">
                                <p class="text-center mb-0" style="font-weight: 600; font-size: 12px; color: black; line-height: 24px;">Tukarkan poin yang sudah dikumpulkan dan pilih hadiah yang kamu suka.</p>
                            </div>
                        </div>
                    </div>
                    @php
                        $point = App\Models\ProductPoint::with(['product','product.brand']);
                    @endphp
                    <div class="row">
                        <div class="col-6 mx-auto">
                            <h1 class="text-center h4 pt-4" style="font-weight: bold;">100-250 <br> POINTS</h1>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-9 mx-auto">
                        <div class="row">
                    @foreach($point->whereBetween('jml_point',[100,250])->orderby('jml_point')->get() as $key => $pt)
                                <div class="col-4 text-center">
                                    <div class="d-inline-block text-center my-auto">
                                        <img src="{{ asset(json_decode($pt->product->photos)[0]) }}" alt="" style="height: 160px;">
                                        <p class="text-center pt-2" style="font-size: 15px;"><b> {{$pt->product->brand->name}} </b><br><b> {{$pt->product->name}}</b> <br> {{$pt->jml_point}} Poins</p>
                                    </div>
                                    <div class="pt-0">
                                        <a name="" id="redeem" class="btn btn-danger btn-keluar rounded" data-pt="{{isset($pt->jml_point) ? $pt->jml_point : o }}" data-id="({{$pt->id}})" href="#" role="button" style="background-color: #f3795c;border-color: #f3795c; font-size: 16px; font-weight: 600; width: 85%;">TUKAR</a>
                                    </div>
                                </div>
                    @endforeach
                                <!-- <div class="col-4 text-center">
                                    <div class="d-inline-block text-center my-auto">
                                        <img src="{{ asset('frontend/images/placeholder.jpg') }}" alt="" style="height: 160px;">
                                        <p class="text-center pt-2" style="font-size: 15px;"><b> Ponny Beaute </b><br><b> Pouch</b> <br> 100 Poins</p>
                                    </div>
                                    <div class="pt-0">
                                        <a name="" id="" class="btn btn-danger btn-keluar rounded" href="#" role="button" style="background-color: #f3795c;border-color: #f3795c; font-size: 16px; font-weight: 600; width: 85%;">TUKAR</a>
                                    </div>
                                </div>
                                <div class="col-4 text-center">
                                    <div class="d-inline-block text-center my-auto">
                                        <img src="{{ asset('frontend/images/placeholder.jpg') }}" alt="" style="height: 160px;">
                                        <p class="text-center pt-2" style="font-size: 15px;"><b> Ponny Beaute </b><br><b> Pouch</b> <br> 100 Poins</p>
                                    </div>
                                    <div class="pt-0">
                                        <a name="" id="" class="btn btn-danger btn-keluar rounded" href="#" role="button" style="background-color: #f3795c;border-color: #f3795c; font-size: 16px; font-weight: 600; width: 85%;">TUKAR</a>
                                    </div>
                                </div> -->
                        </div>
                        </div>
                    </div>
                    <div class="text-center pt-4" style="border-bottom: 1px solid #f3795c;"></div>
                    <div class="row">
                        <div class="col-6 mx-auto">
                            <h1 class="text-center h4 pt-4" style="font-weight: bold;">200-500 <br> POINTS</h1>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-9 mx-auto">
                            <div class="row">
                            @php
                        $point = App\Models\ProductPoint::with(['product','product.brand']);
                    @endphp
                            @foreach($point->whereBetween('jml_point',[250,500])->orderby('jml_point')->get() as $key => $pt)
                                <div class="col-4 text-center">
                                    <div class="d-inline-block text-center my-auto">
                                        <img src="{{ asset(json_decode($pt->product->photos)[0]) }}" alt="" style="height: 160px;">
                                        <p class="text-center pt-2" style="font-size: 15px;"><b> {{$pt->product->brand->name}} </b><br><b> {{$pt->product->name}}</b> <br> {{$pt->jml_point}} Poins</p>
                                    </div>
                                    <div class="pt-0">
                                        <a name="" id="redeem" data-id="({{$pt->id}})" data-pt="{{isset($pt->jml_point) ? $pt->jml_point : o }}" class="btn btn-danger btn-keluar rounded" href="#" role="button" style="background-color: #f3795c;border-color: #f3795c; font-size: 16px; font-weight: 600; width: 85%;">TUKAR</a>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="text-center pt-4" style="border-bottom: 1px solid #f3795c;"></div>
                    
                    <div class="text-center pb-4"></div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script>

        $(document).ready(function () {
            $("#predeem").on("click","#redeem", function (e) {
                e.preventDefault()
                // alert("oke")
                // return;
                let id = $(this).data("id")
                let pt = $(this).data("pt")

                if(pt < {{Auth::user()->point}}){
                    $.post('{{ route('cart.redeemPoint') }}', {_token:'{{ csrf_token() }}',product_id:id}, function(data){
                        if (data == "sukses") {
                            location.reload()
                        }else{
                            showFrontendAlert("error",data)
                        }
                    });
                }else{
                    showFrontendAlert("error","poin tidak mencukupi")
                }
            })
        })
    </script>
@endsection