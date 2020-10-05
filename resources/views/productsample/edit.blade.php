@extends('layouts.app')

@section('content')

<div class="row">
    <form class="form form-horizontal mar-top" action="{{ route('sample.update',encrypt($product->id))}}" method="POST" enctype="multipart/form-data" id="choice_form">
        @csrf
        <input type="hidden" name="added_by" value="admin">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">{{__('Informasi Sampel Produk')}}</h3>
            </div>
            <div class="panel-body">
                <div class="tab-base tab-stacked-left">
                    <!--Nav tabs-->
                    <ul class="nav nav-tabs">
                       {{-- <li class="active">
                            <a data-toggle="tab" href="#demo-stk-lft-tab-1" aria-expanded="true">{{__('General')}}</a>
                        </li>
                       <li class="">
                            <a data-toggle="tab" href="#demo-stk-lft-tab-2" aria-expanded="false">{{__('Images')}}</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#demo-stk-lft-tab-3" aria-expanded="false">{{__('Videos')}}</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#demo-stk-lft-tab-4" aria-expanded="false">{{__('Meta Tags')}}</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#demo-stk-lft-tab-5" aria-expanded="false">{{__('Customer Choice')}}</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#demo-stk-lft-tab-6" aria-expanded="false">{{__('Price')}}</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#demo-stk-lft-tab-7" aria-expanded="false">{{__('Penggunaan')}}</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#demo-stk-lft-tab-8" aria-expanded="false">Display Settings</a>
                        </li> 
                        <li class="">
                            <a data-toggle="tab" href="#demo-stk-lft-tab-9" aria-expanded="false">{{__('Shipping Info')}}</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#demo-stk-lft-tab-10" aria-expanded="false">{{__('PDF Specification')}}</a>
                        </li>--}}
                    </ul>

                    <!--Tabs Content-->
                    <div class="tab-content">
                        <div id="demo-stk-lft-tab-1" class="tab-pane fade active in">
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{__('Nama Sampel')}}</label>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" name="name" placeholder="{{__('Nama Sampel')}}" value="{{ $product->nama }}" required>
                                </div>
                            </div>
                            <div class="form-group" id="subsubcategory">
                                <label class="col-lg-2 control-label">{{__('Produk')}}</label>
                                <div class="col-lg-7">
                                    <select class="form-control demo-select2-placeholder" name="product" id="product_id" required>
                                       
                                        @foreach ($products as $key => $value)
                                            @if($value->id == $product->product_id)
                                            <option value="{{ $value->id }}" selected>{{ $value->name}}</option>
                                            @else
                                              <option value="{{ $value->id }}">{{ $value->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{__('Stok')}}</label>
                                <div class="col-lg-7">
                                    <input type="number" class="form-control" name="stok" placeholder="Jumlah stok" value="{{ $product->stok }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{__('Maksimal')}}</label>
                                <div class="col-lg-7">
                                    <input type="number" class="form-control" name="maksimal" placeholder="Maksimal sampel" value="{{ $product->max_sample }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer text-right">
                <button type="submit" name="button" class="btn btn-info">{{ __('Simpan') }}</button>
            </div>
        </div>
    </form>
</div>


@endsection

@section('script')



@endsection
