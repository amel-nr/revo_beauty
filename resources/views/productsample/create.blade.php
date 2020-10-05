@extends('layouts.app')

@section('content')

<div class="row">
    <form class="form form-horizontal mar-top" action="{{ route('sample.store')}}" method="POST" enctype="multipart/form-data" id="choice_form">
        @csrf
        <input type="hidden" name="added_by" value="admin">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">{{__('Informasi Sampel Produk')}}</h3>
            </div>
            <div class="panel-body">
                <div class="tab-base tab-stacked-left">
                    <!--Nav tabs-->
                    <ul class="nav nav-tabs">
                       {{-- <li class="active">
                            <a data-toggle="tab" href="#demo-stk-lft-tab-1" aria-expanded="true">{{__('General')}}</a>
                        </li>
                       <li class="">
                            <a data-toggle="tab" href="#demo-stk-lft-tab-2" aria-expanded="false">{{__('Images')}}</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#demo-stk-lft-tab-3" aria-expanded="false">{{__('Videos')}}</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#demo-stk-lft-tab-4" aria-expanded="false">{{__('Meta Tags')}}</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#demo-stk-lft-tab-5" aria-expanded="false">{{__('Customer Choice')}}</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#demo-stk-lft-tab-6" aria-expanded="false">{{__('Price')}}</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#demo-stk-lft-tab-7" aria-expanded="false">{{__('Penggunaan')}}</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#demo-stk-lft-tab-8" aria-expanded="false">Display Settings</a>
                        </li> 
                        <li class="">
                            <a data-toggle="tab" href="#demo-stk-lft-tab-9" aria-expanded="false">{{__('Shipping Info')}}</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#demo-stk-lft-tab-10" aria-expanded="false">{{__('PDF Specification')}}</a>
                        </li>--}}
                    </ul>

                    <!--Tabs Content-->
                    <div class="tab-content">
                        <div id="demo-stk-lft-tab-1" class="tab-pane fade active in">
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{__('Nama Sampel')}}</label>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" name="name" placeholder="{{__('Nama Sampel')}}" required>
                                </div>
                            </div>
                            <div class="form-group" id="subsubcategory">
                                <label class="col-lg-2 control-label">{{__('Produk')}}</label>
                                <div class="col-lg-7">
                                    <select class="form-control demo-select2-placeholder" name="product" id="product_id" required>
                                        <option value="">{{ ('Pilih Product') }}</option>
                                        @foreach ($products as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{__('Stok')}}</label>
                                <div class="col-lg-7">
                                    <input type="number" class="form-control" name="stok" placeholder="Jumlah stok" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{__('Maksimal')}}</label>
                                <div class="col-lg-7">
                                    <input type="number" class="form-control" name="maksimal" placeholder="Maksimal sampel" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer text-right">
                <button type="submit" name="button" class="btn btn-info">{{ __('Simpan') }}</button>
            </div>
        </div>
    </form>
</div>


@endsection

@section('script')

