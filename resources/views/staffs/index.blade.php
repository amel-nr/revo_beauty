@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('staffs.create')}}" class="btn btn-rounded btn-info pull-right">{{__('Tambah Staff')}}</a>
    </div>
</div>

<br>

<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">{{__('Daftar Staff')}}</h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th width="10%">#</th>
                    <th>{{__('Nama')}}</th>
                    <th>{{__('Email')}}</th>
                    <th>{{__('No. Telepon')}}</th>
                    <th>{{__('Hak Akses')}}</th>
                    <th width="10%">{{__('Opsi')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($staffs as $key => $staff)
                    @if($staff->user != null)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$staff->user->name}}</td>
                            <td>{{$staff->user->email}}</td>
                            <td>{{$staff->user->phone}}</td>
                            <td>{{$staff->role->name}}</td>
                            <td>
                                <div class="btn-group dropdown">
                                    <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                        {{__('Aksi')}} <i class="dropdown-caret"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{route('staffs.edit', encrypt($staff->id))}}">{{__('Ubah')}}</a></li>
                                        <li><a onclick="confirm_modal('{{route('staffs.destroy', $staff->id)}}');">{{__('Hapus')}}</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection
