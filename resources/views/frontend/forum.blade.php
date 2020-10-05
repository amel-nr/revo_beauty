@extends('frontend.layouts.app')

@section('style')
    <style>
        .dropdown-toggle::after{
            display: none;
        }
        @media (min-width: 992px) {
            .navbar .navbar-nav .nav-links {
                padding: .5rem 1rem !important;
                margin-top: 0 !important;
                margin-bottom: 0 !important;
            }
        }

        .dropdown-menu {
            min-width: 0 !important;
        }

        .mypreloader {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 50%;
            z-index: 0000;
            background-image: url('{{asset("91.svg")}}');
            background-repeat: no-repeat; 
            background-color:#FADFD2;
            background-position: center;
        }

       
    </style>
@endsection


@section('content')

<section style="background-color: #FCF8F0;">
    <div class="row py-2" style="background-color: #F3795C;">
        <div class="col-md-5 col-10 mx-auto text-center">
            <div class="row">
                <div class="col-6">
                    <a href="#" id="beranda"><h4 class="mb-0 font-weight-bold" style="color: white;">BERANDA</h4></a>
                </div>
                <div class="col-6">
                    <a href="#" id="ruang"><h4 class="mb-0 font-weight-bold" style="color: white;">RUANG</h4></a>
                </div>
            </div>
        </div>
    </div>
    <select name="filtered[]" id="filtered" style="display:none;" multiple>
    </select>
    <div id="forumid" style="display:none;">oke</div>
    <div id="konten"></div>
    <div class="mypreloader" style="display:none;"></div>
</section>
            
@endsection

@section('script')
@include('frontend.partials.forumjs')
<script>
$(document).ready(function () {
    fetchPosts();
})
</script>
@endsection