<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhoebeChoice;
use App\Product;

class PhoebeChoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pc = PhoebeChoice::with("product")->get();
        return $pc;
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
        $max = PhoebeChoice::count();
        if (count($request->id) + $max > 20) {
            return "max";
        }
        foreach ($request->id as $key => $id) {
            if (Phoebechoice::where('product_id',$id)->first() == null) {
                PhoebeChoice::insert(['product_id'=>$id]);
            }
        }
        return "added";
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
        $pc = PhoebeChoice::where('product_id',$id)->delete();
        // dd($id);
        if ($pc) {
            return "deleted";
        }
        return "deleting failed";
    }

    public function load_pc()
    {

        $pcid = PhoebeChoice::select("product_id")->get();
        $id = [];
        foreach ($pcid as $key => $value) {
            array_push($id,$value->product_id);
        }
        // dd($id);
        $products = Product::whereIn('id',$id);

        $product = filter_products($products->with('brand')->orderBy('num_of_sale', 'desc'))->limit(20)->get();
        $products = collect(collect($product))->chunk(4);
        $products_mobile = collect(collect($product))->chunk(2);

        return view('frontend.partials.best_sell_section', ['products' => $products, 'products_mobile' => $products_mobile, 'localpride'=>0]);

        // return view('frontend.partials.best_sell_section', compact("products"));
    }
}
