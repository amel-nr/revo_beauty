<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\faqModel;

class faqController extends Controller
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
        $insert = faqModel::create(["ask" => $request->ask,"ans" => $request->ans,"category_id"=>$request->category_id]);
        if ($insert) {
            flash("Berhasil meambah data")->success();
            return redirect()->back();
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

    public function store_category(Request $request)
    {
        $insert = \App\faqCategory::create(["title" => $request->title]);
        if ($insert) {
            flash("Berhasil meambah data")->success();
            return redirect()->back();
        }
    }
    public function update_category(Request $request)
    {
        $update = \App\faqCategory::where('id',$request->id)->update(["title" => $request->title]);
        if ($update) {
            flash("Berhasil mengubah data $request->title")->success();
            return redirect()->back();
        }
    }

    public function delete_category($id)
    {
        $delete = \App\faqCategory::where("id",$id)->delete();
        if ($delete) {
            flash("berhasil menghapus data")->success();
            return redirect()->back();
        }
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
    public function update(Request $request)
    {
        $update = faqModel::where('id',$request->id)->update(["ask" => $request->ask,"ans" => $request->ans,"category_id"=>$request->category_id]);
        if ($update) {
            flash("Berhasil merubah data")->success();
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = faqModel::where("id",$id)->delete();
        if ($delete) {
            flash("Berhasil menghapus data")->success();
            return "oke";
        }
    }
}
