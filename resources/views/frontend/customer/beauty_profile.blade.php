@extends('frontend.layouts.app')

@section('content')

    <section class="gry-bg pb-4 profile" style="background-color: #FCF8F0;">
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="background-color: #FCF8F0;">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <div class="container px-3">
                        <div style="text-align: center; font-weight: bold; font-size: 17px;">
                            <p>APA JENIS KULIT KAMU?</p>
                        </div>
                        <div class="row">
                            <div class="col text-center jenis-kulit-p oily-skin"  onclick="pilih_jenis_kulit(1);" style="cursor: pointer; overflow: auto;">
                                <img src="{{ asset('frontend/images/beauty-profile-modal/oily-skin.png') }}" class="width-100 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                <p class="mb-0" style="color: black; font-size: 12px; font-weight: bold;" >Kulit Berminyak</p>
                            </div>
                            <div class="col text-center jenis-kulit-p combination-skin" onclick="pilih_jenis_kulit(2);" style="cursor: pointer; overflow: auto;">
                                <img src="{{ asset('frontend/images/beauty-profile-modal/combination-skin.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                <p class="mb-0" style="color: black; font-size: 12px;">Kulit Kombinasi</p>
                            </div>
                            <div class="col text-center jenis-kulit-p normal-skin" onclick="pilih_jenis_kulit(3);" style="cursor: pointer; overflow: auto;">
                                <img src="{{ asset('frontend/images/beauty-profile-modal/normal-skin.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                <p class="mb-0" style="color: black; font-size: 12px;">Kulit Normal</p>
                            </div>
                            <div class="col text-center jenis-kulit-p dry-skin" onclick="pilih_jenis_kulit(4);" style="cursor: pointer; overflow: auto;">
                                <img src="{{ asset('frontend/images/beauty-profile-modal/dry-skin.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                <p class="mb-0" style="color: black; font-size: 12px;">Kulit Kering</p>
                            </div>
                            <div class="col text-center jenis-kulit-p sensitive-skin" onclick="pilih_jenis_kulit(5);" style="cursor: pointer; overflow: auto;">
                                <img src="{{ asset('frontend/images/beauty-profile-modal/sensitive-skin.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                <p class="mb-0" style="color: black; font-size: 12px;">Kulit Sensitif</p>
                            </div>
                        </div>
                        <div class="mt-4 px-4 mb-5" style="text-align: center; font-size: 13px; font-weight: 600;">
                            <p class="kulit-berminyak">Kulit berminyak ditandai dengan pori-pori besar yang mudah terlihat.
                                Produksi sebum atau minyak pada wajahmu tergolong banyak sehingga
                                kulit wajah akan terlihat berminyak hampir di seluruh bagian wajah.</p>
                            <p class="kulit-kombinasi" style="display: none;">Kulit kombinasi ditandai dengan wajah yang berminyak di area dahi, batang hidung, dan
                                dagu (T-Zone) sementar area pipi dan rahang (U-Zone) tergolong kering. Biasanya pori-pori terlihat jelas di area T-Zone.</p>
                            <p class="kulit-normal" style="display: none;">Kulit normal ditandai dengan pori-pori kecil. Jenis kulit normal punya produksi minyak yang imbang
                                sehingga kulit wajahmu nggak terlalu berminyak maupun kering.</p>
                            <p class="kulit-kering" style="display: none;">Kulit kering ditandai dengan kulit yang bersisik, terasa kencang, gatal, dan kusam.
                                Produksi sebum yang kurang membuat kulit tetap kering sehingga jarang terlihat berminyak.</p>
                            <p class="kulit-sensitif" style="display: none;">Kulit sensitif ditandai dengan kondisi kulit seperti rosacea, eczema, atau psoriasis.
                                Umumnya kulit sensitif akan menunjukkan reaksi iritasi seperti kemerahan atau sensasi terbakar
                                setelah mencoba produk skincare baru dengan kandungan seperti fragrance.</p>
                        </div>
                        <div class="text-center mb-3">
                            <button type="button" class="btn btn-danger rounded" data-dismiss="modal" style="border-color: #f3795c; background-color: #f3795c;">MENGERTI</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                        <h1 class="title-address py-2 mb-0 font-weight-bold heading heading-4">BEAUTY PROFILE</h1>
                    </div>
                    @if(isset(Auth::user()->jenis_kulit) && isset(Auth::user()->warna_kulit) && isset(Auth::user()->kondisi_kulit) && isset(Auth::user()->kondisi_rambut) && isset(Auth::user()->preferensi_product) )
                    <div class="py-5 beauty-profile-set">
                    @include('frontend.partials.profile_beaute_user')
                    </div>
                    @else
                    <div class="text-center py-5 beauty-profile-set">
                        <h1 class="title-address py-2 font-weight-bold heading heading-4">SEDIKIT LAGI UNTUK DAPATKAN BONUS POIN!</h1>
                        <p style="font-size: 16px;">Lengkapi halaman Beauty Profile dan dapatkan 50 poin rewards!</p>
                        <a href="#" type="button" class="btn btn-danger text-center btn-pakai py-2 px-5 mt-5 beauty-profile-button" style="font-size: 16px; font-weight: 600;">YUK, LENGKAPI!</a>
                    </div>
                    @endif
                    <div class="py-3 beauty-profile-form" style="display: none;">
                        <div class="py-4" style="border-bottom: 1px solid #f3795c;">
                            <h1 class="font-weight-bold h5">WARNA KULIT</h1>
                            <div class="d-inline-block mx-1 text-center warna-kulit" data-choice="0" data-value="1"  onclick="pilih_warna_kulit(1);" style=" width: 90px;">
                                <div class= "my-2 mx-auto" style="background-color: #f1d7c3; height: 50px; width: 50px; border-radius: 50%;"></div>
                                <p class="mb-0" style="font-size: 12px;">Putih</p>
                            </div>
                            <div class="d-inline-block mx-1 text-center warna-kulit" data-choice="0" data-value="2" onclick="pilih_warna_kulit(2);" style=" width: 90px;">
                                <div class= "my-2 mx-auto" style="background-color: #F5CEA9; height: 50px; width: 50px; border-radius: 50%;"></div>
                                <p class="mb-0" style="font-size: 12px;">Kuning Langsat</p>
                            </div>
                            <div class="d-inline-block mx-1 text-center warna-kulit" data-choice="0" data-value="3" onclick="pilih_warna_kulit(3);" style=" width: 90px;">
                                <div class= "my-2 mx-auto" style="background-color: #E0A16E; height: 50px; width: 50px; border-radius: 50%;"></div>
                                <p class="mb-0" style="font-size: 12px;">Sawo Matang</p>
                            </div>
                            <div class="d-inline-block mx-1 text-center warna-kulit" data-choice="0" data-value="4" onclick="pilih_warna_kulit(4);" style=" width: 90px;">
                                <div class= "my-2 mx-auto" style="background-color: #6A4332; height: 50px; width: 50px; border-radius: 50%;"></div>
                                <p class="mb-0" style="font-size: 12px;">Gelap</p>
                            </div>
                        </div>
                        <div class="py-4" style="border-bottom: 1px solid #f3795c;">
                            <div>
                                <h1 class="font-weight-bold h5">JENIS KULIT</h1>
                                <p>Apa jenis kulit kamu?   <a href="#" data-toggle="modal" data-target="#modelId" style="color: #f3795c;">Pelajari</a></p>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="row">
                                            <div class="col-3 py-2 jenis-kulit" data-choice="0" data-value="1" onclick="pilih_jenis_kulit(1);">
                                                <div style="position: relative;">
                                                    <img src="{{ asset('frontend/images/jenis-kulit/kulit-berminyak.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                    <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                                        <p class="mb-0" style="color: white; font-size: 12px;">Berminyak</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3 py-2 jenis-kulit" data-choice="0" data-value="2" onclick="pilih_jenis_kulit(2);">
                                                <div style="position: relative;">
                                                    <img src="{{ asset('frontend/images/jenis-kulit/kulit-kombinasi.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                    <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                                        <p class="mb-0" style="color: white; font-size: 12px;">Kombinasi</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3 py-2 jenis-kulit" data-choice="0" data-value="3" onclick="pilih_jenis_kulit(3);">
                                                <div style="position: relative;">
                                                    <img src="{{ asset('frontend/images/jenis-kulit/kulit-normal.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                    <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                                        <p class="mb-0" style="color: white; font-size: 12px;">Normal</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3 py-2 jenis-kulit" data-choice="0" data-value="4" onclick="pilih_jenis_kulit(4);">
                                                <div style="position: relative;">
                                                    <img src="{{ asset('frontend/images/jenis-kulit/kulit-kering.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                    <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                                        <p class="mb-0" style="color: white; font-size: 12px;">Kering</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="row">
                                            <div class="col-3 py-2 jenis-kulit" data-choice="0" data-value="5" onclick="pilih_jenis_kulit(5);">
                                                <div style="position: relative;">
                                                    <img src="{{ asset('frontend/images/jenis-kulit/kulit-sensitif.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                    <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                                        <p class="mb-0" style="color: white; font-size: 12px;">Sensitif</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="py-4" style="border-bottom: 1px solid #f3795c;">
                            <div>
                                <h1 class="font-weight-bold h5">KONDISI KULIT</h1>
                                <p>Bisa pilih lebih dari satu</p>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="row">
                                            <div class="col-3 py-2 kondisi-kulit" data-choice="0" data-value="1">
                                                <div style="position: relative;">
                                                    <img src="{{ asset('frontend/images/kondisi-kulit/jerawat.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                    <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                                        <p class="mb-0" style="color: white; font-size: 12px;">Jerawat</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3 py-2 kondisi-kulit" data-choice="0" data-value="2">
                                                <div style="position: relative;">
                                                    <img src="{{ asset('frontend/images/kondisi-kulit/keriput.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                    <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                                        <p class="mb-0" style="color: white; font-size: 12px;">Garis Halus / Keriput</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3 py-2 kondisi-kulit" data-choice="0" data-value="3">
                                                <div style="position: relative;">
                                                    <img src="{{ asset('frontend/images/kondisi-kulit/komedo.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                    <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                                        <p class="mb-0" style="color: white; font-size: 12px;">Komedo</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3 py-2 kondisi-kulit" data-choice="0" data-value="4">
                                                <div style="position: relative;">
                                                    <img src="{{ asset('frontend/images/kondisi-kulit/pori-besar.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                    <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                                        <p class="mb-0" style="color: white; font-size: 12px;">Pori Besar</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3 py-2 kondisi-kulit" data-choice="0" data-value="5">
                                                <div style="position: relative;">
                                                    <img src="{{ asset('frontend/images/kondisi-kulit/darkspot.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                    <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                                        <p class="mb-0" style="color: white; font-size: 12px;">Dark Spot</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3 py-2 kondisi-kulit" data-choice="0" data-value="6">
                                                <div style="position: relative;">
                                                    <img src="{{ asset('frontend/images/kondisi-kulit/kantung-mata.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                    <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                                        <p class="mb-0" style="color: white; font-size: 12px;">Kantung Mata</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3 py-2 kondisi-kulit" data-choice="0" data-value="7">
                                                <div style="position: relative;">
                                                    <img src="{{ asset('frontend/images/kondisi-kulit/kemerahan.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                    <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                                        <p class="mb-0" style="color: white; font-size: 12px;">Kemerahan</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3 py-2 kondisi-kulit" data-choice="0" data-value="8">
                                                <div style="position: relative;">
                                                    <img src="{{ asset('frontend/images/kondisi-kulit/flek.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                    <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                                        <p class="mb-0" style="color: white; font-size: 12px;">Flek</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="row">
                                            <div class="col-3 py-2 kondisi-kulit" data-choice="0" data-value="9">
                                                <div style="position: relative;">
                                                    <img src="{{ asset('frontend/images/kondisi-kulit/kulit-kusam.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                    <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                                        <p class="mb-0" style="color: white; font-size: 12px;">Kulit Kusam</p>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="py-4" style="border-bottom: 1px solid #f3795c;">
                            <div>
                                <h1 class="font-weight-bold h5">KONDISI RAMBUT</h1>
                                <p>Bisa pilih lebih dari satu</p>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="row">
                                            <div class="col-3 py-2 kondisi-rambut" data-choice="0" data-value="1">
                                                <div style="position: relative;">
                                                    <img src="{{ asset('frontend/images/kondisi-rambut/ketombe.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                    <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                                        <p class="mb-0" style="color: white; font-size: 12px;">Ketombe</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3 py-2 kondisi-rambut" data-choice="0" data-value="2">
                                                <div style="position: relative;">
                                                    <img src="{{ asset('frontend/images/kondisi-rambut/rontok.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                    <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                                        <p class="mb-0" style="color: white; font-size: 12px;">Rontok</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3 py-2 kondisi-rambut" data-choice="0" data-value="3">
                                                <div style="position: relative;">
                                                    <img src="{{ asset('frontend/images/kondisi-rambut/bercabang.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                    <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                                        <p class="mb-0" style="color: white; font-size: 12px;">Bercabang</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3 py-2 kondisi-rambut" data-choice="0" data-value="4">
                                                <div style="position: relative;">
                                                    <img src="{{ asset('frontend/images/kondisi-rambut/kusut.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                    <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                                        <p class="mb-0" style="color: white; font-size: 12px;">Kusut</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="row"> 
                                            <div class="col-3 py-2 kondisi-rambut" data-choice="0" data-value="5">
                                                <div style="position: relative;">
                                                    <img src="{{ asset('frontend/images/kondisi-rambut/kusam.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                    <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                                        <p class="mb-0" style="color: white; font-size: 12px;">Kusam</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="py-4">
                            <h1 class="font-weight-bold h5">PREFERENSI PRODUK</h1>
                            <p>Bisa pilih lebih dari satu</p>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="row">
                                        <div class="col-3 preferensi-produk" data-choice="0" data-value="1">
                                            <div style="position: relative;">
                                                <img src="{{ asset('frontend/images/preferensi-produk/indonesia.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                                    <p class="mb-0" style="color: white; font-size: 12px;">Lokal</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 preferensi-produk" data-choice="0" data-value="2">
                                            <div style="position: relative;">
                                                <img src="{{ asset('frontend/images/preferensi-produk/korea.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                                    <p class="mb-0" style="color: white; font-size: 12px;">Korean</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 preferensi-produk" data-choice="0" data-value="3">
                                            <div style="position: relative;">
                                                <img src="{{ asset('frontend/images/preferensi-produk/amerika.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                                <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                                    <p class="mb-0" style="color: white; font-size: 12px;">Western</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-right py-4">
                            <button  id="btn-update-beauty" class="btn btn-danger btn-lihatlebihbanyak px-4 py-3 rounded" href="#" role="button" style="background-color: #f3795c;border-color: #f3795c; font-size: 18px; font-weight: 500;">UPDATE PROFILE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <form action="{{ route('customer.update_beauty_profile') }}" id="form-profile-beauty" method="POST" style="display: none;">
    @csrf
    <input type="hidden" name="jenis_kulit">
    <input type="hidden" name="warna_kulit">
    <input type="hidden" name="kondisi_kulit">
    <input type="hidden" name="kondisi_rambut">
    <input type="hidden" name="preferensi_produk">
    </form>

