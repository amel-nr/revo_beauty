<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link name="favicon" type="image/x-icon" href="{{ asset(\App\GeneralSetting::first()->favicon) }}" rel="shortcut icon" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    

    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!--active-shop Stylesheet [ REQUIRED ]-->
    <link href="{{ asset('css/active-shop.min.css')}}" rel="stylesheet">

    <!--active-shop Premium Icon [ DEMONSTRATION ]-->
    <link href="{{ asset('css/demo/active-shop-demo-icons.min.css')}}" rel="stylesheet">

    <!--Font Awesome [ OPTIONAL ]-->
    <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <!--Switchery [ OPTIONAL ]-->
    <link href="{{ asset('plugins/switchery/switchery.min.css')}}" rel="stylesheet">

    <!-- dropify -->
    <link href="{{ asset('plugins/dropify/dist/css/dropify.min.css')}}" rel="stylesheet">

    <!--DataTables [ OPTIONAL ]-->
    <link href="{{ asset('plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css') }}" rel="stylesheet">

    <!--Select2 [ OPTIONAL ]-->
    <link href="{{ asset('plugins/select2/css/select2.min.css')}}" rel="stylesheet">

    <link href="{{ asset('css/bootstrap-select.min.css')}}" rel="stylesheet">

    <!--Chosen [ OPTIONAL ]-->
    {{-- <link href="{{ asset('plugins/chosen/chosen.min.css')}}" rel="stylesheet"> --}}

    <!--Bootstrap Tags Input [ OPTIONAL ]-->
    <link href="{{ asset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.css') }}" rel="stylesheet">

    <!--Summernote [ OPTIONAL ]-->
    <link href="{{ asset('css/jodit.min.css') }}" rel="stylesheet">

    <!--Theme [ DEMONSTRATION ]-->
    <!-- <link href="{{ asset('css/themes/type-full/theme-dark-full.min.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/themes/type-c/theme-navy.min.css') }}" rel="stylesheet">

    <!--Spectrum Stylesheet [ REQUIRED ]-->
    <link href="{{ asset('css/spectrum.css')}}" rel="stylesheet">

    <!--Custom Stylesheet [ REQUIRED ]-->
    <link href="{{ asset('css/custom.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.25/daterangepicker.css" rel="stylesheet"/>
    
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    @yield("style")
    
    <style>
        .panel {
            border: 1px solid #F3795C;
        }

        .btn-info {
            background-color: #F3795C;
            border-color: #F3795C !important;
        }

        .btn-info:hover {
            background-color: #f25735 !important;
            border-color: #f25735 !important;
        }

        .btn-info:focus {
            background-color: #F3795C;
            border-color: #F3795C !important;
        }
    </style>


    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--jQuery [ REQUIRED ]-->
    <script src=" {{asset('js/jquery.min.js') }}"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>


    <!--active-shop [ RECOMMENDED ]-->
    <script src="{{ asset('js/active-shop.min.js') }}"></script>

    <!--Alerts [ SAMPLE ]-->
    <script src="{{ asset('js/demo/ui-alerts.js') }}"></script>

    <!--Switchery [ OPTIONAL ]-->
    <script src="{{ asset('plugins/switchery/switchery.min.js')}}"></script>

    <!--DataTables [ OPTIONAL ]-->
    <script src="{{ asset('plugins/datatables/media/js/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('plugins/datatables/media/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{ asset('plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>

    <!--DataTables Sample [ SAMPLE ]-->
    <script src="{{ asset('js/demo/tables-datatables.js')}}"></script>

    <!--Select2 [ OPTIONAL ]-->
    <script src="{{ asset('plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap-select.min.js')}}"></script>

    <!--Summernote [ OPTIONAL ]-->
    <script src="{{ asset('js/jodit.min.js') }}"></script>

    <!--Bootstrap Tags Input [ OPTIONAL ]-->
    <script src="{{ asset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>

    <!--Bootstrap Validator [ OPTIONAL ]-->
    <script src="{{ asset('plugins/bootstrap-validator/bootstrapValidator.min.js') }}"></script>

    <!--Bootstrap Wizard [ OPTIONAL ]-->
    <script src="{{ asset('plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>

    <!--Bootstrap Datepicker [ OPTIONAL ]-->
    <script src="{{ asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.25/daterangepicker.js"></script>

    <!--Form Component [ SAMPLE ]-->
    <script src="{{asset('js/demo/form-wizard.js')}}"></script>

    <!--Spectrum JavaScript [ REQUIRED ]-->
    <script src="{{ asset('js/spectrum.js')}}"></script>

    <!--Spartan Image JavaScript [ REQUIRED ]-->
    <script src="{{ asset('js/spartan-multi-image-picker-min.js') }}"></script>

    <!-- dropify -->
    <script src="{{ asset('plugins/dropify/dist/js/dropify.min.js') }}"></script>

    <!-- summernote -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <!--Custom JavaScript [ REQUIRED ]-->
    <script src="{{ asset('js/custom.js')}}"></script>

    <script type="text/javascript">

        $( document ).ready(function() {
            //$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
            if($('.active-link').parent().parent().parent().is('ul')){
                $('.active-link').parent().parent().addClass('in');
                $('.active-link').parent().parent().parent().addClass('in');
            }
            if($('.active-link').parent().parent().is('li')){
                $('.active-link').parent().parent().addClass('active-sub');
            }
            if($('.active-link').parent().is('ul')){
                $('.active-link').parent().addClass('in');
            }

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

        });

    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    @if (\App\BusinessSetting::where('type', 'google_analytics')->first()->value == 1)
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-133955404-1"></script>

        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', @php env('TRACKING_ID') @endphp);
        </script>
    @endif


