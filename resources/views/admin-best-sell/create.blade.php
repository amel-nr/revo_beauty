@extends('layouts.app')

@section('content')

<div class="col-lg col-lg-offset">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{__('Informasi Produk Best Sell')}}</h3>
        </div>

        <!--Horizontal Form-->
        <!--===================================================-->
        <div class="panel-body">
            <div class="row">
            @php
                $filter = DB::table("product_best_sell")->first();
                $filtered = [];
                
                    if($filter != null || isset($filter->filter)){
                        $filtered = json_decode($filter->filtered);
                    }
            @endphp
                <div class="col-lg-4">
                    <input type="radio" name="filter" data-name="Terlaris" id="Terlaris" value="1" {{isset($filter->filter)? $filter->filter == 1? "checked":'':''}} >
                    <label for="Terlaris">Terlaris</label><br>
                    <input type="radio" name="filter" data-name="Brand" id="Brand" value="2" {{isset($filter->filter)? $filter->filter == 2? "checked":'':''}}>
                    <label for="Brand">Brand</label><br>
                    <input type="radio" name="filter" data-name="Kategori" id="Kategori" value="3" {{isset($filter->filter)? $filter->filter == 3? "checked":'':''}}>
                    <label for="Kategori">Kategori</label><br>
                    <input type="radio" name="filter" data-name="Input Manual" id="Manual" value="4" {{isset($filter->filter)? $filter->filter == 4? "checked":'':''}}>
                    <label for="Manual">Input manual</label><br>
                </div>
                <div class="col-lg-8">
                    <div id="rekomendasiBs" style="display:{{isset($filter->filter)? $filter->filter == 1?'block':'none':''}};">
                        <div style="overflow:scroll">
                            <div id="tblBs"></div>
                        </div>
                    </div>

                    <div id="rekomendasibrand" style="display:{{isset($filter->filter)? $filter->filter == 2?'block':'none':''}};">                                
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="brand">{{__('Pilih Brand')}}</label>
                                <div class="col-sm-10">
                                    <select name="brand[]" id="selectbrand" class="selectpicker" data-title="Tidak ada yang terpilih" data-selected-text-format="count" data-count-selected-text="{0} brand Pilihan" data-show-subtext="true" data-live-search="true" data-max-options="20" data-selected-text-format="count > 2" multiple>
                                        <option disabled data-subtext="Pilihan">Brand Pilihan</option>
                                                
                                                @php($brands = DB::table('brands')->get())
                                                @foreach($brands as $key => $brand)
                                        <option value="{{$brand->id}}" data-subtext="{{$brand->name}}" {{$filtered != null? in_array($brand->id, $filtered)?"selected":"":""}}>{{$brand->name}}</option>
                                                @endforeach
                                    </select>
                                    <a href="#" id="btnAddBrand" class="btn btn-success"><i class="fa fa-check"></i></a>
                                </div>
                            </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div id="listbrand" style="margin-top:3px;"></div>
                                    <div id="listproduk"></div>
                                </div>
                    </div>

                    <div id="rekomendasictg" style="display:{{isset($filter->filter)? $filter->filter == 3?'block':'none':''}};">                                
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="ctg">{{__('Pilih Kategori')}}</label>
                                <div class="col-sm-10">
                                    <select name="ctg[]" id="selectctg" class="selectpicker" data-title="Tidak ada yang terpilih" data-selected-text-format="count" data-count-selected-text="{0} kategori Pilihan" data-show-subtext="true" data-live-search="true" data-max-options="20" data-selected-text-format="count > 2" multiple>
                                        <option disabled data-subtext="Pilihan">Kategori Pilihan</option>
                                                
                                                @php($scategories = DB::table('sub_categories')->get())
                                                @foreach($scategories as $key => $sc)
                                        <option value="{{$sc->id}}" data-subtext="{{$sc->name}}" {{$filtered != null ? in_array($sc->id, $filtered)?"selected":"":""}}>{{$sc->name}}</option>
                                                @endforeach
                                    </select>
                                    <a href="#" id="btnAddCtg" class="btn btn-success"><i class="fa fa-check"></i></a>
                                </div>
                            </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div id="listctg" style="margin-top:3px;"></div>
                                    <div id="listprodukctg"></div>
                                </div>
                    </div>

                    <div id="manualinput" style="display:{{isset($filter->filter)? $filter->filter == 4?'block':'none':''}};">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="selectproduk">{{__('Pilih produk')}}</label>
                            <div class="col-sm-10">
                                <select name="produk[]" id="selectproduk" class="selectpicker" data-title="Tidak ada yang terpilih" data-selected-text-format="count" data-count-selected-text="{0} produk Pilihan" data-show-subtext="true" data-live-search="true" data-max-options="20" data-selected-text-format="count > 2" multiple>
                                    <option disabled data-subtext="Pilihan">produk Pilihan</option>
                                                
                                                @php($products = \App\Product::with("subcategory")->get())
                                                @foreach($products as $key => $p)
                                    <option value="{{$p->id}}" data-subtext="{{$p->subcategory->name}}" {{$filtered != null ? in_array($p->id, $filtered)?"selected":"":""}}>{{$p->name}}</option>
                                                @endforeach
                                </select>
                                    <a href="#" id="btnAddproduk" class="btn btn-success"><i class="fa fa-check"></i></a>
                            </div>
                        </div>
                                <br>
                                <br>
                        <div class="row">
                                    <div id="listprodukmanual"></div>
                        </div>
                    </div>                    
                </div>
                
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
        if ($("#Terlaris").is(":checked")) {
            fetchBs()
        }
        if ($("#Brand").is(":checked")) {
            fetchBrands()
        }
        if ($("#Kategori").is(":checked")) {
            fetchCategories()
        }
        if ($("#Manual").is(":checked")) {
            $("#manualinput").show()
            fetchProduct();
        }

        get_subcategories_by_category();
        $('#category_id').on('change', function() {
            get_subcategories_by_category();
        });

        $('#subcategory_id').on('change', function() {
            get_subsubcategories_by_subcategory();
        });

        $("input[name='filter']").on("change", function () {
            let val = $(this).val()
            let teks = $(this).data("name")
            
                if (val == 1) {
                    addBestsell()
                }
            $.get("{{route('best-sell.update.filter',['id'=>'1','val'=>'filterval'])}}".replace('filterval',val), function (data) {

                location.reload()
            })
        })

        $("#btnAddBrand").on("click", function (e) {
                e.preventDefault()
                
                let id = $("#selectbrand").val()
                let data = {
                    _token: "{{csrf_token()}}",
                    brands: id
                }
                
                $.post("{{route('add_brand.bestsell')}}", data, function (ndata) {
                    fetchBrands()
                })
        })

        $("#btnAddCtg").on("click", function (e) {
            e.preventDefault()
                
                let id = $("#selectctg").val()
                let data = {
                    _token: "{{csrf_token()}}",
                    category: id
                }
                
                $.post("{{route('add_category.bestsell')}}", data, function (ndata) {
                    fetchCategories()
                })
        })

        $("#btnAddproduk").on("click", function (e) {
            e.preventDefault()

            let id = $("#selectproduk").val()
                let data = {
                    _token: "{{csrf_token()}}",
                    product: id
                }
                
                $.post("{{route('add_product.bestsell')}}", data, function (ndata) {
                    fetchProduct()
                })

        })

    });

    function addBestsell() {
        $.get("{{route('add_best_sell.bestsell')}}", function (data) {
            if (data =="success") {
                console.log("sukses")
            }
        })
    }

    function get_subcategories_by_category(){
        var category_id = $('#category_id').val();
        $.post('{{ route('subcategories.get_subcategories_by_category') }}',{_token:'{{ csrf_token() }}', category_id:category_id}, function(data){
            $('#subcategory_id').html(null);
            for (var i = 0; i < data.length; i++) {
                $('#subcategory_id').append($('<option>', {
                    value: data[i].id,
                    text: data[i].name
                }));
                $('.demo-select2').select2();
            }
            get_subsubcategories_by_subcategory();
        });
    }

    function get_subsubcategories_by_subcategory(){
        var subcategory_id = $('#subcategory_id').val();
        $.post('{{ route('subsubcategories.get_subsubcategories_by_subcategory') }}',{_token:'{{ csrf_token() }}', subcategory_id:subcategory_id}, function(data){
            $('#subsubcategory_id').html(null);
            $('#subsubcategory_id').append($('<option>', {
                value: null,
                text: null
            }));
            for (var i = 0; i < data.length; i++) {
                $('#subsubcategory_id').append($('<option>', {
                    value: data[i].id,
                    text: data[i].name
                }));
                $('.demo-select2').select2();
            }
            //get_brands_by_subsubcategory();
            //get_attributes_by_subsubcategory();
        });
    }

    function fetchBrands() {
        $.get("{{route('get_brand.bestsell')}}", function (data) {
            let content='('+data[0].length+') brand terpilih : ';
            data[0].forEach(el => {
                content += `
                <a class="btn btn-primary"> `+el.name+`</a>
                `
            });

            let product = `
            <br><div> (`+data[1].length+`) Produk terpilih</div>
            <div class="hai" style="height:500px;overflow:scroll;">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fhoto</th>
                    <th scope="col">Produk</th>
                    </tr>
                </thead>
                <tbody>
            `
            data[1].forEach(function(el,i){
                product+=`
                <tr>
                    <th scope="row">`+(i+1)+`</th>
                        <td><img src="{{asset('`+JSON.parse(el.photos)+`')}}" style="border-radius: 4px;padding: 5px;width: 70px;"></td>
                        <td>`+el.name+` | <cite class="text-mute">`+el.brand.name+`</cite></td>
                        <td></td>
                    </tr>
                `
            });
            product += `</tbody></table></div>`


            $("#listbrand").html(content)
            $("#listproduk").html(product)
        })
    }

    function fetchCategories() {
        $.get("{{route('get_categories.bestsell')}}", function (data) {
            let content='( '+data[0].length+' ) kategori terpilih : '
            data[0].forEach(el => {
                content += `
                    <a class="btn btn-primary">`+el.name+`</a>
                `
            });
            $("#listctg").html(content)

            let product = `
            <br><div> (`+data[1].length+`) Produk terpilih</div>
            <div class="hai" style="height:500px;overflow:scroll;">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fhoto</th>
                    <th scope="col">Produk</th>
                    </tr>
                </thead>
                <tbody>
            `
            data[1].forEach(function(el,i){
                product+=`
                <tr>
                    <th scope="row">`+(i+1)+`</th>
                        <td><img src="{{asset('`+JSON.parse(el.photos)+`')}}" style="border-radius: 4px;padding: 5px;width: 70px;"></td>
                        <td>`+el.name+` | <cite class="text-mute">`+el.subcategory.name+`</cite></td>
                        <td></td>
                    </tr>
                `
            });
            product += `</tbody></table></div>`
            $("#listprodukctg").html(product)
        })
    }

    function fetchBs() {
        $.get("{{route('get_best_sell.bestsell')}}", function (data) {
            let content = `
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fhoto</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Total pembelian</th>
                    </tr>
                </thead>
                <tbody>
            `
            data.forEach(function(el,i){
                content+=`
                <tr>
                    <th scope="row">`+(i+1)+`</th>
                        <td><img src="{{asset('`+JSON.parse(el.product.photos)+`')}}" style="border-radius: 4px;padding: 5px;width: 70px;"></td>
                        <td>`+el.product.name+`</td>
                        <td>`+el.total_product+`</td>
                    </tr>
                `
            });
            content += `</tbody></table>`
            $("#tblBs").html(content)
        })
    }

    function fetchProduct() {
        $.get("{{route('get_product.bestsell')}}", function (data) {
            let content = `
            <br><div> (`+data.length+`) Produk terpilih</div>
            <div class="hai" style="height:500px;overflow:scroll;">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fhoto</th>
                    <th scope="col">Produk</th>
                    </tr>
                </thead>
                <tbody>
            `
            data.forEach(function(el,i){
                content+=`
                <tr>
                    <th scope="row">`+(i+1)+`</th>
                        <td><img src="{{asset('`+JSON.parse(el.photos)+`')}}" style="border-radius: 4px;padding: 5px;width: 70px;"></td>
                        <td>`+el.name+` | <cite class="text-mute">`+el.subcategory.name+`</cite></td>
                        <td></td>
                    </tr>
                `
            });
            content += `</tbody></table></div>`
            $("#listprodukmanual").html(content)
        })
    }

    


    
</script>

@endsection
