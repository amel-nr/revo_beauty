@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">{{__('Tetapkan Poin untuk Produk')}}</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{ route('product_point.update', $product->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="col-lg-6">
                                <label class="control-label">{{__('Tetapkan Poin')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="number" min="0" step="0.01" class="form-control" name="point" value="{{ $product->earn_point }}" placeholder="100" required>
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


@endsection
