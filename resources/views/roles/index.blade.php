@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('roles.create')}}" class="btn btn-rounded btn-info pull-right">{{__('Tambah Hak Akses')}}</a>
    </div>
</div>

<br>

<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">{{__('Hak Akses')}}</h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th width="10%">#</th>
                    <th>{{__('Nama')}}</th>
                    <th width="10%">{{__('Opsi')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $key => $role)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$role->name}}</td>
                        <td>
                            <div class="btn-group dropdown">
                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                    {{__('Aksi')}} <i class="dropdown-caret"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="{{route('roles.edit', encrypt($role->id))}}">{{__('Ubah')}}</a></li>
                                    <li><a onclick="confirm_modal('{{route('roles.destroy', $role->id)}}');">{{__('Hapus')}}</a></li>
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
