@extends('layouts.app')

@section('content')
    <!-- Basic Data Tables -->
    <!--===================================================-->
    <div class="panel">
        <div class="panel-heading bord-btm clearfix pad-all h-100">
            <h3 class="panel-title pull-left pad-no">{{__('Pembayaran Affiliate')}}</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped res-table mar-no" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('Nama')}}</th>
                    <th>{{__('Email')}}</th>
                    <th>{{__('Jenis') }}</th>
                    <th>{{ __('Komisi') }}</th>
                    <th>{{__('Status')}}</th>
                    <th width="10%">{{__('Opsi')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($affiliatePayment as $key => $affiliate_payment)
                    @if($affiliate_payment->user != null)
                        <tr>
                            <td>{{ ($key+1) + ($affiliatePayment->currentPage() - 1)*$affiliatePayment->perPage() }}</td>
                            <td>{{$affiliate_payment->user->name}}</td>
                            <td>{{$affiliate_payment->user->email}}</td>
                            <td>{{$affiliate_payment->userAffiliate->jenis }} </td>
                            <td>
                                @if ($affiliate_payment->amount >= 0)
                                    {{ single_price($affiliate_payment->amount) }}
                                @endif
                            </td>
                             <td >
                                 @if($affiliate_payment->status == 'unpaid')
                                 <span class="pull-center badge badge-warning">Belum dibayar</span>
                                 @elseif($affiliate_payment->status == 'paid')
                                 <span class="pull-center badge badge-success">Terbayar</span>
                                 @endif
                             </td>
                            <td>
                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                    {{__('Aksi')}} <i class="dropdown-caret"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a onclick="show_payment_modal('{{$affiliate_payment->id}}');">{{__('Bayar Sekarang')}}</a></li>
                                    <li><a href="#">{{__('Informasi Influencer')}}</a></li>
                                </ul>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            <div class="clearfix">
                <div class="pull-right">
                    {{ $affiliatePayment->appends(request()->input())->links() }}
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="payment_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-content">

            </div>
        </div>
    </div>

    <div class="modal fade" id="profile_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-content">

            </div>
        </div>
    </div>


@endsection

@section('script')
    <script type="text/javascript">
        function show_payment_modal(id){
            $.post('{{ route('affiliate_user.payment_modal') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
                $('#payment_modal #modal-content').html(data);
                $('#payment_modal').modal('show', {backdrop: 'static'});
                $('.demo-select2-placeholder').select2();


                $("#gambar-pembayaran").spartanMultiImagePicker({
                    fieldName:        'photos[]',
                    maxCount:         3,
                    rowHeight:        '200px',
                    groupClassName:   'col-md-4 col-sm-4 col-xs-6',
                    maxFileSize:      '',
                    dropFileLabel : "Drop Here",
                    onExtensionErr : function(index, file){
                        console.log(index, file,  'extension err');
                        alert('Please only input png or jpg type file')
                    },
                    onSizeErr : function(index, file){
                        console.log(index, file,  'file size too big');
                        alert('File size too big');
                    }
                });
                $('.remove-files').on('click', function(){
                    $(this).parents(".col-md-4").remove();
                });
            });
        }

        function update_approved(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('affiliate_user.approved') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Approved sellers updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }

        // function sort_sellers(el){
        //     $('#sort_sellers').submit();
        // }
    </script>
@endsection
