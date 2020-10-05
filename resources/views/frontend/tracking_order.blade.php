@extends('frontend.layouts.app')

@section('content')

    <section class="gry-bg py-4 profile" style="background-color: #FCF8F0;">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-9 mx-auto">
                    <div class="main-content">
                        <!-- Page title -->
                        <div class="text-center">
                            <h1 class="title-address py-2 mb-0 font-weight-bold heading heading-4">TRACKING ORDER</h1>
                        </div>
                        <div class="p-3 my-4" style="background-color: #F3795C; color: white !important;">
                            <div class="d-inline-block align-top">
                                <i class="fa fa-truck" aria-hidden="true" style="font-size: 20px;"></i>
                            </div>
                            <div class="d-inline-block ml-2">
                                <p class="mb-1 font-weight-bold" style="font-size: 20px;">{{ isset($tracking->result) ?  $tracking->result->summary->courier_name : $jenis}}</p>
                                <p class="mb-0">Tracking Number: {{ isset($tracking->result) ? $tracking->result->summary->waybill_number : $resi}}</p>
                            </div>
                        </div>
                        <ul class="list-group mb-5">
                            @if(isset($tracking->result))
                            @php
                            $listManifest= $tracking->result->manifest;
                            @endphp
                            @for ($i= count($listManifest)-1; $i >= 0; $i--)
                               
                                <li class="list-group-item list-tracking-order {{ count($listManifest)-1 == $i ? 'list-tracking-active' : '' }}">
                                    <table>
                                        <tr>
                                            <td class="align-middle">
                                                <i class="fa fa-circle" aria-hidden="true" style="font-size: 16px;"></i>
                                            </td>
                                            <td>
                                                <p class="mb-1 ml-3">{{ $listManifest[$i]->manifest_description }}</p>
                                                <p class="mb-0 ml-3">{{ $listManifest[$i]->manifest_date }} {{ $listManifest[$i]->manifest_time }}</p>
                                            </td>
                                        </tr>
                                    </table>
                                </li>
                            @endfor
                            @else
                            - Belum ada data tersedia.

                            @endif
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
