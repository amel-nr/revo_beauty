@php
$productpoint = \App\Models\ProductPoint::where(['is_deleted'=> 0,'is_publish' => 1])->where('jml_point','<',200)->get();
$productpoint = collect(collect($productpoint))->chunk(3);

$productpoint_2 = \App\Models\ProductPoint::where(['is_deleted'=> 0,'is_publish' => 1])->where('jml_point','>=',200)->where('jml_point','<=',500)->get();
$productpoint_2 = collect(collect($productpoint_2))->chunk(3);

$productpoint_3 = \App\Models\ProductPoint::where(['is_deleted'=> 0,'is_publish' => 1])->where('jml_point','>',500)->get();
$productpoint_3 = collect(collect($productpoint_3))->chunk(3);
$point = 0;
if(Auth::check())
{
  $point = Auth::user()->point;  
}else



if(Session::has('productPoint'))
{
    foreach (Session::get('productPoint') as $key => $value)
    {
        $point -= $value->jml_point;
        
    }
}

@endphp
@foreach ($productpoint as $key => $value)
	<div class="row text-center pt-2" id="productpoint_1" style="max-height: 1000px;overflow-y: auto;">
	@foreach ($value as $keys => $item)
		@php
		$product = \App\Product::where('id',$item->product_id)->with('brand')->first();
		@endphp
		<div class="col-md-4 col-6 align-items-center justify-content-center">
            <div class="content-tukarpoin width-100" style="position: relative;">
                <div class="dummy" style="padding-top: 126.66666666666%; background-color: white;"></div>
                <img src="{{ asset($product->thumbnail_img) }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width: 100%; height: 100%; object-fit: contain; position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
                <div class="content-hover">
                <a href="#" type="button" class="width-100">
                    <div class="content-hide quickview" onclick="showAddToCartModal({{ $product->id }});">
                        <p>QUICK VIEW</p>
                    </div>
                </a>
                </div>
            </div>
            <p style="font-weight: 700; font-size: 16px; margin-top: 15px; margin-bottom: 0;">{{ $product->brand->name }}</p>
            <p style="margin: 0;">{{ $product->name  }}</p>
            <p style="font-weight: 700; margin: 0;">{{ $item->jml_point }} POIN</p>
            <button type="button" class="btn btn-danger btn-round btn-pilih my-3 px-3 py-1" onclick="addProductPointToCard({{$item->id}});" {{ $point >= (int) $item->jml_point ? '' : 'disabled' }} >PILIH</button>
        </div>
	@endforeach
	</div>
@endforeach

@foreach ($productpoint_2 as $key => $value)
    <div class="row text-center pt-2" id="productpoint_2" style="max-height: 1000px;overflow-y: auto;display: none;">
    @foreach ($value as $keys => $item)
        @php
        $product = \App\Product::where('id',$item->product_id)->with('brand')->first();
        @endphp
        <div class="col-md-4 col-6 align-items-center justify-content-center">
            <div class="content-tukarpoin width-100" style="position: relative;">
                <div class="dummy" style="padding-top: 126.66666666666%; background-color: white;"></div>
                <img src="{{ asset($product->thumbnail_img) }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width: 100%; height: 100%; object-fit: contain; position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
                <div class="content-hover">
                <a href="#" type="button" class="width-100">
                    <div class="content-hide quickview" onclick="showAddToCartModal({{ $product->id }});">
                        <p>QUICK VIEW</p>
                    </div>
                </a>
                </div>
            </div>
            <p style="font-weight: 700; font-size: 16px; margin-top: 15px; margin-bottom: 0;">{{ $product->brand->name }}</p>
            <p style="margin: 0;">{{ $product->name  }}</p>
            <p style="font-weight: 700; margin: 0;">{{ $item->jml_point }} POIN</p>
           <button type="button" class="btn btn-danger btn-round btn-pilih my-3 px-3 py-1" onclick="addProductPointToCard({{$item->id}});" {{ $point >= $item->jml_point ? '' : 'disabled' }} >PILIH</button>
        </div>
    @endforeach
    </div>
@endforeach

@foreach ($productpoint_3 as $key => $value)
    <div class="row text-center pt-2" id="productpoint_3" style="max-height: 1000px;overflow-y: auto;display: none;">
    @foreach ($value as $keys => $item)
        @php
        $product = \App\Product::where('id',$item->product_id)->with('brand')->first();
        @endphp
        <div class="col-md-4 col-6 align-items-center justify-content-center">
            <div class="content-tukarpoin width-100" style="position: relative;">
                <div class="dummy" style="padding-top: 126.66666666666%; background-color: white;"></div>
                <img src="{{ asset($product->thumbnail_img) }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width: 100%; height: 100%; object-fit: contain; position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
                <div class="content-hover">
                <a href="#" type="button" class="width-100">
                    <div class="content-hide quickview" onclick="showAddToCartModal({{ $product->id }});">
                        <p>QUICK VIEW</p>
                    </div>
                </a>
                </div>
            </div>
            <p style="font-weight: 700; font-size: 16px; margin-top: 15px; margin-bottom: 0;">{{ $product->brand->name }}</p>
            <p style="margin: 0;">{{ $product->name  }}</p>
            <p style="font-weight: 700; margin: 0;">{{ $item->jml_point }} POIN</p>
            <button type="button" class="btn btn-danger btn-round btn-pilih my-3 px-3 py-1" onclick="addProductPointToCard({{$item->id}});" {{ $point >= $item->jml_point ? '' : 'disabled' }} >PILIH</button>
        </div>
    @endforeach
    </div>
@endforeach

