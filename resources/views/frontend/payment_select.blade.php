@extends('frontend.layouts.app')

@section('content')

    <div id="page-content" style="background-color: #FCF8F0;">
        <section class="py-3 gry-bg" style="background-color: #FCF8F0;">
            <form action="{{ url('orders/store') }}" class="form-default" data-toggle="validator" role="form" method="POST" id="checkout-form">
             @csrf
            <input type="hidden" name="idAddres" value="{{ $id_address }}">
            <div class="container">
                <h1 class="h5 font-weight-bold">METODE PEMBAYARAN</h1>
                <div class="row my-4">
                    <div class="col-md-6 col-12 pb-4">
                        <div id="accordionExample" class="accordion rounded" style="border: 1px solid #F3795C;">
                            <div class="card border-0">
                                <button type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="btn btn-link text-dark font-weight-bold collapsible-link" style="background-color: #F3795C; border-radius: 0 !important; text-decoration: none;">
                                    <div id="headingOne" class="card-header border-0" style="background-color: #F3795C; color: white !important;">
                                        <h2 class="h6 mb-0">
                                            VIRTUAL ACCOUNT <br>(Konfirmasi Otomatis)
                                        </h2>
                                    </div>
                                </button>
                                <div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse show" style="background-color: #FCF8F0;">
                                    <div class="card-body p-4">
                                        <div class="form-check pl-0">
                                            <div class="row mb-3">
                                                <div class="col-md-1 col-2">
                                                    <label class="radio-container">
                                                        <input type="radio" name="payment" value="mt_tf_bca" onclick="pilih_metode($(this).val())">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="col-3">
                                                    <img src="{{ asset('frontend\images\icon-pembayaran\bca-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                </div>
                                                <div class="col-md-8 col-7">
                                                    <h2 class="h6 mb-0 mt-1">
                                                        BCA Virtual Account
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-1 col-2">
                                                    <label class="radio-container">
                                                        <input type="radio" name="payment" value="mt_tf_mdr" onclick="pilih_metode($(this).val())">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="col-3">
                                                    <img src="{{ asset('frontend\images\icon-pembayaran\mandiri-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                </div>
                                                <div class="col-md-8 col-7">
                                                    <h2 class="h6 mb-0 mt-1">
                                                        Mandiri Virtual Account
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-1 col-2">
                                                    <label class="radio-container">
                                                        <input type="radio" name="payment" value="mt_tf_bni" onclick="pilih_metode($(this).val())">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="col-3">
                                                    <img src="{{ asset('frontend\images\icon-pembayaran\bni-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                </div>
                                                <div class="col-md-8 col-7">
                                                    <h2 class="h6 mb-0 mt-1">
                                                        BNI Virtual Account
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-1 col-2">
                                                    <label class="radio-container">
                                                        <input type="radio" name="payment" value="mt_tf_permata" onclick="pilih_metode($(this).val())">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="col-3">
                                                    <img src="{{ asset('frontend\images\icon-pembayaran\permata-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                </div>
                                                <div class="col-md-8 col-7">
                                                    <h2 class="h6 mb-0 mt-1">
                                                        Permata Virtual Account
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0">
                                <button type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="btn btn-link text-dark font-weight-bold collapsible-link" style="background-color: #F3795C; border-radius: 0 !important; text-decoration: none;">
                                    <div id="headingTwo" class="card-header border-0" style="background-color: #F3795C; color: white !important;">
                                        <h2 class="h6 mb-0">
                                            BANK TRANSFER <br>(Konfirmasi Manual)
                                        </h2>
                                    </div>
                                </button>
                                <div id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordionExample" class="collapse" style="background-color: #FCF8F0;">
                                    <div class="card-body p-4">
                                        <div class="form-check pl-0">
                                            <div class="row mb-3">
                                                <div class="col-md-1 col-2">
                                                    <label class="radio-container">
                                                        <input type="radio" name="payment" value="manual_bca" onclick="pilih_metode($(this).val())">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="col-3">
                                                    <img src="{{ asset('frontend\images\icon-pembayaran\bca-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                </div>
                                                <div class="col-md-8 col-7">
                                                    <h2 class="h6 mb-0 mt-1">
                                                        Bank BCA
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-1 col-2">
                                                    <label class="radio-container">
                                                        <input type="radio" name="payment" value="manual_mandiri" onclick="pilih_metode($(this).val())">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="col-3">
                                                    <img src="{{ asset('frontend\images\icon-pembayaran\mandiri-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                </div>
                                                <div class="col-md-8 col-7">
                                                    <h2 class="h6 mb-0 mt-1">
                                                        Bank Mandiri
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-1 col-2">
                                                    <label class="radio-container">
                                                        <input type="radio" name="payment" value="manual_permata" onclick="pilih_metode($(this).val())">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="col-3">
                                                    <img src="{{ asset('frontend\images\icon-pembayaran\permata-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                </div>
                                                <div class="col-md-8 col-7">
                                                    <h2 class="h6 mb-0 mt-1">
                                                        Bank Permata
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-1 col-2">
                                                    <label class="radio-container">
                                                        <input type="radio" name="payment" value="transfer_manual" onclick="pilih_metode($(this).val())">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-11 col-10">
                                                    <h2 class="h6 mb-0 mt-1">
                                                        Bank Lain
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0">
                                <button type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" class="btn btn-link text-dark font-weight-bold collapsible-link" style="background-color: #F3795C; border-radius: 0 !important; text-decoration: none;">
                                    <div id="headingThree" class="card-header border-0" style="background-color: #F3795C; color: white !important;">
                                        <h2 class="h6 mb-0">
                                            MOBILE PAYMENT
                                        </h2>
                                    </div>
                                </button>
                                <div id="collapseThree" aria-labelledby="headingThree" data-parent="#accordionExample" class="collapse" style="background-color: #FCF8F0;">
                                    <div class="card-body p-4">
                                        <div class="form-check pl-0">
                                            <div class="row mb-3">
                                                <div class="col-md-1 col-2">
                                                    <label class="radio-container">
                                                        <input type="radio" name="payment"  value="ovo" onclick="pilih_metode($(this).val())">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="col-3">
                                                    <img src="{{ asset('frontend\images\icon-pembayaran\ovo-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                </div>
                                                <div class="col-md-8 col-7">
                                                    <h2 class="h6 mb-0 mt-1">
                                                        OVO
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-1 col-2">
                                                    <label class="radio-container">
                                                        <input type="radio" name="payment" value="gopay" onclick="pilih_metode($(this).val())">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="col-3">
                                                    <img src="{{ asset('frontend\images\icon-pembayaran\gopay-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                </div>
                                                <div class="col-md-8 col-7">
                                                    <h2 class="h6 mb-0 mt-1">
                                                        GOPAY
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0">
                                <button type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" class="btn btn-link text-dark font-weight-bold collapsible-link" style="background-color: #F3795C; border-radius: 0 !important; text-decoration: none;">
                                    <div id="headingFour" class="card-header border-0" style="background-color: #F3795C; color: white !important;">
                                        <h2 class="h6 mb-0">
                                            KARTU KREDIT / DEBIT
                                        </h2>
                                    </div>
                                </button>
                                <div id="collapseFour" aria-labelledby="headingFour" data-parent="#accordionExample" class="collapse" style="background-color: #FCF8F0;">
                                    <div class="card-body p-4">
                                        <div class="form-check pl-0">
                                            <div class="row mb-3">
                                                <div class="col-md-1 col-2">
                                                    <label class="radio-container">
                                                        <input type="radio" name="payment" value="credit_card" onclick="pilih_metode($(this).val())">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="col-3">
                                                    <img src="{{ asset('frontend\images\icon-pembayaran\visa-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                </div>
                                                <div class="col-md-8 col-7">
                                                    <h2 class="h6 mb-0 mt-1">
                                                        Credit Card / Debit Card
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0">
                                <button type="button" data-toggle="collapse" data-target="#collapseCounter" aria-expanded="false" aria-controls="collapseCounter" class="btn btn-link text-dark font-weight-bold collapsible-link" style="background-color: #F3795C; border-radius: 0 !important; text-decoration: none;">
                                    <div id="headingFour" class="card-header border-0" style="background-color: #F3795C; color: white !important;">
                                        <h2 class="h6 mb-0">
                                           OVER THE COUNTER <br>(Alfamart/Indomart)
                                        </h2>
                                    </div>
                                </button>
                                <div id="collapseCounter" aria-labelledby="headingCounter" data-parent="#accordionExample" class="collapse" style="background-color: #FCF8F0;">
                                    <div class="card-body p-4">
                                        <div class="form-check pl-0">
                                            <div class="row mb-3">
                                                <div class="col-md-1 col-2">
                                                    <label class="radio-container">
                                                        <input type="radio" name="payment" value="Indomaret" onclick="pilih_metode($(this).val())">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="col-3">
                                                    <img src="{{ asset('frontend\images\icon-pembayaran\indomaret-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                </div>
                                                <div class="col-md-8 col-7">
                                                    <h2 class="h6 mb-0 mt-1">
                                                        Indomaret
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-1 col-2">
                                                    <label class="radio-container">
                                                        <input type="radio" name="payment" value="alfamart" onclick="pilih_metode($(this).val())">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="col-3">
                                                    <img src="{{ asset('frontend\images\icon-pembayaran\alfamart-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                </div>
                                                <div class="col-md-8 col-7">
                                                    <h2 class="h6 mb-0 mt-1">
                                                        Alfamart
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0">
                                <button type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" class="btn btn-link text-dark font-weight-bold collapsible-link" style="background-color: #F3795C; border-radius: 0 !important; text-decoration: none;">
                                    <div id="headingFive" class="card-header border-0" style="background-color: #F3795C; color: white !important;">
                                        <h2 class="h6 mb-0">
                                            METODE PEMBAYARAN LAINNYA
                                        </h2>
                                    </div>
                                </button>
                                <div id="collapseFive" aria-labelledby="headingFive" data-parent="#accordionExample" class="collapse" style="background-color: #FCF8F0;">
                                    <div class="card-body p-4">
                                        <div class="form-check pl-0">
                                            <div class="row mb-3">
                                                <div class="col-md-1 col-2">
                                                    <label class="radio-container">
                                                        <input type="radio" name="payment"  value="qris" onclick="pilih_metode($(this).val())">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-11 col-10">
                                                    <h2 class="h6 mb-0 mt-1">
                                                        QR Payment (QRIS)
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        
                        <div class="text-center p-3 total-pesanan-full" style="background-color: #F3795C; color: white; border-radius: 5px 5px 0 0;">
                            <h2 class="h6 mb-0">
                                TOTAL PESANAN
                            </h2>
                            <h2 class="h4 mb-0" style="font-weight: 700;">
                                {{ single_price($total) }}
                            </h2>
                        </div>
                        <div class="row total-pesanan-half" style="display: none;">
                            <div class="col-12 mx-auto" style="padding-top: 15px;">

                                <p class="m-0" style="font-size: 15px; color: black;">Card Number<sup style="color: #F3795C;">*</sup></p>
                                <div class="form-group">
                                    <!-- <input type="tel" class="form-control rounded my-2 p-2 cc-number" name="card_number" id="cc-number" autocomplete="cc-number" placeholder="•••• •••• •••• ••••" style="border-color: #F3795C;" required> -->
                                    <input id="cc-number" type="tel" class="input-lg form-control cc-number" autocomplete="cc-number" placeholder="•••• •••• •••• ••••" required>
                                    <div class="invalid-feedback" id="valid-cc">That didn't work.</div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p class="m-0" style="font-size: 15px; color: black;">Expiry Date<sup style="color: #F3795C;">*</sup></p>
                                        <div class="form-group">
                                            <input type="tel" id="cc-exp" placeholder="MM/YY" class="form-control rounded my-2 p-2 cc-exp" name="expiry" autocomplete="cc-exp" placeholder="•• / ••" style="border-color: #F3795C;" required>
                                            <div class="invalid-feedback" id="valid-exp">That didn't work.</div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-6">
                                        <p class="m-0" style="font-size: 15px; color: black;">CW<sup style="color: #F3795C;">*</sup></p>
                                        <div class="form-group">
                                            <input type="tel"  id="cc-cvc" class="form-control rounded my-2 p-2 cc-cvc" name="cvc" id="credit_card_cw" autocomplete="off" placeholder="••••" style="border-color: #F3795C;" required>
                                            <div class="invalid-feedback" id="valid-cvc">That didn't work.</div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>

                        <div id="accordionExampleStep" class="accordion rounded" style="border: 1px solid #F3795C;">
                            <div class="card border-0">
                                <button type="button" data-toggle="collapse" data-target="#collapseOneStep" aria-expanded="true" aria-controls="collapseOneStep" class="btn btn-link text-dark font-weight-bold collapsible-link-step" style="background-color: #FCF8F0; border-radius: 0 !important; text-decoration: none; border-bottom: 1px solid #F3795C;">
                                    <div id="headingOneStep" class="card-header border-0" style="background-color: #FCF8F0; color: black !important;">
                                        <h2 class="h6 mb-0" style="font-weight: 600;">
                                            ATM BCA
                                        </h2>
                                    </div>
                                </button>
                                <div id="collapseOneStep" aria-labelledby="headingOneStep" data-parent="#accordionExampleStep" class="collapse show" style="background-color: #FCF8F0; border-bottom: 1px solid #F3795C;">
                                    <div class="card-body pt-3">
                                        <ol style="font-size: 14px; padding-inline-start: 25px;">
                                            <li class="mb-1">Masukkan Kartu ATM BCA, ketik PIN, lalu pilih menu Transaksi Lainnya</li>
                                            <li class="mb-1">Pilih menu Transfer dan Ke Rek BCA Virtual Account, lalu masukkan nomor BCA Virtual Account Ponny Beaute anda</li>
                                            <li class="mb-1">Pada halaman konfirmasi transfer akan muncul detail pembayaran Anda. Jika informasi telah sesuai tekan Ya</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0">
                                <button type="button" data-toggle="collapse" data-target="#collapseThreeStep" aria-expanded="false" aria-controls="collapseThreeStep" class="btn btn-link text-dark font-weight-bold collapsible-link-step" style="background-color: #FCF8F0; border-radius: 0 !important; text-decoration: none;">
                                    <div id="headingThreeStep" class="card-header border-0" style="background-color: #FCF8F0; color: black !important;">
                                        <h2 class="h6 mb-0" style="font-weight: 600;">
                                            INTERNET BANKING
                                        </h2>
                                    </div>
                                </button>
                                <div id="collapseThreeStep" aria-labelledby="headingThreeStep" data-parent="#accordionExampleStep" class="collapse" style="background-color: #FCF8F0; border-top: 1px solid #F3795C;">
                                    <div class="card-body pt-3">
                                        <ol style="font-size: 14px; padding-inline-start: 25px;">
                                            <li class="mb-1">Masuk ke halaman log-in dan pilih menu Transfer Dana</li>
                                            <li class="mb-1">Pilih menu Transfer ke BCA Virtual Account, lalu masukkan nomor virtual
                                                account yang sudah diberikan, lalu Lanjutkan</li>
                                            <li class="mb-1">Masukkan nominal total tagihan belanja Anda, pilih Lanjutkan</li>
                                            <li class="mb-1">Cek kembali detail pembayaran, lalu masukkan kode yang diperoleh dari KeyBCA
                                                Appli 1, kemudian klik Kirim</li>
                                            <li class="mb-1">Pembayaranmu diverifikasi secara otomatis</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  class="accordion rounded cara-bayar" style="border: 1px solid #F3795C;display: none;" id="cara-bayar-ovo">
                           <div class="card border-0">
                                <button type="button" data-toggle="collapse" data-target="#collapseOVO" aria-expanded="false" aria-controls="collapseOVO" class="btn btn-link text-dark font-weight-bold collapsible-link-step" style="background-color: #FCF8F0; border-radius: 0 !important; text-decoration: none;">
                                    <div id="headingNineVAStepBNI" class="card-header border-0" style="background-color: #FCF8F0; color: black !important;">
                                        <h2 class="h6 mb-0" style="font-weight: 600;">
                                            OVO
                                        </h2>
                                    </div>
                                </button>
                                <div id="collapseOVO" aria-labelledby="headingNineVAStepBNI" data-parent="#accordionVAStepBNI" class="collapse show" style="background-color: #FCF8F0; border-top: 1px solid #F3795C;">
                                    <div class="card-body pt-3">
                                        <ol style="font-size: 14px; padding-inline-start: 25px;">
                                            <li class="mb-1">Buka aplikasi OVO.</li>
                                            <li class="mb-1">kemudian klik menu scan.</li>
                                            <li class="mb-1">Pindai kode QR yang tertera di layar.</li>
                                            <li class="mb-1">Konfirmasi rincian Anda akan tampil di layar.</li>
                                            <li class="mb-1">Jika sudah sesuai, klik Konfirmasi untuk melanjutkan.</li>
                                            <li class="mb-1">Transaksi Anda telah berhasil.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  class="accordion rounded cara-bayar" style="border: 1px solid #F3795C;display: none;" id="cara-bayar-gopay">
                           <div class="card border-0">
                                <button type="button" data-toggle="collapse" data-target="#collapseGOPAY" aria-expanded="false" aria-controls="collapseGOPAY" class="btn btn-link text-dark font-weight-bold collapsible-link-step" style="background-color: #FCF8F0; border-radius: 0 !important; text-decoration: none;">
                                    <div id="headingNineVASteGopay" class="card-header border-0" style="background-color: #FCF8F0; color: black !important;">
                                        <h2 class="h6 mb-0" style="font-weight: 600;">
                                            GOPAY
                                        </h2>
                                    </div>
                                </button>
                                <div id="collapseGOPAY" aria-labelledby="headingNineVASteGopay" data-parent="#cara-bayar-gopay" class="collapse show" style="background-color: #FCF8F0; border-top: 1px solid #F3795C;">
                                    <div class="card-body pt-3">
                                        <ol style="font-size: 14px; padding-inline-start: 25px;">
                                            <li class="mb-1">Buka aplikasi GO-JEK kamu.</li>
                                            <li class="mb-1">kemudian klik menu scan.</li>
                                            <li class="mb-1">Scan QR yang tertera di layar lalu konfirmasi pembelian kamu dengan memasukkan 6 digit PIN kamu</li>
                                            <li class="mb-1">Transaksi Anda telah berhasil.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  class="accordion rounded cara-bayar" style="border: 1px solid #F3795C;display: none;" id="cara-bayar-qris">
                           <div class="card border-0">
                                <button type="button" data-toggle="collapse" data-target="#collapseQRIS" aria-expanded="false" aria-controls="collapseQRIS" class="btn btn-link text-dark font-weight-bold collapsible-link-step" style="background-color: #FCF8F0; border-radius: 0 !important; text-decoration: none;">
                                    <div id="headingNineVASteGopay" class="card-header border-0" style="background-color: #FCF8F0; color: black !important;">
                                        <h2 class="h6 mb-0" style="font-weight: 600;">
                                            QRIS
                                        </h2>
                                    </div>
                                </button>
                                <div id="collapseQRIS" aria-labelledby="headingNineVASteQRIS" data-parent="#cara-bayar-qris" class="collapse show" style="background-color: #FCF8F0; border-top: 1px solid #F3795C;">
                                    <div class="card-body pt-3">
                                        <ol style="font-size: 14px; padding-inline-start: 25px;">
                                            <li class="mb-1">Buka aplikasi yang mendukukung pemabayara QRIS seperti GO-JEK,Link Aja, OVO.</li>
                                            <li class="mb-1">kemudian klik menu scan.</li>
                                            <li class="mb-1">Scan QR yang tertera di layar lalu konfirmasi pembelian kamu dengan memasukkan 6 digit PIN kamu</li>
                                            <li class="mb-1">Transaksi Anda telah berhasil.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  class="accordion rounded cara-bayar" style="border: 1px solid #F3795C;display: none;" id="cara-bayar-indomaret">
                           <div class="card border-0">
                                <button type="button" data-toggle="collapse" data-target="#collapseIndomaret" aria-expanded="false" aria-controls="collapseIndomaret" class="btn btn-link text-dark font-weight-bold collapsible-link-step" style="background-color: #FCF8F0; border-radius: 0 !important; text-decoration: none;">
                                    <div id="headingNineVAStepBNI" class="card-header border-0" style="background-color: #FCF8F0; color: black !important;">
                                        <h2 class="h6 mb-0" style="font-weight: 600;">
                                            Indomaret
                                        </h2>
                                    </div>
                                </button>
                                <div id="collapseIndomaret" aria-labelledby="headingNineVAStepBNI" data-parent="#accordionVAStepBNI" class="collapse show" style="background-color: #FCF8F0; border-top: 1px solid #F3795C;">
                                    <div class="card-body pt-3">
                                        <ol style="font-size: 14px; padding-inline-start: 25px;">
                                            <li class="mb-1">Catat dan simpan kode pembayaran Indomaret Anda, misal: 32133706xxxx0091.</li>
                                            <li class="mb-1">Datangi kasir Alfamart terdekat dan beritahukan pada kasir bahwa Anda ingin melakukan pembayaran "Ponny Beaute".</li>
                                            <li class="mb-1">Tunjukkan kode pembayaran ke kasir Indomaret terdekat, dan lakukan pembayaran senilai misal : RP 80,000.00.</li>
                                            <li class="mb-1">Simpan bukti pembayaran yang sewaktu-waktu diperlukan jika terjadi kendala transaksi.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  class="accordion rounded cara-bayar" style="border: 1px solid #F3795C;display: none;" id="cara-bayar-alfamart">
                           <div class="card border-0">
                                <button type="button" data-toggle="collapse" data-target="#collapseAlfa" aria-expanded="false" aria-controls="collapseAlfa" class="btn btn-link text-dark font-weight-bold collapsible-link-step" style="background-color: #FCF8F0; border-radius: 0 !important; text-decoration: none;">
                                    <div id="headingNineVAStepBNI" class="card-header border-0" style="background-color: #FCF8F0; color: black !important;">
                                        <h2 class="h6 mb-0" style="font-weight: 600;">
                                            Alfamart
                                        </h2>
                                    </div>
                                </button>
                                <div id="collapseAlfa" aria-labelledby="headingNineVAStepBNI" data-parent="#accordionVAStepBNI" class="collapse show" style="background-color: #FCF8F0; border-top: 1px solid #F3795C;">
                                    <div class="card-body pt-3">
                                        <ol style="font-size: 14px; padding-inline-start: 25px;">
                                            <li class="mb-1">Catat dan simpan kode pembayaran Indomaret Anda, misal: 32133706xxxx0091.</li>
                                            <li class="mb-1">Datangi kasir Alfamart terdekat dan beritahukan pada kasir bahwa Anda ingin melakukan pembayaran "Ponny Beaute".</li>
                                            <li class="mb-1">Beritahukan kode pembayaran Alfamart Anda pada kasir dan silahkan lakukan pembayaran Anda senilai, misal : Rp 80,000.00.</li>
                                            <li class="mb-1">Simpan struk pembayaran Anda sebagai tanda bukti pembayaran yang sah.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  class="accordion rounded cara-bayar" style="border: 1px solid #F3795C;display: none;" id="cara-bayar-va-mandiri">
                           <div class="card border-0">
                                <button type="button" data-toggle="collapse" data-target="#collapseAlfa" aria-expanded="false" aria-controls="collapseAlfa" class="btn btn-link text-dark font-weight-bold collapsible-link-step" style="background-color: #FCF8F0; border-radius: 0 !important; text-decoration: none;">
                                    <div id="headingNineVAmandiri" class="card-header border-0" style="background-color: #FCF8F0; color: black !important;">
                                        <h2 class="h6 mb-0" style="font-weight: 600;">
                                            Atm Bank Mandiri
                                        </h2>
                                    </div>
                                </button>
                                <div id="collapseAlfa" aria-labelledby="headingNineVAmandiri" data-parent="#cara-bayar-va-mandiri" class="collapse show" style="background-color: #FCF8F0; border-top: 1px solid #F3795C;">
                                    <div class="card-body pt-3">
                                        <ol style="font-size: 14px; padding-inline-start: 25px;">
                                            <li class="mb-1">Masukkan kartu ATM dan Pin.</li>
                                            <li class="mb-1">Pilih Menu Bayar/Beli.</li>
                                            <li class="mb-1">Pilih menu Lainnya, hingga menemukan menu Multipayment.</li>
                                            <li class="mb-1">Masukkan kode biller, lalu pilih Benar.</li>
                                            <li class="mb-1">Masukkan Nomor Virtual Account, lalu pilih tombol Benar.</li>
                                            <li class="mb-1">Masukkan Angka 1 untuk memilih tagihan, lalu pilih tombol Ya.</li>
                                            <li class="mb-1">Akan muncul konfirmasi pembayaran, lalu pilih tombol Ya.</li>
                                            <li class="mb-1">Simpan struk sebagai bukti pembayaran Anda.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion rounded cara-bayar" style="border: 1px solid #F3795C;display: none;" id="cara-bayar-mt-bni">
                            <div class="card border-0">
                                <button type="button" data-toggle="collapse" data-target="#collapseOneVAStepBNI" aria-expanded="true" aria-controls="collapseOneVAStepBNI" class="btn btn-link text-dark font-weight-bold collapsible-link-step" style="background-color: #FCF8F0; border-radius: 0 !important; text-decoration: none; border-bottom: 1px solid #F3795C;">
                                    <div id="headingOneVAStepBNI" class="card-header border-0" style="background-color: #FCF8F0; color: black !important;">
                                        <h2 class="h6 mb-0" style="font-weight: 600;">
                                            ATM BNI
                                        </h2>
                                    </div>
                                </button>
                                <div id="collapseOneVAStepBNI" aria-labelledby="headingOneVAStepBNI" data-parent="#accordionVAStepBNI" class="collapse show" style="background-color: #FCF8F0; border-bottom: 1px solid #F3795C;">
                                    <div class="card-body pt-3">
                                        <ol style="font-size: 14px; padding-inline-start: 25px;">
                                            <li class="mb-1">Masukkan Kartu Anda.</li>
                                            <li class="mb-1">Pilih Bahasa.</li>
                                            <li class="mb-1">Masukkan PIN ATM Anda.</li>
                                            <li class="mb-1">Kemudian, pilih Menu Lainnya.</li>
                                            <li class="mb-1">Pilih Transfer dan pilih Jenis rekening yang akan Anda gunakan (Contoh: "Dari Rekening Tabungan").</li>
                                            <li class="mb-1">Pilih Virtual Account Billing. Masukkan nomor Virtual Account Anda (Contoh: 8277087781881441).</li>
                                            <li class="mb-1">Tagihan yang harus dibayarkan akan muncul pada layar konfirmasi.</li>
                                            <li class="mb-1">Konfirmasi, apabila telah sesuai, lanjutkan transaksi.</li>
                                            <li class="mb-1">Transaksi Anda telah selesai.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0">
                                <button type="button" data-toggle="collapse" data-target="#collapseTwoVAStepBNI" aria-expanded="false" aria-controls="collapseTwoVAStepBNI" class="btn btn-link text-dark font-weight-bold collapsible-link-step" style="background-color: #FCF8F0; border-radius: 0 !important; text-decoration: none; border-bottom: 1px solid #F3795C;">
                                    <div id="headingTwoVAStepBNI" class="card-header border-0" style="background-color: #FCF8F0; color: black !important;">
                                        <h2 class="h6 mb-0" style="font-weight: 600;">
                                            MOBILE BANKING BNI
                                        </h2>
                                    </div>
                                </button>
                                <div id="collapseTwoVAStepBNI" aria-labelledby="headingTwoVAStepBNI" data-parent="#accordionVAStepBNI" class="collapse" style="background-color: #FCF8F0; border-bottom: 1px solid #F3795C;">
                                    <div class="card-body pt-3">
                                        <ol style="font-size: 14px; padding-inline-start: 25px;">
                                            <li class="mb-1">Akses BNI Mobile Banking melalui handphone.</li>
                                            <li class="mb-1">Masukkan User ID dan password.</li>
                                            <li class="mb-1">Pilih menu Transfer.</li>
                                            <li class="mb-1">Pilih menu Virtual Account Billing, lalu pilih rekening debet.</li>
                                            <li class="mb-1">Masukkan nomor Virtual Account Anda (Contoh: 8277087781881441) pada menu Input Baru.</li>
                                            <li class="mb-1">Tagihan yang harus dibayarkan akan muncul pada layar konfirmasi.</li>
                                            <li class="mb-1">Konfirmasi transaksi dan masukkan Password Transaksi.</li>
                                            <li class="mb-1">Pembayaran Anda Telah Berhasil.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0">
                                <button type="button" data-toggle="collapse" data-target="#collapseThreeVAStepBNI" aria-expanded="false" aria-controls="collapseThreeVAStepBNI" class="btn btn-link text-dark font-weight-bold collapsible-link-step" style="background-color: #FCF8F0; border-radius: 0 !important; text-decoration: none; border-bottom: 1px solid #F3795C;">
                                    <div id="headingThreeVAStepBNI" class="card-header border-0" style="background-color: #FCF8F0; color: black !important;">
                                        <h2 class="h6 mb-0" style="font-weight: 600;">
                                            IBANK PERSONAL
                                        </h2>
                                    </div>
                                </button>
                                <div id="collapseThreeVAStepBNI" aria-labelledby="headingThreeVAStepBNI" data-parent="#accordionVAStepBNI" class="collapse" style="background-color: #FCF8F0; border-bottom: 1px solid #F3795C;">
                                    <div class="card-body pt-3">
                                        <ol style="font-size: 14px; padding-inline-start: 25px;">
                                            <li class="mb-1">Akses ibank.bni.co.id kemudian klik Enter.</li>
                                            <li class="mb-1">Masukkan User ID dan password.</li>
                                            <li class="mb-1">Klik menu Transfer, lalu pilih Virtual Account Billing.</li>
                                            <li class="mb-1">Kemudian, masukan nomor Virtual Account Anda (Contoh: 8277087781881441) yang akan dibayarkan.</li>
                                            <li class="mb-1">Lalu pilih rekening debet yang akan digunakan. Kemudian tekan Lanjut.</li>
                                            <li class="mb-1">Tagihan yang harus dibayarkan akan muncul pada layar konfirmasi.</li>
                                            <li class="mb-1">Masukkan Kode Otentikasi Token.</li>
                                            <li class="mb-1">Anda akan menerima notifikasi bahwa transaksi berhasil.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0">
                                <button type="button" data-toggle="collapse" data-target="#collapseFourVAStepBNI" aria-expanded="false" aria-controls="collapseFourVAStepBNI" class="btn btn-link text-dark font-weight-bold collapsible-link-step" style="background-color: #FCF8F0; border-radius: 0 !important; text-decoration: none; border-bottom: 1px solid #F3795C;">
                                    <div id="headingFourVAStepBNI" class="card-header border-0" style="background-color: #FCF8F0; color: black !important;">
                                        <h2 class="h6 mb-0" style="font-weight: 600;">
                                            SMS BANKING
                                        </h2>
                                    </div>
                                </button>
                                <div id="collapseFourVAStepBNI" aria-labelledby="headingFourVAStepBNI" data-parent="#accordionVAStepBNI" class="collapse" style="background-color: #FCF8F0; border-bottom: 1px solid #F3795C;">
                                    <div class="card-body pt-3">
                                        <ol style="font-size: 14px; padding-inline-start: 25px;">
                                            <li class="mb-1">Buka aplikasi SMS Banking BNI.</li>
                                            <li class="mb-1">Pilih menu Transfer.</li>
                                            <li class="mb-1">Pilih menu Transfer rekening BNI.</li>
                                            <li class="mb-1">Masukkan nomor rekening tujuan dengan 16 digit Nomor Virtual Account (Contoh: 8277087781881441).</li>
                                            <li class="mb-1">Masukkan nominal transfer sesuai tagihan. Nominal yang berbeda tidak dapat diproses.</li>
                                            <li class="mb-1">Pilih Proses, kemudian Setuju.</li>
                                            <li class="mb-1">Balas sms dengan mengetik pin sesuai dengan instruksi BNI. Anda akan menerima notif bahwa transaksi berhasil.</li>
                                            <li class="mb-1">Atau dapat juga langsung mengetik sms dengan format: TRF[SPASI]NomorVA[SPASI]NOMINAL dan kemudian kirim ke 3346. Contoh: TRF 8277087781881441 44000</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0">
                                <button type="button" data-toggle="collapse" data-target="#collapseFiveVAStepBNI" aria-expanded="false" aria-controls="collapseFiveVAStepBNI" class="btn btn-link text-dark font-weight-bold collapsible-link-step" style="background-color: #FCF8F0; border-radius: 0 !important; text-decoration: none; border-bottom: 1px solid #F3795C;">
                                    <div id="headingFiveVAStepBNI" class="card-header border-0" style="background-color: #FCF8F0; color: black !important;">
                                        <h2 class="h6 mb-0" style="font-weight: 600;">
                                            CABANG ATAU OUTLET BNI (TELLER)
                                        </h2>
                                    </div>
                                </button>
                                <div id="collapseFiveVAStepBNI" aria-labelledby="headingFiveVAStepBNI" data-parent="#accordionVAStepBNI" class="collapse" style="background-color: #FCF8F0; border-bottom: 1px solid #F3795C;">
                                    <div class="card-body pt-3">
                                        <ol style="font-size: 14px; padding-inline-start: 25px;">
                                            <li class="mb-1">Kunjungi Kantor Cabang/Outlet BNI terdekat.</li>
                                            <li class="mb-1">Informasikan kepada Teller, bahwa Anda ingin melakukan pembayaran Virtual Account Billing.</li>
                                            <li class="mb-1">Serahkan nomor Virtual Account Anda kepada Teller.</li>
                                            <li class="mb-1">Teller akan melakukan konfirmasi kepada Anda dan akan memproses Transaksi.</li>
                                            <li class="mb-1">Apabila transaksi Sukses, Anda akan menerima bukti pembayaran dari Teller tersebut.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0">
                                <button type="button" data-toggle="collapse" data-target="#collapseSixVAStepBNI" aria-expanded="false" aria-controls="collapseSixVAStepBNI" class="btn btn-link text-dark font-weight-bold collapsible-link-step" style="background-color: #FCF8F0; border-radius: 0 !important; text-decoration: none; border-bottom: 1px solid #F3795C;">
                                    <div id="headingSixVAStepBNI" class="card-header border-0" style="background-color: #FCF8F0; color: black !important;">
                                        <h2 class="h6 mb-0" style="font-weight: 600;">
                                            AGEN46
                                        </h2>
                                    </div>
                                </button>
                                <div id="collapseSixVAStepBNI" aria-labelledby="headingSixVAStepBNI" data-parent="#accordionVAStepBNI" class="collapse" style="background-color: #FCF8F0; border-bottom: 1px solid #F3795C;">
                                    <div class="card-body pt-3">
                                        <ol style="font-size: 14px; padding-inline-start: 25px;">
                                            <li class="mb-1">Kunjungi Agen46 terdekat (warung/took/kios dengan tulisan Agen46).</li>
                                            <li class="mb-1">Informasikan kepada Agen46, bahwa ingin melakukan pembayaran Virtual.</li>
                                            <li class="mb-1">Serahkan nomor Virtual Account Anda kepada Agen46.</li>
                                            <li class="mb-1">Agen46 akan melakukan konfirmasi kepada Anda.</li>
                                            <li class="mb-1">Selanjutnya, transaksi akan diproses.</li>
                                            <li class="mb-1">Apabila transaksi dinyatakan sukses, Anda akan menerima bukti pembayaran dari Agen46.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0">
                                <button type="button" data-toggle="collapse" data-target="#collapseSevenVAStepBNI" aria-expanded="false" aria-controls="collapseSevenVAStepBNI" class="btn btn-link text-dark font-weight-bold collapsible-link-step" style="background-color: #FCF8F0; border-radius: 0 !important; text-decoration: none; border-bottom: 1px solid #F3795C;">
                                    <div id="headingSevenVAStepBNI" class="card-header border-0" style="background-color: #FCF8F0; color: black !important;">
                                        <h2 class="h6 mb-0" style="font-weight: 600;">
                                            ATM BERSAMA
                                        </h2>
                                    </div>
                                </button>
                                <div id="collapseSevenVAStepBNI" aria-labelledby="headingSevenVAStepBNI" data-parent="#accordionVAStepBNI" class="collapse" style="background-color: #FCF8F0; border-bottom: 1px solid #F3795C;">
                                    <div class="card-body pt-3">
                                        <ol style="font-size: 14px; padding-inline-start: 25px;">
                                            <li class="mb-1">Masukkan kartu ke mesin ATM Bersama.</li>
                                            <li class="mb-1">Pilih Transaksi Lainnya.</li>
                                            <li class="mb-1">Pilih menu Transfer.</li>
                                            <li class="mb-1">Pilih Transfer ke Bank Lain.</li>
                                            <li class="mb-1">Masukkan kode bank BNI (009) dan 16 Digit Nomor Virtual Account (Contoh: 8277087781881441).</li>
                                            <li class="mb-1">Masukkan nominal transfer sesuai tagihan Anda. Nominal yang berbeda tidak dapat diproses.</li>
                                            <li class="mb-1">Konfirmasi rincian Anda akan tampil pada layar.</li>
                                            <li class="mb-1">Jika sudah sesuai, klik 'Ya' untuk melanjutkan.</li>
                                            <li class="mb-1">Transaksi Anda telah berhasil.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0">
                                <button type="button" data-toggle="collapse" data-target="#collapseEightVAStepBNI" aria-expanded="false" aria-controls="collapseEightVAStepBNI" class="btn btn-link text-dark font-weight-bold collapsible-link-step" style="background-color: #FCF8F0; border-radius: 0 !important; text-decoration: none; border-bottom: 1px solid #F3795C;">
                                    <div id="headingEightVAStepBNI" class="card-header border-0" style="background-color: #FCF8F0; color: black !important;">
                                        <h2 class="h6 mb-0" style="font-weight: 600;">
                                            ATM BANK LAIN
                                        </h2>
                                    </div>
                                </button>
                                <div id="collapseEightVAStepBNI" aria-labelledby="headingEightVAStepBNI" data-parent="#accordionVAStepBNI" class="collapse" style="background-color: #FCF8F0; border-bottom: 1px solid #F3795C;">
                                    <div class="card-body pt-3">
                                        <ol style="font-size: 14px; padding-inline-start: 25px;">
                                            <li class="mb-1">Pilih menu Transfer antar bank atau Transfer online antar bank.</li>
                                            <li class="mb-1">Masukkan kode bank BNI (009) atau pilih bank yang dituju yaitu BNI.</li>
                                            <li class="mb-1">Masukan 16 Digit Nomor Virtual Account pada kolom rekening tujuan (Contoh: 8277087781881441).</li>
                                            <li class="mb-1">Masukkan nominal transfer sesuai tagihan Anda. Nominal yang berbeda tidak dapat diproses.</li>
                                            <li class="mb-1">Masukkan jumlah pembayaran. (Contoh: 44000).</li>
                                            <li class="mb-1">Konfirmasi rincian Anda akan tampil pada layar.</li>
                                            <li class="mb-1">Jika sudah sesuai, klik Ya untuk melanjutkan.</li>
                                            <li class="mb-1">Transaksi Anda telah berhasil.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0">
                                <button type="button" data-toggle="collapse" data-target="#collapseNineVAStepBNI" aria-expanded="false" aria-controls="collapseNineVAStepBNI" class="btn btn-link text-dark font-weight-bold collapsible-link-step" style="background-color: #FCF8F0; border-radius: 0 !important; text-decoration: none;">
                                    <div id="headingNineVAStepBNI" class="card-header border-0" style="background-color: #FCF8F0; color: black !important;">
                                        <h2 class="h6 mb-0" style="font-weight: 600;">
                                            OVO
                                        </h2>
                                    </div>
                                </button>
                                <div id="collapseNineVAStepBNI" aria-labelledby="headingNineVAStepBNI" data-parent="#accordionVAStepBNI" class="collapse" style="background-color: #FCF8F0; border-top: 1px solid #F3795C;">
                                    <div class="card-body pt-3">
                                        <ol style="font-size: 14px; padding-inline-start: 25px;">
                                            <li class="mb-1">Buka aplikasi OVO.</li>
                                            <li class="mb-1">Pilih menu Transfer.</li>
                                            <li class="mb-1">Pilih Rekening Bank.</li>
                                            <li class="mb-1">Masukkan kode bank BNI (009) atau pilih bank yang dituju yaitu BNI.</li>
                                            <li class="mb-1">Masukan 16 Digit Nomor Virtual Account pada kolom rekening tujuan (Contoh: 8277087781881441).</li>
                                            <li class="mb-1">Masukkan nominal transfer sesuai tagihan Anda. Pilih Transfer.</li>
                                            <li class="mb-1">Konfirmasi rincian Anda akan tampil di layar.</li>
                                            <li class="mb-1">Jika sudah sesuai, klik Konfirmasi untuk melanjutkan.</li>
                                            <li class="mb-1">Transaksi Anda telah berhasil.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordionVAStepPermata" class="accordion rounded cara-bayar" style="border: 1px solid #F3795C;display: none;">
                            <div class="card border-0">
                                <button type="button" data-toggle="collapse" data-target="#collapseOneVAStepPermata" aria-expanded="true" aria-controls="collapseOneVAStepPermata" class="btn btn-link text-dark font-weight-bold collapsible-link-step" style="background-color: #FCF8F0; border-radius: 0 !important; text-decoration: none; border-bottom: 1px solid #F3795C;">
                                    <div id="headingOneVAStepPermata" class="card-header border-0" style="background-color: #FCF8F0; color: black !important;">
                                        <h2 class="h6 mb-0" style="font-weight: 600;">
                                            ATM PERMATA
                                        </h2>
                                    </div>
                                </button>
                                <div id="collapseOneVAStepPermata" aria-labelledby="headingOneVAStepPermata" data-parent="#accordionVAStepPermata" class="collapse show" style="background-color: #FCF8F0; border-bottom: 1px solid #F3795C;">
                                    <div class="card-body pt-3">
                                        <ol style="font-size: 14px; padding-inline-start: 25px;">
                                            <li class="mb-1">Masukkan Kartu ATM dan PIN</li>
                                            <li class="mb-1">Pilih menu TRANSAKSI LAINNYA</li>
                                            <li class="mb-1">Pilih menu PEMBAYARAN</li>
                                            <li class="mb-1">Pilih menu PEMBAYARAN LAINNYA</li>
                                            <li class="mb-1">Pilih menu VIRTUAL ACCOUNT</li>
                                            <li class="mb-1">Masukkan nomor VIRTUAL ACCOUNT yang tertera pada halaman konfirmasi, dan tekan BENAR</li>
                                            <li class="mb-1">Pilih rekening yang menjadi sumber dana yang akan didebet, lalu tekan YA untuk konfirmasi transaksi</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0">
                                <button type="button" data-toggle="collapse" data-target="#collapseTwoVAStepPermata" aria-expanded="false" aria-controls="collapseTwoVAStepPermata" class="btn btn-link text-dark font-weight-bold collapsible-link-step" style="background-color: #FCF8F0; border-radius: 0 !important; text-decoration: none; border-bottom: 1px solid #F3795C;">
                                    <div id="headingTwoVAStepPermata" class="card-header border-0" style="background-color: #FCF8F0; color: black !important;">
                                        <h2 class="h6 mb-0" style="font-weight: 600;">
                                            ATM PRIMA
                                        </h2>
                                    </div>
                                </button>
                                <div id="collapseTwoVAStepPermata" aria-labelledby="headingTwoVAStepPermata" data-parent="#accordionVAStepPermata" class="collapse" style="background-color: #FCF8F0; border-bottom: 1px solid #F3795C;">
                                    <div class="card-body pt-3">
                                        <ol style="font-size: 14px; padding-inline-start: 25px;">
                                            <li class="mb-1">Masukkan Kartu ATM dan PIN</li>
                                            <li class="mb-1">Pilih menu TRANSAKSI LAINNYA</li>
                                            <li class="mb-1">Pilih menu KE REK BANK LAIN</li>
                                            <li class="mb-1">Masukkan kode sandi Bank Permata (013) kemudian tekan BENAR</li>
                                            <li class="mb-1">Masukkan nomor VIRTUAL ACCOUNT yang tertera pada halaman konfirmasi, dan tekan BENAR</li>
                                            <li class="mb-1">Masukkan jumlah pembayaran sesuai dengan yang ditagihkan dalam halaman konfirmasi</li>
                                            <li class="mb-1">Pilih BENAR untuk menyetujui transaksi tersebut</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0">
                                <button type="button" data-toggle="collapse" data-target="#collapseThreeVAStepPermata" aria-expanded="false" aria-controls="collapseThreeVAStepPermata" class="btn btn-link text-dark font-weight-bold collapsible-link-step" style="background-color: #FCF8F0; border-radius: 0 !important; text-decoration: none; border-bottom: 1px solid #F3795C;">
                                    <div id="headingThreeVAStepPermata" class="card-header border-0" style="background-color: #FCF8F0; color: black !important;">
                                        <h2 class="h6 mb-0" style="font-weight: 600;">
                                            ATM BERSAMA
                                        </h2>
                                    </div>
                                </button>
                                <div id="collapseThreeVAStepPermata" aria-labelledby="headingThreeVAStepPermata" data-parent="#accordionVAStepPermata" class="collapse" style="background-color: #FCF8F0; border-bottom: 1px solid #F3795C;">
                                    <div class="card-body pt-3">
                                        <ol style="font-size: 14px; padding-inline-start: 25px;">
                                            <li class="mb-1">Masukkan Kartu ATM dan PIN</li>
                                            <li class="mb-1">Pilih menu TRANSAKSI</li>
                                            <li class="mb-1">Pilih menu KE REK BANK LAIN</li>
                                            <li class="mb-1">Masukkan kode sandi Bank Permata (013) diikuti dengan nomor VIRTUAL ACCOUNT yang tertera pada halaman konfirmasi, dan tekan BENAR</li>
                                            <li class="mb-1">Masukkan jumlah pembayaran sesuai dengan yang ditagihkan dalam halaman konfirmasi</li>
                                            <li class="mb-1">Pilih BENAR untuk menyetujui transaksi tersebut</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0">
                                <button type="button" data-toggle="collapse" data-target="#collapseFourVAStepPermata" aria-expanded="false" aria-controls="collapseFourVAStepPermata" class="btn btn-link text-dark font-weight-bold collapsible-link-step" style="background-color: #FCF8F0; border-radius: 0 !important; text-decoration: none; border-bottom: 1px solid #F3795C;">
                                    <div id="headingTFourVAStepPermata" class="card-header border-0" style="background-color: #FCF8F0; color: black !important;">
                                        <h2 class="h6 mb-0" style="font-weight: 600;">
                                            PERMATA MOBILE
                                        </h2>
                                    </div>
                                </button>
                                <div id="collapseFourVAStepPermata" aria-labelledby="headingTFourVAStepPermata" data-parent="#accordionVAStepPermata" class="collapse" style="background-color: #FCF8F0; border-bottom: 1px solid #F3795C;">
                                    <div class="card-body pt-3">
                                        <ol style="font-size: 14px; padding-inline-start: 25px;">
                                            <li class="mb-1">Buka aplikasi PermataMobile Internet (Android/iPhone)</li>
                                            <li class="mb-1">Masukkan User ID & Password</li>
                                            <li class="mb-1">Pilih Pembayaran Tagihan</li>
                                            <li class="mb-1">Pilih Virtual Account</li>
                                            <li class="mb-1">Masukkan 16 digit nomor Virtual Account yang tertera pada halaman konfirmasi</li>
                                            <li class="mb-1">Masukkan nominal pembayaran sesuai dengan yang ditagihkan</li>
                                            <li class="mb-1">Muncul Konfirmasi pembayaran</li>
                                            <li class="mb-1">Masukkan otentikasi transaksi/token</li>
                                            <li class="mb-1">Transaksi selesai</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0">
                                <button type="button" data-toggle="collapse" data-target="#collapseFiveVAStepPermata" aria-expanded="false" aria-controls="collapseFiveVAStepPermata" class="btn btn-link text-dark font-weight-bold collapsible-link-step" style="background-color: #FCF8F0; border-radius: 0 !important; text-decoration: none;">
                                    <div id="headingTFiveVAStepPermata" class="card-header border-0" style="background-color: #FCF8F0; color: black !important;">
                                        <h2 class="h6 mb-0" style="font-weight: 600;">
                                            PERMATA NET
                                        </h2>
                                    </div>
                                </button>
                                <div id="collapseFiveVAStepPermata" aria-labelledby="headingTFiveVAStepPermata" data-parent="#accordionVAStepPermata" class="collapse" style="background-color: #FCF8F0; border-top: 1px solid #F3795C;">
                                    <div class="card-body pt-3">
                                        <ol style="font-size: 14px; padding-inline-start: 25px;">
                                            <li class="mb-1">Buka website PermataNet: https://new.permatanet.com</li>
                                            <li class="mb-1">Masukkan user ID & Password</li>
                                            <li class="mb-1">Pilih Pembayaran Tagihan</li>
                                            <li class="mb-1">Pilih Virtual Account</li>
                                            <li class="mb-1">Masukkan 16 digit nomor Virtual Account yang tertera pada halaman konfirmasi</li>
                                            <li class="mb-1">Masukkan nominal pembayaran sesuai dengan yang ditagihkan</li>
                                            <li class="mb-1">Muncul Konfirmasi pembayaran</li>
                                            <li class="mb-1">Masukkan otentikasi transaksi/token</li>
                                            <li class="mb-1">Transaksi selesai</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion-manual-bca" class="accordion rounded cara-bayar" style="border: 1px solid #F3795C;display: none;">
                                <div class="card border-0">
                                        <button type="button" data-toggle="collapse" data-target="#collapseOneStep-bca" aria-expanded="true" aria-controls="collapseOneStep-bca" class="btn btn-link text-dark font-weight-bold collapsible-link-step" style="background-color: #FCF8F0; border-radius: 0 !important; text-decoration: none; border-bottom: 1px solid #F3795C;">
                                            <div id="headingOneStep-mandiri" class="card-header border-0" style="background-color: #FCF8F0; color: black !important;">
                                                <h2 class="h6 mb-0" style="font-weight: 600;">
                                                    ATM BCA
                                                </h2>
                                            </div>
                                        </button>
                                        <div id="collapseOneStep-bca" aria-labelledby="headingOneStep-mandiri" data-parent="#accordion-manual-bca" class="collapse show" style="background-color: #FCF8F0; border-bottom: 1px solid #F3795C;">
                                            <div class="card-body pt-3">
                                                <ol style="font-size: 14px; padding-inline-start: 25px;">
                                                    <li class="mb-1">Masukkan Kartu ATM BCA, ketik PIN, lalu pilih menu Transaksi Lainnya</li>
                                                    <li class="mb-1">Pilih menu Transfer dan Ke Rek BCA, lalu masukkan nomor rekening BCA Ponny Beaute</li>
                                                    <li class="mb-1">Masukkan nominal total tagihan belanja Anda, cek kembali jumlah transfer, lalu pilih Ya (OK)</li>
                                                    <li class="mb-1">Simpan bukti transaksi berhasil (struk) untuk verifikasi manual di https://www.ponnybeaute.co.id/konfirmasi-pembayaran/</li>
                                                </ol>
                                            </div>
                                        </div>
                                </div>
                                <div class="card border-0">
                                    <button type="button" data-toggle="collapse" data-target="#collapseTwoStep" aria-expanded="false" aria-controls="collapseTwoStep" class="btn btn-link text-dark font-weight-bold collapsible-link-step" style="background-color: #FCF8F0; border-radius: 0 !important; text-decoration: none; border-bottom: 1px solid #F3795C;">
                                        <div id="headingTwoStep" class="card-header border-0" style="background-color: #FCF8F0; color: black !important;">
                                            <h2 class="h6 mb-0" style="font-weight: 600;">
                                                MOBILE BANKING
                                            </h2>
                                        </div>
                                    </button>
                                    <div id="collapseTwoStep" aria-labelledby="headingTwoStep" data-parent="#accordionExampleStep" class="collapse" style="background-color: #FCF8F0; border-bottom: 1px solid #F3795C;">
                                        <div class="card-body pt-3">
                                            <ol style="font-size: 14px; padding-inline-start: 25px;">
                                                <li class="mb-1">Buka aplikasi BCA Mobile, ketik kode akses, lalu pilih menu m-BCA, kemudian m-Transfer</li>
                                                <li class="mb-1">Jika belum pernah transfer ke rekening BCA Ponny Beaute, pilih Antar Rekening
                                                    di bawah sub-judul Daftar Transfer, dan masukkan nomor rekening BCA Ponny
                                                    Beaute, pilih Send, centang nomor rekening tujuan atas nama Ponny Beaute, lalu
                                                    pilih Send</li>
                                                <li class="mb-1">Jika nomor rekening BCA Ponny Beaute sudah terdaftar, pilih Antar Rekening di
                                                    bawah sub-judul Transfer, lalu pilih nomor rekening BCA Ponny Beaute pada
                                                    kolom Ke Rekening:</li>
                                                <li class="mb-1">Masukkan nominal total tagihan belanja Anda pada kolom Jumlah Uang: lalu pilih
                                                    Send, kemudian pastikan kembali data transaksi yang muncul di layar konfirmasi
                                                    sudah benar, lalu pilih OK/YES dan masukkan PIN m-BCA Anda, lalu pilih
                                                    OK/YES</li>
                                                <li class="mb-1">Simpan bukti transaksi berhasil untuk verifikasi manual di https://www.ponnybeaute.co.id/konfirmasi-pembayaran/ </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                
                        </div>
                        <div id="accordion-manual-mandiri" class="accordion rounded cara-bayar" style="border: 1px solid #F3795C;display: none;">
                                <div class="card border-0">
                                        <button type="button" data-toggle="collapse" data-target="#collapseOneStep-mandir-mn" aria-expanded="true" aria-controls="collapseOneStep-mandir-mn" class="btn btn-link text-dark font-weight-bold collapsible-link-step" style="background-color: #FCF8F0; border-radius: 0 !important; text-decoration: none; border-bottom: 1px solid #F3795C;">
                                            <div id="headingOneStep-mandiri" class="card-header border-0" style="background-color: #FCF8F0; color: black !important;">
                                                <h2 class="h6 mb-0" style="font-weight: 600;">
                                                    ATM MANDIRI
                                                </h2>
                                            </div>
                                        </button>
                                        <div id="collapseOneStep-mandir-mn" aria-labelledby="headingOneStep-mandiri" data-parent="#accordion-manual-mandiri" class="collapse show" style="background-color: #FCF8F0; border-bottom: 1px solid #F3795C;">
                                            <div class="card-body pt-3">
                                                <ol style="font-size: 14px; padding-inline-start: 25px;">
                                                    <li class="mb-1">Masukkan Kartu ATM Mandiri,Pilih Menu Bahasa Indonesia</li>
                                                    <li class="mb-1">Masukan 6 digit Pin anda dengan benar</li>
                                                    <li class="mb-1">Pilih menu Transfer dan Ke Rek Mandiri, lalu masukkan nomor rekening Mandiri Ponny Beaute</li>
                                                    <li class="mb-1">Masukkan nominal total tagihan belanja Anda, cek kembali jumlah transfer, lalu pilih Ya (OK)</li>
                                                    <li class="mb-1">Simpan bukti transaksi berhasil (struk) untuk verifikasi manual di https://www.ponnybeaute.co.id/konfirmasi-pembayaran/</li>
                                                </ol>
                                            </div>
                                        </div>
                                </div>
                        </div>
                        <div id="accordion-manual-permata" class="accordion rounded cara-bayar" style="border: 1px solid #F3795C;display: none;">
                                <div class="card border-0">
                                        <button type="button" data-toggle="collapse" data-target="#collapseOneStep-permata-mn" aria-expanded="true" aria-controls="collapseOneStep-permata-mn" class="btn btn-link text-dark font-weight-bold collapsible-link-step" style="background-color: #FCF8F0; border-radius: 0 !important; text-decoration: none; border-bottom: 1px solid #F3795C;">
                                            <div id="headingOneStep-permata" class="card-header border-0" style="background-color: #FCF8F0; color: black !important;">
                                                <h2 class="h6 mb-0" style="font-weight: 600;">
                                                    ATM Permata
                                                </h2>
                                            </div>
                                        </button>
                                        <div id="collapseOneStep-permata-mn" aria-labelledby="headingOneStep-permata" data-parent="#accordion-manual-permata" class="collapse show" style="background-color: #FCF8F0; border-bottom: 1px solid #F3795C;">
                                            <div class="card-body pt-3">
                                                <ol style="font-size: 14px; padding-inline-start: 25px;">
                                                    <li class="mb-1">Masukkan Kartu ATM Permata,Pilih Menu Bahasa Indonesia</li>
                                                    <li class="mb-1">Masukan 6 digit Pin anda dengan benar</li>
                                                    <li class="mb-1">Pilih menu Transfer dan Ke Rek Permata, lalu masukkan nomor rekening Permata Ponny Beaute</li>
                                                    <li class="mb-1">Masukkan nominal total tagihan belanja Anda, cek kembali jumlah transfer, lalu pilih Ya (OK)</li>
                                                    <li class="mb-1">Simpan bukti transaksi berhasil (struk) untuk verifikasi manual di https://www.ponnybeaute.co.id/konfirmasi-pembayaran/</li>
                                                </ol>
                                            </div>
                                        </div>
                                </div>
                        </div>
                        <div id="accordion-transfer-manual" class="accordion rounded cara-bayar" style="border: 1px solid #F3795C;display: none;">
                                <div class="card border-0">
                                        <button type="button" data-toggle="collapse" data-target="#collapseOneStep-transfer-mn" aria-expanded="true" aria-controls="collapseOneStep-transfer-mn" class="btn btn-link text-dark font-weight-bold collapsible-link-step" style="background-color: #FCF8F0; border-radius: 0 !important; text-decoration: none; border-bottom: 1px solid #F3795C;">
                                            <div id="headingOneStep-transfer-mn" class="card-header border-0" style="background-color: #FCF8F0; color: black !important;">
                                                <h2 class="h6 mb-0" style="font-weight: 600;">
                                                    Transfer Manual
                                                </h2>
                                            </div>
                                        </button>
                                        <div id="collapseOneStep-transfer-mn" aria-labelledby="headingOneStep-transfer-mn" data-parent="#accordion-transfer-manual" class="collapse show" style="background-color: #FCF8F0; border-bottom: 1px solid #F3795C;">
                                            <div class="card-body pt-3">
                                            @php
                                                $step = DB::table("transfer_manual")->first();
                                            @endphp

                                                {!!$step != null ? $step->step : ''!!}
                                            </div>
                                        </div>
                                </div>
                        </div>
                          
                            <input type="hidden" id="shipping_info" name="shipping" value="{{ $shipping_info_raw }}">
                            <input type="hidden" id="shipping_method" name="metode_info" >
                            <input type="hidden" id="tokenId" name="tokenId">
                            <button type="button" id="btn-submit" class="btn btn-danger text-center btn-pakai py-2 px-4 my-4 font-weight-bold" disabled>BAYAR SEKARANG</button>
                        
                    </div>
                </div>
            </div>
            </form>
        </section>
    </div>
