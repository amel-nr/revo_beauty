<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($position)
    {
        return view('banners.create', compact('position'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('photo')){
            $banner = new Banner;
            $banner->photo = $request->photo->store('uploads/banners');
            $banner->url = $request->url;
            $banner->position = $request->position;
            $banner->save();
            flash(__('Banner has been inserted successfully'))->success();
        }
        return redirect()->route('home_settings.index');
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
        $banner = Banner::findOrFail($id);
        return view('banners.edit', compact('banner'));
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
        $banner = Banner::find($id);
        $banner->photo = $request->previous_photo;
        if($request->hasFile('photo')){
            $banner->photo = $request->photo->store('uploads/banners');
        }
        $banner->url = $request->url;
        $banner->save();
        flash(__('Banner has been updated successfully'))->success();
        return redirect()->route('home_settings.index');
    }


    public function update_status(Request $request)
    {
        $banner = Banner::find($request->id);
        $banner->published = $request->status;
        if($request->status == 1){
            if(count(Banner::where('published', 1)->where('position', $banner->position)->get()) < 4)
            {
                if($banner->save()){
                    return '1';
                }
                else {
                    return '0';
                }
            }
        }
        else{
            if($banner->save()){
                return '1';
            }
            else {
                return '0';
            }
        }

        return '0';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        if(Banner::destroy($id)){
            //unlink($banner->photo);
            flash(__('Banner has been deleted successfully'))->success();
        }
        else{
            flash(__('Something went wrong'))->error();
        }
        return redirect()->route('home_settings.index');
    }

    function localpride_update(Request $request)
    {
        // dd($request["photo"][0]->getClientOriginalName());
        if($request->hasFile('photo')){
            foreach ($request["photo"] as $key => $value) {
                $photo = $value->store('uploads/banner');
                $banner = Banner::where('url', "#localpride");
                Storage::delete($banner->first()->photo);
                $banner->update(['photo' => $photo]);
            }
            flash(__('Local Pride Banner has been updated successfully'))->success();
            return redirect()->route('home_settings.index');
        }
    }

    function shopsale(Request $request)
    {
        // dd($request->all());
        $data = [];
        if($request->hasFile('shopsale_banner')){
            foreach ($request["shopsale_banner"] as $key => $value) {
                // dd($value);
                $photo = $value->store('uploads/banner');
                $id = $request->id_banner[$key];

                $banners = Banner::where('url', "#shopsale")->where('id',$id);
                Storage::delete($banners->first()->photo);
                $banners->update(['photo' => $photo]);
            }
            flash(__('Local Pride Banner has been updated successfully'))->success();
        }
        return redirect()->route('home_settings.index');
    }

    public function banner_faq(Request $request)
    {
        if ($request->hasFile('banner')) {
            $photo = $request->banner->store("uploads/banner");
            $banner = new Banner;
            $banner->photo = $photo;
            $banner->url = "#faq";
            $banner->position = 1;
            $banner->published = 1;

            if ($banner->where("url","#faq")->first() != null) {
                Storage::delete($banner->first()->photo);
                $banner->where("url","#faq")->update(['photo'=>$banner->photo]);
                flash("berhasil mengubah data ")->success();
            }else {
                $banner->save();
                flash("berhasil menambah data ")->success();
            }
            return redirect()->back();
        }
    }

    
}
