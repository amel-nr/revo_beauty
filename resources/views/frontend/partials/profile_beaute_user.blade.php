@php
$user = Auth::user();
@endphp
<div class="py-4" style="border-bottom: 1px solid #f3795c;">
    <h1 class="font-weight-bold h5">WARNA KULIT</h1>
    @if($user->warna_kulit == 1)
    <div class="d-inline-block text-center"  style=" width: 90px;">
        <div class= "my-2 mx-auto" style="background-color: #f1d7c3; height: 50px; width: 50px; border-radius: 50%;"></div>
        <p class="mb-0" style="font-size: 12px;">Putih</p>
    </div>
    @elseif($user->warna_kulit == 2)
    <div class="d-inline-block ml-2 text-center"  style=" width: 90px;">
        <div class= "my-2 mx-auto" style="background-color: #F5CEA9; height: 50px; width: 50px; border-radius: 50%;"></div>
        <p class="mb-0" style="font-size: 12px;">Kuning Langsat</p>
    </div>
    @elseif($user->warna_kulit == 3)
    <div class="d-inline-block ml-2 text-center"  onclick="pilih_warna_kulit(3);" style=" width: 90px;">
        <div class= "my-2 mx-auto" style="background-color: #E0A16E; height: 50px; width: 50px; border-radius: 50%;"></div>
        <p class="mb-0" style="font-size: 12px;">Sawo Matang</p>
    </div>
    @elseif($user->warna_kulit == 4)
    <div class="d-inline-block ml-2 text-center"  style=" width: 90px;">
        <div class= "my-2 mx-auto" style="background-color: #6A4332; height: 50px; width: 50px; border-radius: 50%;"></div>
        <p class="mb-0" style="font-size: 12px;">Gelap</p>
    </div>
    @endif
</div>
<div class="py-4" style="border-bottom: 1px solid #f3795c;">
    <div>
        <h1 class="font-weight-bold h5">JENIS KULIT</h1>
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="row">
                    @if($user->jenis_kulit == 1)
                    <div class="col-3">
                        <div style="position: relative;">
                            <img src="{{ asset('frontend/images/jenis-kulit/kulit-berminyak.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                            <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                <p class="mb-0" style="color: white; font-size: 12px;">Berminyak</p>
                            </div>
                        </div>
                    </div>
                    @elseif($user->jenis_kulit == 2)
                    <div class="col-3">
                        <div style="position: relative;">
                            <img src="{{ asset('frontend/images/jenis-kulit/kulit-kombinasi.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                            <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                <p class="mb-0" style="color: white; font-size: 12px;">Kombinasi</p>
                            </div>
                        </div>
                    </div>
                    @elseif($user->jenis_kulit == 3)
                    <div class="col-3">
                        <div style="position: relative;">
                            <img src="{{ asset('frontend/images/jenis-kulit/kulit-normal.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                            <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                <p class="mb-0" style="color: white; font-size: 12px;">Normal</p>
                            </div>
                        </div>
                    </div>
                    @elseif($user->jenis_kulit == 4)
                    <div class="col-3">
                        <div style="position: relative;">
                            <img src="{{ asset('frontend/images/jenis-kulit/kulit-kering.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                            <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                <p class="mb-0" style="color: white; font-size: 12px;">Kering</p>
                            </div>
                        </div>
                    </div>
                    @else
                    <!-- <div class="row"> -->
                        <div class="col-3" data-choice="0" data-value="5" onclick="pilih_jenis_kulit(5);">
                            <div style="position: relative;">
                                <img src="{{ asset('frontend/images/jenis-kulit/kulit-sensitif.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                    <p class="mb-0" style="color: white; font-size: 12px;">Sensitif</p>
                                </div>
                            </div>
                        </div>
                    <!-- </div> -->
                    @endif
                </div>
            </div>
            <div class="col-md-6 col-12">
                
            </div>
        </div>
    </div>
</div>
<div class="py-4" style="border-bottom: 1px solid #f3795c;">
    <div>
        <h1 class="font-weight-bold h5">KONDISI KULIT</h1>
        @php
        $data_kondisi = json_decode($user->kondisi_kulit);
        @endphp
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="row">
                    @foreach ($data_kondisi as $key => $value)
                        @if($value == 1)
                        <div class="col-3" data-choice="0" data-value="1">
                            <div style="position: relative;">
                                <img src="{{ asset('frontend/images/kondisi-kulit/jerawat.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                    <p class="mb-0" style="color: white; font-size: 12px;">Jerawat</p>
                                </div>
                            </div>
                        </div>
                        @elseif($value == 2)
                        <div class="col-3" data-choice="0" data-value="2">
                            <div style="position: relative;">
                                <img src="{{ asset('frontend/images/kondisi-kulit/keriput.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                    <p class="mb-0" style="color: white; font-size: 12px;">Garis Halus / Keriput</p>
                                </div>
                            </div>
                        </div>
                        @elseif($value == 3)
                        <div class="col-3" data-choice="0" data-value="3">
                            <div style="position: relative;">
                                <img src="{{ asset('frontend/images/kondisi-kulit/komedo.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                    <p class="mb-0" style="color: white; font-size: 12px;">Komedo</p>
                                </div>
                            </div>
                        </div>
                        @elseif($value == 4)
                        <div class="col-3" data-choice="0" data-value="4">
                            <div style="position: relative;">
                                <img src="{{ asset('frontend/images/kondisi-kulit/pori-besar.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                    <p class="mb-0" style="color: white; font-size: 12px;">Pori Besar</p>
                                </div>
                            </div>
                        </div>
                        @elseif($value == 5)
                        <div class="col-3" data-choice="0" data-value="5">
                            <div style="position: relative;">
                                <img src="{{ asset('frontend/images/kondisi-kulit/darkspot.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                    <p class="mb-0" style="color: white; font-size: 12px;">Dark Spot</p>
                                </div>
                            </div>
                        </div>
                        @elseif($value == 6)
                        <div class="col-3" data-choice="0" data-value="6">
                            <div style="position: relative;">
                                <img src="{{ asset('frontend/images/kondisi-kulit/kantung-mata.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                    <p class="mb-0" style="color: white; font-size: 12px;">Kantung Mata</p>
                                </div>
                            </div>
                        </div>
                        @elseif($value == 7)
                        <div class="col-3" data-choice="0" data-value="7">
                            <div style="position: relative;">
                                <img src="{{ asset('frontend/images/kondisi-kulit/kemerahan.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                    <p class="mb-0" style="color: white; font-size: 12px;">Kemerahan</p>
                                </div>
                            </div>
                        </div>
                        @elseif($value == 8)
                        <div class="col-3" data-choice="0" data-value="8">
                            <div style="position: relative;">
                                <img src="{{ asset('frontend/images/kondisi-kulit/flek.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                    <p class="mb-0" style="color: white; font-size: 12px;">Flek</p>
                                </div>
                            </div>
                        </div>
                        @elseif($value == 9)
                        <div class="col-3" data-choice="0" data-value="9">
                            <div style="position: relative;">
                                <img src="{{ asset('frontend/images/kondisi-kulit/kulit-kusam.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                    <p class="mb-0" style="color: white; font-size: 12px;">Kulit Kusam</p>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-md-6 col-12">
                
            </div>
        </div>
    </div>
