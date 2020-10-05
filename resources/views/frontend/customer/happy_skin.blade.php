@extends('frontend.layouts.app')

@section('content')
@php
            
    $orderU = \App\Order::where('user_id', Auth::user()->id);
    $log = new \App\Membership_user_log;
    $tiers = new \App\Membership;

    $u_log = $log->where('user_id',Auth::user()->id)->with('membership')->orderBy('created_at','desc')->first();
    $order = $orderU->where('payment_status',"paid")->whereBetween('created_at',[$u_log->created_at,$u_log->ends_on]);
    $totalOrder = $order->sum('grand_total');
    //dd($totalOrder);

    $n_tier = $tiers->where('min',">=",$u_log->membership->min)->first();
    $next = '';
    $next_max = '';
    $to_next = 0;
    $ct = $u_log->membership->title;
    if(isset($n_tier)){
        if($n_tier->id == $u_log->member_id){
            $n_tier = $tiers->where('min',">=",$n_tier->min)->get()[1];
        }
        $next = $n_tier->title;
        $next_max = $n_tier->min;
        $to_next = (int)$next_max - (int)$totalOrder;
    }
    

    

    function toRp($max){return 'Rp. '.strrev(implode('.',str_split(strrev(strval($max)),3)));}
   

    function percentage($max,$min,$input){
        $range = $max-$min;
        $correctedStartValue = $input-$min;
        $percentage = ($correctedStartValue * 100) / $range;
        return $percentage;
    }
    
    $percent = $totalOrder != 0 ? ($totalOrder/$next_max)*100 : '';
    //dd($percent)
