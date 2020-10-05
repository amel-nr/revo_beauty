<form class="form-horizontal" action="{{ route('affiliate.payment_user') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">{{__('Pembayaran Affiliate')}}</h4>
    </div>

    <div class="modal-body">
        <div>
            <table class="table table-responsive">
                <tbody>
                    <tr>
                        @if($affiliate_payment->amount >= 0)
                            <td>{{ __('Komisi') }}</td>
                            <td><strong>{{ single_price($affiliate_payment->amount) }}</strong></td>
                        @endif
                    </tr>
                    <tr>
                        <td>{{ __('Bank') }}</td>
                        <td>{{ strtoupper($affiliate_payment->payment_method) }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('No. Rekening') }}</td>
                        <td>{{ $affiliate_payment->norek }}</td>
                    </tr>
                     <tr>
                        <td>{{ __('Atas Nama') }}</td>
                        <td>{{ $affiliate_payment->atasnama }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Bukti Pembayaran') }}</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="gambar-pembayaran" style=" min-height: 250px;">
            @php
            $gambar = json_decode($affiliate_payment->gambar);
            @endphp
            @if ($gambar != null)
            @foreach($gambar as $key => $value)
            <div class="col-md-4 col-sm-4 col-xs-6">
                <div class="img-upload-preview">
                    <img loading="lazy"  src="{{ asset($value) }}" alt="" class="img-responsive">
                    <input type="hidden" name="previous_photos[]" value="{{ $value }}">
                    <button type="button" class="btn btn-danger close-btn remove-files"><i class="fa fa-times"></i></button>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        <input type="hidden" name="affiliate_user_payment" value="{{ $affiliate_payment->id }}">
        

    </div>
    <div class="modal-footer">
        <div class="panel-footer text-right">
            @if ($affiliate_payment->amount > 0)
                <button class="btn btn-purple" type="submit">{{__('Bayar')}}</button>
            @endif
            <button class="btn btn-default" data-dismiss="modal">{{__('Batal')}}</button>
        </div>
    </div>
</form>
