<!DOCTYPE html>
@if(\App\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()->rtl == 1)
<html dir="rtl" lang="en">
@else
<html lang="en">
@endif
<head>

@php
    $seosetting = \App\SeoSetting::first();
@endphp

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="index, follow">
<meta name="description" content="@yield('meta_description', $seosetting->description)" />
<meta name="keywords" content="@yield('meta_keywords', $seosetting->keyword)">
<meta name="author" content="{{ $seosetting->author }}">
<meta name="sitemap_link" content="{{ $seosetting->sitemap_link }}">

@yield('meta')

@if(!isset($detailedProduct))
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ config('app.name', 'Laravel') }}">
    <meta itemprop="description" content="{{ $seosetting->description }}">
    <meta itemprop="image" content="{{ asset(\App\GeneralSetting::first()->logo) }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ config('app.name', 'Laravel') }}">
    <meta name="twitter:description" content="{{ $seosetting->description }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ asset(\App\GeneralSetting::first()->logo) }}">

    @if(!isset($post))
    <!-- Open Graph data -->
    <meta property="og:title" content="{{ config('app.name', 'Laravel') }}" />
    <meta property="og:type" content="Ecommerce Site" />
    <meta property="og:url" content="{{ route('home') }}" />
    <meta property="og:image" content="{{ asset(\App\GeneralSetting::first()->logo) }}" />
    <meta property="og:description" content="{{ $seosetting->description }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
    @endif
@endif

<!-- Favicon -->
<link type="image/x-icon" href="{{ asset('img/icon.ico') }}" rel="shortcut icon" />

<title>@yield('title') Ponny Beaute Indonesia - Oh Happy Skin</title>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet" media="none" onload="if(media!='all')media='all'">

<!-- Bootstrap -->
<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" type="text/css" media="all">

<!-- Icons -->
<link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}" type="text/css" media="none" onload="if(media!='all')media='all'">
<link rel="stylesheet" href="{{ asset('frontend/css/line-awesome.min.css') }}" type="text/css" media="none" onload="if(media!='all')media='all'">

<link type="text/css" href="{{ asset('frontend/css/bootstrap-tagsinput.css') }}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
<link type="text/css" href="{{ asset('frontend/css/jodit.min.css') }}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
<link type="text/css" href="{{ asset('frontend/css/sweetalert2.min.css') }}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
<link type="text/css" href="{{ asset('frontend/css/slick.css') }}" rel="stylesheet" media="all">
<link type="text/css" href="{{ asset('frontend/css/xzoom.css') }}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
<link type="text/css" href="{{ asset('frontend/css/jquery.share.css') }}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
<link type="text/css" href="{{ asset('frontend/css/intlTelInput.min.css') }}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
<link type="text/css" href="{{ asset('css/spectrum.css')}}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">

<!-- Global style (main) -->
<link type="text/css" href="{{ asset('frontend/css/active-shop.css') }}" rel="stylesheet" media="all">


<link type="text/css" href="{{ asset('frontend/css/main.css') }}" rel="stylesheet" media="all">

@if(\App\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()->rtl == 1)
     <!-- RTL -->
    <link type="text/css" href="{{ asset('frontend/css/active.rtl.css') }}" rel="stylesheet" media="all">
@endif

<!-- Facebook Chat style -->
<link href="{{ asset('frontend/css/fb-style.css')}}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">

<!-- color theme -->
<link href="{{ asset('frontend/css/colors/'.\App\GeneralSetting::first()->frontend_color.'.css')}}" rel="stylesheet" media="all">
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<!-- Custom style -->
<link type="text/css" href="{{ asset('frontend/css/custom-style.css') }}" rel="stylesheet" media="all">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/ratting-rp/jsRapStar.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/jStarbox-master/css/jstarbox.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-rating-master/bootstrap-rating.css') }}">

<!-- jodit -->
<link href="{{ asset('css/jodit.min.css') }}" rel="stylesheet">

<!-- dropify -->
<link href="{{ asset('plugins/dropify/dist/css/dropify.min.css')}}" rel="stylesheet">

{{-- Google-font --}}
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Niramit:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
    @font-face { 
        font-family: 'Niramit', sans-serif;
        font-weight: 500;
        font-style: normal;
        /* src: url('{{ asset('fonts/regular.otf') }}'); */
    }

    @font-face { 
        font-family: 'Niramit', sans-serif;
        font-weight: 600;
        font-style: normal;
        /* src: url('{{ asset('fonts/medium.otf') }}'); */
    }

    @font-face { 
        font-family: 'Niramit', sans-serif;
        font-weight: 700;
        font-style: normal;
        /* src: url('{{ asset('fonts/bold.otf') }}'); */
    }

    @font-face {
        font-family: rage-italic;
        /* src: url('{{ asset('fonts/rage-italic/OH.TTF') }}'); */
    }

    @font-face { 
        font-family: 'Lobster', cursive;
        font-weight: 500;
        font-style: normal;
        /* src: url('{{ asset('fonts/heading.ttf') }}'); */
    }

    * {
        font-family: 'Niramit', sans-serif;
    }

    .btn {
        font-family: 'Niramit', sans-serif !important;
    }

    h1, h2, h3, h4, h5, h6, .title-name{
        font-family: 'Lobster', cursive !important;
    }

    p:not(.lead) {
        font-size: 15px;
    }

    .top-navbar{
        transition: background-color .3s;
        background-color: #FEF6E8;
        position: relative;
        width: 100%;
    }

    .top-navbar-fixed {
        position: fixed !important;
        top: 0;
        width: 100%;
        background-color: #FEF6E8; 
    }

    #mobile-nav{
        display: none;
    }

    #side-nav-container{
        opacity: 0;
    }

    #main-logo-header{
        width: 200px;
    }

    .navbar-nav .nav-link {
        font-family: brandon, "Open Sans", sans-serif;
        font-weight: 700;
    }

    .navbar-nav .nav-link-top {
        margin-top: 0 !important;
        margin-bottom: 0 !important;
    }

    .rapStar{
        text-shadow: unset;
    }
    .select2-container{
        background-color: red;
    }
    .content-product, .content-sample, .content-tukarpoin {
        position: relative;
        cursor: pointer;
    }

    .content-hover {
        position: absolute;
        box-sizing: border-box;
        width: 100%;
        bottom: 0;
        visibility: hidden;
        opacity: 0;
        transition: visibility 0s, opacity 0.5s linear;
    }

    .content-out-of-stock {
        position: absolute;
        box-sizing: border-box;
        width: 100%;
        bottom: 0;
    }

    .content-hide {
        color: white;
        padding: 10px 0;
    }

    .content-hide p {
        margin: 0;
    }

    .content-product:hover :nth-child(5), .content-sample:hover :nth-child(3), .content-tukarpoin:hover :nth-child(3) { 
        visibility: visible;
        opacity: 0.5;
    }

    .btn-pilih:disabled{
        background-color: #ddd;
        color: grey !important;
        border: none;
        cursor: not-allowed;
    }

    .btn-pilih:disabled:hover{
        background-color: #ddd;
        color: grey !important;
        border: none;
        cursor: not-allowed;
    }

    .addtobag {
        background-color: #FFC5B9;
        color: white;
        font-weight: 700;
    }

    .quickview {
        background-color: #EFBBCF;
        color: white;
        font-weight: 700;
    }

    .lihatlebihbanyak {
        border: 1px solid #F3795C;
        border-radius: 5px; 
        background-color: #FADFD2; 
        color: #F3795C; 
        padding: 10px 20px; 
        font-weight: 700
    }

    .lihatlebihbanyak:hover {
        background-color: #F3795C;
        color: white;
        border: 1px solid #F3795C;
    }

    .content-blog {
        position: relative;
        cursor: pointer;
    }

    .blog-hover {
        background-color: #F3795C;
        position: absolute;
        box-sizing: border-box;
        width: 100%;
        height: 100%;
        color: white;
        bottom: 0;
        visibility: hidden;
        opacity: 0;
        transition: visibility 0s, opacity 0.5s linear;
        display: table;
    }

    .p-blog {
        display: table-cell;
        vertical-align: middle;
    }

    .content-blog:hover :nth-child(2) { 
        visibility: visible;
        opacity: 0.5;
    }

    .followphoebe {
        border: 1px solid #F3795C;
        border-radius: 5px; 
        background-color: #FCF8F0;
        padding: 5px 30px; 
        font-weight: 700;
        color: #F3795C;
    }

    .followphoebe:hover {
        background-color: #F3795C;
        color: white;
        border: 1px solid #F3795C;
    }

    .btn-phone {
        background-color: #444444;
        color: white;
    }

    .btn-phone:hover {
        background-color: #2b2b2b;
        color: white;
    }

    .btn-loginregister, .btn-pilih, .btn-spinner {
        border: 1px solid #F3795C;
    }

    .btn-loginregister {
        color: #F3795C !important;
        font-weight: 700;
        background-color: transparent;
    }

    .btn-pilih {
        color: black !important;
        font-size: 12px;
        background-color: #FCF8F0;
    }

    .btn-spinner {
        color: #F3795C !important;
        font-weight: 700;
        background-color: #FCF8F0;
    }

    .btn-loginregister:hover, .btn-pilih:hover, .btn-spinner:hover, .btn-komplain:hover {
        background-color: #F3795C;
        color: white !important;
        border: 1px solid #F3795C;
    }

    .btn-pilih:focus {
        color: white !important;
        background-color: #F3795C !important;
        border-color: #F3795C !important;
    }

    .list-group-item {
        color: black;
    }

    .list-group-item:hover {
        color: #F3795C;
    }

    .btn-keluar, .btn-mskkeranjang, .btn-lihatlebihbanyak, .btn-pakai {
        background-color: #F3795C;
        border-color: #F3795C !important;
        border-radius: 5px;
        color: white !important;
    }
    
    .btn-nantisaja, .btn-komplain {
        background-color: #FCF8F0;
        border-color: #F3795C !important;
        border-radius: 5px;
    }

    .btn-nantisaja {
        color: #F3795C !important;
    }

    .btn-komplain {
        color: black !important;
    }

    .btn-nantisaja:hover {
        background-color: #FEF6E8;
    }

    .btn-keluar {
        width: 100%;
    }

    .btn-lihatlebihbanyak, .btn-nantisaja {
        font-size: 18px;
    }

    .btn-keluar:hover, .btn-mskkeranjang:hover, .btn-lihatlebihbanyak:hover, .btn-pakai:hover {
        color: white !important;
        background-color: #f25735 !important;
        border-color: #f25735 !important;
    }

    .btn-keluar:focus, .btn-mskkeranjang:focus, .btn-lihatlebihbanyak:focus, .btn-pakai:focus, .btn-komplain:focus {
        color: white !important;
        background-color: #f25735 !important;
        border-color: #f25735 !important;
    }
    .input-otp {
        width: 50px;
        text-align: center;
        margin-left: 10px;
    }
    .action-button-previous{
        cursor: pointer;
    }

    .radio-container {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default radio button */
    .radio-container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    /* Create a custom radio button */
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #FCF8F0;
        border-radius: 20%;
        border: 1px solid #F3795C;
    }

    /* On mouse-over, add a grey background color */
    .radio-container:hover input ~ .checkmark {
        background-color: #ccc;
    }

    /* When the radio button is checked, add a blue background */
    .radio-container input:checked ~ .checkmark {
        background-color: #F3795C;
        border: none;
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the indicator (dot/circle) when checked */
    .radio-container input:checked ~ .checkmark:after {
        display: block;
    }

    /* Style the indicator (dot/circle) */
    .radio-container .checkmark:after {
        top: 9px;
        left: 9px;
        width: 8px;
        height: 8px;
        border-radius: 20%;
        background: white;
    }

    .collapsible-link {
        width: 100%;
        position: relative;
        text-align: left;
    }

    .collapsible-link::before {
        content: '\f107';
        color: white;
        position: absolute;
        top: 50%;
        right: 0.8rem;
        transform: translateY(-50%);
        display: block;
        font-family: 'FontAwesome';
        font-size: 1.1rem;
    }

    .collapsible-link[aria-expanded='true']::before {
        content: '\f106';
        color: white;
    }

    .collapsible-link-step {
        width: 100%;
        position: relative;
        text-align: left;
    }

    .collapsible-link-step::before {
        content: '\f107';
        color: #F3795C;
        position: absolute;
        top: 50%;
        right: 0.8rem;
        transform: translateY(-50%);
        display: block;
        font-family: 'FontAwesome';
        font-size: 1.1rem;
    }

    .collapsible-link-step[aria-expanded='true']::before {
        content: '\f106';
        color: #F3795C;
    }

    .pilihalamat {
        cursor: pointer;
        border: 1px solid #F3795C;
    }

    .pilihalamat:hover {
        border: 3px solid #F3795C;
        background-color: #FADFD2;
    }

    .title-edit-alamat {
        font-size: 10px;
        display: none;
    }

    .pilihekspedisi {
        display: none;
    }

    .title-edit-ekspedisi {
        font-size: 10px;
        display: none;
    }

    @media (min-width: 992px){
        .modal-lg {
            max-width: 800px;
        }
    }

    .jenis-kelamin {
    /* Hide original inputs */
        visibility: hidden;
        position: absolute;
    }

    .jenis-kelamin + .j-k:before {
        height:12px;
        width:12px;
        margin-right: 2px;
        content: " ";
        display:inline-block;
        vertical-align: baseline;
        border:1px solid black;
    }
    .jenis-kelamin:checked + .j-k:before {
        background:#F3795C;
    }

    /* CUSTOM RADIO AND CHECKBOX STYLES */
    .jenis-kelamin + .j-k:before{
        border-radius:50%;
    }

    .checkbox-container {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 22px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default checkbox */
    .checkbox-container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    /* Create a custom checkbox */
    .checkbox-checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 20px;
        width: 20px;
        background-color: #FCF8F0;
        border: 1px solid #F3795C;
    }

    /* On mouse-over, add a grey background color */
    .checkbox-container:hover input ~ .checkbox-checkmark {
        background-color: #FADFD2;
    }

    /* When the checkbox is checked, add a blue background */
    .checkbox-container input:checked ~ .checkbox-checkmark {
        background-color: #F3795C;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkbox-checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the checkmark when checked */
    .checkbox-container input:checked ~ .checkbox-checkmark:after {
        display: block;
    }

    /* Style the checkmark/indicator */
    .checkbox-container .checkbox-checkmark:after {
        left: 6px;
        top: 2px;
        width: 6px;
        height: 11px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .select2-container--default .select2-selection--single {
        border: 1px solid #F3795C;
        border-radius: 5px;
    }

    .select2-container{
        background-color: transparent !important;
    }

    .widget-profile-menu a {
        font-size: 14px !important;
        color: black !important;
        padding: 0.9rem 0.55rem !important;
        border-top: 1px solid #F3795C;
        border-left: none;
    }

    .widget-profile-menu a:hover {
        color: white !important;
    }

    .widget-profile-menu a.active {
        border-left: none;
        background-color: #FCF8F0;
        color: #F3795C !important;
        font-weight: 600 !important;
    }

    .widget-profile-menu a.active:hover {
        color: white !important;
    }

    .list-tracking-order {
        background-color: #FCF8F0;
        border-bottom: 1px solid #F3795C;
    }

    .list-tracking-order:hover {
        color: black;
    }

    .list-tracking-active {
        color: #F3795C !important;
    }

    .warna-kulit:hover, .jenis-kulit:hover, .kondisi-kulit:hover, .kondisi-rambut:hover, .preferensi-produk:hover {
        cursor: pointer;
    }

    .filter-reward:hover{
        color: #F3795C !important;
        text-decoration: underline;
        background-color: #FCF8F0 !important;
    }

    .accordion-contact-us .card a[aria-expanded="false"] .card-header h7 span i:before {
        content: "\f067";
    }

    .accordion-contact-us .card a[aria-expanded="true"] .card-header h7 span i:before {
        content: "\f068";
    }

    .accordion-contact-us .card a .card-header h7 {
        color: black !important;
    }

    .filter-perihal:hover{
        color: #f3795c;
        text-decoration: underline;
        background-color: #fcf8F0;
    }

    .perihal-button::after{
        display: none;
    }

    .pagination .page-link {
        border: 1px solid black;
        margin: 0 0.2rem;
        color: black;
    }

    .pagination .page-item .page-link:hover {
        border: 1px solid black;
        background-color: #FBD2CD;
    }

    .pagination > .disabled .page-link {
        background-color: #FCF8F0;
        color: #ccc;
        border-color: #ccc;
    }

    .pagination > .active .page-link {
        background-color: #FCF8F0;
        color: #F3795C;
        border-color: #F3795C;
    }

    .pagination > .active .page-link:hover {
        border: 1px solid #F3795C;
        background-color: #FBD2CD;
        color: #F3795C;
    }

    #avatar-review-container, #image-forum-container {
        display: inline-block;
        position: relative;
        width: 100%;
    }

    #avatar-review-dummy, #image-forum-dummy {
        margin-top: 100%;
    }

    #avatar-review-element, #image-forum-element {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: white;
    }

    #navbarDropdownSearch, #sidebarCollapse{
        display: none;
    }
    
    .product-slider-mobile{
        display: none;
    }

    .video-siaran {
      color: white;
      border: none;
      cursor: pointer;
      position: fixed;
      bottom: 65px;
      right: 80px;
      width: 300px;
      height: 200px;
    }

    #account-mobile-menu{
        display: none;
    }

    .custom-heart-empty {
        font-size: 1.2em;
        color: rgb(251, 210, 205);
    }
    .custom-heart {
        font-size: 1.2em;
        color: rgb(243, 121, 92);
    }

    @media (min-width: 1200px){
        .container {
            max-width: 1180px;
        }
    }

    .navbar-nav .nav-item:not(.nav-item-icon) .nav-link i{
        margin-right: 0;
        margin-left: 0.625rem;
    }
