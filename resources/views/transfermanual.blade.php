@extends('layouts.app')

@php
    $step = DB::table("transfer_manual")->first();
@endphp

@section('content')
<div class="row">
    <div class="col-lg-offset">
        <div class="panel">
        <h3 class="panel-title">{{__('Rekening Bank Lain')}}</h3>
            <div class="panel-body">
                    <form action="{{route('admin.transfer.manual')}}" method="post">
                    @csrf
                        <div class="col-lg" style="margin-bottom: 4px;">
                            <input type="text" name="nama_bank" class="form-control" value="{{ env('MANUAL_LAIN_BANK') }}"  placeholder="{{__('Nama Bank')}}" style=" border: 1px solid rgb(197 170 170);" required>
                        </div>
                        <div class="col-lg" style="margin-bottom: 4px;">
                            <input type="text" name="rek_bank" class="form-control" value="{{ env('MANUAL_LAIN_REK') }}"  placeholder="{{__('Nomor Rekening')}}" style=" border: 1px solid rgb(197 170 170);" required>
                        </div>
                        <div class="col-lg" style="margin-bottom: 4px;">
                            <input type="text" name="an_bank" class="form-control" value="{{ env('MANUAL_LAIN_AN') }}"   placeholder="{{__('Atas nama')}}" style=" border: 1px solid rgb(197 170 170);" required>
                        </div>

                        <div class="col-lg">
                            <textarea type="text" name="step" id="step" required>{{$step != null ? $step->step : ''}}</textarea>
                            <input type="hidden" name="id" value="{{$step->id}}">
                        </div>
                        <button type="submit" class="btn btn-primary" style="float:right">simpan</button>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section("script")
    <script>
        $(document).ready(function () {
                    // $('#blog').summernote('indent');
                    // $('#blog').summernote('outdent');
                    $('#step').summernote({
                        shortcuts: false,
                        indent:true,
                        outdent:true,
                        tabDisable: false,
                        placeholder: 'Start writing...',
                        height: 125,
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
                            'undo','redo']
                    });
        });
    </script>
@endsection