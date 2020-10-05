@extends('layouts.blank')

@section('content')
    <div class="cls-content-sm panel">
        <div class="panel-body">
            <h1 class="h3" style="color: black; font-weight: 700;">{{ __('Reset Password') }}</h1>
            <p>{{__('Masukkan alamat email anda, password baru dan ulangi password.')}} </p>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" placeholder="Email" required autofocus style="padding: 10px; border-color: #F3795C;">

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password Baru" required style="padding: 10px; border-color: #F3795C;">

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Ulangi Password" required style="padding: 10px; border-color: #F3795C;">
                </div>

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-danger btn-lg btn-block" style="display: block; margin: 0 auto; background-color: #F3795C; border: none; padding: 10px 40px; border-radius: 5px; width: 100%; font-size: 18px; margin-bottom: 10px;">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