</style>

@yield('style')
<link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

<!-- jQuery -->
<script src="{{ asset('frontend/js/vendor/jquery.min.js') }}"></script>


@if (\App\BusinessSetting::where('type', 'google_analytics')->first()->value == 1)
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('TRACKING_ID') }}"></script>

    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '{{ env('TRACKING_ID') }}');
    </script>
@endif

@if (\App\BusinessSetting::where('type', 'facebook_pixel')->first()->value == 1)
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', {{ env('FACEBOOK_PIXEL_ID') }});
  fbq('track', 'PageView');
</script>
<noscript>
  <img height="1" width="1" style="display:none"
       src="https://www.facebook.com/tr?id={{ env('FACEBOOK_PIXEL_ID') }}/&ev=PageView&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
@endif

</head>
<body>
@php
    if(Auth::check()){
        $membership = new \App\Http\Controllers\MembershipController;
        $membership->getMember();
    }
@endphp

<div class="modal hide fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #FCF8F0;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="width: 90%; margin: 0 auto; padding-bottom: 50px;">

                <fieldset>
                    <p class="heading-5 mb-1" style="font-weight: 700;">SELAMAT DATANG DI PONNY BEAUTE!</p>
                    <p style="font-weight: 700;">Masukan alamat email kamu untuk masuk atau mendaftar</p>
                    <div class="form-group">
                        <label for=""></label>
                          <input type="email" class="form-control" name="" id="email_login" aria-describedby="emailHelpId" placeholder="Email" style="padding: 10px; border-color: #F3795C;" required>
                    </div>
                    <span class="mb-3" id="alert-email"  style="color: #FCF8F0; display: block;">*Harap email anda.</span>
                    <button type="button" class="btn btn-primary next action-button btn-font-mobile" data-flex="login" style="display: block; margin: 0 auto; background-color: #F3795C; border: none; padding: 10px 40px; border-radius: 5px; width: 100%; font-size: 18px; margin-bottom: 10px;">LANJUTKAN DENGAN EMAIL</button>
                    @if(\App\BusinessSetting::where('type', 'google_login')->first()->value == 1 || \App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1 || \App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1)
                                        <div class="or or--1 mt-3 text-center">
                                            <span>or</span>
                                        </div>
                                        <div>
                                        @if (\App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1)
                                            <a href="{{ route('social.login', ['provider' => 'facebook']) }}" class="btn btn-styled btn-block btn-facebook btn-icon--2 btn-icon-left px-4 mb-3">
                                                <i class="icon fa fa-facebook"></i> {{__('Login with Facebook')}}
                                            </a>
                                        @endif
                                        @if(\App\BusinessSetting::where('type', 'google_login')->first()->value == 1)
                                            <a href="{{ route('social.login', ['provider' => 'google']) }}" class="btn btn-styled btn-block btn-google btn-icon--2 btn-icon-left px-4 mb-3">
                                                <i class="icon fa fa-google"></i> {{__('Login with Google')}}
                                            </a>
                                        @endif
                                        @if (\App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1)
                                            <a href="{{ route('social.login', ['provider' => 'twitter']) }}" class="btn btn-styled btn-block btn-twitter btn-icon--2 btn-icon-left px-4 mb-3">
                                                <i class="icon fa fa-twitter"></i> {{__('Login with Twitter')}}
                                            </a>
                                        @endif
                                        </div>
                                    @endif
                                    <a href="#" class="btn btn-styled btn-block btn-phone btn-icon--2 btn-icon-left px-4 nextnext action-button" style="margin-bottom: 20px;">
                                        <i class="icon fa fa-phone"></i> {{__('Login with Phone Number')}}
                                    </a>
                    <p style="text-align: center; font-size: 10px; width: 70%; margin: 0 auto; color: #BCBDC0;">Dengan melakukan pendaftaran kamu telah menyetujui <a href="{{ url('kebijakan-privasi') }}" style="color: #1074BC;">Kebijakan Privasi</a> dan <a href="{{ url('syarat-ketentuan') }}" style="color: #1074BC;">Syarat & Ketentuan</a></p>
                </fieldset>
                <fieldset class="fnext">
                    <p class="heading-5 mb-1" style="font-weight: 700;">SELAMAT DATANG DI PONNY BEAUTE!</p>
                    <p style="font-weight: 700;">Masukan password kamu untuk masuk</p>
                    <label for="" style="color: #8B8986;">Email</label>
                    <p style="font-weight: 700;" id="email_label"><i class="fa fa-check" aria-hidden="true" style="color: #F3795C; float: right; font-size: 18px;"></i></p>
                    <form method="post"  role="form" action="{{ route('login') }}" method="POST">
                    <div class="form-group">
                        <label for=""></label>
                         {{ csrf_field() }}
                        <input name="email" type="hidden" id="email_value">
                        <input type="password" class="form-control" name="password" id="" aria-describedby="passwordHelpId" placeholder="Password" style="padding: 10px; border-color: #F3795C;" required>
                    </div>
                    <a href="{{ route('password.request') }}" style="float: right; color: #8B8986; text-decoration: underline; margin-bottom: 10px;">Lupa kata sandi anda?</a>
                    <button type="submit" class="btn btn-primary" style="display: block; margin: 0 auto; background-color: #F3795C; border: none; padding: 10px 40px; border-radius: 5px; width: 100%; font-size: 18px; margin-bottom: 10px;">MASUK</button>
                    </form>
                    <p class="previous action-button-previous"><i class="fa fa-chevron-left" aria-hidden="true" style="padding-right: 10px; color: #F3795C;"></i>Kembali</p>
                    <p style="text-align: center; font-size: 10px; width: 70%; margin: 0 auto; color: #BCBDC0;">Dengan melakukan pendaftaran kamu telah menyetujui <a href="{{ url('kebijakan-privasi') }}" style="color: #1074BC;">Kebijakan Privasi</a> dan <a href="{{ url('syarat-ketentuan') }}" style="color: #1074BC;">Syarat & Ketentuan</a></p>
                </fieldset>
                <fieldset class="fnext">
                    <p class="heading-5 mb-1" style="font-weight: 700;">SELAMAT DATANG DI PONNY BEAUTE!</p>
                    <p style="font-weight: 700;">Masukan nomor telepon kamu untuk masuk</p>

                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="background-color: white; color: #939598; border-color: #F3795C;">+62</span>
                        </div>
                        <input type="number"
                            class="form-control" name="" id="phoneNumber" aria-describedby="helpId" placeholder="Nomor Handphone" style="padding: 10px; border-color: #F3795C;">


                    </div>
                  
                     <span class="mb-3" id="alert-insertnomor"  style="color: #FCF8F0; display: block;">*Harap masukan nomor anda.</span>

                    <button type="button" class="btn btn-primary action-button" id="sign-in-button" style="display: block; margin: 0 auto; background-color: #F3795C; border: none; padding: 10px 40px; border-radius: 5px; width: 100%; font-size: 18px; margin-bottom: 10px;">MASUK</button>
                    <p class="prevprev action-button-previous"><i class="fa fa-chevron-left" aria-hidden="true" style="padding-right: 10px; color: #F3795C;"></i>Kembali</p>
                    <p style="text-align: center; font-size: 10px; width: 70%; margin: 0 auto; color: #BCBDC0;">Dengan melakukan pendaftaran kamu telah menyetujui <a href="{{ url('kebijakan-privasi') }}" style="color: #1074BC;">Kebijakan Privasi</a> dan <a href="{{ url('syarat-ketentuan') }}" style="color: #1074BC;">Syarat & Ketentuan</a></p>
                </fieldset>
                <fieldset class="fnext">
                    <p class="heading-5 mb-1" style="font-weight: 700;">DAFTAR SEBAGAI ANGGOTA PHOEBE'S SQUAD</p>
                    <p style="font-weight: 700;">Periksa pesan SMS Anda. Kami telah mengirimkan PIN</p>
                    <p>Nomor Telepon</p>
                    <p class="nomor-terpakai"></p>
                    <div class="row otp-form" style="padding-left: 10px;text-align: center;margin-left: auto;margin-right: auto;margin-bottom: 20px;">
                        <div  style="justify-content: center" id="otp-container">
                            <input class="input-otp" oninput="inputInsideOtpInput(this)"
                                   maxlength="1" type="number" name="code[]">

                            <input class="input-otp" oninput="inputInsideOtpInput(this)"
                                   maxlength="1" type="number" name="code[]">

                            <input class="input-otp" oninput="inputInsideOtpInput(this)"
                                   maxlength="1" type="number" name="code[]">

                            <input class="input-otp" oninput="inputInsideOtpInput(this)"
                                   maxlength="1" type="number" name="code[]">

                            <input class="input-otp" oninput="inputInsideOtpInput(this)"
                                   maxlength="1" type="number" name="code[]">

                            <input class="input-otp" oninput="inputInsideOtpInput(this)"
                                   maxlength="1" type="number" name="code[]">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="#" id="kirim-ulang" style="color: #BCBDC0; text-decoration: underline;">Kirim ulang kode</a>
                        </div>
                        <div class="col">
                        </div>
                        <div class="col text-right">
                            <button type="button" class="btn btn-primary" id="verify-code-button" style="background-color: #F3795C; border-color: #F3795C; border-radius: 5px;" disabled>LANJUT</button>
                        </div>
                        <form id="form_lanjutan" action="{{ url('users/registrationOtp') }}" method="GET">
                            <input type="hidden" name="uid">
                            <input type="hidden" name="nomor_hp">
                        </form>
                    </div>
                    <p class="previous action-button-previous btn-link" style="color: black;"><i class="fa fa-chevron-left" aria-hidden="true" style="padding-right: 10px; color: #F3795C;"></i>Kembali</p>
                    <p style="text-align: center; font-size: 10px; width: 70%; margin: 0 auto; color: #BCBDC0;">Dengan melakukan pendaftaran kamu telah menyetujui <a href="{{ url('kebijakan-privasi') }}" style="color: #1074BC;">Kebijakan Privasi</a> dan <a href="{{ url('syarat-ketentuan') }}" style="color: #1074BC;">Syarat & Ketentuan</a></p>
                </fieldset>
                <fieldset class="fnext">
                    <p class="heading-5 mb-1" style="font-weight: 700;">DAFTAR SEBAGAI ANGGOTA PHOEBE'S SQUAD</p>
                    <p style="font-weight: 700;">Nikmati Keuntungan Bergabung Phoebe's Squad:</p>
                    <p><i class="fa fa-heart" aria-hidden="true" style="margin-right: 5px; color:#F3795C"></i>Dapatkan diskon pembelian pertama dan 50 poin bonus</p>
                    <p><i class="fa fa-heart" aria-hidden="true" style="margin-right: 5px; color:#F3795C"></i>Akses untuk promo khusus member</p>
                    <p><i class="fa fa-heart" aria-hidden="true" style="margin-right: 5px; color:#F3795C"></i>Tukar poin dengan hadiah menarik</p>
                    <p><i class="fa fa-heart" aria-hidden="true" style="margin-right: 5px; color:#F3795C"></i>2x poin di hari ulang tahun</p>
                    <hr style="border-color: #F3795C;">
                    <label for="" style="color: #8B8986;">Email</label>
                    <p style="font-weight: 700;" id="email_register"><i class="fa fa-check" aria-hidden="true" style="color: #F3795C; float: right; font-size: 18px;"></i></p>
                    <button type="button" class="btn btn-primary next action-button" style="display: block; margin: 0 auto; background-color: #F3795C; border: none; padding: 10px 40px; border-radius: 5px; width: 100%; font-size: 18px; margin-bottom: 10px;">DAFTAR DENGAN EMAIL</button>
                    <p style="text-align: center; font-size: 10px; width: 70%; margin: 0 auto; color: #BCBDC0;">Dengan melakukan pendaftaran kamu telah menyetujui <a href="{{ url('kebijakan-privasi') }}" style="color: #1074BC;">Kebijakan Privasi</a> dan <a href="{{ url('syarat-ketentuan') }}" style="color: #1074BC;">Syarat & Ketentuan</a></p>
                </fieldset>
                <fieldset class="fnext" id="register_step">
                    <p class="heading-5 mb-1" style="font-weight: 700;">PHOEBE'S SQUAD</p>
                    <p style="margin-bottom: 0;">Gabung bersama Phoebe's Squad untuk kumpulkan poin, hadiah, dan keuntungan dari Happy Skin Reward!</p>
                    <form class="form-default" role="form" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="row" style="margin-top: 20px;">
                        <div class="col">
                            <div class="form-group">
                                <input type="text"
                                    class="form-control" name="name" id="" aria-describedby="helpId" placeholder="Nama Depan" style="padding: 10px; border-color: #F3795C;" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input type="text"
                                    class="form-control" name="last_name" id="" aria-describedby="helpId" placeholder="Nama Belakang" style="padding: 10px; border-color: #F3795C;">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="email"
                            class="form-control" name="email" id="register-email" aria-describedby="helpId" placeholder="Email" style="padding: 10px; border-color: #F3795C;" required>
                    </div>
                    <div class="form-group">
                        <input type="password"
                            class="form-control" name="password" id="" aria-describedby="helpId" placeholder="Password" style="padding: 10px; border-color: #F3795C;" required>
                    </div>
                    <div class="form-group">
                        <input type="password"
                            class="form-control" name="password_confirmation" id="" aria-describedby="helpId" placeholder="Ulangi Password" style="padding: 10px; border-color: #F3795C;" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend" >
                            <span class="input-group-text" id="basic-addon1" style="background-color: white; color: #939598; border-color: #F3795C;">+62</span>
                        </div>
                        <input type="number"
                            class="form-control" name="phone" id="" aria-describedby="helpId" placeholder="Nomor Handphone" style="padding: 10px; border-color: #F3795C;">
                    </div>
                    <p style="font-weight: 700; font-size: 14px;"><i class="fa fa-birthday-cake" style="margin-right: 5px;"></i>Isi tanggal lahir kamu dan dapatkan bonus menarik setiap tahun</p>
                    <input class="" id="datepicker" width="276" name="tgl_lahir" placeholder="Tanggal Lahir" style="border-color: #F3795C;background:#fff;" readonly="readonly" required/>
                    <p style="font-weight: 700; font-size: 12px; margin-top: 15px; margin-bottom: 0;">Gender</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="P" required>
                        <label class="form-check-label" for="inlineRadio1">Perempuan</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="L" required>
                        <label class="form-check-label" for="inlineRadio2">Laki-laki</label>
                    </div>
                    <p style="font-weight: 700; font-size: 12px; margin-top: 15px; margin-bottom: 0;">Jenis Kulit</p>
                    <div class="row">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kulit" id="skinRadio1" value="1" required>
                                <label class="form-check-label align-middle" for="skinRadio1">Kulit Berminyak</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kulit" id="skinRadio2" value="2" required>
                                <label class="form-check-label align-middle" for="skinRadio2">Kulit Kombinasi</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kulit" id="skinRadio3" value="3" required>
                                <label class="form-check-label align-middle" for="skinRadio3">Kulit Normal</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kulit" id="skinRadio4" value="4" required>
                                <label class="form-check-label align-middle" for="skinRadio4">Kulit Kering</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kulit" id="skinRadio5" value="5" required>
                                <label class="form-check-label align-middle" for="skinRadio5">Kulit Sensitif</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="display: block; margin: 0 auto; background-color: #F3795C; border: none; padding: 10px 40px; border-radius: 5px; width: 100%; font-size: 18px; margin-bottom: 10px; margin-top: 20px;">DAFTAR</button>
                    </form>
                    <p style="text-align: center; font-size: 10px; width: 70%; margin: 0 auto; color: #BCBDC0;">Dengan melakukan pendaftaran kamu telah menyetujui <a href="{{ url('kebijakan-privasi') }}" style="color: #1074BC;">Kebijakan Privasi</a> dan <a href="{{ url('syarat-ketentuan') }}" style="color: #1074BC;">Syarat & Ketentuan</a></p>
                </fieldset>

            </div>
        </div>
    </div>
