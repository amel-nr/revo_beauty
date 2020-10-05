@extends('layouts.app')

@section('content')

<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">{{__('Verifikasi Pengguna Affiliate')}}</h3>
    </div>
    <div class="panel-body">
        <div class="col-md-4">
            <div class="panel-heading">
                <h3 class="text-lg">{{__('Informasi Pengguna')}}</h3>
            </div>
            <div class="row">
                <label class="col-sm-3 control-label" for="name">{{__('Nama')}}</label>
                <div class="col-sm-9">
                    <p>{{ $affiliate_user->user->name }}</p>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-3 control-label" for="name">{{__('Email')}}</label>
                <div class="col-sm-9">
                    <p>{{ $affiliate_user->user->email }}</p>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-3 control-label" for="name">{{__('Alamat')}}</label>
                <div class="col-sm-9">
                    <p>{{ $affiliate_user->user->address }}</p>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-3 control-label" for="name">{{__('No. Telepon')}}</label>
                <div class="col-sm-9">
                    <p>{{ $affiliate_user->user->phone }}</p>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-3 control-label" for="name">{{__('Kategori')}}</label>
                <div class="col-sm-9">
                    <p>{{ $affiliate_user->jenis }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel-heading">
                <h3 class="text-lg">{{__('Informasi Verifikasi')}}</h3>
            </div>
            <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                <tbody>
                        @if($affiliate_user->jenis == 'influencer')
                        <tr>
                            <th>{{__('No. Telepon PIC')}}</th>
                            <td>{{ $affiliate_user->nomor_hp_pic }}</td>
                        </tr>
                        <tr>
                            <th>{{__('Username Instagram')}}</th>
                            <td>{{ $affiliate_user->ig_username }}</td>
                        </tr>
                        <tr>
                            <th>{{__('Username Facebook')}}</th>
                            <td>{{ $affiliate_user->fb_username }}</td>
                        </tr>
                        <tr>
                            <th>{{__('Username Twitter')}}</th>
                            <td>{{ $affiliate_user->tw_username }}</td>
                        </tr>
                        <tr>
                            <th>{{__('Username Youtube')}}</th>
                            <td>{{ $affiliate_user->yt_username }}</td>
                        </tr>
                        @else
                        <tr>
                            <th>{{__('No. Telepon PIC')}}</th>
                            <td>{{ $affiliate_user->nomor_hp_pic }}</td>
                        </tr>
                        <tr>
                            <th>{{__('Nama Perusahaan')}}</th>
                            <td>{{ $affiliate_user->nama_perusahaan }}</td>
                        </tr>
                        <tr>
                            <th>{{__('Alamat Perusahaan')}}</th>
                            <td>{{ $affiliate_user->alamat_perusahaan }}</td>
                        </tr>
                        <tr>
                            <th>{{__('No. Telepon Perusahaan')}}</th>
                            <td>{{ $affiliate_user->nomor_hp_perusahaan }}</td>
                        </tr>
                        <tr>
                            <th>{{__('Deskripsi Produk')}}</th>
                            <td>{{ $affiliate_user->deskripsi_produk }}</td>
                        </tr>

                        @endif
                        
                    
                </tbody>
            </table>
            <div class="text-center">
                <a href="{{ route('affiliate_user.reject', $affiliate_user->id) }}" class="btn btn-default d-innline-block">{{__('Tolak')}}</a></li>
                <a href="{{ route('affiliate_user.approve', $affiliate_user->id) }}" class="btn btn-primary d-innline-block">{{__('Setujui')}}</a>
            </div>
        </div>
    </div>
</div>

@endsection
