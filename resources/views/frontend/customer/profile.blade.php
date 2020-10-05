@extends('frontend.layouts.app')

@section('content')

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
                @php
                $user = Auth::user();
                $date = \Carbon\Carbon::parse($user->tgl_lahir);
                @endphp

                <div class="col-lg-9">
                    <div class="text-center" style="border-bottom: 1px solid #F3795C;">
                        <h1 class="title-account py-2 mb-0 font-weight-bold heading heading-4">DETAIL AKUN</h1>
                    </div>
                    <div class="mx-auto rounded-circle my-4" style="width: 120px; height: 120px; border: 2px solid black; position: relative; overflow: hidden; background-image: url('{{ isset($user->avatar_original) ? asset($user->avatar_original) : image_avatar($user->gender) }}'); background-repeat: no-repeat; background-size: cover; background-position: center;">
                        <!-- <img src="{{ isset($user->avatar_original) ? asset($user->avatar_original) : image_avatar($user->gender) }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt=""> -->
                        <div class="width-100 py-2" style="background-color: rgba(245, 245, 245, 0.6); position: absolute; bottom: 0;">
                            <form id="form-avatar" method="POST" enctype="multipart/form-data" action="{{ route('customer.update_avatar') }}">
                            @csrf
                            <label for="photo" class="mb-0 text-center" style="width: 100%;cursor: pointer;">Ubah Foto</label>
                            <input type="file" id="photo" name="photo" style="display: none" accept="image/x-png,image/gif,image/jpeg" >
                            </form>
                        </div>
                    
                    </div>
                    <div class="detail-account">
                        <h1 class="name-account py-2 mb-0 font-weight-bold heading heading-4 text-center">{{ $user->name }} {{ $user->last_name }}</h1>
                        <div class="row py-4">
                            <div class="col-md-6 col-10 mx-auto">
                                <div class="row">
                                    <div class="col-6">
                                        <p class="mb-3 font-weight-bold heading heading-6">Nama</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-3 heading heading-6">{{ $user->name }} {{ $user->last_name }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p class="mb-3 font-weight-bold heading heading-6">Email</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-3 heading heading-6" style="overflow-wrap: break-word;">{{ $user->email }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p class="mb-3 font-weight-bold heading heading-6">Nomor Handphone</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-3 heading heading-6">{{ isset($user->phone)? '+62'.$user->phone : '-' }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p class="mb-3 font-weight-bold heading heading-6">Tanggal Lahir</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-3 heading heading-6">{{ isset($user->tgl_lahir)? $date->format('d M Y'): '-' }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p class="mb-3 font-weight-bold heading heading-6">Jenis Kelamin</p>
                                    </div>
                                    <div class="col-6">
                                        @if($user->gender == 'P')
                                        <p class="mb-3 heading heading-6">Perempuan</p>
                                        @elseif($user->gender == 'L')
                                        <p class="mb-3 heading heading-6">Laki - laki</p>
                                        @else
                                        <p class="mb-3 heading heading-6">-</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p class="mb-3 font-weight-bold heading heading-6">Password</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-3 heading heading-6">****************</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container p-4 text-center button-edit-account">
                            <button type="button" class="btn btn-danger text-center btn-lihatlebihbanyak py-2 px-5 mb-4 font-weight-bold">EDIT PROFILE</button>
                        </div>
                    </div>
                    
                    
                        <form class="row edit-account" style="display: none;" action="{{ route('customer.profile.update') }}" method="POST">
                            
                            @csrf
                            <div class="col-9 mx-auto">
                                <div class="row">
                                    <div class="col">
                                        <p class="m-0" style="font-size: 15px; color: black;">Nama Depan<sup style="color: #F3795C;">*</sup></p>
                                        <div class="form-group">
                                            <input type="text" class="form-control rounded my-2 p-2" name="name" id="nama_depan" aria-describedby="namaDepanHelpId" style="border-color: #F3795C;" value="{{ $user->name }}" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <p class="m-0" style="font-size: 15px; color: black;">Nama Belakang<sup style="color: #F3795C;">*</sup></p>
                                        <div class="form-group">
                                            <input type="text" class="form-control rounded my-2 p-2" name="last_name" id="nama_belakang" aria-describedby="namaBelakangHelpId" style="border-color: #F3795C;" value="{{ $user->last_name }}" required>
                                        </div>
                                    </div>
                                </div>
                                <p class="m-0" style="font-size: 15px; color: black;">Email<sup style="color: #F3795C;">*</sup></p>
                                <div class="form-group">
                                    <input type="email" class="form-control rounded my-2 p-2" name="email" value="{{ $user->email }}" id="email" aria-describedby="namaBelakangHelpId" style="border-color: #F3795C;" readonly>
                                </div>
                                <p class="m-0" style="font-size: 15px; color: black;">Nomor Handphone<sup style="color: #F3795C;">*</sup></p>
                                <div class="input-group" style="margin-bottom: 1rem;">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text mt-2 p-2" style="background-color: white; border-color: #F3795C; color: #939598;">+62</div>
                                    </div>
                                    <input type="number" class="form-control mt-2 p-2" id="PhoneFormInputGroup" style="border-color: #F3795C; border-radius: 0 4px 4px 0;" name="phone" value="{{ $user->phone }}" required>
                                </div>
                                <p class="m-0 mb-2" style="font-size: 15px; color: black;">Tanggal Lahir<sup style="color: #F3795C;">*</sup></p>
                                <input class="p-2"  width="276" name="tgl_lahir" value="{{ isset($user->tgl_lahir)? $date->format('m/d/Y') :'' }}" placeholder="" style="border-color: #F3795C;background:#fff; border-radius: 4px 0 0 4px;" readonly="readonly" id="datepicker3"/>
                                <p class="mb-2" style="font-size: 15px; color: black; margin-top: 1rem;">Jenis Kelamin<sup style="color: #F3795C;">*</sup></p>
                                <input type="radio" class="jenis-kelamin" name="gender" value="P" id="r1" {{ isset($user->gender) &&  $user->gender == 'P' ? 'checked' : '' }}><label class="j-k mr-3" for="r1"><p class="mb-2 ml-2 d-inline" style="font-size: 14px; color: black;">Perempuan</p></label>
                                <input type="radio"  class="jenis-kelamin" name="gender" value="L" id="r2" {{ isset($user->gender) &&  $user->gender == 'L' ? 'checked' : '' }}><label class="j-k mr-3" for="r2"><p class="mb-2 ml-2 d-inline" style="font-size: 14px; color: black;">Laki-laki</p></label>
                                <div class="row py-4">
                                    <div class="col-md-4 col-12 py-2">
                                        <button type="button" class="batal-edit-account btn btn-danger text-center btn-lihatlebihbanyak py-2 px-5 font-weight-bold width-100">BATAL</button>
                                    </div>
                                    <div class="col-md-4 col-12 py-2">
                                        <button type="submit" class="btn btn-danger text-center btn-lihatlebihbanyak py-2 px-5 font-weight-bold width-100">SIMPAN</button>
                                    </div>
                                    @if(isset(Auth::user()->password))
                                    <div class="col-md-4 col-12 py-2 my-auto">
                                        <a href="#" class="edit-password-account"><p class="mb-0" style="font-size: 14px; color: black;"><u>Ubah Password</u></p></a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </form>
                        <form class="row edit-password-account-form my-4" style="display: none;" method="POST" action="{{ route('customer.update_password') }}">
                            
                            @csrf
                            <div class="col-9 mx-auto">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <p class="m-0" style="font-size: 15px; color: black;">Kata sandi lama<sup style="color: #F3795C;">*</sup></p>
                                        <div class="form-group">
                                            <input type="password" class="form-control rounded my-2 p-2" name="old_password" id="sandi_lama" aria-describedby="sandiLamaHelpId" style="border-color: #F3795C;" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <p class="m-0" style="font-size: 15px; color: black;">Kata sandi baru<sup style="color: #F3795C;">*</sup></p>
                                        <div class="form-group">
                                            <input type="password" class="form-control rounded my-2 p-2" name="new_password" id="sandi_baru" aria-describedby="sandiBaruHelpId" style="border-color: #F3795C;" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <p class="m-0" style="font-size: 15px; color: black;">Konfirmasi sandi baru<sup style="color: #F3795C;">*</sup></p>
                                        <div class="form-group">
                                            <input type="password" class="form-control rounded my-2 p-2" name="confirm_password" id="konfirm_sandi_baru" aria-describedby="konfirmSandiBaruHelpId" style="border-color: #F3795C;" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-4">
                                    <div class="col-md-5 col-12">
                                        <button type="submit" class="btn btn-danger text-center btn-lihatlebihbanyak py-2 font-weight-bold width-100">UBAH KATA SANDI</button>
                                    </div>
                                    <div class="col-md-3 col-12 py-2 my-auto">
                                        <a href="#" class="cancel-edit-password-account"><p class="mb-0" style="font-size: 14px; color: black;"><u><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</u></p></a>
                                    </div>
                                </div>
                            </div>

                        </form>
                    
                </div>
            </div>
        </div>
    </section>

@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $("#photo").on('change',function(){
            //do whatever you want
            $('#form-avatar').submit();
        });
        @if(!isset($user->tgl_lahir) && $user->tgl_lahir == null)
        $('#datepicker3').datepicker({
             uiLibrary: 'bootstrap4'
        });
        @endif
    });
</script>
@endsection
