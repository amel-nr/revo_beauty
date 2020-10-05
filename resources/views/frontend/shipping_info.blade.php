@extends('frontend.layouts.app')

@section('style')
<style type="text/css">
.select2-container{
    background-color: red;
}
</style>
@endsection

@section('content')

    <div id="page-content" style="background-color: #FCF8F0;">

        <section class="py-4 gry-bg" style="background-color: #FCF8F0;">
            <div class="container">
                <h1 class="h5 font-weight-bold">DETAIL PENGIRIMAN</h1>
                <div class="row" id="body-shiping">
                    <div class="col-md-8 col-12 py-3" style="border-top: 3px solid #F3795C;">
                        <h2 class="h6 font-weight-bold pb-2 mb-3" style="border-bottom: 1px solid #F3795C;">1. ALAMAT PENGIRIMAN<span class="float-right"><a href="#" type="button" class="btn btn-danger text-center btn-pakai py-1 px-3 mb-3 my-auto title-edit-alamat">EDIT</a></span></h2>
                        
                        @php

                        $addres = \App\Models\CustomerAdres::where(['is_deleted' => 0,'user_id' =>  \Auth::user()->id])->get();
                        @endphp
                        @foreach ( $addres  as $key => $value)
                        <div class="mb-3 py-3 rounded pilihalamat" >
                            <div class="container px-3">
                                <div class="row">
                                    <div class="col-md-9 col-12" onclick="getCurire({{$value->kecamatan_id }},{{$value->id}});">
                                        <p class="font-weight-bold m-0" style="font-size: 15px; color: black;">{{ $value->nama_depan }} {{ $value->nama_belakang }}</p>
                                        <p class="m-0" style="font-size: 15px; color: black;">{{ $value->alamat_lengkap }}</p>
                                        <p class="m-0" style="font-size: 15px; color: black;">{{ $value->province }}, {{ $value->city_name }}, {{ $value->kecamatan }}, {{$value->postal_code}}</p>
                                        <p class="m-0" style="font-size: 15px; color: black;">{{ $value->nomor_hp}}</p>
                                    </div>
                                    <div class="col-md-3 col-12 my-auto button-action-alamat">
                                        <a href="#" class="float-right" onclick="removeAddres({{$value->id}});" type="button"><i class="fa fa-trash-o" aria-hidden="true" style="font-size: 26px; color: #F3795C;"></i></a>
                                        <a href="#" type="button" class="btn btn-danger text-center btn-pakai py-1 px-3 mx-3 my-auto d-inline float-right btn-edit-addres" style="font-size: 10px;" data-addres='{{ json_encode($value) }}'>EDIT</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="mb-3 py-5 rounded tambah-alamat-container" style="border: 1px solid #F3795C;">
                            <div class="container px-3">
                                <p class="font-weight-bold m-0 btn-tambah-alamat" style="font-size: 15px; color: black; cursor: pointer;">+ Alamat Baru</p>
                            </div>
                        </div>
                        <div class="mb-3 py-3 rounded tambah-alamat-form" style="border: 1px solid #F3795C; display: none;">
                            <div class="container px-3">
                                <form  method="POST"  action="{{ route('addres.store') }}">
                                @csrf
                                <input type="hidden" name="id" value="0">
                                <input type="hidden" name="lat">
                                <input type="hidden" name="lng">
                                <div class="row">
                                    <div class="col-md-9 col-12">
                                        <p class="m-0" style="font-size: 15px; color: black;">Pilih Lokasi Alamat<sup style="color: #F3795C;">*</sup></p>
                                        <div class="form-group">
                                            <input id="pac-input"  class="controls" type="text" placeholder="Cari Lokasi" hidden>
                                            <div id="map" style="width: 100%;height: 500px;"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <p class="m-0" style="font-size: 15px; color: black;">Nama Depan<sup style="color: #F3795C;">*</sup></p>
                                                <div class="form-group">
                                                    <input type="text" class="form-control rounded my-2 p-2" name="nama_depan" id="nama_depan" aria-describedby="namaDepanHelpId" style="border-color: #F3795C;" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <p class="m-0" style="font-size: 15px; color: black;">Nama Belakang<sup style="color: #F3795C;">*</sup></p>
                                                <div class="form-group">
                                                    <input type="text" class="form-control rounded my-2 p-2" name="nama_belakang" id="nama_belakang" aria-describedby="namaBelakangHelpId" style="border-color: #F3795C;" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-8">
                                                <p class="m-0" style="font-size: 15px; color: black;">Nomor Handphone<sup style="color: #F3795C;">*</sup></p>
                                                <div class="input-group" style="margin-bottom: 1rem;">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text mt-2 p-2" style="background-color: white; border-color: #F3795C; color: #939598;">+62</div>
                                                    </div>
                                                    <input type="number" class="form-control mt-2 p-2" name="nomor_hp" id="PhoneFormInputGroup" style="border-color: #F3795C;" required>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="m-0" style="font-size: 15px; color: black;">Alamat<sup style="color: #F3795C;">*</sup></p>
                                        <div class="form-group">
                                            <textarea class="form-control my-2 p-2 rounded" name="alamat_lengkap" id="alamat_lengkap" rows="3" style="border-color: #F3795C;" required></textarea>
                                        </div>
                                        <p class="m-0" style="font-size: 15px; color: black;">Provinsi<sup style="color: #F3795C;">*</sup></p>
                                        <div class="form-group">
                                            <select class="form-control rounded my-2 p-2 select2" name="province_id" id="provinsi" aria-describedby="provinsiHelpId" style="border-color: #F3795C;" required>
                                                <option></option>
                                            </select>
                                            <input type="hidden" name="province">
                                        </div>
                                        <p class="m-0" style="font-size: 15px; color: black;">Kota/Kabupaten<sup style="color: #F3795C;">*</sup></p>
                                        <div class="form-group">
                                            <select class="form-control rounded my-2 p-2 select2" name="city_id" id="kota_kabupaten" aria-describedby="provinsiHelpId" style="border-color: #F3795C;" required>
                                                <option></option>
                                            </select>
                                            <input type="hidden" name="city_name">
                                        </div>
                                        <p class="m-0" style="font-size: 15px; color: black;">Kecamatan<sup style="color: #F3795C;">*</sup></p>
                                        <div class="form-group">
                                            <select class="form-control rounded my-2 p-2 select2" name="kecamatan_id" id="kecamatan" aria-describedby="provinsiHelpId" style="border-color: #F3795C;" required>
                                                <option></option>
                                            </select>
                                            <input type="hidden" name="kecamatan">
                                        </div>
                                        <p class="m-0" style="font-size: 15px; color: black;">Kode Pos<sup style="color: #F3795C;">*</sup></p>
                                        <div class="form-group">
                                            <input type="text" class="form-control rounded my-2 p-2" name="postal_code" id="kode_pos" aria-describedby="kodePosHelpId" style="border-color: #F3795C;" required>
                                        </div>
                                        <a href="javascript:void(0)" type="button" class="btn btn-danger text-center btn-pakai py-2 px-5 mr-2 d-inline btn-address-mobile" onclick="batalTambah();">BATAL</a>
                                        <input type="submit" name="submit" class="btn btn-danger text-center btn-pakai py-2 px-5 ml-2 d-inline btn-address-mobile" value="SIMPAN"/>
                                    </div>
                                    <div class="col-3">
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        {{--<div style="overflow: auto;">
                            <a href="#" type="button" class="btn btn-danger text-center btn-pakai py-2 px-5 float-right simpan-alamat-pilih">SIMPAN</a>
                        </div>--}}

                        <h2 class="h6 font-weight-bold pb-2 mt-4 data-pilih-expedisi" style="border-bottom: 1px solid #F3795C;display: none;">2. METODE PENGIRIMAN<span class="float-right"><a href="#" type="button" class="btn btn-danger text-center btn-pakai py-1 px-3 mb-3 my-auto title-edit-ekspedisi">EDIT</a></span></h1>
                        <div class="pt-4 mb-3 rounded metode-pengiriman data-pilih-expedisi" style="border: 1px solid #F3795C;display: none;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-check pl-0" id="curire">
                                            
                                        </div>
                                    </div>
                                    <div class="col-6">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 py-3 rounded pilihekspedisi">
                            <div class="container px-3">
                                <div class="row">
                                    <div class="col-9">
                                        <h6 class="mb-0 font-weight-bold" style="font-size: 15px;">J&T EXPRESS<span class="float-right">Rp. 10.000</span></h6>
                                    </div>
                                    <div class="col-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--<div style="overflow: auto;">
                            <a href="#" type="button" class="btn btn-danger text-center btn-pakai py-2 px-5 float-right simpan-ekspedisi">SIMPAN</a>
                        </div>--}}
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="container rounded" id="summary_info" style="border: 1px solid #F3795C; overflow: auto;">
                        @include('frontend.partials.shiping_summary')
                        </div>
                        <div class="rounded my-4" style="border: 1px solid #F3795C; overflow: auto;">
                            <div class="container" style="border-bottom: 1px solid #F3795C;">
                                <h2 class="h6 font-weight-bold py-2 m-0">PESANAN KAMU</h1>
                            </div>
                            <div class="container">
                            @php
                            $total = 0;
                            @endphp
                            @foreach (Session::get('cart') as $key => $cartItem)
                            @php
                            $product = \App\Product::where('id',$cartItem['id'])->with('brand')->first();
                            $total = $total + $cartItem['price']*$cartItem['quantity'];
                            $product_name_with_choice = $product->name;
                            if ($cartItem['variant'] != null) {
                                $product_name_with_choice = $product->name.' - '.$cartItem['variant'];
                            }
                            // if(isset($cartItem['color'])){
                            //     $product_name_with_choice .= ' - '.\App\Color::where('code', $cartItem['color'])->first()->name;
                            // }
                            // foreach (json_decode($product->choice_options) as $choice){
                            //     $str = $choice->name; // example $str =  choice_0
                            //     $product_name_with_choice .= ' - '.$cartItem[$str];
                            // }
                            @endphp
                                <div class="row mt-3 pb-3" style="border-bottom: 1px solid #F3795C;">
                                    <div class="col-4">
                                        <img src="{{ asset($product->thumbnail_img) }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                    </div>
                                    <div class="col-5 pl-0">
                                        @if(isset($product->brand))
                                        <p class="font-weight-bold mb-0" style="font-size: 14px;">{{ $product->brand->name }}</p>
                                        @endif
                                        <p class="mb-0" style="font-size: 10px; line-height: 12px;">{{ $product_name_with_choice }}</p>
                                         @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                            <p class="mb-0" style="font-size: 14px;">
                                                <s>{{ home_base_price($product->id) }}</s><span style="color: #F3795C;"> ({{ $product->discount }}%)</span>
                                            </p>
                                        @endif
                                        <p class="mb-0 font-weight-bold" style="font-size: 12px;">{{ single_price($cartItem['price']) }}</p>
                                    </div>
                                    <div class="col-3 pl-0 text-right">
                                        <div class="rounded py-1 px-3" style="border: 1px solid #F3795C;">
                                            <p class="m-0 text-center">{{ $cartItem['quantity'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            @if (Session::has('productPoint') && count(Session::get('productPoint')) > 0)
                            @foreach (Session::get('productPoint') as $key => $value)
                            @php
                            $product = \App\Product::where('id',$value->product_id)->with('brand')->first();
                            @endphp
                            <div class="row mt-3 pb-3" style="border-bottom: 1px solid #F3795C;">
                                <div class="col-4">
                                    <img src="{{ asset($product->thumbnail_img) }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                </div>
                                <div class="col-5 pl-0">
                                    @if(isset($product->brand))
                                    <p class="font-weight-bold mb-0" style="font-size: 14px;">{{ $product->brand->name }}</p>
                                    @endif
                                    <p class="mb-0" style="font-size: 10px; line-height: 12px;">{{ $product_name_with_choice }}</p>
                                    <p class="font-weight-bold mb-0" style="font-size: 14px;">Tukar Poin</p>
                                    <p class="mb-0 font-weight-bold" style="font-size: 12px;">GRATIS</p>
                                </div>
                            </div>
                            @endforeach
                            @endif  


                            @if (Session::has('sample') && count(Session::get('sample')) > 0)
                            @foreach (Session::get('sample') as $key => $value)
                            @php
                            $product = \App\Product::where('id',$value->product_id)->with('brand')->first();
                            @endphp
                            <div class="row mt-3 pb-3" style="border-bottom: 1px solid #F3795C;">
                                <div class="col-4">
                                    <img src="{{ asset($product->thumbnail_img) }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                </div>
                                <div class="col-5 pl-0">
                                    @if(isset($product->brand))
                                    <p class="font-weight-bold mb-0" style="font-size: 14px;">{{ $product->brand->name }}</p>
                                    @endif
                                    <p class="mb-0" style="font-size: 10px; line-height: 12px;">{{  $product->name  }}</p>
                                    <p class="font-weight-bold mb-0" style="font-size: 14px;">Sampel</p>
                                    <p class="mb-0 font-weight-bold" style="font-size: 12px;">GRATIS</p>
                                </div>
                            </div>
                            @endforeach
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('script')
<script type="text/javascript">
var drawingManager;
var lat =  -7.20455898888842;
var lng = 112.734314762056;
var map,marker;
function initMap() {
   
    map = new google.maps.Map(document.getElementById("map"), {
        center: {lat: lat, lng: lng},
        zoom: 6
    });

    $('input[name="lat"]').val(lat);
    $('input[name="lng"]').val(lng);

    marker = new google.maps.Marker({
        position: {lat: lat, lng: lng},
        map,
        title: "My addres"
      });


    map.addListener('click', function(mapsMouseEvent) {
          // Close the current InfoWindow.
        console.log(mapsMouseEvent.latLng.lat());
        marker.setPosition(mapsMouseEvent.latLng);
        $('input[name="lat"]').val(mapsMouseEvent.latLng.lat());
        $('input[name="lng"]').val(mapsMouseEvent.latLng.lng());
    });
    // drawingManager = new google.maps.drawing.DrawingManager({
    //     drawingMode: google.maps.drawing.OverlayType.HAND,
    //     drawingControl: true,
    //     drawingControlOptions: {
    //         position: google.maps.ControlPosition.TOP_CENTER,
    //         drawingModes: ['circle']
    //     },
    //     circleOptions: {
    //         fillColor: '#FFFF00',
    //         fillOpacity: 0.3,
    //         strokeWeight: 2,
    //         clickable: false,
    //         editable: true,
    //         zIndex: 1
    //     }
    // });
    // drawingManager.setMap(map);
    setsearchbox(map,marker);
}

function setsearchbox(map,marker)
{
    var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        $("#pac-input").removeAttr('hidden');
        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          // markers.forEach(function(marker) {
          //   marker.setMap(null);
          // });
          // markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
             $('#kode_pos_alamat').val("");
            $.each(place.address_components,function(index,value){
                if(value.types[0] === "postal_code"){
                    $('#kode_pos_alamat').val(value.long_name);
                }
            });
            // var icon = {
            //   url: place.icon,
            //   size: new google.maps.Size(71, 71),
            //   origin: new google.maps.Point(0, 0),
            //   anchor: new google.maps.Point(17, 34),
            //   scaledSize: new google.maps.Size(25, 25)
            // };

            // // Create a marker for each place.
            // markers.push(new google.maps.Marker({
            //   map: map,
            //   icon: icon,
            //   title: place.name,
            //   position: place.geometry.location
            // }));
            console.log(place.geometry.location.lat());
            $('input[name="lat"]').val(place.geometry.location.lat());
            $('input[name="lng"]').val(place.geometry.location.lng());
            marker.setPosition(place.geometry.location);

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });

}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_API') }}&libraries=drawing,places&callback=initMap" async defer></script>
<script type="text/javascript">
    function getProvisi(){
        blockui("#body-shiping");
        $.ajax({
           type:"GET",
           url:'{{ route('rajaongkir.provinsi') }}',
           success: function(data){
               $('#provinsi').select2({
                data: data,
                templateResult: function (repo) {
                    if (repo.loading) return repo.text;

                    var markup = "<div class='select2-result-repository clearfix'>" +
                        "<div class='select2-result-repository__title'>" + repo.text + "</div></div>";

                    return markup;
                },

                escapeMarkup: function (markup) {
                    return markup;
                },
                templateSelection: function (repo) {
                    return repo.TEXT || repo.text;
                },
                placeholder: "Pilih provinsi",
                minimumInputLength : -1
            });
           }
       });
    }

    function getKabupaten(){
        var provinsi= $('#provinsi').val();
        $('#kota_kabupaten').html('<option></option>');
        // $("#kota_kabupaten").select2("destroy").select2();
        $.ajax({
           type:"GET",
           url:'{{ route('rajaongkir.kabupaten') }}',
           data: {
                id_provinsi : provinsi
           },
           success: function(data){
                unblockui("#body-shiping");
               $('#kota_kabupaten').select2({
                data: data,
                templateResult: function (repo) {
                    if (repo.loading) return repo.text;

                    var markup = "<div class='select2-result-repository clearfix'>" +
                        "<div class='select2-result-repository__title'>" + repo.text + "</div></div>";

                    return markup;
                },

                escapeMarkup: function (markup) {
                    return markup;
                },
                templateSelection: function (repo) {
                    return repo.TEXT || repo.text;
                },
                placeholder: "Pilih kota/kabupaten",
                minimumInputLength : -1
            });
           }
       });
    }

    function getKecamatan(){
        var kabupaten= $('#kota_kabupaten').val();
        $('#kecamatan').html('<option></option>');
        // $("#kota_kabupaten").select2("destroy").select2();
        $.ajax({
           type:"GET",
           url:'{{ route('rajaongkir.kecamatan') }}',
           data: {
                id_kabupaten : kabupaten
           },
           success: function(data){
               $('#kecamatan').select2({
                data: data,
                templateResult: function (repo) {
                    if (repo.loading) return repo.text;

                    var markup = "<div class='select2-result-repository clearfix'>" +
                        "<div class='select2-result-repository__title'>" + repo.text + "</div></div>";

                    return markup;
                },

                escapeMarkup: function (markup) {
                    return markup;
                },
                templateSelection: function (repo) {
                    return repo.TEXT || repo.text;
                },
                placeholder: "Pilih kecamatan",
                minimumInputLength : -1
            });
           }
       });
    }

   
    var _idAddress = 0;
    function getCurire( key,idAddress){
        blockui("#body-shiping");
        $(".data-pilih-expedisi").css("display","none");
        $.post('{{ route('rajaongkir.cost') }}', { _token:'{{ csrf_token() }}', dest:key,idAddress:idAddress }, function(data){
            $('#curire').html(data.shiping_item);
            $('#summary_info').html(data.shiping_summary);
            $(".data-pilih-expedisi").css("display","block");
            unblockui("#body-shiping");
           _idAddress =idAddress;
        });
    }

    function handleCost(myRadio){

        var curier =JSON.parse(myRadio.value);
        $.post('{{ route('shiping.summary') }}', { _token:'{{ csrf_token() }}', cost: myRadio.value }, function(data){
            $('#summary_info').html(data);
            $("#id_address").val(_idAddress);
            
        });
    }

    function removeAddres(key){
        $urlhapus ="{{ route('addres.destroy') }}?id="+key;
        $('#btn-hapus-alamat').attr("href",$urlhapus);
        $('#modalHapusAlamat').modal('toggle');
    }

    function batalTambah(){
        $(".tambah-alamat-container").show(300);
        $(".tambah-alamat-form").hide(300);
        $(".simpan-alamat").show(300);
        $(".simpan-alamat-pilih").show(300);
    }



$(document).ready(function(){
    getProvisi();
    getKabupaten();
    getKecamatan();
    $('#provinsi').on('change', function() {
        var data = $('#provinsi').select2('data');
        $('input[name="province"]').val(data[0].text);
        getKabupaten();
    });
    $('#kota_kabupaten').on('change', function() {
        var data = $('#kota_kabupaten').select2('data');
        $('input[name="city_name"]').val(data[0].text);
        getKecamatan();
    });
    $('#kecamatan').on('change', function() {
         var data = $('#kecamatan').select2('data');
        $('input[name="kecamatan"]').val(data[0].text);
    });

    $('.btn-edit-addres').click(function(){
        var addres = $(this).data('addres');
        console.log(addres);
        $('input[name="id"]').val(addres.id);
        $('input[name="nama_depan"]').val(addres.nama_depan);
        $('input[name="nama_belakang"]').val(addres.nama_belakang);
        $("textarea#alamat_lengkap").val(addres.alamat_lengkap);
        $('input[name="postal_code"]').val(addres.postal_code);
        $('input[name="nomor_hp"]').val(addres.nomor_hp);

        $('input[name="province"]').val(addres.province);
        $('input[name="kecamatan"]').val(addres.kecamatan);
        $('input[name="city_name"]').val(addres.city_name);

        $("#provinsi").select2("trigger", "select", {
            data: { 
                id: addres.province, 
                text: addres.province
            }
        });

        $("#kota_kabupaten").select2("trigger", "select", {
            data: { 
                id: addres.city_id, 
                text: addres.city_name
            }
        });
        $("#kecamatan").select2("trigger", "select", {
            data: { 
                id: addres.kecamatan_id, 
                text: addres.kecamatan
            }
        });

        $(".tambah-alamat-container").hide(300);
        $(".tambah-alamat-form").show(300);
        $(".simpan-alamat").hide(300);
        $(".simpan-alamat-pilih").hide(300);
         marker.setPosition({ lat:parseFloat(addres.lat), lng:parseFloat(addres.lng)});

    });

    $(".btn-tambah-alamat").click(function(){
        $(".tambah-alamat-container").hide(300);
        $(".tambah-alamat-form").show(300);
        $(".simpan-alamat").hide(300);
        $(".simpan-alamat-pilih").hide(300);
         marker.setPosition({ lat:lat, lng:lng });
    });

});

</script>
@endsection