</div>

<div class="modal hide fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #FCF8F0;">
            <div class="modal-header" style="border-bottom: solid 1px #F3795C;">
                <p style="font-weight: 700;">Buat Akun</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="width: 90%; margin: 0 auto; padding-bottom: 50px;">
                
                <fieldset>
                    <p class="heading-5 mb-1" style="font-weight: 700;">PHOEBE'S SQUAD</p>
                    <p style="margin-bottom: 0;">Gabung bersama Phoebe's Squad untuk kumpulkan poin, hadiah, dan keuntungan dari Happy Skin Reward!</p>
                    <form class="form-default" id="register1" role="form" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="row" style="margin-top: 20px;">
                        <div class="col">
                            <div class="form-group">
                                <input type="text"
                                    class="form-control" name="name" id="" aria-describedby="helpId" placeholder="Nama Depan" style="padding: 10px; border-color: #F3795C;" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input type="text"
                                    class="form-control" name="last_name" id="" aria-describedby="helpId" placeholder="Nama Belakang" style="padding: 10px; border-color: #F3795C;">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="email"
                            class="form-control" name="email" id="register-email" aria-describedby="helpId" placeholder="Email" style="padding: 10px; border-color: #F3795C;" required>
                    </div>
                    <div class="form-group">
                        <input type="password"
                            class="form-control" name="password" id="register1-password" aria-describedby="helpId" placeholder="Password" style="padding: 10px; border-color: #F3795C;" required>
                        
                    </div>
                    <span class="invalid-feedback" role="alert">
                            <strong>fkljdfj</strong>
                        </span>
                    <div class="form-group">
                        <input type="password"
                            class="form-control" name="password_confirmation" id="register1-confrim-password" aria-describedby="helpId" placeholder="Ulangi Password" style="padding: 10px; border-color: #F3795C;" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend" >
                            <span class="input-group-text" id="basic-addon1" style="background-color: white; color: #939598; border-color: #F3795C;">+62</span>
                        </div>
                        <input type="number"
                            class="form-control" name="phone" id="" aria-describedby="helpId" placeholder="Nomor Handphone" style="padding: 10px; border-color: #F3795C;">
                    </div>
                    <p style="font-weight: 700; font-size: 14px;"><i class="fa fa-birthday-cake" style="margin-right: 5px;"></i>Isi tanggal lahir kamu dan dapatkan bonus menarik setiap tahun</p>
                    <input id="datepicker2" width="276" name="tgl_lahir" placeholder="Tanggal Lahir" style="border-color: #F3795C;background:#fff;" readonly="readonly" required/>
                    <p style="font-weight: 700; font-size: 12px; margin-top: 15px; margin-bottom: 0;">Gender</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="P" required>
                        <label class="form-check-label" for="inlineRadio1">Perempuan</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="L" required>
                        <label class="form-check-label" for="inlineRadio2">Laki-laki</label>
                    </div>
                    <p style="font-weight: 700; font-size: 12px; margin-top: 15px; margin-bottom: 0;">Jenis Kulit</p>
                    <div class="row">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kulit" id="skinRadio1" value="1" required>
                                <label class="form-check-label align-middle" for="skinRadio1">Kulit Berminyak</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kulit" id="skinRadio2" value="2" required>
                                <label class="form-check-label align-middle" for="skinRadio2">Kulit Kombinasi</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kulit" id="skinRadio3" value="3" required>
                                <label class="form-check-label align-middle" for="skinRadio3">Kulit Normal</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kulit" id="skinRadio4" value="4" required>
                                <label class="form-check-label align-middle" for="skinRadio4">Kulit Kering</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kulit" id="skinRadio5" value="5" required>
                                <label class="form-check-label align-middle" for="skinRadio5">Kulit Sensitif</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit"  class="btn btn-primary" style="display: block; margin: 0 auto; background-color: #F3795C; border: none; padding: 10px 40px; border-radius: 5px; width: 100%; font-size: 18px; margin-bottom: 10px; margin-top: 20px;">DAFTAR</button>
                    </form>
                    @if(\App\BusinessSetting::where('type', 'google_login')->first()->value == 1 || \App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1 || \App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1)
                                        <div class="or or--1 mt-3 text-center">
                                            <span>or</span>
                                        </div>
                                        <div>
                                        @if (\App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1)
                                            <a href="{{ route('social.login', ['provider' => 'facebook']) }}" class="btn btn-styled btn-block btn-facebook btn-icon--2 btn-icon-left px-4 mb-3">
                                                <i class="icon fa fa-facebook"></i> {{__('Register with Facebook')}}
                                            </a>
                                        @endif
                                        @if(\App\BusinessSetting::where('type', 'google_login')->first()->value == 1)
                                            <a href="{{ route('social.login', ['provider' => 'google']) }}" class="btn btn-styled btn-block btn-google btn-icon--2 btn-icon-left px-4 mb-3">
                                                <i class="icon fa fa-google"></i> {{__('Register with Google')}}
                                            </a>
                                        @endif
                                        @if (\App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1)
                                            <a href="{{ route('social.login', ['provider' => 'twitter']) }}" class="btn btn-styled btn-block btn-twitter btn-icon--2 btn-icon-left px-4 mb-3">
                                                <i class="icon fa fa-twitter"></i> {{__('Register with Twitter')}}
                                            </a>
                                        @endif
                                        </div>
                                    @endif
                                    <a href="#" id="btn-phone" class="btn btn-styled btn-block btn-phone btn-icon--2 btn-icon-left px-4 next" style="margin-bottom: 20px;">
                                        <i class="icon fa fa-phone"></i> {{__('Register with Phone Number')}}
                                    </a>
                    <p style="text-align: center; font-size: 10px; width: 70%; margin: 0 auto; color: #BCBDC0;">Dengan melakukan pendaftaran kamu telah menyetujui <a href="{{ url('kebijakan-privasi') }}" style="color: #1074BC;">Kebijakan Privasi</a> dan <a href="{{ url('syarat-ketentuan') }}" style="color: #1074BC;">Syarat & Ketentuan</a></p>
                </fieldset>
                <fieldset class="fnext">
                    <p class="heading-5 mb-1" style="font-weight: 700;">SELAMAT DATANG DI PONNY BEAUTE!</p>
                    <p style="font-weight: 700;">Masukan nomor telepon kamu untuk masuk</p>

                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="background-color: white; color: #939598; border-color: #F3795C;">+62</span>
                        </div>
                        <input type="number"
                            class="form-control" name="" id="phoneNumber2" aria-describedby="helpId" placeholder="Nomor Handphone" style="padding: 10px; border-color: #F3795C;">


                    </div>
                  
                     <span class="mb-3" id="alert-insertnomor2"  style="color: #FCF8F0; display: block;">*Harap masukan nomor anda.</span>

                    <button type="button" class="btn btn-primary action-button" id="sign-in-button2" style="display: block; margin: 0 auto; background-color: #F3795C; border: none; padding: 10px 40px; border-radius: 5px; width: 100%; font-size: 18px; margin-bottom: 10px;">DAFTAR</button>
                    <p class="prevprev action-button-previous"><i class="fa fa-chevron-left" aria-hidden="true" style="padding-right: 10px; color: #F3795C;"></i>Kembali</p>
                    <p style="text-align: center; font-size: 10px; width: 70%; margin: 0 auto; color: #BCBDC0;">Dengan melakukan pendaftaran kamu telah menyetujui <a href="{{ url('kebijakan-privasi') }}" style="color: #1074BC;">Kebijakan Privasi</a> dan <a href="{{ url('syarat-ketentuan') }}" style="color: #1074BC;">Syarat & Ketentuan</a></p>
                </fieldset>
                <fieldset class="fnext">
                    <p class="heading-5 mb-1" style="font-weight: 700;">DAFTAR SEBAGAI ANGGOTA PHOEBE'S SQUAD</p>
                    <p style="font-weight: 700;">Periksa pesan SMS Anda. Kami telah mengirimkan PIN</p>
                    <p>Nomor Telepon</p>
                    <p class="nomor-terpakai"></p>
                    <div class="row" style="padding-left: 10px;text-align: center;margin-left: auto;margin-right: auto;margin-bottom: 20px;">
                        <div  style="justify-content: center" id="otp-container">
                            <input class="input-otp" oninput="inputInsideOtpInput(this)"
                                   maxlength="1" type="number" name="code[]">

                            <input class="input-otp" oninput="inputInsideOtpInput(this)"
                                   maxlength="1" type="number" name="code[]">

                            <input class="input-otp" oninput="inputInsideOtpInput(this)"
                                   maxlength="1" type="number" name="code[]">

                            <input class="input-otp" oninput="inputInsideOtpInput(this)"
                                   maxlength="1" type="number" name="code[]">

                            <input class="input-otp" oninput="inputInsideOtpInput(this)"
                                   maxlength="1" type="number" name="code[]">

                            <input class="input-otp" oninput="inputInsideOtpInput(this)"
                                   maxlength="1" type="number" name="code[]">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="#" id="kirim-ulang" style="color: #BCBDC0; text-decoration: underline;">Kirim ulang kode</a>
                        </div>
                        <div class="col">
                        </div>
                        <div class="col text-right">
                            <button type="button" class="btn btn-primary" id="verify-code-button2" style="background-color: #F3795C; border-color: #F3795C; border-radius: 5px;" disabled>LANJUT</button>
                        </div>
                        <form id="form_lanjutan" action="{{ url('users/registrationOtp') }}" method="GET">
                            <input type="hidden" name="uid">
                            <input type="hidden" name="nomor_hp">
                        </form>
                    </div>
                    <p class="previous action-button-previous btn-link" style="color: black;"><i class="fa fa-chevron-left" aria-hidden="true" style="padding-right: 10px; color: #F3795C;"></i>Kembali</p>
                    <p style="text-align: center; font-size: 10px; width: 70%; margin: 0 auto; color: #BCBDC0;">Dengan melakukan pendaftaran kamu telah menyetujui <a href="{{ url('kebijakan-privasi') }}" style="color: #1074BC;">Kebijakan Privasi</a> dan <a href="{{ url('syarat-ketentuan') }}" style="color: #1074BC;">Syarat & Ketentuan</a></p>
                </fieldset>
            </div>
        </div>
    </div>
