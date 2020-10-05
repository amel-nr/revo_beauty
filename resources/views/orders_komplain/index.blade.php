@extends('layouts.app')

@section('content')
@php
    $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
@endphp
<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading bord-btm clearfix pad-all h-100">
        <h3 class="panel-title pull-left pad-no">{{__('Pengajuan Komplain')}}</h3>
        <div class="pull-right clearfix">
            {{--<form class="" id="sort_orders" action="" method="GET">
                <div class="box-inline pad-rgt pull-left">
                    <div class="select" style="min-width: 300px;">
                        <select class="form-control demo-select2" name="payment_type" id="payment_type" onchange="sort_orders()">
                            <option value="">{{__('Filter berdasarkan status pembayaran')}}</option>
                            <option value="paid"  @isset($payment_status) @if($payment_status == 'paid') selected @endif @endisset>{{__('Terbayar')}}</option>
                            <option value="unpaid"  @isset($payment_status) @if($payment_status == 'unpaid') selected @endif @endisset>{{__('Belum dibayar')}}</option>
                        </select>
                    </div>
                </div>
                <div class="box-inline pad-rgt pull-left">
                    <div class="select" style="min-width: 300px;">
                        <select class="form-control demo-select2" name="delivery_status" id="delivery_status" onchange="sort_orders()">
                            <option value="">{{__('Filter berdasarkan status pengiriman')}}</option>
                            <option value="pending"   @isset($delivery_status) @if($delivery_status == 'pending') selected @endif @endisset>{{__('Pending')}}</option>
                            <option value="on_review"   @isset($delivery_status) @if($delivery_status == 'on_review') selected @endif @endisset>{{__('On review')}}</option>
                            <option value="on_delivery"   @isset($delivery_status) @if($delivery_status == 'on_delivery') selected @endif @endisset>{{__('On delivery')}}</option>
                            <option value="delivered"   @isset($delivery_status) @if($delivery_status == 'delivered') selected @endif @endisset>{{__('Delivered')}}</option>
                        </select>
                    </div>
                </div>
                <div class="box-inline pad-rgt pull-left">
                    <div class="" style="min-width: 200px;">
                        <input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="Type & Enter">
                    </div>
                </div>
            </form>--}}
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-striped res-table mar-no" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('Kode Pesanan')}}</th>
                    <th>{{__('Konsumen')}}</th>
                    <th>{{__('Masalah') }}</th>
                    <th>{{__('Solusi') }}</th>
                    <th>{{__('Status Komplain')}}</th>
                    <th width="10%">{{__('Opsi')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders_komplain as $key => $item)
                <tr>
                    <td>
                    {{ ($key+1) + ($orders_komplain->currentPage() - 1)*$orders_komplain->perPage() }}
                    </td>
                    <td>{{ $item->order->code }}</td>
                    <td>{{ $item->order->user->name }} {{ $item->order->user->last_name }}</td>
                    <td>
                        {{ $item->masalah->param_2 }}
                    </td>
                    <td>
                        <label></label>
                        {{ $item->solusiKomplain->param_2 }}
                    </td>
                    <td>
                        <label class="badge badge-pill {{  $item->statusKomplain->param_4 }}">
                        {{ $item->statusKomplain->param_2 }}
                        </label>
                    </td>
                    <td>
                        
                        <a class="btn btn-sm btn-primary" href="{{ route('komplain.detail',encrypt($item->id)) }}" >
                            <i class="fa fa-eye"></i> Lihat
                        </a>
                    </td>
                </tr> 
                @endforeach
            </tbody>
        </table>
        <div class="clearfix">
            <div class="pull-right">
                {{ $orders_komplain->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
</div>

@endsection


@section('script')
    <script type="text/javascript">
        function sort_orders(el){
            $('#sort_orders').submit();
        }
    </script>
@endsection
