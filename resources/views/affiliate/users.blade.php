@extends('layouts.app')

@section('content')
    <!-- Basic Data Tables -->
    <!--===================================================-->
    <div class="panel">
        <div class="panel-heading bord-btm clearfix pad-all h-100">
            <h3 class="panel-title pull-left pad-no">{{__('Pengguna Affiliate')}}</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped res-table mar-no" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('Nama')}}</th>
                    <th>{{__('No. Telepon')}}</th>
                    <th>{{__('Email')}}</th>
                    <th>{{__('Jenis') }}</th>
                    <th>{{__('Informasi Verifikasi')}}</th>
                    <th>{{__('Persetujuan')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($affiliate_users as $key => $affiliate_user)
                    @if($affiliate_user->user != null)
                        <tr>
                            <td>{{ ($key+1) + ($affiliate_users->currentPage() - 1)*$affiliate_users->perPage() }}</td>
                            <td>{{$affiliate_user->user->name}}</td>
                            <td>{{$affiliate_user->user->phone}}</td>
                            <td>{{$affiliate_user->user->email}}</td>
                            <td>{{$affiliate_user->jenis }} </td>
                            <td>
                                <a href="{{ route('affiliate_users.show_verification_request', $affiliate_user->id) }}">
                                    <div class="label label-table label-info">
                                        {{__('Tampilkan')}}
                                    </div>
                                </a>
                            </td>
                            <td>
                                <label class="switch">
                                    <input onchange="update_approved(this)" value="{{ $affiliate_user->id }}" type="checkbox" <?php if($affiliate_user->status == 1) echo "checked";?> >
                                    <span class="slider round"></span>
                                </label>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            <div class="clearfix">
                <div class="pull-right">
                    {{ $affiliate_users->appends(request()->input())->links() }}
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
