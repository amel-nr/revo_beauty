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
                @php
                    if(Auth::user()->affiliate_user == null || !isset(Auth::user()->affiliate_user))
                    {
                        
                        $affiliate_user                = new \App\AffiliateUser;
                        $affiliate_user->user_id       = Auth::user()->id;
                        $affiliate_user->jenis         = 'user';
                        $affiliate_user->save();

                    }
                    if(Auth::user()->referral_code == null){
                        Auth::user()->referral_code = substr(Auth::user()->id.str_random(10), 0, 10);
                        Auth::user()->save();

                    }
                    $referral_code = Auth::user()->referral_code;
                    $referral_code_url = URL::to('/users/registration')."?referral_code=$referral_code";
                    $referral_singkat = route('referal.register',Auth::user()->referral_code);
                @endphp

                <div class="col-lg-9">
                    <div class="text-center" style="border-bottom: 1px solid #F3795C;">
                        <h1 class="title-address py-2 mb-0 font-weight-bold heading heading-4">AFFILIATE</h1>
                    </div>
                    <img class="d-block w-100 lazyload mt-3" src="{{ asset('frontend/images/placeholder-landscape.jpg') }}" alt="">
                    <div class="container">
                        <div class="mt-3 mb-5 text-center py-4" style="background-color: #FEF6E8; border-radius: 30px;">
                            <h3 class="font-weight-bold" style="color: black;">Halo,</h3>
                            <h3 class="font-weight-bold" style="color: #F3795C;">{{ Auth::user()->name }} {{ Auth::user()->last_name }}</h3>
                        </div>
                        <div class="rounded mb-2" style="border: 1px solid #F3795C;">
                            <p class="mb-0 font-weight-bold heading-4 p-3" style="color: black; border-bottom: 1px solid #F3795C;">AFFILIATE URL</p>
                            <p class="mb-0 heading-4 p-3" style="color: #57585A; word-wrap: break-word;">{{ $referral_code_url }}</p>
                        </div>
                        <div class="rounded" style="border: 1px solid #F3795C;">
                            <p class="mb-0 font-weight-bold heading-4 p-3" style="color: black; border-bottom: 1px solid #F3795C;">Salin tautan di bawah ini untuk digunakan di website mu</p>
                             <textarea id="referral_code_url" class="form-control mb-0 font-weight-bold heading-4 p-3"
                                                              readonly type="text" >{{$referral_code_url}}</textarea>
                        </div>
                        <div class="py-4">
                            <label class="checkbox-container mb-2">
                                <p class="mb-0 heading-4" style="line-height: 20px; vertical-align: middle;">Ringkas URL</p>
                                <input type="checkbox" id="checkbox-ringkas">
                                <span class="checkbox-checkmark"></span>
                            </label>
                        </div>
                        <button class="btn btn-danger btn-pakai heading-4 w-100 mb-5" style="font-weight: 600;" type=button id="ref-cpurl-btn"  data-attrcpy="{{__('Copied')}}"
                                                    onclick="copyToClipboard('url')">SALIN TAUTAN</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script>
        function copyToClipboard(btn){
            // var el_code = document.getElementById('referral_code');
            var el_url = document.getElementById('referral_code_url');
            // var c_b = document.getElementById('ref-cp-btn');
            var c_u_b = document.getElementById('ref-cpurl-btn');

            // if(btn == 'code'){
            //     if(el_code != null && c_b != null){
            //         el_code.select();
            //         document.execCommand('copy');
            //         c_b .innerHTML  = c_b.dataset.attrcpy;
            //     }
            // }

            if(btn == 'url'){
                if(el_url != null && c_u_b != null){
                    el_url.select();
                    document.execCommand('copy');
                    c_u_b .innerHTML  = c_u_b.dataset.attrcpy;
                }
            }
        }
        $(document).ready(function(){
            $('#checkbox-ringkas').change(function() {
                
                var referal_p = "{{ $referral_code_url }}";
                var referal_s = "{{ $referral_singkat }}";
                if(this.checked) {
                   $('#referral_code_url').text(referal_s);
                }else{
                   $('#referral_code_url').text(referal_p);
                }
            });
        });
    </script>
@endsection