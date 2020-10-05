@foreach ($result as $key => $value)
@foreach ($value->costs as $key => $costs)
@php
	$code = $value->code;
	$service = $costs->service;
	$cost = $costs->cost[0]->value;
	$hasil = '{ "code" : "'.$code.'", "services" : "'.$service.'", "cost": "'.$cost.'"}';
@endphp
<label class="radio-container">
    <h6 class="mb-0 font-weight-bold" style="font-size: 15px;">{{ strtoupper($value->code) }} {{ $costs->service }}<span class="float-right">{{ format_price($costs->cost[0]->value) }}</span></h6>
    <p>{{ $costs->cost[0]->etd }} hari</p>
    <input type="radio" name="radio" value="{{ $hasil }}" onclick="handleCost(this);" >
    <span class="checkmark"></span>
</label>
@endforeach

@endforeach

@if(isset($swift) && $swift->success == true)
@foreach ($swift->pricing as $key => $value)
@php
	$code = $value->courier_code;
	$service = $value->courier_service_code;
	$cost = $value->price;
	$hasil = '{ "code" : "'.$code.'", "services" : "'.$service.'", "cost": "'.$cost.'"}';
@endphp
<label class="radio-container">
    <h6 class="mb-0 font-weight-bold" style="font-size: 15px;">{{ strtoupper($value->courier_name) }} {{ $value->courier_service_name }}<span class="float-right">{{ format_price($value->price) }}</span></h6>
    <p>{{ $value->duration }} </p>
    <input type="radio" name="radio" value="{{ $hasil }}" onclick="handleCost(this);" >
    <span class="checkmark"></span>
</label>
@endforeach
@endif