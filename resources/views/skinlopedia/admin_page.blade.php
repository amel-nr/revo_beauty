@extends('layouts.app')


@section('content')
    <div class="col-lg col-lg-offset">
    <a href="{{route('admin.skinlopedia.list')}}" class="panel-title"><i class="fa fa-arrow-left"></i></a>
        
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">{{__('Skinlopedia')}}</h3>
            </div>

            <!--Horizontal Form-->
            <!--===================================================-->
            <form action="{{route('admin.skinlopedia.store')}}" method="post" class="form-horizontal" id="formblog" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="title">{{__('Kata Kunci')}}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" value="" placeholder="{{__('kata kunci')}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">{{__('Gambar')}}</label>
                            <div class="col-sm-10">
                            <input type="file" name="img" id="img" class="dropify" data-max-file-size="3M" data-allowed-file-extensions="jpg png jpeg" required>
                            </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-2 control-label" for="text">{{__('Definisi')}}</label>
                    <div class="col-sm-10">
                        <textarea class="content" id="definisi" name="text" required></textarea>
                    </div>
                </div>
                </div>
                <div class="panel-footer text-right">
                    <button type="submit" class="btn btn-purple sape">{{__('Simpan')}}</button>
                </div>
            </form>
            <!--===================================================-->
            <!--End Horizontal Form-->

        </div>
    </div>

@endsection

@section('script')

<script>
            $(document).ready(function () {
                    $('#definisi').summernote({
                        shortcuts: false,
                        indent:true,
                        outdent:true,
                        tabDisable: false,
                        placeholder: 'Start writing...',
                        height: 500,
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
