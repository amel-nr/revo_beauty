@extends('frontend.layouts.app')

@section('content')
    <section class="gry-bg py-4">
        <div class="profile">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8 mx-auto">
                        <div class="card" style="background-color: #FCF8F0;">
                            <div class="container" style="padding: 50px;">
                            <fieldset>
                    <h1 style="font-size: 18px; font-weight: 700; color: #F3795C;">PHOEBE'S SQUAD</h1>
                    <p style="margin-bottom: 0;">Gabung bersama Phoebe's Squad untuk kumpulkan poin, hadiah, dan keuntungan dari Happy Skin Reward!</p>
                    <form class="form-default" role="form" action="{{ route('otp.register') }}" method="POST">
                    <input type="hidden" name="uid" value="{{ $user->id }}">
                    <input type="hidden" name="email" value="{{ $user->user['email'] }}">
                    @csrf
                    <div class="row" style="margin-top: 20px;">
                        <div class="col">
                            <div class="form-group">
                                <input type="text"
                                    class="form-control" name="name" id="" aria-describedby="helpId" placeholder="Nama Depan" style="padding: 10px; border-color: #F3795C;" value="{{ isset($user->user['given_name']) ? $user->user['given_name'] : $user->name }}" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input type="text"
                                    class="form-control" name="last_name" id="" aria-describedby="helpId" placeholder="Nama Belakang" style="padding: 10px; border-color: #F3795C;" value="{{ isset($user->user['family_name']) ? $user->user['family_name'] : ''}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="background-color: white; color: #939598; border-color: #F3795C;">+62</span>
                        </div>
                        <input type="text"
                            class="form-control" name="phone"  aria-describedby="helpId" placeholder="Nomor Handphone" id="phone_num" style="padding: 10px; border-color: #F3795C;"  value="" required>
                    </div>
                    <p style="font-weight: 700; font-size: 10px;"><i class="fa fa-birthday-cake" style="margin-right: 5px;"></i>Isi tanggal lahir kamu dan dapatkan bonus menarik setiap tahun</p>
                     <input id="datepicker1" width="276" name="tgl_lahir" placeholder="Tanggal Lahir" style="border-color: #F3795C;background:#fff;" readonly="readonly" required/>
                    <p style="font-weight: 700; font-size: 12px; margin-top: 15px; margin-bottom: 0;">Gender</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="P" required>
                        <label class="form-check-label" for="inlineRadio1">Perempuan</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="L" required>
                        <label class="form-check-label" for="inlineRadio2">Laki-laki</label>
                    </div>
                    <p style="font-weight: 700; font-size: 12px; margin-top: 15px; margin-bottom: 0;">Jenis Kulit</p>
                    <div class="row">
                        <div class="col">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kulit" id="skinRadio1" value="1" required>
                                <label class="form-check-label" for="skinRadio1">Kulit Berminyak</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kulit" id="skinRadio2" value="2" required>
                                <label class="form-check-label" for="skinRadio2">Kulit Kombinasi</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kulit" id="skinRadio3" value="3" required>
                                <label class="form-check-label" for="skinRadio3">Kulit Normal</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kulit" id="skinRadio4" value="4" required>
                                <label class="form-check-label" for="skinRadio4">Kulit Kering</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kulit" id="skinRadio5" value="5" required>
                                <label class="form-check-label" for="skinRadio5">Kulit Sensitif</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="display: block; margin: 0 auto; background-color: #F3795C; border: none; padding: 10px 40px; border-radius: 5px; width: 100%; font-size: 18px; margin-bottom: 10px; margin-top: 20px;">DAFTAR</button>
                    </form>
                    {{--@if(\App\BusinessSetting::where('type', 'google_login')->first()->value == 1 || \App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1 || \App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1)
                                        <div class="or or--1 mt-3 text-center">
                                            <span>or</span>
                                        </div>
                                        <div>
                                        @if (\App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1)
                                            <a href="{{ route('social.login', ['provider' => 'facebook']) }}" class="btn btn-styled btn-block btn-facebook btn-icon--2 btn-icon-left px-4 mb-3">
                                                <i class="icon fa fa-facebook"></i> {{__('Register with Facebook')}}
                                            </a>
                                        @endif
                                        @if(\App\BusinessSetting::where('type', 'google_login')->first()->value == 1)
                                            <a href="{{ route('social.login', ['provider' => 'google']) }}" class="btn btn-styled btn-block btn-google btn-icon--2 btn-icon-left px-4 mb-3">
                                                <i class="icon fa fa-google"></i> {{__('Register with Google')}}
                                            </a>
                                        @endif
                                        @if (\App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1)
                                            <a href="{{ route('social.login', ['provider' => 'twitter']) }}" class="btn btn-styled btn-block btn-twitter btn-icon--2 btn-icon-left px-4 mb-3">
                                                <i class="icon fa fa-twitter"></i> {{__('Register with Twitter')}}
                                            </a>
                                        @endif
                                        </div>
                                    @endif--}}
                                    {{--<a href="#" class="btn btn-styled btn-block btn-phone btn-icon--2 btn-icon-left px-4" style="margin-bottom: 20px;">
                                        <i class="icon fa fa-phone"></i> {{__('Register with Phone Number')}}
                                    </a>--}}
                    <p style="text-align: center; font-size: 10px; width: 70%; margin: 0 auto; color: #BCBDC0;">Dengan melakukan pendaftaran kamu telah menyetujui <a href="#" style="color: #1074BC;">Kebijakan Privasi</a> dan <a href="" style="color: #1074BC;">Syarat & Ketentuan</a></p>
                </fieldset>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')

    <script type="text/javascript">

        var isPhoneShown = true;

        var input = document.querySelector("#phone-code");
        var iti = intlTelInput(input, {
            separateDialCode: true,
            preferredCountries: []
        });

        var countryCode = iti.getSelectedCountryData();


        input.addEventListener("countrychange", function() {
            var country = iti.getSelectedCountryData();
            $('input[name=country_code]').val(country.dialCode);
        });

        $(document).ready(function(){
            $('.email-form-group').hide();
        });

        function autoFillSeller(){
            $('#email').val('seller@example.com');
            $('#password').val('123456');
        }
        function autoFillCustomer(){
            $('#email').val('customer@example.com');
            $('#password').val('123456');
        }

        function toggleEmailPhone(el){
            if(isPhoneShown){
                $('.phone-form-group').hide();
                $('.email-form-group').show();
                isPhoneShown = false;
                $(el).html('Use Phone Instead');
            }
            else{
                $('.phone-form-group').show();
                $('.email-form-group').hide();
                isPhoneShown = true;
                $(el).html('Use Email Instead');
            }
        }
    </script>
@endsection