</div>
 <div class="py-4" style="border-bottom: 1px solid #f3795c;">
    <div>
        <h1 class="font-weight-bold h5">KONDISI RAMBUT</h1>
        <div class="row">
            @php
            $data_rambut = json_decode($user->kondisi_rambut);
            @endphp
            <div class="col-md-6 col-12">
                <div class="row">
                    @foreach ($data_rambut as $key => $value)
                        @if($value == 1)
                        <div class="col-3" data-choice="0" data-value="1">
                            <div style="position: relative;">
                                <img src="{{ asset('frontend/images/kondisi-rambut/ketombe.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                    <p class="mb-0" style="color: white; font-size: 12px;">Ketombe</p>
                                </div>
                            </div>
                        </div>
                        @elseif($value == 2)
                        <div class="col-3" data-choice="0" data-value="2">
                            <div style="position: relative;">
                                <img src="{{ asset('frontend/images/kondisi-rambut/rontok.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                    <p class="mb-0" style="color: white; font-size: 12px;">Rontok</p>
                                </div>
                            </div>
                        </div>
                         @elseif($value == 3)
                        <div class="col-3" data-choice="0" data-value="3">
                            <div style="position: relative;">
                                <img src="{{ asset('frontend/images/kondisi-rambut/bercabang.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                    <p class="mb-0" style="color: white; font-size: 12px;">Bercabang</p>
                                </div>
                            </div>
                        </div>
                         @elseif($value == 4)
                        <div class="col-3" data-choice="0" data-value="4">
                            <div style="position: relative;">
                                <img src="{{ asset('frontend/images/kondisi-rambut/kusut.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                    <p class="mb-0" style="color: white; font-size: 12px;">Kusut</p>
                                </div>
                            </div>
                        </div>
                         @elseif($value == 5)
                        <div class="col-3" data-choice="0" data-value="5">
                            <div style="position: relative;">
                                <img src="{{ asset('frontend/images/kondisi-rambut/kusam.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                    <p class="mb-0" style="color: white; font-size: 12px;">Kusam</p>
                                </div>
                            </div>
                        </div>
                        @endif


                    @endforeach
                    
                </div>
            </div>
            <div class="col-md-6 col-12">
                
            </div>
        </div>
    </div>
</div>
<div class="py-4">
    <h1 class="font-weight-bold h5">PREFERENSI PRODUK</h1>
    <div class="row">
        @php
        $data_preferensi = json_decode($user->preferensi_product);
        @endphp
        <div class="col-md-6 col-12">
            <div class="row">
                @foreach ($data_preferensi as $key => $value)
                    @if($value == 1)
                    <div class="col-3" data-choice="0" data-value="1">
                        <div style="position: relative;">
                            <img src="{{ asset('frontend/images/preferensi-produk/indonesia.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                            <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                <p class="mb-0" style="color: white; font-size: 12px;">Lokal</p>
                            </div>
                        </div>
                    </div>
                    @elseif($value == 2)
                    <div class="col-3" data-choice="0" data-value="2">
                        <div style="position: relative;">
                            <img src="{{ asset('frontend/images/preferensi-produk/korea.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                            <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                <p class="mb-0" style="color: white; font-size: 12px;">Korean</p>
                            </div>
                        </div>
                    </div>
                    @elseif($value == 3)
                    <div class="col-3" data-choice="0" data-value="3">
                        <div style="position: relative;">
                            <img src="{{ asset('frontend/images/preferensi-produk/amerika.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                            <div class="text-center py-1 w-100" style="background-color: #f3795c; position:absolute; bottom:0; border-radius:0 0 10px 10px" >
                                <p class="mb-0" style="color: white; font-size: 12px;">Western</p>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
                
            </div>
        </div>
    </div>
</div>
<div class="text-right py-4">
    <a href="#" type="button" class="btn btn-danger text-center btn-pakai py-2 px-5 mt-5 beauty-profile-button" style="font-size: 16px; font-weight: 600;">EDIT PROFILE</a>
</div>