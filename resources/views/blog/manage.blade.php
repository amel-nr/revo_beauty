@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-7 col-lg-offset">
        <div class="panel">
                <h3 class="panel-title">{{__('Blog')}}</h3>

            <style>
            .ps {
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            }
            </style>

            <div class="container">
            <div class="mr-auto">
                <a href="{{route('admin.blog.create')}}"><i class="fa fa-plus-square fa-2x"></i></a>
            </div>
                <div class="row" style="padding-bottom: 10px;padding-top: 10px;">
                    <div class="col-lg-6">
                        <div class="ask panel-content">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Penulis</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($blog as $key => $b)
                                    <tr>
                                        <th>{{$key+1}}</th>
                                        <th><a href="{{ route('artikel',[ 'id'=> $b->id ]) }}" style="color:{{ $b->showblog == 1 ? '#64BD63' : '#4D627B'}};">{!! \Illuminate\Support\Str::limit($b->title, 15, $end='..') !!}</a></th>
                                        <th>{{$b->category->title}}</th>
                                        <th>{{$b->user['name']}}</th>
                                        <th>{!!$b->created_at!!}</th>
                                        <th>
                                            <a href="{{route('admin.blog.edit',['id' => $b->id])}}"><i class="fa fa-edit"></i></a>
                                            <a href="{{route('admin.blog.delete',['id' => $b->id]) }}"><i class="fa fa-trash"></i></a>
                                            <a href="#"><i class="fa fa-eye-slash"></i></a>
                                            <form action="{{route('admin.blog.showhide')}}" method="post">
                                            @csrf 
                                            <input type="hidden" name="id" value="{{$b->id}}">
                                            <input type="hidden" name="sb" value="{{$b->showblog == 1? 0 : 1}}">
                                        <button type="submit" class="btn {{ $b->showblog == 1 ? 'btn-danger' : 'btn-success'}} ">{{ $b->showblog == 1 ? 'Sembunyikan' : 'Tampilkan'}}</button>
                                            </form>
                                        </th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-lg-5">
        <div class="panel">
        <h3 class="panel-title">{{__('Kategori Blog')}}</h3>
            <div class="panel-body">
                <div class="hilang" id="hilang" style="float:right;">
                    <div class="row">
                    <a href="#" id="btnminimize" class="btn" style="color:white;background-color:#FC6D7F;margin-top:-15px;display:none"><span style="font-weight:bold;">-</span></a>
                        <select name="categoryblog[]" id="categoryblog" class="selectpicker" data-title="Tidak ada yang terpilih" data-selected-text-format="count" data-count-selected-text="{0} produk Pilihan" data-show-subtext="true" data-live-search="true" data-max-options="20" data-selected-text-format="count > 2" multiple>
                            <option disabled data-subtext="Pilihan">Produk Pilihan</option>
                                @php($categoryblog = App\categoryblog::all())
                                    @foreach($categoryblog as $key => $cb)
                            <option value="{{$cb->id}}">{{$cb->title}}</option>
                                    @endforeach
                        </select>
                        <a href="#" id="btndel" class="btn btn-danger" style="margin-top:-15px"><i class="fa fa-trash"></i></a>
                        <a href="#" id="btnedit" class="btn" style="color:white;background-color: #f79f2c;margin-top:-15px"><i class="fa fa-edit"></i></a>
                        <a href="#" id="editsave" class="btn" style="display:none;color:white;background-color: #f79f2c;margin-top:-15px"><i class="fa fa-check"></i></a>
                        <a href="#" id="addctg" class="btn" style="color:white;background-color: #6cbf24;margin-top:-15px"><i class="fa fa-plus"></i></a>
                        <a href="#" id="btnsave" class="btn btn-primary" style="display:none;margin-top:-15px"><i class="fa fa-check"></i></a>
                    </div>
                    <div class="row">
                        <div id="inputnewctg" style="display:none">
                            <form action="#" method="post" id="formctg" enctype="multipart/form-data">
                                <input class="form-control" type="text" name="title" id="ctgname" style="margin-bottom:8px" placeholder="Masukkan nama Kategori" required>
                                <div id="warning"></div>
                                <input class="dropify form-control" type="file" name="icon" id="ctgicon" data-allowed-file-extensions="jpg png jpeg" data-max-file-size="1M" style="margin-top:8px" required><cite id="disclaimer" style="color:#172B4D;display:none">*biarkan kosong jika tidak ingin merubah icon</cite>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
