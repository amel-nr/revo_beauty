<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerAdres;
use Auth;
use Session;
use Redirect;

class CustomerAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        //
        try {

            if ($request->id == '0' || $request->id == null) {
                # code...
                 $model = new CustomerAdres();
            }else{
                 $model = CustomerAdres::findOrFail($request->id);
            }
             // dd($request->all());
           
            $model->nama_depan = $request->nama_depan;
            $model->nama_belakang = $request->nama_belakang;
            $model->nomor_hp = $request->nomor_hp;
            $model->province_id = $request->province_id;
            $model->province = $request->province;
            $model->city_id = $request->city_id;
            $model->city_name = $request->city_name;
            $model->postal_code= $request->postal_code; 
            $model->kecamatan_id= $request->kecamatan_id;
            $model->kecamatan = $request->kecamatan;
            $model->alamat_lengkap = $request->alamat_lengkap;
            $model->lat = $request->lat;
            $model->lng = $request->lng;
            $model->user_id = Auth::user()->id;
           

            if ($model->save()) {
                  
                # code...
                if ($request->id == '0') {
                    # code...
                    flash(__('You addres created successfully'))->success();
                }else{
                     flash(__('You addres updated successfully'))->success();
                }
                return back();
            }else{
                flash(__('Something went wrong'))->error();
                return back();
            }
            
        } catch (Exception $e) {
            
            flash(__('Something went wrong'))->error();
            return back();
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //

        $model = CustomerAdres::findOrFail($request->id);
        // dd($model);
        if($model){
            $model->is_deleted = 1;
            $model->save();
            flash(__('You addres deleted successfully'))->success();
            return back();
             
        }
        else{
            flash(__('Something went wrong'))->error();
            return back();
        }
    }


    public function getDataProvisi(Request $request)
    {
        try {

            $url = "province";
            $response = request_raja_ongkir($url,"GET","");
            $result =[];
            foreach ($response as $key => $value) {
                # code...
                array_push($result, ['id' => $value->province_id ,'text' => $value->province]);
            }
            // dd($result);
            return response()->json($result, 200);

        } catch (Exception $e) {
            return  response()->json($response, 500);
        }

    }


    public function getDataKabupaten(Request $request)
    {
        try {

            $url = "city";
            if ($request->id_provinsi) {
                # code...
                $url = $url."?province=".$request->id_provinsi;
            }

            $response = request_raja_ongkir($url,"GET","");
            $result =[];
            foreach ($response as $key => $value) {
                # code...
                array_push($result, ['id' => $value->city_id ,'text' => $value->city_name]);
            }
            // dd($result);
            return response()->json($result, 200);

        } catch (Exception $e) {
            return  response()->json($response, 500);
        }

    }

    public function getDataKecamatan(Request $request)
    {
        try {

            $url = "subdistrict";
            if ($request->id_kabupaten) {
                # code...
                $url = $url."?city=".$request->id_kabupaten;
            }

            $response = request_raja_ongkir($url,"GET","");
            $result =[];
            foreach ($response as $key => $value) {
                # code...
                array_push($result, ['id' => $value->subdistrict_id ,'text' => $value->subdistrict_name ]);
            }
            // dd($result);
            return response()->json($result, 200);

        } catch (Exception $e) {
            return  response()->json($e, 500);
        }

    }

    public function getCityDetail(Request $request)
    {
        try {

            $url = "city";
            if ($request->id_kabupaten) {
                # code...
                $url = $url."?id=".$request->idCity;
            }

            $response = request_raja_ongkir($url,"GET","");
            $result = $response->results;
    
            return response()->json($result, 200);

        } catch (Exception $e) {
            return  response()->json($e, 500);
        }

    }


    public function getCostDestination(Request $request)
    {
        try {

            $curier = ['jne','jnt','sicepat','ninja'];
            $url = "cost";
            $origin = env('RAJA_ONGKIR_ORIGIN');
            $destionation = $request->dest;
            $address =  CustomerAdres::findOrFail($request->idAddress);
            $weight= 0;
            $result = [];

            $length = 0;
            $width = 0;
            $height= 0;
            foreach (Session::get('cart') as $key => $cartItem) {
                # code...
                $product = \App\Product::find($cartItem['id']);
                $weight += 250*$cartItem['quantity'];
            }

            foreach ($curier as $key => $value) {
                # code...
                 $param = "origin=$origin&originType=city&destination=$destionation&destinationType=subdistrict&weight=$weight&courier=$value";
                 $response = request_raja_ongkir($url,"POST",$param);
                 array_push($result,$response[0]);
            }

            $paramSwift=[
                "origin_latitude" =>  floatval(env('SWIFT_ORIGIN_LAT')),
                "origin_longitude" =>  floatval(env('SWIFT_ORIGIN_LNG')),
                "destination_latitude" => floatval($address->lat),
                "destination_longitude" => floatval($address->lng),
                "couriers" => "gojek,grab",
                "items" => []
            ];

            // dd($paramSwift);
            $swift= get_swift($paramSwift);


         

            $shiping_item = \View::make('frontend.partials.shiping_item',compact('result','swift'))->render();
            $shiping_summary = \View::make('frontend.partials.shiping_summary')->render();

            return response()->json(compact('shiping_item','shiping_summary'));
            
        } catch (Exception $e) {
             return response()->json($e, 500);
        }
    }



    public function shiping_summary(Request $request)
    {
        $curier = json_decode($request->cost);
        return view('frontend.partials.shiping_summary',compact('curier'));
    }   
}
