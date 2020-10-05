@extends('layouts.app')

@php
    $topics = \App\Forum_topics::all();
    $rooms = \App\Forum_rooms::all();
@endphp
@section('content')
    <div class="col-lg col-lg-offset">
        <div class="panel">
            <br>
            <div class="container" id="isibtn"> 
                    <a type="button" id="btnlistRoom" class="btn btn-primary" style="display:none;">Lihat semua Ruang Forum</a>
                    <a type="button" id="btncreateRoom" class="btn btn-primary">Tambah Ruang Forum</a>
            </div>
            <br>

            <div class="panel-heading">
                <h3 class="panel-title" id="panelTitle">{{__('Ruang Forum')}}</h3>
            </div>

            <div id="listroom">
                <div class="container">
                    <div class="panel-body">
                        <div class="row" style="padding-bottom: 30px;">
                            @foreach($rooms as $k => $room)
                                <a id="btnroom" data-id="{{$room->id}}" data-topics-id="{{$room->topics_id}}" data-title="{{$room->title}}" data-subtitle="{{$room->sub_title}}" data-thumb="{{$room->img}}" class="btn" style="background-color:#F3795C;color:white;">{{$room->title}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!--Horizontal Form-->
            <!--===================================================-->
            <div id="isi" style="display:none">
                <form action="{{route('admin.forum.room.store')}}" method="post" class="form-horizontal" id="roomforum" enctype="multipart/form-data">
                @csrf
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="title">{{__('Judul')}}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title" value="" placeholder="{{__('Title')}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="subtitle">{{__('Sub Judul')}}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="subtitle" name="sub_title" value="" placeholder="{{__('subTitle')}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="topics_id">{{__('Topik')}}</label>
                            <div class="col-sm-10">
                                <select name="topics_id" id="topics_id" class="custom-select form-control" required>
                                    <option selected disabled>Topic</option>
                                    @php($topics = App\Forum_topics::all())
                                    @foreach ($topics as $topics)
                                        <option value="{{$topics->id}}">{{$topics->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{__('Thumbnail')}}</label>
                                <div class="col-sm-10" id="imgup">
                                    <input type="file" name="img" id="thumbnail" class="dropify" data-max-file-size="0.5M" data-allowed-file-extensions="jpg png jpeg" required>
                                </div>
                                <div id="colimg" class="col-sm-10" style="float:right" style="display:none">
                                    <img src="" width="80%" alt="" id="imgthumb">
                                </div>
                        </div>
                    </div>
                    <div class="panel-footer text-right">
                        <a href="#" id="btnsave" class="btn btn-purple sape">{{__('Simpan')}}</a>
                        <button id="submit" type="submit" style="display:none" class="btn btn-purple sape">{{__('Simpan')}}</button>
                    </div>
                </form>
            </div>
            <!--===================================================-->
            <!--End Horizontal Form-->

        </div>
    </div>

@endsection

@section('script')
<script>
$('.dropify').dropify({
    messages: {
        'default': 'Drag and drop gambar',
        'replace': 'Drag and drop atau click untuk mengubah gambar',
        'remove':  'Hapus',
        'error':   'Ooops, ada kesalahan.'
    },

    error: {
        'fileSize': 'Ukuran file maksimal 3 MB.',
        'maxWidth': 'Lebar gambar maksimal 1000px.',
        'maxHeight': 'Tinggi gambar maksimal 1000px.',
        'imageFormat': 'Hanya menerima format gambar "jpg" "png" "jpeg".'
    }
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
<script>
    $("#btncreateRoom").on("click", function (e) {
        e.preventDefault()
        $("#thumbnail").show()
        $("#btncreateRoom").hide();
        $("#btnlistRoom").show();
        $("#listroom").hide();
        $("#isi").show();
        $("#panelTitle").text("Tambah Ruang Forum")
        $("#btnsave").show()
        $("#submit").hide()
    })

    $("#btnlistRoom").on("click", function (e) {
        e.preventDefault()
        $("#btnlistRoom").hide();
        $("#btncreateRoom").show();
        $("#title").val("")
        $("#subtitle").val("")
        $("#isi").hide();
        $("#listroom").show();
        $("#panelTitle").text("Ruang Forum")
        $('#topics_id').val(0);
        $('.selectpicker').selectpicker('refresh');
        $("#imgthumb").attr("src","")
        $("#imgthumb").hide()
        $("#imgup").show()
        $("#method").remove()
        $("#roomid").remove()
        $("#oimg").remove()
        $("#roomforum").attr("action","{{route('admin.forum.room.store')}}")
        $("#thumbnail").prop("required")
    })

    $("#listroom").on("click","#btnroom", function (e) {
        e.preventDefault()
        $("#title").val($(this).data("title"))
        $("#subtitle").val($(this).data("subtitle"))
        $('#topics_id').val(parseInt(parseInt($(this).data("topics-id"))));
        $('.selectpicker').selectpicker('refresh')
        $("#imgup").hide()
        $("#thumbnail").prop("required",false)
        $("#imgthumb").attr("src","{{asset('aset')}}".replace('aset',$(this).data("thumb")))
        $("#imgthumb").show()
        $("#btncreateRoom").click()
        $("#roomforum").attr("action","{{route('admin.update.room')}}")
        $("#roomforum").prepend("<input type='hidden' id='method' name='_method' value='put'><input type='hidden' id='roomid' name='id' value='"+$(this).data("id")+"'><input type='hidden' id='oimg' name='old_image' value='"+$(this).data("thumb")+"'>")
        $("#btnsave").hide()
        $("#submit").show()
    })

    $("#imgthumb").on("click", function () {
        $(this).hide()
        $("#imgup").show()
        $("#thumbnail").click()
    })

    $("#btnsave").click(function (e) {
        e.preventDefault()
        let inp = $("#thumbnail")[0]
        if(inp.files.length === 0){
            alert("harus ada thumbnail");
            inp.focus();
            return false;
        }else{
            $("#submit").click()
        }
    })
</script>
@endsection
