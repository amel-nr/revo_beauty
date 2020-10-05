<div class="modal-body p-0" style="width: 100%; margin: 0 auto;">
    <h3 class="font-weight-bold text-center pb-4" style="color: white; background-color: #F3795C;">{{ $coupon->title }}</h3>
    <div class="container width-90 py-3">
        <div class="row">
            <div class="col-5 p-3 rounded" style="border: 1px solid #F3795C;">
                <p class="font-weight-bold mb-2">KETERANGAN</p>
                <p class="mb-0" style="line-height: 13px;">{!! $coupon->keterangan !!}</p>
            </div>
            <div class="col-7 pr-0">
                <div class="p-0 rounded" style="border: 1px solid #F3795C;">
                    <div class="row mx-0" style="border-bottom: 1px solid #F3795C;">
                        <div class="col-md-2 col-3" style="border-right: 1px dashed #F3795C;">
                            <i class="fa fa-percent text-center py-4" aria-hidden="true" style="color: #F3795C; font-size: 16px;"></i>
                        </div>
                        <div class="col-md-10 col-9 my-auto">
                            <p class="mb-0" style="font-size: 9px; line-height: 10px;">Minimum Pembelian</p>
                            @if(isset(json_decode($coupon->details)->min_buy))
                            <p class="mb-0 font-weight-bold">Rp. {{ json_decode($coupon->details)->min_buy }}</p>
                            @else
                            <p class="mb-0 font-weight-bold">-</p>
                            @endif
                        </div>
                    </div>
                    <div class="row mx-0">
                        <div class="col-md-2 col-3" style="border-right: 1px dashed #F3795C;">
                            <i class="fa fa-calendar text-center py-4" aria-hidden="true" style="color: #F3795C; font-size: 16px;"></i>
                        </div>
                        <div class="col-md-10 col-9 my-auto">
                            <p class="mb-0" style="font-size: 9px; line-height: 10px;">Periode</p>
                            @if( date("Y-m-d", $coupon->start_date) === date("Y-m-d", $coupon->end_date) )
                            <p class="mb-0 font-weight-bold">{{ date("j F o", $coupon->end_date) }}</p>
                            @elseif( date("Y-m", $coupon->start_date) === date("Y-m", $coupon->end_date) )
                            <p class="mb-0 font-weight-bold">{{ date("j", $coupon->start_date) }} - {{ date("j F o", $coupon->end_date) }}</p>
                            @elseif( date("Y", $coupon->start_date) === date("Y", $coupon->end_date) )
                            <p class="mb-0 font-weight-bold">{{ date("j F", $coupon->start_date) }} - {{ date("j F o", $coupon->end_date) }}</p>
                            @else
                            <p class="mb-0 font-weight-bold">{{ date("j F o", $coupon->start_date) }} -<br> {{ date("j F o", $coupon->end_date) }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row rounded mt-3" style="border: 1px solid #F3795C;">
            <div class="col-md-8 col-7 py-3">
                <div class="row">
                    <div class="col-2 my-auto pr-0">
                        <img src="{{ asset('frontend/images/coupon.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                    </div>
                    <div class="col-8">
                        <p class="mb-0" style="font-size: 9px; line-height: 10px;">Kode Promo</p>
                        <p class="mb-0 font-weight-bold" id="kode-kupon">{{ $coupon->code }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-5 py-3 text-center copy-code" style="background-color: #F3795C; cursor: pointer;" data-clipboard-target="#kode-kupon">
                <i class="fa fa-clone" aria-hidden="true" style="color: white; line-height: 32px"></i>
                <span style="color: white; line-height: 32px" class="ml-1">SALIN KODE</span>
            </div>
        </div>
        <div class="row pt-4 px-0" style="border-bottom: 1px dashed #F3795C;"></div>
        <p class="font-weight-bold my-3 text-left">SYARAT & KETENTUAN</p>
        <ul class="list">
            @if(isset($coupon->syarat))
                @foreach(json_decode($coupon->syarat) as $value)
                <li>{!! $value !!}</li>
                @endforeach
            @endif
        </ul>
    </div>
</div>