$(document).ready(function () {

    $("#addctg").on("click", function (e) {
        e.preventDefault()
        $("#inputnewctg").slideDown();
        $(this).hide()
        $("#btnsave").show()
        $("#btnminimize").show()
        $("#ctgname").addClass("ctgname")
    })
    $("#btnsave").on("click", function (e) {
        $("#warning").html("")
        e.preventDefault()
        if ($("#ctgname").val() == "") {
            alert("tambahkan nama kategori")
        }else{
            store()
        }
    })

    $("#inputnewctg").on("keyup",".ctgname", function ()
    {
        let ctgblog = $(this).val()
        nameCtgBlog(ctgblog)
    })

    $("#btnminimize").on("click", function (e) {
        e.preventDefault()
        $("#btnsave").hide()
        $("#addctg").show()
        $("#inputnewctg").slideUp();
        $("#formctg")[0].reset();
        $('.selectpicker').selectpicker('refresh');
        $('.dropify-clear').click();
        $(this).hide()
        $("#editsave").hide()
        $("#btnedit").show()
        $("#warning").html("")
    })
    $("#btndel").on("click", function (e) {
        e.preventDefault()
        cdelete()
    })
    $("#btnedit").on("click", function (e) {
        e.preventDefault()
        $("#ctgname").removeClass("ctgname")
        if ($("#categoryblog").val().length != 1) {
            alert('pilih salah satu kategori untuk di edit')
            $("#btnminimize").click()
        }else{
            $("#inputnewctg").slideDown();
            $("#editsave").show()
            $(this).hide()
            $("#btnminimize").show()
            $("#disclaimer").show()
            edit()
        }
    })
    $("#editsave").on("click", function (e) {
        e.preventDefault()
        let id = $("#idctg").val()
        update(id)
    })
})


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

    // this will contain a reference to the checkbox   
function store() {
    let data = new FormData($("#formctg")[0])
    data.append("_token","{{csrf_token()}}")
        $.ajax({
        url:'{{route("admin.add.category")}}',
        data:data,
        async:false,
        type:'post',
        processData: false,
        contentType: false,
        success:function(response){
            console.log(response)
            if (response == "success") {
                location.reload()
            }
        }
        });
}

function cdelete() {
    let data = $("#categoryblog").val()
    // console.log(data);
    $.get("{{route('admin.delete.category',['id'=>'cid'])}}".replace("cid",data), function (response) {
        if (response == "deleted") {
            location.reload()
        }
    })
}

function edit() {
    let id = $("#categoryblog").val()
    $.get("{{route('admin.edit.category',['id'=>'ctgid'])}}".replace("ctgid",id),function (data) {
        $("#ctgname").val(data.title)
        let src = "{{asset('blog/icon-category/cuaks')}}".replace("cuaks",data.icon)
        console.log(src)
        $("#ctgicon").attr("data-default-file",src);
        $('.selectpicker').selectpicker('refresh');
        $("#formctg").append(`<input type="hidden" id="old_image" name="old_image" value="`+data.icon+`"><input type="hidden" id="idctg" name="idctg" value="`+data.id+`">`)
    })
}

function update(id) {
    let data = new FormData($("#formctg")[0])
    data.append("old_image",$("#old_image").val())
    data.append("_token","{{csrf_token()}}")
    data.append("id",id)
        $.ajax({
        url:'{{route("admin.update.category")}}',
        data:data,
        async:false,
        type:'post',
        processData: false,
        contentType: false,
        success:function(response){
            if (response == "success") {
                location.reload()
            }
        }
        });
}

function nameCtgBlog(ctgblog)
{
    
    $.get("{{route('get.name.ctg','ctgblog')}}".replace('ctgblog',ctgblog), function (data)
    {
        if (data == "exist") {
            $("#btnsave").hide()
            $("#warning").html("<span style='color:red'>"+ctgblog+" sudah ada</span>")
        }else {
            $("#btnsave").show()
            $("#warning").html("<span style='color:green'>"+ctgblog+" tersedia</span>")
        }
    })
}
</script>
@endsection
