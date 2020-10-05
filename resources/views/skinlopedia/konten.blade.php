@if($skinlo->total() != 0)
@foreach($skinlo as $key => $value)
        @if($key%2 == 0)
        <div class="row {{$key ==0?'pt-5':''}}">
            <div class="col-2"></div>
            <div class="col-4 pl-5 pr-0 py-4" style="border-right: 3px solid #f3795c;">
                <img src="{{ asset('skinlopedia/img/').'/'.$value->img }}" class="w-100 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="float: right;">
            </div>
            <div class="col-4 px-5 py-4 my-auto">
                <h3 class="mb-4"><b>{{$value->title}}</b></h3>
                <p class="mb-0 text-justify" style="font-size: 15px;">
                    {!!$value->text!!} 
                </p>
            </div>
            <div class="col-2"></div>
        </div>
        @else
        <div class="row">
            <div class="col-2"></div>
            <div class="col-4 px-5 py-4 my-auto">
                <h3 class="mb-4"><b>{{$value->title}}</b></h3>
                <p class="mb-0 text-justify" style="font-size: 15px;">
                    {!!$value->text!!} 
                </p>
            </div>
            <div class="col-4 pl-0 pr-5 py-4" style="margin-left: -3px; border-left: 3px solid #f3795c;">
                <img src="{{ asset('skinlopedia/img/').'/'.$value->img }}" class="w-100 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="float: left;">
            </div>
            <div class="col-2"></div>
        </div>
        @endif
        @endforeach

        <div id="skinklopedia-pagination" class="py-5">
        {!! $skinlo->links() !!}
        </div>
@else
<div class="container">
<p>kata kunci tidak ditemukan</p>
</div>
@endif