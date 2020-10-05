@extends('layouts.login')

@section('content')

@php
    $generalsetting = \App\GeneralSetting::first();
@endphp

<div class="flex-row">
    <div class="flex-col-xl-6 blank-index d-flex align-items-center justify-content-center"
    @if ($generalsetting->admin_login_sidebar != null)
        style="background-image:url('{{ asset($generalsetting->admin_login_sidebar) }}');"
    @else
        style="background-image:url('{{ asset('img/bg-img/login-box.jpg') }}');"
    @endif>

    </div>
    <div class="flex-col-xl-6">
        <div class="pad-all">
        <div class="text-center">
            <br>
			{{--@if($generalsetting->logo != null)
                <img loading="lazy"  src="{{ asset($generalsetting->logo) }}" class="" height="44">
            @else
                <img loading="lazy"  src="{{ asset('frontend/images/logo/logo.png') }}" class="" height="44">
            @endif--}}

            <br>
            <br>
            <br>

        </div>
            <form class="pad-hor" method="POST" role="form" id="from-login-admin" action="{{ route('login.admin') }}">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="_valid" value="{{ encrypt('admin') }}">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="checkbox pad-btm text-left">
                            <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="demo-form-checkbox">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    @if(env('MAIL_USERNAME') != null && env('MAIL_PASSWORD') != null)
                        <div class="col-sm-6">
                            <div class="checkbox pad-btm text-right">
                                <a href="{{ route('password.request') }}" class="btn-link">{{__('Forgot password')}} ?</a>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="row" id="example3"></div>
                <br/>
                <button type="button" class="btn btn-primary btn-lg btn-block" id="btn-submit-login-admin" onclick="submitLogin()" disabled>
                    {{ __('Login') }}
                </button>
            </form>
        </div>
    </div>
</div>


@endsection

@section('script')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script type="text/javascript">
       
        var verify = false;
        var verifyCallback = function(response) {
            // alert(response);
           
            console.log(response);
            $.post('{{ route('verify_captcha') }}', { _token:'{{ csrf_token() }}', respone:response }, function(data){
               var response = JSON.parse(data);
               verify = response.success;
               if(response.success)
               $('#btn-submit-login-admin').attr('disabled',false);
            });


        };

        var expCallback = function() {
            grecaptcha.reset();
            verify = false;
            $('#btn-submit-login-admin').attr('disabled',true);
        };

        var onloadCallback = function() {
            grecaptcha.render('example3', {
              'sitekey' : '{{ env("CAPTCHA_SITE_KEY") }}',
              'callback' : verifyCallback,
              'expired-callback': expCallback,
              'theme' : 'light'
            });
        };

        function submitLogin(){
            if(verify)
            {
                document.getElementById("from-login-admin").submit();
            }else{
               grecaptcha.reset();
               verify = false;
               $('#btn-submit-login-admin').attr('disabled',true);
            }
        }

    </script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
    </script>
@endsection