</div>

<div class="modal hide fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #FCF8F0;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="width: 90%; margin: 0 auto; padding-bottom: 50px;">
                <h1 style="font-size: 18px; font-weight: 700;">HAPUS PRODUK</h1>
                <p class="font-weight-bold mt-4">Kamu yakin ingin menghapus produk ini dari keranjang belanja?</p>
                <div class="row">
                    <div class="col pr-1">
                        <a href="#" type="button" class="btn btn-danger text-center btn-pakai py-2 width-100">HAPUS, TAMBAHKAN KE WISHLIST</a>
                    </div>
                    <div class="col pl-1">
                        <a href="#" type="button" class="btn btn-danger text-center btn-pakai py-2 width-100" id="btn-hapus-barang">HAPUS</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal hide fade" id="modalHapusAlamat" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #FCF8F0;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center" style="width: 70%; margin: 0 auto; padding-bottom: 50px;">
                <h1 style="font-size: 18px; font-weight: 700;">HAPUS ALAMAT</h1>
                <p class="font-weight-bold mt-4">Kamu yakin ingin menghapus alamat ini?</p>
                <div class="row mt-5">
                    <div class="col pr-1">
                        <button   type="button" class="btn btn-danger text-center btn-pakai py-2 mr-2 width-100" data-dismiss="modal">TIDAK</button>
                    </div>
                    <div class="col pl-1">
                        <a id="btn-hapus-alamat" href="#" type="button" class="btn btn-danger text-center btn-pakai py-2 ml-2 width-100">HAPUS</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal hide fade" id="modalQuickViewSampelTukarPoin" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #FCF8F0;">
            <div class="modal-header" style="border-bottom: solid 1px #F3795C;">
                <p style="font-weight: 700; color: #F3795C;">QUICK VIEW</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="margin: 0 auto; padding-bottom: 50px;">
                <div class="row">
                    <div class="col-5">
                        <img src="{{ asset('frontend/images/placeholder.jpg') }}" onclick="gbr()" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" id="giant-banner" alt="">
                    </div>
                    <div class="col-7">
                        <p class="font-weight-bold mb-0" style="font-size: 16px;">Skin Game</p>
                        <p class="mb-0">Acne Warrior Skin game official</p>
                        <p class="font-weight-bold mt-3 mb-0" style="font-size: 14px;">GRATIS / 100 Poin</p>
                        <a href="#" type="button" class="btn btn-danger text-center btn-pakai mt-5 py-2">LIHAT PRODUK</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal hide fade bd-example-modal-lg" id="modalQuickViewProduct" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background-color: #FCF8F0;">
            <div class="modal-header" style="border-bottom: solid 1px #F3795C;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5">
                <div class="row">
                    <div class="col-5 pl-3 pr-5">
                        <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                        <div class="row py-3" style="margin: 0 -10px;">
                            <div class="col-4" style="padding: 0 10px;">
                                <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                            </div>
                            <div class="col-4" style="padding: 0 10px;">
                                <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                            </div>
                            <div class="col-4" style="padding: 0 10px;">
                                <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-7">
                        <h1 class="font-weight-bold h5 mb-0">Skin Game</h1>
                        <p class="mb-0" style="font-size: 14px;">Acne Warrior Skin game official</p>
                        <p class="mb-0 py-2" style="font-size: 12px;">
                            <i class="fa fa-heart mr-1" aria-hidden="true" style="color: #F3795C;"></i>
                            <i class="fa fa-heart mr-1" aria-hidden="true" style="color: #F3795C;"></i>
                            <i class="fa fa-heart mr-1" aria-hidden="true" style="color: #F3795C;"></i>
                            <i class="fa fa-heart mr-1" aria-hidden="true" style="color: #F3795C;"></i>
                            <i class="fa fa-heart mr-1" aria-hidden="true" style="color: #FBD2CD;"></i>(5)
                        </p>
                        <p class="border border-dark rounded font-weight-bold text-center py-1 px-2 d-inline">BPOM NA18190125265</p>
                        <p class="my-3" style="font-size: 16px;"><s>Rp. 125.000</s><span class="font-weight-bold ml-1" style="font-size: 20px; color: #F3795C;">Rp. 85.000</span><span class="badge badge-primary ml-2 px-2" style="font-size: 65%; background-color: #F3795C;">35%</span></p>
                        <div class="row">
                            <div class="col-2">
                                <p style="font-weight: 600;">UKURAN:</p>
                            </div>
                            <div class="col-10">
                                <span class="badge badge-primary rounded border px-4" style="font-size: 100%; background-color: #FCF8F0; color: black; border-color: #F3795C !important;">60 ml</span><span class="badge badge-primary ml-3 rounded border px-4" style="font-size: 100%; background-color: #FCF8F0; color: black; border-color: #F3795C !important;">100 ml</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2 my-auto">
                                <p class="mb-0" style="font-weight: 600;">JUMLAH:</p>
                            </div>
                            <div class="col-10">
                                <div class="input-group input-group--style-2 pr-3" style="width: 160px;">
                                    <span class="input-group-btn">
                                        <button class="btn btn-number" type="button" data-type="minus"
                                                data-field="quantity" disabled="disabled">
                                            <i class="la la-minus"></i>
                                        </button>
                                    </span>
                                    <input type="text" name="quantity" class="form-control input-number text-center"
                                            placeholder="1" value="1" min="1" max="10">
                                    <span class="input-group-btn">
                                        <button class="btn btn-number" type="button" data-type="plus"
                                                data-field="quantity">
                                            <i class="la la-plus"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="py-3">
                            <button type="button" class="btn btn-danger text-center btn-mskkeranjang">MASUKKAN KERANJANG</button>
                            <div class="rounded-circle text-center ml-2 d-inline" style="font-size: 120%; background-color: #FAE0D4; color: #F3795C; padding: 3px 7px;"><i class="fa fa-heart-o" aria-hidden="true"></i></div>
                        </div>
                        <div class="py-2">
                            <p class="mb-0">Beritahu saya jika barang sudah</p>
                            <p class="mb-0">tersedia kembali</p>
                        </div>
                        <div class="pb-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        <input type="email"
                                            class="form-control rounded" name="email" id="register-email" aria-describedby="helpId" placeholder="Masukkan alamat email" style="padding: 10px; border-color: #F3795C; font-size: 12px;" required>
                                    </div>
                                </div>
                                <div class="col-4 pl-0">
                                    <button type="button" class="btn btn-danger text-center btn-mskkeranjang" style="padding: 10px; font-size: 12px;">BERITAHU SAYA</button>
                                </div>
                            </div>
                        </div>
                        <a href="#" style="color: #F3795C; font-weight: 600;">SELENGKAPNYA</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal hide fade" id="modalAddToBag" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #FCF8F0;">
            <div class="modal-header" style="border-bottom: solid 1px #F3795C;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5">
                <div class="row">
                    <div class="col-5">
                        <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                    </div>
                    <div class="col-7 my-auto">
                        <p class="font-weight-bold mb-0" style="font-size: 16px;">Skin Game</p>
                        <p class="mb-0">Acne Warrior</p>
                        <p class="mb-0 mt-3"><span class="badge badge-primary rounded border px-4" style="font-size: 100%; background-color: #FCF8F0; color: black; border-color: #F3795C !important;">60 ml</span><span class="badge badge-primary ml-2 rounded border px-4" style="font-size: 100%; background-color: #FCF8F0; color: black; border-color: #F3795C !important;">100 ml</span></p>
                    </div>
                </div>
                <div class="text-center">
                <a href="#modalSuccessAddToBag" data-target="#modalSuccessAddToBag" data-dismiss="modal" data-toggle="modal" type="button" class="btn btn-danger text-center btn-pakai mt-4 py-2">TAMBAHKAN KE KERANJANG</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal hide fade" id="modalSuccessAddToBag" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #FCF8F0;">
            <div class="modal-header" style="border-bottom: solid 1px #F3795C;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-5 py-4">
                <div class="text-center mb-4">
                    <img src="{{asset('img/cart.png')}}" class="mb-2 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width: 34px;">
                    <h1 class="font-weight-bold h6" style="color: #F3795C;">DITAMBAHKAN KE KERANJANG</h1>
                </div>
                <div class="row px-4">
                    <div class="col-5">
                        <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                    </div>
                    <div class="col-7 my-auto">
                        <p class="font-weight-bold mb-0" style="font-size: 18px;">Skin Game</p>
                        <p class="mb-0" style="font-size: 14px;">Acne Warrior</p>
                        <p class="mb-0" style="font-size: 16px;">100 ml</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal hide fade" id="modalHapusWishlist" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #FCF8F0;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body py-4" style="width: 90%; margin: 0 auto;">
                <p class="font-weight-bold">Apa kamu yakin hapus produk ini dari wishlist mu?</p>
                <div class="row">
                    <div class="col-4">
                        <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                    </div>
                    <div class="col-8 my-auto">
                        <p class="font-weight-bold mb-0" style="font-size: 16px;">Skin Game</p>
                        <p class="mb-0" style="font-size: 12px; line-height: 14px;">Acne Warrior</p>
                        <p class="mb-0 font-weight-bold" style="font-size: 14px;">Rp. 100.000</p>
                        <p class="mb-0" style="font-size: 12px; line-height: 14px;"><s>Rp. 125.000 </s><span style="color: #F3795C;">(35%)</span></p>
                    </div>
                </div>
                <div class="row mt-4 justify-content-center">
                    <div class="col-4">
                        <button type="button" class="btn btn-danger text-center btn-lihatlebihbanyak py-2 width-100"><p class="mb-0 text-center" style="font-weight: 600;">TIDAK</p></button>
                    </div>
                    <div class="col-4">
                        <button type="button" class="btn btn-danger text-center btn-lihatlebihbanyak py-2 width-100"><p class="mb-0 text-center" style="font-weight: 600;">YA</p></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal hide fade bd-example-modal-lg" id="modalBalas" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background-color: #FCF8F0;">
            <div class="modal-header pb-0" style="border: none;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true" style="color: #F3795C; font-size: 50px;">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-5 pt-0" style="width: 90%; margin: 0 auto;">
                <h2 class="font-weight-bold text-center" id="titleModal" style="border-bottom: 1px solid #F3795C; line-height: 100px;">Tambahkan Komentar</h2>
                <div class="row mt-5">
                    <div class="col-8">
                        <div class="row" id="bodyModalBalas">
                            <form action="#" method="post" enctype="multipart/formdata" id="formpostingan">
                            <div class="input-group flex-nowrap" style="margin-bottom:20px;width:100%">
                                <input type="file" name="thumbnail" id="thumb" data-max-file-size="0.5M" data-min-width="200" data-min-height="200"data-allowed-file-extensions="jpg jpeg png" required>
                            </div>
                                <textarea width="100%" id="summernoteText" name="text" required></textarea>
                                <p class="my-4" style="font-size: 16px; color: #6C6D70;">Petunjuk: <span style="color: black; font-weight: 600;">#</span> links untuk produk, <span style="color: black; font-weight: 600;">@</span> links untuk member dan topik</p>
                                <a name="" id="btnCancel" class="btn btn-danger rounded btn-komplain px-5 py-2" href="#" role="button"><p class="mb-0" style="font-size: 20px; font-weight: 600;">BATAL</p></a>
                                <a name="" id="btnReply" class="btn btn-danger rounded btn-pakai px-5 py-2 ml-3" href="#" role="button"><p class="mb-0" style="font-size: 20px; font-weight: 600;">KIRIM</p></a>
                                <button type="submit" name="" id="btnPost" class="btn btn-danger rounded btn-pakai px-5 py-2 ml-3" href="#" role="button"><p class="mb-0" style="font-size: 20px; font-weight: 600;">POST</p></button>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-4">
                            <label class="checkbox-container mb-2">
                                <p class="mb-0" style="font-size: 18px; font-weight: 600; line-height: 22px; vertical-align: middle;">Email saya ketika seseorang membalas</p>
                                <input type="checkbox" value="1" name="notifemail" id="notifemail">
                                <span class="checkbox-checkmark"></span>
                            </label>
                        </div>
                        <p style="font-size: 22px; font-weight: 700;">Produk terkait</p>
                        <!-- <div class="p-4 rounded" style="border: 1px solid #F3795C;"> -->
                            <select name="precom[]" class="selectpicker" id="precom" data-title="pilih kategori" data-live-search="true" multiple>
                                        @php($product = App\Product::with('subcategory')->get())
                                        @foreach($product as $key => $p)
                                        <option data-subtext="{{$p->subcategory->name}}" value="{{$p->id}}">{{$p->name}}</option>
                                        @endforeach
                            </select>
                            </form>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal hide fade bd-example-modal-lg" id="modalBalasan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background-color: #FCF8F0;">
            <div class="modal-header pb-0" style="border: none;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true" style="color: #F3795C; font-size: 50px;">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-5 pt-0" style="width: 90%; margin: 0 auto;">
                <h2 class="font-weight-bold text-center" id="titleModal" style="border-bottom: 1px solid #F3795C; line-height: 70px;">Balasan</h2>
                <div class="row mt-1">
                    <p style="margin: 0; font-size: 14px;color:#000000;">Balasan di <b id="postparent" style="color:#F3795C;">Kulit berdebu</b></p>
                </div>
                <div class="row mt-2">
                        <div class="col">
                            <div class="row px-3 py-3" id="bodyModalBalasan" style="border: 2px solid #f3795c;border-radius: 8px;width:100%;">
                                <div id="detailbalasan">halo kamu anak mana rumahnya dimana anaknya siapa hobinya apa mainan apa kelas berapa kamu itu umur berapa kenapa?</div>
                                <div id="modalPrecom"></div>
                            </div>
                            <div class="mt-1" id="propertibalas">
                                @if(Auth::check())
                                <input type="hidden" id="clike_check" value="unliked">
                                <a href="#" id="btncLike" data-check="unliked" data-id="string" data-uid="stiring"><i class="fa fa-heart-o" style="color: #f3795c; font-size: 15px; vertical-align: middle;"></i>
                                </a>
                                <input type="hidden" name="" id="curlike">
                            @else
                                <a href="#" onclick="alert('silahkan login')"><i class="fa fa-heart-o" style="color: #f3795c; font-size: 15px; vertical-align: middle;"></i>
                                <span id="commentliked"></span>
                                </a>
                            @endif
                                
                                <span class="ml-1" style="font-size: 15px; vertical-align: middle;" id="ctotalLike">2</span>
                                <a href="#" id="cokbalas" data-reply="0" data-id="17" style="color: #333;">
                                <i class="fa fa-reply ml-3" style="color: #f3795c; font-size: 15px; vertical-align: middle;"></i>
                                <span class="ml-1" style="font-size: 15px; vertical-align: middle;">Balas</span></a><span class="ml-3" style="font-size: 15px; vertical-align: middle;"> | &nbsp; &nbsp; <span id="jumlahbalasan">3</span> Balasan</span>
                                <form action="#" class="mt-2" method="post" enctype="multipart/form-data" id="formbalasan" style="display:none;width:99%">
                                    <div class="input-group mb-1">
                                        <input type="text" class="form-control" placeholder="Reply" style="background-color:#FCF8F0;border-radius:8px;" id="fieldBalas" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <div class="input-group-append">
                                            <button class="btn ml-2" style="color:#f3795c; background-color:#FCF8F0; border-color:#f3795c;border-radius:5px" data-id="0" type="button" id="postchildreply">Kirim</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <div class="row mt-2">
                            <div class="px-2 py-2 ml-3" style="float:left;width:100%;height:30%" id="balasan">
                                <div class="ove" id="balasan_komen" style="overflow:auto;height:210px;">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>




