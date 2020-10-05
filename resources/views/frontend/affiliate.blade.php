@extends('frontend.layouts.app')

@section('style')
<style>
    .gender-affiliate {
    /* Hide original inputs */
        visibility: hidden;
        position: absolute;
    }

    .gender-affiliate + .jeniskelamin-aff:before {
        height:13px;
        width:13px;
        margin-right: 2px;
        content: " ";
        display:inline-block;
        vertical-align: baseline;
        border:1px solid black;
    }

    .gender-affiliate:checked + .jeniskelamin-aff:before {
        background:#F3795C;
    }

    /* CUSTOM RADIO AND CHECKBOX STYLES */
    .gender-affiliate + .jeniskelamin-aff:before{
        border-radius:50%;
    }
</style>
@endsection

@section('content')
<section style="background-color: #fcf8F0;">
    <div class="modal fade" id="modelLoginAffiliate" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: #FCF8F0;">
                <div class="modal-header" style="border-bottom-color: transparent;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #f3795c;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div style="text-align: left;">
                            <p class="mb-0" style="font-size: 17px; font-weight: 700;">HALO PARTNER PHOEBE!</p>
                            <p style="font-weight: 500; font-size: 15px;">Masukkan email dan password kamu untuk masuk</p>
                        </div>
                        <form method="post"  role="form" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="pt-2">
                                <input type="email" name="email" class="form-control" placeholder="Email" style="background-color: white; border-color: #f3795c;">
                            </div>
                            <div class="pt-3">
                                <input type="password" name="password" class="form-control" placeholder="Password" style="background-color: white; border-color: #f3795c;">
                            </div>
                            <div class="text-right pt-2">
                                <a href="{{ route('password.request') }}" style="text-decoration: underline; color: #A4A29D; font-size: 14px;">Lupa kata sandi Anda?</a>
                            </div>
                       
                        <div class="pt-4">
                            <button type="submit" class="btn btn-secondary mx-auto" style="border-color: #f3795c; background-color: #f3795c; width: 100%;">MASUK</button>
                        </div>
                         </form>
                        <div class="text-center pt-3">
                            <p style="color: #BCBDC0; font-size: 12px;">Dengan melakukan pendaftaran kamu telah menyetujui <br>
                               <a href="" style="color: #1474BC;">Kebijakan Privasi</a>  dan <a href="" style="color: #1474BC;">Syarat & Ketentuan</a> 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img class="d-block w-100 lazyload" src="{{ asset('frontend/images/placeholder-rect.jpg') }}" alt="">
    <div class="container" >
        <div class="mt-5" style="background-color: #FEF6E8;">
            <h1 class="text-center pt-4 font-weight-bold">Yuk Join <br>
                dan Dapatkan Keuntungan</h1>
            <p class="text-center pb-4" style="font-size: 22px;">Isi formulir di bawah ini dan Tim Phoebe akan menghubungi kalian lebih lanjut</p>
        </div>
        <div class="row py-5 button-affiliate">
            <div class="col-md-8 col-12 mx-auto">
                <div class="row">
                    <div class="col-6 text-right py-5 mb-5">
                        <img src="{{ asset('frontend/images/affiliate/influencer.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} img-influencer img-button" alt="" style="width: 80%; cursor: pointer;">
                        <a name="" id="" data-toggle="modal" data-target="#modelLoginAffiliate" class="btn btn-danger btn-pakai py-3 px-5 rounded button-affiliate-influencer" href="#" role="button" style="display: none;"><p class="mb-0 text-center btn-affiliate" style="font-size: 26px; font-weight: 600;">MASUK</p></a>
                        <a name="" id="" data-toggle="modal" data-target="#modelLoginAffiliate" class="btn btn-danger btn-pakai py-3 px-5 rounded button-affiliate-company" href="#" role="button" style="display: none;"><p class="mb-0 text-center btn-affiliate" style="font-size: 26px; font-weight: 600;">MASUK</p></a>
                    </div>
                    <div class="col-6 text-left py-5 mb-5">
                        <img src="{{ asset('frontend/images/affiliate/company.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} img-company img-button" alt="" style="width: 80%; cursor: pointer;">
                        <a name="" id="" class="btn btn-danger btn-pakai py-3 px-5 rounded button-affiliate-influencer button-register-influencer" href="#" role="button" style="display: none;"><p class="mb-0 text-center btn-affiliate" style="font-size: 26px; font-weight: 600;">DAFTAR</p></a>
                        <a name="" id="" class="btn btn-danger btn-pakai py-3 px-5 rounded button-affiliate-company button-register-company" href="#" role="button" style="display: none;"><p class="mb-0 text-center btn-affiliate" style="font-size: 26px; font-weight: 600;">DAFTAR</p></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row py-5 register-influencer" style="display: none;" autocomplete="off">
            <div class="col-7 mx-auto">
                <form action="{{ route('affiliate.new') }}" method="post">
                    <input type="hidden" name="type" value="influencer">
                    @csrf
                    <div class="pt-5">
                        <label for="form-input-nama" style="font-weight: 700; font-size: 14px;">Nama Lengkap<sup style="color: #F3795C;">*</sup></label>
                        <input type="text" class="form-control rounded" id="form-input-nama" style="background-color: white; border-color: #f3795c;" name="name" required>
                    </div>
                    @if(Auth::check())
                    <div class="pt-4">
                        <label for="form-input-email" style="font-weight: 700; font-size: 14px;">Email<sup style="color: #F3795C;">*</sup></label>
                        <input type="email" class="form-control rounded" id="form-input-email" style="background-color: white; border-color: #f3795c;" name="email" value="{{ Auth::user()->email }}" readonly>
                    </div>
                    @else
                    <div class="pt-4">
                        <label for="form-input-email" style="font-weight: 700; font-size: 14px;">Email<sup style="color: #F3795C;">*</sup></label>
                        <input type="email" class="form-control rounded" id="form-input-email" style="background-color: white; border-color: #f3795c;" name="email" required>
                    </div>
                    @endif
                    @if(!Auth::check())
                    <div class="pt-4">
                        <label for="form-input-email" style="font-weight: 700; font-size: 14px;">Password<sup style="color: #F3795C;">*</sup></label>
                        <input type="password" class="form-control rounded" id="form-input-email" style="background-color: white; border-color: #f3795c;" autocomplete="off" name="password" required>
                    </div>
                    <div class="pt-4">
                        <label for="form-input-email" style="font-weight: 700; font-size: 14px;">Konfirmasi Password<sup style="color: #F3795C;">*</sup></label>
                        <input type="password" class="form-control rounded" id="form-input-email" style="background-color: white; border-color: #f3795c;" autocomplete="off" name="password_confirmation" required>
                    </div>
                    @endif
                    <div class="pt-4">
                        <label for="form-input-hp" style="font-weight: 700; font-size: 14px;">Nomor Handphone (PIC)<sup style="color: #F3795C;">*</sup></label>
                        <input type="number" class="form-control rounded" id="form-input-hp" style="background-color: white; border-color: #f3795c;" name="nomor_hp_pic" required>
                    </div>
                    <div class="pt-4">
                        <label for="form-input-toko" style="font-weight: 700; font-size: 14px;">Nama Social Media<sup style="color: #F3795C;">*</sup></label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend" style="width: 30px;">
                                <div class="input-group-text" style="background-color: white; border-color: #f3795c; border-right-color: transparent;"><i class="fa fa-instagram" aria-hidden="true" style="color: #f3795c;"></i></div>
                            </div>
                            <input type="text" class="form-control rounded" id="inlineFormInputGroup" placeholder="Username" style="background-color: white; border-color: #f3795c; border-left-color: transparent;" name="username_ig" required>
                        </div>
                        <div class="input-group mb-2 pt-2">
                            <div class="input-group-prepend" style="width: 30px;">
                                <div class="input-group-text" style="background-color: white; border-color: #f3795c; border-right-color: transparent;"><i class="fa fa-facebook" aria-hidden="true" style="color: #f3795c;"></i></div>
                            </div>
                            <input type="text" class="form-control rounded" id="inlineFormInputGroup" placeholder="Username" style="background-color: white; border-color: #f3795c; border-left-color: transparent;"  name="username_fb" required>
                        </div>
                        <div class="input-group mb-2 pt-2">
                            <div class="input-group-prepend" style="width: 30px;">
                                <div class="input-group-text" style="background-color: white; border-color: #f3795c; border-right-color: transparent;"><i class="fa fa-twitter" aria-hidden="true" style="color: #f3795c;"></i></div>
                            </div>
                            <input type="text" class="form-control rounded" id="inlineFormInputGroup" placeholder="Username" style="background-color: white; border-color: #f3795c; border-left-color: transparent;" name="username_tw" required>
                        </div>
                        <div class="input-group mb-2 pt-2">
                            <div class="input-group-prepend" style="width: 30px;">
                                <div class="input-group-text" style="background-color: white; border-color: #f3795c; border-right-color: transparent;"><i class="fa fa-youtube-play" aria-hidden="true" style="color: #f3795c;"></i></div>
                            </div>
                            <input type="text" class="form-control rounded" id="inlineFormInputGroup" placeholder="Username" style="background-color: white; border-color: #f3795c; border-left-color: transparent;" name="username_yt" required>
                        </div>
                    </div>
                    <div class="pt-4">
                        <label for="form-input-kelamin" style="font-weight: 700; font-size: 14px;">Jenis Kelamin<sup style="color: #F3795C;">*</sup></label>
                        <div>
                            <input type="radio" class="gender-affiliate" name="jeniskelamin_influencer" value="P" id="r1" required><label class="jeniskelamin-aff mr-3" for="r1"><p class="mb-2 ml-2 d-inline" style="font-size: 14px;">Perempuan</p></label>
                            <input type="radio"  class="gender-affiliate" name="jeniskelamin_influencer" value="L" id="r2" required><label class="jeniskelamin-aff mr-3" for="r2"><p class="mb-2 ml-2 d-inline" style="font-size: 14px;">Laki-laki</p></label>
                        </div>
                    </div>
                    <div class="pt-4">
                        <button type="submit" class="btn btn-danger btn-pakai rounded text-center px-4" href="#" role="button" style="font-size: 17px; text-decoration: none;">KIRIM</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row py-5 register-company" style="display: none;">
            <div class="col-7 mx-auto">
                <form action="{{ route('affiliate.new') }}" method="post">
                    <input type="hidden" name="type" value="company">
                    @csrf
                    <div class="pt-5">
                        <label for="form-input-nama" style="font-weight: 700; font-size: 14px;">Nama Lengkap<sup style="color: #F3795C;">*</sup></label>
                        <input type="text" class="form-control rounded" id="form-input-nama" style="background-color: white; border-color: #f3795c;" name="name" required>
                    </div>
                    @if(Auth::check())
                    <div class="pt-4">
                        <label for="form-input-email" style="font-weight: 700; font-size: 14px;">Email<sup style="color: #F3795C;">*</sup></label>
                        <input type="email" class="form-control rounded" id="form-input-email" style="background-color: white; border-color: #f3795c;" name="email" value="{{ Auth::user()->email }}" readonly>
                    </div>
                    @else
                    <div class="pt-4">
                        <label for="form-input-email" style="font-weight: 700; font-size: 14px;">Email<sup style="color: #F3795C;">*</sup></label>
                        <input type="email" class="form-control rounded" id="form-input-email" style="background-color: white; border-color: #f3795c;" name="email" required>
                    </div>
                    @endif
                    @if(!Auth::check())
                    <div class="pt-4">
                        <label for="form-input-email" style="font-weight: 700; font-size: 14px;">Password<sup style="color: #F3795C;">*</sup></label>
                        <input type="password" class="form-control rounded" id="form-input-email" style="background-color: white; border-color: #f3795c;" autocomplete="off" name="password" required>
                    </div>
                    <div class="pt-4">
                        <label for="form-input-email" style="font-weight: 700; font-size: 14px;">Konfirmasi Password<sup style="color: #F3795C;">*</sup></label>
                        <input type="password" class="form-control rounded" id="form-input-email" style="background-color: white; border-color: #f3795c;" autocomplete="off" name="password_confirmation" required>
                    </div>
                    @endif
                    <div class="pt-4">
                        <label for="form-input-hp" style="font-weight: 700; font-size: 14px;">Nomor Handphone (PIC)<sup style="color: #F3795C;">*</sup></label>
                        <input type="number" class="form-control" id="form-input-hp" style="background-color: white; border-color: #f3795c;" name="nomor_hp_pic" required>
                    </div>
                    <div class="pt-4">
                        <label for="form-input-toko" style="font-weight: 700; font-size: 14px;">Toko/Nama Perusahaan<sup style="color: #F3795C;">*</sup></label>
                        <input type="text" class="form-control" id="form-input-toko" style="background-color: white; border-color: #f3795c;"  name="nama_perusahaan" required>
                    </div>
                    <div class="pt-4">
                        <label for="form-input-alamat" style="font-weight: 700; font-size: 14px;">Alamat Toko/Perusahaan<sup style="color: #F3795C;">*</sup></label>
                        <input type="text" class="form-control" id="form-input-alamat" style="background-color: white; border-color: #f3795c;" name="alamat_perusahaan" required >
                    </div>
                    <div class="pt-4">
                        <label for="form-input-hpper" style="font-weight: 700; font-size: 14px;">Nomor Handphone Perusahaan<sup style="color: #F3795C;">*</sup></label>
                        <input type="number" class="form-control" id="form-input-hpper" style="background-color: white; border-color: #f3795c;" name="nomor_hp_perusahaan" required>
                    </div>
                    <div class="pt-4">
                        <label for="form-input-deskripsi" style="font-weight: 700; font-size: 14px;">Deskripsi Produk<sup style="color: #F3795C;">*</sup></label>
                        <textarea placeholder="Deskripsi mengenai merek/produk anda..." class="form-control p-3 rounded" rows="8" style="border-color: #F3795C;" name="deskripsi_produk" maxlength="4000" required></textarea>
                    </div>
                    <div class="pt-4">
                        <label for="form-input-kelamin" style="font-weight: 700; font-size: 14px;">Jenis Kelamin<sup style="color: #F3795C;">*</sup></label>
                       <div>
                            <input type="radio" class="gender-affiliate" name="jeniskelamin_company" value="P" id="r3" required><label class="jeniskelamin-aff mr-3" for="r3"><p class="mb-2 ml-2 d-inline" style="font-size: 14px;">Perempuan</p></label>
                            <input type="radio"  class="gender-affiliate" name="jeniskelamin_company" value="L" id="r4" required><label class="jeniskelamin-aff mr-3" for="r4"><p class="mb-2 ml-2 d-inline" style="font-size: 14px;" >Laki-laki</p></label>
                        </div>
                    </div>
                    <div class="pt-4">
                        <button type="submit" class="btn btn-danger btn-pakai rounded text-center px-4" href="#" role="button" style="font-size: 17px; text-decoration: none;">KIRIM</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')

<script>
    $(".img-influencer").click(function(){
        $(".button-affiliate-influencer").show(300);
        $(".button-affiliate-company").hide(300);
        $(".img-button").hide(300);
    });
    $(".img-company").click(function(){
        $(".button-affiliate-company").show(300);
        $(".button-affiliate-influencer").hide(300);
        $(".img-button").hide(300);
    });
    $(".button-register-influencer").click(function(){
        $(".button-affiliate").hide(300);
        $(".register-influencer").show(300);
    });
    $(".button-register-company").click(function(){
        $(".button-affiliate").hide(300);
        $(".register-company").show(300);
    });
</script>

@endsection