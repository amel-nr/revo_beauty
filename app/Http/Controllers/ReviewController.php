<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Product;
use App\OrderDetail;
use App\Models\OrderSample;
use App\Models\OrderProductPoints;
use Auth;
use DB;
use ImageOptimizer;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reviews = Review::orderBy('created_at', 'desc')->paginate(15);
        return view('reviews.index', compact('reviews'));
    }


    public function seller_reviews()
    {
        $reviews = DB::table('reviews')
                    ->orderBy('id', 'desc')
                    ->join('products', 'reviews.product_id', '=', 'products.id')
                    ->where('products.user_id', Auth::user()->id)
                    ->select('reviews.id')
                    ->distinct()
                    ->paginate(9);

        foreach ($reviews as $key => $value) {
            $review = \App\Review::find($value->id);
            $review->viewed = 1;
            $review->save();
        }

        return view('frontend.seller.reviews', compact('reviews'));
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
        
        $kemasan =(int) $request->rate_kemasan;
        $keggunaan = (int) $request->rate_keggunaan;
        $efektif = (int) $request->rate_efektif;
        $harga =  (int )$request->rate_harga;
        $avg = ($kemasan+$keggunaan+$efektif+$harga)/4;

       

        $is_order = DB::table('orders')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->whereRaw('orders.delivery_status = ? and orders.user_id = ? and order_details.product_id = ?', ['completed',Auth::user()->id,$request->product_id])
            ->first();
        



        $review = new Review;
        $review->product_id = $request->product_id;
        $review->user_id = Auth::user()->id;
        $review->rating_kemasan = $kemasan;
        $review->rating_kegunaan = $keggunaan;
        $review->rating_efektif = $efektif;
        $review->rating_harga = $harga;
        $review->rating = $avg;
        $review->comment = $request->comment;
        $review->viewed = '0';
        $review->status_recomendasi = $request->rekomendasi;
        $review->status_beli = isset($is_order) ? 1 : 0;

        $point_review = \App\BusinessSetting::where('type', 'club_point_user_review')->first();

        $jml_harian = Review::where('user_id',Auth::user()->id)->whereDate('created_at', '=', date('Y-m-d'))->count();

        $point = json_decode( $point_review->value );
        if($point_review != null && $jml_harian < (int)$point->jml_max )
        {   
           
            Auth::user()->point += (int) $point->value;
            Auth::user()->save();
            $club_point = new \App\ClubPoint;
            $club_point->user_id = Auth::user()->id;
            $club_point->points = (int) $point->value;
            $club_point->keterangan = 'REVIEW POINT';
            $club_point->save();
        }

        $photos = array();

        if($request->hasFile('photos')){
            foreach ($request->photos as $key => $photo) {
                $path = $photo->store('uploads/products/review');
                array_push($photos, $path);
                ImageOptimizer::optimize(base_path('public/').$path);
            }
            $review->photos = json_encode($photos);
        }
        if($review->save()){
            $product = Product::findOrFail($request->product_id);
            if (isset($request->order_detail_id)) {
                # code...
                $orderDetail = OrderDetail::findOrFail($request->order_detail_id);
                $orderDetail->review_id = $review->id;
                $orderDetail->save();
            }
            

            if (isset($request->order_sample_id)) {
                # code...
                $orderSample = OrderSample::findOrFail($request->order_sample_id);
                $orderSample->review_id = $review->id;
                $orderSample->save();
            }
            if (isset($request->order_poin_id)) {
                # code...
                $orderPoin = OrderProductPoints::findOrFail($request->order_poin_id);
                $orderPoin->review_id = $review->id;
                $orderPoin->save();
            }
            if(count(Review::where('product_id', $product->id)->where('status', 1)->get()) > 0){
                $product->rating = Review::where('product_id', $product->id)->where('status', 1)->sum('rating')/count(Review::where('product_id', $product->id)->where('status', 1)->get());
                // dd('ada');
            }
            else {
                $product->rating = 0;
            }
            $product->save();
            flash('Review has been submitted successfully')->success();
            return back();
        }
        flash('Something went wrong')->error();
        return back();
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

    public function updatePublished(Request $request)
    {
        $review = Review::findOrFail($request->id);
        $review->status = $request->status;
        if($review->save()){
            $product = Product::findOrFail($review->product->id);
            if(count(Review::where('product_id', $product->id)->where('status', 1)->get()) > 0){
                $product->rating = Review::where('product_id', $product->id)->where('status', 1)->sum('rating')/count(Review::where('product_id', $product->id)->where('status', 1)->get());
            }
            else {
                $product->rating = 0;
            }
            $product->save();
            return 1;
        }
        return 0;
    }

    public function review()
    {
        
        $reviews = \App\Review::where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')->with('product')->paginate(9);
        return view('reviews.review',compact('reviews'));
    }

    public function partialReview(Request $request)
    {
        $id = $request->product_id;
        $type = 'all';
        $offset = $request->offset;
        return view('frontend.partials.review_detail_product',compact('id','type','offset'));
    }

    public function reviewShow(Request $request)
    {
        $product = Product::where('id', $request->id)->with('brand')->first();
        $orderDetailId = isset($request->orderDetail) ? $request->orderDetail : null;
        $orderSampleId = isset($request->orderDetailSample) ? $request->orderDetailSample : null;
        $orderPoin = isset($request->orderDetailPoin) ? $request->orderDetailPoin : null;

        return view('frontend.partials.reviewModal',compact('product','orderDetailId','orderSampleId','orderPoin'));
    }


}
