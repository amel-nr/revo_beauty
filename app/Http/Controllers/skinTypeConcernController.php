<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\skinConcern;
use App\skinType;
use Illuminate\Support\Facades\DB;

class skinTypeConcernController extends Controller
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
    public function createskintype(Request $request)
    {
        $table = "skin_type";
        return view("skinconcern.create",compact('table'));
    }
    public function createskinconcern(Request $request)
    {
        $table = "skin_concern";
        return view("skinconcern.create",compact("table"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $logo = '';
        if ($request->hasFile("logo")) {
            $logo = $request->logo;
        }

        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'icon' => $this->upload_image($logo)
        ];
        if ($request->table == "skin_concern") {
            unset($data['icon']);
        }

        if(DB::table($request->table)->insert($data)){
            return "sukses";
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
    public function destroy($id)
    {
        //
    }

    private function upload_image($resource)
    {
        if ($resource != '') {
            $name   = $resource->getClientOriginalName();
            if($resource->move(\base_path() ."/public/frontend/images/beauty-profile-modal/", $name)){
                return $name;
            }
            return 'default.jpg';
        }
    }
}