<!-- MAIN WRAPPER -->
<div class="body-wrap shop-default shop-cards shop-tech gry-bg">

    <!-- Header -->
    @include('frontend.inc.nav')

    <div id="distance" style="background-color: #FCF8F0;"></div>

    @yield('content')

    @include('frontend.inc.footer')

    @include('frontend.partials.modal')

    @if (\App\BusinessSetting::where('type', 'facebook_chat')->first()->value == 1)
        <div id="fb-root"></div>
        <!-- Your customer chat code -->
        <div class="fb-customerchat"
          attribution=setup_tool
          page_id="{{ env('FACEBOOK_PAGE_ID') }}">
        </div>
    @endif

    <div class="modal fade" id="addToCart">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative" style="background-color: #FCF8F0;">
                <div class="c-preloader">
                    <i class="fa fa-spin fa-spinner"></i>
                </div>
                <div class="modal-header" style="border-bottom: solid 1px #F3795C;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="addToCart-modal-body">

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addToBag">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom product-modal" role="document">
            <div class="modal-content position-relative" style="background-color: #FCF8F0;">
                <div class="c-preloader">
                    <i class="fa fa-spin fa-spinner"></i>
                </div>
                <div class="modal-header" style="border-bottom: solid 1px #F3795C;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="addToBag-modal-body">

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addCoupon">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: #FCF8F0; border: none;">
                <div class="c-preloader">
                    <i class="fa fa-spin fa-spinner"></i>
                </div>
                <div class="modal-header pb-0" style="border: none; background-color: #F3795C;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">                        <span aria-hidden="true" style="color: white; font-size: 30px;">&times;</span>
                    </button>
                </div>
                <div id="addCoupon-modal-body">

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalReview">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="background-color: #FCF8F0;">
                <div class="c-preloader">
                    <i class="fa fa-spin fa-spinner"></i>
                </div>
                <div class="modal-header" style="border-bottom: solid 1px #F3795C;">
                    <p class="mb-0 pl-3" style="font-weight: 700; font-size: 16px;">REVIEW</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="review-modal-body">
                    
                </div>
                
            </div>
        </div>
    </div>

    

</div><!-- END: body-wrap -->

<!-- SCRIPTS -->
<a href="#" class="back-to-top btn-back-to-top"></a>

<div class="video-siaran">
    <div class="container-fluid p-0">
        <div id="full-screen-video"></div>
        <div id="lower-ui-bar" class="row fixed-bottom mb-1">
            <div id="external-broadcasts-container" class="container col-flex"></div>
        </div>
    </div>
        
</div>

<!-- Core -->
<script src="{{ asset('frontend/js/vendor/popper.min.js') }}"></script>
<script src="{{ asset('frontend/js/vendor/bootstrap.min.js') }}"></script>

<!-- Plugins: Sorted A-Z -->
<script src="{{ asset('frontend/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('frontend/js/select2.min.js') }}"></script>
<script src="{{ asset('frontend/js/nouislider.min.js') }}"></script>


<script src="{{ asset('frontend/js/sweetalert2.min.js') }}"></script>
<script src="{{ asset('frontend/js/slick.min.js') }}"></script>

<script src="{{ asset('frontend/js/jquery.share.js') }}"></script>
<script src="{{ asset('js/jquery.blockUI.min.js') }}"></script>
<script src="https://www.gstatic.com/firebasejs/7.15.5/firebase-app.js"></script>

<script src="https://www.gstatic.com/firebasejs/7.15.5/firebase-auth.js"></script>
<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.15.5/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.15.5/firebase.js"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/spartan-multi-image-picker-min.js') }}"></script>
<script src="{{ asset('plugins/ratting-rp/jsRapStar.js') }}"></script>
<script src="{{ asset('plugins/jStarbox-master/jstarbox.js') }}"></script>
<script src="{{ asset('bootstrap-rating-master/bootstrap-rating.min.js') }}"></script>
<!-- summernote -->
<script src="{{ asset('js/jodit.min.js') }}"></script>
<script src="{{ asset('js/jquery.form.js') }}"></script>


<script>
    function blockui(refrence){
        $(refrence).block({message: '<i class="icon-spinner4 spinner"></i> Mohon tunggu...',
            // timeout: 2000, //unblock after 2 seconds
            overlayCSS: {
                backgroundColor: '#fff',
                opacity: 0.8,
                cursor: 'wait'
            },
            css: {
                border: 0,
                padding: 0,
                backgroundColor: 'transparent'
            }
         }); 
    }

    function unblockui(refrence){
        $(refrence).unblock();
    }

    function inputInsideOtpInput(el) {
        if (el.value.length > 1){
            el.value = el.value[el.value.length - 1];
        }
        try {
            if(el.value == null || el.value == ""){
                this.foucusOnInput(el.previousElementSibling);
            }else {
                this.foucusOnInput(el.nextElementSibling);
            }
        }catch (e) {
            console.log(e);
        }
    }

   function foucusOnInput(ele){
       ele.focus();
       let val = ele.value;
       ele.value = "";
       // ele.value = val;
       setTimeout(()=>{
           ele.value = val;
       })
   }

   $('#modalBalas').on('hidden.bs.modal', function (e) { 
            
        })

   function submitformregister()
   {
        $("form#register1").validate({

          
           submitHandler: function(form) {
            // do other things for a valid form
            if ($('#register1-password').val() == $('#register1-confrim-password').val()) {
                form.submit();
             }else{
                $('#error-register1').css('display','block');
             }
            
          }
        });
         $('#error-register1').css('display','block');
    
   }
</script>

<script>
var firebaseConfig = {
    apiKey: "{{ env('OTP_APIKEY') }}",
    authDomain: "{{ env('OTP_AUTHDOMAIN') }}",
    databaseURL: "{{ env('OTP_DATABASEURL') }}",
    projectId: "{{ env('OTP_PROJECTID') }}",
    storageBucket: "{{ env('OTP_STORAGEBUCKET') }}",
    messagingSenderId: "{{ env('OTP_MESSAGINGSENDERID') }}",
    appId: "{{ env('OTP_APPID') }}",
    measurementId: "{{ env('OTP_MEASUREMENTID') }}"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();

  window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('sign-in-button', {
  'size': 'invisible',
  'callback': function(response) {
    // reCAPTCHA solved, allow signInWithPhoneNumber.
    onSignInSubmit();
  }
});
window.confirmationResult;
var current_fs, next_fs, previous_fs, nextnext_fs, prevprev_fs; //fieldsets
var opacity;

const messaging = firebase.messaging();
messaging.requestPermission().then(function() {
    console.log('Notification permission granted.');
    // TODO(developer): Retrieve an Instance ID token for use with FCM.
    // ...
    getRegisterToken();
}).catch(function(err) {
    console.log('Unable to get permission to notify.', err);
});

function getRegisterToken() {
    messaging.getToken().then(function(currentToken) {
        if (currentToken) {
            sendTokenToServer(currentToken);
            console.log(currentToken);
            //updateUIForPushEnabled(currentToken);
        } else {
            // Show permission request.
            console.log('No Instance ID token available. Request permission to generate one.');
            // Show permission UI.
            //updateUIForPushPermissionRequired();
            // setTokenSentToServer(false);
        }
    }).catch(function(err) {
        console.log('An error occurred while retrieving token. ', err);
        // setTokenSentToServer(false);
    });
}

function sendTokenToServer(currentToken) {
    if (!isTokenSentToServer()) {
        console.log('Sending token to server...');
        // TODO(developer): Send the current token to your server.
        $.ajax({
            url: "{{ url('save-fbtoken') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                fbtoken: currentToken
            },
            dataType: "json",
            async: true,
            success: function(msgd) {
                setTokenSentToServer(true);
                console.log('save token success.');
            }
        });

    } else {
        console.log('Token already sent to server so won\'t send it again ' +
            'unless it changes');
    }
}

function setTokenSentToServer(sent) {
    window.localStorage.setItem('sentToServer', sent ? '1' : '0');
}

function isTokenSentToServer() {
    return window.localStorage.getItem('sentToServer') === '1';
}

messaging.onMessage(function(payload) {
    console.log('Message received. ', payload);
    // ...
    var title = payload.notification.title;
    var options = {
        body: payload.notification.body,
        icon: payload.notification.icon,
        image: payload.notification.image,
        silent: false,
    };
    console.log(title);

    if(title == 'Payment Sukses')
    {
        window.location.replace("{{ url('purchase_history') }}");
    }
});

messaging.onTokenRefresh(function() {
    messaging.getToken().then(function(refreshedToken) {
        console.log('Token refreshed.');
        // Indicate that the new Instance ID token has not yet been sent to the
        // app server.
        setTokenSentToServer(false);
        // Send Instance ID token to app server.
        sendTokenToServer(refreshedToken);
        // ...
    }).catch(function(err) {
        console.log('Unable to retrieve refreshed token ', err);
        showToken('Unable to retrieve refreshed token ', err);
    });
});


function next_step(refrence)
{
    current_fs = refrence.parent();
    nextnext_fs = refrence.parent().next();
    //show the next fieldset
    nextnext_fs.show();
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
    step: function(now) {
    // for making fielset appear animation
    opacity = 1 - now;

    current_fs.css({
    'display': 'none',
    'position': 'relative'
    });
    nextnext_fs.css({'opacity': opacity});
    },
    duration: 600
    });
}