<script type="text/javascript">
    function add_more_customer_choice_option(i, name){
        $('#customer_choice_options').append('<div class="form-group"><div class="col-lg-2"><input type="hidden" name="choice_no[]" value="'+i+'"><input type="text" class="form-control" name="choice[]" value="'+name+'" placeholder="Choice Title" readonly></div><div class="col-lg-7"><input type="text" class="form-control" name="choice_options_'+i+'[]" placeholder="Enter choice values" data-role="tagsinput" onchange="update_sku()"></div></div>');

        $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
    }

    $('input[name="colors_active"]').on('change', function() {
        if(!$('input[name="colors_active"]').is(':checked')){
            $('#colors').prop('disabled', true);
        }
        else{
            $('#colors').prop('disabled', false);
        }
        update_sku();
    });

    $('#colors').on('change', function() {
        update_sku();
    });

    $('input[name="unit_price"]').on('keyup', function() {
        update_sku();
    });

    $('input[name="name"]').on('keyup', function() {
        update_sku();
    });

    function delete_row(em){
        $(em).closest('.form-group').remove();
        update_sku();
    }

    function update_sku(){
        $.ajax({
           type:"POST",
           url:'{{ route('products.sku_combination') }}',
           data:$('#choice_form').serialize(),
           success: function(data){
               $('#sku_combination').html(data);
               if (data.length > 1) {
                   $('#quantity').hide();
               }
               else {
                    $('#quantity').show();
               }
           }
       });
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

    function get_brands_by_subsubcategory(){
        var subsubcategory_id = $('#subsubcategory_id').val();
        $.post('{{ route('subsubcategories.get_brands_by_subsubcategory') }}',{_token:'{{ csrf_token() }}', subsubcategory_id:subsubcategory_id}, function(data){
            $('#brand_id').html(null);
            for (var i = 0; i < data.length; i++) {
                $('#brand_id').append($('<option>', {
                    value: data[i].id,
                    text: data[i].name
                }));
                $('.demo-select2').select2();
            }
        });
    }

    function get_attributes_by_subsubcategory(){
        var subsubcategory_id = $('#subsubcategory_id').val();
        $.post('{{ route('subsubcategories.get_attributes_by_subsubcategory') }}',{_token:'{{ csrf_token() }}', subsubcategory_id:subsubcategory_id}, function(data){
            $('#choice_attributes').html(null);
            for (var i = 0; i < data.length; i++) {
                $('#choice_attributes').append($('<option>', {
                    value: data[i].id,
                    text: data[i].name
                }));
            }
            $('.demo-select2').select2();
        });
    }

    $(document).ready(function(){
        $('#container').removeClass('mainnav-lg').addClass('mainnav-sm');
        get_subcategories_by_category();
        $("#photos").spartanMultiImagePicker({
            fieldName:        'photos[]',
            maxCount:         10,
            rowHeight:        '200px',
            groupClassName:   'col-md-4 col-sm-4 col-xs-6',
            maxFileSize:      '',
            dropFileLabel : "Drop Here",
            onExtensionErr : function(index, file){
                console.log(index, file,  'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr : function(index, file){
                console.log(index, file,  'file size too big');
                alert('File size too big');
            }
        });
        $("#thumbnail_img").spartanMultiImagePicker({
            fieldName:        'thumbnail_img',
            maxCount:         1,
            rowHeight:        '200px',
            groupClassName:   'col-md-4 col-sm-4 col-xs-6',
            maxFileSize:      '',
            dropFileLabel : "Drop Here",
            onExtensionErr : function(index, file){
                console.log(index, file,  'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr : function(index, file){
                console.log(index, file,  'file size too big');
                alert('File size too big');
            }
        });
        $("#featured_img").spartanMultiImagePicker({
            fieldName:        'featured_img',
            maxCount:         1,
            rowHeight:        '200px',
            groupClassName:   'col-md-4 col-sm-4 col-xs-6',
            maxFileSize:      '',
            dropFileLabel : "Drop Here",
            onExtensionErr : function(index, file){
                console.log(index, file,  'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr : function(index, file){
                console.log(index, file,  'file size too big');
                alert('File size too big');
            }
        });
        $("#flash_deal_img").spartanMultiImagePicker({
            fieldName:        'flash_deal_img',
            maxCount:         1,
            rowHeight:        '200px',
            groupClassName:   'col-md-4 col-sm-4 col-xs-6',
            maxFileSize:      '',
            dropFileLabel : "Drop Here",
            onExtensionErr : function(index, file){
                console.log(index, file,  'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr : function(index, file){
                console.log(index, file,  'file size too big');
                alert('File size too big');
            }
        });
        $("#meta_photo").spartanMultiImagePicker({
            fieldName:        'meta_img',
            maxCount:         1,
            rowHeight:        '200px',
            groupClassName:   'col-md-4 col-sm-4 col-xs-6',
            maxFileSize:      '',
            dropFileLabel : "Drop Here",
            onExtensionErr : function(index, file){
                console.log(index, file,  'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr : function(index, file){
                console.log(index, file,  'file size too big');
                alert('File size too big');
            }
        });
    });

    $('#category_id').on('change', function() {
        get_subcategories_by_category();
    });

    $('#subcategory_id').on('change', function() {
        get_subsubcategories_by_subcategory();
    });

    $('#subsubcategory_id').on('change', function() {
        // get_brands_by_subsubcategory();
        //get_attributes_by_subsubcategory();
    });

    $('#choice_attributes').on('change', function() {
        $('#customer_choice_options').html(null);
        $.each($("#choice_attributes option:selected"), function(){
            //console.log($(this).val());
            add_more_customer_choice_option($(this).val(), $(this).text());
        });
        update_sku();
    });


</script>

@endsection
