@extends('frontend.layouts.app')

@section('style')
<style>
    p:not(.lead){
        font-size: 18px;
        line-height: normal;
    }
    li{
        font-size: 18px;
        line-height: normal;
    }
</style>
@endsection

@section('content')
<section style="background-color: #fcf8F0;">
    <div class="container py-4">
        <div class="text-center py-5" style="background-color: #FACAC3;">
            <h1 class="mb-0 py-5 font-weight-bold title-metode-pembayaran">METODE PEMBAYARAN</h1>
        </div>
        <div class="row">
            <div class="col-md-3 col-12 pt-5">
                <a href="#" class="button-metode-pembayaran atm-transfer-button" style="color: #f3795c;"> <p style="font-weight: 700; border-bottom: 1px solid #f3795c;" class="py-4 px-2 mb-0 heading-4">ATM/BANK TRANSFER</p></a>
                <a href="#" class="button-metode-pembayaran credit-card-button" style="color: black;"> <p style="font-weight: 700; border-bottom: 1px solid #f3795c;" class="py-4 px-2 mb-0 heading-4">CREDIT CARD</p></a>
                <a href="#" class="button-metode-pembayaran ovo-button" style="color: black;"> <p style="font-weight: 700; border-bottom: 1px solid #f3795c;" class="py-4 px-2 mb-0 heading-4">OVO</p></a>
                <a href="#" class="button-metode-pembayaran gopay-button" style="color: black;"> <p style="font-weight: 700; border-bottom: 1px solid #f3795c;" class="py-4 px-2 mb-0 heading-4">GOPAY</p></a>
                <a href="#" class="button-metode-pembayaran bca-virtual-button" style="color: black;"> <p style="font-weight: 700; border-bottom: 1px solid #f3795c;" class="py-4 px-2 mb-0 heading-4">BCA VIRTUAL ACCOUNT</p></a>
                <a href="#" class="button-metode-pembayaran qr-payment-button" style="color: black;"> <p style="font-weight: 700; border-bottom: 1px solid #f3795c;" class="py-4 px-2 mb-0 heading-4">QR PAYMENT</p></a>
            </div>
            <div class="col-md-9 col-12 pt-5 pl-4">
                <div class="metode-container atm-transfer">
                    <div class="row">
                        <div class="col-md-4 col-12 pt-2">
                            <p class="mb-0 heading-4" style="font-weight: 700;">ATM/BANK TRANSFER</p>
                        </div>
                        <div class="col-md-8 col-12 pl-0 pr-0">
                            <img src="{{ asset('frontend/images/icon-pembayaran/bca-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} d-inline" alt="" style="height: 40px;">
                            <img src="{{ asset('frontend/images/icon-pembayaran/bni-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} d-inline" alt="" style="height: 40px;">
                            <img src="{{ asset('frontend/images/icon-pembayaran/mandiri-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} d-inline" alt="" style="height: 40px;">
                            <img src="{{ asset('frontend/images/icon-pembayaran/permata-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} d-inline" alt="" style="height: 40px;">
                            <img src="{{ asset('frontend/images/icon-pembayaran/bri-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} d-inline" alt="" style="height: 40px;">
                            <img src="{{ asset('frontend/images/icon-pembayaran/digibank-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} d-inline" alt="" style="height: 40px;">
                            <img src="{{ asset('frontend/images/icon-pembayaran/uob-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} d-inline" alt="" style="height: 40px;">
                        </div>
                    </div>
                    <div class="pt-3" style="font-weight: 500;">
                        <p>Pembayaran dilakukan melalui transfer bank secara manual ke rekening yang disediakan Ponny Beaute.
                            Konfrimasi pembayaran juga dilakukan secara manual dalam 1x24 jam dan pesanan otomatis dibatalkan
                            dalam kurun waktu tersebut jika tidak ada pembayaran yang terverifikasi.
                            </p>
                        <p class="mb-1">CARA PEMBAYARAN</p>
                        <ol>
                            <li>Pilih produk yang kamu inginkan dan klik ‘Add to Cart’</li>
                            <li>Klik ikon di sebelah kanan atas halaman situs ‘View Cart’ dan cek ulang pesananmu</li>
                            <li>Masukkan kode kupon pada kolom ‘Coupon Code’ jika ada</li>
                            <li>Klik ‘Proceed to Checkout’ untuk melanjutkan pemesanan</li>
                            <li>Masukkan detail alamat tagihan dan pengiriman (‘Billing & Shipping’) pada form yang tersedia serta
                            pilih jasa pengiriman</li>
                            <li>Klik ‘Proceed Payment’ untuk melanjutkan</li>
                            <li>Pilih metode pembayaran ‘ATM / Bank Transfer’, pilih bank yang akan kamu gunakan untuk
                            transaksi, dan lanjutkan dengan klik ‘Place Order’</li>
                            <li>Email konfirmasi pesanan dikirim ke alamat email yang telah dicantumkan, berisi detail pesananmu
                            serta nomor rekening tujuan pembayaran</li>
                            <li>Silakan selesaikan pembayaran dan simpan bukti pembayaran</li>
                            <li>Laporkan bukti pembayaran di https://www.ponnybeaute.co.id/konfirmasi-pembayaran/</li>
                            <li>Tuliskan nama, alamat email, dan unggah dokumen bukti pembayaran, lalu klik ‘Send’</li>
                            <li>Email menunggu verifikasi pembayaran dikirimkan</li>
                            <li>Setelah pembayaran diverifikasi, email transaksi berhasil dikirimkan</li>
                            <li>Cek status pesananmu di halaman ‘Pesanan’ dalam keterangan akun Phoebe’s Squad-mu pada situs
                            Ponny Beaute</li>
                        </ol>
                        <p class="mb-1">Catatan:</p>
                        <ul style="list-style-type: circles;">
                            <li>Kamu bisa mendaftar di situs untuk mempercepat proses pemesanan dan mempermudah cek status
                            pesanan. Jika sudah pernah mendaftar dalam pemesanan sebelumnya, jangan lupa untuk log in
                            dalam pemesanan-pemesanan berikutnya.</li>
                            <li>Jika pembayaran tidak diselesaikan dalam kurun waktu 1x24 jam, maka pesanan secara otomatis di
                            batalkan dan kamu harus mengulangi proses checkout sekali lagi.</li>
                            <li>Pengiriman dilakukan setiap hari Senin-Sabtu pada pk. 12.00. Jika kamu ingin pesanan dikirim pada
                            hari yang sama, konfirmasi bukti pembayaran harus dilakukan sebelum waktu tersebut. Konfirmasi
                            yang diterima di atas pk. 12.00 akan dikirim pada hari kerja berikutnya.</li>
                            <li>Jika ada kesalahan informasi pemesanan, silakan meghubungi Customer Service Ponny Beaute
                            melalui chat window yang tersedia di situs untuk informasi lebih lanjut.</li>
                        </ul>
                    </div>
                </div>
                <div class="metode-container credit-card" style="display: none;">
                    <div class="row">
                        <div class="col-md-3 col-12 pt-2">
                            <p class="mb-0 heading-4" style="font-weight: 700;">CREDIT CARD</p>
                        </div>
                        <div class="col-md-9 col-12 pl-0 pr-0">
                            <img src="{{ asset('frontend/images/icon-pembayaran/visa-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} d-inline" alt="" style="height: 40px;">
                            <img src="{{ asset('frontend/images/icon-pembayaran/mastercard-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} d-inline" alt="" style="height: 40px;">
                        </div>
                        <div class="pt-3 pl-3" style="font-weight: 500;">
                            <p>Pembayaran dengan kartu kredit dilakukan dengan memasukkan informasi 16 digit nomor kartu, tanggal
                                kadaluarsa kartu, dan 3 digit nomor CVV. Pembayaranmu diverifikasi secara otomatis dan kamu akan
                                langsung menerima konfirmasi di layar gadget jika transaksi kartu kredit berhasil. 
                            </p>
                            <p class="mb-1">CARA PEMBAYARAN</p>
                            <ol>
                                <li>Pilih produk yang kamu inginkan dan klik ‘Add to Cart’</li>
                                <li>Klik ikon di sebelah kanan atas halaman situs ‘View Cart’ dan cek ulang pesananmu</li>
                                <li>Masukkan kode kupon pada kolom ‘Coupon Code’ jika ada</li>
                                <li>Klik ‘Proceed to Checkout’ untuk melanjutkan pemesanan</li>
                                <li>Masukkan detail alamat tagihan dan pengiriman (‘Billing & Shipping’) pada form yang tersedia serta
                                pilih jasa pengiriman</li>
                                <li>Klik ‘Proceed Payment’ untuk melanjutkan</li>
                                <li>Pilih metode pembayaran ‘Credit Card’ dan lanjutkan dengan klik ‘Place Order’</li>
                                <li>Masukkan nomor kartu kredit, tanggal kadaluarsa, dan nomor CVV, lalu klik ‘Pay Now’</li>
                                <li>Pembayaranmu diverifikasi secara otomatis, kamu akan langsung menerima konfirmasi di layar
                                gadget-mu jika transaksi kartu kredit berhasil</li>
                                <li>Cek status pesananmu di halaman ‘Pesanan’ dalam keterangan akun Phoebe’s Squad-mu pada situs
                                Ponny Beaute</li>
                            </ol>
                            <p class="mb-1">Catatan:</p>
                            <ul style="list-style-type: circles;">
                                <li>Kamu bisa mendaftar di situs untuk mempercepat proses pemesanan dan mempermudah cek status
                                pesanan. Jika sudah pernah mendaftar dalam pemesanan sebelumnya, jangan lupa untuk log in
                                dalam pemesanan-pemesanan berikutnya.</li>
                                <li>Pembayaran dengan kartu kredit dikenakan biaya proses sebesar 3%.</li>
                                <li>Jika menggunakan kartu kredit, maka alamat billing dan shipping harus sesuai.</li>
                                <li>Pengiriman dilakukan setiap hari Senin-Sabtu pada pk. 12.00. Jika kamu ingin pesanan dikirim pada
                                hari yang sama, konfirmasi bukti pembayaran harus dilakukan sebelum waktu tersebut. Konfirmasi
                                yang diterima di atas pk. 12.00 akan dikirim pada hari kerja berikutnya.</li>
                                <li>Jika ada kesalahan informasi pemesanan, silakan meghubungi Customer Service Ponny Beaute
                                melalui chat window yang tersedia di situs untuk informasi lebih lanjut.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="metode-container ovo" style="display: none;">
                    <div class="row">
                        <div class="col-md-2 col-12 pt-2">
                            <p class="mb-0 heading-4" class="pt-2" style="font-weight: 700;">OVO</p>
                        </div>
                        <div class="col-md-10 col-12 pl-0">
                            <img src="{{ asset('frontend/images/icon-pembayaran/ovo-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} d-inline" alt="" style="height: 40px;">
                        </div>
                    </div>
                    <div class="pt-3" style="font-weight: 500;">
                        <p>Pembayaran menggunakan aplikasi OVO dengan fitur OVO Cash, OVO Points, atau kombinasi
                                    keduanya. Pembeli memasukkan informasi nomor handphone yang terdaftar dalam OVO terlebih dulu,
                                    kemudian melanjutkan proses pembayaran dalam aplikasi. Proses pembayaran akan kadaluarsa dalam 30
                                    detik jika tidak segera dikonfirmasi. Verifikasi pembayaran dilakukan secara otomatis dan pembeli dapat
                                    langsung cek status pesanan.
                        </p>
                        <p class="mb-1">CARA PEMBAYARAN</p>
                        <ol>
                            <li>Pilih produk yang kamu inginkan dan klik ‘Add to Cart’</li>
                            <li>Klik ikon di sebelah kanan atas halaman situs ‘View Cart’ dan cek ulang pesananmu</li>
                            <li>Masukkan kode kupon pada kolom ‘Coupon Code’ jika ada</li>
                            <li>Klik ‘Proceed to Checkout’ untuk melanjutkan pemesanan</li>
                            <li>Masukkan detail alamat tagihan dan pengiriman (‘Billing & Shipping’) pada form yang tersedia serta
                                pilih jasa pengiriman</li>
                            <li>Klik ‘Proceed Payment’ untuk melanjutkan</li>
                            <li>Pilih metode pembayaran ‘OVO’</li>
                            <li>Masukkan nomor handphone yang terdaftar di OVO, lanjutkan dengan klik ‘Place Order’</li>
                            <li>OVO akan mengirimkan notifikasi pembayaran di handphone-mu, buka aplikasi OVO, dan
                                konfirmasi pembayaran (proses pembayaran akan kadaluarsa dalam 30 detik setelah ‘Place Order’
                                jika tidak segera dikonfirmasi)</li>
                            <li>Pembayaranmu diverifikasi secara otomatis, kamu akan langsung menerima konfirmasi di layar
                                gadget-mu jika pembayaran dengan OVO berhasil</li>
                            <li>Cek status pesananmu di halaman ‘Pesanan’ dalam keterangan akun Phoebe’s Squad-mu pada situs
                                Ponny Beaut</li>
                        </ol>
                        <p class="mb-1">Catatan:</p>
                        <ul style="list-style-type: circles;">
                            <li>Kamu bisa mendaftar di situs untuk mempercepat proses pemesanan dan mempermudah cek status
                                pesanan. Jika sudah pernah mendaftar dalam pemesanan sebelumnya, jangan lupa untuk log in
                                dalam pemesanan-pemesanan berikutnya.</li>
                            <li>Pengiriman dilakukan setiap hari Senin-Sabtu pada pk. 12.00. Jika kamu ingin pesanan dikirim pada
                                hari yang sama, konfirmasi bukti pembayaran harus dilakukan sebelum waktu tersebut. Konfirmasi
                                yang diterima di atas pk. 12.00 akan dikirim pada hari kerja berikutnya.</li>
                            <li>Jika ada kesalahan informasi pemesanan, silakan meghubungi Customer Service Ponny Beaute
                                melalui chat window yang tersedia di situs untuk informasi lebih lanjut.</li>
                        </ul>
                    </div>
                </div>
                <div class="metode-container gopay" style="display: none;">
                    <div class="row">
                        <div class="col-md-2 col-12 pt-2">
                            <p class="mb-0 heading-4" class="pt-2" style="font-weight: 700;">GOPAY</p>
                        </div>
                        <div class="col-md-10 col-12 pl-0">
                            <img src="{{ asset('frontend/images/icon-pembayaran/gopay-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} d-inline" alt="" style="height: 40px;">
                        </div>
                    </div>
                    <div class="pt-3" style="font-weight: 500;">
                        <p>Pembayaran menggunakan aplikasi GOJEK dengan fitur GOPAY. Pembeli memasukkan informasi
                            nomor handphone yang terdaftar dalam OVO terlebih dulu, kemudian melanjutkan proses pembayaran
                            dalam aplikasi. Proses pembayaran akan kadaluarsa dalam 15 menit jika tidak segera dikonfirmasi. Verifikasi pembayaran dilakukan secara otomatis dan pembeli dapat langsung cek status pesanan.
                        </p>
                        <p class="mb-1">CARA PEMBAYARAN</p>
                        <ol>
                            <li>Pilih produk yang kamu inginkan dan klik ‘Add to Cart’</li>
                            <li>Klik ikon di sebelah kanan atas halaman situs ‘View Cart’ dan cek ulang pesananmu</li>
                            <li>Masukkan kode kupon pada kolom ‘Coupon Code’ jika ada</li>
                            <li>Klik ‘Proceed to Checkout’ untuk melanjutkan pemesanan</li>
                            <li>Masukkan detail alamat tagihan dan pengiriman (‘Billing & Shipping’) pada form yang tersedia serta
                                pilih jasa pengiriman</li>
                            <li>Klik ‘Proceed Payment’ untuk melanjutkan</li>
                            <li>Pilih metode pembayaran ‘GOPAY’</li>
                            <li>Masukkan nomor handphone yang terdaftar di GOPAY, lanjutkan dengan klik ‘Place Order’, agar
                                dialihkan ke halaman Midtrans</li>
                            <li>Buka aplikasi GOJEK, klik ‘Bayar’ di bawah judul GOPAY</li>
                            <li>Pindai kode QR yang tertera di layar, masukkan PIN, dan selesaikan proses pembayaran (proses
                                pembayaran akan kadaluarsa dalam 15 menit setelah ‘Place Order’ jika tidak segera dikonfirmasi)</li>
                            <li>Pembayaranmu diverifikasi secara otomatis, kamu akan langsung menerima konfirmasi di layar
                                gadget-mu jika pembayaran dengan GOPAY berhasil</li>
                            <li>Cek status pesananmu di halaman ‘Pesanan’ dalam keterangan akun Phoebe’s Squad-mu pada situs
                            Ponny Beaute</li>
                        </ol>
                        <p class="mb-1">Catatan:</p>
                        <ul style="list-style-type: circles;">
                            <li>Kamu bisa mendaftar di situs untuk mempercepat proses pemesanan dan mempermudah cek status
                                pesanan. Jika sudah pernah mendaftar dalam pemesanan sebelumnya, jangan lupa untuk log in
                                dalam pemesanan-pemesanan berikutnya.</li>
                            <li>Pengiriman dilakukan setiap hari Senin-Sabtu pada pk. 12.00. Jika kamu ingin pesanan dikirim pada
                                hari yang sama, konfirmasi bukti pembayaran harus dilakukan sebelum waktu tersebut. Konfirmasi
                                yang diterima di atas pk. 12.00 akan dikirim pada hari kerja berikutnya.</li>
                            <li>Jika ada kesalahan informasi pemesanan, silakan meghubungi Customer Service Ponny Beaute
                                melalui chat window yang tersedia di situs untuk informasi lebih lanjut.</li>
                        </ul>
                    </div>
                </div>
                <div class="metode-container bca-virtual" style="display: none;">
                    <div class="row">
                        <div class="col-md-4 col-12 pt-2">
                            <p class="mb-0 heading-4" class="pt-2" style="font-weight: 700;">BCA VIRTUAL ACCOUNT</p>
                        </div>
                        <div class="col-md-8 col-12 pl-0">
                            <img src="{{ asset('frontend/images/icon-pembayaran/bca-02.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} d-inline" alt="" style="height: 40px;">
                        </div>
                    </div>
                    <div class="pt-3" style="font-weight: 500;">
                        <p>Pembayaran dengan BCA Virtual Account menggunakan nomor rekening virtual yang selalu berubah di
                            setiap pemesanan. Sama seperti Bank Transfer, dapat dilakukan melalui mesin ATM, BCA Mobile, dan
                            KlikBCA. Pembayaran harus dilakukan 1x24 jam sebelum pesanan otomatis dibatalkan. Verifikasi
                            pembayaran dilakukan secara otomatis, sehingga pembeli tidak perlu melaporkan bukti pembayaran.
                        </p>
                        <p class="mb-1">CARA PEMBAYARAN</p>
                        <ol>
                            <li>Pilih produk yang kamu inginkan dan klik ‘Add to Cart’</li>
                            <li>Klik ikon di sebelah kanan atas halaman situs ‘View Cart’ dan cek ulang pesananmu</li>
                            <li>Masukkan kode kupon pada kolom ‘Coupon Code’ jika ada</li>
                            <li>Klik ‘Proceed to Checkout’ untuk melanjutkan pemesanan</li>
                            <li>Masukkan detail alamat tagihan dan pengiriman (‘Billing & Shipping’) pada form yang tersedia serta
                                pilih jasa pengiriman</li>
                            <li>Klik ‘Proceed Payment’ untuk melanjutkan</li>
                            <li>Pilih metode pembayaran ‘BCA Virtual Account’ dan lanjutkan dengan klik ‘Place Order’</li>
                            <li>Gunakan nomor rekening virtual untuk melakukan pembayaran di mesin ATM, BCA Mobile, dan
                                KlikBCA menggunakan fitur ‘BCA Virtual Account’</li>
                            <li>Pembayaranmu diverifikasi secara otomatis, kamu akan langsung menerima email konfirmasi jika
                                pembayaran berhasil</li>
                            <li>Cek status pesananmu di halaman ‘Pesanan’ dalam keterangan akun Phoebe’s Squad-mu pada situs
                                Ponny Beaute</li>
                        </ol>
                        <p class="mb-1">Catatan:</p>
                        <ul style="list-style-type: circles;">
                            <li>Kamu bisa mendaftar di situs untuk mempercepat proses pemesanan dan mempermudah cek status
                                pesanan. Jika sudah pernah mendaftar dalam pemesanan sebelumnya, jangan lupa untuk log in
                                dalam pemesanan-pemesanan berikutnya.</li>
                            <li>Jika pembayaran tidak diselesaikan dalam kurun waktu 1x24 jam, maka pesanan secara otomatis
                                dibatalkan dan kamu harus mengulangi proses checkout sekali lagi.</li>
                            <li>Pengiriman dilakukan setiap hari Senin-Sabtu pada pk. 12.00. Jika kamu ingin pesanan dikirim pada
                                hari yang sama, konfirmasi bukti pembayaran harus dilakukan sebelum waktu tersebut. Konfirmasi
                                yang diterima di atas pk. 12.00 akan dikirim pada hari kerja berikutnya.</li>
                            <li>Jika ada kesalahan informasi pemesanan, silakan meghubungi Customer Service Ponny Beaute
                                melalui chat window yang tersedia di situs untuk informasi lebih lanjut.</li>
                        </ul>
                    </div>
                </div>
                <div class="metode-container qr-payment" style="display: none;">
                    <div class="row">
                        <div class="col-md-5 col-12">
                            <p class="mb-0 heading-4" class="pt-2" style="font-weight: 700;">QR PAYMENT</p>
                        </div>
                        <div class="col-md-7 col-12"></div>
                    </div>
                    <div class="pt-3" style="font-weight: 500;">
                        <p>Pindai kode QR yang ada di layar dengan aplikasi pembayaran pilihanmu (pastikan aplikasi pembayaran
                            mendukung tipe pembayaran dengan kode QR). Pembayaranmu diverifikasi secara otomatis dan kamu
                            akan langsung menerima konfirmasi di layar gadget jika QR Payment berhasil.
                        </p>
                        <p class="mb-1">CARA PEMBAYARAN</p>
                        <ol>
                            <li>Pilih produk yang kamu inginkan dan klik ‘Add to Cart’</li>
                            <li>Klik ikon di sebelah kanan atas halaman situs ‘View Cart’ dan cek ulang pesananmu</li>
                            <li>Masukkan kode kupon pada kolom ‘Coupon Code’ jika ada</li>
                            <li>Klik ‘Proceed to Checkout’ untuk melanjutkan pemesanan</li>
                            <li>Masukkan detail alamat tagihan dan pengiriman (‘Billing & Shipping’) pada form yang tersedia serta
                                pilih jasa pengiriman</li>
                            <li>Klik ‘Proceed Payment’ untuk melanjutkan</li>
                            <li>Pilih metode pembayaran ‘QR Payment’ dan lanjutkan dengan klik ‘Place Order’</li>
                            <li>Buka aplikasi pembayaran pilihanmu yang mendukung tipe pembayaran dengan kode QR di gadget
                                yang berbeda</li>
                            <li>Pindai kode QR yang sudah muncul di layar gadget yang digunakan untuk melakukan pemesanan</li>
                            <li>Periksa kembali detail pembayaranmu melalui aplikasi yang kamu gunakan, lalu klik ‘Bayar’</li>
                            <li>Pembayaranmu diverifikasi secara otomatis, kamu akan langsung menerima konfirmasi di layar
                                gadget-mu jika QR Payment berhasil</li>
                            <li>Cek status pesananmu di halaman ‘Pesanan’ dalam keterangan akun Phoebe’s Squad-mu pada situs
                                Ponny Beaute</li>
                        </ol>
                        <p class="mb-1">Catatan:</p>
                        <ul style="list-style-type: circles;">
                            <li>Kamu bisa mendaftar di situs untuk mempercepat proses pemesanan dan mempermudah cek status
                                pesanan. Jika sudah pernah mendaftar dalam pemesanan sebelumnya, jangan lupa untuk log in
                                dalam pemesanan-pemesanan berikutnya.</li>
                            <li>Pengiriman dilakukan setiap hari Senin-Sabtu pada pk. 12.00. Jika kamu ingin pesanan dikirim pada
                                hari yang sama, konfirmasi bukti pembayaran harus dilakukan sebelum waktu tersebut. Konfirmasi
                                yang diterima di atas pk. 12.00 akan dikirim pada hari kerja berikutnya.</li>
                            <li>Jika ada kesalahan informasi pemesanan, silakan meghubungi Customer Service Ponny Beaute
                                melalui chat window yang tersedia di situs untuk informasi lebih lanjut.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    $( document ).ready(function(){
        $(".button-metode-pembayaran").click(function(){
            $(".button-metode-pembayaran").css("color", "black");
            $(this).css("color", "#f3795c");
        });
        $(".atm-transfer-button").click(function(){
            $(".metode-container").hide(300);
            $(".atm-transfer").show(300);
        });
        $(".credit-card-button").click(function(){
            $(".metode-container").hide(300);
            $(".credit-card").show(300);
        });
        $(".ovo-button").click(function(){
            $(".metode-container").hide(300);
            $(".ovo").show(300);
        });
        $(".gopay-button").click(function(){
            $(".metode-container").hide(300);
            $(".gopay").show(300);
        });
        $(".bca-virtual-button").click(function(){
            $(".metode-container").hide(300);
            $(".bca-virtual").show(300);
        });
        $(".qr-payment-button").click(function(){
            $(".metode-container").hide(300);
            $(".qr-payment").show(300);
        });
    });
</script>
@endsection