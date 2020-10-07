<div class="pt-5" style="border-bottom: #f3795c solid 1px;"></div>
    <div id="other-blog">
            @php
                $blog = App\blog::where('showblog',1)->with(['category','user'])->orderBy('created_at','desc')->skip(6)->limit(4)->get();
                $other = $blog->pluck("id")->toArray();
                $collect = collect($blog);
                $chunk = $collect->chunk(2);
                $sectBlog = $chunk->toArray();
            @endphp
            @if($blog->count() > 0)
            <div>
                <h1 class="h4 pt-5 pl-3" style="font-weight: 600;">BACA ARTIKEL LAINNYA</h1>
                <input type="hidden" name="blogother" value="{{json_encode($other)}}">
            </div>
            @foreach($sectBlog as $key => $section)
            <div class="row">
                @foreach($section as $k => $b)
                    @php(isset($id)?'':$id=0)
                    @if($b['id'] != $id)
                    <div class="col-6">
                        <div class="row px-3">
                            <div class="col-6 pt-4">
                                <div class="content-blog">
                                <a href="{{route('artikel',['id' => $b['id']])}}"><img src="{{ asset('blog/thumbnail/').'/'.$b['thumbnail'] }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                    <div class="blog-hover">
                                        <div class="p-blog text-center">
                                            <p>CLICK ME</p>
                                        </div>
                                    </div>
                                </a>
                                </div>
                            </div>
                            <div class="col-6 pt-5">
                                <p class="text-left" style="font-size: 15px; font-weight: 700;">{{ strtoupper($b["category"]["title"]) }} :<br>
                                    {{ $b['title']}}</p>
                                <div class="row">
                                    <div class="col-3 text-right">
                                        <img src="{{ asset('frontend/images/blog/icon-profil.png') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} text-right" alt="" style="height: 40px;">
                                    </div>
                                    {{--<div class="col-9 text-left pr-5 pl-0" style="font-size: 14px; font-weight: 600;">
                                        <p class="">{{$b['user']['name']}} <br> {{date('d F Y', strtotime($b['created_at'])) }}</p>
                                    </div>--}}
                                </div>
                            </div>
                        </div>
                        @if($key == 0)
                        <div class="pt-4 ml-3" style="border-bottom: #f3795c solid 1px; width: 93%;"></div>
                        @endif
                    </div>
                    @endif
                @endforeach
            </div>
            @endforeach
            @endif
        </div>
    </div>
        <div class="text-center py-5">
            <a name="" id="otherbtn" class="btn btn-spinner" style="font-size: 16px; border-radius: 50px;" href="#" role="button">TAMPILKAN SEMUA</a>
        </div>
</div>
</section>

@section("script")
<script>
$(document).ready(function () {
    let urL = window.location.href
    let blogDetail = "blog/artikel"
    if (urL.indexOf(blogDetail) > 0 || blogDetail.indexOf(urL) > 0){
        }else{
            all()
        }

    $("#back").on("click", function (e) {
        $(this).hide()
        e.preventDefault()
        $("#data").hide()
        $("#dblog").show()
        $("#other-blog").show()
        select()
    })

    function select() {
        $(".text-blog-filter").css("color", "black");
        $("#filter-all").find('p').css("color", "#f3795c");
        $(".blog-filter").css("border-bottom", "none");
        $("#filter-all").css("border-bottom", "3px solid #f3795c");
    }


    $(".blog-filter").click(function(e){
        $("#back").show()
        $("#data").show()
                e.preventDefault()
                $(".text-blog-filter").css("color", "black");
                $(this).find('p').css("color", "#f3795c");
                $(".blog-filter").css("border-bottom", "none");
                $(this).css("border-bottom", "3px solid #f3795c");
                $("#dblog").hide()

                let ctg = $(this).find('p').text();
                let id_ctg = $(this).find('p').data('id')
                if (ctg == 'ALL') {
                    $("#data").html("");
                    all();
                    return
                }
                all(id_ctg)
    });

    $("#otherbtn").on("click", function (e) {
        $("#back").show()
        e.preventDefault()
        $("#data").show()
        $("#dblog").hide()
        all(0,'all')
    })
})

function all(id = 0,all=0) {
                let urL = "{{route('all.blog',['all'=>'six'])}}"
                if (id!=0) {
                    let other = $("input[name='blogother']").val()
                    urL = "{{route('filter.blog',['cid'=>'fid','other'=>'uther'])}}".replace('uther',other).replace('fid',id)
                }
                if (all!=0) {
                    urL = "{{route('all.blog',['all'=>'all'])}}"
                }
                $.getJSON(urL, function (data) {
                    // console.log(data)
                    // return;
                    let content = ''
                    $.each(data, function (i, blog) {
                            let dblog = "{{route('artikel',['id' => 'bid'])}}".replace('bid',blog.id)
                            if (blog.showblog == 1) {
                                content +=`
                                    <div id="item" class="col-md-4 col-12 mb-5"> <div class="py-2" style="background-color: #f3795c; height: 40px; border-radius: 6px 6px 0 0; width: 50%;"> <p style="color: white; font-size: 14px;" class="text-center" id="title-category" data-id="`+blog.category_id+`">`+ blog.category.title.toUpperCase() +`</p> </div> <div class="content-blog"> <a href="`+dblog+`"> <img src=" {{asset('blog/thumbnail/')}}/`+blog.thumbnail+` " class="img-fluid" alt=""> <div class="blog-hover"> <div class="p-blog text-center"> <p>CLICK ME</p> </div> </div> </a> </div> <p class="mt-2" style="font-weight: 600; font-size: 18px; line-height: 24px;">`+ blog.title +`</p> </div>
                                `}
                    })
                        $("#data").html(content)
                    if (all!=0) {
                        $("#other-blog").hide()
                    }else{
                        $("#other-blog").show()
                    }
                })
            }
</script>
@endsection