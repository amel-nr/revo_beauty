@extends('layouts.app')

@section('content')
@php
    $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
    $status_bayar = \App\Models\Mvariable::where(['var_id' => 'status_bayar'])->get();
    $status_kirim = \App\Models\Mvariable::where(['var_id' => 'status_kirim'])->get();
@endphp
<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading bord-btm clearfix pad-all h-100">
        <h3 class="panel-title pull-left pad-no">{{__('Pemesanan')}}</h3>
        <div class="pull-right clearfix">
            <form class="" id="sort_orders" action="" method="GET">
                <div class="box-inline pad-rgt pull-left">
                    <div class="select" style="min-width: 300px;">
                        <select class="form-control demo-select2" name="payment_type" id="payment_type" onchange="sort_orders()">
                            <option value="">{{__('Filter berdasarkan status pembayaran')}}</option>
                           @foreach ($status_bayar as $key => $value)
                                @if($payment_status ==  $value->param_1)
                                 <option value="{{ $value->param_1 }}" selected>{{ $value->param_2 }}</option>
                                @else
                                <option value="{{ $value->param_1 }}">{{ $value->param_2 }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="box-inline pad-rgt pull-left">
                    <div class="select" style="min-width: 300px;">
                        <select class="form-control demo-select2" name="delivery_status" id="delivery_status" onchange="sort_orders()">
                            <option value="">{{__('Filter berdasarkan status pengiriman')}}</option>
                            @foreach ($status_kirim as $key => $value)
                             @if($delivery_status ==  $value->param_1)
                             <option value="{{ $value->param_1 }}" selected>{{ $value->param_2 }}</option>
                             @else
                             <option value="{{ $value->param_1 }}">{{ $value->param_2 }}</option>
                             @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="box-inline pad-rgt pull-left">
                    <div class="" style="min-width: 200px;">
                        <input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="Ketik & Enter">
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
                    <th>{{__('Kode Pemesanan')}}</th>
                    {{--<th>{{__('Num. of Products')}}</th>--}}
                    <th>{{__('Pelanggan')}}</th>
                    <th>{{__('Jumlah')}}</th>
                    <th>{{__('Status Pengiriman')}}</th>
                    <th>{{__('Metode Pembayaran')}}</th>
                    <th>{{__('Status Pembayaran')}}</th>
                    @if ($refund_request_addon != null && $refund_request_addon->activated == 1)
                        <th>{{__('Pengembalian')}}</th>
                    @endif
                    <th width="10%">{{__('Opsi')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $key => $order_id)
                    @php
                        $order = \App\Order::find($order_id->id);
                        $status_order = \App\Models\Mvariable::where(['var_id' => 'status_order','param_1' => $order->payment_status,'param_2' => $order->delivery_status ])->first();

                    @endphp
                    @if($order != null)
                        <tr>
                            <td>
                                {{ ($key+1) + ($orders->currentPage() - 1)*$orders->perPage() }}
                            </td>
                            <td>
                                {{ $order->code }} @if($order->viewed == 0) <span class="pull-right badge badge-info">{{ __('New') }}</span> @endif
                            </td>
                            {{--<td>
                                {{ count($order->orderDetails->where('seller_id', $admin_user_id)) }}
                            </td>--}}
                            <td>
                                @if ($order->user_id != null)
                                    {{ $order->user->name }}
                                @else
                                    Guest ({{ $order->guest_id }})
                                @endif
                            </td>
                            <td>
                                {{ single_price($order->grand_total+ $order->orderDetails->sum('tax')) }}
                            </td>
                            <td>
                                @foreach ($status_kirim as $key => $value)
                                 @if($order->delivery_status ==  $value->param_1)
                                     {{ $value->param_2 }}
                                 @endif
                                @endforeach
                            </td>
                            <td>
                                @if($order->payment_type == 'mt_tf_bca')
                                BCA Virtual Account
                                @elseif($order->payment_type == 'mt_tf_mdr')
                                Mandiri Virtual Account
                                @elseif($order->payment_type == 'mt_tf_bni')
                                BNI Virtual Account
                                @elseif($order->payment_type == 'mt_tf_permata')
                                Permata Virtual Account
                                @elseif($order->payment_type == 'manual_bca')
                                BCA Transfer Manual
                                @elseif($order->payment_type == 'manual_mandiri')
                                Mandiri Transfer Manual
                                @elseif($order->payment_type == 'manual_permata')
                                Permata Transfer Manual
                                @elseif($order->payment_type == 'ovo')
                                OVO
                                @elseif($order->payment_type == 'gopay')
                                GO-PAY
                                @elseif($order->payment_type == 'Indomaret')
                                Indomaret
                                @elseif($order->payment_type == 'alfamart')
                                Alfamart
                                @elseif($order->payment_type == 'qris')
                                QRIS
                                @endif
                            </td>
                            <td>
                                <span class="badge badge--2 mr-4">
                                     @if(isset($status_order))
                                         {{ $status_order->param_3 }}
                                    @endif
                                </span>
                            </td>
                            @if ($refund_request_addon != null && $refund_request_addon->activated == 1)
                                <td>
                                    @if (count($order->refund_requests) > 0)
                                        {{ count($order->refund_requests) }} Ya
                                    @else
                                        Tidak
                                    @endif
                                </td>
                            @endif
                            <td>
                                <div class="btn-group dropdown">
                                    <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                        {{__('Aksi')}} <i class="dropdown-caret"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{ route('orders.show', encrypt($order->id)) }}">{{__('Lihat')}}</a></li>
                                        <li><a href="{{ route('admin.invoice.download', $order->id) }}">{{__('Download Invoice')}}</a></li>
                                        <li><a onclick="confirm_modal('{{route('orders.destroy', $order->id)}}');">{{__('Hapus')}}</a></li>
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
                {{ $orders->appends(request()->input())->links() }}
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
