@extends('frontend.layouts.app')

@section('style')
<style type="text/css">
#pac-input {
    background-color: #fff;
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
    margin-left: 12px;
    padding: 0 11px 0 13px;
    text-overflow: ellipsis;
    width: 300px;
    margin-top: 15px;
    height: 30px;
  }
</style>
@endsection
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
                $addres = \App\Models\CustomerAdres::where(['is_deleted' => 0,'user_id' =>  \Auth::user()->id])->get();
                @endphp
                       

                <div class="col-lg-9">
                    <div class="text-center" style="border-bottom: 1px solid #F3795C;">
                        <h1 class="title-address py-2 mb-0 font-weight-bold heading heading-4">ALAMAT PENGIRIMAN</h1>
                    </div>
                    <div class="row py-5 detail-address">
                        <div class="col-md-2 col-12 pb-3">
                            <h1 class="title-account mb-0 font-weight-bold heading heading-4">ALAMAT</h1>
                        </div>
                        <div class="col-md-10 col-12">
                            @if(count($addres) == 0)
                             <p class="m-0" style="font-size: 15px; color: black;">- belum ada alamat apapun.</p>
                            @endif
                            @foreach ($addres as $key => $value)
                            <div class="row-address" style=" margin-bottom: 10px;">
                                <p class="font-weight-bold m-0" style="font-size: 15px; color: black;">{{ $value->nama_depan }} {{ $value->nama_belakang }}</p>
                                <p class="m-0" style="font-size: 15px; color: black;">{{ $value->alamat_lengkap }}</p>
                                <p class="m-0" style="font-size: 15px; color: black;">{{ $value->province }}, {{ $value->city_name }}, {{ $value->kecamatan }}, {{$value->postal_code}}</p>
                                <p class="m-0" style="font-size: 15px; color: black;">+62{{ $value->nomor_hp}}</p>
                                <a href="javascript:void(0)" type="button" class="btn btn-danger text-center btn-pakai px-4 py-0 mt-3 btn-edit-addres" data-addres='{{ json_encode($value) }}' style="font-size: 14px;">EDIT</a>
                                <a href="javascript:void(0)" onclick="removeAddres({{$value->id}});"  type="button" class="btn btn-danger text-center btn-pakai px-4 py-0 mt-3 ml-2" style="font-size: 14px;">HAPUS</a>
                            </div>   
                            @endforeach
                            <div>
                                <a href="#" type="button" class="btn btn-danger text-center btn-pakai py-3 px-5 mt-3 float-right add-address" style="font-size: 16px; font-weight: 700;">+ ALAMAT BARU</a>
                            </div>
                        </div>
                    </div>
                    <form  method="POST"  action="{{ route('addres.store') }}">
                    @csrf
                    <input type="hidden" name="id" value="0">
                    <input type="hidden" name="lat">
                    <input type="hidden" name="lng">
                    <div class="row py-5 form-address" style="display: none;">
                        <input id="pac-input"  class="controls" type="text" placeholder="Cari Lokasi" hidden>

                        <h1 class="title-account px-3 py-2 mb-3 font-weight-bold heading heading-4">PILIH LOKASI ALAMAT</h1>
                        <div id="map" style="width: 100%;height: 500px;"></div>
                        <div class="col-md-4 col-12">
                            <h1 class="title-account py-2 mb-3 font-weight-bold heading heading-4">INFORMASI PENERIMA</h1>
                            <p class="m-0" style="font-size: 15px; color: black;">Nama Depan<sup style="color: #F3795C;">*</sup></p>
                            <div class="form-group">
                                <input type="text" class="form-control rounded my-2 p-2" name="nama_depan" id="nama_depan_alamat" aria-describedby="namaDepanHelpId" style="border-color: #F3795C;" required>
                            </div>
                            <p class="m-0" style="font-size: 15px; color: black;">Nama Belakang<sup style="color: #F3795C;">*</sup></p>
                            <div class="form-group">
                                <input type="text" class="form-control rounded my-2 p-2" name="nama_belakang" id="nama_belakang_alamat" aria-describedby="namaBelakangHelpId" style="border-color: #F3795C;" required>
                            </div>
                            <p class="m-0" style="font-size: 15px; color: black;">Nomor Handphone<sup style="color: #F3795C;">*</sup></p>
                            <div class="input-group" style="margin-bottom: 1rem;">
                                <div class="input-group-prepend">
                                    <div class="input-group-text mt-2 p-2" style="background-color: white; border-color: #F3795C; color: #939598;">+62</div>
                                </div>
                                <input type="number" class="form-control mt-2 p-2" name="nomor_hp" id="PhoneFormInputGroup" style="border-color: #F3795C;" required>
                            </div>
                        </div>
                        <div class="col-md-7 col-12 offset-md-1">
                            <h1 class="title-account py-2 mb-3 font-weight-bold heading heading-4">ALAMAT LENGKAP</h1>
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
                                <input type="text" class="form-control rounded my-2 p-2" name="postal_code" id="kode_pos_alamat" aria-describedby="kodePosHelpId" style="border-color: #F3795C;" required>
                            </div>
                            <div>
                                <a href="#" type="button" class="btn btn-danger text-center btn-pakai py-2 px-5 mt-3 cancel-save-address" style="font-size: 16px; font-weight: 700;">BATAL</a>
                                <button type="submit" class="btn btn-danger text-center btn-pakai py-2 px-5 mt-3 ml-3" style="font-size: 16px; font-weight: 700;">SIMPAN</button>
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
                allowClear: true,
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
                allowClear: true,
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
                allowClear: true,
                minimumInputLength : -1
            });
           }
       });
    }

    function getDetailCity(idKecamatan)
    {
        $.ajax({
            url: "{{ route('rajaongkir.detail') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                idCity: idKecamatan
            },
            dataType: "json",
            async: true,
            success: function(msgd) {
               
                console.log(msgd);
            }
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
        console.log(data[0]);
        getDetailCity(data[0].id);
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

        $(".form-address").show(300);
        $(".detail-address").hide(300);
        $(".title-address").text("EDIT ADDRESS");
        marker.setPosition({ lat:parseFloat(addres.lat), lng:parseFloat(addres.lng)});

    });

    $('.add-address').click(function(){
        $('input[name="id"]').val(null);
        $('input[name="nama_depan"]').val(null);
        $('input[name="nama_belakang"]').val(null);
        $("textarea#alamat_lengkap").val(null);
        $('input[name="postal_code"]').val(null);
        $('input[name="nomor_hp"]').val(null);

        $('input[name="province"]').val(null);
        $('input[name="kecamatan"]').val(null);
        $('input[name="city_name"]').val(null);
        $("#provinsi").val('').trigger('change');
        $("#kota_kabupaten").val('').trigger('change');
        $("#kecamatan").val('').trigger('change');
         marker.setPosition({ lat:lat, lng:lng });
       
    });

});

</script>
@endsection
