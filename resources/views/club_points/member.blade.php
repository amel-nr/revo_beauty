@extends('layouts.app')

@section('content')
@php
   

@endphp
    <?php foreach ($members as $key => $value): ?>
        
    
    <div class="row">
        
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title text-left">{{__('Setting Member')}} {{ $value->title }}</h3>
            </div>
            <hr>
            <form class="form-horizontal" action="{{ route('set_member_setting') }}" method="POST">
            <div class="panel-body">
                
                    @csrf
                    <input type="hidden" name="id" value="{{ $value->id }}">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="col-lg-4">
                                <label class="control-label">{{__('Tetapkan Poin Pembelian(%)')}}</label>
                            </div>
                            <div class="col-lg-5">
                                <input type="number" min="0" max="100" step="0.0001" class="form-control" name="poin_order" value="{{ $value->poin_order }}"  required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-4">
                                <label class="control-label">{{__('Subsidi shiping')}}</label>
                            </div>
                            <div class="col-lg-5">
                                <input type="number" min="0"  class="form-control" name="free_shiping_cost" value="{{ $value->free_shiping_cost }}"  required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-4">
                                <label class="control-label">{{__('Subsidi shiping minimal belaja')}}</label>
                            </div>
                            <div class="col-lg-5">
                                <input type="number" min="0"  class="form-control" name="free_shiping_min_order" value="{{ $value->free_shiping_min_order }}"  required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="col-lg-4">
                                <label class="control-label">{{__('Akses Product Spesial')}}</label>
                            </div>
                            <div class="col-lg-5">
                                <label class="switch">
                                    <input type="checkbox" name="is_product_spesial" {{ $value->is_product_spesial == 1 ? 'checked' : '' }}>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-4">
                                <label class="control-label">{{__('Kupon Ulang tahun')}}</label>
                            </div>
                            <div class="col-lg-5">
                                <label class="switch">
                                    <input type="checkbox" name="is_kupon_ultah" {{ $value->is_kupon_ultah == 1 ? 'checked' : '' }} >
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>
               
              
            </div>
            <div class="panel-footer">
                <div class="form-group">
                <div class="col-lg-12 text-left">
                    <button class="btn btn-purple" type="submit">{{__('Simpan')}}</button>
                </div>
            </div>
            </div>
            </form>
        </div>
 
    </div>
    <?php endforeach ?>
    
@endsection