@endsection

@section('script')
    <script>
        var jenis_kulit ='';
        var warna_kulit ='';
        var kondisi_kulit= [];
        var kondisi_rambut=[];
        var preferensi_produk =[];
        function pilih_warna_kulit ($value){
            warna_kulit= $value;
        }

        function pilih_jenis_kulit ($value){
            jenis_kulit= $value;
        }

        $(document).ready(function(){
            $(".oily-skin").click(function(){
                $(".kulit-berminyak").show();
                $(".kulit-kombinasi").hide();
                $(".kulit-normal").hide();
                $(".kulit-kering").hide();
                $(".kulit-sensitif").hide();
                $(".oily-skin > p").css("font-weight", "bold");
                $(".combination-skin > p").css("font-weight", "normal");
                $(".normal-skin > p").css("font-weight", "normal");
                $(".dry-skin > p").css("font-weight", "normal");
                $(".sensitive-skin > p").css("font-weight", "normal");
            });

            $(".combination-skin").click(function(){
                $(".kulit-berminyak").hide();
                $(".kulit-kombinasi").show();
                $(".kulit-normal").hide();
                $(".kulit-kering").hide();
                $(".kulit-sensitif").hide();
                $(".oily-skin > p").css("font-weight", "normal");
                $(".combination-skin > p").css("font-weight", "bold");
                $(".normal-skin > p").css("font-weight", "normal");
                $(".dry-skin > p").css("font-weight", "normal");
                $(".sensitive-skin > p").css("font-weight", "normal");
            });

            $(".normal-skin").click(function(){
                $(".kulit-berminyak").hide();
                $(".kulit-kombinasi").hide();
                $(".kulit-normal").show();
                $(".kulit-kering").hide();
                $(".kulit-sensitif").hide();
                $(".oily-skin > p").css("font-weight", "normal");
                $(".combination-skin > p").css("font-weight", "normal");
                $(".normal-skin > p").css("font-weight", "bold");
                $(".dry-skin > p").css("font-weight", "normal");
                $(".sensitive-skin > p").css("font-weight", "normal");
            });

            $(".dry-skin").click(function(){
                $(".kulit-berminyak").hide();
                $(".kulit-kombinasi").hide();
                $(".kulit-normal").hide();
                $(".kulit-kering").show();
                $(".kulit-sensitif").hide();
                $(".oily-skin > p").css("font-weight", "normal");
                $(".combination-skin > p").css("font-weight", "normal");
                $(".normal-skin > p").css("font-weight", "normal");
                $(".dry-skin > p").css("font-weight", "bold");
                $(".sensitive-skin > p").css("font-weight", "normal");
            });

            $(".sensitive-skin").click(function(){
                $(".kulit-berminyak").hide();
                $(".kulit-kombinasi").hide();
                $(".kulit-normal").hide();
                $(".kulit-kering").hide();
                $(".kulit-sensitif").show();
                $(".oily-skin > p").css("font-weight", "normal");
                $(".combination-skin > p").css("font-weight", "normal");
                $(".normal-skin > p").css("font-weight", "normal");
                $(".dry-skin > p").css("font-weight", "normal");
                $(".sensitive-skin > p").css("font-weight", "bold");
            });

            $(".warna-kulit").click(function(){
                if($(this).data('choice')==0){
                    $(".warna-kulit").css({"border": "none", "background-color": "#FCF8F0"});
                    $(this).css({"border": "1px solid #F3795C", "background-color": "#FADFD2"});
                    $(".warna-kulit").data('choice', 0);
                    $(this).data('choice', 1);
                    $(".warna-kulit").attr('data-choice', 0);
                    $(this).attr('data-choice', 1);
                }
                else{
                    $(this).css({"border": "none", "background-color": "#FCF8F0"});
                    $(this).data('choice', 0);
                    $(this).attr('data-choice', 0);
                }
            });

            $(".jenis-kulit").click(function(){
                if($(this).data('choice')==0){
                    $(".jenis-kulit").css({"border": "none", "background-color": "#FCF8F0"});
                    $(this).css({"border": "1px solid #F3795C", "background-color": "#FADFD2"});
                    $(".jenis-kulit").data('choice', 0);
                    $(this).data('choice', 1);
                    $(".jenis-kulit").attr('data-choice', 0);
                    $(this).attr('data-choice', 1);
                }
                else{
                    $(this).css({"border": "none", "background-color": "#FCF8F0"});
                    $(this).data('choice', 0);
                    $(this).attr('data-choice', 0);
                }
            });

            $(".kondisi-kulit, .kondisi-rambut, .preferensi-produk").click(function(){
                if($(this).data('choice')==0){
                    $(this).css({"border": "1px solid #F3795C", "background-color": "#FADFD2"});
                    $(this).data('choice', 1);
                    $(this).attr('data-choice', 1);
                }
                else{
                    $(this).css({"border": "none", "background-color": "#FCF8F0"});
                    $(this).data('choice', 0);
                    $(this).attr('data-choice', 0);
                }
            });
            $('#btn-update-beauty').click(function(){

                kondisi_kulit = [];
                preferensi_produk =[];
                kondisi_rambut =[];
                $('.kondisi-kulit').each(function(i,item){
                    if($(item).data('choice') == 1){
                        kondisi_kulit.push($(item).data('value'));
                    }
                });
                $('.kondisi-rambut').each(function(i,item){
                    if($(item).data('choice') == 1){
                        kondisi_rambut.push($(item).data('value'));
                    }
                });
                $('.preferensi-produk').each(function(i,item){
                    if($(item).data('choice') == 1){
                        preferensi_produk.push($(item).data('value'));
                    }
                });

                $('input[name="jenis_kulit"]').val(jenis_kulit);
                $('input[name="warna_kulit"]').val(warna_kulit);
                $('input[name="kondisi_kulit"]').val(JSON.stringify(kondisi_kulit));
                $('input[name="kondisi_rambut"]').val(JSON.stringify(kondisi_rambut));
                $('input[name="preferensi_produk"]').val(JSON.stringify(preferensi_produk)); 

                console.log(kondisi_kulit);
                console.log(kondisi_rambut);
                console.log(preferensi_produk);
                console.log(warna_kulit);
                console.log(jenis_kulit);

                $('#form-profile-beauty').submit();
            });

            @if(isset(Auth::user()->kondisi_kulit) && Auth::user()->kondisi_kulit != null)
            var _kondisiKulit = JSON.parse("{{ Auth::user()->kondisi_kulit }}");
            $.each(_kondisiKulit, function( index, value ) {
                $('.kondisi-kulit').each(function(i,item){
                    if($(item).data('value') == value)
                    {
                        $(item).css({"border": "1px solid #F3795C", "background-color": "#FADFD2"});
                        $(item).data('choice', 1);
                        $(item).attr('data-choice', 1);
                    }

                });
            });
            @endif

            @if(isset(Auth::user()->kondisi_rambut) && Auth::user()->kondisi_rambut != null)
            var _kondisiRabut = JSON.parse("{{ Auth::user()->kondisi_rambut }}");
            $.each(_kondisiRabut, function( index, value ) {
                $('.kondisi-rambut').each(function(i,item){
                    if($(item).data('value') == value)
                    {
                        $(item).css({"border": "1px solid #F3795C", "background-color": "#FADFD2"});
                        $(item).data('choice', 1);
                        $(item).attr('data-choice', 1);
                    }

                });
            });
            @endif

            @if(isset(Auth::user()->preferensi_product) && Auth::user()->preferensi_product != null)
            var _prefensi = JSON.parse("{{ Auth::user()->preferensi_product }}");
            $.each(_prefensi, function( index, value ) {
                $('.preferensi-produk').each(function(i,item){
                    if($(item).data('value') == value)
                    {
                        $(item).css({"border": "1px solid #F3795C", "background-color": "#FADFD2"});
                        $(item).data('choice', 1);
                        $(item).attr('data-choice', 1);
                    }

                });
            });
            @endif
            @if(isset(Auth::user()->jenis_kulit) && Auth::user()->jenis_kulit != null)
            jenis_kulit = "{{ Auth::user()->jenis_kulit }}";
            $('.jenis-kulit').each(function(i,item){
                if($(item).data('value') == jenis_kulit)
                {
                    
                    $(item).css({"border": "1px solid #F3795C", "background-color": "#FADFD2"});
                    $(item).data('choice', 1);
                    $(item).attr('data-choice', 1);
                }

            });
            @endif

            @if(isset(Auth::user()->warna_kulit) && Auth::user()->warna_kulit != null)
            warna_kulit = "{{ Auth::user()->warna_kulit }}";
             $('.warna-kulit').each(function(i,item){
                if($(item).data('value') == warna_kulit)
                {
                    
                    $(item).css({"border": "1px solid #F3795C", "background-color": "#FADFD2"});               
                    $(item).data('choice', 1);
                    $(item).attr('data-choice', 1);
                }
             });
            @endif  


        });
    </script>
@endsection