@extends('frontend.layouts.app')

@section('style')
    <style>
        select > option {
            background-color: #FCF8F0;
        }
    </style>
@endsection

@section('content')
<section style="background-color: #fcf8F0;">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="row py-5">
                <div class="col-md-6 col-12">
                    <h4 style="font-weight: 700;">HUBUNGI KAMI</h4>
                    <p class="text-justify" style="font-weight: 500; font-size: 16px;">Kami selalu menerima masukanmu dengan senang hati. Agar
                        pesan dan masukanmu tersampaikan ke tim yang tepat, silakan
                        pilih menu di bawah ini. Baca juga <b>FAQ</b> kami yang bisa menjawab
                        pertanyaanmu.</p>
                    <form action="/sendEmail" method="POST">
                        @csrf
                        <div>
                            <input type="text" name="name" id="name" class="form-control" value="{{Auth::check()?Auth::user()->name : ''}}" placeholder="Nama" style="background-color: #fcf8F0; border-color: #f3795c;" required>
                        </div>
                        <div class="pt-3">
                            <input type="email" name="email" id="email" class="form-control" value="{{Auth::check() ? Auth::user()->email : ''}}" placeholder="Email" style="background-color: #fcf8F0; border-color: #f3795c;" required>
                        </div>
                        <div class="pt-3">
                            <!-- <div class="dropdown">
                                <input type="hidden" name="title" id="title">
                                <button class="btn btn-secondary dropdown-toggle perihal-button text-left" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #fcf8F0; border-color: #f3795c; width: 100%; color: #6C757D;">Perihal<i class="fa fa-chevron-down float-right" aria-hidden="true" style="color: #f3795c;"></i></button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="background-color: #fcf8F0; border-color: #f3795c; width: 100%;">
                                    <a class="dropdown-item filter-perihal" id="ph-komplain">Komplain</a>
                                    <a class="dropdown-item filter-perihal">Pengembalian Barang</a>
                                    <a class="dropdown-item filter-perihal">Pengembalian Dana</a>
                                    <a class="dropdown-item filter-perihal">Lainnya</a>
                                </div>
                            </div> -->

                            <select class="custom-select" id="perihal" style="border-color:#F3795C;background-color:#FCF8F0 !important;">
                                <option disabled selected>Contact Admin</option>
                                <option value="1">Komplain</option>
                                <option value="2">Pengembalian Barang</option>
                                <option value="3">Pengembalian Dana</option>
                                <option value="4">Lainnya</option>
                            </select>
                        </div>
                        <div class="pt-3">
                            <textarea class="form-control" name="text" id="teks" placeholder="Pesan" style="background-color: #fcf8F0; border-color: #f3795c;" rows="7" required></textarea>
                        </div>
                    </form>
                    <button type="submit" id="komplain" class="btn btn-danger text-center btn-mskkeranjang font-weight-bold py-2 px-5 mt-4">Komplain</button>
                </div>
                <div class="col-md-6 col-12 pl-5 col-contact-us col-contact-us-detail" style="border: #f3795c solid 1px; background-color: #fcf8F0; border-radius: 4px; width: 70%;">
                    <p class="pt-4 mb-0" style="font-size: 16px;"><b>Kantor Pusat</b></p>
                    <p style="font-weight: 500; font-size: 16px;">PT Ponny Beaute Indonesia <br>
                        Pluit Village Mall, Unit no.70, <br>
                        Jl. Pluit Indah No.12 <br>
                        Penjaringan, Jakarta Utara, 14450</p>
                    <p class="mb-0" style="font-size: 16px;"><b>Keperluan Kerja Sama</b></p>
                    <p style="font-size: 16px;"><a href="mailto:marketing@ponnybeaute.com" style="font-weight: 500; color: black;">marketing@ponnybeaute.com</a></p>
                    <p class="mb-0" style="font-size: 16px;"><b>Operasional & Layanan Konsumen</b></p>
                    <p style="font-weight: 500; font-size: 16px;">Senin - Sabtu <br>
                        Pukul 10.00 - 18.00 WIB</p>
                    <p class="mb-0" style="font-size: 16px;"><b>Email</b></p>
                    <p style="font-size: 16px;"><a href="mailto:cs@ponnybeaute.com" style="font-weight: 500; color: black;">cs@ponnybeaute.com</a></p>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</section>
@endsection

@section('script')
<script>
    $(document).ready(function() {

        $("#komplain").click(function(e) {

            var data = {
                emailfrom: $("#email").val(),
                subject: $('#perihal :selected').text(),
                name: $("#name").val(),
                text: $("#teks").val(),
                _token: '{{ csrf_token() }}',
            };
            e.preventDefault()
            
            if (data.emailfrom == "") {
                alert("kolom email harus terisi")
            } else {
                if (data.subject.toLowerCase() == "contact admin") {
                    alert('Pastikan anda telah memilih Perihal Komplain dengan benar')
                } else {
                    $.post(`{{route('sendEmail')}}`, data, function(d) {
                        $("#email").val("");
                        $("#title").val("");
                        $("#name").val("");
                        $("#teks").val("");
                        $("#ph-komplain").trigger('click');
                        showFrontendAlert('success', 'Your complain has sended');
                    });
                }
            }
        })
    });
</script>
@endsection