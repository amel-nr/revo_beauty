@extends('layouts.app')


@section('style')
<style type="text/css">
    .form-check-inline{
        display: inline;
    }
</style>

@endsection

@section('content')

<div class="col-lg-6 col-lg-offset-3">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{__('Informasi Brand')}}</h3>
        </div>

        <!--Horizontal Form-->
        <!--===================================================-->
        <form class="form-horizontal" action="{{ route('brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PATCH">
        	@csrf
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="name">{{__('Nama')}}</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="{{__('Nama')}}" id="name" name="name" class="form-control" required value="{{ $brand->name }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="logo">{{__('Logo')}} <small>(120x80)</small></label>
                    <div class="col-sm-10">
                        <input type="file" id="logo" name="logo" class="form-control">
                    </div>
                </div>
                {{--<div class="form-group">
                    <label class="col-sm-2 control-label">{{__('Meta Title')}}</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="meta_title" value="{{ $brand->meta_title }}" placeholder="{{__('Meta Title')}}">
                    </div>
                </div>--}}
                <div class="form-group">
                    <label class="col-sm-2 control-label">{{__('Deskripsi')}}</label>
                    <div class="col-sm-10">
                        <textarea name="meta_description" rows="8" class="form-control">{{ $brand->meta_description }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="name">{{__('Slug')}}</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="{{__('Slug')}}" id="slug" name="slug" value="{{ $brand->slug }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="name">{{__('Jenis')}}</label>
                    <div class="col-sm-10">
                       <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis" id="inlineRadio1" value="local" required {{ isset($brand->jenis) && $brand->jenis == 'local' ? 'checked' : ''}}>
                        <label class="form-check-label" for="inlineRadio1">Lokal</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis" id="inlineRadio2" value="import" required {{ isset($brand->jenis) && $brand->jenis == 'import' ? 'checked' : ''}}>
                        <label class="form-check-label" for="inlineRadio2">Impor</label>
                    </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer text-right">
                <button class="btn btn-purple" type="submit">{{__('Simpan')}}</button>
            </div>
        </form>
        <!--===================================================-->
        <!--End Horizontal Form-->

    </div>
</div>

@endsection