$(document).ready(function(){
    $(window).scroll(function(){
        var sticky = $('.top-navbar'),
            scroll = $(window).scrollTop(),
            promote = $('.promote-navbar');

        if (scroll >= promote.height()){
            sticky.addClass('top-navbar-fixed');
            $("#main-logo-header").css("width", "150px");
            $("#distance").css("height", sticky.height()+"px");
        }
        else {
            sticky.removeClass('top-navbar-fixed');
            $("#main-logo-header").css("width", "200px");
            $("#distance").css("height", "0");
        }
    });

    let slickinitmobile = 0;

    $(".category-name-mobile-container a").each(function(i, el){
        if($(el).hasClass("active")){
            slickinitmobile = i;
        }
    });

    $("#account-mobile-menu").slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        initialSlide: slickinitmobile,
        arrows: false,
        variableWidth: true
    });

    $(".button-brandfilter1").click(function(){
        $(".button-brandfilter1").css("color", "black");
        $(this).css("color", "#f3795c");
    });
    $(".button-brandfilter2").click(function(){
        $(".button-brandfilter2").css("color", "black");
        $(this).css("color", "#f3795c");
    });
    $(".skincare-button").click(function(){
        $(".skincare-button").css("color", "black");
        $(this).css("color", "#f3795c");
    });
    $(".hair-beauty-button").click(function(){
        $(".hair-beauty-button").css("color", "black");
        $(this).css("color", "#f3795c");
    });
    $(".tools-button").click(function(){
        $(".tools-button").css("color", "black");
        $(this).css("color", "#f3795c");
    });
    $(".concern-button").click(function(){
        $(".concern-button").css("color", "black");
        $(this).css("color", "#f3795c");
    });
    $(".skin-type").click(function(){
        $(".skin-type").css("font-weight", "normal");
        $(this).css("font-weight", "bold");
    });

    $(".sample-btn").click(function(){
        if($('.sample-container').css('display') == 'none')
        {
            $(".sample-container").show(300);
            $(".sample-area").css({"background-color": "#F3795C", "color": "white"});
            $(".sample-arrow").css({"transform": "rotate(180deg)", "color": "white"});
        }
        else {
            $(".sample-container").hide(300);
            $(".sample-area").css({"background-color": "#FCF8F0", "color": "black"});
            $(".sample-arrow").css({"transform": "rotate(0deg)", "color": "#F3795C"});
        }

        if($('.tukarpoin-container').css('display') == 'block'){
            $(".tukarpoin-container").hide(300);
            $(".tukarpoin-area").css({"background-color": "#FCF8F0", "color": "black"});
            $(".tukarpoin-link").css({"color": "black"});
            $(".tukarpoin-arrow").css({"transform": "rotate(0deg)", "color": "#F3795C"});
        }
    });

    $(".tukarpoin-btn").click(function(){
        if($('.tukarpoin-container').css('display') == 'none')
        {
            $(".tukarpoin-container").show(300);
            $(".tukarpoin-area").css({"background-color": "#F3795C", "color": "white"});
            $(".tukarpoin-link").css({"color": "white"});
            $(".tukarpoin-arrow").css({"transform": "rotate(180deg)", "color": "white"});
        }
        else {
            $(".tukarpoin-container").hide(300);
            $(".tukarpoin-area").css({"background-color": "#FCF8F0", "color": "black"});
            $(".tukarpoin-link").css({"color": "black"});
            $(".tukarpoin-arrow").css({"transform": "rotate(0deg)", "color": "#F3795C"});
        }
        if($('.sample-container').css('display') == 'block'){
            $(".sample-container").hide(300);
            $(".sample-area").css({"background-color": "#FCF8F0", "color": "black"});
            $(".sample-arrow").css({"transform": "rotate(0deg)", "color": "#F3795C"});
        }
    });

    $(".btn-tambah-alamat").click(function(){
        $(".tambah-alamat-container").hide(300);
        $(".tambah-alamat-form").show(300);
        $(".simpan-alamat").hide(300);
        $(".simpan-alamat-pilih").hide(300);
    });


    $(".simpan-alamat").click(function(){
        $(".tambah-alamat-container").show(300);
        $(".tambah-alamat-form").hide(300);
        $(".simpan-alamat").show(300);
        $(".simpan-alamat-pilih").show(300);
    });

    $(".pilihalamat").click(function(){
        if($(".simpan-alamat-pilih").css('display') != 'none'){
            $(".pilihalamat").css({"border": "1px solid #F3795C","background-color" :"#FCF8F0"});
            $(this).css({"border": "3px solid #F3795C", "background-color": "#FADFD2"});

        }
    });

    $(".simpan-alamat-pilih").click(function(){
        $(this).hide(300);
        $(".title-edit-alamat").show(300);
        $(".pilihalamat").css({"background-color": "#FCF8F0", "border": "none"});
        $(".button-action-alamat").hide(300);
        $(".tambah-alamat-container").hide(300);
    });

    $(".title-edit-alamat").click(function(){
        $(this).hide(300);
        $(".pilihalamat").css({"border": "3px solid #F3795C", "background-color": "#FADFD2"});
        $(".button-action-alamat").show(300);
        $(".tambah-alamat-container").show(300);
        $(".simpan-alamat-pilih").show(300);
    });

    $(".simpan-ekspedisi").click(function(){
        $(this).hide(300);
        $(".metode-pengiriman").hide(300);
        $(".pilihekspedisi").show(300);
        $(".title-edit-ekspedisi").show(300);
    });

    $(".title-edit-ekspedisi").click(function(){
        $(this).hide(300);
        $(".pilihekspedisi").hide(300);
        $(".simpan-ekspedisi").show(300);
        $(".metode-pengiriman").show(300);
    });

    $(".button-edit-account").click(function(){
        $(".detail-account").hide(300);
        $(".edit-account").show(300);
        $(".title-account").text("EDIT PROFILE");
    });

    $(".batal-edit-account").click(function(){
        $(".detail-account").show(300);
        $(".edit-account").hide(300);
        $(".title-account").text("DETAIL AKUN");
    });

    $(".edit-password-account").click(function(){
        $(".edit-password-account-form").show(300);
        $(".edit-account").hide(300);
        $(".avatar-account").hide(300);
        $(".title-account").text("EDIT PASSWORD");
    });

    $(".cancel-edit-password-account").click(function(){
        $(".edit-password-account-form").hide(300);
        $(".edit-account").show(300);
        $(".avatar-account").show(300);
        $(".title-account").text("EDIT PROFILE");
    });

    $(".add-address").click(function(){
        $(".form-address").show(300);
        $(".detail-address").hide(300);
        $(".title-address").text("EDIT ADDRESS");
    });

    $(".save-address, .cancel-save-address").click(function(){
        $(".form-address").hide(300);
        $(".detail-address").show(300);
        $(".title-address").text("ALAMAT PENGIRIMAN");
    });

    $(".beauty-profile-button").click(function(){
        $(".beauty-profile-set").hide(300);
        $(".beauty-profile-form").show(300);
    });

    $(".search-form").focus(function(){
        $(".search-btn").css({"border-color": "#F3795C", "border-left": "1px solid white"});
    });

    $(".search-form").blur(function(){
        $(".search-btn").css({"border-color": "#ddd", "border-left": "1px solid white"});
    });

    $("#sidebarCollapse").click(function(e){
        e.preventDefault();
        $("#mobile-nav").show();
        $("#mobile-nav").animate({width: "75%"}, function(){
            $("#side-nav-container").animate({opacity: "1"});
        });
        $("#mobile-nav-overlay").show();
        $("#mobile-nav-overlay").animate({opacity: "1"});
    });

    $("#mobile-nav-overlay").click(function(e){
        e.preventDefault();
        $("#mobile-nav").animate({width: "0"});
        $("#mobile-nav").hide();
        $("#side-nav-container").animate({opacity: "0"});
        $(this).hide();
        $(this).animate({opacity: "0"});
        $(".backsubskin").addClass("back-side-nav");
        $(".back-side-nav").removeClass("backsubskin");
        backMobileNav();
        $(".filter-alphabet-side-nav").show();
        $("#filtersidenav").hide();
    });

    $(".dismiss-mobile-nav").click(function(e){
        e.preventDefault();
        $("#mobile-nav").animate({width: "0"});
        $("#mobile-nav").hide();
        $("#side-nav-container").animate({opacity: "0"});
        $("#mobile-nav-overlay").animate({opacity: "0"});
        $("#mobile-nav-overlay").hide();
        $(".backsubskin").addClass("back-side-nav");
        $(".back-side-nav").removeClass("backsubskin");
        backMobileNav();
        $(".filter-alphabet-side-nav").show();
        $("#filtersidenav").hide();
    });

    $(".main-side-menu").on("click",".skin-side-menu", function () {
        $(".back-side-nav").addClass("backsubskin");
        $(".backsubskin").removeClass("back-side-nav");
        $(".backsubskin").show();
    });

    $("#side-nav-container").on("click",".backsubskin", function () {
        $(".backsubskin").addClass("back-side-nav");
        $(".back-side-nav").removeClass("backsubskin");
        $('#filterskincaresidenav').hide();
        $('.filter-skincare-side-nav').show();
        $('.title-side-nav').text("SKIN CARE");
        if(!$('.title-side-nav').is(':visible'))
        {
            $('.title-side-nav').text("TITLE");
            $('.back-side-nav').hide();
        }
    });

    $(".brands-side-menu").click(function(){
        $(".main-side-menu, .loginregister-side-menu").hide();
        $(".title-side-nav").text("BRANDS");
        $(".brand-filter-alphabet, .back-side-nav, .title-side-nav").show();
    });

    $(".skin-side-menu").click(function(){
        $(".main-side-menu, .loginregister-side-menu").hide();
        $(".title-side-nav").text("SKIN CARE");
        $(".skincare-filter, .back-side-nav, .title-side-nav").show();
    });

    $(".hair-side-menu").click(function(){
        $(".main-side-menu, .loginregister-side-menu").hide();
        $(".title-side-nav").text("HAIR & MAKE UP");
        $(".hair-filter, .back-side-nav, .title-side-nav").show();
    });

    $(".tools-side-menu").click(function(){
        $(".main-side-menu, .loginregister-side-menu").hide();
        $(".title-side-nav").text("TOOLS");
        $(".tools-filter, .back-side-nav, .title-side-nav").show();
    });

    $(".skinconcern-side-menu").click(function(){
        $(".main-side-menu, .loginregister-side-menu").hide();
        $(".title-side-nav").text("SKIN CONCERN");
        $(".skinconcern-filter, .back-side-nav, .title-side-nav").show();
    });

    function backMobileNav(){
        $(".main-side-menu, .loginregister-side-menu").show();
        $(".title-side-nav").text("TITLE");
        $(".back-side-nav, .title-side-nav, .brand-filter-alphabet, .skincare-filter, .hair-filter, .tools-filter, .skinconcern-filter").hide();
    }

    $(".back-side-nav").click(function(){
        if($(".title-side-nav").text()=="BRANDS" || $(".title-side-nav").text()=="SKIN CARE" || $(".title-side-nav").text()=="HAIR & MAKE UP" || $(".title-side-nav").text()=="TOOLS" || $(".title-side-nav").text()=="SKIN CONCERN"){
            backMobileNav();
        }
        if($(".title-side-nav").text()=="A - B" || $(".title-side-nav").text()=="C - G" || $(".title-side-nav").text()=="H - K" || $(".title-side-nav").text()=="L - R" || $(".title-side-nav").text()=="S - Z"){
            $(".title-side-nav").text("BRANDS");
            $("#filtersidenav").hide();
            $(".filter-alphabet-side-nav").show();
        }
    });

    $(".main-side-menu").on("click",".skin-side-menu", function () {
        $(".back-side-nav").addClass("backback")
        $(".backback").removeClass("back-side-nav")
        $(".backback").show()
    })

    $("#side-nav-container").on("click",".backback", function () {
        alert("backback")
    })

    new ClipboardJS('.copy-code', {
        container: document.getElementById('addCoupon')
    });
    
    $('.input-otp').keyup(function(){
        var _code =  $("input[name='code[]']").map(function(){return $(this).val();}).get();
        var code = "";
        $.each(_code,function(i,v){
            code=code+v;
        });
        if(code.length == 6) {
            $('#verify-code-button').prop('disabled', false);
            $('#verify-code-button2').prop('disabled', false);
        }else{
            $('#verify-code-button').prop('disabled', true);
            $('#verify-code-button2').prop('disabled', true);
        }
    });

    
    $(".fnext").hide();

    $(".next").click(function(){

        
         var a = $(this);
         var email 
         if (a.data('flex') == 'login') {
            if ($('#email_login').val() != '') {
                blockui('#modalLogin .modal-body');
                $.ajax({
                    url: "{{ route('existinguser') }}",
                    method: "post",
                    data: {
                        email: $('#email_login').val(),
                      _token : "{{ csrf_token() }}"
                    },
                    datatype: "json",
                    async: true,
                    success: function (msgd) {
                    unblockui('#modalLogin .modal-body');
                    if (msgd.status == '1') {
                        $('#email_label').html(msgd.email);
                        $('#email_value').val(msgd.email);
                        current_fs = a.parent();
                        next_fs = a.parent().next();
                        
                        //show the next fieldset
                        next_fs.show();
                        //hide the current fieldset with style
                        current_fs.animate({opacity: 0}, {
                            step: function(now) {
                            // for making fielset appear animation
                            opacity = 1 - now;
                            $(".previous").show();

                            current_fs.css({
                                'display': 'none',
                                'position': 'relative'
                            });
                            next_fs.css({'opacity': opacity});
                        },
                            duration: 600
                        
                        });


                    }else{
                        $('#email_register').html($('#email_login').val());
                        current_fs = a.parent();
                        nextnext_fs = $('#daftar').next();

                        //show the next fieldset
                        nextnext_fs.show();
                        //hide the current fieldset with style
                        current_fs.animate({opacity: 0}, {
                        step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                        });
                        nextnext_fs.css({'opacity': opacity});
                        },
                        duration: 600
                        });


                    }


                    },
                    error: function (msgd) {
                       unblockui('#modalLogin .modal-body');
                       $('#email_register').html($('#email_login').val());
                        current_fs = a.parent();
                        nextnext_fs = a.parent().next().next().next().next();

                        //show the next fieldset
                        nextnext_fs.show();
                        //hide the current fieldset with style
                        current_fs.animate({opacity: 0}, {
                        step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                        });
                        nextnext_fs.css({'opacity': opacity});
                        },
                        duration: 600
                        });
                    }

                });  
            }else{
                 $('#alert-email').css('color','red');
            }

         }else{

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();
            
            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
            step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;

            current_fs.css({
            'display': 'none',
            'position': 'relative'
            });
            next_fs.css({'opacity': opacity});
            },
            duration: 600
            });


         }

         
    });

    $(".nextnext").click(function(){
        current_fs = $(this).parent();
        nextnext_fs = $(this).parent().next().next();

        //show the next fieldset
        nextnext_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
        step: function(now) {
        // for making fielset appear animation
        opacity = 1 - now;

        current_fs.css({
        'display': 'none',
        'position': 'relative'
        });
        nextnext_fs.css({'opacity': opacity});
        },
        duration: 600
        });
    });

    $(".previous").click(function(){

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
        step: function(now) {
        // for making fielset appear animation
        opacity = 1 - now;

        current_fs.css({
        'display': 'none',
        'position': 'relative'
        });
        previous_fs.css({'opacity': opacity});
        },
        duration: 600
        });
    });

    $(".prevprev").click(function(){

        current_fs = $(this).parent();
        prevprev_fs = $(this).parent().prev().prev();

        //show the previous fieldset
        prevprev_fs.show();

        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
        step: function(now) {
        // for making fielset appear animation
        opacity = 1 - now;

        current_fs.css({
        'display': 'none',
        'position': 'relative'
        });
        prevprev_fs.css({'opacity': opacity});
        },
        duration: 600
        });
    });

    $('#kirim-ulang').click( function(){
        blockui('#modalLogin .modal-body');
        var phoneNumber = '+62'+$('#phoneNumber').val();
        var appVerifier = window.recaptchaVerifier;
          firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
          .then(function (confirmationResult) {
            unblockui('#modalLogin .modal-body');
            // SMS sent. Prompt user to type the code from the message, then sign the
            // user in with confirmationResult.confirm(code).
            window.confirmationResult = confirmationResult;

          }).catch(function (error) {
            // Error; SMS not sent
            // ...
            // alert('n');
            unblockui('#modalLogin .modal-body'); 
          });

    });

    $('#sign-in-button').click(function(){
      var bc = $(this);
      var phoneNumber = '+62'+$('#phoneNumber').val();
      $('.nomor-terpakai').html(phoneNumber);
      if( phoneNumber != '+62' && $('#phoneNumber').val() != null)
      {
        blockui('#modalLogin .modal-body');
        var appVerifier = window.recaptchaVerifier;
          firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
          .then(function (confirmationResult) {
            unblockui('#modalLogin .modal-body');
            // SMS sent. Prompt user to type the code from the message, then sign the
            // user in with confirmationResult.confirm(code).
            window.confirmationResult = confirmationResult;
            current_fs = bc.parent();
            nextnext_fs = bc.parent().next();

            //show the next fieldset
            nextnext_fs.show();
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
            step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;

            current_fs.css({
            'display': 'none',
            'position': 'relative'
            });
            nextnext_fs.css({'opacity': opacity});
            },
            duration: 600
            });


          }).catch(function (error) {
            // Error; SMS not sent
            // ...
            // alert('n');
            unblockui('#modalLogin .modal-body'); 
          });

      }else{
        $('#alert-insertnomor').css('color','red');
      }
      

    });

    $('#sign-in-button2').click(function(){
      var bc = $(this);
      var phoneNumber = '+62'+$('#phoneNumber2').val();
      $('.nomor-terpakai').html(phoneNumber);
      if( phoneNumber != '+62' && $('#phoneNumber2').val() != null)
      {
        blockui('#modalRegister .modal-body');
        var appVerifier = window.recaptchaVerifier;
          firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
          .then(function (confirmationResult) {
            unblockui('#modalRegister .modal-body');
            // SMS sent. Prompt user to type the code from the message, then sign the
            // user in with confirmationResult.confirm(code).
            window.confirmationResult = confirmationResult;
            current_fs = bc.parent();
            nextnext_fs = bc.parent().next();

            //show the next fieldset
            nextnext_fs.show();
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
            step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;

            current_fs.css({
            'display': 'none',
            'position': 'relative'
            });
            nextnext_fs.css({'opacity': opacity});
            },
            duration: 600
            });


          }).catch(function (error) {
            // Error; SMS not sent
            // ...
            // alert('n');
            unblockui('#modalRegister .modal-body'); 
          });

      }else{
        $('#alert-insertnomor2').css('color','red');
      }
      

    });


    $('#verify-code-button').click(function(){
        var _code =  $("input[name='code[]']").map(function(){return $(this).val();}).get();


        var code = "";
        $.each(_code,function(i,v){
            code=code+v;
        });
        console.log(code);
        blockui('#modalLogin .modal-body');

        confirmationResult.confirm(code).then(function (result) {
          // User signed in successfully.
        unblockui('#modalLogin .modal-body');
        var user = result.user;
        var uid = user.uid;
        var email = user.email;
        var photoURL = user.photoURL;
        var phoneNumber = user.phoneNumber;
        var isAnonymous = user.isAnonymous;
        var displayName = user.displayName;
        var providerData = user.providerData;
        var emailVerified = user.emailVerified;

        $("input[name='uid']").val(uid);
        $("input[name='nomor_hp']").val(phoneNumber);
        $('form#form_lanjutan').submit();
        console.log(user);
          // ...
        }).catch(function (error) {
          // User couldn't sign in (bad verification code?)
          // ..
          unblockui('#modalLogin .modal-body');
          console.log(error);
        });
    });

    $('#verify-code-button2').click(function(){
        var _code =  $("input[name='code[]']").map(function(){return $(this).val();}).get();


        var code = "";
        $.each(_code,function(i,v){
            code=code+v;
        });
        console.log(code);
        blockui('#modalRegister .modal-body');

        confirmationResult.confirm(code).then(function (result) {
          // User signed in successfully.
        unblockui('#modalRegister .modal-body');
        var user = result.user;
        var uid = user.uid;
        var email = user.email;
        var photoURL = user.photoURL;
        var phoneNumber = user.phoneNumber;
        var isAnonymous = user.isAnonymous;
        var displayName = user.displayName;
        var providerData = user.providerData;
        var emailVerified = user.emailVerified;

        $("input[name='uid']").val(uid);
        $("input[name='nomor_hp']").val(phoneNumber);
        $('form#form_lanjutan').submit();
        console.log(user);
          // ...
        }).catch(function (error) {
          // User couldn't sign in (bad verification code?)
          // ..
          unblockui('#modalRegister .modal-body');
          console.log(error);
        });
    });

});