</head>
<body>

    @foreach (session('flash_notification', collect())->toArray() as $message)
        <script type="text/javascript">
            $(document).on('nifty.ready', function() {
                showAlert('{{ $message['level'] }}', '{{ $message['message'] }}');
            });
        </script>
    @endforeach


    <div id="container" class="effect aside-float aside-bright mainnav-lg" style="background-color: #FCF8F0;">

        @include('inc.admin_nav')

        <div class="boxed">

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container" style="background-color: #FCF8F0;">
                <div id="page-content">

                    @yield('content')

                </div>
            </div>
        </div>

        @include('inc.admin_sidenav')

        @include('inc.admin_footer')

        @include('partials.modal')

    </div>
        <script>
            $(document).ready(function () {
                    // $('#blog').summernote('indent');
                    // $('#blog').summernote('outdent');
                    $('#blog').summernote({
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
                            ['insert', ['link', 'picture']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['height', ['height']],
                            ['view', ['fullscreen', 'codeview']],
                            'undo','redo'
                        ],
                        popover: {
                            image: [
                                ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                                ['float', ['floatLeft', 'floatRight', 'floatCenter', 'floatNone']],
                                ['remove', ['removeMedia']]
                            ]
                        },
                        lineHeights: ['0.2', '0.3', '0.4', '0.5', '0.6', '0.8', '1.0', '1.2', '1.4', '1.5', '2.0', '3.0'],
                        callbacks:{
                            onImageUpload: function(files) {
                                uploadImg(files[0])
                            },
                            onMediaDelete : function(target) {
                                deleteFile(target[0].src);
                            }
                        }
                    });

                    $('.dropify').dropify({
                        messages: {
                            'default': 'Drag and drop gambar',
                            'replace': 'Drag and drop atau click untuk mengubah gambar',
                            'remove':  'Hapus',
                            'error':   'Ooops, ada kesalahan.'
                        },

                        error: {
                            'imageFormat': 'Hanya mendukung format gambar "jpg" "png" "jpeg".'
                        }
                    });
            })

                function uploadImg(file) {
                    let imgFile = new FormData
                    imgFile.append('image', file)
                    imgFile.append('_token',"{{csrf_token()}}")

                    let url = "{{route('admin.imgUpload.ajax')}}"

                    $.ajax({
                        type:'post',
                        url:url,
                        data:imgFile,
                        dataType:'json',
                        processData:false,
                        contentType:false,
                        success: function (data) {
                            $("#blog").summernote('insertImage',data.image)
                        }
                    })
                }

                function deleteFile(link) {
                    let urL = "{{route('admin.deleteImg.ajax')}}"
                    const first = parseInt(link.indexOf("blog"))
                    const last = parseInt(link.length)
                    let src = link.slice(first,last)
                    console.log(src)
                    let data = {
                        _token:"{{csrf_token()}}",
                        src:src
                    }
                    $.post(urL, data, (res) => {
                        showAlert('success','image deleted')
                    })
                }
        </script>
        @yield('script')

</body>
</html>
