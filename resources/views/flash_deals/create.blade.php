@extends('layouts.app')

@section('content')

<div class="col-sm-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{__('Informasi Flash Sale')}}</h3>
        </div>

        <!--Horizontal Form-->
        <!--===================================================-->
        <form class="form-horizontal" action="{{ route('flash_deals.store') }}" method="POST" enctype="multipart/form-data">
        	@csrf
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="name">{{__('Judul')}}</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="{{__('Judul')}}" id="name" name="title" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="background_color">{{__('Warna Background')}} <small>(Hexa-code)</small></label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="{{__('Contoh: #FFFFFF')}}" id="background_color" name="background_color" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label" for="name">{{__('Warna Teks')}}</label>
                    <div class="col-lg-9">
                        <select name="text_color" id="text_color" class="form-control demo-select2" required>
                            <option value="">Pilih</option>
                            <option value="white">{{__('Putih')}}</option>
                            <option value="dark">{{__('Gelap')}}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="banner">{{__('Banner')}} <small>(1920x500)</small></label>
                    <div class="col-sm-9">
                        <input type="file" id="banner" name="banner" class="form-control">
                    </div>
                </div>
                {{--<div class="form-group">
                    <label class="col-sm-3 control-label" for="start_date">{{__('Date')}}</label>
                    <div class="col-sm-9">
                        <div id="demo-dp-range">
                            <div class="input-daterange input-group" id="datepicker">
                                <input type="text" class="form-control" name="start_date">
                                <span class="input-group-addon">{{__('to')}}</span>
                                <input type="text" class="form-control" name="end_date">
                            </div>
                        </div>
                    </div>
                </div>--}}
                

                <div class="form-group mb-3">
                    <label class="col-sm-3 control-label" for="products">{{__('Produk')}}</label>
                    <div class="col-sm-9">
                        <select name="products[]" id="products" class="form-control demo-select2" multiple required data-placeholder="Pilih Produk">
                            @foreach(\App\Product::all() as $product)
                                <option value="{{$product->id}}">{{__($product->name)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="start_date">{{__('Tanggal')}}</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="demo" name="date_range" readonly>
                    </div>
                </div>
                <br>
                <div class="form-group" id="discount_table">

                </div>
            </div>
            <div class="panel-footer text-right">
                <button class="btn btn-purple" type="submit">{{__('Simpan')}}</button>
            </div>
        </form>
        <!--===================================================-->
        <!--End Horizontal Form-->

    </div>
</div>

@endsection

@section('script')
    
    <script type="text/javascript">
        $(document).ready(function(){
            $('#products').on('change', function(){
                var product_ids = $('#products').val();
                if(product_ids.length > 0){
                    $.post('{{ route('flash_deals.product_discount') }}', {_token:'{{ csrf_token() }}', product_ids:product_ids}, function(data){
                        $('#discount_table').html(data);
                        $('.demo-select2').select2();
                    });
                }
                else{
                    $('#discount_table').html(null);
                }
            });
            $('#demo').daterangepicker({
                timePicker: true,
                timePicker24Hour: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY H:mm'
                }
            });

        });
    </script>
@endsection
