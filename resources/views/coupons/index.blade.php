@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('coupon.create')}}" class="btn btn-rounded btn-info pull-right">{{__('Tambah Kupon')}}</a>
        </div>
    </div><br>
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{__('Informasi Kupon')}}</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{__('Nama Kupon')}}</th>
                        <th>{{__('Kode Kupon')}}</th>
                        <th>{{__('Jenis')}}</th>
                        <th>{{__('Tanggal Mulai')}}</th>
                        <th>{{__('Tanggal Berakhir')}}</th>
                        <th width="10%">{{__('Opsi')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($coupons as $key => $coupon)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                <div class="media-left">
                                    <img loading="lazy"  class="img-md" src="{{ asset($coupon->banner)}}" alt="Image">
                                </div>
                                <div class="media-body" style="width: 50px;">{{ __($coupon->title) }}</div>
                            </td>
                            <td>{{ __($coupon->code) }}</td>
                            <td>@if ($coupon->type == 'cart_base')
                                    {{ __('Total Belanja') }}
                                @elseif ($coupon->type == 'product_base')
                                    {{ __('Produk') }}
                            @endif</td>
                            <td>{{ date('d-m-Y', $coupon->start_date) }}</td>
                            <td>{{ date('d-m-Y', $coupon->end_date) }}</td>
                            <td>
                                <div class="btn-group dropdown">
                                    <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                        {{__('Aksi')}} <i class="dropdown-caret"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{route('coupon.edit', encrypt($coupon->id))}}">{{__('Ubah')}}</a></li>
                                        <li><a onclick="confirm_modal('{{route('coupon.destroy', $coupon->id)}}');">{{__('Hapus')}}</a></li>
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
