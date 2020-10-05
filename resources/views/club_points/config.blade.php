@extends('layouts.app')

@section('content')
@php
    $club_point_convert_rate = \App\BusinessSetting::where('type', 'club_point_convert_rate')->first();
    $club_point_user_affiliate = \App\BusinessSetting::where('type', 'club_point_user_affiliate')->first();
    $club_point_user_registration = \App\BusinessSetting::where('type', 'club_point_user_registration')->first();
    $club_point_user_profile = \App\BusinessSetting::where('type', 'club_point_user_profile')->first();
    $club_point_user_review = \App\BusinessSetting::where('type', 'club_point_user_review')->first();
    $club_point_user_purchase = \App\BusinessSetting::where('type', 'club_point_user_purchase')->first();
    $club_point_user_mobile = \App\BusinessSetting::where('type', 'club_point_user_mobile')->first();


    if($club_point_user_affiliate == null )
    {
        $club_point_user_affiliate = new  \App\BusinessSetting();
        $club_point_user_affiliate->type = 'club_point_user_affiliate';
        $club_point_user_affiliate->value = 0;
        $club_point_user_affiliate->save();
    }

@endphp
    <div class="row">
        <div class="col-lg-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">{{__('Poin Pengguna Baru Daftar')}}</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{ route('club_point_user_affiliate') }}" method="POST">
                        @csrf
                        <input type="hidden" name="type" value="club_point_user_registration">
                        <div class="form-group">
                            <div class="col-lg-4">
                                <label class="control-label">{{__('Tetapkan Poin') }}</label>
                            </div>
                            <div class="col-lg-5">
                                <input type="number" min="0" step="0.01" class="form-control" name="value" @if ($club_point_user_registration != null) value="{{ $club_point_user_registration->value }}" @endif placeholder="100" required>
                            </div>
                            <div class="col-lg-3">
                                <label class="control-label">{{__('Poin')}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12 text-right">
                                <button class="btn btn-purple" type="submit">{{__('Simpan')}}</button>
                            </div>
                        </div>
                    </form>
                  
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">{{__('Poin Affiliate User to User')}}</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{ route('club_point_user_affiliate') }}" method="POST">
                        @csrf
                        <input type="hidden" name="type" value="club_point_user_affiliate">
                        <div class="form-group">
                            <div class="col-lg-4">
                                <label class="control-label">{{__('Tetapkan Poin')}}</label>
                            </div>
                            <div class="col-lg-5">
                                <input type="number" min="0" step="0.01" class="form-control" name="value" @if ($club_point_user_affiliate != null) value="{{ $club_point_user_affiliate->value }}" @endif placeholder="100" required>
                            </div>
                            <div class="col-lg-3">
                                <label class="control-label">{{__('Poin')}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12 text-right">
                                <button class="btn btn-purple" type="submit">{{__('Simpan')}}</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">{{__('Profil Pengguna Lengkap')}}</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{ route('club_point_user_affiliate') }}" method="POST">
                        @csrf
                        <input type="hidden" name="type" value="club_point_user_profile">
                        <div class="form-group">
                            <div class="col-lg-4">
                                <label class="control-label">{{__('Tetapkan Poin') }}</label>
                            </div>
                            <div class="col-lg-5">
                                <input type="number" min="0" step="0.01" class="form-control" name="value" @if ($club_point_user_profile != null) value="{{ $club_point_user_profile->value }}" @endif placeholder="100" required>
                            </div>
                            <div class="col-lg-3">
                                <label class="control-label">{{__('Poin')}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12 text-right">
                                <button class="btn btn-purple" type="submit">{{__('Simpan')}}</button>
                            </div>
                        </div>
                    </form>
                  
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">{{__('Poin Unduh Aplikasi Mobile')}}</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{ route('club_point_user_affiliate') }}" method="POST">
                        @csrf
                        <input type="hidden" name="type" value="club_point_user_mobile">
                        <div class="form-group">
                            <div class="col-lg-4">
                                <label class="control-label">{{__('Tetapkan Poin')}}</label>
                            </div>
                            <div class="col-lg-5">
                                <input type="number" min="0" step="0.01" class="form-control" name="value" @if ($club_point_user_mobile != null) value="{{ $club_point_user_mobile->value }}" @endif placeholder="100" required>
                            </div>
                            <div class="col-lg-3">
                                <label class="control-label">{{__('Poin')}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12 text-right">
                                <button class="btn btn-purple" type="submit">{{__('Simpan')}}</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">{{__('Poin Ulasan Produk Pengguna')}}</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{ route('club_point_user_review') }}" method="POST">
                        @csrf
                        <input type="hidden" name="type" value="club_point_user_review">
                        <div class="form-group">
                            <div class="col-lg-4">
                                <label class="control-label">{{__('Tetapkan Poin')}}</label>
                            </div>
                            <div class="col-lg-5">
                                <input type="number" min="0" step="0.01" class="form-control" name="value" @if ($club_point_user_review != null) value="{{  json_decode($club_point_user_review->value)->value }}" @endif placeholder="100" required>
                            </div>
                            <div class="col-lg-3">
                                <label class="control-label">{{__('Poin')}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-4">
                                <label class="control-label">{{__('Tetapkan batasan ulasan') }}</label>
                            </div>
                            <div class="col-lg-5">
                                <input type="number" min="0"  class="form-control" name="jml_max" @if ($club_point_user_review != null) value="{{ json_decode($club_point_user_review->value)->jml_max }}" @endif placeholder="100" required>
                            </div>
                            <div class="col-lg-3">
                                <label class="control-label">{{__('/hari')}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12 text-right">
                                <button class="btn btn-purple" type="submit">{{__('Simpan')}}</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
        {{--<div class="col-lg-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">{{__('Minimal Belanja')}}</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{ route('club_point_user_affiliate') }}" method="POST">
                        @csrf
                        <input type="hidden" name="type" value="club_point_user_purchase">
                        <div class="form-group">
                            <div class="col-lg-4">
                                <label class="control-label">{{__('Tetapkan Nominal') }}</label>
                            </div>
                            <div class="col-lg-5">
                                <input type="number" min="0" step="0.01" class="form-control" name="value" @if ($club_point_user_purchase != null) value="{{ $club_point_user_purchase->value }}" @endif placeholder="25000" required>
                            </div>
                            <div class="col-lg-3">
                                <label class="control-label">{{__('IDR')}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-4">
                                <label class="control-label">{{__('Tetapkan Poin') }}</label>
                            </div>
                            <div class="col-lg-5">
                                <input type="number" min="0" step="0.01" class="form-control" name="value" @if ($club_point_user_purchase != null) value="{{ $club_point_user_purchase->value }}" @endif placeholder="100" required>
                            </div>
                            <div class="col-lg-3">
                                <label class="control-label">{{__('Poin')}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12 text-right">
                                <button class="btn btn-purple" type="submit">{{__('Simpan')}}</button>
                            </div>
                        </div>
                    </form>
                  
                </div>
            </div>
        </div>--}}
        
    </div>



@endsection
