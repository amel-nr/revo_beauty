@extends('layouts.app')


@section('content')
    <div class="col-lg col-lg-offset">
        <div class="panel">
            <br>
            <div class="container" id="isibtn"> 
                    <a type="button" id="btnlistRoom" class="btn btn-primary" style="display:none;">Daftar Jenis Member</a>
                    <a type="button" id="btncreateRoom" class="btn btn-primary">Tambah Jenis Member</a>
            </div>
            <br>

            <div class="panel-heading">
                <h3 class="panel-title" id="panelTitle">{{__('Jenis Member')}}</h3>
            </div>

            <div id="listroom">
                <div class="container">
                    <div class="panel-body">
                        <div class="row" style="padding-bottom: 30px;">
                            @php($tiers = \App\Membership::with("unitperiod")->get())
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Maksimal Pembelanjaan</th>
                                    <th scope="col">Periode</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                            @foreach($tiers as $key => $tier)
                                    <tr id="tr{{$tier->id}}">
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{$tier->title}}</td>
                                        <td>{{'Rp. '.strrev(implode('.',str_split(strrev(strval($tier->max)),3)))}}</td>
                                        <td>{{$tier->period}} {{$tier->unitperiod["member_period"]}}</td>
                                        <td>
                                            <div class="btn-group dropdown">
                                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                                    Aksi <i class="dropdown-caret"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="#" id="btnedit" data-id="{{$tier->id}}">Ubah</a></li>
                                                    <li><a onclick="confirm_modal('oke');">Hapus</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                            @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--Horizontal Form-->
            <!--===================================================-->
            <div id="isi" style="display:none">
                <form action="{{route('admin.membership.store')}}" method="post" class="form-horizontal" id="roomforum" enctype="multipart/form-data">
                @csrf
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="title">{{__('Judul')}}</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="title" value="" placeholder="{{__('Title')}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="subtitle">{{__('Maksimal')}}</label>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" min=1 id="max" name="max" value="" placeholder="{{__('Maximum')}}" required>
                                </div>
                                <cite clas="font-weight-lighter text-muted" style="font-size:12px;color:#c9b286;">*total minimal pembelian</cite>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="topics_id">{{__('Periode')}}</label>
                                <div class="col-sm-3">
                                        <input type="number" class="form-control" min=0 name="period" id="period" placeholder="{{__('Period')}}" required>
                                </div>
                                <div class="col-sm-2 float-rigth">
                                    <select id="unit" name="period_unit" class="custom-select form-control" required>
                                        <option selected disabled>Unit</option>
                                        @php($periods = \App\Membership_period::all())
                                        @foreach($periods as $period)
                                            <option value="{{$period->id}}">{{$period->member_period}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer text-right">
                        <button id="btnSubmit" type="submit" class="btn btn-purple sape">{{__('Save')}}</button>
                        <a id="btnUpdate" class="btn btn-purple sape" style="display:none;">{{__('Update')}}</a>
                    </div>
                </form>
            </div>
            <!--===================================================-->
            <!--End Horizontal Form-->

        </div>
    </div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
<script>

    $("#btncreateRoom").on("click", function (e) {
        e.preventDefault()
        $("#btncreateRoom").hide();
        $("#btnlistRoom").show();
        $("#listroom").hide();
        $("#isi").show();
        $("#panelTitle").text("Tambah Jenis Member")
        $("#btnSubmit").show()
        $("#btnUpdate").hide()
    })

    $("#btnlistRoom").on("click", function (e) {
        e.preventDefault()
        $("#btnlistRoom").hide();
        $("#btncreateRoom").show();
        $("#isi").hide();
        $("#listroom").show();
        $("#panelTitle").text("Jenis Member")
        $("#idTier").remove()
        resetForm();
        getData();
    })

    $(".container").on('click',"#btnedit", function (e) {
        e.preventDefault()
        let id = $(this).data('id');
        getEdit(id)
        document.getElementById("btncreateRoom").click();
        $("#btnSubmit").hide()
        $("#btnUpdate").show()
    })

    $("#btnUpdate").on("click", function(e) {
        e.preventDefault()
        let form = {
            _token:"{{csrf_token()}}",
            id:$("#idTier").val(),
            title:$("input[name=title]").val(),
            min:$("#min").val(),
            max:$("#max").val(),
            period:$("#period").val(),
            unit:$("#unit").val()
        }
        $.post("{{route('admin.tier.update')}}",form, function (data) {
            if (data == "success") {
                $("#idTier").remove()
                showAlert('success','berhasil')
                $("#btnlistRoom").trigger("click");
            }else if(data == "dbfailed"){
                showAlert('danger','db error')
            }else{
                showAlert('danger','nominal total maximal sudah tersedia ada level member lain')
            }

        })
    })
    
    function getEdit(id) {
        $.get("{{route('admin.getMembership.tier','id')}}".replace('id',id), function (data) {
            $("input[name=title]").val(data.title)
            $("#max").val(data.max)
            $("#period").val(data.period)
            $("#unit").val(data.period_unit).change();
            $("#isi").append(`
                <input type="hidden" class="form-control" id="idTier" value="`+data.id+`">
            `)
        })
    }

    function resetForm() {
        $("input[name=title]").val("")
            $("#min").val("")
            $("#max").val("")
            $("#period").val("")
            $("#unit").val("")
    }

    function getData() {
        $.get("{{route('admin.member.get')}}",function (data) {
            var tier = "";
            data.forEach(el => {
                tier +=`
                <tr id="tr`+el.id+`">
                                        <th scope="row">`+el.id+`</th>
                                        <td>`+el.title+`</td>
                                        <td>`+convertToRupiah(el.max)+`</td>
                                        <td>`+el.period+`</td>
                                        <td>`+el.unitperiod.member_period+`</td>
                                        <td>
                        <div class="btn-group dropdown">
                            <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                Actions <i class="dropdown-caret"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#" id="btnedit" data-id="`+el.id+`">Edit</a></li>
                                <li><a onclick="confirm_modal('oke');">Delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                `
            });
            $("#tbody").html(tier)
        })
    }

    function convertToRupiah(angka)
        {
            var rupiah = '';		
            var angkarev = angka.toString().split('').reverse().join('');
            for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
            return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
        }

</script>
@endsection
