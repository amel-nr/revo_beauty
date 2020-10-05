@extends('frontend.layouts.app')
@section('style')
    <style>
        .member{
            font-family: rage-italic, "Open Sans", sans-serif !important;
            font-size: 152px;
            color: white;
            }
    </style>
@endsection
@section('content')
    @php
    $point_user = \App\ClubPoint::where('user_id',Auth::user()->id)->where('points','>',0)->orderBy('created_at','desc')->get(); 
    @endphp

    <section class="gry-bg pb-4 profile" style="background-color: #FCF8F0;">
        <h1 class="font-weight-bold h3 mb-5 py-5 text-center" style="background-color: #F3795C; color: white;">PHOEBE’S SQUAD</h1>
        @include('frontend.inc.account_mobile_menu')
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-3 d-none d-lg-block">
                    @if(Auth::user()->user_type == 'seller')
                        @include('frontend.inc.seller_side_nav')
                    @elseif(Auth::user()->user_type == 'customer')
                        @include('frontend.inc.customer_side_nav')
                    @endif
                </div>

                <div class="col-lg-9">
                    <div class="text-center" style="border-bottom: 1px solid #F3795C;">
                        <h1 class="title-address py-2 mb-0 font-weight-bold heading heading-4">POINT HISTORY</h1>
                    </div>
                            @php
                                $u_log_mmbr = \App\Membership_user_log::where('user_id',Auth::user()->id)->with('membership')->orderBy('created_at','desc')->first();
                                //dd($u_log_mmbr);
                                $tier_name = $u_log_mmbr->membership->title;
                                //dd($u_log_mmbr);
                            @endphp
                    <div class="row pt-4">
                        <div class="col-md-5 col-12">
                            <div class="mt-3 py-4 text-center" style="background-color: #f3795c; height: 140px;">
                                <p class="mt-3 member" style="font-size: 50px; text-transform: capitalize;">{{$tier_name}}</p>
                                <p class="mb-2 mx-4" style="color: white; font-size: 17px; text-transform:uppercase;">skin</p>
                                <p class="mb-0 mt-2 text-center" style="color: white; font-weight: 600; font-size: 16px;">{{ Auth::user()->point }} POINTS</p>
                            </div>

                            <div class="py-3" style="background-color: white;">
                                <div class="row mx-2">
                                    <div class="col-4">
                                        <p class="text-center mb-0" style="font-weight: 600; font-size: 10px; color: black; line-height: 12px;">{{Auth::user()->name.' '.Auth::user()->last_name}}</p>
                                    </div>
                                    <div class="col-4">
                                        <p class="text-center mb-0" style="font-weight: 600; font-size: 10px; color: black; line-height: 12px;">Berlaku hingga</p> 
                                        <p class="text-center mb-0" style="font-weight: 600; font-size: 10px; color: black; line-height: 12px;">21 Mei 2021</p>
                                    </div>
                                    <div class="col-4">
                                        <a href="#"><p class="text-center mb-0" style="font-weight: 600; font-size: 10px; color: black; line-height: 12px;"><u>Riwayat Poin</u></p></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-3 text-right">
                        <div class="dropdown">
                            <button class="btn btn-danger dropdown-toggle filter-reward-button rounded" type="button" id="dropdownPointHistoryFilter" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #fcf8F0; border-color: #f3795c; color: #f3795c;">Tampilkan Semua</button>
                            <div class="dropdown-menu" aria-labelledby="dropdownPointHistoryFilter" style="background-color: #fcf8F0; border-color: #f3795c;">
                                <a class="dropdown-item filter-reward" href="javascript::void(0)">Tampilkan Semua</a>
                                <a class="dropdown-item filter-reward" href="javascript::void(0)">Poin yang didapat</a>
                                <a class="dropdown-item filter-reward" href="javascript::void(0)">Poin yang ditukar</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                    <table  class="table table-hover border-danger">
                        <thead style="border-bottom: 1px solid #f3795c;">
                            <tr >
                                <th style="font-weight: bold; font-size: 18px;">TANGGAL</th>
                                <th style="font-weight: bold; font-size: 18px;">POIN</th>
                                <th style="font-weight: bold; font-size: 18px;">TRANSAKSI</th>
                            </tr>
                            
                        </thead>

                       
                        <tbody>
                            <?php foreach ($point_user as $key => $value): ?>
                            <tr>
                                <td style="font-size: 17px;">{{ $value->created_at }}</td>
                                <td style="font-size: 17px;">{{ $value->points }}</td>
                                <td style="font-size: 17px;">{{ $value->keterangan }}</td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr style="background-color: #f3795c;color: white; font-size: 17px;">
                                <td >
                                    TOTAL
                                </td>
                                <td>
                                    {{ $point_user->sum('points') }}
                                </td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $(".filter-reward").click(function(){
                $(".filter-reward-button").text(this.text);
            });
        });
    </script>
@endsection