@endphp
    <section class="gry-bg pb-4 profile" style="background-color: #FCF8F0;">
        <h1 class="font-weight-bold h3 mb-5 py-5 text-center" style="background-color: #F3795C; color: white;">PHOEBE’S SQUAD</h1>
        @include('frontend.inc.account_mobile_menu')
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-3 d-none d-lg-block">
                    @if(Auth::user()->user_type == 'seller')
                        @include('frontend.inc.seller_side_nav')
                    @elseif(Auth::user()->user_type == 'customer')
                        @include('frontend.inc.customer_side_nav')
                    @endif
                </div>

                <div class="col-lg-9">
                    <div class="text-center" style="border-bottom: 1px solid #F3795C;">
                        <h1 class="title-address py-2 mb-0 font-weight-bold heading heading-4">KEUNTUNGAN HAPPY SKIN REWARD</h1>
                    </div>
                    <div class="py-3">
                        <div class="py-4">
                            <div class="my-2 py-4" style="background-color: white;">
                                <h1 class="font-weight-bold h2 text-center">HAPPY SKIN REWARD</h1>
                                <p class="text-center" style="text-transform: uppercase;">{{Auth::check() ? Auth::user()->name : 'ANINDITA ANITA'}}</p>
                                <div class="row">
                                    <div class="col-3 text-right">
                                        <img src="{{ asset('frontend/images/happy-skin/'.strtoLower($ct).'-skin.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} img-happy" alt="" style="height: 50px;">
                                    </div>
                                    <!-- <div class="col-6 my-auto">
                                        <div class="progress " style="background-color: #FCE6E0; height: 13px;">
                                            <div class="progress-bar w-80" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="background-color: #f3795c; height: 13px;"></div>
                                        </div>
                                    </div> -->
                                    <div class="col-6 my-auto">
                                    <div class="progress" style="background-color: #FCE6E0;height: 13px;">
                                        <div class="progress-bar" role="progressbar" style="width: {{$to_next > 0? $percent:'100'}}%; background-color: #F3795C;height: 13px;" aria-valuenow="{{$to_next > 0? $percent:'100'}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    </div>
                                    <div class="col-3 text-left">
                                        <img src="{{ asset('frontend/images/happy-skin/'.strtoLower($next).'-skin.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} img-happy" alt="" style="height: 50px;">
                                    </div>
                                </div>
                                @php

                                @endphp

                                <!-- <p class="text-center pt-2 mb-0" style="font-size: 12px;">Belanja 1.750.000 lagi untuk naik tingkat ke Healthy Skin</p> -->
                                @if($to_next > 0)
                                <p class="text-center pt-2 mb-0" style="font-size: 12px;">Belanja {{toRp($to_next)}} lagi untuk naik tingkat ke <span style="text-transform: capitalize;">{{$next}}</span></p>
                                @else
                                <p class="text-center pt-2 mb-0" style="font-size: 12px;">Luar biasa! anda sudah mencapai level <span style="text-transform: capitalize;">maximum</span></p>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-10 mx-auto">
                                    <h1 class="font-weight-bold h2 text-center pt-2">KUMPULKAN POIN</h1>
                                <p class="text-center" style="font-size: 14px; font-weight: 600;">Wujudkan impian happy skin dan dapatkan keuntungan menarik 
                                    lainnya melalui poin yang bisa kamu dapatkan dengan cara-cara berikut:</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9 col-12 mx-auto">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="text-center my-auto">
                                                <img src="{{ asset('frontend/images/kumpulkan-poin/bag-happy-skin.png') }}" alt="" style="height: 60px;">
                                                <p class="mb-0 pt-2" style="font-size: 12px;"><b>Belanja</b><br> Dapatkan 10 poin setiap pembelanjaan senilai Rp. 25.000</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="text-center my-auto">
                                                <img src="{{ asset('frontend/images/kumpulkan-poin/daftar-akun.png') }}" alt="" style="height: 60px;">
                                                <p class="mb-0 pt-2" style="font-size: 12px;"><b>Daftar Akun</b><br> Dapatkan 50 poin dengan membuat akun</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="text-center my-auto">
                                                <img src="{{ asset('frontend/images/kumpulkan-poin/lengkapi-beauty.png') }}" alt="" style="height: 60px;">
                                                <p class="mb-0 pt-2" style="font-size: 12px;"><b>Lengkapi Beauty Profile</b><br>Dapatkan 50 poin setelah melengkapi Beauty Profile</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row pt-4">
                                <div class="col-md-9 col-12 mx-auto">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="text-center my-auto">
                                                <img src="{{ asset('frontend/images/kumpulkan-poin/ulang-tahun.png') }}" alt="" style="height: 60px;">
                                                <p class="mb-0 pt-2" style="font-size: 12px;"><b>Ulang Tahun</b><br> Dapatkan poin 2 kali lebih banyak saat belanja di hari ulang tahun</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="text-center my-auto">
                                                <img src="{{ asset('frontend/images/kumpulkan-poin/ulasan.png') }}" alt="" style="height: 60px;">
                                                <p class="mb-0 pt-2" style="font-size: 12px;"><b>Tulis ulasan produk</b><br>Dapatkan 25 poin setiap meninggalkan 1 ulasan</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="text-center my-auto">
                                                <img src="{{ asset('frontend/images/kumpulkan-poin/download.png') }}" alt="" style="height: 60px;">
                                                <p class="mb-0 pt-2" style="font-size: 12px;"><b>Download Mobile App</b><br>Dapatkan 30 poin dengan mengunduh aplikasi Ponny Beaute</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-5">
                                <h1 class="font-weight-bold h4 text-center">CARA MENDAPATKAN KEUNTUNGAN</h1>
                            </div>
                            <div class="row pt-4">
                                <div class="col-md-9 col-12 mx-auto">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="my-auto text-center">
                                                <img src="{{ asset('frontend/images/keuntungan/buat-akun.png') }}" class="img-keuntungan" alt="" style="height: 100px;">
                                                <p class="mb-0 pt-2" style="font-size: 12px;"><b>BUAT AKUN</b><br>Daftar dengan alamat email aktif</p>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="my-auto text-center">
                                                <img src="{{ asset('frontend/images/keuntungan/kumpulkan-koin.png') }}" class="img-keuntungan" alt="" style="height: 100px;">
                                                <p class="mb-0 pt-2" style="font-size: 12px;"><b>KUMPULKAN POIN</b><br>Dengan terus belanja dan beragam cara lainnya</p>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="my-auto text-center">
                                                <img src="{{ asset('frontend/images/keuntungan/dapatkan-hadiah.png') }}" class="img-keuntungan" alt="" style="height: 100px;">
                                                <p class="mb-0 pt-2" style="font-size: 12px;"><b>DAPATKAN HADIAH</b><br>Tukarkan poin dengan berbagai hadiah eksklusif</p>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="my-auto text-center">
                                                <img src="{{ asset('frontend/images/keuntungan/naik-tingkat.png') }}" class="img-keuntungan" alt="" style="height: 100px;">
                                                <p class="mb-0 pt-2" style="font-size: 12px;"><b>NAIK TINGKAT</b><br>Tingkatkan level membership untuk dapat keuntungan lebih</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center" style="border-bottom: 10px solid #f3795c;">
                                <h1 class=" py-2 mb-0 font-weight-bold h5">KEUNTUNGAN HAPPY SKIN REWARD</h1>
                            </div>
                            <div class="row pt-2">
                                <div class="col-4"></div>
                                <div class="col-2 text-center p-0">
                                    <img src="{{ asset('frontend/images/happy-skin/dewy-skin.png') }}" alt="" class="img-keuntungan-happy" style="height: 40px;">
                                </div>
                                <div class="col-2 text-center p-0">
                                    <img src="{{ asset('frontend/images/happy-skin/healthy-skin.png') }}" alt="" class="img-keuntungan-happy" style="height: 40px;">
                                </div>
                                <div class="col-2 text-center p-0">
                                    <img src="{{ asset('frontend/images/happy-skin/glowing-skin.png') }}" alt="" class="img-keuntungan-happy" style="height: 40px;">
                                </div>
                                <div class="col-2 text-center p-0">
                                    <img src="{{ asset('frontend/images/happy-skin/oh-happy-skin.png') }}" alt=""class="img-keuntungan-happy" style="height: 40px;">
                                </div>
                            </div>
                            <div class="text-center pt-2" style="border-bottom: 5px solid #f3795c;"></div>
                            <div class="row">
                                <div class="col-4 pt-3">
                                    <p style="font-size: 15px; font-weight: 600;">Pembelanjaan dalam 1 tahun</p>
                                </div>
                                <div class="col-2 pt-3 text-center">
                                    <p style="font-size: 15px; font-weight: 600;">1 juta</p>
                                </div>
                                <div class="col-2 pt-3 text-center">
                                    <p style="font-size: 15px; font-weight: 600;">3 juta</p>
                                </div>
                                <div class="col-2 pt-3 text-center">
                                    <p style="font-size: 15px; font-weight: 600;">3-10 juta</p>
                                </div>
                                <div class="col-2 pt-3 text-center">
                                    <p style="font-size: 15px; font-weight: 600;">>10 juta</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 pt-1">
                                    <p style="font-size: 15px; font-weight: 600;">Menukar poin dengan hadiah</p>
                                </div>
                                <div class="col-2 pt-1 text-center">
                                    <i class="fa fa-heart" style="font-size: 20px; color: #F3795C;" aria-hidden="true"></i>
                                </div>
                                <div class="col-2 pt-1 text-center">
                                    <i class="fa fa-heart" style="font-size: 20px; color: #F3795C;" aria-hidden="true"></i>
                                </div>
                                <div class="col-2 pt-1 text-center">
                                    <i class="fa fa-heart" style="font-size: 20px; color: #F3795C;" aria-hidden="true"></i>
                                </div>
                                <div class="col-2 pt-1 text-center">
                                    <i class="fa fa-heart" style="font-size: 20px; color: #F3795C;" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 pt-1">
                                    <p style="font-size: 15px; font-weight: 600;">Poin 2x di Hari Ulang Tahun</p>
                                </div>
                                <div class="col-2 pt-1 text-center">
                                    <i class="fa fa-heart" style="font-size: 20px; color: #F3795C;" aria-hidden="true"></i>
                                </div>
                                <div class="col-2 pt-1 text-center">
                                    <i class="fa fa-heart" style="font-size: 20px; color: #F3795C;" aria-hidden="true"></i>
                                </div>
                                <div class="col-2 pt-1 text-center">
                                    <i class="fa fa-heart" style="font-size: 20px; color: #F3795C;" aria-hidden="true"></i>
                                </div>
                                <div class="col-2 pt-1 text-center">
                                    <i class="fa fa-heart" style="font-size: 20px; color: #F3795C;" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 pt-1">
                                    <p style="font-size: 15px; font-weight: 600;">Gratis Pengiriman Standar</p>
                                </div>
                                <div class="col-2 pt-1 text-center">
                                    <i class="fa fa-heart" style="font-size: 20px; color: #F3795C;" aria-hidden="true"></i>
                                </div>
                                <div class="col-2 pt-1 text-center">
                                    <i class="fa fa-heart" style="font-size: 20px; color: #F3795C;" aria-hidden="true"></i>
                                </div>
                                <div class="col-2 pt-1 text-center">
                                    <i class="fa fa-heart" style="font-size: 20px; color: #F3795C;" aria-hidden="true"></i>
                                </div>
                                <div class="col-2 pt-1 text-center">
                                    <i class="fa fa-heart" style="font-size: 20px; color: #F3795C;" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 pt-1">
                                    <p style="font-size: 15px; font-weight: 600;">Kupon Ulang Tahun</p>
                                </div>
                                <div class="col-2 pt-1 text-center">
                                </div>
                                <div class="col-2 pt-1 text-center">
                                    <i class="fa fa-heart" style="font-size: 20px; color: #F3795C;" aria-hidden="true"></i>
                                </div>
                                <div class="col-2 pt-1 text-center">
                                    <i class="fa fa-heart" style="font-size: 20px; color: #F3795C;" aria-hidden="true"></i>
                                </div>
                                <div class="col-2 pt-1 text-center">
                                    <i class="fa fa-heart" style="font-size: 20px; color: #F3795C;" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 pt-1">
                                    <p style="font-size: 15px; font-weight: 600;">Akses Produk Istimewa</p>
                                </div>
                                <div class="col-2 pt-1 text-center">
                                </div>
                                <div class="col-2 pt-1 text-center">
                                </div>
                                <div class="col-2 pt-1 text-center">
                                    <i class="fa fa-heart" style="font-size: 20px; color: #F3795C;" aria-hidden="true"></i>
                                </div>
                                <div class="col-2 pt-1 text-center">
                                    <i class="fa fa-heart" style="font-size: 20px; color: #F3795C;" aria-hidden="true"></i>
                                </div>
                            </div>
                            
                            <div class="text-center pt-3" style="border-bottom: 1px solid #f3795c;"></div>
                            <div class="pt-3">
                                <h1 class="text-center font-weight-bold">FAQs</h1>
                                <div class="text-center pt-3" style="border-bottom: 1px solid #f3795c;"></div>
                            </div>
                            <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                                <div class="card" style="background-color: #fcf8F0; border: none;">
                                    <a data-toggle="collapse" data-parent="#accordionEx" href="#collapse1" aria-expanded="true"
                                    aria-controls="collapse1" style="text-decoration: none;">  
                                        <div class="card-header" role="tab" id="heading1" style="background-color: #fcf8F0; border: none;">
                                            <h6 class="mb-0 pt-4" style="color: #f3795c; font-weight: 600;">
                                            APA ITU HAPPY SKIN REWARD? <span class="float-right"> <i class="fa fa-minus" aria-hidden="true" style="color: #f3795c;"></i></span>
                                            </h6> 
                                        </div>
                                    </a>
                                <div id="collapse1" class="collapse show" role="tabpanel" aria-labelledby="heading1"
                                    data-parent="#accordionEx">
                                    <div class="card-body">
                                        <p>Happy Skin Reward adalah program reward di mana Anda dapat menjadi anggota membership Ponny Beaute. Sebagai
                                            anggota, Anda harus mempunyai akun, sehingga dapat mengumpulkan poin, menukarkan poin dengan hadiah,
                                            mendapat beragam keuntungan diskon dan promosi lainnya yang secara eksklusif diberikan untuk anggota, serta
                                            informasi kecantikan lainnya.</p> 
                                        <p>Keuntungan-keuntungan tersebut tidak diberikan kepada pembeli tamu (pembeli yang belanja tanpa melakukan
                                            pendaftaran akun).</p>
                                    </div>
                                </div>
                                </div>
                                <div class="text-center pt-2" style="border-bottom: 1px solid #f3795c;"></div>
                                <div class="card" style="background-color: #fcf8F0; border: none;">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapse2"
                                    aria-expanded="false" aria-controls="collapse2" style="text-decoration: none;">
                                        <div class="card-header pt-4" role="tab" id="heading2" style="background-color: #fcf8F0; border: none;">
                                            <h6 class="mb-0" style="color: #f3795c; font-weight: 600;"> 
                                                BAGAIMANA CARA MEMPEROLEH POIN HAPPY SKIN REWARD? <span class="float-right"> <i class="fa fa-minus" aria-hidden="true" style="color: #f3795c;"></i></span>
                                            </h6>
                                        </div>
                                    </a>
                                <div id="collapse2" class="collapse" role="tabpanel" aria-labelledby="heading2"
                                    data-parent="#accordionEx">
                                    <div class="card-body">
                                        <p>Pertama-tama, agar poin dapat terakumulasi, Anda harus melakukan pendaftaran akun dengan alamat email. Setelah
                                            itu, Anda otomatis mendapat 50 poin karena telah menyelesaikan pendaftaran akun
                                            <br>
                                            Beberapa cara lain mendapatkan poin adalah: <br>
                                            • Setiap pembelanjaan senilai Rp. 25.000 = 10 poin <br>
                                            • Mengisi bagian Beauty Profile dengan lengkap = 50 poin <br>
                                            • Belanja di hari ulang tahun Anda = menerima poin 2 kali lipat dari total belanja <br>
                                            • Setiap meninggalkan 1 ulasan produk = 25 poin <br>
                                            • Mengunduh aplikasi Ponny Beaute di ponsel = 30 poin
                                        </p>
                                        <p>Adapun, poin-poin yang Anda kumpulkan dapat ditukarkan untuk mendapatkan berbagai macam hadiah. Klik di sini
                                        untuk melihat jumlah poin dan pilihan hadiah.</p>
                                    </div>
                                </div>
                                </div>
                                <div class="text-center pt-2" style="border-bottom: 1px solid #f3795c;"></div>
                                <div class="card" style="background-color: #fcf8F0; border: none;">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapse3"
                                    aria-expanded="false" aria-controls="collapse3" style="text-decoration: none;">
                                        <div class="card-header pt-4" role="tab" id="heading3" style="background-color: #fcf8F0; border: none;">
                                            <h6 class="mb-0" style="color: #f3795c; font-weight: 600;">
                                            APAKAH POIN YANG SAYA KUMPULKAN BISA KADALUARSA? BAGAIMANA CARA CEK POIN SAYA? <span class="float-right"> <i class="fa fa-minus" aria-hidden="true" style="color: #f3795c;"></i></span>
                                            </h6>
                                        </div>
                                    </a>
                                <div id="collapse3" class="collapse" role="tabpanel" aria-labelledby="heading3"
                                    data-parent="#accordionEx">
                                    <div class="card-body">
                                        <p>Jumlah poin yang sudah dikumpulkan dapat dicek di pilihan Phoebe-ku bersama keterangan lain tentang akun Anda,
                                            lalu pilih Riwayat Poin.</p> 
                                        <p>Poin Anda akan kadaluarsa 365 hari setelah diterima. Jika Anda menerima 50 poin setelah mengisi Beauty Profile
                                            pada tanggal 1 Januari 2020, maka poin tersebut akan kadaluarsa dan tidak dapat digunakan lagi pada tanggal 2 Januari
                                            2021. Jumlah poin Anda pun akan secara otomatis berkurang sebanyak 50 poin.</p>
                                    </div>
                                </div>
                                </div>
                                <div class="text-center pt-2" style="border-bottom: 1px solid #f3795c;"></div>
                                <div class="card" style="background-color: #fcf8F0; border: none;">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapse4"
                                        aria-expanded="false" aria-controls="collapse4" style="text-decoration: none;">
                                        <div class="card-header pt-4" role="tab" id="heading4" style="background-color: #fcf8F0; border: none;">
                                            <h6 class="mb-0" style="color: #f3795c; font-weight: 600;">
                                            BAGAIMANA CARA MENUKARKAN POIN? <span class="float-right"> <i class="fa fa-minus" aria-hidden="true" style="color: #f3795c;"></i></span>
                                            </h6>
                                        </div>
                                    </a> 
                                    <div id="collapse4" class="collapse" role="tabpanel" aria-labelledby="heading4"
                                    data-parent="#accordionEx">
                                    <div class="card-body">
                                        Anda dapat memilih hadiah sesuai dengan poin yang dimiliki di sini. Pengambilan hadiah dapat dilakukan di saat yang
                                        bersamaan dengan checkout pesanan belanja.
                                    </div>
                                    </div>
                                </div>
                                <div class="text-center pt-2" style="border-bottom: 1px solid #f3795c;"></div>
                                <div class="card" style="background-color: #fcf8F0; border: none;">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapse5"
                                    aria-expanded="false" aria-controls="collapse5" style="text-decoration: none;">
                                        <div class="card-header pt-4" role="tab" id="heading5" style="background-color: #fcf8F0; border: none;">
                                            <h6 class="mb-0" style="color: #f3795c; font-weight: 600;">
                                            ADA BERAPA TINGKATAN DALAM HAPPY SKIN REWARD?
                                            BERAPA LAMA MEMBERSHIP SAYA BERLAKU? DAN BAGAIMANA SAYA MEMPERTAHANKAN
                                            STATUS MEMBERSHIP SAYA? <span class="float-right"> <i class="fa fa-minus" aria-hidden="true" style="color: #f3795c;"></i></span>
                                            </h6>
                                        </div>
                                    </a>
                                    <div id="collapse5" class="collapse" role="tabpanel" aria-labelledby="heading5"
                                    data-parent="#accordionEx">
                                    <div class="card-body">
                                            <p>Ada 4 tingkatan dalam Happy Skin Reward, yaitu: <br>
                                            1. Dewy Skin <br>
                                            • Anda mendapat status membership dalam tingkat Dewy Skin jika sudah mengakumulasi total belanja sebesar Rp.
                                            1.000.000 <br>
                                            • Status membership berlaku selama 12 bulan, terhitung sejak Anda memenuhi syarat total belanja <br>
                                            • Untuk naik ke tingkat berikutnya—yaitu Healthy Skin—dalam 12 bulan tersebut, Anda dapat mengakumulasikan
                                            pembelanjaan sebesar Rp. 3.000.000 <br>
                                            • Jika total belanja selama 12 bulan tidak memenuhi yang dibutuhkan untuk naik ke tingkat berikutnya, status
                                            membership Anda tetap dalam tingkat Dewy Skin <br>
                                            • Jika tidak ada pembelanjaan selama 12 bulan, Anda akan kehilangan status membership Dewy Skin <br>
                                            • Bisa ada penjelasan tentang benefit setelah ada informasi lebih lanjut</p> 
                                            <p>2. Healthy Skin br
                                            • Anda mendapat status membership dalam tingkat Healthy Skin jika sudah mengakumulasi total belanja sebesar
                                                Rp. 3.000.000 <br>
                                            • Status membership berlaku selama 12 bulan, terhitung sejak Anda memenuhi syarat total belanja <br>
                                            • Untuk naik ke tingkat berikutnya—yaitu Glowing Skin—dalam 12 bulan tersebut, Anda dapat mengakumulasikan
                                                pembelanjaan antara Rp. 3.000.000 – Rp. 10.000.000 <br>
                                            • Jika total belanja selama 12 bulan tidak memenuhi yang dibutuhkan untuk naik ke tingkat berikutnya, status
                                                membership Anda tetap dalam tingkat Healthy Skin <br>
                                            • Jika tidak ada pembelanjaan selama 12 bulan, Anda akan kehilangan status membership Healthy Skin dan turun ke
                                                tingkat Dewy Skin <br>
                                            • Bisa ada penjelasan tentang benefit setelah ada informasi lebih lanjut</p>
                                            <p>3. Glowing Skin <br>
                                            • Anda mendapat status membership dalam tingkat Glowing Skin jika sudah mengakumulasi total belanja antara
                                                Rp. 3.000.000 – Rp 10.000.000 <br>
                                            • Status membership berlaku selama 12 bulan, terhitung sejak Anda memenuhi syarat total belanja <br>
                                            • Untuk naik ke tingkat berikutnya—yaitu Oh, Happy Skin—dalam 12 bulan tersebut, Anda dapat
                                                mengakumulasikan pembelanjaan di atas Rp. 10.000.000 <br>
                                            • Jika total belanja selama 12 bulan tidak memenuhi yang dibutuhkan untuk naik ke tingkat berikutnya, status
                                                membership Anda tetap dalam tingkat Glowing Skin <br>
                                            • Jika tidak ada pembelanjaan selama 12 bulan, Anda akan kehilangan status membership Glowing Skin dan turun
                                                ke tingkat Healthy Skin <br>
                                            • Bisa ada penjelasan tentang benefit setelah ada informasi lebih lanjut</p>
                                            <p>4. Oh Happy Skin <br>
                                            • Anda mendapat status membership dalam tingkat Oh Happy Skin jika sudah mengakumulasi total belanja di atas
                                                Rp 10.000.000 <br>
                                            • Status membership berlaku selama 12 bulan, terhitung sejak Anda memenuhi syarat total belanja <br>
                                            • Jika tidak ada pembelanjaan selama 12 bulan, Anda akan kehilangan status membership Oh, Happy Skin dan
                                                turun ke tingkat Glowing Skin <br>
                                            • Bisa ada penjelasan tentang benefit setelah ada informasi lebih lanjut</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection

@section('script')
    
@endsection