@extends('layouts.app')

@section('content')

    <div class="col-lg-8 col-lg-offset-2">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">{{__('Informasi Ubah Kupon')}}</h3>
            </div>

            <form class="form-horizontal" action="{{ route('coupon.update', $coupon->id) }}" method="POST" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PATCH">
            	@csrf
                <div class="panel-body">
                    <input type="hidden" name="id" value="{{ $coupon->id }}" id="id">
                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="name">{{__('Jenis Kupon')}}</label>
                        <div class="col-lg-9">
                            <select name="coupon_type" id="coupon_type" class="form-control demo-select2-placeholder" onchange="coupon_form()" required>
                                @if ($coupon->type == "product_base")
                                    <option value="product_base" selected>{{__('Produk')}}</option>
                                @elseif ($coupon->type == "cart_base")
                                    <option value="cart_base">{{__('Totak Belanja')}}</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div id="coupon_form">

                    </div>

                <div class="panel-footer text-right">
                    <button class="btn btn-purple" type="submit">{{__('Simpan')}}</button>
                </div>
            </form>

        </div>
    </div>


@endsection
@section('script')

<script type="text/javascript">

    function coupon_form(){
        var coupon_type = $('#coupon_type').val();
        var id = $('#id').val();
		$.post('{{ route('coupon.get_coupon_form_edit') }}',{_token:'{{ csrf_token() }}', coupon_type:coupon_type, id:id}, function(data){
            $('#coupon_form').html(data);

            $('#demo-dp-range .input-daterange').datepicker({
                startDate: '-0d',
                todayBtn: "linked",
                autoclose: true,
                todayHighlight: true
        	});

            $('.editor').each(function () {
                var editor = new Jodit(this);
            });
		});
    }

    $(document).ready(function(){
        coupon_form();
    });


</script>

@endsection
