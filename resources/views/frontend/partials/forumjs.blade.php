<script type="text/javascript">

        $("#konten").on('focus','.filter-button', function(){
            $(this).css({"background-color": "#f3795c", "color": "white"});
        });
        $("#konten").on('blur','.filter-button', function(){
            $(this).css({"background-color": "#fcf8F0", "color": "black"});
        });


    $(document).ready(function () {
        // console.log(chunk(myarr,3))
        var editor = new Jodit('#summernoteText');

        // $("#konten").on("click","#detailproductrekom", function (e) {
        //     e.preventDefault()
        //     location.href = $(this).data("url")
        // })

        $("#konten").on("click", "#sharepost", function (e) {
            e.preventDefault()
            let title = $(this).data("title")
            alert(title)
        })

        $("#cokbalas").on("click", function (e) {
            e.preventDefault()
            $("#formbalasan").slideDown()
            $(this).hide()
        })

        $("#postchildreply").on("click", function (e) {
            e.preventDefault()
            $("#formbalasan").slideUp()
            $("#cokbalas").show()
            if ($("#fieldBalas").val()=='') {
            }else{
                let id = $(this).data("id")
                addCReply(id,$("#fieldBalas").val())
            }
                $("#fieldBalas").val("")
        })

        
        
        $("#konten").on("click", "#gubang", function (e) {
            e.preventDefault()
            $("#modalLogin").modal('show')
        })

        $("#konten").on("click","#filterinpost", function () {
            let title = $(this).data("title")
            let id = $(this).data("id")
            if($("#ruang").trigger("click")){
                setTimeout(function(){
                     if($("input[name='"+title+"']").trigger("click")){
                         $("#op"+id).remove();
                         $("input[name='"+title+"']").prop("checked",false)
                     }}, 1000);
            $(".mypreloader").show()
            }
        })

        $("#konten").on("click", "#btnDReply", function (e) {
            $("#modalBalasan").append('<input type="hidden" id="curl"><input type="hidden" id="check">')
            e.preventDefault()
            $("#modalBalasan").modal("show")
            $("#postchildreply").attr("data-id",$(this).data("id"))
            getReply($(this).data("id"))
        })

        $("#konten").on("click", "#btngabung", function (e) {
            e.stopPropagation()
            e.preventDefault()

            let rid = $(this).data("rid")
            let uid = $(this).data("uid")
            let tr = $(this).data("title")
            // alert(rid)
            joinRoom(rid,uid,tr)
        })

        $("#konten").on('click', '#getpost', function (e) {
            e.preventDefault()
            let id = $(this).data('id')
            let rid = $(this).data('rid')
            let rt = $(this).data('rt')
            getPost(id,rid,rt)
        })

        $("#konten").on("click", "#btnleave", function (e) {
            e.stopPropagation()
            e.preventDefault()

            let rid = $(this).data("rid")
            let uid = $(this).data("uid")
            let tr = $(this).data("title")
            // alert(rid)
            leaveRoom(rid,uid,tr)
        })

        $("#konten").on("click", "#myroom", function (e) {
            e.preventDefault()
        })
        $("#konten").on("click", "#allroom", function (e) {
            e.preventDefault()
        })

        $("#beranda").on("click", function (e) {
            e.preventDefault();
            $("#filtered").html("")
            fetchPosts();
        })

        $("#ruang").on("click", function (e) {
            e.preventDefault();
            $("#filtered").html("")
            fetchRoom();
        })

        $("#konten").on("click","#detailforum", function (e) {
            e.preventDefault();
            let id = $(this).data("id");
            roomDetail(id);
            $("#filtered").html("")
        })

        $("#konten").on("click", "#btnLike", function (e) {
            e.preventDefault()
            let uid = $(this).data("uid")
            let id = $(this).data("id")
            let url = $("#urlike"+id).val()
            let check = $("#like_check"+id).val()
            likePost(uid,id,url,check)
            if (check == "liked") {
                $("#like_check"+id).val("unliked")
            }else{
                $("#like_check"+id).val("liked")
            }
        })

        $("#btncLike").on("click", function (e) {
            e.preventDefault()
            let uid = $(this).data("uid")
            let id = $(this).data("id")
            let url = $("#curlike").val()
            let check = $("#clike_check").val()
            likeReply(uid,id,url,check)
        })

        
        $("#konten").on('change','#cuiok', function () {
            let cfilter = [];
            $('#addToCart-modal-body').html(null);
            if ($(this).is(':checked')) {
                $("#filtered").append("<option id='op"+$(this).val()+"' value='"+$(this).val()+"' selected>uhi</option>");
            }else{
                $("#filtered").find("#op"+$(this).val()).remove()
            }
            topicsFilter(0,0)
        })

        $("#konten").on("click","#btnrsearch", function (e) {
            e.preventDefault()
            let q = $("#konten").find("#search").val()
                if (q == "") {
                    topicsFilter(0,0)
                }else{
                    topicsFilter(0,q)
                }
        })

        $("#konten").on("click","#btnpsearch", function (e) {
            e.preventDefault()
            let q = $("#konten").find("#psearch").val()
            let title = $("#troom").html()
            let rid = $("#troom").attr("data-id")
                if (q == "") {
                    refetchPosts(rid,title,0)
                }else{
                    refetchPosts(rid,title,q)
                }
        })

        $("#konten").on("click", function () {
            $('#list_post_exist').fadeOut();
        })

        $("#konten").on("keyup","#psearch", function (e) {
            let q = $(this).val()
            let title = $("#troom").html()
            let rid = $("#troom").attr("data-id")
            if (q == "") {
                q = 3
            }
            let urL = "{{route('refetch.post',['id'=>'rid','query'=>'myquery'])}}".replace('rid',rid).replace('myquery',q)
            $.get(urL, function (data) {
                // console.log([rid,urL,q])
                let content = '<ul class="list-group list-group-flush" style="overflow:auto;height:214px;background-color:white;width:100%">'
                data.forEach(el => {
                    content += `<li class="list-group-item" style="border-radius: 30px 30px 30px 30px;cursor:pointer" id="lpe">`+el.title+`</li>`
                });
                    content +=`</ul>`
                    if (data.length != 0) {
                        $('#list_post_exist').fadeIn()
                        $('#list_post_exist').html(content);
                    }
            })
        })

        $("#konten").on('click', '#lpe', function(){
            $('#psearch').val($(this).text());  
            $('#list_post_exist').fadeOut();
        });

        $("#konten").on("keyup","#search", function (e) {
            e.preventDefault()
            if(e.keyCode == 13){
                let q = $(this).val()
                if (q == "") {
                    topicsFilter(0,0)
                }else{
                    topicsFilter(0,q)
                }
                    
            }
        })

        $("#konten").on('click',"#btnmodalpost", function (e) {
            e.preventDefault()
            let roomid = $(this).data("room")
            let title = $(this).data("title")
            $("#formpostingan").prepend(`
            <div class="input-group flex-nowrap" id="titleprepend" style="margin-bottom:20px;width:100%">
                <input type="text" class="form-control" id="titlepost" name="title" placeholder="Title" aria-label="Title" aria-describedby="addon-wrapping">
                <input type="hidden" value="{{Auth::check() ? Auth::user()->id : ''}}" class="form-control" id="prependuserid" name="user_id" aria-label="Title" aria-describedby="addon-wrapping">
                <input type="hidden" value="`+roomid+`"class="form-control" id="prependroomid" name="room_id" aria-label="Title" aria-describedby="addon-wrapping">
                <input type="hidden" value="`+title+`"class="form-control" id="prependroomtitle" name="room_title" aria-label="Title" aria-describedby="addon-wrapping">
            </div>
            `);
            $("#btnReply").hide()
            $("#btnPost").show()
            $(".dropify-wrapper").show();
            $("#modalBalas").modal("show")
            $("#titleModal").text("Mulai Obrolan")
            $("#notifemail").val("1");
        })

        $("#konten").on("click", "#btnmodalbalas", function (e) {
            e.preventDefault()
            let postid = $(this).data("id");
            let repl = $(this).data("reply");
            $("#titleprepend").remove();
            $(".dropify-wrapper").hide();
            $("#bodyModalBalas").prepend(`
                <input type="hidden" value="{{Auth::check() ? Auth::user()->id : ''}}" class="form-control" id="prependuserid" name="user_id" placeholder="Title" aria-label="Title" aria-describedby="addon-wrapping">
                <input type="hidden" value="`+postid+`"class="form-control" id="prependpostid" name="post_id" placeholder="Title" aria-label="Title" aria-describedby="addon-wrapping">
                <input type="hidden" value="`+repl+`"class="form-control" id="prependrepl" name="post_id" placeholder="Title" aria-label="Title" aria-describedby="addon-wrapping">
            `);
            $("#btnReply").show()
            $("#btnPost").hide()
            $("#modalBalas").modal("show")
            $("#titleModal").text("Tambahkan Komentar")
            $("#notifemail").val("2");
        })

        $('#modalBalas').on('hidden.bs.modal', function (e) { 
            $("#titleprepend").remove();
            $("#prependuserid").remove();
            $("#prependpostid").remove();
            $("#prependroomid").remove();
            $("#prependroomtitle").remove();
            editor.value='';
            var $el = $('#thumb');
            $("#precom").val(null).trigger('change');
            $(".dropify-clear").trigger("click");
            $("#notifemail").prop("checked",false)
        })

        $('#modalBalasan').on('hidden.bs.modal', function (e) { 
            $("#postchildreply").click()
            $("#detailbalasan").html("")
        }) 

        $("#btnCancel").off('click').on("click", function (e) {
            e.preventDefault()
            $("#modalBalas").modal("hide")
        })

        $("#formpostingan").on("submit", function (e) {
            e.preventDefault()

            let posting = {
                "_token":"{{ csrf_token() }}",
                title:$("#titlepost").val(),
                text:$("#summernoteText").val(),
                user_id:$("#prependuserid").val(),
                room_id:$("#prependroomid").val()
            }

            let title =  $("#prependroomtitle").val()
            
            if (posting.text != null || posting.text != '') {
                let fd = new FormData(this)
                fd.append('_token','{{csrf_token()}}');
                $.ajax({
                    type:'POST',
                    url:"{{route('create.post')}}",
                    data: fd,
                    contentType: false,
                    processData: false,
                    success:function(data){
                            refetchPosts(posting.room_id,title)
                            $("#summernoteText").val("")
                            $("#modalBalas").modal("hide");
                            $("#postleng").text(parseInt($("#postleng").text())+1)
                    }
                });
            }
        })


        $("#btnReply").on("click", function (e) {
            e.preventDefault()
            let postID = $("#prependpostid").val()
            let repl = $("#prependrepl").val()
            // console.log(postID)
            let komen = {
                "_token":"{{ csrf_token() }}",
                text:$("#summernoteText").val(),
                post_id:$("#prependpostid").val(),
                user_id:$("#prependuserid").val(),
                precom:$("#precom").val(),
                notifemail: $("#notifemail").is(":checked") ? 1 : 0
            }
            
            if (komen.text != null || komen.text != '') {
                
                $.ajax({
                    type:'POST',
                    url:"{{route('reply.forum')}}",
                    data: komen,
                    success:function(data){
                        if (data=="berhasil") {
                            $("#summernoteText").val("")
                            $("#modalBalas").modal("hide");
                            // $(".dropify-clear").trigger("click");
                            // console.log(postID)
                            fetchReply(postID,repl)
                        }
                    }
                });
            }
        })

        // $("#konten").on("click", "#btnreadmorePost", function (e) {
        //     e.stopPropagation()
        //     e.preventDefault()
        // })

        $("#konten").on("click", "#btnsortby", function (e) {
            e.stopPropagation()
            e.preventDefault()
            let id = $(this).data('id')
            sortRoom(id)
        })
    })

    function addCReply(idr,isi) {
        let data = {
            _token:"{{csrf_token()}}",
            idr:idr,
            isi:isi
        }
        $.post("{{route('add.c.reply')}}",data,function (d) {
            getReply(idr)
        })
    }
    
    function get_filter(class_name)
            {
                var filter = [];
                $("#konten").children('.'+class_name+':checked').each(function(){
                    filter.push($(this).val());
                });
                return filter;
            }

    function fetchPosts() {
            $.get("{{route('forum.posts')}}",function (data) {
            let content = `<div class="text-center py-5" style="background-color: #FADFD2;">
                                <h3 style="color: #f3795c;" class="mb-0 font-weight-bold">PHOEBE SQUAD</h3>
                                <div class="row">
                                    <div class="col-md-3 col-6 mx-auto">
                                        <img src="{{ asset('frontend/images/forum.png') }}" class="w-100 img-fluid`+ '${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}'+`" alt="">
                                    </div>
                                </div>
                                <p class="mb-0" style="font-weight: 600; font-size: 24px; line-height: 34px;">Berbincang mengenai seputar skincare dan permasalahannya.<br>
                                Temukan berbagai topik, dan rekomendasi produk yang cocok untuk kulitmu</p>
                            </div>
                            <div class="container py-5">
                                <div class="row p-5">`;
                data.forEach(function (post) {
                    let urL = "{{route('fetch.post',['id'=>'postid'])}}".replace('postid',post.id)
                    content += 
                    `<div class="col-md-6 col-12 py-5 px-md-5 px-0 text-center">
                        <a href="`+"{{route('forum.detail','piddy')}}".replace('piddy',post.id)+`">
                            <div style="position: relative;">
                                <div style="padding-top: 100%; background-color: white;"></div>
                                <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
                                    <img src="{{ asset('`+post.thumbnail+`') }}" class="w-100 img-fluid `+'${+3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}'+`" alt="" style="width: 100%; height: 100%; object-fit: contain;">
                                </div>
                            </div>
                            <h4 style="color:black" class="font-weight-bold mt-4">`+post.title.toUpperCase()+`</h4>
                            <p style="font-size: 18px; font-weight: 600;">Temukan topik yang kamu suka</p>
                        </a>
                    </div>`;
                })

                content +=`</div></div>`;
                $("#konten").html(content);
            })

    }


        let roomTopics = (d) => {
                        let nf = '';
                        d.topics.forEach(filter => {
                            nf += `<div>
                                        <label class="checkbox-container mb-2" id="filiterroom`+filter.id+`">
                                            <p class="mb-0" style="line-height: 20px; vertical-align: middle;">`+filter.title+`</p>
                                            <input type="checkbox" name="`+filter.title.replace(" ","-")+`" id="cuiok" class="topicsfilter" value="`+filter.id+`">
                                            <span class="checkbox-checkmark"></span>
                                        </label>
                                    </div>`
                        })
                        return nf;
        }
    
    let rooms = (data) =>{
            let room = data.room
            let content = ""
            room.forEach(forum => {
                var totalPost = ("posts" in forum) ? forum.posts : forum.post
                var totalUser = ("total_user" in forum) ? forum.total_user : forum.user_count
                var join = ("join" in forum) ? forum.join : "LEAVE"
                let src = "{{ asset('images') }}".replace('images',forum.img)
               content += `
                <div class="col-md-4 col-12 text-center pt-1 my-4">
                    <div style="border: 1px solid #f3795c;">
                        <div class="content-product width-100" style="position: relative;">
                            <div class="dummy" style="padding-top: 45%; background-color: white;"></div>
                            <div class="h-100" style="position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
                                <img class="img-fit lazyload m-auto `+'${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}'+`" src="{{ asset('frontend/images/placeholder.jpg') }}" data-src="`+src+`" style="width: 100%; height: 100%; object-fit: contain;">
                            </div>
                        </div>
                        <a href="#" id="detailforum" data-id="`+forum.id+`"><h4 class="font-weight-bold mt-2" style="color: black;">`+ forum.title +`</h4></a>
                        <div class="container px-5">
                            <div class="row text-center pb-3" style="border-bottom: 1px solid #f3795c;">
                                <div class="col-6">
                                    <img src="{{ asset('frontend/images/forum/users.png') }}" class="img-fluid `+'${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}'+`" alt="">
                                    <p id="totaluser`+forum.id+`" class="mb-0 d-inline" style="color: #F3795C; font-size: 16px; vertical-align: middle;">`+totalUser+`</p>
                                </div>
                                <div class="col-6">
                                    <img src="{{ asset('frontend/images/forum/comments.png') }}" class="img-fluid `+'${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}'+`" alt="">
                                    <p class="mb-0 d-inline" style="color: #F3795C; font-size: 16px; vertical-align: middle;">`+ totalPost.length +`</p>
                                </div>
                            </div>
                        </div>
                        <p class="pt-2 pb-4" style="font-size: 16px;">`+ forum.sub_title +`</p>
                        <div id="joinbtns`+forum.id+`" style=" background-color:#f3795c; border: 1px solid #f3795c; color:white;">
                        @if(Auth::check())
                            <a href="#" id="btn`+join.toLowerCase()+`" data-title="`+forum.title+`" data-rid="`+forum.id+`" data-uid="{{Auth::check()?Auth::user()->id:''}}"><h4 id="textbtngabung" class="mb-0 py-1" style="color: white;">`+join+`</h4></a>
                        @else
                            <a href="#" id="gubang"><h4 class="mb-0 py-1" style="color: white;">LOGIN</h4></a>
                        @endif
                        </div>
                    </div>
                </div>`;
            });
            return content;
    }

    function roomsUi(data) {        
        let ruangsaya = `<div class="col-3 pr-0">
                            <span id="testruang"><h4 class="font-weight-bold" style="color: black;">Ruang</h4></span>
                        </div>`;

        @if(Auth::check()) 
                ruangsaya = `
                <div class="col-md-3 col-6 pr-0">
                    <a href="#" onclick="fetchRoom()" id="allroom"><h4 class="font-weight-bold" style="color: black;">Semua Ruang</h4></a>
                </div>
                <div class="col-md-3 col-6 pl-md-0">
                    <a href="#" id="myroom" onclick="fetchRoom({{Auth::user()->id}})"><h4 class="font-weight-bold" style="color: black;">Ruang Saya</h4></a>
                </div>`;
        @endif
        
        let content = `
        <div class="text-center py-5" style="background-color: #FADFD2;">
            <h1 style="color: #f3795c; font-size: 48px;" class="mb-0 font-weight-bold">RUANG</h1>
            <p class="mb-0" style="font-weight: 600; font-size: 24px; line-height: 34px;">Temukan berbagai topik menarik seputar skincare yang kamu sukai<br>
            dan berbincang dengan member lainnya.</p>
            <div class="row mt-4">
                <div class="col-md-4 col-10 p-0 form-group mx-auto">
                    
                        <div class="input-group">
                            <input type="text" aria-label="Search" id="search" class="form-control search-form px-4 py-2" style="border-radius: 30px 0px 0px 30px; border-right: 1px solid white; font-size: 18px;" placeholder="Cari Topik">
                            <span class="input-group-btn">
                                <a href="#" id="btnrsearch" style="border-radius: 0px 30px 30px 0px; cursor:pointer; background-color: white; border-color: #ddd; margin-left: -2px; border-left: 1px solid white;" class="btn btn-primary search-btn py-2"><i class="fa fa-search" style="color: #F3795C; font-size: 18px; line-height: 1.5;"></i>
                                </a>
                            </span>
                        </div>
                    
                </div>
            </div>
        </div>
        <div class="container py-4">
            <div class="row text-left" style=" border-bottom: 1px solid #f3795c">
                `+ ruangsaya +`
            </div>
            <nav class="navbar navbar-expand-md">
                <div class="container">
                    <div class="navbar-collapse collapse" id="main-nav-1" style="justify-content: flex-end;">
                        <ul class="navbar-nav pt-4">
                            <li class="nav-item mr-2" style="background-color: #fcf8F0; border: 1px solid #f3795c; border-radius: 5px; overflow: hidden;">
                                <a href="#" class="nav-link nav-links dropdown-toggle filter2-button filter-button" data-toggle="dropdown" data-target="#" style="background-color: #fcf8F0; border-color: #f3795c; color: black;"><i class="fa fa-sliders" aria-hidden="true"></i>Filter</a>
                                <div class="dropdown-menu mt-2 p-4" style="background-color: #FCF8F0; border: 1px solid #f3795c; left: auto;">
                                    `+ roomTopics(data) +`
                                </div>
                            </li>
                            <li class="nav-item" style="background-color: #FCF8F0; border: 1px solid #f3795c; border-radius: 5px; overflow: hidden;">
                                <a href="#" class="nav-link nav-links dropdown-toggle filter2-button filter-button" data-toggle="dropdown" data-target="#" style="background-color: #fcf8F0; border-color: #f3795c; color: black;"><i class="fa fa-chevron-down" aria-hidden="true"></i>Urutkan</a>
                                <div class="dropdown-menu mt-2 py-2 px-1" style="background-color: #FCF8F0; border: 1px solid #f3795c; left: auto;">
                                    <a class="dropdown-item" target="_blank" data-id="1" id="btnsortby" href="#">Trending</a>
                                    <a class="dropdown-item" target="_blank" data-id="2" id="btnsortby" href="#">Populer</a>
                                    <a class="dropdown-item" target="_blank" data-id="3" id="btnsortby" href="#">A - Z</a>
                                </div>
                            </li>
                        </ul>   
                    </div>
                </div>
            </nav>
            <div class="row mb-5" id="cardforum">`+rooms(data)+`</div>
        </div>`;
            $("#konten").html(content);
    }

    function fetchRoom(uid=0) {
            $.get(`{{route('forum.rooms.filter',['filter'=>'empty','sortby'=>'urutkan','myroom'=>'uid','query'=>'0'])}}`.replace('uid',uid), function (data) {
                roomsUi(data);
        });
    }

    function myroom() {
        $.get("{{route('forum.myroom')}}", function (data) {
            $("#cardforum").html(rooms(data));
        })
    }

    function sortRoom(s) {
        $.get("{{route('forum.sortRoom',['s'=>'sortir'])}}".replace("sortir",s), function (data) {
            $("#cardforum").html(rooms(data))
        })
    }

    let reply = (data,totalLoop = 0) =>{
        let replys= ""
        let loop = data.length
        if (totalLoop > 0 ) {
            loop = totalLoop
        }
        data.forEach(function (repl,i) {
            if (i >= loop) {
                return;
            }
            let recom = ""

            if (repl.user != null) {
                var username = repl.user.name
                var usertype = repl.user.type
            }

            replys+=`
            <div class="p-3" style="border: 1px solid #f3795c;padding-bottom:20px;">
                <img src="{{ asset(`+ repl.user.avatar_original != null ? "repl.user.avatar_original":"frontend/images/placeholder-rect.jpg"+`) }}" class="rounded-circle img-fluid `+'${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}'+`" alt="" style="height: 36px;">
                <b class="ml-2" style="font-size: 16px;">`+username+`</b>
                <span class="badge badge-danger" style="background-color: #F3795C;">`+username+`</span>
                <p style="margin: 0; font-size: 14px; float: right; color: #6C6D70;">Posted `+repl.created_at+`</p>
                <div style="clear: right;"> </div>
                @if(Auth::check())
                <p class="mt-1" style="margin: 0; text-align: justify; font-size: 16px;"><b>Reply: </b>`+repl.text+`.<br>`+prekomendasi(repl.rekomendasi)+` <a id="btnDReply" data-id="`+repl.id+`" href="#" style="color: #1074BC;">baca selengkapnya</a></p>
                @else
                <p class="mt-1" style="margin: 0; text-align: justify; font-size: 16px;"><b>Reply: </b>`+repl.text+`.<br>`+prekomendasi(repl.rekomendasi)+` <a href="#" data-toggle="modal" data-target="#modalLogin" style="color: #1074BC;">baca selengkapnya</a></p>
                @endif
            </div>`;
        });
        
        return replys;
    }

    function renderPR(product) {
        // alert(typeof(product))
        let result;
        
        let data = {
            _token:"{{csrf_token()}}",
            product:product
        }

        if (product != "") {
            $.post("{{route('recom.product')}}",data,function (d) {
                    result = d
            })
        }
        return result;
    }

    

    function prekomendasi(prekom) {
        let content='<div class="row">';
        if(typeof(prekom) != "undefined"){
            if (prekom.length > 0 ) {
                cprekom = chunk(prekom,3)
                cprekom.forEach(function(prekom,i) {
                    let active = i == 0 ? "active" : ""
                    content += `
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item `+active+`">`
                    prekom.forEach(el => {
                        content += `
                                <a id="detailproductrekom" class="px-3 py-3" target="_blank" href="`+"{{ route('product', 'slug') }}".replace('slug',el.product.slug)+`"><img style="border-radius: 8px;width:82px;" src="{{asset('gambaproduct')}}" alt=""></a>`.replace("gambaproduct",JSON.parse(el.product.photos))
                    });
                                content +=`
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>                        
                    </div>`                        
                });
            }
        }
        content +="</div>"
        return content;
    }
    var myarr = [123,456,54343,343,12312,312,232132,2312,2]
    
    function chunk(array, size) {
            if (!Array.isArray(array)) return [];
            const firstChunk = array.slice(0, size); // create the first chunk of the given array
            if (!firstChunk.length) {
                return array; // this is the base case to terminal the recursive
            }
            return [firstChunk].concat(chunk(array.slice(size, array.length), size)); 
    }

    let allPost = (roomtitle,postingan) => {
                    let content = "";
                    postingan.forEach(function (el,i) {
                        
                        let likeURL = "{{route('like.post')}}";
                        let check = "unliked";
                        let newest = '';
                        let comment = ''

                        @if(Auth::check())
                        el.like.forEach(like => {
                            if (like.user_id == {{Auth::user()->id}}) {
                                likeURL = "{{route('unlike.post')}}";
                                check = "liked"
                            }
                        });
                        @endif

                        var likeStatus = check == "liked" ? '<i class="fa fa-heart" style="color: #f3795c; font-size: 24px; vertical-align: middle;"></i>' : '<i class="fa fa-heart-o" style="color: #f3795c; font-size: 24px; vertical-align: middle;"></i>'

                        if (i == 0) {
                            newest = '<p style="margin: 0; font-size: 14px;">Balasan Terbaru di <b>'+roomtitle.title+'</b></p>'
                        }
                        let username = "user"
                        let usertype = "anonim"
                        if (el.user != null) {
                            username = el.user.name
                            usertype = el.user.user_tier.title
                        }

                        let fb = "https://www.facebook.com/sharer/sharer.php?u={{route('forum.detail','pid')}}".replace('pid',el.id)
                        let pin = "https://pinterest.com/pin/create/button/?url={{route('forum.detail','pid')}}&media={{asset('potocoy')}}".replace('pid',el.id).replace('potocoy',el.thumbnail)
                        let tw = "https://twitter.com/share?url={{route('forum.detail','pid')}}".replace('pid',el.id)

                        content += `
                        <input type="hidden" id="postId" value="`+el.id+`">
                        <div class="p-4 rounded mb-4" style="border: 1px solid #f3795c;">
                            `+newest+`
                            <h4 class="font-weight-bold">`+el.title+`</h4>
                            <p style="margin: 0; font-size: 14px; color: #6C6D70;">Posted `+el.created_at+` | Diupdate 1 jam yang lalu</p>
                            <div class="mt-3">
                                <img src="{{ asset(`+ repl.user.avatar_original != null ? "repl.user.avatar_original":"frontend/images/placeholder-rect.jpg"+`) }}" class="rounded-circle img-fluid `+'${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}'+`" alt="" style="height: 36px;">
                                <b class="ml-2" style="font-size: 16px;">`+username+`</b>
                                <span class="badge badge-danger" style="background-color: #F3795C;">`+usertype+`</span>
                            </div>
                            <p class="mt-1" id="cuok" style="text-align: justify; font-size: 16px;">`+el.text+` <br><a href="`+"{{route('forum.detail',['id'=>'postdetail'])}}".replace('postdetail',el.id)+`" id="btnreadmorePost" style="color: #1074BC;">baca selengkapnya</a></p>
                            `+prekomendasi(el.rekomendasi)+`
                            <div id="allreply`+el.id+`">
                            `+reply(el.reply,3)+`
                            </div>
                            <div class="mt-3">
                            @if(Auth::check())
                            <input type="hidden" id="like_check`+el.id+`" value="`+check+`">
                            <a href="#hiu" id="btnLike" data-check="`+check+`" data-id="`+el.id+`" data-uid="{{Auth::check()?Auth::user()->id:''}}">
                            <input type="hidden" id="urlike`+el.id+`" value="`+likeURL+`">
                            <div class="d-inline" id="liked`+el.id+`">`+likeStatus+`</div>
                            </a>
                            <span class="ml-1" style="font-size: 16px; vertical-align: middle;" id="totalLike`+el.id+`">`+el.like.length+`</span>
                                <a href="#modalBalas" id="btnmodalbalas" data-reply="3" data-id="`+el.id+`" style="color: #333;"><i class="fa fa-reply ml-3" style="color: #f3795c; font-size: 24px; vertical-align: middle;"></i><span class="ml-1" style="font-size: 16px; vertical-align: middle;">Balas</span></a>
                                <span class="ml-md-3 ml-1" style="font-size: 16px; vertical-align: middle;"> | &nbsp; <span id="totalreply`+el.id+`">`+el.reply.length+`</span> Balasan</span>
                                <div class="dropdown" style="float:right">
                                    <button class="" style="border: 1px #FCF8F0;background-color:#FCF8F0;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-share-square-o" style="color: #f3795c; font-size: 24px; float: right; vertical-align: middle;"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" target="_blank" href="`+fb+`"><i class="fa fa-facebook-official"></i>Facebook</a>
                                    <a class="dropdown-item" target="_blank" href="`+tw+`"><i class="fa fa-twitter-square"></i>Twitter</a>
                                    <a class="dropdown-item" target="_blank" href="`+pin+`"><i class="fa fa-pinterest-p mr-2"></i>    Pinterest</a>
                                    </div>
                                </div>
                            </div>
                            @else
                            <a href="#hiu" data-toggle="modal" data-target="#modalLogin">
                            <input type="hidden" id="urlike`+el.id+`" value="`+likeURL+`">
                            <i class="fa fa-heart-o" style="color: #f3795c; font-size: 24px; vertical-align: middle;"></i><span></span>
                            </a>
                            <span class="ml-1" style="font-size: 16px; vertical-align: middle;"></span>
                                <a href="#modalBalas" data-toggle="modal" data-target="#modalLogin" style="color: #333;"><i class="fa fa-reply ml-3" style="color: #f3795c; font-size: 24px; vertical-align: middle;"></i><span class="ml-1" style="font-size: 16px; vertical-align: middle;">Balas</span></a>
                                <span class="ml-md-3 ml-1" style="font-size: 16px; vertical-align: middle;"> | &nbsp; <span>`+el.reply.length+`</span> Balasan</span>
                                <div class="dropdown" style="float:right">
                                    <button class="" style="border: 1px #FCF8F0;background-color:#FCF8F0;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-share-square-o" style="color: #f3795c; font-size: 24px; float: right; vertical-align: middle;"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" target="_blank" href="`+fb+`"><i class="fa fa-facebook-official"></i>Facebook</a>
                                    <a class="dropdown-item" target="_blank" href="`+tw+`"><i class="fa fa-twitter-square"></i>Twitter</a>
                                    <a class="dropdown-item" target="_blank" href="`+pin+`"><i class="fa fa-pinterest-p mr-2"></i>    Pinterest</a>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        `
                    });
                    return content;
    }

    
    function roomDetail(id) {
        // console.log(id)
        $("#konten").html("");
        let urL = `{{route('forum.rooms.id','idroom')}}`
        let btnHeaderRoom = '';
        
        $.get(urL.replace('idroom',id), function (data) {
            let room = data.room[0];
            let postroom = {title:room.title,id:room.id}
            
            @if(Auth::check())
            btnHeaderRoom = `<a name="" id="btn`+room.join.toLowerCase()+`" data-title="`+room.title+`" data-uid="{{Auth::check()?Auth::user()->id:''}}" data-rid="`+room.id+`" class="btn btn-danger rounded btn-pakai" href="#" role="button">`+room.join+`</a>
                            <a name="" id="btnmodalpost" data-room="`+id+`" data-title="`+room.title+`" class="btn btn-danger rounded btn-komplain ml-3" href="#" role="button">Mulai Obrolan</a>`;
            @endif

                let rd = ` <div class="text-center py-5" style="background-color: #FADFD2;">
                <h3 style="color: #f3795c;" class="mb-0 font-weight-bold">PHOEBE SQUAD</h3>
                <div class="row">
                    <div class="col-md-3 col-6 mx-auto">
                        <img src="{{ asset('frontend/images/forum.png') }}" class="w-100 img-fluid `+'${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}'+`" alt="">
                    </div>
                </div>
                <p class="mb-0" style="font-weight: 600; font-size: 24px; line-height: 34px;">Berbincang mengenai seputar skincare dan permasalahannya.<br>
                Temukan berbagai topik, dan rekomendasi produk yang cocok untuk kulitmu</p>
            </div>
            <input type="hidden" id="lrepl" value="1">
            <div class="container py-4">
                <div class="row my-4">
                    <div class="col-md-5 col-10 mx-md-0 mx-auto form-group p-0">
                        
                            <div class="input-group ui-widget" style="position:relative">
                                <input type="text" aria-label="Search" id="psearch" class="form-control search-form px-4 py-2" style="border-radius: 30px 0px 0px 30px; border-right: 1px solid white; font-size: 18px;" placeholder="Cari Kiriman">
                                <span class="input-group-btn">
                                    <a href="#" type="submit" id="btnpsearch" style="border-radius: 0px 30px 30px 0px; cursor:pointer; background-color: white; border-color: #ddd; margin-left: -2px; border-left: 1px solid white;" class="btn btn-primary search-btn py-2"><i class="fa fa-search" style="color: #F3795C; font-size: 18px; line-height: 1.5;"></i>
                                    </a>
                                </span>
                                <div id="list_post_exist" style="position:absolute;margin-top:50px;width:100%;z-index:3;border-radius: 30px 30px 30px 30px;">
                                </div>
                            </div>
                        
                    </div>
                </div>
                <div class="row px-4 py-5 rounded" style=" border: 1px solid #f3795c;">
                    <div class="col-3 col-md-3 col-8 mx-md-0 mx-auto">
                        <div id="image-forum-container">
                            <div id="image-forum-dummy"></div>
                            <div id="image-forum-element" class="rounded-circle" style="background-image: url('{{ asset('`+room.img+`') }}'); background-repeat: no-repeat; background-size: cover; background-position: center; width: 100%;"></div>
                        </div>
                    </div>
                    <div class="col-md-9 col-12">
                        <h1 id="troom" data-id="`+room.id+`" class="font-weight-bold">`+ room.title +`</h1>
                        <div class="row pb-4">
                            <div class="col-3">
                                <img src="{{ asset('frontend/images/forum/users.png') }}" class="img-fluid `+'${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}'+`" alt="" style="height: 36px;">
                                <p id="totaluser`+room.id+`" class="mb-0 d-inline ml-2" style="color: #F3795C; font-size: 24px; vertical-align: middle;">`+ room.total_user +`</p>
                            </div>
                            <div class="col-3">
                                <img src="{{ asset('frontend/images/forum/comments.png') }}" class="img-fluid `+'${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}'+`" alt="" style="height: 36px;">
                                <p id="postleng" class="mb-0 d-inline ml-2" style="color: #F3795C; font-size: 24px; vertical-align: middle;">`+ room.posts.length +`</p>
                            </div>
                        </div>
                        <p style="font-size: 20px; font-weight: 600;">`+ room.sub_title +`</p>
                        <div id="joinbtnr`+room.id+`">
                        `+ btnHeaderRoom +`
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-3 d-md-block d-none">
                        <ul style="list-style: none; padding-left: 0;" class="list-ruang">
                            <li class="active"><a href="#" style="color: black;"><p class="my-2 ml-3" style="font-size: 26px; font-weight: 600; line-height: 50px;">Terbaru</p></a></li>
                            <li><a href="#" data-id="1" style="color: black;"><p class="my-2 ml-3" style="font-size: 26px; font-weight: 600; line-height: 50px;">Populer</p></a></li>
                            <li><a href="#" style="color: black;"><p class="my-5" style="font-size: 26px; font-weight: 700;">Topik Populer</p></a></li>`
                            data.topics.forEach(function(el) {
                                rd+=`<li><a id="filterinpost" data-id="`+el.id+`" href="#" data-title="`+el.title.replace(" ","-")+`" style="color: black;"><p class="my-2 ml-3" style="font-size: 26px; font-weight: 600; line-height: 50px;">`+el.title+`</p></a></li>`
                            })
                        rd+=`</ul>
                    </div>
                    <div class="col-md-6 col-12" id="fieldPosts">
                        `+ allPost(postroom,room.posts) +`
                    </div>
                    <div class="col-md-3 col-12 rounded" style="padding: 0; border: 1px solid #f3795c; height: fit-content;">
                        <div style="display: flex; justify-content: space-between; background-color: #f3795c;">
                            <div class="p-3" style="color: white; font-size: 18px;">Topik Terpopuler</div>
                            <div class="p-3" style="color: white; font-size: 18px;"><i class="fa fa-angle-right"></i></div>
                        </div>
                        <div style="padding: 10px 15px;" id="populartopics">
                        </div>
                    </div>
                </div>
            </div>`;
            $("#konten").html(rd);
            popularTopics()
            });
    }

    function topicsFilter(id = 0, query = 0) {
        
        $('.preloader').fadeOut('slow');

        let filterId = $("#filtered").val()
        if (filterId == null) {
            filterId = "empty";
        }

        let urL = "{{route('forum.rooms.filter',['filter'=>'filterid','sortby'=>'urutkan','myroom'=>'0','q'=>'query'])}}".replace('filterid',filterId).replace('urutkan',id).replace('query',query)
        
        $.get(urL,function (data) {
            $("#cardforum").html(rooms(data));
        })
        $('.mypreloader').hide();
    }
    
    function popularTopics() {
        let content = "";
        $.get("{{route('topics.popular')}}", function (data) {
            data.forEach(function (el,i) {
                content += `
                <a id="filterinpost" data-id="`+el.id+`" href="#" data-title="`+el.title.replace(" ","-")+`"><span class="badge badge-danger m-1" style="background-color: #F3795C; font-size: 16px;">`+el.title+`</span></a>
                `
            });
            // console.log(content)
            // return content;
            $("#populartopics").html(content)
        })
    }

    function fetchReply(id,totalRepl){
        $.get("{{route('fetch.replys','postid')}}".replace("postid",id),function (repl) {
        let getRepl = reply(repl,totalRepl)

            $("#totalreply"+id).text(repl.length)
            $("#totalreplySide"+id).html(repl.length)
            $("#allreply"+id).html(getRepl)
        })
    }

    function getPost(id,rid,rt="kulitkulitan") {
        let content = `oke`
        $.get("{{route('fetch.post','postid')}}".replace("postid",id),function (post) {

                        let likeURL = "{{route('like.post')}}";
                        let check = "unliked";

                        @if(Auth::check())
                        post.like.forEach(like => {
                            if (like.user_id == {{Auth::check()?Auth::user()->id:''}}) {
                                likeURL = "{{route('unlike.post')}}";
                                check = "liked"
                            }
                        });
                        @endif

                        var likeStatus = check == "liked" ? '<i class="fa fa-heart" style="color: #f3795c; font-size: 24px; vertical-align: middle;"></i>' : '<i class="fa fa-heart-o" style="color: #f3795c; font-size: 24px; vertical-align: middle;"></i>'

                        let fb = "https://www.facebook.com/sharer/sharer.php?u={{route('forum.detail','pid')}}".replace('pid',post.id)
                        let pin = "https://pinterest.com/pin/create/button/?url={{route('forum.detail','pid')}}&media={{asset('potocoy')}}".replace('pid',post.id).replace('potocoy',post.thumbnail)
                        let tw = "https://twitter.com/share?url={{route('forum.detail','pid')}}".replace('pid',post.id)

                        if (post.user != null) {
                            var username = post.user.name
                            var usertype = post.user.user_tier.title
                        }else{
                            username = "Phoebe"
                            usertype = "Dewy"
                        }

            content = `
            <div class="container py-4">
                <div class="row mt-5">
                    <div class="col-md-9 col-12">
                        <div class="p-4 rounded mb-4" style="border: 1px solid #f3795c;">
                        <a href="#" onclick="roomDetail(`+rid+`)">
                            <p style="margin: 0; font-size: 14px;text-color:black;">Postingan dari ruang <b>`+rt+`</b></p>
                        </a>
                            <div class="mt-3 mb-2">
                                <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="rounded-circle img-fluid `+'${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}'+`" alt="" style="height: 50px;">
                                <b class="ml-2" style="font-size: 20px;">`+username+`</b>
                                <span class="badge badge-danger" style="background-color: #F3795C;">`+usertype+` Skin</span>
                            </div>
                            <input type="hidden" id="postId" value="`+post.id+`">
                            <p style="margin: 0; font-size: 14px; color: #6C6D70;">Posted `+post.created_at+` | Diupdate `+post.updated+` yang lalu</p>
                            <h4 class="font-weight-bold w-md-50 w-100">`+post.title+`</h4>
                            <p class="mt-1" style="width: 95%; text-align: justify; font-size: 20px;">`+post.text+`.
                            </p>
                            <div class="mt-5">
                            @if(Auth::check())
                            <input type="hidden" id="like_check`+post.id+`" value="`+check+`">
                            <a href="#" id="btnLike" data-check="`+check+`" data-url="`+likeURL+`" data-id="`+post.id+`" data-uid="{{Auth::check()?Auth::user()->id:''}}">
                            <input type="hidden" id="urlike`+post.id+`" value="`+likeURL+`">
                            <div class="d-inline" id="liked`+post.id+`">`+likeStatus+`</div>
                            </a>
                                <span class="ml-1" style="font-size: 20px; vertical-align: middle;" id="totalLike`+post.id+`">`+post.like.length+`</span>
                                <a href="#modalBalas" data-toggle="modal" id="btnmodalbalas" data-reply="0" data-id="`+post.id+`" data-target="#modalBalas" style="color: #333;"><i class="fa fa-reply ml-3" style="color: #f3795c; font-size: 28px; vertical-align: middle;"></i><span class="ml-1" style="font-size: 20px; vertical-align: middle;">Balas</span></a><span class="ml-md-3 ml-1" style="font-size: 20px; vertical-align: middle;"> | &nbsp; <span id="totalreply`+post.id+`">`+post.reply.length+`</span> Balasan</span>
                                <div class="dropdown" style="float:right">
                                    <button class="" style="border: 1px #FCF8F0;background-color:#FCF8F0;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-share-square-o" style="color: #f3795c; font-size: 24px; float: right; vertical-align: middle;"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" target="_blank" href="`+fb+`"><i class="fa fa-facebook-official"></i>Facebook</a>
                                    <a class="dropdown-item" target="_blank" href="`+tw+`"><i class="fa fa-twitter-square"></i>Twitter</a>
                                    <a class="dropdown-item" target="_blank" href="`+pin+`"><i class="fa fa-pinterest-p mr-2"></i>    Pinterest</a>
                                    </div>
                                </div>
                            @else
                            <a href="#">
                            <i class="fa fa-heart-o" data-toggle="modal" data-target="#modalLogin" style="color: #f3795c; font-size: 24px; vertical-align: middle;"></i>
                            </a>
                                <span class="ml-1" style="font-size: 20px; vertical-align: middle;">`+post.like.length+`</span>
                                <a href="#modalBalas" style="color: #333;" data-toggle="modal" data-target="#modalLogin"><i class="fa fa-reply ml-3" style="color: #f3795c; font-size: 28px; vertical-align: middle;"></i><span class="ml-1" style="font-size: 20px; vertical-align: middle;">Balas</span></a><span class="ml-md-3 ml-1" style="font-size: 20px; vertical-align: middle;"> | &nbsp; <span>`+post.reply.length+`</span> Balasan</span>
                                <div class="dropdown" style="float:right">
                                    <button class="" style="border: 1px #FCF8F0;background-color:#FCF8F0;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-share-square-o" style="color: #f3795c; font-size: 24px; float: right; vertical-align: middle;"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" target="_blank" href="`+fb+`"><i class="fa fa-facebook-official"></i>Facebook</a>
                                    <a class="dropdown-item" target="_blank" href="`+tw+`"><i class="fa fa-twitter-square"></i>Twitter</a>
                                    <a class="dropdown-item" target="_blank" href="`+pin+`"><i class="fa fa-pinterest-p mr-2"></i>    Pinterest</a>
                                    </div>
                                </div>
                            @endif
                            </div><br>
                            <div id="allreply`+post.id+`" style="height:510px;overflow: auto;">
                            `+reply(post.reply)+`
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12 rounded" style="padding: 0; border: 1px solid #f3795c; height: fit-content;">
                        <div style="display: flex; justify-content: space-between; background-color: #f3795c;">
                            <div class="p-3" style="color: white; font-size: 18px;">Topik Terpopuler</div>
                        </div>
                        <div class="p-4">
                            <p style="font-size: 16px;"><i class="fa fa-reply mr-2" style="color: #f3795c;"></i> <span id="totalreplySide`+post.id+`">`+post.reply.length+`</span> Balasan</p>
                            <p style="font-size: 16px;"><i class="fa fa-eye mr-2" style="color: #f3795c;"></i> `+post.seen.length+` Melihat</p>
                            <p style="font-size: 16px;" class="mb-0"><i class="fa fa-heart-o mr-2" style="color: #f3795c;"></i><span id="totalLikeSide`+post.id+`"> `+post.like.length+`</span> Menyukai</p>
                        </div>
                        <div style="display: flex; justify-content: space-between; background-color: #f3795c;">
                            <div class="p-3" style="color: white; font-size: 18px;">Post Terkait</div>
                        </div>
                        <div style="padding: 10px 15px;" id="relatedpost">
                            
                        </div>
                    </div>
                </div>
            </div>`;
            $("#konten").html(content)
            getRelatedPost(post.id,post.room_id)
        })
    }

    function getRelatedPost(id,rid) {
        $.get("{{route('fetch.related.post',['room_id'=>'rid','id'=>'pid'])}}".replace("rid",rid).replace("pid",id),function (data) {
            let content = ""
            let leng = data.length-1
            data.forEach(function (el,i) {
                let bb = 'border-bottom: 1px solid #f3795c;'
                let username = ''
                
                if (i==leng) {
                    bb = ``
                }

                if (el.user == null) {
                    username = "anonim"
                }else{
                    username = el.user.name
                }

                content += `
                <div style="padding: 0 0 10px 0; `+bb+`">  
                                <p class="mb-0 mt-1" style="font-size: 16px;"><b><a id="btnrelate" href="`+"{{route('forum.detail',['id'=>'postdetail'])}}".replace('postdetail',el.id)+`" >`+el.title+`</a> <br><span style="text-transform:capitalize;font-size:12px;">`+ username +`</span></b><span class="badge badge-danger ml-2" style="background-color: #F3795C; font-size: 8px;">Dewy Skin</span></p>
                                <p style="margin: 0; font-size: 12px; color: #6C6D70;">Dipost `+el.created_at+`</p>
                </div>
                `
            });
            $("#relatedpost").html(content)
        })
    }

    function likePost(uid,pid,urL,check) {
        let postData = {
            _token:"{{csrf_token()}}",
            post_id:pid,
            user_id:uid
        }

        $.ajax({
                type:'post',
                url: urL,
                data: postData,
                success:function(data){
                    if (check == "liked") {
                        $("#liked"+pid).html('<i class="fa fa-heart-o" aria-hidden="true" style="color: #F3795C; font-size: 24px; vertical-align: middle;"></i>')
                        $("#urlike"+pid).val("{{route('like.post')}}")
                        $("#totalLike"+pid).text(parseInt($("#totalLike"+pid).text())-1)
                        $("#totalLikeSide"+pid).text(parseInt($("#totalLikeSide"+pid).text())-1)
                    }else {
                        $("#liked"+pid).html('<i class="fa fa-heart" aria-hidden="true" style="color: #F3795C; font-size: 24px; vertical-align: middle;"></i>')
                        $("#urlike"+pid).val("{{route('unlike.post')}}")
                        $("#totalLike"+pid).text(parseInt($("#totalLike"+pid).text())+1)
                        $("#totalLikeSide"+pid).text(parseInt($("#totalLikeSide"+pid).text())+1)
                    }
                }
            });
    }

    function likeReply(uid,pid,urL,check) {
        // console.log(check)
        let postData = {
            _token:"{{csrf_token()}}",
            reply_id:pid,
            user_id:uid
        }

        $.ajax({
                type:'post',
                url: urL,
                data: postData,
                success:function(data){
                    // console.log("total like : "+$("#ctotalLike").text())
                    if (check == "liked") {
                        $("#btncLike").html('<i class="fa fa-heart-o" style="color: #f3795c; font-size: 15px; vertical-align: middle;"></i>')
                        $("#clike_check").val("unliked")
                        $("#curlike").val("{{route('like.comment')}}")
                        $("#ctotalLike").text(parseInt($("#ctotalLike").text())-1)
                    }else {
                        $("#btncLike").html('<i class="fa fa-heart" style="color: #f3795c; font-size: 15px; vertical-align: middle;"></i>')
                        $("#clike_check").val("liked")
                        $("#curlike").val("{{route('unlike.comment')}}")
                        $("#ctotalLike").text(parseInt($("#ctotalLike").text())+1)
                        $("#cliked").text("liked")
                    }
                }
            });
    }

    function refetchPosts(roomid,title,query=0) {
        $.get("{{route('refetch.post',['id'=>'roomid','query'=>'kueri'])}}".replace('roomid',roomid).replace('kueri',query), function (data) {
            let postroom = {title:title,id:roomid}
            $("#fieldPosts").html(allPost(postroom,data))
        })
    }

    // $("#notifemail").change(function () {
    //     if ($(this).is(":checked")) {
    //         let pid = $(this).val() == "2" ? $("#prependpostid").val() : 0
            
    //     }
    // })
    // function notifEmail(pId,cId) {

    //     let urL = "{{route('forum.notif.email',['pid'=>'sabar','cid'=>'cmt_id'])}}".replace("sabar",pid).replace("cid",cid)

    //     $.get(urL, function (data) {
    //         // console.log(data)z2w3ww2
    //     })
    // }

    function joinRoom(rid,uid,tr) {
        let join={
            _token:"{{csrf_token()}}",
            user_id:uid,
            room_id:rid
        }

        $.post("{{route('join.room')}}",join,function (d) {
            if (d == "success") {
                $("#joinbtns"+rid).html(`<a href="#" id="btnleave" data-rid="`+rid+`" data-uid="{{Auth::check()?Auth::user()->id:''}}"><h4 id="textbtngabung" class="mb-0 py-1" style="color: white;">LEAVE</h4></a>`)
                $("#joinbtnr"+rid).html(`<a id="btnleave" data-title="`+tr+`" data-uid="{{Auth::check()?Auth::user()->id:''}}" data-rid="`+rid+`" class="btn btn-danger rounded btn-pakai" href="#" role="button"> LEAVE </a>
                <a name="" id="btnmodalpost" data-room="`+rid+`" data-title="`+tr+`" class="btn btn-danger rounded btn-komplain ml-3" href="#" role="button">Mulai Obrolan</a>`)
                $("#totaluser"+rid).text(parseInt($("#totaluser"+rid).text())+1)
            }
        })
    }

    function leaveRoom(rid,uid,tr) {
        let leave={
            _token:"{{csrf_token()}}",
            user_id:uid,
            room_id:rid
        }

        $.post("{{route('leave.room')}}",leave,function (d) {
            if (d == "success") {
                $("#joinbtns"+rid).html(`
                <a href="#" id="btngabung" data-rid="`+rid+`" data-uid="{{Auth::check() ? Auth::user()->id : ''}}"><h4 id="textbtngabung" class="mb-0 py-1" style="color: white;">GABUNG</h4></a>
                `)
                $("#joinbtnr"+rid).html(`<a id="btngabung" data-title="`+tr+`" data-uid="{{Auth::check() ? Auth::user()->id : ''}}" data-rid="`+rid+`" class="btn btn-danger rounded btn-pakai" href="#" role="button"> GABUNG </a>
                <a name="" id="btnmodalpost" data-room="`+rid+`" data-title="`+tr+`" class="btn btn-danger rounded btn-komplain ml-3" href="#" role="button">Mulai Obrolan</a>`)
                $("#totaluser"+rid).text(parseInt($("#totaluser"+rid).text())-1)
            }
        })
    }

    function getReply(id) {
        $.get("{{route('getReply',['id'=>'rid'])}}".replace('rid',id),function (data) {
            // console.log(data)
            $("#postparent").text(data.post.title)
            $("#btncLike").attr("data-uid",data.user_id)
            $("#btncLike").attr("data-id",data.id);
            $("#detailbalasan").html(data.text)
            $("#clike_check").val(data.check)
            $("#cliked").text(data.check);

            if (data.check == "liked") {
                        $("#curlike").val("{{route('unlike.comment')}}")
                        $("#btncLike").html('<i class="fa fa-heart" style="color: #f3795c; font-size: 15px; vertical-align: middle;"></i>')
                    }else {
                        $("#btncLike").html('<i class="fa fa-heart-o" style="color: #f3795c; font-size: 15px; vertical-align: middle;"></i>')
                        $("#curlike").val("{{route('like.comment')}}")
                    }
            

            $("#ctotalLike").text(data.totallike)
            $("#balasan_komen").html(commentReplyUI(data.comment))
            $("#jumlahbalasan").text(data.comment.length)
            $("#modalPrecom").html(prekomendasi(data.rekomendasi))
        })
    }

    function commentReplyUI(comment) {
        let content = ``
        comment.forEach( function(el,i) {
            content +=`
            <li style="list-style-type: none;"><b>`+el.user.name+`</b> `+el.isi+`</li><hr>
            `
        });
        return content;
    }
    </script>
