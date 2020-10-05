@extends('layouts.app')

@section('content')

<div class="row">
    <form class="form form-horizontal mar-top" action="{{ route('pointproduct.update',encrypt($item->id))}}" method="POST" enctype="multipart/form-data" id="choice_form">
        @csrf
        <input type="hidden" name="added_by" value="admin">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">{{__('Informasi Poin Produk')}}</h3>
            </div>
            <div class="panel-body">
                <div class="tab-base tab-stacked-left">
                    <!--Nav tabs-->
                    <ul class="nav nav-tabs">
                    </ul>

                    <!--Tabs Content-->
                    <div class="tab-content">
                        <div id="demo-stk-lft-tab-1" class="tab-pane fade active in">
                            <div class="form-group" id="subsubcategory">
                                <label class="col-lg-2 control-label">{{__('Produk')}}</label>
                                <div class="col-lg-7">
                                    <select class="form-control demo-select2-placeholder" name="product" id="product_id" required>
                                        @foreach ($products as $key => $value)
                                            @if($item->product_id == $value->id)
                                            <option value="{{ $value->id }}" selected>{{ $value->name}}</option>
                                            @else
                                            <option value="{{ $value->id }}">{{ $value->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{__('Poin')}}</label>
                                <div class="col-lg-7">
                                    <input type="number" class="form-control" min="0" name="point" placeholder="Nilai poin produk" value="{{ $item->jml_point }}" required>
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