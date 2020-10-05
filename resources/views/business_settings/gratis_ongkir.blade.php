@extends('layouts.app')

@section('content')
@php
    $subsidi = \App\BusinessSetting::where('type', 'subsidi_ongkir')->first();
    


    if($subsidi == null )
    {
        $subsidi = new  \App\BusinessSetting();
        $subsidi->type = 'subsidi_ongkir';
        $subsidi->value = 0;
        $subsidi->save();
    }

@endphp
    <div class="row">
        <div class="col-lg-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">{{__('Subsidi Gratis Ongkir')}}</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{ route('club_point_user_affiliate') }}" method="POST">
                        @csrf
                        <input type="hidden" name="type" value="subsidi_ongkir">
                        <div class="form-group">
                            <div class="col-lg-4">
                                <label class="control-label">{{__('Besar Subsidi') }}</label>
                            </div>
                            <div class="col-lg-5">
                                <input type="number" min="0" step="0.01" class="form-control text-right" name="value" @if ($subsidi != null) value="{{ $subsidi->value }}" @endif placeholder="25000" required>
                            </div>
                            <div class="col-lg-3">
                                <label class="control-label">{{__('IDR')}}</label>
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