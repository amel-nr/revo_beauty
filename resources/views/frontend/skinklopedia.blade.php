@extends('frontend.layouts.app')

@section('style')

    <style>
        #skinklopedia-pagination
            {
                display: table;
                margin: 0 auto;
                overflow: hidden;
                z-index:1;
                vertical-align: middle;
            }

        .skinklopedia
            {
                width: 10px;
                height: 10px;
                float: left;
                margin-right: 10px;
                background-color: #f3795c;
                border-radius: 10px;
                cursor: pointer;
                transition: 0.3s ease width;
            }

        .skinklopedia:last-child
            {
                margin-right: 0;
            }

        .skinklopedia.skinklopedia-active
            {
                width: 60px;
                cursor: auto;
            }
        
        .skinklopedia-list{
            color: #f3795c;
        }
    </style>

@endsection

@section('content')

    <div class="pt-5 pb-4" style="background-color: #FACAC3;">
        <div class="row py-5">
            <div class="col-4 mx-auto text-center">
                <img src="{{ asset('frontend/images/skinklopedia.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                <p style="font-size: 18px; font-weight: 700;">Seputar masalah kulit dan kandungan skincare yang kamu butuhkan ada di sini</p>
            </div>
        </div>
        <div class="row">
            <div class="col-4 mx-auto">
                <!-- <form id="search-form" class="form-inline" role="form" action="#" method="GET"> -->
                    <div class="input-group mx-auto">
                        <input type="text" aria-label="" id="keyword" name="" class="form-control search-form" style="border-radius: 30px 0px 0px 30px; width: 250px; border-right: 1px solid white;" placeholder="Cari">
                        <span class="input-group-btn">
                            <button type="submit" style="border-radius: 0px 30px 30px 0px; cursor:pointer; background-color: white; border-color: #ddd; margin-left: -2px; border-left: 1px solid white;" class="btn btn-primary search-btn"><i class="fa fa-search" style="color: #F3795C;"></i>
                            </button>
                        </span>
                    </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
    <div style="background-color: #fcf8F0;">
        <div class="row pt-3">
            <div class="col-1"></div>
            <div class="col-10 text-center" style="font-weight: bold; font-size: 22px; color: black;">
                <div class="d-inline p-4"><a href="#" style="color: black;" class="skinklopedia-list">A</a></div>
                <div class="d-inline p-4"><a href="#" style="color: black;" class="skinklopedia-list">B</a></div>
                <div class="d-inline p-4"><a href="#" style="color: black;" class="skinklopedia-list">C</a></div>
                <div class="d-inline p-4"><a href="#" style="color: black;" class="skinklopedia-list">D</a></div>
                <div class="d-inline p-4"><a href="#" style="color: black;" class="skinklopedia-list">E</a></div>
                <div class="d-inline p-4"><a href="#" style="color: black;" class="skinklopedia-list">F</a></div>
                <div class="d-inline p-4"><a href="#" style="color: black;" class="skinklopedia-list">G</a></div>
                <div class="d-inline p-4"><a href="#" style="color: black;" class="skinklopedia-list">H</a></div>
                <div class="d-inline p-4"><a href="#" style="color: black;" class="skinklopedia-list">I</a></div>
                <div class="d-inline p-4"><a href="#" style="color: black;" class="skinklopedia-list">J</a></div>
                <div class="d-inline p-4"><a href="#" style="color: black;" class="skinklopedia-list">K</a></div>
                <div class="d-inline p-4"><a href="#" style="color: black;" class="skinklopedia-list">L</a></div>
                <div class="d-inline p-4"><a href="#" style="color: black;" class="skinklopedia-list">M</a></div> 
            </div>
            <div class="col-1"></div>
        </div>
        <div class="row pt-2">
            <div class="col-1"></div>
            <div class="col-10 text-center" style="font-weight: bold; font-size: 22px;">
                <div class="d-inline p-4"><a href="#" style="color: black;" class="skinklopedia-list">N</a></div>
                <div class="d-inline p-4"><a href="#" style="color: black;" class="skinklopedia-list">O</a></div>
                <div class="d-inline p-4"><a href="#" style="color: black;" class="skinklopedia-list">P</a></div>
                <div class="d-inline p-4"><a href="#" style="color: black;" class="skinklopedia-list">Q</a></div>
                <div class="d-inline p-4"><a href="#" style="color: black;" class="skinklopedia-list">R</a></div>
                <div class="d-inline p-4"><a href="#" style="color: black;" class="skinklopedia-list">S</a></div>
                <div class="d-inline p-4"><a href="#" style="color: black;" class="skinklopedia-list">T</a></div>
                <div class="d-inline p-4"><a href="#" style="color: black;" class="skinklopedia-list">U</a></div>
                <div class="d-inline p-4"><a href="#" style="color: black;" class="skinklopedia-list">V</a></div>
                <div class="d-inline p-4"><a href="#" style="color: black;" class="skinklopedia-list">W</a></div>
                <div class="d-inline p-4"><a href="#" style="color: black;" class="skinklopedia-list">X</a></div>
                <div class="d-inline p-4"><a href="#" style="color: black;" class="skinklopedia-list">Y</a></div>
                <div class="d-inline p-4"><a href="#" style="color: black;" class="skinklopedia-list">Z</a></div> 
            </div>
            <div class="col-1"></div>
        </div>
        <div id="kontenSkinlopedia">
            @include('/skinlopedia/konten')
        </div>
        <div class="container" style="border-top: 1px solid #f3795c;">
            <div class="my-5 text-center container">
                <div class="row mb-2">
                    <div class="col-3 p-0 mx-auto">
                        <img src="{{ asset('frontend/images/blog/blog.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                    </div>
                </div>
                <div class="row d-flex align-items-center">
                    <div class="col-1 d-flex align-items-center justify-content-center">
                        <a href="#carouselExampleIndicatorsBlog" role="button" data-slide="prev">
                            <div class="carousel-nav-icon">
                                <i class="fa fa-chevron-left" aria-hidden="true" style="font-size: 30px;"></i>
                            </div>
                        </a>
                    </div>
                    <div class="col-10">
                        <!--Start carousel-->
                        <div id="blog-section"></div>
                        <!--End carousel-->
                    </div>
                    <div class="col-1 d-flex align-items-center justify-content-center">
                        <a href="#carouselExampleIndicatorsBlog" role="button" data-slide="next">
                            <div class="carousel-nav-icon">
                                <i class="fa fa-chevron-right" aria-hidden="true" style="font-size: 30px;"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){

            $(document).on('click', '.pagination a', function(event){
            event.preventDefault(); 
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
            // console.log(page)
            });
        
            function fetch_data(page)
            {
                $.ajax({
                    url:"{{route('fetch_sl')}}?page="+page,
                    success:function(data)
                    {
                        $('#kontenSkinlopedia').html(data);
                    }
                });
            }

            $("#keyword").keyup(function (e) {
                // e.preventDefault()
                let keyword = $("#keyword").val()
                if (e.keyCode == 13) {
                    if (keyword=='') {
                        location.reload();
                    }else{
                        $.get("{{route('search.sl', ['keyword' => 'kw'])}}".replace("kw",keyword), function (data) {
                            $("#kontenSkinlopedia").html(data)
                        })
                    }
                        
                }
            })

            $(".skinklopedia-list").click(function (e) {
                e.preventDefault()
                let teks = $(this).text()
                $.get("{{route('filt.sl', ['filt'=>'filter'])}}".replace("filter",teks), function (data) {
                    $("#kontenSkinlopedia").html(data)
                })
            })

            var button = $('.skinklopedia');

            function switchToNext(){
            var _this = $(this);

            if(_this.hasClass('skinklopedia-active'))
            return false;
            else
                $('.skinklopedia.skinklopedia-active').removeClass('skinklopedia-active')
                {
                _this.addClass('skinklopedia-active');
                }
            }
            button.on('click',switchToNext);

            $(".skinklopedia-list").click(function(){
                $(".skinklopedia-list").css("color", "black");
                $(this).css("color", "#f3795c");
            });

            $.get('{{route("blog.section")}}', function (data) {
                $("#blog-section").html(data);
            })
        });
    </script>
@endsection