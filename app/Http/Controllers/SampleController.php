<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sample;
use App\Product;
use App\Category;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $type = 'In House';
        $col_name = null;
        $query = null;
        $sort_search = null;
        $products = Sample::where('is_deleted', '0');
        if(isset($request->search) && $request->search != "")
        {
            $sort_search = $request->search;
            
            $products = $products->where('nama', 'like', '%'.$request->search.'%');
        }
        $products =  $products->with('product')->orderBy('created_at', 'desc')->get();
        return view('productsample.index', compact('products','type', 'col_name', 'query', 'sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $products = Product::where(['added_by' => 'admin','digital'=> 0 ])->orderBy('created_at', 'desc')->get();
        return view('productsample.create',compact('categories','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $sample = new Sample();
        $sample->nama = $request->name;
        $sample->product_id = $request->product;
        $sample->max_sample = $request->maksimal;
        $sample->stok = $request->stok;
        $sample->is_deleted = 0;
        $sample->status_publis = 0;
        $sample->save();
        flash(__('Sample product has been created successfully'))->success();
        return redirect()->route('sample');
    }

    public function updatePublished(Request $request)
    {
        $product = Sample::findOrFail($request->id);
        $product->status_publis = $request->status;
        if($product->save()){
            return 1;
        }
        return 0;
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
        $product = Sample::findOrFail(decrypt($id));
        $products = Product::where(['added_by' => 'admin','digital'=> 0 ])->orderBy('created_at', 'desc')->get();
        // dd($product);
        if($product){
            return view('productsample.edit',compact('product','products'));
        }
        else{
            flash(__('Something went wrong'))->error();
            return back();
        }
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
        $sample = Sample::findOrFail(decrypt($id));
        // dd($product);
        if($sample){
            $sample->nama = $request->name;
            $sample->product_id = $request->product;
            $sample->max_sample = $request->maksimal;
            $sample->stok = $request->stok;
            $sample->save();
            flash(__('Sample product has been updated successfully'))->success();
            return redirect()->route('sample');
        }
        else{
            flash(__('Something went wrong'))->error();
            return back();
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
        //
        $product = Sample::findOrFail($id);
        // dd($product);
        if($product){
            $product->is_deleted = 1;
            $product->save();
             
        }
        else{
            flash(__('Something went wrong'))->error();
            return back();
        }
    }
}