</script>

<script>
    function showFrontendAlert(type, message){
        if(type == 'danger'){
            type = 'error';
        }
        swal({
            position: 'top-end',
            type: type,
            title: message,
            showConfirmButton: false,
            timer: 3000
        });
    }
</script>

@foreach (session('flash_notification', collect())->toArray() as $message)
    <script>
        showFrontendAlert('{{ $message['level'] }}', '{{ $message['message'] }}');
    </script>
@endforeach

<script src="{{ asset('frontend/js/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('frontend/js/jodit.min.js') }}"></script>
<script src="{{ asset('frontend/js/xzoom.min.js') }}"></script>
<script src="{{ asset('frontend/js/fb-script.js') }}"></script>
<script src="{{ asset('frontend/js/lazysizes.min.js') }}"></script>
<script src="{{ asset('frontend/js/intlTelInput.min.js') }}"></script>

<!-- App JS -->

<script src="{{ asset('frontend/js/active-shop.js') }}"></script>
<script src="{{ asset('frontend/js/clipboard.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script src="{{ asset('frontend/js/bootstrap-input-spinner.js') }}" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4'
    });
        
    $('#datepicker1').datepicker({
        uiLibrary: 'bootstrap4'
    });
    $('#datepicker2').datepicker({
         uiLibrary: 'bootstrap4'
    });
   
    
});
</script>

<!-- dropify -->
<script src="{{ asset('plugins/dropify/dist/js/dropify.min.js') }}"></script>

<script>
$("#thumb").dropify({
    messages: {
        'default': 'Letakkan thumbnail post disini',
        'replace': 'Klik disini untuk merubah gambar',
        'remove':  'Hapus',
        'error':   'Ooops, ada kesalahan.'
    },
    error: {
        'fileSize': 'Ukuran file terlalu besar, maksimal  485kb .',
        'imageFormat': 'File harus berformat gambar ( jpg jpeg png ).',
        'minWidth': 'Lebar gambar minimal 200px',
        'minHeight': 'Tinggi gambar minimal 200px'
    }
});

</script>

<script src="{{ asset('frontend/js/main.js') }}"></script>

