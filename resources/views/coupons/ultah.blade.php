@extends('layouts.app')

@section('content')
@php
    $coupon_ultah = \App\BusinessSetting::where('type', 'coupon_ultah')->first();
    $coupon = null;

    if(isset($coupon_ultah))
    {
        $coupon =  json_decode($coupon_ultah->value);
    }
@endphp
    <div class="row">
        <div class="col-lg-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">{{__('Kupon Ulang Tahun')}}</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{ route('coupon.ultah_store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                           <label class="col-lg-3 control-label">{{__('Diskon')}}</label>
                           <div class="col-lg-7">
                              <input type="number" min="0" step="0.01" placeholder="{{__('Discount')}}" name="discount" class="form-control" value="{{ isset($coupon) ? $coupon->discount : '' }}" required>
                           </div>
                           <div class="col-lg-2">
                              <select class="demo-select2" name="discount_type">
                                @if(isset($coupon))
                                <option value="amount" @if ($coupon->discount_type == 'amount') selected  @endif >Rp</option>
                                <option value="percent" @if ($coupon->discount_type == 'percent') selected  @endif>%</option>
                                @else
                                 <option value="amount">Rp</option>
                                <option value="percent">%</option>
                                @endif
                              </select>
                           </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-3 control-label">{{__('Minimal Belanja')}}</label>
                          <div class="col-lg-9">
                             <input type="number" min="0" step="0.01" name="min_buy" class="form-control" value="{{ isset($coupon) ? $coupon->min_buy : '' }}" required>
                          </div>
                        </div>
                        <div class="form-group">
                           <label class="col-lg-3 control-label">{{__('Diskon Maksimal')}}</label>
                           <div class="col-lg-9">
                              <input type="number" min="0" step="0.01" placeholder="{{__('Maximum Discount Amount')}}" name="max_discount" class="form-control" value="{{ isset($coupon) ? $coupon->max_discount : '' }}" required>
                           </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12 text-right">
                                <button class="btn btn-purple" type="submit">{{__('Save')}}</button>
                            </div>
                        </div>
                    </form>
                  
                </div>
            </div>
        </div>
        <div class="col-lg-6">
        </div>
    </div>
@endsection