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
            <form action="{{route('admin.blog.store')}}" method="post" class="form-horizontal" id="formblog" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="panel-body">
                
                    <div class="form-group">
                        <label class="col-sm-2 control-label switch" for="show">
                            <input type="checkbox" value="1" name="show" id="show">
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <input type="hidden" name="writer" value="{{Auth::user()->id}}">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="title">{{__('Judul')}}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" value="" placeholder="{{__('Judul')}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="recommendation">{{__('Rekomendasi Produk (Maks. 4)')}}</label>
                        <div class="col-sm-10">
                        <select name="recommend[]" class="selectpicker" data-title="Tidak ada yang terpilih" data-selected-text-format="count" data-count-selected-text="{0} produk rekomendasi" data-show-subtext="true" data-live-search="true" data-max-options="4" data-selected-text-format="count > 2" multiple>
                            <option disabled data-subtext="Rekomendasi">Rekomendasi Produk</option>
                            @php($products = App\Product::all())
                            @foreach($products as $key => $product)
                            <option value="{{$product->id}}" data-subtext="{{$product->category->name}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="Category">{{__('Kategori')}}</label>
                        <div class="col-sm-10">
                            <select name="category" class="custom-select form-control">
                                <option selected disabled>Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">{{__('Thumbnail')}}</label>
                            <div class="col-sm-10">
                            <input type="file" name="thumbnail" id="thumbnail" class="dropify" data-max-file-size="3M" data-allowed-file-extensions="jpg png jpeg" required>
                            </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-2 control-label" for="name">{{__('Konten')}}</label>
                    <div class="col-sm-10">
                        <textarea class="content" id="blog" name="content" required></textarea>
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

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
<script>
        $(".bs-placeholder").attr('title',"pilih produk rekomendasi")
    $(document).ready(function () {
        $(".bs-placeholder").attr('title',"pilih produk rekomendasi")
    })
</script>
@endsection
