@extends('layouts.app')


@section('content')
    <div class="col-lg col-lg-offset">
                    <a href="{{route('admin.blog.manage')}}" class="panel-title"><i class="fa fa-arrow-left"></i></a>
        <div class="panel">

            <div class="panel-heading">
                <h3 class="panel-title">{{__('Blog')}}</h3>
            </div>

            <!--Horizontal Form-->
            <!--===================================================-->
            <form action="{{route('admin.blog.update',['id'=>$blog->id])}}" method="post" class="form-horizontal" id="formblog" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('put')
                <div class="panel-body">
                
                    <div class="form-group">
                        <label class="col-sm-2 control-label switch" for="show">
                            <input type="checkbox" value="1" name="show" id="show" {{$blog->showblog == 1 ? 'checked' : ''}}>
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <input type="hidden" name="writer" value="{{$blog->user_id}}">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="title">{{__('Judul')}}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" placeholder="{{__('Judul')}}" value="{{$blog->title}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="recommendation">{{__('Rekomendasi Produk (Maks. 4)')}}</label>
                        <div class="col-sm-10">
                        <select name="recommend[]" class="selectpicker" data-show-subtext="true" data-live-search="true" data-max-options="4" data-selected-text-format="count > 2" multiple>
                            <option disabled data-subtext="Rekomendasi">Rekomendasi Produk</option>
                            @php
                            $products = App\Product::all();
                            @endphp
                            @foreach($products as $key => $product)
                                @php
                                    $check = '';
                                    if(isset($blog->pr)){
                                        if(in_array($product->id , $blog->pr)){
                                            $check = 'selected';
                                            }
                                        }
                                @endphp
                            <option value="{{$product->id}}" data-subtext="{{$product->category->name}}" {{ $check }} >{{$product->name}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="Category">{{__('Kategori')}}</label>
                        <div class="col-sm-10">
                            <select name="category" class="custom-select form-control">
                                <option selected disabled>Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{$blog->categoryblog_id == $category->id ? 'selected' : ''}}>{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">{{__('Thumbnail')}}</label>
                            <div class="col-sm-10">
                            <input type="hidden" name="old_thumbnail" value="{{$blog->thumbnail}}">
                            <input type="file" name="thumbnail" id="thumbnail" class="dropify" data-max-file-size="3M" data-allowed-file-extensions="jpg png jpeg" data-default-file="{{asset('blog/thumbnail').'/'.$blog->thumbnail}}">
                            </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-2 control-label" for="name">{{__('Konten')}}</label>
                    <div class="col-sm-10">
                        <textarea id="blog" name="content" required>{!! $blog->content !!}</textarea>
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
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
<script>

</script>
@endsection
