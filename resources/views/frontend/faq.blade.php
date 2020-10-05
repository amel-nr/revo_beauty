@extends('frontend.layouts.app')

@section('style')
<style>
    .accordion .card a[aria-expanded="false"] .card-header h7 span i:before {
        content: "\f067"
    }

    .accordion .card a[aria-expanded="true"] .card-header h7 span i:before {
        content: "\f068"
    }

    .accordion .card a[aria-expanded="false"] .card-header h7{
        color: black !important;
    }

    .accordion .card a[aria-expanded="true"] .card-header h7{
        color: #f3795c !important;
    }

    .card-body {
        padding-top: 0;
        padding-bottom: 0;
    }
</style>
@endsection

@section('content')
<section style="background-color: #fcf8F0;">
    <div class="container py-4" style="position: relative;">
        @php($banner = \App\Banner::where("url","#faq")->first())
        <img src="{{ isset($banner->photo) ? asset($banner->photo) : asset('frontend/images/placeholder-rect.jpg') }}" class="w-100 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
        <div class="text-center faq-container" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
            <h1 class="font-weight-bold">FAQ</h1>
            <h4 class="font-weight-bold">FREQUENT ASKED QUESTIONS</h4>
        </div>
    </div>
    <div class="container pb-4">
    @php($cfaqs = \App\faqCategory::with("faq")->get())
    @foreach($cfaqs as $key => $cfaq)
        <h3 class="pt-4 font-weight-bold">{{strtoupper($cfaq->title)}}</h3>
        <div class="accordion md-accordion pt-3" id="accordionEx{{$key}}" role="tablist" aria-multiselectable="true">
        @foreach($cfaq->faq as $k => $faq)
            <div class="card" style="background-color: #fcf8F0; border: none; border-bottom: #f3795c solid 1px;">
                <a data-toggle="collapse" data-parent="#accordionEx{{$key}}" href="#collapse{{$key.$k}}" aria-expanded="false"
                    aria-controls="collapse{{$key.$k}}" style="text-decoration: none;">  
                    <div class="card-header" role="tab" id="heading{{$key.$k}}" style="background-color: #fcf8F0; border: none;">
                        <h7 class="mb-0" style="color: black; font-weight: 600; font-size: 17px;">
                            {{strtoupper($faq->ask)}} <span class="float-right"> <i class="fa fa-minus" aria-hidden="true" style="color: #f3795c;"></i></span>
                        </h7> 
                    </div>
                </a>
                <div id="collapse{{$key.$k}}" class="collapse" role="tabpanel" aria-labelledby="heading{{$key.$k}}"
                    data-parent="#accordionEx{{$key}}">
                    <div class="card-body">
                        <p style="font-size: 14px;">{!!$faq->ans!!}</p>
                    </div>
                    </div>
            </div>
        @endforeach
        </div>
    @endforeach
    </div>
</section>
@endsection

@section('script')

@endsection