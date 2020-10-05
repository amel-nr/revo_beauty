<div class="panel-heading">
    <h3 class="panel-title">{{__('Tambah Kupon Produk')}}</h3>
</div>
<div class="form-group">
   <label class="col-lg-3 control-label" for="coupon_title">{{__('Nama Kupon')}}</label>
   <div class="col-lg-9">
       <input type="text" value="{{$coupon->title}}" id="coupon_title" name="coupon_title" class="form-control" required>
   </div>
</div>
<div class="form-group">
    <label class="col-lg-3 control-label" for="coupon_code">{{__('Kode Kupon')}}</label>
    <div class="col-lg-9">
        <input type="text" placeholder="{{__('Coupon code')}}" id="coupon_code" name="coupon_code" value="{{ $coupon->code }}" class="form-control" required>
    </div>
</div>
<div class="form-group">
   <label class="col-lg-3 control-label">{{__('Banner')}}</label>
   <div class="col-lg-9">
      <div id="banner">
         @if ($coupon->banner != null)
            <div class="col-md-6 col-sm-6 col-xs-6">
               <div class="img-upload-preview">
                  <img loading="lazy"  src="{{ asset($coupon->banner) }}" alt="" class="img-responsive">
                  <input type="hidden" name="previous_banner" value="{{ $coupon->banner }}">
                  <button type="button" class="btn btn-danger close-btn remove-files"><i class="fa fa-times"></i></button>
               </div>
            </div>
         @endif
      </div>
   </div>
</div>
<div class="form-group">
   <label class="col-lg-3 control-label">{{__('Keterangan')}}</label>
   <div class="col-lg-9">
      @if($coupon->keterangan != null)
      <textarea class="editor" name="keterangan">{{$coupon->keterangan}}</textarea>
      @else
      <textarea class="editor" name="keterangan"></textarea>
      @endif
   </div>
