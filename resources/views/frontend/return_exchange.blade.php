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
        <div style="background: #FACAC3 url({{ asset('frontend/images/atribut.png') }}) no-repeat center center; background-size: cover; padding: 100px 0;">
            <h1 class="text-center mb-0 py-5 font-weight-bold title-return">PENUKARAN DAN PENGEMBALIAN</h1>
        </div>
        {{-- <div class="text-center py-5" style="background-color: #FACAC3;">
            
        </div> --}}
        <p class="mt-5"><b>Pembeli dapat melakukan pengembalian atau penukaran barang dengan mengikuti ketentuan berikut:</b></p>
        <ol>    
            <li>Barang yang diterima Pembeli tidak sesuai dengan pemesanan</li>
            <li>Jumlah barang yang diterima lebih dari yang seharusnya didapatkan Pembeli</li>
            <li>Jumlah barang yang diterima kurang dari yang seharusnya didapatkan Pembeli</li>
            <li>Ada kerusakan pada barang yang diterima Pembeli atau isi volume produk tidak sesuai dengan pemesanan</li>
            <li>Pembeli melaporkan keluhan kepada Customer Service Ponnybeaute dengan detail sebagai berikut:</li>
                <ul style="list-style-type: lower-alpha;">
                    <li>Keluhan dilaporkan sesegara mungkin, maksimal 1x24 jam setelah pesanan diterima</li>
                    <li>Customer Service Ponnybeaute membutuhkan waktu maksimal 1x24 jam untuk merespon keluhan Pembeli</li>
                    <li>Melampirkan narasi keluhan secara jelas dan lengkap</li>
                    <li>Melampirkan foto atau video pendukung barang yang rusak atau tidak sesuai pesanan</li>
                    <li>Melampirkan bukti-bukti pendukung yang menunjukkan bahwa barang masih dalam kondisi pembelian asli (baru) dan belum pernah digunakan</li>
                    <li>Melampirkan nomor pesanan</li>
                </ul>
            <li>Jika ditemukan kesalahan dari pihak Ponnybeaute pada proses pemesanan awal, Pembeli mengirim kembali barang pesanan dan Ponnybeaute menanggung biaya pengiriman barang pengganti</li>
            <li>Ponnybeaute dapat mengirim kembali barang yang dikembalikan ke alamat pemesanan awal tanpa memberikan pengganti jika barang ditemukan sudah
            pernah digunakan</li>
        </ol>
    </div>
</section>
@endsection

@section('script')

@endsection