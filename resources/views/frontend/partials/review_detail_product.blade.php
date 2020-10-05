@php
$offset = isset($offset) ? $offset : 4;
$reviews = isset($type) && $type == 'all' ? 
\App\Models\Review::where('product_id',$id)->orderBy('created_at', 'asc')->with('user')->offset($offset)->limit(4)->get():
\App\Models\Review::where('product_id',$id)->orderBy('created_at', 'asc')->with('user')->take(4)->get();

@endphp
@foreach ($reviews as $key => $value)
<div class="container p-4 mt-4 rounded" style="border: 1px solid #F3795C; background-color: #FDEDE3;">
    <div class="row px-3">
        <div class="col-1 p-0">
            @if($value->user != null)
            <div id="avatar-review-container">
                <div id="avatar-review-dummy"></div>
                <div id="avatar-review-element" class="rounded-circle" style="background-image: url('{{ isset($value->user->avatar_original) ? asset($value->user->avatar_original) : image_avatar($value->user->gender) }}'); background-repeat: no-repeat; background-size: cover; background-position: center; width: 100%;"></div>
            </div>
            <!-- <img src="{{ isset($value->user->avatar_original) ? asset($value->user->avatar_original) : image_avatar($value->user->gender) }}" class="rounded-circle img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width: 100%;"> -->
            @else
            <img src="{{ image_avatar('L') }}" class="rounded-circle img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width: 100%;">
            @endif

        </div>
        <div class="col-11">
            <h1 class="font-weight-bold h6 py-2 m-0">{{ $value->user->name }} {{ $value->user->last_name }}</h1>
            <table><tbody>
                <tr>
                    <td> <input type="hidden" class="rating rating-product" data-filled="fa fa-heart custom-heart" data-empty="fa fa-heart custom-heart-empty" value="{{ $value->rating }}" disabled="disabled"/></td>
                    <td>
                        @if($value->status_beli == 1)
                        <span class="badge badge-light ml-2" style="font-size: 90%; background-color: white; vertical-align: super;">Verified by Phoebe</span>
                        @endif
                    </td>
                </tr>
            </tbody></table>
            <p>{{ $value->comment }}</p>
            <div class="row">
                @php
                $photos =  json_decode($value->photos);
                @endphp
                @if(isset($photos) && count($photos) > 0)
                @foreach ($photos as $key => $photo)

                <div class="col-2 pr-0">
                    <img src="{{ asset($photo) }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                </div>
                @endforeach
                @endif


            </div>
        </div>
    </div>
</div>
@endforeach

