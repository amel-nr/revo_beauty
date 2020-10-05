<?php

namespace App\Http\controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Recomendasi;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;


class ProductRekomendasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rekomendasi = Recomendasi::paginate(15);
        return view('recomendation.index',compact('rekomendasi'));
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
        return view('recomendation.create',compact('products','categories'));
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
        $data= [
            "product" => $request->product,
            "recommendations" => json_encode($request->recommendations)
        ];
        // dd($data);
        $recom = Recomendasi::insert($data);
        flash("Berhasil menambahkan produk rekomendasi")->success();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recom = Recomendasi::where('product',$id)->get();
        $precom = [];
        foreach ($recom as $key => $value) {
            $precom = array_merge($precom,json_decode($value->recommendations));
        }
        $product = Product::whereIn('id',$precom)->get();
        
        dd($product);
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

    public function filter($id, $val)
    {
        $filter = DB::table("recomendasi_filter")->where('id', $id)->update(["filter"=>$val,"filtered"=>null]);
        return $filter;
    }

    public function add_brand(Request $request)
    {
        // dd($request->brands);
        // $brands = explode(",",$request->brands);
        $data = json_encode($request->brands);
        $brands = DB::table("recomendasi_filter")->where("filter",2)->update(["filtered"=>$data]);
        if ($brands) {
            return "success";
        }
    }

    public function brands()
    {
        $id = DB::table("recomendasi_filter")->select("filtered")->where("filter",2)->first();
        // dd($id->filtered);
        $id = isset($id) ? json_decode($id->filtered) : [];
        $brands = DB::table('brands')->whereIn("id",$id)->get();
        $product = Product::whereIn("brand_id",$id)->with('brand')->orderBy('brand_id')->limit(20)->get();
        return [$brands,$product];
    }
    
    public function add_category(Request $request)
    {
        $data = json_encode($request->category);
        $kategory = DB::table("recomendasi_filter")->where("filter",3)->update(["filtered"=>$data]);
        if ($kategory) {
            return "success";
        }
    }

    public function categories()
    {
        $id = DB::table("recomendasi_filter")->select("filtered")->where("filter",3)->first();
        $id = isset($id) ? json_decode($id->filtered) : [];
        // $id = json_decode($id->filtered);
        $scategories = DB::table('sub_categories')->whereIn("id",$id)->get();
        $product = Product::whereIn("subcategory_id",$id)->with("subcategory")->orderBy('subcategory_id')->limit(20)->get();
        return [$scategories,$product];
    }

    public function getProduct()
    {
        $filter = DB::table("recomendasi_filter")->first();
        if (isset($filter->filtered)) {
            $products = Product::where('published',1);
            $filtered = json_decode($filter->filtered);
            switch ($filter->filter) {
                case 1:
                    $products = $products->whereIn("id",$filtered);
                  break;
                case 2:
                    $products = $products->whereIn("brand_id",$filtered);
                break;
                case 3:
                    $products = $products->whereIn("subcategory_id",$filtered);
                  break;
                case 4:
                    "";
                  break;
                default:
                  "";
              }
            $product = filter_products($products->with('brand')->orderBy('brand_id'))->limit(20)->get();
            $products = collect(collect($product))->chunk(4);
            $products_mobile = collect(collect($product))->chunk(2);

            return view('frontend.partials.best_sell_section', ['products' => $products, 'products_mobile' => $products_mobile, 'localpride'=>0]);
        }

    }

    public function getBestSell()
    {
        $bs = \App\OrderDetail::select('product_id', DB::raw('COUNT(id) as total_product'))
                ->with("product")
                ->groupBy('product_id')
                ->havingRaw('count(id) > 0')
                ->get();
        return $bs;
    }

    public function addBestSell()
    {
        $bs = \App\OrderDetail::select('product_id', DB::raw('COUNT(id) as total_product'))
                ->groupBy('product_id')
                ->havingRaw('count(id) > 0')
                ->pluck("product_id")
                ->toArray();

        $data = json_encode($bs);
        $kategory = DB::table("recomendasi_filter")->where("filter",1)->update(["filtered"=>$data]);
        if ($kategory) {
            return "success";
        }
    }

    public function addProductManual(Request $request)
    {
        $data = json_encode($request->product);
        $product = DB::table("recomendasi_filter")->where("filter",4)->update(["filtered"=>$data]);
        if ($product) {
            return "success";
        }
    }

    public function getProductManual()
    {
        $id = DB::table("recomendasi_filter")->select("filtered")->where("filter",4)->first();
        $id = isset($id) ? json_decode($id->filtered) : [];
        // dd($id);
        $products = Product::whereIn("id",$id)->with("subcategory")->orderBy('subcategory_id')->limit(20)->get();
        return $products;
    }
}
