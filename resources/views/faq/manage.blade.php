@extends('layouts.app')

@section('content')

<div class="col-lg col-lg-offset">
    <div class="panel">
        <div class="panel-heading" style="margin-bottom:33px">
            <h4 class="panel-title text-center">{{__('FAQ')}}</h4>
            <div class="" style="float:left;margin-left:13px;"><span id="plus" class="btn btn-primary"><i class="fa fa-plus"></i></span></div>
            <div class="row">
                <div id="formAdd" class="col-lg-4" style="float:left;display:none">
                    <a href="#" style="float:right;margin-right:13px;margin-top:13px;" id="minimize"><i class="fa fa-close"></i></a>
                    <div class="panel" style="margin-left:13px;margin-top:13px;">
                        <form action="{{route('admin.add.faq.category')}}" method="post">
                                        @csrf
                                <input type="text" class="form-control" name="title" placeholder="tambah kategori FAQ" required>
                                <button type="submit"><i class="fa fa-check"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--Horizontal Form-->
        <!--===================================================-->
        <div class="panel-body">
            <cite class="text-mute" style="text-color:#576166">*atur banner FAQ</cite>
            <form action="{{route('add.banner.faq')}}" method="post" enctype="multipart/form-data">
            @csrf
                @php
                    $banner = \App\Banner::where("url","#faq")->first();
                    $faqbanner = '';
                    if(isset($banner)){ 
                        $faqbanner = $banner->photo;
                    }
                @endphp
                <input type="file" name="banner" id="banner" data-max-file-size="0.5M" data-allowed-file-extensions="jpg png jpeg" data-default-file="{{asset($faqbanner)}}">
                <div class="row">
                    <button type="submit" class="btn btn-primary" style="margin-top:14px;float:right;margin-bottom:14px">Simpan Banner</button> 
            </form>
        </div>
        <hr>
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{route('admin.faq.store')}}" id="formFaq" method="post" class="form-horizontal">
                        <div class="panel-body">
                        @csrf
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="ctgid">{{__('Kategori FAQ')}}</label>
                                <div class="col-sm-10">
                                <select name="category_id" class="selectpicker" id="ctgid" data-title="pilih kategori" data-live-search="true" required>
                                    @php($faqs = App\faqCategory::all())
                                    @foreach($faqs as $key => $faq)
                                    <option value="{{$faq->id}}">{{strtoupper($faq->title)}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="title">{{__('Pertanyaan')}}</label>
                                <div class="col-sm-10">
                                    <input type="text" id="ask" class="form-control" name="ask" value="" placeholder="{{__('Judul')}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="name">{{__('Jawaban')}}</label>
                                <div class="col-sm-10">
                                    <textarea class="content" id="faq" name="ans" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-right">
                            <a href="#" class="btn btn-warning" id="btncancel" style="display:none">{{__('Batal')}}</a>
                            <a href="#" class="btn btn-danger" id="btndelete" style="display:none">{{__('Hapus')}}</a>
                            <button type="submit" class="btn btn-purple sape">{{__('Simpan')}}</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="panel">
                        <div class="panel-body" style="overflow:scroll;height:450px">
                        <cite style="margin-bottom:3px;color:#F3795C">*klik judul kategori untuk mengubah data</cite>
                        <ul class="list-group list-group-flush">
                    @php($faqs = \App\faqCategory::with("faq")->get())
                    @foreach($faqs as $key=>$value)
                        <li class="list-group-item">
                        <a href="#" id="cfaq{{$value->id}}" onclick="myslide({{$value->id}})" data-id="{{$value->id}}" style="font-weight:bold;">{{$value->title}}</a>
                        <div class="row" id="ctgedit{{$value->id}}" style="display:none;">
                            <form action="{{route('admin.update.faq.category')}}" method="post">@method("put")@csrf
                            <a href="{{route('admin.delete.faq.category',['id'=>$value->id])}}"><i class="fa fa-trash-o"></i></a>
                            <input type="text" value="{{$value->title}}" name="title" id="inputctg" style="width:70%;border-style: solid;border-width: 1px;border-color:#E6ECED;" >
                            <input type="hidden" value="{{$value->id}}" name="id" id="inputctg" style="width:70%;border-style: solid;border-width: 1px;border-color:#E6ECED;" >
                            <button type="submit" href="#"><i class="fa fa-save"></i></button>
                            </form>
                            <a href="#" id="cancelc{{$value->id}}" onclick="myslide({{$value->id}})"><i class="fa fa-window-minimize"></i></a>
                        </div>
                            <ul class="list-group list-group-flush">
                                @foreach($value->faq as $faq)
                                <li style="margin-bottom:2px;margin-left:auto;margin-right:auto;">
                                    @php($ans = json_encode($faq->ans))
                                    <a href="#" onclick="edit({{$faq->id}})" data-ctg = "{{$faq->category_id}}" id="btnfaq{{$faq->id}}" data-id="{{$faq->id}}" data-ask="{{$faq->ask}}" data-ans='{{$ans}}'>{{$faq->ask}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
            

        
        </div>

    </div>
</div>

@endsection
@section('script')
<script type="text/javascript">
    $('#faq').summernote({
                        shortcuts: false,
                        indent:true,
                        outdent:true,
                        tabDisable: false,
                        placeholder: 'Faq..',
                        height: 200,
                        codeviewFilter: true,
                        toolbar: [
                            ['style', ['bold', 'italic', 'underline', 'clear']],
                            ['view', ['fullscreen', 'codeview']],
                            ['font', ['strikethrough', 'superscript', 'subscript']],
                            ['fontsize', ['fontsize']],
                            ['insert', ['link']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['height', ['height']],
                            'undo','redo'
                        ],
                        lineHeights: ['0.2', '0.3', '0.4', '0.5', '0.6', '0.8', '1.0', '1.2', '1.4', '1.5', '2.0', '3.0']
                    });

                    $('#banner').dropify({
                        messages: {
                            'default': 'Seret banner dan lepaskan disini',
                            'replace': 'Drag and drop atau click untuk mengubah gambar',
                            'remove':  'Hapus',
                            'error':   'Ooops, ada kesalahan.'
                        },

                        error: {
                            'imageFormat': 'Hanya mendukung format gambar "jpg" "png" "jpeg".'
                        }
                    });


    $(document).ready(function(){
        $("#listbanner").on("click", function (e) {
            e.preventDefault()
            $("#img").slideDown()
            $(this).find("#minimize").slideDown()
        })
        $("#delete").on("click", function (e) {
            e.stopPropagation()
            e.preventDefault()
            // alert("deleted")
        })
        $("#minimize").on("click", function (e) {
            e.stopPropagation()
            e.preventDefault()
            $("#formAdd").slideUp()
        })
        $("#plus").on("click", function (e) {
            e.preventDefault()
            $("#formAdd").slideDown()
        })
        $("#btncancel").on("click", function (e) {
            e.preventDefault()
            $("#formFaq")[0].reset()
            $("#formFaq").attr("action","{{route('admin.faq.store')}}")
            $('.selectpicker').selectpicker('refresh');
            $("#faq").summernote('code',"")
            $("#faq_id").remove()
            $(this).hide()
            $("#btndelete").hide()
        })
        $("#btndelete").on("click", function (e) {
            e.preventDefault()
            if (confirm("yakin hapus?")) {
                $.get($(this).attr("href"),function (data) {
                    location.reload()
                })
            }
        })

    })
        function myslide(id) {
            $("#cfaq"+id).on("click", function (e) {
                e.preventDefault()
                $("#ctgedit"+id).slideDown()
            })
            $("#cancelc"+id).on("click", function (e) {
                e.preventDefault()
                $("#ctgedit"+id).slideUp()
            })
        }
    function edit(id) {
            $("#faq_id").remove()
            $("#ask").val($("#btnfaq"+id).data("ask"))
            $("#ctgid").val($("#btnfaq"+id).data("ctg"))
            $("#faq").summernote('code',JSON.parse($("#btnfaq"+id).attr("data-ans")))
            $('#ctgid').prop('selected', parseInt($("#btnfaq"+id).attr("data-id")));
            $('.selectpicker').selectpicker('refresh');
            $("#formFaq").attr("action","{{route('admin.faq.update')}}")
            $("#formFaq").append(`<input type="hidden" id="faq_id" name="id" value="`+id+`">`)
            $("#btncancel").show()
            $("#btndelete").attr("href","{{route('admin.faq.delete',['id'=>'faqid'])}}".replace("faqid",id))
            $("#btndelete").show()

    }
    
</script>

@endsection
