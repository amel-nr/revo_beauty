<div class="row">
	<div class="col-4">
	    <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
	    <i class="fa fa-times-circle" style="color: #F3795C; font-size: 20px; position: absolute; top: 5px; right: 20px;" aria-hidden="true"></i>
	</div>
	<div class="col-4">
		<div class="rounded text-center" style="border: 1px solid #F3795C; background-color: #FDDCC3; position: absolute; top: 0; bottom: 0; left: 15px; right: 15px; display: flex; justify-content: center; align-items: center;">
		    <i class="fa fa-plus" aria-hidden="true" style="font-size: 36px;"></i>
		</div>
		<input type="file" style="cursor: pointer; opacity: 0.0; position: absolute; top: 0; left: 15px; bottom: 0; right: 0; width: calc(100% - 30px); height:100%;" />
	</div>
</div>