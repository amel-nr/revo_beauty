@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 pull-right">
        <a href="{{ url('pointproduct/create')}}" class="btn btn-rounded btn-info pull-right">{{__('Tambah Poin Produk Baru')}}</a>
    </div>
</div>

<br>

<div class="panel">
    <!--Panel heading-->
    <div class="panel-heading bord-btm clearfix pad-all h-100">
        <h3 class="panel-title pull-left pad-no">Daftar Poin Produk</h3>
        <div class="pull-right clearfix">
            <form class="" id="sort_products" action="" method="GET">
                <div class="box-inline pad-rgt pull-left">
                    <div class="" style="min-width: 200px;">
                        <input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="Ketik nama poin produk">
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="panel-body">
        <table class="table table-striped res-table mar-no" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th width="20%">{{__('Produk')}}</th>
                    <th>{{__('Poin')}}</th>
                    <th>{{__('Tampilkan')}}</th>
                    <th>{{__('Opsi')}}</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($data as $key => $value)
                <tr>
                    <td>{{ $key+1}}</td>
                    <td>
                        <a href="{{ route('product', $value->product->slug) }}" target="_blank" class="media-block">
                            <div class="media-left">
                                <img loading="lazy"  class="img-md" src="{{ asset($value->product->thumbnail_img)}}" alt="Image">
                            </div>
                            <div class="media-body">{{ __($value->product->name) }}</div>
                        </a>
                    </td>
                    <td>{{ $value->jml_point }}</td>
                    <td><label class="switch">
                                <input onchange="update_published(this)" value="{{ $value->id }}" type="checkbox" <?php if($value->is_publish == 1) echo "checked";?> >
                                <span class="slider round"></span>
                        </label>
                    </td>
                    <td>
                        <div class="btn-group dropdown">
                            <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                {{__('Aksi')}} <i class="dropdown-caret"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                
                                <li><a href="{{route('pointproduct.edit', encrypt($value->id))}}">{{__('Ubah')}}</a></li>
                              
                                <li><a onclick="confirm_modal('{{route('pointproduct.destroy', $value->id)}}');">{{__('Hapus')}}</a></li>
                            </ul>
                        </div>
                    </td>

                </tr>    
               @endforeach
            </tbody>
        </table>
        <div class="clearfix">
            <div class="pull-right">
                
            </div>
        </div>
    </div>
</div>

@endsection


@section('script')
    <script type="text/javascript">
        function update_published(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('pointproduct.published') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Published updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }
       

    </script>
@endsection
