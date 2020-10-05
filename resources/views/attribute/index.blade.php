@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('attributes.create')}}" class="btn btn-rounded btn-info pull-right">{{__('Tambah Atribut Produk')}}</a>
    </div>
</div>

<br>

<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">{{__('Atribut Produk')}}</h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('Nama')}}</th>
                    <th width="10%">{{__('Opsi')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attributes as $key => $attribute)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$attribute->name}}</td>
                        <td>
                            <div class="btn-group dropdown">
                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                    {{__('Aksi')}} <i class="dropdown-caret"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="{{route('attributes.edit', encrypt($attribute->id))}}">{{__('Ubah')}}</a></li>
                                    <li><a onclick="confirm_modal('{{route('attributes.destroy', $attribute->id)}}');">{{__('Hapus')}}</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection
