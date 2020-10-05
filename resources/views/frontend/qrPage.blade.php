@extends('frontend.layouts.app')

@section('content')
    <div id="page-content">
        <section class="py-4" style="background-color: #FCF8F0;">
            <div class="container">
                <div class="row py-5">
                    <div class="col-xl-5 mx-auto text-center">
                        @if($metode == 'gopay')
                        <h3 class="h3 mt-4 font-weight-bold">Pembayaran melaui GO-PAY</h3>
                        @elseif($metode == 'ovo')
                        <h3 class="h3 mt-4 font-weight-bold">Pembayaran melaui OVO</h3>
                        @else
                        <h3 class="h3 mt-4 font-weight-bold">Pembayaran melaui QRIS</h3>
                        @endif
                        <div class="mt-5">
                            <img width="250" src="{{ $imgqr }}">
                        </div>
                        @if($metode == 'gopay')
                        <h6 class="h6 mt-4 mb-0" style="font-weight: 600;">Buka aplikasi GO-jek di ponsel anda.</h6>
                        @elseif($metode == 'ovo')
                        <h6 class="h6 mt-4 mb-0" style="font-weight: 600;">Buka aplikasi OVO di ponsel anda.</h6>
                        @else
                        <h6 class="h6 mt-4 mb-0" style="font-weight: 600;">Buka aplikasi pembayaran yang mendukung QRIS di ponsel anda.</h6>
                        @endif
                        <h6 class="h6 mt-1 mb-0" style="font-weight: 600;">Lalu scan kode QR di atas.</h6>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
