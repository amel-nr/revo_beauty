
@extends('frontend.layouts.app')

@section('style')
<style>
    @media (min-width: 1200px){
        .modal-lg {
            max-width: 1050px;
        }
    }

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

@section('meta')

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $post->title }}">
    <meta itemprop="description" content="{{ $post->text }}">
    <meta itemprop="image" content="{{ asset($post->thumbnail) }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="Forum Post">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ $post->title }}">
    <meta name="twitter:description" content="{{ $post->text }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ asset($post->thumbnail) }}">
    <meta name="twitter:data1" content="{{ $post->updated_at }}">
    <meta name="twitter:label1" content="Posted at">

    <!-- Open Graph data -->

    <meta property="og:title" content="{{ $post->title }}" />
    <meta property="og:type" content="Forum Post" />
    <meta property="og:url" content="{{ route('forum.detail', $post->id) }}" />
    <meta property="og:image" content="{{ asset($post->thumbnail) }}"/>
    <meta property="og:description" content="{{ $post->text }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />



@endsection

@section('content')
@php
    \App\forumSeenModel::insert(['user_id'=>Auth::check()?Auth::user()->id:0,"post_id"=>$post->id]);
@endphp
<section style="background-color: #FCF8F0;">
    <div class="row py-2" style="background-color: #F3795C;">
        <div class="col-md-5 col-10 mx-auto text-center">
            <div class="row">
                <div class="col-6">
                    <a href="#" id="beranda"><h4 class="mb-0 font-weight-bold" style="color: white;">BERANDA</h4></a>
                </div>
                <div class="col-6">
                    <a href="#r" id="ruang"><h4 class="mb-0 font-weight-bold" style="color: white;">RUANG</h4></a>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="" id="postid" value="{{$post->id}}">
    <input type="hidden" name="" id="roomid" value="{{$post->room_id}}">
    <input type="hidden" name="" id="rt" value="{{$post->room->title}}">
    <div id="forumid" style="display:none;">oke</div>
    <select name="filtered[]" id="filtered" style="display:none;" multiple></select>
    <div  id="konten">
        <div class="container py-4">
            <div class="row mt-5">
                <div class="col-md-9 col-12">
                    <div class="p-4 rounded mb-4" style="border: 1px solid #f3795c;">
                        <p style="margin: 0; font-size: 14px;">Balasan Terbaru di <b>Kulit Berminyak</b></p>
                        <div class="mt-3 mb-2">
                            <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="rounded-circle img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 50px;">
                            <b class="ml-2" style="font-size: 20px;">Phoebe</b>
                            <span class="badge badge-danger" style="background-color: #F3795C;">Dewy Skin</span>
                        </div>
                        <p style="margin: 0; font-size: 14px; color: #6C6D70;">Posted 20-07-2020 10:27 | Diupdate 1 jam yang lalu</p>
                        <h4 class="font-weight-bold width-50">Sunscreen yang bikin muka makin berminyak</h4>
                        <p class="mt-1" style="width: 95%; text-align: justify; font-size: 20px;">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem Ipsum is simply dummy text of the printing and
                            typesetting. Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum is simply dummy text of the
                            printing and typesetting.<br>
                            Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem Ipsum is simply dummy text of the printing and
                            typesetting. Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum is simply dummy text of the
                            printing and typesetting.
                        </p>
                        <div class="mt-5">
                            <i class="fa fa-heart-o" style="color: #f3795c; font-size: 28px; vertical-align: middle;"></i><span class="ml-1" style="font-size: 20px; vertical-align: middle;">52</span>
                            <a href="#modalBalas" data-toggle="modal" data-target="#modalBalas" style="color: #333;"><i class="fa fa-reply ml-3" style="color: #f3795c; font-size: 28px; vertical-align: middle;"></i><span class="ml-1" style="font-size: 20px; vertical-align: middle;">Balas</span></a><span class="ml-3" style="font-size: 20px; vertical-align: middle;"> | &nbsp; 39 Balasan</span>
                            <i class="fa fa-share-square-o" style="color: #f3795c; font-size: 28px; float: right; vertical-align: middle;"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-12 rounded" style="padding: 0; border: 1px solid #f3795c; height: fit-content;">
                    <div style="display: flex; justify-content: space-between; background-color: #f3795c;">
                        <div class="p-3" style="color: white; font-size: 18px;">Topik Terpopuler</div>
                    </div>
                    <div class="p-4">
                        <p style="font-size: 16px;"><i class="fa fa-reply mr-2" style="color: #f3795c;"></i> 0 Balasan</p>
                        <p style="font-size: 16px;"><i class="fa fa-eye mr-2" style="color: #f3795c;"></i> 15 Melihat</p>
                        <p style="font-size: 16px;" class="mb-0"><i class="fa fa-heart-o mr-2" style="color: #f3795c;"></i> 18 Menyukai</p>
                    </div>
                    <div style="display: flex; justify-content: space-between; background-color: #f3795c;">
                        <div class="p-3" style="color: white; font-size: 18px;">Post Terkait</div>
                    </div>
                    <div style="padding: 10px 15px;">
                        <div style="padding: 0 0 10px 0; border-bottom: 1px solid #f3795c;">
                            <p class="mb-0" style="font-size: 16px;"><b>Oily skincare <br>Carla</b><span class="badge badge-danger ml-2" style="background-color: #F3795C; font-size: 8px;">Dewy Skin</span></p>
                            <p style="margin: 0; font-size: 12px; color: #6C6D70;">Dipost 20-07-2020 12.45</p>
                        </div>
                        <div style="padding: 10px 0 0 0;">
                            <p class="mb-0" style="font-size: 16px;"><b>Oily skincare <br>Carla</b><span class="badge badge-danger ml-2" style="background-color: #F3795C; font-size: 8px;">Dewy Skin</span></p>
                            <p style="margin: 0; font-size: 12px; color: #6C6D70;">Dipost 20-07-2020</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mypreloader" style="display:none;"></div>
</section>
            
@endsection

@section('script')
@include('frontend.partials.forumjs')
<script>
$(document).ready(function () {
    let id = $("#postid").val()
    let rid = $("#roomid").val()
    let rt = $("#rt").val()
    getPost(id,rid,rt)
})


</script>
@endsection