@extends('frontend.layouts.app')

@section('content')
<section style="background-color: #fcf8F0;">
    <div style="background-color: #FACAC3; height: 350px;"></div>
    <div class="container">
        <div class="row pt-5">
            <div class="col-md-7 col-12 pr-5 col-contact-us">
                <h1 style="font-weight: 700;">Halo, Teman Phoebe</h1>
                <p class="pt-2 text-justify" style="font-weight: 500; font-size: 20px; line-height: 24px;">Kami selalu menerima masukanmu dengan senang hati. Agar
                    pesan dan masukanmu tersampaikan ke tim yang tepat, silakan
                    pilih menu di bawah ini. Baca juga <b>FAQ</b> kami yang bisa menjawab
                    pertanyaanmu.</p>
                <p style="font-weight: 500; font-size: 20px;">Phoebe punya tiga solusi nih buat teman Phoebe:</p>
                <form>
                    <div>
                        <a name="" id="" class="btn btn-primary  rounded text-left" href="{{ route('contact_us_email') }}" role="button" style="background-color: #fcf8F0; border-color: #f3795c; font-size: 18px; color: black; width: 100%; text-decoration: none;">Chat via Email</a>
                    </div>
                    <div class="pt-3">
                        <a name="" id="" class="btn btn-primary  rounded text-left" href="https://wa.me/6283831450890?text=Halo%20Phoebe's" role="button" style="background-color: #fcf8F0; border-color: #f3795c; font-size: 18px; color: black; width: 100%; text-decoration: none;">Chat via Whatsapp</a>
                    </div>
                    <div class="pt-3">
                        <a name="" id="" class="btn btn-primary  rounded text-left" href="#" role="button" style="background-color: #fcf8F0; border-color: #f3795c; font-size: 18px; color: black; width: 100%; text-decoration: none;">Video call dengan Phoebe Advisor</a>
                    </div>
                </form>
            </div>
            <div class="col-md-5 col-12 pl-5 col-contact-us col-contact-us-detail" style="border: #f3795c solid 1px; background-color: #fcf8F0; border-radius: 4px; width: 70%;">
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
        <div class="mt-5" style="background-color: #FEF6E8;">
            <div class="row py-5 contact-us-img">
                <div class="col-4">
                    <div class="text-center">
                        <a href="{{ route('contact_us_email') }}">
                            <img src="{{ asset('frontend/images/contact-us/email.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 50px;">
                            <p class="pt-3 mb-0" style="color: #f3795c; font-size: 19px; font-weight: 500;">CHAT VIA EMAIL</p>
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="text-center">
                        <img src="{{ asset('frontend/images/contact-us/wa.png') }}" class="wa img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 60px;">
                        <p class="pt-3 mb-0" style="color: #f3795c; font-size: 19px; font-weight: 500;">CHAT VIA WHATSAPP</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="text-center">
                        <img src="{{ asset('frontend/images/contact-us/vc.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 50px;">
                        <p class="pt-3 mb-0" style="color: #f3795c; font-size: 19px; font-weight: 500;">VIDEO CALL <br> DENGAN PHOEBE ADVISOR</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-4" style="border-bottom: #f3795c solid 1px;"></div>
    </div>
    <div class="row pb-5">
        <div class="col-1"></div>
        <div class="col-10">
            <h1 class="pt-4 text-center"><b>FAQ</b> </h1>
            <div class="accordion md-accordion pt-3 accordion-contact-us" id="accordionEx" role="tablist" aria-multiselectable="true">
                <div class="card" style="background-color: #fcf8F0; border: none; border-bottom: 1px solid #f3795c;">
                    <a data-toggle="collapse" data-parent="#accordionEx" href="#collapse1" aria-expanded="false" aria-controls="collapse1" style="text-decoration: none;">
                        <div class="card-header" role="tab" id="heading1" style="background-color: #fcf8F0; border: none;">
                            <h7 class="mb-0" style="color: black; font-weight: 600; font-size: 19px;">
                                PENGIRIMAN BERASAL DARI MANA? <span class="float-right"> <i class="fa fa-plus" aria-hidden="true" style="color: #f3795c;"></i></span>
                            </h7>
                        </div>
                    </a>
                    <div id="collapse1" class="collapse" role="tabpanel" aria-labelledby="heading1" data-parent="#accordionEx">
                        <div class="card-body">
                            <p style="font-size: 16px;">Semua pengiriman yang dilakukan Ponny Beaute berasal dari Jakarta, Indonesia</p>
                        </div>
                    </div>
                </div>
                <div class="card pt-3" style="background-color: #fcf8F0; border: none; border-bottom: #f3795c solid 1px;">
                    <a data-toggle="collapse" data-parent="#accordionEx" href="#collapse2" aria-expanded="false" aria-controls="collapse2" style="text-decoration: none;">
                        <div class="card-header" role="tab" id="heading2" style="background-color: #fcf8F0; border: none;">
                            <h7 class="mb-0" style="color: black; font-weight: 600; font-size: 19px;">
                                PENGIRIMAN BERASAL DARI MANA? <span class="float-right"> <i class="fa fa-plus" aria-hidden="true" style="color: #f3795c;"></i></span>
                            </h7>
                        </div>
                    </a>
                    <div id="collapse2" class="collapse" role="tabpanel" aria-labelledby="heading2" data-parent="#accordionEx">
                        <div class="card-body">
                            <p style="font-size: 16px;">Semua pengiriman yang dilakukan Ponny Beaute berasal dari Jakarta, Indonesia</p>
                        </div>
                    </div>
                </div>
                <div class="card pt-3" style="background-color: #fcf8F0; border: none; border-bottom: #f3795c solid 1px;">
                    <a data-toggle="collapse" data-parent="#accordionEx" href="#collapse3" aria-expanded="false" aria-controls="collapse3" style="text-decoration: none;">
                        <div class="card-header" role="tab" id="heading3" style="background-color: #fcf8F0; border: none;">
                            <h7 class="mb-0" style="color: black; font-weight: 600; font-size: 19px;">
                                PENGIRIMAN BERASAL DARI MANA? <span class="float-right"> <i class="fa fa-minus" aria-hidden="true" style="color: #f3795c;"></i></span>
                            </h7>
                        </div>
                    </a>
                    <div id="collapse3" class="collapse" role="tabpanel" aria-labelledby="heading3" data-parent="#accordionEx">
                        <div class="card-body">
                            <p style="font-size: 16px;">Semua pengiriman yang dilakukan Ponny Beaute berasal dari Jakarta, Indonesia</p>
                        </div>
                    </div>
                </div>
                <div class="card pt-3" style="background-color: #fcf8F0; border: none; border-bottom: #f3795c solid 1px;">
                    <a data-toggle="collapse" data-parent="#accordionEx" href="#collapse4" aria-expanded="false" aria-controls="collapse4" style="text-decoration: none;">
                        <div class="card-header" role="tab" id="heading4" style="background-color: #fcf8F0; border: none;">
                            <h7 class="mb-0" style="color: black; font-weight: 600; font-size: 19px;">
                                PENGIRIMAN BERASAL DARI MANA? <span class="float-right"> <i class="fa fa-minus" aria-hidden="true" style="color: #f3795c;"></i></span>
                            </h7>
                        </div>
                    </a>
                    <div id="collapse4" class="collapse" role="tabpanel" aria-labelledby="heading4" data-parent="#accordionEx">
                        <div class="card-body">
                            <p style="font-size: 16px;">Semua pengiriman yang dilakukan Ponny Beaute berasal dari Jakarta, Indonesia</p>
                        </div>
                    </div>
                </div>
                <div class="card pt-3" style="background-color: #fcf8F0; border: none; border-bottom: #f3795c solid 1px;">
                    <a data-toggle="collapse" data-parent="#accordionEx" href="#collapse5" aria-expanded="false" aria-controls="collapse5" style="text-decoration: none;">
                        <div class="card-header" role="tab" id="heading5" style="background-color: #fcf8F0; border: none;">
                            <h7 class="mb-0" style="color: black; font-weight: 600; font-size: 19px;">
                                PENGIRIMAN BERASAL DARI MANA? <span class="float-right"> <i class="fa fa-minus" aria-hidden="true" style="color: #f3795c;"></i></span>
                            </h7>
                        </div>
                    </a>
                    <div id="collapse5" class="collapse" role="tabpanel" aria-labelledby="heading5" data-parent="#accordionEx">
                        <div class="card-body">
                            <p style="font-size: 16px;">Semua pengiriman yang dilakukan Ponny Beaute berasal dari Jakarta, Indonesia</p>
                        </div>
                    </div>
                </div>
                <div class="card pt-3" style="background-color: #fcf8F0; border: none; border-bottom: #f3795c solid 1px;">
                    <a data-toggle="collapse" data-parent="#accordionEx" href="#collapse6" aria-expanded="false" aria-controls="collapse6" style="text-decoration: none;">
                        <div class="card-header" role="tab" id="heading6" style="background-color: #fcf8F0; border: none;">
                            <h7 class="mb-0" style="color: black; font-weight: 600; font-size: 19px;">
                                PENGIRIMAN BERASAL DARI MANA? <span class="float-right"> <i class="fa fa-minus" aria-hidden="true" style="color: #f3795c;"></i></span>
                            </h7>
                        </div>
                    </a>
                    <div id="collapse6" class="collapse" role="tabpanel" aria-labelledby="heading6" data-parent="#accordionEx">
                        <div class="card-body">
                            <p style="font-size: 16px;">Semua pengiriman yang dilakukan Ponny Beaute berasal dari Jakarta, Indonesia</p>
                        </div>
                    </div>
                </div>
                <div class="card pt-3" style="background-color: #fcf8F0; border: none; border-bottom: #f3795c solid 1px;">
                    <a data-toggle="collapse" data-parent="#accordionEx" href="#collapse7" aria-expanded="false" aria-controls="collapse7" style="text-decoration: none;">
                        <div class="card-header" role="tab" id="heading7" style="background-color: #fcf8F0; border: none;">
                            <h7 class="mb-0" style="color: black; font-weight: 600; font-size: 19px;">
                                PENGIRIMAN BERASAL DARI MANA? <span class="float-right"> <i class="fa fa-minus" aria-hidden="true" style="color: #f3795c;"></i></span>
                            </h7>
                        </div>
                    </a>
                    <div id="collapse7" class="collapse" role="tabpanel" aria-labelledby="heading7" data-parent="#accordionEx">
                        <div class="card-body">
                            <p style="font-size: 16px;">Semua pengiriman yang dilakukan Ponny Beaute berasal dari Jakarta, Indonesia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
</section>
@endsection

@section('script')

@endsection