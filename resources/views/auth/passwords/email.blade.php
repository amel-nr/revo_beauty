@extends('layouts.blank')

@section('content')

<div class="cls-content-sm panel">
    <div class="panel-body">
        <h1 class="h3" style="color: black; font-weight: 700;">{{ __('Reset Password') }}</h1>
        <p class="pad-btm" style="color: black;">{{__('Masukkan email anda untuk memulihkan password anda.')}} </p>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group">
                @if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated)
                    <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email or Phone">
                @else
                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{ __('Email') }}" name="email" style="padding: 10px; border-color: #F3795C;">
                @endif

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group text-right">
                <button class="btn btn-danger btn-lg btn-block kirim-link-reset" type="submit" style="display: block; margin: 0 auto; background-color: #F3795C; border: none; border-radius: 5px; width: 100%; margin-bottom: 10px;">
                    {{ __('Kirim Link Reset Password') }}
                </button>
            </div>
        </form>
        <div class="pad-top">
            <a href="{{route('home')}}" class="btn-link" style="color: black;"><i class="fa fa-chevron-left" aria-hidden="true" style="padding-right: 10px; color: #F3795C;"></i>{{__('Kembali ke Halaman Utama')}}</a>
        </div>
    </div>
</div>


@endsection