<script>
    var updatecart = true;
    
    // When the user scrolls the page, execute myFunction
    // window.onscroll = function() {myFunction()};

    // // Get the header
    // var header = document.getElementById("myHeader");

    // // Get the offset position of the navbar
    // // var sticky = header.offsetTop;

    // // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
    // function myFunction() {
    // if (window.pageYOffset > sticky) {
    //     header.classList.add("sticky");
    // } else {
    //     header.classList.remove("sticky");
    // }
    // }

    

    function initGlobalRate(){
        // $('.rating-product').each(function(i, item) {
        //     $(item).jsRapStar({
        //         star:"♥",
        //         starHeight:30,
        //         length:5,
        //         step:true,
        //         value:$(item).data('value'),
        //         enabled:false,
        //         colorFront:'#F3795C',
        //         colorBack:'#FBD2CD',
        //     });
        // });
        $('.rating-product').rating();
    }

    $(document).ready(function() {
        
        initGlobalRate();
        $('.category-nav-element').each(function(i, el) {
            $(el).on('mouseover', function(){
                if(!$(el).find('.sub-cat-menu').hasClass('loaded')){
                    $.post('{{ route('category.elements') }}', {_token: '{{ csrf_token()}}', id:$(el).data('id')}, function(data){
                        $(el).find('.sub-cat-menu').addClass('loaded').html(data);
                    });
                }
            });
        });
        if ($('#lang-change').length > 0) {
            $('#lang-change .dropdown-item a').each(function() {
                $(this).on('click', function(e){
                    e.preventDefault();
                    var $this = $(this);
                    var locale = $this.data('flag');
                    $.post('{{ route('language.change') }}',{_token:'{{ csrf_token() }}', locale:locale}, function(data){
                        location.reload();
                    });

                });
            });
        }

        if ($('#currency-change').length > 0) {
            $('#currency-change .dropdown-item a').each(function() {
                $(this).on('click', function(e){
                    e.preventDefault();
                    var $this = $(this);
                    var currency_code = $this.data('currency');
                    $.post('{{ route('currency.change') }}',{_token:'{{ csrf_token() }}', currency_code:currency_code}, function(data){
                        location.reload();
                    });

                });
            });
        }
    });

    function rekom() {
            $.get("{{route('produk.rekom')}}", function (data) {
                $("#cartprodukrekom").html(data)
            })
        }


    $('#search').on('keyup', function(){
        search();
    });

    $('#search').on('focus', function(){
        search();
    });



    function search(){
        var search = $('#search').val();
        if(search.length > 0){
            $('body').addClass("typed-search-box-shown");

            $('.typed-search-box').removeClass('d-none');
            $('.search-preloader').removeClass('d-none');
            $.post('{{ route('search.ajax') }}', { _token: '{{ @csrf_token() }}', search:search}, function(data){
                if(data == '0'){
                    // $('.typed-search-box').addClass('d-none');
                    $('#search-content').html(null);
                    $('.typed-search-box .search-nothing').removeClass('d-none').html('Sorry, nothing found for <strong>"'+search+'"</strong>');
                    $('.search-preloader').addClass('d-none');

                }
                else{
                    $('.typed-search-box .search-nothing').addClass('d-none').html(null);
                    $('#search-content').html(data);
                    $('.search-preloader').addClass('d-none');
                }
            });
        }
        else {
            $('.typed-search-box').addClass('d-none');
            $('body').removeClass("typed-search-box-shown");
        }
    }

    function updateNavCart(){
        $.post('{{ route('cart.nav_cart') }}', {_token:'{{ csrf_token() }}'}, function(data){
            $('#cart_items').html(data);
        });
    }
    
    function addProductPointToCard(key){
        $.post('{{ route('cart.addProductPointToCard') }}', {_token:'{{ csrf_token() }}',product_id:key}, function(data){
            $('#cart-summary').html(data);
           
        });
    }
    function addSample(key){
        $.post('{{ route('cart.addSample') }}', {_token:'{{ csrf_token() }}',sample_id:key}, function(data){
            $('#cart-summary').html(data);
            rekom()
        });
    }

 function updateQuantity(key, element){
        if(updatecart)
        {   
            updatecart = false;
            $.post('{{ route('cart.updateQuantity') }}', { _token:'{{ csrf_token() }}', key:key, quantity: element.value}, function(data){
                updatecart = true;
                updateNavCart();
                $('#dropdown_cart').html(data.detail_dropdown);
                $('#cart-summary').html(data.detail);
                $('#cart_items_sidenav').html(data.total_cart);

            });    
        }
        
    }

    function removeFromCart(key){
        $.post('{{ route('cart.removeFromCart') }}', {_token:'{{ csrf_token() }}', key:key}, function(data){
            updateNavCart();
            // $('#cart-summary').html(data);
            $('#dropdown_cart').html(data.detail_dropdown);
            $('#cart-summary').html(data.detail);
            
            showFrontendAlert('success', 'Item has been removed from cart');
            $('#cart_items_sidenav').html(data.total_cart);
            
        });
    }

    function removeFromCartView(e, key){
        e.preventDefault();
        removeFromCart(key);
    }

    function modalHapus(key){
        $('#modalHapus').modal('toggle');
        $('#btn-hapus-barang').click(function(){
            $('#modalHapus').modal('toggle');
            removeFromCart(key);
        });
    }

    function addToCompare(id){
        $.post('{{ route('compare.addToCompare') }}', {_token:'{{ csrf_token() }}', id:id}, function(data){
            $('#compare').html(data);
            showFrontendAlert('success', 'Item has been added to compare list');
            $('#compare_items_sidenav').html(parseInt($('#compare_items_sidenav').html())+1);
        });
    }

    function addToWishList(id){
        @if (Auth::check() && (Auth::user()->user_type == 'customer' || Auth::user()->user_type == 'seller'))
            $.post('{{ route('wishlists.store') }}', {_token:'{{ csrf_token() }}', id:id}, function(data){
                if(data != 0){
                    $('#wishlist').html(data);
                    // showFrontendAlert('success', 'Item has been added to wishlist');
                    location.reload();
                }
                else{
                    showFrontendAlert('warning', 'Please login first');
                }
            });
        @else
            showFrontendAlert('warning', 'Please login first');
        @endif
    }

    function removeFromWishList(id) {
        $.post(`{{ route('wishlists.remove') }}`, {
                _token: '{{ csrf_token() }}',
                id: id
            },
            function(data) {
                location.reload()
            })
    }

    function showAddToCartModal(id) {
        if (!$('#modal-size').hasClass('modal-lg')) {
            $('#modal-size').addClass('modal-lg');
        }
        $('#addToCart-modal-body').html(null);
        $('#addToCart').modal();
        $('.c-preloader').show();
        
        let data = {
            _token:'{{csrf_token()}}',
            id: id
        }
        if (window.location.href=="{{route('cart')}}" || window.location.href=="{{route('cart')}}"+"#") {
            data = {
            _token:'{{csrf_token()}}',
            id: id,
            sm:'Gratis'
        }
        }
        $.post('{{ route("cart.showCartModal") }}', data,
            function(d) {
                $('.c-preloader').hide();
                $('#addToCart-modal-body').html(d);
                $('.xzoom, .xzoom-gallery').xzoom({
                    Xoffset: 20,
                    bg: true,
                    tint: '#000',
                    defaultScale: -1
                });
                getVariantPrice();
            });
        }

    function showAddToBagModal(id) {
        $('#addToBag-modal-body').html(null);
        $('#addToBag').modal();
        $('.c-preloader').show();
        $.post('{{ route("cart.showBagModal") }}', {
                _token: '{{ csrf_token() }}',
                id: id
            },
            function(data) {
                $('.c-preloader').hide();
                $('#addToBag-modal-body').html(data);
                $('.xzoom, .xzoom-gallery').xzoom({
                    Xoffset: 20,
                    bg: true,
                    tint: '#000',
                    defaultScale: -1
                });
                getVariantPrice();
            });
    }

    function showCouponModal(id) {
        $('#addCoupon-modal-body').html(null);
        $('#addCoupon').modal();
        $('.c-preloader').show();
        $.post('{{ route("cart.showCouponModal") }}', {
            _token: '{{ csrf_token() }}',
            id: id
        },
        function(data) {
            $('.c-preloader').hide();
            $('#addCoupon-modal-body').html(data);
            $('.copy-code').click(function(){
                $(this).find("span").text("COPIED!");
                $(this).find("i").hide(); 
            });
        });
    }

    $('#option-choice-form input').on('change', function(){
        getVariantPrice();
    });

    $('#option-choice-form input').on('change', function(){
        getVariantPrice();
    });

    function getVariantPrice() {
        if ($('#option-choice-form input[name=quantity]').val() > 0 && checkAddToCartValidity()) {
            $.ajax({
                type: "POST",
                url: '{{ route("products.variant_price") }}',
                data: $('#option-choice-form').serializeArray(),
                success: function(data) {
                    $('#option-choice-form #chosen_price_div').removeClass('d-none');
                    $('#option-choice-form #chosen_price_div #chosen_price').html(data.price);
                    $('#available-quantity').html(data.quantity);
                    $('.input-number').prop('max', data.quantity);
                    //console.log(data.quantity);
                    if (parseInt(data.quantity) < 1 && data.digital != 1) {
                        $('.buy-now').hide();
                        $('.add-to-cart').hide();
                    } else {
                        $('.buy-now').show();
                        $('.add-to-cart').show();
                    }
                }
            });
        }
    }

    function checkAddToCartValidity() {
        var names = {};
        $('#option-choice-form input:radio').each(function() { // find unique names
            names[$(this).attr('name')] = true;
        });
        var count = 0;
        $.each(names, function() { // then count them
            count++;
        });
        if ($('#option-choice-form input:radio:checked').length == count) {
            return true;
        }
        return false;
    }

    function addToCart(id) {
        if (checkAddToCartValidity()) {
            $('#addToCart').modal();
            $('.c-preloader').show();
            let dataProduk = {
                id:id,
                _token:"{{csrf_token()}}"

            }
            $.ajax({
                type: "POST",
                url: '{{ route("cart.addToCart") }}',
                data: dataProduk,
                success: function(data) {
                    $('#addToCart-modal-body').html(null);
                    $('.c-preloader').hide();
                    $('#modal-size').removeClass('modal-lg');
                    $('#addToCart-modal-body').html(data.dataview);
                    $('#dropdown_cart').html(data.detail_dropdown);
                    updateNavCart();
                    $('#cart_items_sidenav').html(data.total_cart);
                }
            });
        } else {
            showFrontendAlert('warning', 'Please choose all the options');
        }
    }

    function addToBag(id,vw=null) {
        if (checkAddToCartValidity()) {
            // $('#addToBag').modal();
            // $('.c-preloader').show();
            if (vw!="vw") {
                $('#addToBag').modal();
                $('.c-preloader').show();
                
            }
            let dataProduk = {
                id:id,
                _token:"{{csrf_token()}}"
            }
            // console.log(dataProduk);
            $.ajax({
                type: "POST",
                url: '{{ route("cart.addToCart") }}',
                data: dataProduk,
                success: function(data) {
                    $('#addToBag-modal-body').html(null);
                    $('.c-preloader').hide();
                    $('#addToBag-modal-body').html(data.dataview);
                    $('#dropdown_cart').html(data.detail_dropdown);
                    cartQuantityInitialize();
                    updateNavCart();
                    // $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html()) + 1);
                     $('#cart_items_sidenav').html(data.total_cart);
                }
            });
        } else {
            showFrontendAlert('warning', 'Please choose all the options');
        }
    }

    function buyNow(){
        if(checkAddToCartValidity()) {
            $('#addToCart').modal();
            $('.c-preloader').show();
            $.ajax({
               type:"POST",
               url: '{{ route("cart.addToCart") }}',
               data: $('#option-choice-form').serializeArray(),
               success: function(data){
                   $('#addToCart-modal-body').html(null);
                    $('.c-preloader').hide();
                    $('#modal-size').removeClass('modal-lg');
                    $('#addToCart-modal-body').html(data.dataview);
                    $('#dropdown_cart').html(data.detail_dropdown);
                    updateNavCart();
                    $('#cart_items_sidenav').html(data.total_cart);
               }
           });
        }
        else{
            showFrontendAlert('warning', 'Please choose all the options');
        }
    }

    function show_purchase_history_details(order_id)
    {
        $('#order-details-modal-body').html(null);

        if(!$('#modal-size').hasClass('modal-lg')){
            $('#modal-size').addClass('modal-lg');
        }

        $.post('{{ route('purchase_history.details') }}', { _token : '{{ @csrf_token() }}', order_id : order_id}, function(data){
            $('#order-details-modal-body').html(data);
            $('#order_details').modal();
            $('.c-preloader').hide();
        });
    }

    function show_order_details(order_id)
    {
        $('#order-details-modal-body').html(null);

        if(!$('#modal-size').hasClass('modal-lg')){
            $('#modal-size').addClass('modal-lg');
        }

        $.post('{{ route('orders.details') }}', { _token : '{{ @csrf_token() }}', order_id : order_id}, function(data){
            $('#order-details-modal-body').html(data);
            $('#order_details').modal();
            $('.c-preloader').hide();
        });
    }

    function cartQuantityInitialize(){
        $('.btn-number').click(function(e) {
            e.preventDefault();

            fieldName = $(this).attr('data-field');
            type = $(this).attr('data-type');
            var input = $("input[name='" + fieldName + "']");
            var currentVal = parseInt(input.val());

            if (!isNaN(currentVal)) {
                if (type == 'minus') {

                    if (currentVal > input.attr('min')) {
                        input.val(currentVal - 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('min')) {
                        $(this).attr('disabled', true);
                    }

                } else if (type == 'plus') {

                    if (currentVal < input.attr('max')) {
                        input.val(currentVal + 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('max')) {
                        $(this).attr('disabled', true);
                    }

                }
            } else {
                input.val(0);
            }
        });

        $('.input-number').focusin(function() {
            $(this).data('oldValue', $(this).val());
        });

        $('.input-number').change(function() {

            minValue = parseInt($(this).attr('min'));
            maxValue = parseInt($(this).attr('max'));
            valueCurrent = parseInt($(this).val());

            name = $(this).attr('name');
            if (valueCurrent >= minValue) {
                $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                alert('Sorry, the minimum value was reached');
                $(this).val($(this).data('oldValue'));
            }
            if (valueCurrent <= maxValue) {
                $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                alert('Sorry, the maximum value was reached');
                $(this).val($(this).data('oldValue'));
            }


        });
        $(".input-number").keydown(function(e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                // Allow: Ctrl+A
                (e.keyCode == 65 && e.ctrlKey === true) ||
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });

        $(".sample-btn").click(function(){
            if($('.sample-container').css('display') == 'none')
            {
                $(".sample-container").show(300);
                $(".sample-area").css({"background-color": "#F3795C", "color": "white"});
                $(".sample-arrow").css({"transform": "rotate(180deg)", "color": "white"});
            }
            else {
                $(".sample-container").hide(300);
                $(".sample-area").css({"background-color": "#FCF8F0", "color": "black"});
                $(".sample-arrow").css({"transform": "rotate(0deg)", "color": "#F3795C"});
            }

            if($('.tukarpoin-container').css('display') == 'block'){
                $(".tukarpoin-container").hide(300);
                $(".tukarpoin-area").css({"background-color": "#FCF8F0", "color": "black"});
                $(".tukarpoin-link").css({"color": "black"});
                $(".tukarpoin-arrow").css({"transform": "rotate(0deg)", "color": "#F3795C"});
            }
        });

        $(".tukarpoin-btn").click(function(){
            if($('.tukarpoin-container').css('display') == 'none')
            {
                $(".tukarpoin-container").show(300);
                $(".tukarpoin-area").css({"background-color": "#F3795C", "color": "white"});
                $(".tukarpoin-link").css({"color": "white"});
                $(".tukarpoin-arrow").css({"transform": "rotate(180deg)", "color": "white"});
            }
            else {
                $(".tukarpoin-container").hide(300);
                $(".tukarpoin-area").css({"background-color": "#FCF8F0", "color": "black"});
                $(".tukarpoin-link").css({"color": "black"});
                $(".tukarpoin-arrow").css({"transform": "rotate(0deg)", "color": "#F3795C"});
            }
            if($('.sample-container').css('display') == 'block'){
                $(".sample-container").hide(300);
                $(".sample-area").css({"background-color": "#FCF8F0", "color": "black"});
                $(".sample-arrow").css({"transform": "rotate(0deg)", "color": "#F3795C"});
            }
        });

    }

     function imageInputInitialize(){


         $('.custom-input-file').each(function() {
             var $input = $(this),
                 $label = $input.next('label'),
                 labelVal = $label.html();

             $input.on('change', function(e) {
                 var fileName = '';

                 if (this.files && this.files.length > 1)
                     fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
                 else if (e.target.value)
                     fileName = e.target.value.split('\\').pop();

                 if (fileName)
                     $label.find('span').html(fileName);
                 else
                     $label.html(labelVal);
             });

             // Firefox bug fix
             $input
                 .on('focus', function() {
                     $input.addClass('has-focus');
                 })
                 .on('blur', function() {
                     $input.removeClass('has-focus');
                 });
         });
     }



    function View(e, key){
        e.preventDefault();
        modalHapus(key);
    }




</script>
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script type="text/javascript">
    function iniReview()
    {
        $('.heart-input').jsRapStar({
            star:'♥',
            starHeight:43,
            step:true,
            length:5,
            colorFront:'#F3795C',
            colorBack:'#FBD2CD',
            onClick:function(score){
                var type = $(this).data('type');
                if(type == 'kemasan'){
                    $("input[name='rate_kemasan']").val(score);
                }else if(type == 'keggunaan'){
                    $("input[name='rate_keggunaan']").val(score);
                }else if(type == 'efektif'){
                    $("input[name='rate_efektif']").val(score);
                }else if(type == 'harga'){
                    $("input[name='rate_harga']").val(score);
                }
            },
        });


        $("#upload-photo").spartanMultiImagePicker({
            fieldName:        'photos[]',
            maxCount:         10,
            rowHeight:        '200px',
            groupClassName:   'col-md-4 col-sm-4 col-xs-6',
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

    }

    function initFromDetailCard()
    {
        $('.form-ajax').ajaxForm({
            beforeSubmit: function(){

            },
            success: function(data){
              $('#addToCart-modal-body').html(null);
                $('.c-preloader').hide();
                $('#modal-size').removeClass('modal-lg');
                $('#addToCart-modal-body').html(data.dataview);
                $('#dropdown_cart').html(data.detail_dropdown);
                updateNavCart();
                $('#cart_items_sidenav').html(data.total_cart);
            },
            error: function(X){
                console.log(X);
                showFrontendAlert('warning', 'Please choose all the options');
            },
            resetForm: true ,
            clearForm: true
        });
    }

    function showReviewModalOrder(id,order_detail_id) {
        $('#reviw-modal-body').html(null);
        $('#modalReview').modal();
        $('.c-preloader').show();
        $.post('{{ route("reviews.show") }}', {
                _token: '{{ csrf_token() }}',
                id: id,
                orderDetail: order_detail_id
            },
            function(data) {
                $('.c-preloader').hide();
                $('#review-modal-body').html(data);
                iniReview();
            });
    }

    function showReviewModalSample(id,order_sample_id) {
        $('#reviw-modal-body').html(null);
        $('#modalReview').modal();
        $('.c-preloader').show();
        $.post('{{ route("reviews.show") }}', {
                _token: '{{ csrf_token() }}',
                id: id,
                orderDetailSample: order_sample_id
            },
            function(data) {
                $('.c-preloader').hide();
                $('#review-modal-body').html(data);
                iniReview();
            });
    }

    function showReviewModalProductPoin(id,order_poin_id) {
        $('#reviw-modal-body').html(null);
        $('#modalReview').modal();
        $('.c-preloader').show();
        $.post('{{ route("reviews.show") }}', {
                _token: '{{ csrf_token() }}',
                id: id,
                orderDetailPoin: order_poin_id
            },
            function(data) {
                $('.c-preloader').hide();
                $('#review-modal-body').html(data);
                iniReview();
            });
    }

    function showReviewModal(id) {
        $('#reviw-modal-body').html(null);
        $('#modalReview').modal();
        $('.c-preloader').show();
        $.post('{{ route("reviews.show") }}', {
                _token: '{{ csrf_token() }}',
                id: id
            },
            function(data) {
                $('.c-preloader').hide();
                $('#review-modal-body').html(data);
                iniReview();
            });
    }
   

</script>
<script src="{{ asset('agora/AgoraRTCSDK-3.2.1.js') }}"></script>
<script type="text/javascript">
/**
 * Agora Broadcast Client 
 */

var agoraAppId = 'b7e7f048f52b460ca825bb6901399a5e'; // set app id
var channelName = 'broadcast'; // set channel name

// create client 
var client = AgoraRTC.createClient({mode: 'live', codec: 'vp8'}); // vp8 to work across mobile devices

// set log level:
// -- .DEBUG for dev 
// -- .NONE for prod
AgoraRTC.Logger.setLogLevel(AgoraRTC.Logger.DEBUG); 
$( document ).ready( function() {
  // Due to broswer restrictions on auto-playing video, 
  // user must click to init and join channel
    console.log("user clicked to watch broadcast")
    // init Agora SDK
    client.init(agoraAppId, function () {
      $("#watch-live-overlay").remove();
      console.log('AgoraRTC client initialized');
      joinChannel(); // join channel upon successfull init
    }, function (err) {
      console.log('[ERROR] : AgoraRTC client init failed', err);
    });
});

client.on('stream-published', function (evt) {
  console.log('Publish local stream successfully');
});

// connect remote streams
client.on('stream-added', function (evt) {
  var stream = evt.stream;
  var streamId = stream.getId();
  console.log('New stream added: ' + streamId);
  console.log('Subscribing to remote stream:' + streamId);
  // Subscribe to the stream.
  client.subscribe(stream, function (err) {
    console.log('[ERROR] : subscribe stream failed', err);
  });
});

client.on('stream-removed', function (evt) {
  var stream = evt.stream;
  stream.stop(); // stop the stream
  stream.close(); // clean up and close the camera stream
  console.log("Remote stream is removed " + stream.getId());
});

client.on('stream-subscribed', function (evt) {
  var remoteStream = evt.stream;
  var remoteId =  remoteStream.getId();
  // remoteStream.play('full-screen-video');

  console.log('Successfully subscribed to remote stream: ' + remoteId);
  if( $('#full-screen-video').is(':empty') ) { 
    mainStreamId = remoteId;
    remoteStream.play('full-screen-video');
  } else {
    addRemoteStreamMiniView(remoteStream);
  }
  var idcss = "#video"+remoteId;
  $(idcss).css("position", "");
});

// remove the remote-container when a user leaves the channel
client.on('peer-leave', function(evt) {
  console.log('Remote stream has left the channel: ' + evt.uid);
  evt.stream.stop(); // stop the stream
});

// show mute icon whenever a remote has muted their mic
client.on('mute-audio', function (evt) {
  var remoteId = evt.uid;
});

client.on('unmute-audio', function (evt) {
  var remoteId = evt.uid;
});

// show user icon whenever a remote has disabled their video
client.on('mute-video', function (evt) {
  var remoteId = evt.uid;
});

client.on('unmute-video', function (evt) {
  var remoteId = evt.uid;
});

// ingested live stream 
client.on('streamInjectedStatus', function (evt) {
  console.log("Injected Steram Status Updated");
  // evt.stream.play('full-screen-video');
  console.log(JSON.stringify(evt));
}); 

// join a channel
function joinChannel() {
  var token = generateToken();

  // set the role
  client.setClientRole('audience', function() {
    console.log('Client role set to audience');
  }, function(e) {
    console.log('setClientRole failed', e);
  });
  
  client.join(token, channelName, 0, function(uid) {
      console.log('User ' + uid + ' join channel successfully');
  }, function(err) {
      console.log('[ERROR] : join channel failed', err);
  });
}

function leaveChannel() {
  client.leave(function() {
    console.log('client leaves channel');
  }, function(err) {
    console.log('client leave failed ', err); //error handling
  });
}

// use tokens for added security
function generateToken() {
  return null; // TODO: add a token generation
}


// REMOTE STREAMS UI
function addRemoteStreamMiniView(remoteStream){
  var streamId = remoteStream.getId();
  // append the remote stream template to #remote-streams
  $('#external-broadcasts-container').append(
    $('<div/>', {'id': streamId + '_container',  'class': 'remote-stream-container col'}).append(
      $('<div/>', {'id': streamId + '_mute', 'class': 'mute-overlay'}).append(
          $('<i/>', {'class': 'fas fa-microphone-slash'})
      ),
      $('<div/>', {'id': streamId + '_no-video', 'class': 'no-video-overlay text-center'}).append(
        $('<i/>', {'class': 'fas fa-user'})
      ),
      $('<div/>', {'id': 'agora_remote_' + streamId, 'class': 'remote-video'})
    )
  );
  remoteStream.play('agora_remote_' + streamId); 

  var containerId = '#' + streamId + '_container';
  $(containerId).dblclick(function() {
    client.removeInjectStreamUrl(injectedStreamURL);
    $(containerId).remove();
  });
}

</script>


    

@yield('script')

</body>
</html>
