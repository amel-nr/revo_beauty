@php
$sample = \App\Models\Sample::where(['is_deleted' => 0,'status_publis' => 1])->where('stok','>',0)->with('product')->get();
$sample = collect(collect($sample))->chunk(4);
    //dd($sample)
@endphp

@foreach ($sample as $key => $value)
    <div class="row text-center pt-2">
        @foreach ($value as $key => $item)
        <div class="col-md-3 col-6 align-items-center justify-content-center">
            <div class="content-sample width-100" style="position: relative;">
                <div class="dummy" style="padding-top: 126.66666666666%; background-color: white;"></div>
                <img src="{{ isset($item->product->thumbnail_img) ? asset($item->product->thumbnail_img) : asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"  alt="" style="width: 100%; height: 100%; object-fit: contain; position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
                <div class="content-hover">
                @if(isset($item->product))
                <a href="#" type="button" class="width-100">
                    <div class="content-hide quickview" onclick="showAddToCartModal({{ $item->product->id }})">
                        <p>QUICK VIEW</p>
                    </div>
                </a>
                @endif
                </div>
            </div>
            <a href="javascript:void(0)" type="button" class="btn btn-danger btn-round btn-pilih my-3 px-3 py-1" onclick="addSample({{$item->id}});">PILIH</a>
        </div>
        @endforeach
    </div>
@endforeach

