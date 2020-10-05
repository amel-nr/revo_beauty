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
        margin-bottom: 1rem;
    }
</style>
@endsection

@section('content')
<section style="background-color: #fcf8F0;">
    <div class="container py-4" style="font-weight: 600;">
        <div class="text-center py-5">
            <h1 class="mb-0 font-weight-bold">SYARAT & KETENTUAN</h1>
        </div>
        <p>Selamat datang di www.Ponnybeaute.co.id.</p>
        <p>Syarat & ketentuan yang ditetapkan di bawah ini mengatur pemakaian jasa yang ditawarkan oleh Ponny beaute terkait pembelian di situs www.ponnybeaute.co.id/. Dengan mendaftar dan/atau menggunakan situs www.ponnybeaute.co.id/, maka pengguna dianggap telah membaca, mengerti, memahami
            dan menyutujui semua isi dalam Syarat & ketentuan.</p>
        <ol class="pb-4">
            <li>Ponnybeaute tidak memungut biaya pendaftaran kepada Pengguna.</li>
            <li>Pembeli wajib bertransaksi melalui prosedur transaksi yang telah ditetapkan oleh Ponnybeaute. Pembeli melakukan pembayaran dengan menggunakan
            metode pembayaran yang sebelumnya telah dipilih oleh Pembeli.</li>
            <li>Pembeli memahami dan mengerti bahwa Ponnybeaute telah melakukan usaha sebaik mungkin dalam memberikan informasi tarif pengiriman kepada
            Pembeli berdasarkan lokasi secara akurat, namun Kami tidak dapat menjamin keakuratan data tersebut dengan yang ada pada cabang setempat.</li>
            <li>Pengiriman pesanan dilakukan 1 (satu) hari setelah pembayaran diselesaikan.</li>
            <li>Pembeli menerima informasi nomor resi dalam kurun waktu 36 jam setelah pembayaran diselesaikan.</li>
        </ol>
    </div>
</section>
@endsection

@section('script')

@endsection