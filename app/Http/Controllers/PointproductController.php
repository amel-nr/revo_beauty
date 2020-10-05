<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductPoint;
use App\Models\Product;

class PointproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $sort_search = null;
        if(isset($request->search) && $request->search != "")
        {
            $sort_search = $request->search;
            $data = ProductPoint::where('is_deleted', '0')->with('product')->orderBy('created_at', 'desc')->get();

        }else{
            $data = ProductPoint::where('is_deleted', '0')->with('product')->orderBy('created_at', 'desc')->get();
        }   
        return view('pointproduct.index',compact('data','sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $products = Product::where(['added_by' => 'admin','digital'=> 0 ])->orderBy('created_at', 'desc')->get();
        return view('pointproduct.create', compact('products'));
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
        $productpoint = new ProductPoint();
        $productpoint->jml_point = $request->point;
        $productpoint->product_id = $request->product; 
        $productpoint->is_deleted = 0;
        $productpoint->is_publish = 0;
        $productpoint->save();
        flash(__('Created successfully'))->success();
        return redirect()->route('pointproduct');
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
        $item = ProductPoint::findOrFail(decrypt($id));
        if($item){
            $products = Product::where(['added_by' => 'admin','digital'=> 0 ])->orderBy('created_at', 'desc')->get();
            return view('pointproduct.edit', compact('products','item'));
        }else{
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
        $productpoint = ProductPoint::findOrFail(decrypt($id));

        if($productpoint){
            $productpoint->jml_point = $request->point;
            $productpoint->product_id = $request->product; 
            $productpoint->save();
            flash(__('Updated successfully'))->success();
            return redirect()->route('pointproduct');
        }else{
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
         $product = ProductPoint::findOrFail($id);
        // dd($product);
        if($product){
            $product->is_deleted = 1;
            $product->save();
            flash(__('Deleted successfully'))->success();
            return redirect()->route('pointproduct');
             
        }
        else{
            flash(__('Something went wrong'))->error();
            return back();
        }
    }

    public function updatePublished(Request $request)
    {
        $productpoint = ProductPoint::findOrFail($request->id);
        $productpoint->is_publish = $request->status;
        if($productpoint->save()){
            return 1;
        }
        return 0;
    }

    public function detailProduct(Request $request)
    {
        $product = Product::findOrFail($request->id);
        return response()->json($product);

    }
}
