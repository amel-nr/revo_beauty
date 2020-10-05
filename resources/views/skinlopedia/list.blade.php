@extends('layouts.app')


@section('content')
    <a class="badge" href="{{route('admin.skinlopedia')}}">tambah kata kunci</a>
<div id="" class="row pad-top">
    <div class="col-lg-4">
        <div class="panel">
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kata</th>
                        </tr>
                    </thead>
                    <div class="tbody" style="overflow: auto;">
                        <tbody id="tbody">
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                        </tbody>
                    </div>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="panel">
            <div class="panel-body">
                <img id="gbr" src="" alt="" style="width: 350px;display: block;margin-left: auto;margin-right: auto;">
            </div>
            <div class="panel-body mt-3">
                <p id="para"></p>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">{{__('Delete')}}</h4>
            </div>

            <div class="modal-body" id="myModalBody">
                <p>{{__('Delete confirmation message')}}</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{__('Cancel')}}</button>
                <a id="btn-confirm" href="" class="btn btn-danger btn-ok">{{__('Delete')}}</a>
            </div>
        </div>
    </div>
</div>

<div class="mform" id="mform" style="display:none;">
    <form class="needs-validation" novalidate>
        <div class="form-row">
                            <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">Kata</label>
                            <input type="text" class="form-control" id="ikata" value="" required>
                            </div>
                            <div class="col-md-6 mb-3">
                            <label for="validationTooltip02">Img</label>
                            <input type="text" class="form-control" id="vimg" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div>
                                <label for="validationTooltip03">Definisi</label>
                                <textarea type="text" class="form-control" id="definisi" required></textarea>
                            </div>
                        </div>
        </div>
    </form>
</div>

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            getKeyword()
            
            $("#tbody").on("click","#detail", function (e) {
                e.preventDefault()
                let id = $(this).data('id');
                $.get("{{route('admin.skinlopedia.get',['id'=>'idid'])}}".replace('idid',id),function (data) {
                    $("#gbr").attr("src", "{{ asset('skinlopedia/img/placeholder-rect.jpg') }}".replace('placeholder-rect.jpg',data.img))
                    $("#para").html(data.text)
                })
            })

            $("#tbody").on("click","#btnsl", function (e) {
                e.preventDefault()
                $("#btn-confirm").attr("href", $(this).attr("href"))
                $("#modal").modal("show");
                $("#myModalLabel").text($(this).text())
            })
        })

        function getKeyword() {
            $.get("{{route('admin.skinlopedia.get',['id'=>'id'])}}", function (data) {
                console.log(data);
                let content = ""
                data.forEach( function(el,i) {
                    let no = i+1
                    let urL = "{{route('admin.skinlopedia.delete',['id' => 'tedi'])}}".replace('tedi',el.id)
                    let edit = "{{route('admin.skinlopedia.edit',['id' => 'tedi'])}}".replace('tedi',el.id)
                    let src = "{{ asset('skinlopedia/img/placeholder-rect.jpg') }}".replace('placeholder-rect.jpg',el.img)
                    content += `
                    <tr class="htr">
                        <th>`+ no +`</th>
                        <td><a href="#" id="detail" data-id="`+el.id+`">`+el.title+`</a>
                            <div style="float: right;color:#FF6978;">
                            <a href="`+urL+`" id="btnsl" >Hapus</a> - <a id="edit" href="`+edit+`" data-kata="`+el.title+`" >Edit</a>
                            </div>
                        </td>
                    </tr>
                    `
                });
                $("#tbody").html(content);
                $("#gbr").attr("src", "{{ asset('skinlopedia/img/placeholder-rect.jpg') }}".replace('placeholder-rect.jpg',data[0].img))
                $("#para").html(data[0].text)
            });
        }
    </script>
    <script>
            $(document).ready(function () {
                    $('#definisi').summernote({
                        shortcuts: false,
                        indent:true,
                        outdent:true,
                        tabDisable: false,
                        placeholder: 'Start writing...',
                        height: 100,
                        codeviewFilter: true,
                        toolbar: [
                            ['style', ['bold', 'italic', 'underline', 'clear']],
                            ['font', ['strikethrough', 'superscript', 'subscript']],
                            ['fontsize', ['fontsize']],
                            ['insert', ['link']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['height', ['height']],
                            ['view', ['fullscreen', 'codeview']],
                            'undo','redo'
                        ],
                        lineHeights: ['0.2', '0.3', '0.4', '0.5', '0.6', '0.8', '1.0', '1.2', '1.4', '1.5', '2.0', '3.0'],
                    });

                    $('.dropify').dropify({
                        messages: {
                            'default': 'Drag and drop gambar',
                            'replace': 'Drag and drop atau click untuk mengubah gambar',
                            'remove':  'Hapus',
                            'error':   'Ooops, ada kesalahan.'
                        },

                        error: {
                            'fileSize': 'Ukuran file maksimal 3 MB.',
                            'maxWidth': 'Lebar gambar maksimal 1000px.',
                            'maxHeight': 'Tinggi gambar maksimal 1000px.',
                            'imageFormat': 'Hanya menerima format gambar "jpg" "png" "jpeg".'
                        }
                    });
            })
        </script>
@endsection