@extends('layouts.app')


@section('content')
    <div class="col-lg col-lg-offset">
    <a href="{{route('admin.skinlopedia.list')}}" class="panel-title"><i class="fa fa-arrow-left"></i></a>
        
        <div class="panel" style="height:1000px">
            <div class="panel-heading">
                <h3 class="panel-title">{{__('Phebe Choice')}}</h3>
            </div>

            <!--Horizontal Form-->
            <!--===================================================-->
            <div class="form-group">
                        <label class="col-sm-2 control-label" for="phoebechoice">{{__('Phoebe Choice (Maks. 20)')}}</label>
                        <div class="col-sm-10">
                        <select name="phoebechoice[]" id="phoebechoice" class="selectpicker" data-title="Tidak ada yang terpilih" data-selected-text-format="count" data-count-selected-text="{0} produk Pilihan" data-show-subtext="true" data-live-search="true" data-max-options="20" data-selected-text-format="count > 2" multiple>
                            <option disabled data-subtext="Pilihan">Produk Pilihan</option>
                            @php($products = App\Product::where("published",1)->get())
                            @foreach($products as $key => $product)
                            <option value="{{$product->id}}" data-subtext="{{$product->category->name}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                        <a href="#" id="btnAdd" class="btn btn-success"><i class="fa fa-check"></i></a>
                        </div>
            </div>
            <input type="hidden" name="max" id="maxpc">
            <br>
            <br>
            <div class="row">
            <ul id="listpc">
            </ul>
            </div>
            <!--===================================================-->
            <!--End Horizontal Form-->
            

        </div>
    </div>

@endsection

@section('script')

<script>
    $(document).ready(function () {
        fetchPc()

        $("#listpc").on("click", "#delpc", function (e) {
            e.preventDefault()
        })

        $("#btnAdd").on("click", function (e) {
            e.preventDefault()
            
            let id = $("#phoebechoice").val()
            let data = {
                _token: "{{csrf_token()}}",
                id: id
            }
            // alert(id.length)
            $.post("{{route('admin.add_phoebechoice')}}", data, function (ndata) {
                if (ndata == "max") {
                    showAlert("danger","batas maximal phoebes choice 20 item")
                }else{
                    showAlert("success","berhasil menambah item")
                }
                    
                fetchPc()
            })
        })
    })

    function fetchPc() {
        $.get("{{route('admin.get_phoebechoice')}}", function (data) {
            let content='';
            data.forEach(el => {
                content += `
                <li> `+el.product.name+` | <a href="#" id="delpc" onclick="deletePc(`+el.product_id+`)">hapus</a></li>
                `
            });
            $("#listpc").html(content)
            $("#maxpc").val(data.length)
        })
    }

    function deletePc(id) {
        $.get("{{route('admin.del_phebechoice',['id'=>'pcid'])}}".replace("pcid",id), function (data) {
            // console.log(data)
            if (data=="deleted") {
                showAlert("success","berhasil mengahpus item")
            }else{
                showAlert("danger","gagal mengahpus item")
                
            }
            fetchPc()
        })
    }


    
</script>
@endsection
