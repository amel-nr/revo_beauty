<div class="modal-body" style="margin: 0 auto; padding-bottom: 50px;">
    <div class="row p-3">
        <div class="col-md-3 col-6">
            <img src="{{ isset($product->thumbnail_img) ? asset($product->thumbnail_img) : asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
        </div>
        <div class="col-md-9 col-6">
            @if(isset($product->brand))
            <h1 class="font-weight-bold h5 mb-0">{{ $product->brand->name }}</h1>
            @endif
            <p class="mb-0" style="font-size: 14px;">{{ $product->name }}</p>
            @if(isset($product->tagline))
            <p class="mb-0" style="font-size: 14px;">{{ $product->tagline }}</p>
            @endif

            @if($product->digital !=1)
                @if ($product->choice_options != null)
                    @foreach (json_decode($product->choice_options) as $key => $choice)
                        <div class="row">
                            <div class="col-2">
                                <p style="font-weight: 600;">{{ \App\Attribute::find($choice->attribute_id)->name }}:</p>
                            </div>

                            <div class="col-10">
                                <ul class="list-inline checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-2">
                                    @foreach ($choice->values as $key => $value)
                                        <li>
                                            <label
                                                for="{{ $choice->attribute_id }}-{{ $value }}">{{ $value }}</label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                @endif

                @if (count(json_decode($product->colors)) > 0)
                    <div class="row no-gutters">
                        <div class="col-2">
                            <div class="product-description-label mt-2">{{__('Color')}}:</div>
                        </div>
                        <div class="col-10">
                            <ul class="list-inline checkbox-color mb-1">
                                @foreach (json_decode($product->colors) as $key => $color)
                                    <li>
                                        <label style="background: {{ $color }};"
                                               for="{{ $product->id }}-color-{{ $key }}"
                                               data-toggle="tooltip"></label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <hr>
                @endif
            @endif
        </div>
    </div>
    <div class="px-3">
        <p class="mb-0 font-weight-bold" style="font-size: 16px;">Nilai produk ini</p>
    </div>
    <form  action="{{ route('reviews.store') }}" method="post" enctype="multipart/form-data" >
    <div class="row p-3">
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        @if(isset($orderDetailId))
        <input type="hidden" name="order_detail_id" value="{{ $orderDetailId }}">
        @endif
        @if(isset($orderSampleId))
        <input type="hidden" name="order_sample_id" value="{{ $orderSampleId }}">
        @endif
        @if(isset($orderPoin))
        <input type="hidden" name="order_poin_id" value="{{ $orderPoin }}">
        @endif
        @csrf
        <div class="col-md-3 col-6">
            <p class="mb-0 font-weight-bold" style="font-size: 14px;">Kemasan</p>
            <p style="font-size: 12px;">Buka produk ini ribet nggak, sih?</p>
            <div class="heart-input" data-type="kemasan"></div>
            <input type="hidden" name="rate_kemasan" value="0">

        </div>
        <div class="col-md-3 col-6">
            <p class="mb-0 font-weight-bold" style="font-size: 14px;">Kegunaan</p>
            <p style="font-size: 12px;">Produk ini bekerja optimal nggak?</p>
            <div class="heart-input" data-type="keggunaan"></div>
            <input type="hidden" name="rate_keggunaan" value="0">
        </div>
        <div class="col-md-3 col-6">
            <p class="mb-0 font-weight-bold" style="font-size: 14px;">Efektif</p>
            <p style="font-size: 12px;">Apa kamu dapat hasil yang cocok dengan kulitmu?</p>
            <div class="heart-input" data-type="efektif"></div>
            <input type="hidden" name="rate_efektif" value="0">
        </div>
        <div class="col-md-3 col-6">
            <p class="mb-0 font-weight-bold" style="font-size: 14px;">Harga</p>
            <p style="font-size: 12px;">Sesuai dengan kualitasnya, harga produk ini...</p>
            <div class="heart-input" data-type="harga"></div>
            <input type="hidden" name="rate_harga" value="0">
        </div>
    </div>
    <div class="px-3">
        <p class="font-weight-bold" style="font-size: 16px;">Review</p>
    </div>
    <div class="px-3 form-group">
      <textarea placeholder="Tulis review kamu" class="form-control p-3" name="comment" id="" rows="8" style="background-color: #FDEDE3; border-color: #F3795C;" required></textarea>
      <p class="text-right">Minimum 50 karakter</p>
    </div>
    <div class="px-3">
        <p class="font-weight-bold" style="font-size: 16px;">Upload Foto <span class="font-weight-normal">(max. 5MB)</span></p>
    </div>
    <div class="row px-3" id="upload-photo">
        
    </div>
    <div class="px-3 mt-4">
        <p>Apa kamu akan merekomendasikan produk ini?</p>
        <div class="row list-inline checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-2">
            <div class="col-md-3 col-5">
                <input type="radio" id="rekomendasi-ya" 
                       name="rekomendasi"
                       value="1" required>
                <label
                    for="rekomendasi-ya" style="width: inherit;">YA</label>
            </div>
            <div class="col-md-3 col-5">
                <input type="radio" id="rekomendasi-tidak" 
                       name="rekomendasi"
                       value="0" required>
                <label
                    for="rekomendasi-tidak" style="width: inherit;">TIDAK</label>
            </div>
        </div>
    </div>
    <div class="form-check px-3 pt-4 pb-2">
        <label class="radio-container">
            <p>Ya, Saya membeli produk ini di Ponny Beaute</p>
            <input type="radio" name="belidisini" value="1" required>
            <span class="checkmark"></span>
        </label>
        <label class="radio-container">
            <p>Tidak, saya tidak membeli produk ini di Ponny Beaute</p>
            <input type="radio" name="belidisini" value="0" required>
            <span class="checkmark"></span>
        </label>
    </div>
    <div class="row px-3">
        <div class="col-md-3 col-5">
            <input  type="submit" class="btn btn-danger text-center btn-mskkeranjang width-100 font-weight-bold py-2" style="font-size: 12px;" value="SIMPAN">
        </div>
    </div>
    </form>
</div>