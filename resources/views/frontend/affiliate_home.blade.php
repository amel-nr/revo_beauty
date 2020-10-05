@extends('frontend.layouts.app')

@section('style')
<style>
    .bank-button::after{
        display: none;
    }
    .filter-bank:hover{
        color: #f3795c !important;
        text-decoration: underline !important;
        background-color: #fcf8F0 !important;
    }
</style>
@endsection

@section('content')
@php
$codes = \App\Models\AffiliateUserCode::where('user_id',Auth::user()->id)->get();
$collect = collect($codes);
@endphp
<section style="background-color: #fcf8F0;">
<div class="modal fade" id="modalCairkan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: #FCF8F0; border-color: #f3795c;">
                <div class="modal-header" style="border-bottom: #f3795c solid 1px;">
                    <p class="modal-title" style=" font-weight: 600;">CAIRKAN DANA</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #f3795c;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                            <div class="card" style="background-color: #fcf8F0; border: none;">
                                <a data-toggle="collapse" data-parent="#accordionEx" href="#collapse-cairkandana" aria-expanded="true"
                                    aria-controls="collapse-cairkandana" style="text-decoration: none;">  
                                    <div class="card-header px-0" role="tab" id="heading-cairkandana" style="background-color: #fcf8F0; border: none;">
                                        <h7 class=" button-faq" style="color: #f3795c; font-weight: 600; font-size: 15px; color: #f3795c;">
                                            Ketentuan pencairan dana <span> <i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                                        </h7> 
                                    </div>
                                </a>
                                <div id="collapse-cairkandana" class="collapse" role="tabpanel" aria-labelledby="heading-cairkandana"
                                data-parent="#accordionEx">
                                    <div class="card-body px-0">
                                        <ul>
                                            <li style="font-size: 13px; font-weight: 500;">Masukan nomor rekening dan nama pemilik rekening dengan benar.</li>
                                            <li style="font-size: 13px; font-weight: 500;">Dana akan ditransfer ke rekening yang tertera di bawah ini dalam waktu 3x24 jam.</li>
                                            <li style="font-size: 13px; font-weight: 500;">Konfirmasi pencairan dana akan dikirimkan melalui email yang terdaftar.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="" style="background-color: #FEF6E8;">
                            <div class="row py-3">
                                <div class="col-2 pr-0 my-auto">
                                    <img src="{{ asset('frontend/images/wallet.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} float-right" alt="" style="height: 30px;">
                                </div>
                                <div class="col-10 pl-0">
                                    <p class="pl-4 mb-0" style="font-size: 14px; font-weight: 500; color: #6C6D73;">TOTAL</p>
                                    <p class="pl-4 mb-0" style="font-size: 23px; font-weight: bold;">{{ $collect->count() > 0 ? single_price($collect->sum('sales')) : single_price(0) }}</p>
                                </div>
                            </div>
                        </div>
                        <form method="post" action="{{ route('affiliate_user.payment_store') }}">
                        @csrf
                        <div class="pt-2">
                            <label for="form-input-bank" style="font-size: 14px;">Pilih Bank</label>
                            <select class="form-control" name="payment_method" id="bank" style="background-color: white; border-color: #f3795c; width: 100%; color: black;">
                                <option value="bca">Bank BCA</option>
                                <option value="bni">Bank BNI</option>
                                <option value="mandiri">Bank Mandiri</option>
                            </select>
                        </div>
                        <div class="pt-2">
                            <label for="form-input-norek" style="font-size: 14px;">Nomor Rekening Tujuan</label>
                            <input type="text" class="form-control" id="form-input-norek" placeholder="Nomor Rekening" style="background-color: white; border-color: #f3795c;" name="norek" required>
                        </div>
                        <div class="pt-2">
                            <label for="form-input-norek" style="font-size: 14px;">Nama Pemilik Rekening</label>
                            <input type="text" class="form-control" id="form-input-norek" placeholder="Nama Pemilik Rekening" style="background-color: white; border-color: #f3795c;" name="atasnama" required>
                        </div>
                        <div class="row">
                            <div class="col-6"></div>
                            <div class="col-3 pt-3">
                                <button type="button" class="btn btn-secondary mx-auto" data-dismiss="modal" style="border-color: transparent; background-color: transparent; color: #f3795c; font-weight: 500;">BATAL</button>
                            </div>
                            <div class="col-3 pt-3">
                                <button type="submit" class="btn btn-secondary mx-auto" style="border-color: #f3795c; background-color: #f3795c; font-weight: 500;">CAIRKAN</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img class="d-block w-100 lazyload" src="{{ asset('frontend/images/placeholder-landscape.jpg') }}" alt="">
    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto">
                <div class="mt-4 py-5" style="background-color: #FEF6E8; border-radius: 30px;">
                    <h1 class="text-center font-weight-bold">Halo,</h1>
                    <h1 class="text-center mb-0 font-weight-bold" style="color: #f3795c;">{{ Auth::user()->name }} {{ Auth::user()->last_name }} </h1>
                </div>
            </div>
        </div>
        <div class="alert alert-warning" role="alert">
          This is a warning alert—check it out!
        </div>
        <div class="row mt-4 affiliate-result">
            <div class="col-10 mx-auto">
                <p class="mt-5 d-inline my-2" style="font-size: 19px; font-weight: 700;">Result from campaigns</p>
                <a name="" id="" class="btn btn-danger btn-pakai btn-kode py-1 px-2 rounded float-right my-2" href="javascript:void(0)" role="button" ><p class="mb-0 text-center" style="font-weight: 600;"><i class="fa fa-plus" aria-hidden="true"></i> BIKIN KODE SENDIRI</p></a>
                <div class="mb-2" style="clear: right;"></div>
                <div class="row">
                    <div class="col-md-4 col-12">
                        <div class="py-4" style="background-color: white; border: 1px solid #f3795c; border-radius: 5px;">
                            <p class="pl-4 mb-1" style="font-size: 19px; font-weight: 500;">Sessions</p>
                            <p class="pl-4 mb-0" style="font-size: 31px; font-weight: 500;">4.500</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="py-4" style="background-color: white; border: 1px solid #f3795c; border-radius: 5px;">
                            <p class="pl-4 mb-1" style="font-size: 19px; font-weight: 500;">Total used</p>
                            <p class="pl-4 mb-0" style="font-size: 31px; font-weight: 500;">{{ $collect->count() > 0 ? $collect->sum('use') : 0 }}</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="py-4" style="background-color: white; border: 1px solid #f3795c; border-radius: 5px;">
                            <p class="pl-4 mb-1" style="font-size: 19px; font-weight: 500;">Sales</p>
                            <p class="pl-4 mb-0" style="font-size: 31px; font-weight: 500;">
                                {{ $collect->count() > 0 ? single_price($collect->sum('sales')) : single_price(0) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mx-0 mt-5 affiliate-container" style="overflow: auto;">
            <div class="col-10 mx-auto" style="border: 1px solid #f3795c; border-radius: 5px; background-color: white; min-width: 600px;">
                <div class="row" style="border-bottom: 1px solid #f3795c;">
                    <div class="col-3">
                        <p class="pt-3" style="font-size: 19px; font-weight: 700;">Campaigns</p>
                    </div>
                    <div class="col-3">
                        <p class="pt-3" style="font-size: 19px; font-weight: 700;">Status</p>
                    </div>
                    <div class="col-3">
                        <p class="pt-3" style="font-size: 19px; font-weight: 700;">Sales</p>
                    </div>
                    <div class="col-3">
                        <p class="pt-3" style="font-size: 19px; font-weight: 700;">Total Used</p>
                    </div>
                </div>
                @foreach ($codes as $key => $value)
                <div class="row" style="border-bottom: 1px solid #f3795c;">
                    <div class="col-3 pt-3">
                        <p style="font-size: 20px; font-weight: 500;">Code <br> {{ $value->kode_id }}</p>
                    </div>
                    <div class="col-3 pt-3">
                        @if($value->is_active == 1)
                        <span class="badge badge-warning" style="font-size: 100%;">Active</span>
                        @else
                        <span class="badge badge-danger" style="color: black; font-size: 100%">Finish</span>
                        @endif
                    </div>
                    <div class="col-3 pt-3">
                        <p style="font-size: 20px; font-weight: 500;">{{ single_price($value->sales) }}</p>
                    </div>
                    <div class="col-3 pt-3">
                        <p style="font-size: 20px; font-weight: 500;">{{ $value->use }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @php
        $payment = \App\AffiliatePayment::where('affiliate_user_id',Auth::user()->id)->orderBy('id','desc')->get();
        @endphp
        <div class="row mx-0 mt-5 affiliate-container" style="overflow: auto;">
            <div class="col-10 mx-auto" style="border: 1px solid #f3795c; border-radius: 5px; background-color: white; min-width: 600px;">
                <div class="row" style="border-bottom: 1px solid #f3795c;">
                    <div class="col-3">
                        <p class="pt-3" style="font-size: 19px; font-weight: 700;">Date</p>
                    </div>
                    <div class="col-3">
                        <p class="pt-3" style="font-size: 19px; font-weight: 700;">Amount</p>
                    </div>
                    <div class="col-3">
                        <p class="pt-3" style="font-size: 19px; font-weight: 700;">Status</p>
                    </div>
                    <div class="col-3">
                        <p class="pt-3" style="font-size: 19px; font-weight: 700;">Detail</p>
                    </div>
                </div>
                @foreach ($payment as $key => $value)
                <div class="row" style="border-bottom: 1px solid #f3795c;">
                    <div class="col-3 pt-3">
                        <p style="font-size: 20px; font-weight: 500;">{{ $value->created_at }}</p>
                    </div>
                    <div class="col-3 pt-3">
                        <p style="font-size: 20px; font-weight: 500;">{{ single_price($value->amount) }}</p>
                    </div>
                    <div class="col-3 pt-3">
                        @if($value->status == 'unpaid')
                        <span class="badge badge-warning" style="font-size: 100%;">unpaid</span>
                        @else
                        <span class="badge badge-success" style="color: black; font-size: 100%">paid</span>
                        @endif
                    </div>
                    
                    <div class="col-3 pt-3">
                        {{--<p style="font-size: 20px; font-weight: 500;">{{ isset($value->tgl_bayar) ? $value->tgl_bayar : '-' }}</p>--}}
                        <button type="button"
                         class="btn btn-info btn-sm rounded btn-showing" data-bank="{{ $value->payment_method }}" data-norek="{{ $value->norek }}" data-atasnama="{{ $value->atasnama }}" data-gambar="{{ $value->gambar }}" role="button">Show</button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
        <div class="row pt-3 pb-5 affiliate-cairkan">
            <div class="col-10 mx-auto">
                <a name="" id="" class="btn btn-danger btn-pakai btn-cairkan py-3 px-5 rounded float-right" href="javascript::void(0)" role="button" ><p class="mb-0 text-center" style="font-size: 20px; font-weight: 600;">CAIRKAN</p></a>
                <div style="clear: right;"></div>
            </div>
        </div>
        <div class="row mx-0 pb-5 affiliate-total" style="display: none;">
            <div class="col-10 px-0 mx-auto" style="background-color: white; border: 1px solid #f3795c; border-radius: 5px;">
                <div class="row p-4">
                    <div class="col-1 my-auto">
                        <img src="{{ asset('frontend/images/wallet.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} float-right" alt="" style="height: 40px;">
                    </div>
                    <div class="col-6">
                        <p class="mb-3" style="font-size: 20px; font-weight: bold; color: #6C6D73;">TOTAL</p>
                        <p class="mb-0" style="font-size: 32px; font-weight: bold;">{{ $collect->count() > 0 ? single_price($collect->sum('sales')) : single_price(0) }}</p>
                    </div>
                    @if($collect->sum('sales') > 0 )
                    <div class="col-5">
                        <a name="" id="" data-toggle="modal" data-target="#modalCairkan" class="btn btn-danger btn-pakai p-3 rounded float-right" href="javascript::void(0)" role="button" ><p class="mb-0 text-center" style="font-size: 20px; font-weight: 600;">CAIRKAN DANA</p></a>
                    </div>
                    @endif
                </div>
                <div class="affiliate-pelajari" style="border-bottom: 1px solid #f3795c;"></div>
                <div class="py-3 px-4 affiliate-pelajari">
                    <p class="mb-0" style="font-weight: 500;">Pelajari lebih lengkap mengenai pencairan dana,<a href="#" style="color: #f3795c;"> di sini.</a></p>
                </div>
            </div>
        </div>
        <div class="row mt-5 mx-0 affiliate-kode" style="display: none;">
            <div class="col-10 mx-auto px-0">
                <p style="font-size: 25px; color: black; font-weight: 600;">Yuk, bikin sendiri kode kamu</p>
            </div>
        </div>
        <form action="{{ route('affiliate.code_store') }}" method="post">
        @csrf 
        <div class="row mx-0 affiliate-kode" style="display: none;">
            <div class="col-10 mx-auto px-0" style="background-color: white; border: 1px solid #f3795c; border-radius: 5px;">
                <h4 class="mb-0 p-3" style="color: black; font-weight: 700; border-bottom: 1px solid #f3795c;">KODE DISKON</h4>
                <div class="p-3">
                    <input type="text" name="kode" class="w-100" style="border: none; font-size: 25px; color: black;" placeholder="Masukkan Kode...">
                </div>
            </div>
        </div>
        <div class="row pt-3 pb-5 affiliate-kode" style="display: none;">
            <div class="col-10 mx-auto">
                <button type="submit" class="btn btn-danger btn-pakai py-3 px-5 rounded float-right" role="button" ><p class="mb-0 text-center" style="font-size: 20px; font-weight: 600;">SIMPAN</p></button>
                <div style="clear: right;"></div>
            </div>
        </div>
        </form>
    </div>
</section>
<div class="modal fade" id="modalDetailBayar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: #FCF8F0; border-color: #f3795c;">
                <div class="modal-header" style="border-bottom: #f3795c solid 1px;">
                    <p class="modal-title" style=" font-weight: 600;">Detail Pembayaran</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #f3795c;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <div>
                        <table class="table table-responsive">
                            <tbody>
                                <tr>
                                    <td>{{ __('Bank') }}</td>
                                    <td id="bank_val">df</td>
                                </tr>
                                <tr>
                                    <td>{{ __('No. Rek') }}</td>
                                    <td id="norek_val">dg</td>
                                </tr>
                                 <tr>
                                    <td>{{ __('Atas Nama') }}</td>
                                    <td id="atasnama_val">dg</td>
                                </tr>
                                <tr>
                                    <td>{{ __('Bukti Pembayaran') }}</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row" id="bukti_bayar" style=" min-height: 250px;">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    
    $(document).ready(function(){
        $(".btn-cairkan").click(function(){
            $(this).hide(300);
            $(".affiliate-container").hide(300);
            $(".affiliate-total").show(300);
        });
        $(".btn-kode").click(function(){
            $(this).hide(300);
            $(".affiliate-result, .affiliate-container, .affiliate-cairkan, .affiliate-total").hide(300);
            $(".affiliate-kode").show(300);
        });
        $('#modalCairkan').on('shown.bs.modal', function (e) {
            $(".affiliate-pelajari").hide(300);
        })
        $('#modalCairkan').on('hidden.bs.modal', function (e) {
            $(".affiliate-pelajari").show(300);
        })

        $('.btn-showing').click(function(){
            var bank =  $(this).data('bank');
            var norek =  $(this).data('norek');
            var atasnama =  $(this).data('atasnama');
            var gambar = $(this).data('gambar');
            console.log(gambar);
            $('#bank_val').html(bank);
            $('#atasnama_val').html(atasnama);
            $('#norek_val').html(norek);
            $('#bukti_bayar').html('');
            $.each(gambar,function(i,v){
                var hy = '<div class="col-4"><img loading="lazy" src="{{ asset("/") }}/'+v+'" alt="" class="img-responsive" width="150"></div>';
                $('#bukti_bayar').append(hy);
            });
            $('#modalDetailBayar').modal('toggle');

        });
    });
</script>
@endsection