@csrf
<input type="hidden" name="order_id" id="komplain_order_id" value="{{ $order->id }}">
<div class="modal-body py-4" style="width: 90%; margin: 0 auto;">
    <p style="font-weight: 700; font-size: 16px;">Masalah apa yang kamu hadapi?</p>
    @php
    $masalah = \App\Models\Mvariable::where(['var_id' => 'komplain','param_1' => 'masalah'])->orderBy('id','asc')->get();
    @endphp
    <div class="row">
        @foreach ($masalah as $key => $value)
        <div class="col-6">
            <label class="radio-container mt-2">
                <input type="radio" name="masalah_komplain" required value="{{ $value->param_3 }}">
                <span class="checkmark"></span>
                <h2 class="h6 mb-0" style="line-height: 25px; word-wrap: break-word;">
                    {{ $value->param_2 }}
                </h2>
            </label>
        </div>
        @endforeach 
       
    </div>
    
    <p class="mt-4" style="font-weight: 700; font-size: 16px;">Foto barang komplain</p>
    <div class="row" id="upload-photo-komplain">
    
    </div>
    <p class="mt-4" style="font-weight: 700; font-size: 16px;">Solusi komplain</p>
    @php
    $solusi = \App\Models\Mvariable::where(['var_id' => 'komplain','param_1' => 'solusi'])->orderBy('id','asc')->get();
    @endphp
    @foreach ($solusi as $key => $value)
    <label class="radio-container mt-2">
        <input type="radio" name="solusi_komplain" value="{{ $value->param_3 }}" required>
        <span class="checkmark"></span>
        <h2 class="h6 mb-0" style="line-height: 25px;">
           {{ $value->param_2 }}
        </h2>
    </label>
    @endforeach
    <p class="mt-4" style="font-weight: 700; font-size: 16px;">Pilih barang yang dikomplain</p>
    <div class="row">
        @if($order->orderDetails->count() > 0)
        @foreach ($order->orderDetails as $key => $value)
        <div class="col-md-4 col-6">
            @php
            $product = \App\Product::where('id',$value->product_id)->with('brand')->first();
            @endphp
            <label class="radio-container mt-2">
                <input type="checkbox" name="barang_komplain[]" value="{{ $order->id }}"  >
                <span class="checkmark"></span>
                <h2 class="h6 mb-0" style="line-height: 25px;">
                    {{  $product->name }}
                </h2>
                <img width="100" src="{{ isset($product->thumbnail_img) ? asset($product->thumbnail_img) : asset('frontend/images/placeholder.jpg') }}"  class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
            </label>
        </div>
        @endforeach
        @endif
        
    </div>
    <p class="mt-4" style="font-weight: 700; font-size: 16px;">Catatan</p>
    <textarea placeholder="Tulis detail masalah kamu" class="form-control p-3" name="catatan" id="" rows="4" style="background-color: #FDEDE3; border-color: #F3795C;"></textarea>
    <div class="py-3 my-4" style="border-top: 1px solid #F3795C; border-bottom: 1px solid #F3795C;">
        <label class="radio-container mt-2">
            <input type="radio" name="setuju" value="ya" required id="setuju-komplain">
            <span class="checkmark"></span>
            <p class="h6 mb-0 ml-3" style="line-height: 25px; font-size: 12px;">
                Saya setuju dan menanggung ongkos kirim jika harus mengembalikan barang
            </p>
        </label>
    </div>
    <div class="row">
        <div class="col-md-3 col-5 offset-md-9 offset-7">
            <button type="submit" id="btn-submit-komplain" class="btn btn-danger text-center btn-mskkeranjang width-100 font-weight-bold py-2" disabled>KIRIM</button>
        </div>
    </div>
</div>