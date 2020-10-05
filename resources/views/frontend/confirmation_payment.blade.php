@extends('frontend.layouts.app')

@section('content')
    <div id="page-content">
        <section class="py-4" style="background-color: #FCF8F0;">
            <div class="container">
                <div class="row pt-4">
                    <div class="col-lg-6 mx-auto p-0">
                        <h1 class="h5 font-weight-bold text-left" style="padding-left: 40px;">KONFIRMASI PEMBAYARAN</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 mx-auto rounded" style="border: 1px solid #F3795C; background-color: #FCF8F0;">
                        <div class="row" style="color: white;">
                            <div class="col-6 py-5 text-left" style="background-color: #F3795C; padding-left: 40px;">
                                <h1 class="h6">NOMOR PESANAN</h1>
                                <h1 class="h4 font-weight-bold m-0">{{ $order->code }}</h1>
                            </div>
                            <div class="col-6 py-5 text-right" style="background-color: #F3795C; padding-right: 40px;">
                                <h1 class="h6">TOTAL PESANAN</h1>
                                <h1 class="h4 font-weight-bold m-0">{{ single_price($order->grand_total+$order->uniq_tf_manual) }}</h1>
                            </div>
                        </div>
                        <form  method="POST" enctype="multipart/form-data" action="{{ route('order.upload_pembayaran') }}">
                        @csrf
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <div class="row" style="border-bottom: 1px solid #F3795C;">
                            @if($order->payment_type == 'manual_bca')
                            <div class="col-5 py-4" style="border-right: 1px solid #F3795C; padding-left: 40px; font-weight: 600;">
                                <p class="m-0">Metode Pembayaran</p>
                                <img src="{{ asset('frontend/images/metode-pembayaran/bca-02.png') }}" class="width-60 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                            </div>
                            @elseif($order->payment_type == 'manual_mandiri')
                            <div class="col-5 py-4" style="border-right: 1px solid #F3795C; padding-left: 40px; font-weight: 600;">
                                <p class="m-0">Metode Pembayaran</p>
                                <img src="{{ asset('frontend/images/metode-pembayaran/mandiri-02.png') }}" class="width-60 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                            </div>
                            @elseif($order->payment_type == 'manual_permata')
                            <div class="col-5 py-4" style="border-right: 1px solid #F3795C; padding-left: 40px; font-weight: 600;">
                                <p class="m-0">Metode Pembayaran</p>
                                <img src="{{ asset('frontend/images/metode-pembayaran/permata-02.png') }}" class="width-60 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                            </div>
                            @endif
                            <div class="col-7 py-4">
                                {{--<div class="row" style="font-weight: 600;">
                                    <div class="col-3">
                                        <p class="m-0">Bank</p>
                                        <p class="m-0">No. Rek</p>
                                        <p class="m-0">a/n</p>
                                    </div>
                                    <div class="col-5">
                                        <p class="m-0">Bank BCA</p>
                                        <p class="m-0">1234567890</p>
                                        <p class="m-0">Aninda Anita</p>
                                    </div>
                                    <div class="col-4 my-auto" style="padding-right: 40px;">
                                        <a href="#" type="button" class="btn btn-danger text-center btn-pakai py-1 px-2 float-right" style="font-size: 10px;">UBAH</a>
                                    </div>
                                </div>--}}
                                <div class="row" style="margin: 15px;">
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label for="staticBank" class="col-sm-4 col-form-label"  style="color: #F3795C;">*Bank</label>
                                            <div class="col-sm-8">
                                             <input type="text" class="form-control rounded my-2 p-2" name="bank"  aria-describedby="namaDepanHelpId" style="border-color: #F3795C;" required value="{{ isset($order->order_confrim) ? $order->order_confrim->bank : '' }}">
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label for="staticBank" class="col-sm-4 col-form-label" style="color: #F3795C;">*a/n</label>
                                            <div class="col-sm-8">
                                             <input type="text" class="form-control rounded my-2 p-2" name="an"  aria-describedby="namaDepanHelpId" style="border-color: #F3795C;" required value="{{ isset($order->order_confrim) ? $order->order_confrim->an_rek : ''}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="staticBank" class="col-sm-4 col-form-label" style="color: #F3795C;">*No. Rek</label>
                                            <div class="col-sm-8">
                                             <input type="text" class="form-control rounded my-2 p-2" name="norek"  aria-describedby="namaDepanHelpId" style="border-color: #F3795C;" required value="{{ isset($order->order_confrim) ? $order->order_confrim->no_rek : ''}}">
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding: 0 40px;">
                            <p class="mx-0 my-2" style="font-weight: 600;">*Upload Bukti Pembayaran <span style="font-weight: 400;">(max. 5MB)</span></p>
                            <div  class="rounded width-100 text-center" style="border: 1px solid #F3795C; background-color: #FDDCC3; height: 200px;">
                                @if($order->order_confrim)
                                @php
                                $img = asset($order->order_confrim->upload_img);
                                @endphp
                                <label for="photo" id="display-foto" class="mb-0 text-center" style="background-repeat: no-repeat;background-position: center center;background-size: contain; width: 100%;cursor: pointer;background-image: url({{$img}});">
                                    <i class="fa fa-edit" aria-hidden="true" style="font-size: 36px; line-height: 200px;"></i>
                                </label>
                                <input type="file" id="photo" name="photo" style="display: none;" accept="image/x-png,image/gif,image/jpeg"/>
                                @else
                                <label for="photo" id="display-foto" class="mb-0 text-center" style="width: 100%;cursor: pointer;">
                                    <i class="fa fa-plus" aria-hidden="true" style="font-size: 36px; line-height: 200px;"></i>
                                </label>
                                <input type="file" id="photo" name="photo" style="display: none;" accept="image/x-png,image/gif,image/jpeg" required />
                                @endif
                                
                            </div>
                           
                        </div>
                        <div class="row py-4" style="padding-left: 40px; padding-right: 40px;">
                            <div class="col pr-1 pl-0">
                                <a href="{{ route('purchase_history.index') }}" type="button" class="btn btn-danger text-center btn-pakai py-2 width-100">BATAL</a>
                            </div>
                            <div class="col pl-1 pr-0">
                                <button type="submit" class="btn btn-danger text-center btn-pakai py-2 width-100">KONFIRMASI BAYAR</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
<script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
          // $('#blah').attr('src', e.target.result);
            $('#display-foto').css('background-image','url('+e.target.result+')');
            $('#display-foto').css('background-size','contain');
            $('#display-foto').css('background-repeat','no-repeat');
            $('#display-foto').css('background-position','center center');
            $('#display-foto').html('<i class="fa fa-edit" aria-hidden="true" style="font-size: 36px; line-height: 200px;"></i>');

        }
        
        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }
    $(document).ready(function(){
        $("#photo").on('change',function(){
            //do whatever you want
           readURL(this);
        })
    });
</script>
@endsection