</div>
<div class="product-choose-list">
    @foreach (json_decode($coupon->details) as $key => $details)
        <div class="product-choose">
            <div class="form-group">
               <label class="col-lg-3 control-label">{{__('Kategori')}}</label>
               <div class="col-lg-9">
                  <select class="form-control category_id demo-select2" name="category_ids[]" required>
                     @foreach(\App\Category::all() as $key => $category)
                         <option value="{{$category->id}}" @if ($details->category_id == $category->id)
                             selected
                         @endif >{{$category->name}}</option>
                     @endforeach
                  </select>
               </div>
            </div>
            <div class="form-group" id="subcategory">
               <label class="col-lg-3 control-label">{{__('Sub Kategori')}}</label>
               <div class="col-lg-9">
                  <select class="form-control subcategory_id demo-select2" name="subcategory_ids[]">
                      @foreach(\App\SubCategory::where('category_id', $details->category_id)->get() as $key => $subcategory)
                          <option value="{{$subcategory->id}}" @if ($details->subcategory_id == $subcategory->id)
                              selected
                          @endif >{{$subcategory->name}}</option>
                      @endforeach
                  </select>
               </div>
            </div>
            <div class="form-group" id="subsubcategory">
               <label class="col-lg-3 control-label">{{__('Sub Sub Kategori')}}</label>
               <div class="col-lg-9">
                  <select class="form-control subsubcategory_id demo-select2" name="subsubcategory_ids[]">
                      @foreach(\App\SubSubCategory::where('sub_category_id', $details->subcategory_id)->get() as $key => $subsubcategory)
                          <option value="{{$subsubcategory->id}}" @if ($details->subsubcategory_id == $subsubcategory->id)
                              selected
                          @endif >{{$subsubcategory->name}}</option>
                      @endforeach
                  </select>
               </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label" for="name">{{__('Produk')}}</label>
                <div class="col-lg-9">
                    <select name="product_ids[]" class="form-control product_id demo-select2" required>
                        @foreach(\App\Product::where('subsubcategory_id', $details->subsubcategory_id)->get() as $key => $product)
                            <option value="{{$product->id}}" @if ($details->product_id == $product->id)
                                selected
                            @endif >{{$product->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <hr>
        </div>
    @endforeach
</div>
<div class="more hide">
    <div class="product-choose">
        <div class="form-group">
           <label class="col-lg-3 control-label">{{__('Kategori')}}</label>
           <div class="col-lg-9">
              <select class="form-control category_id" name="category_ids[]" onchange="get_subcategories_by_category(this)">
                 @foreach(\App\Category::all() as $key => $category)
                     <option value="{{$category->id}}">{{$category->name}}</option>
                 @endforeach
              </select>
           </div>
        </div>
        <div class="form-group" id="subcategory">
           <label class="col-lg-3 control-label">{{__('Sub Kategori')}}</label>
           <div class="col-lg-9">
              <select class="form-control subcategory_id" name="subcategory_ids[]" onchange="get_subsubcategories_by_subcategory(this)">

              </select>
           </div>
        </div>
        <div class="form-group" id="subsubcategory">
           <label class="col-lg-3 control-label">{{__('Sub Sub Kategori')}}</label>
           <div class="col-lg-9">
              <select class="form-control subsubcategory_id" name="subsubcategory_ids[]" onchange="get_products_by_subsubcategory(this)">

              </select>
           </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label" for="name">{{__('Produk')}}</label>
            <div class="col-lg-9">
                <select name="product_ids[]" class="form-control product_id">

                </select>
            </div>
        </div>
        <hr>
    </div>
</div>
<div class="text-right">
    <button class="btn btn-primary" type="button" name="button" onclick="appendNewProductChoose()">{{ __('Tambah Produk Lain') }}</button>
</div>
<br>
<div class="form-group">
   <label class="col-lg-3 control-label">{{__('Syarat & Ketentuan')}}</label>
   <div class="col-lg-9" id="syarat-container">
   @if(json_decode($coupon->syarat) != null)
   @foreach(json_decode($coupon->syarat) as $key => $value)
       <div class="remove">
       <div class="col-lg-10" style="padding: 0; margin-bottom: 1rem;">
            <textarea class="editor" name="syarat[]">{{ $value }}</textarea>
       </div>
       @if($key > 0)
       <div class='col-lg-2' style='padding: 0;'>
            <button type='button' class='btn btn-danger remove-syarat' style='float: right;'><i class='fa fa-trash' aria-hidden='true'></i></button>
       </div>
       @endif
       </div>
   @endforeach
   @else
   <div class="col-lg-10" style="padding: 0; margin-bottom: 1rem;">
      <textarea class="editor" name="syarat[]"></textarea>
   </div>
   @endif
   </div>
   <button type="button" class="btn btn-success" id="plus-syarat" data-id="0" style="float: right; margin-right: 10px;"><i class="fa fa-plus" aria-hidden="true"></i></button>
</div>
<div class="form-group">
    <label class="col-lg-3 control-label" for="start_date">{{__('Tanggal')}}</label>
    <div class="col-lg-9">
        <div id="demo-dp-range">
            <div class="input-daterange input-group" id="datepicker">
                <input type="text" class="form-control" name="start_date" value="{{ date('m/d/Y', $coupon->start_date) }}" autocomplete="off">
                <span class="input-group-addon">{{__('sampai')}}</span>
                <input type="text" class="form-control" name="end_date" value="{{ date('m/d/Y', $coupon->end_date) }}" autocomplete="off">
            </div>
        </div>
    </div>
</div>
<div class="form-group">
   <label class="col-lg-3 control-label">{{__('Diskon')}}</label>
   <div class="col-lg-8">
      <input type="number" min="0" step="0.01" placeholder="{{__('Discount')}}" value="{{ $coupon->discount }}" name="discount" class="form-control" required>
   </div>
   <div class="col-lg-1">
      <select class="demo-select2" name="discount_type">
         <option value="amount" @if ($coupon->discount_type == 'amount') selected  @endif>Rp</option>
         <option value="percent" @if ($coupon->discount_type == 'percent') selected  @endif>%</option>
      </select>
   </div>
</div>


<script type="text/javascript">

    function appendNewProductChoose(){
        $('.product-choose-list').append($('.more').html());
        $('.product-choose-list').find('.product-choose').last().find('.category_id').select2();
    }

    function get_subcategories_by_category(el){
		var category_id = $(el).val();
        console.log(category_id);
        $(el).closest('.product-choose').find('.subcategory_id').html(null);
		$.post('{{ route('subcategories.get_subcategories_by_category') }}',{_token:'{{ csrf_token() }}', category_id:category_id}, function(data){
		    for (var i = 0; i < data.length; i++) {
		        $(el).closest('.product-choose').find('.subcategory_id').append($('<option>', {
		            value: data[i].id,
		            text: data[i].name
		        }));
		    }
            $(el).closest('.product-choose').find('.subcategory_id').select2();
		    get_subsubcategories_by_subcategory($(el).closest('.product-choose').find('.subcategory_id'));
		});
	}

    function get_subsubcategories_by_subcategory(el){
		var subcategory_id = $(el).val();
        console.log(subcategory_id);
        $(el).closest('.product-choose').find('.subsubcategory_id').html(null);
		$.post('{{ route('subsubcategories.get_subsubcategories_by_subcategory') }}',{_token:'{{ csrf_token() }}', subcategory_id:subcategory_id}, function(data){
		    for (var i = 0; i < data.length; i++) {
		        $(el).closest('.product-choose').find('.subsubcategory_id').append($('<option>', {
		            value: data[i].id,
		            text: data[i].name
		        }));
		    }
            $(el).closest('.product-choose').find('.subsubcategory_id').select2();
		    get_products_by_subsubcategory($(el).closest('.product-choose').find('.subsubcategory_id'));
		});
	}

    function get_products_by_subsubcategory(el){
        var subsubcategory_id = $(el).val();
        console.log(subsubcategory_id);
        $(el).closest('.product-choose').find('.product_id').html(null);
        $.post('{{ route('products.get_products_by_subsubcategory') }}',{_token:'{{ csrf_token() }}', subsubcategory_id:subsubcategory_id}, function(data){
            for (var i = 0; i < data.length; i++) {
                $(el).closest('.product-choose').find('.product_id').append($('<option>', {
                    value: data[i].id,
                    text: data[i].name
                }));
            }
            $(el).closest('.product-choose').find('.product_id').select2();
        });
    }

    $(document).ready(function(){
        $('.demo-select2').select2();
        //get_subcategories_by_category($('.category_id'));
        $("#banner").spartanMultiImagePicker({
			fieldName:        'banner',
			maxCount:         1,
			rowHeight:        '200px',
			groupClassName:   'col-md-6 col-sm-6 col-xs-6',
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
        $('.remove-files').on('click', function(){
            $(this).parents(".col-md-6").remove();
        });
        $("#plus-syarat").click(function(){
            var id = $(this).data('id');
            $("#syarat-container").append("<div class='remove'><div class='col-lg-10' style='padding: 0; margin-bottom: 1rem;'><textarea class='editor"+id+"' name='syarat[]'></textarea></div><div class='col-lg-2' style='padding: 0;'><button type='button' class='btn btn-danger remove-syarat' style='float: right;'><i class='fa fa-trash' aria-hidden='true'></i></button></div></div>");
            $(this).data("id",(parseInt(id)+1));
            var editor = new Jodit('.editor'+id);
            $('.remove-syarat').on('click', function(){
                $(this).parents(".remove").remove();
            });
        });
        $('.remove-syarat').on('click', function(){
            $(this).parents(".remove").remove();
        });
    });

    $('.category_id').on('change', function() {
        get_subcategories_by_category(this);
    });

    $('.subcategory_id').on('change', function() {
	    get_subsubcategories_by_subcategory(this);
	});

    $('.subsubcategory_id').on('change', function() {
 	    get_products_by_subsubcategory(this);
 	});


</script>
