@extends('layouts.app')

@section('content')

<div class="col-lg col-lg-offset">
    <div class="panel">
        <div class="panel-heading">
            <div class="panel-title">Grand Banner Promosi</div>
        </div>
        <div class="panel-body">
            <div class="list-group">
                <a href="#" id="btn-promosi" data-check="up" class="list-group-item list-group-item-action">
                  Ubah Grand Banner <i class="fa fa-chevron-down" style="float:right" aria-hidden="true"></i>
                </a>
                <div class="row" id="gbp" style="display: none;margin-top:13px">
                    <div class="col" >
                        @php $gbpromosi = DB::table('banners')->where("url","#promosi")->first(); @endphp
                        <form action="{{route('admin.gbpromosi')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input name="photo" type="file" @isset($gbpromosi) data-default-file="{{asset($gbpromosi->photo)}}" @endisset name="" id="gbpromosi">
                            <button type="submit" class="btn btn-primary" style="margin:0 auto;margin-top: 13px;float:right"> Simpan </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel">
        <div class="panel-heading" style="margin-bottom:33px">
            <h3 class="panel-title">{{__('Informasi Banner Promosi')}}</h3>
            <div class="" style="float:right;margin-right:13px;"><span id="plus" class="btn btn-primary"><i class="fa fa-plus"></i></span></div>
        </div>

        <!--Horizontal Form-->
        <!--===================================================-->
        <div class="panel-body">
            <div class="row">
                <div id="formAdd" class="col-lg-4" style="float:right;display:none">
                    <a href="#" id="minimize"><i class="fa fa-close"></i></a>
                    <div class="panel">
                    <form action="{{route('admin.add.promo')}}" method="post" enctype="multipart/form-data">
                        <div style="width:80%">
                                <div class="input-group mb-3">
                                    @csrf
                                    <input type="file" class="form-control" name="banner" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                                    <textarea class="form-control" type="text" name="caption" required></textarea>
                                    <button type="submit"><i class="fa fa-check"></i></button>
                                </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg">
                    @php
                        $promo = DB::table("promotion")->get();
                    @endphp
                        @foreach($promo as $key => $value)
                                <img src="{{asset($value->banner)}}" style="padding:2px;background-color:#F25735;margin-right:4px;margin-left:4px;margin-bottom:6px;width:290px;height: auto;" alt="" srcset="">
                        @endforeach
            </div>
        </div>
        <!--===================================================-->
        <!--End Horizontal Form-->

    </div>
</div>

@endsection
@section('script')
<script type="text/javascript">

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
        $("#btn-promosi").click(function (e) {
            e.preventDefault()
            let check = $(this).attr("data-check")
            if (check == "up") {
                $(this).find(".fa-chevron-down").css("transform", "rotate(180deg)")
                $(this).attr("data-check","down")
                $("#gbp").slideDown()
            }else{
                $("#gbp").slideUp()
                $(this).find(".fa-chevron-down").css("transform", "rotate(0deg)")
                $(this).attr("data-check","up")
            }
        })
    })
    
    $("#gbpromosi").dropify({
        messages: {
            'default': 'Letakkan thumbnail post disini',
            'replace': 'Klik disini untuk merubah gambar',
            'remove':  'Hapus',
            'error':   'Ooops, ada kesalahan.'
        },
        error: {
            'fileSize': 'Ukuran file terlalu besar, maksimal  485kb .',
            'imageFormat': 'File harus berformat gambar ( jpg jpeg png ).'
        }
    });

    
</script>

@endsection
