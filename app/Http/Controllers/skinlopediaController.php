<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\skinlopedia;

class skinlopediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("skinlopedia/list");
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

    public function get($id = 'id')
    {
        if ($id != 'id') {
            return skinlopedia::find($id);
        }

        return skinlopedia::all();

    }

    public function page()
    {
        return view('skinlopedia/admin_page');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
        //  dd($request->all());
         if (!$request->show) {
             $request->show = 0;
         }
 
         $save = skinlopedia::insert([
                 'title' => $request->title,
                 'text' => $request->text,
                 'img' => $this->upload_image($request)
                 ]);
 
         if ($save) {
             flash('kata kunci berhasil ditambahkan')->success();
             return redirect(route('admin.skinlopedia.list'));
         }

     }

     public function delete($id)
     {
         $del = skinlopedia::where('id',$id)->delete();
         if ($del) {
             flash("berhasil menghapus")->success();
             return redirect(route('admin.skinlopedia.list'));
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
        $kata = skinlopedia::find($id);
        return view('skinlopedia/edit_sl', compact('kata'));
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
        // dd($request->all());

        $data = [
                'title' => $request->title,
                'text' => $request->text
            ];
        if ($request->hasFile('img')) {
            $data['img'] = $this->upload_image($request);
        }

        $sl = skinlopedia::where('id',$id)->update($data);

        if ($sl) {
            flash('berhasil mengubah data')->success();
            return redirect(route('admin.skinlopedia.list'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function getSkinlo()
    {
        $skinlo = skinlopedia::paginate(4);
        return view("frontend/skinklopedia",compact('skinlo'));
    }

    function fetch_data(Request $request)
    {
     if($request->ajax())
     {
      $skinlo = skinlopedia::paginate(4);
      return view('/skinlopedia/konten', compact('skinlo'))->render();
     }
    }

    public function destroy($id)
    {
        //
    }

    public function search($keyword)
    {
        $skinlo = skinlopedia::where("title",'like',"%$keyword%")->orWhere("text","like","%$keyword%")->paginate(4);
        return view("/skinlopedia/konten", compact("skinlo"));
    }
    public function filter($filt)
    {
        $skinlo = skinlopedia::where("title",'like',"$filt%")->paginate(4);
        return view("/skinlopedia/konten", compact("skinlo"));
    }

    public function upload_image(Request $request)
    {
        $file = '';
        if ($request->hasFile('img')) {
            $file = $request->img;
            $name   = $file->getClientOriginalName();
            if($file->move(\base_path() ."/public/skinlopedia/img", $name)){
                return $name;
            }
            return 'default.jpg';
        }
    }
}
