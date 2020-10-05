@extends('layouts.app')

@section('content')

<div class="col-lg-6 col-lg-offset-3">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{__('Tambah Jenis Kulit')}}</h3>
        </div>
            <div class="container mx-auto">
                <p class="text-success alert-sukses"></p>
            </div>

        <!--Horizontal Form-->
        <!--===================================================-->
        <form id="form-skin" class="form-horizontal" action="{{ route('skin.store') }}" method="POST" enctype="multipart/form-data">
        	@csrf
            <input type="hidden" id="table" name="table" value="{{$table}}">
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="name">{{__('Nama')}}</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="{{__('Nama')}}" id="name" name="name" onkeyup="slugify()" class="form-control" required>
                    </div>
                </div>

            @if($table == "skin_type")
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="slug">{{__('Slug')}}</label>
                    <div class="col-sm-10">
            @endif
            <input type="{{$table == 'skin_type' ? 'text' : 'hidden'}}" placeholder="{{__('slug')}}" id="slug" name="slug" class="form-control" required>
            @if($table == "skin_type")
                    </div>
                </div>
            @endif

                <div class="form-group hide-logo">
                    <label class="col-sm-2 control-label" for="logo">{{__('Logo')}} <small>(120x80)</small></label>
                    <div class="col-sm-10">
                        <input type="file" id="logo" name="logo" class="form-control" {{$table == "skin_type" ? "required" : ""}} data-max-file-size="2M" data-allowed-file-extensions="jpg png jpeg">
                    </div>
                </div>
            </div>
            <div class="panel-footer text-right">
                <button class="btn btn-purple" type="submit">{{__('Simpan')}}</button>
            </div>
        </form>
        <!--===================================================-->
        <!--End Horizontal Form-->

    </div>
            
</div>


@endsection

@section("script")
<script>
$('#logo').dropify({
    messages: {
        'default': 'Seret gambar atau klik untuk menambah gambar',
        'replace': 'Seret gambar atau klik untuk mengubah gambar',
        'remove':  'Hapus',
        'error':   'Ooops, ada kesalahan.'
    },

    error: {
        'fileSize': 'Ukuran file maksimal 3 MB.',
        'maxWidth': 'Lebar gambar maksimal 1281px.',
        'maxHeight': 'Tinggi gambar maksimal 81px.',
        'imageFormat': 'Format gambar harus "jpg" "png" "jpeg".'
    }
});

    function slugify() {
        let string = $("#name").val();
        let newStr = string
            .toString()
            .trim()
            .toLowerCase()
            .replace(/\s+/g, "-")
            .replace(/[^\w\-]+/g, "")
            .replace(/\-\-+/g, "-")
            .replace(/^-+/, "")
            .replace(/-+$/, "");
        
        $("#slug").val(newStr);

    }

    $("#name").on("click", function () {
        $(".alert-sukses").html("")
    })

    $("#form-skin").on("submit", function (e) {
        e.preventDefault();
        var formSkin = new FormData(this);
        if ($("#table").val() == "skin_concern" ) {
            formSkin = {
                "_token":"{{ csrf_token()}}",
                "table":$("#table").val(),
                "name":$("#name").val(),
                "slug":$("#slug").val()
            }
            $.post('{{route('skin.store')}}', formSkin, function(data){
                            $(".alert-sukses").html(`Berhasil menambah data`);
                            $("#name").val("");
                            $("#slug").val("");
                        });
            return;
        }
        
        $.ajax({
        	url: "{{route('skin.store')}}",
			type: "POST",
            data:  formSkin,
			contentType: false,
			processData:false,
			success: function(response){
                console.log(response);
                $('#form-skin')[0].reset();
                $(".dropify-clear").trigger("click");
                $(".alert-sukses").html(`Berhasil menambah data`);
                },	        
       });
    });

    $(document).ready(function () {
        if (window.location.href == "{{route('skinConcern.create')}}") {
            $(".panel-title").html("Tambah Permasalahan Kulit")
            $(".hide-logo").hide();
        }
    })
</script>
@endsection