@endsection

@section('script')
    <script id="midtrans-script" type="text/javascript"
    src="https://api.midtrans.com/v2/assets/js/midtrans-new-3ds.min.js" 
    data-environment="sandbox" 
    data-client-key="{{ env('MITRANS_CLIENT_KEY') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/3.0.0/jquery.payment.min.js"></script>
    <script type="text/javascript">
        function use_wallet(){
            $('input[name=payment_option]').val('wallet');
            $('#checkout-form').submit();
        }
        function submitOrder(el){
            $(el).prop('disabled', true);
            $('#checkout-form').submit();
        }

        function pilih_metode(method)
        {
            
            
            if(method == "credit_card"){
                $("#accordionExampleStep, .cara-bayar").hide(300);
                $(".total-pesanan-half, .bayar-kredit").show(300);
                $("#shipping_method").val(method);
                $("#btn-submit").removeAttr('disabled');
            }else if(method == "ovo")
            {
                $("#accordionExampleStep, .total-pesanan-half, .bayar-kredi, .cara-bayar").hide(300);
                $("#cara-bayar-ovo").show(300);
                $("#shipping_method").val(method);
                $("#btn-submit").removeAttr('disabled');
            }else if(method == "gopay")
            {
                $("#accordionExampleStep, .total-pesanan-half, .bayar-kredi, .cara-bayar").hide(300);
                $("#cara-bayar-gopay").show(300);
                $("#shipping_method").val(method);
                $("#btn-submit").removeAttr('disabled');
            }else if(method == "Indomaret")
            {
                $("#accordionExampleStep, .total-pesanan-half, .bayar-kredi, .cara-bayar").hide(300);
                $("#cara-bayar-indomaret").show(300);
                $("#shipping_method").val(method);
                $("#btn-submit").removeAttr('disabled');
            }
            else if(method == "alfamart")
            {
                $("#accordionExampleStep, .total-pesanan-half, .bayar-kredi, .cara-bayar").hide(300);
                $("#cara-bayar-alfamart").show(300);
                $("#shipping_method").val(method);
                $("#btn-submit").removeAttr('disabled');
            }
            else if(method == "qris")
            {
                $("#accordionExampleStep, .total-pesanan-half, .bayar-kredi, .cara-bayar").hide(300);
                $("#cara-bayar-qris").show(300);
                $("#shipping_method").val(method);
                $("#btn-submit").removeAttr('disabled');
            }
            else if(method == "mt_tf_mdr")
            {
                $("#accordionExampleStep, .total-pesanan-half, .bayar-kredi, .cara-bayar").hide(300);
                $("#cara-bayar-va-mandiri").show(300);
                $("#shipping_method").val(method);
                $("#btn-submit").removeAttr('disabled');
            }
             else if(method == "mt_tf_bni")
            {
                $("#accordionExampleStep, .total-pesanan-half, .bayar-kredi, .cara-bayar").hide(300);
                $("#cara-bayar-mt-bni").show(300);
                $("#shipping_method").val(method);
                $("#btn-submit").removeAttr('disabled');
            }
             else if(method == "mt_tf_permata")
            {
                $("#accordionExampleStep, .total-pesanan-half, .bayar-kredi, .cara-bayar").hide(300);
                $("#accordionVAStepPermata").show(300);
                $("#shipping_method").val(method);
                $("#btn-submit").removeAttr('disabled');
            }
             else if(method == "manual_bca")
            {
                $("#accordionExampleStep, .total-pesanan-half, .bayar-kredi, .cara-bayar").hide(300);
                $("#accordion-manual-bca").show(300);
                $("#shipping_method").val(method);
                $("#btn-submit").removeAttr('disabled');
            }
             else if(method == "manual_mandiri")
            {
                $("#accordionExampleStep, .total-pesanan-half, .bayar-kredi, .cara-bayar").hide(300);
                $("#accordion-manual-mandiri").show(300);
                $("#shipping_method").val(method);
                $("#btn-submit").removeAttr('disabled');
            }
             else if(method == "manual_permata")
            {
                $("#accordionExampleStep, .total-pesanan-half, .bayar-kredi, .cara-bayar").hide(300);
                $("#accordion-manual-permata").show(300);
                $("#shipping_method").val(method);
                $("#btn-submit").removeAttr('disabled');
            }
             else if(method == "transfer_manual")
            {
                $("#accordionExampleStep, .total-pesanan-half, .bayar-kredi, .cara-bayar").hide(300);
                $("#accordion-transfer-manual").show(300);
                $("#shipping_method").val(method);
                $("#btn-submit").removeAttr('disabled');
            }

            else{
                $("#accordionExampleStep, .total-pesanan-full").show(300);
                $(".total-pesanan-half, .bayar-kredit, .cara-bayar").hide(300);
                $("#shipping_method").val(method);
                $("#btn-submit").removeAttr('disabled');
            }
        }



    $(document).ready(function(){
        $('.cc-number').payment('formatCardNumber');
        $('.cc-exp').payment('formatCardExpiry');
        $('.cc-cvc').payment('formatCardCVC');
        $(".cara-bayar").hide(300);

        $('#btn-submit').click(function(){
            var _mtd= $("#shipping_method").val();
            if(_mtd == 'credit_card')
            {
               
                $('.invalid-feedback').hide();
          

               

                var cardType = $.payment.cardType($('.cc-number').val());
                var validNumber = $.payment.validateCardNumber($('.cc-number').val());
                var validExp = $.payment.validateCardExpiry($('.cc-exp').payment('cardExpiryVal'));
                var validcvc = $.payment.validateCardCVC($('.cc-cvc').val(), cardType);

                validNumber ? $('#valid-cc').hide() : $('#valid-cc').show();
                validExp ? $('#valid-exp').hide() : $('#valid-exp').show(); 
                validcvc ? $('#valid-cvc').hide() : $('#valid-cvc').show();
                if(validNumber && validcvc && validExp)
                {
                    var card = $('#cc-number').val();
                    var expiry = $('#cc-exp').val().split("/");
                    var cw= $('#cc-cvc').val();

                    var cardData = {
                      "card_number":  card.replace(/\s/g, ""),
                      "card_exp_month": expiry[0].replace(/\s/g, "") ,
                      "card_exp_year": expiry[1].replace(/\s/g, ""),
                      "card_cvv": cw,
                    };

                    // callback functions
                    var options = {
                      onSuccess: function(response){
                        // Success to get card token_id, implement as you wish here
                        console.log('Success to get card token_id, response:', response);
                        var token_id = response.token_id;
                        $('#tokenId').val(token_id);
                        console.log('This is the card token_id:', token_id);
                        $('#checkout-form').submit();
                      },
                      onFailure: function(response){
                        // Fail to get card token_id, implement as you wish here
                        alert('Kartu kredit anda tidak berlaku.');
                        console.log('Fail to get card token_id, response:', response);
                      }
                    };

                // trigger `getCardToken` function
                    MidtransNew3ds.getCardToken(cardData, options);
                }  

                 

           
            }else{
                $('#checkout-form').submit();
            }
        });
        
    });

    </script>
@endsection
