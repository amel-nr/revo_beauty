@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('subsubcategories.create')}}" class="btn btn-rounded btn-info pull-right">{{__('Tambah Sub Sub Kategori Baru')}}</a>
    </div>
</div>

<br>

<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading bord-btm clearfix pad-all h-100">
        <h3 class="panel-title pull-left pad-no">{{__('Sub Sub Kategori')}}</h3>
        <div class="pull-right clearfix">
            <form class="" id="sort_subsubcategories" action="" method="GET">
                <div class="box-inline pad-rgt pull-left">
                    <div class="" style="min-width: 200px;">
                        <input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="Ketik nama sub sub kategori">
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
                    <th>{{__('Sub Sub Kategori')}}</th>
                    <th>{{__('Sub Kategori')}}</th>
                    <th>{{__('Kategori')}}</th>
                    {{-- <th>{{__('Attributes')}}</th> --}}
                    <th width="10%">{{__('Opsi')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subsubcategories as $key => $subsubcategory)
                    @if ($subsubcategory->subcategory != null && $subsubcategory->subcategory->category != null)
                        <tr>
                            <td>{{ ($key+1) + ($subsubcategories->currentPage() - 1)*$subsubcategories->perPage() }}</td>
                            <td>{{__($subsubcategory->name)}}</td>
                            <td>{{$subsubcategory->subcategory->name}}</td>
                            <td>{{$subsubcategory->subcategory->category->name}}</td>
                            <td>
                                <div class="btn-group dropdown">
                                    <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                        {{__('Aksi')}} <i class="dropdown-caret"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{route('subsubcategories.edit', encrypt($subsubcategory->id))}}">{{__('Ubah')}}</a></li>
                                        <li><a onclick="confirm_modal('{{route('subsubcategories.destroy', $subsubcategory->id)}}');">{{__('Hapus')}}</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        <div class="clearfix">
            <div class="pull-right">
                {{ $subsubcategories->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
