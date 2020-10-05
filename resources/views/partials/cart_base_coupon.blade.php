<div class="panel-heading">
    <h3 class="panel-title">{{__('Tambah Kupon Total Belanja')}}</h3>
</div>
<div class="form-group">
    <label class="col-lg-3 control-label" for="coupon_title">{{__('Nama Kupon')}}</label>
    <div class="col-lg-9">
        <input type="text" placeholder="{{__('Coupon title')}}" id="coupon_title" name="coupon_title" class="form-control" required>
    </div>
</div>
<div class="form-group">
    <label class="col-lg-3 control-label" for="coupon_code">{{__('Kode Kupon')}}</label>
    <div class="col-lg-9">
        <input type="text" placeholder="{{__('Coupon code')}}" id="coupon_code" name="coupon_code" class="form-control" required>
    </div>
</div>
<div class="form-group">
    <label class="col-lg-3 control-label" for="banner">{{__('Banner')}}</label>
    <div class="col-lg-9">
        <div id="banner">

        </div>
    </div>
</div>
<div class="form-group">
    <label class="col-lg-3 control-label">{{__('Keterangan')}}</label>
    <div class="col-lg-9">
        <textarea class="editor" name="keterangan"></textarea>
    </div>
</div>
<div class="form-group">
   <label class="col-lg-3 control-label">{{__('Minimal Belanja')}}</label>
   <div class="col-lg-9">
      <input type="number" min="0" step="0.01" placeholder="{{__('Minimum Shopping')}}" name="min_buy" class="form-control" required>
   </div>
</div>
<div class="form-group">
   <label class="col-lg-3 control-label">{{__('Diskon')}}</label>
   <div class="col-lg-8">
      <input type="number" min="0" step="0.01" placeholder="{{__('Discount')}}" name="discount" class="form-control" required>
   </div>
   <div class="col-lg-1">
      <select class="demo-select2" name="discount_type">
         <option value="amount">Rp</option>
         <option value="percent">%</option>
      </select>
   </div>
</div>
<div class="form-group">
   <label class="col-lg-3 control-label">{{__('Diskon Maksimal')}}</label>
   <div class="col-lg-9">
      <input type="number" min="0" step="0.01" placeholder="{{__('Maximum Discount Amount')}}" name="max_discount" class="form-control" required>
   </div>
</div>
<div class="form-group">
   <label class="col-lg-3 control-label">{{__('Syarat & Ketentuan')}}</label>
   <div class="col-lg-9" id="syarat-container">
       <div class="col-lg-10" style="padding: 0; margin-bottom: 1rem;">
            <textarea class="editor" name="syarat[]"></textarea>
       </div>
   </div>
   <button type="button" class="btn btn-success" id="plus-syarat" data-id="0" style="float: right; margin-right: 10px;"><i class="fa fa-plus" aria-hidden="true"></i></button>
</div>
<div class="form-group">
    <label class="col-lg-3 control-label" for="start_date">{{__('Tanggal')}}</label>
    <div class="col-lg-9">
        <div id="demo-dp-range">
            <div class="input-daterange input-group" id="datepicker">
                <input type="text" class="form-control" name="start_date">
                <span class="input-group-addon">{{__('sampai')}}</span>
                <input type="text" class="form-control" name="end_date">
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function(){
        $('.demo-select2').select2();
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
            $(this).parents(".col-md-4").remove();
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
    });

</script>
