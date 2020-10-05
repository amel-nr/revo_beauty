<div id="carouselExampleIndicatorsBlog" class="carousel slide product-slider" data-ride="carousel">
    <div class="carousel-inner">
    @foreach($sectBlog as $key => $blog)
        <div class="carousel-item{{ $key == 0 ? ' active' : '' }}">
            <div class="row">
                    @foreach($blog as $k => $b)
                <div class="col-4 align-items-center justify-content-center" style="border-right: 1px solid #F3795C;">
                    <p class="text-left">{{$b['category']["title"]}}</p>
                    <div class="content-blog">
                        <img src="{{ asset('blog/thumbnail/').'/'.$b['thumbnail'] }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                        <div class="blog-hover">
                            <div class="p-blog">
                                <a href="{{ route('artikel',[ 'id'=> $b['id'] ]) }}" class="text-white">CLICK ME</a>
                            </div>
                        </div>
                    </div> 
                    <p class="heading-5 text-left" style="font-weight: 700; margin-top: 10px;">{{$b['title']}}</p>
                    <!-- <p class="text-left">{!! \Illuminate\Support\Str::limit($b['content'], 150, $end='...') !!}</p> -->
                </div>
                    @endforeach
            </div>
        </div>
    @endforeach                          
    </div>
</div>

<div id="carouselExampleIndicatorsBlogMobile" class="carousel slide product-slider-mobile" data-ride="carousel">
    <div class="carousel-inner">
    @foreach($sectBlogMobile as $key => $blog)
        <div class="carousel-item{{ $key == 0 ? ' active' : '' }}">
            <div class="row">
                    @foreach($blog as $k => $b)
                <div class="col-12 align-items-center justify-content-center">
                    <p class="text-left">{{$b['category']["title"]}}</p>
                    <div class="content-blog">
                        <img src="{{ asset('blog/thumbnail/').'/'.$b['thumbnail'] }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                        <div class="blog-hover">
                            <div class="p-blog">
                                <a href="{{ route('artikel',[ 'id'=> $b['id'] ]) }}" class="text-white">CLICK ME</a>
                            </div>
                        </div>
                    </div> 
                    <p class="heading-5 text-left" style="font-weight: 700; margin-top: 10px;">{{$b['title']}}</p>
                    <!-- <p class="text-left">{!! \Illuminate\Support\Str::limit($b['content'], 150, $end='...') !!}</p> -->
                </div>
                    @endforeach
            </div>
        </div>
    @endforeach                          
    </div>
</div>