@extends('frontend.layouts.app')

@section('style')
    <style>
        .dropdown-toggle::after{
            display: none;
        }
        @media (min-width: 992px) {
            .navbar .navbar-nav .nav-links {
                padding: .5rem 1rem;
                margin-top: 0;
                margin-bottom: 0;
            }
        }
    </style>
@endsection

@section('content')

    <div style="background-color: #fcf8F0;">
        <div class="row py-4" style="background-color: #f3795c;">
            <div class="col-md-1 col-3 mx-auto p-0">
                <img src="{{ asset('frontend/images/sale.png') }}" class="w-100 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
            </div>
        </div>
        <div class="container">
            <div class="row py-5">
                @foreach($shopsale as $key => $value)
                <div class="col-6">
                    <img src="{{ asset($value->photo) }}" class="w-100 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                </div>
                @endforeach
                <!-- <div class="col-6">
                    <img src="{{ asset('frontend/images/placeholder-rect.jpg') }}" class="w-100 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                </div> -->
            </div>
            <input type="hidden" id="idp-shopsale" value=" {{json_encode($idp)}} ">
            @include('frontend.inc.products_section')
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $.post('{{ url('home/section/best_sell') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_best_selling').html(data);
                slickInit();
                initGlobalRate();
            });
            $(".filter-button").focus(function(){
               $(this).css({"background-color": "#f3795c", "color": "white"});
            });
            $(".filter-button").blur(function(){
                $(this).css({"background-color": "#fcf8F0", "color": "black"});
            });
        });
    </script>
@endsection