<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdersKomplain;
use App\Models\Order;
use ImageOptimizer;

class OrderKomplainController extends Controller
{
    //
    public function index()
    {

    	$orders_komplain = OrdersKomplain::with('order','masalah','solusiKomplain','statusKomplain')->paginate(15);
    	// dd($orders_komplain);
    	return view('orders_komplain.index',compact('orders_komplain'));
    }

    public function create(Request $request)
    {
    	// dd($request->all());
    	try {
            $order = Order::findOrFail($request->order_id);
            $order->delivery_status = 'komplain';
            $order->save();

    		$komplain = new OrdersKomplain();
    		$komplain->order_id =$request->order_id;
    		$komplain->problem_id= $request->masalah_komplain;
    		$komplain->admin_aprove = 'request';
    		$komplain->solusi = $request->solusi_komplain;
    		$komplain->user_setuju = 1;
    		$komplain->catatan = $request->catatan;
    		$komplain->product_komplain = json_encode($request->barang_komplain);
    		$photos = array();
    		if($request->hasFile('photos')){
	            foreach ($request->photos as $key => $photo) {
	                $path = $photo->store('uploads/products/review');
	                array_push($photos, $path);
	                ImageOptimizer::optimize(base_path('public/').$path);
	            }
	            $komplain->photos_komplain = json_encode($photos);
	        }
            if($komplain->save())
            {

            }
            flash('Komplain has been submitted successfully')->success();
            return back();

    	} catch (Exception $e) {
    		flash('Something went wrong')->error();
        	return back();
    	}
    }

    public function komplain_view(Request $request)
    {
    	$order = Order::findOrFail($request->order_id);

    	return view('frontend.partials.komplainModal',compact('order'));
    }

  
    public function show($id)
    {
    	$komplain = OrdersKomplain::where('id', decrypt($id))->first();
        $komplain->view = 1;
        $order = Order::where('id',$komplain->order_id)->first();
        return view('orders_komplain.show', compact('komplain','order'));
    }

    public function setStatusKomplain(Request $request,$id)
    {
    	// dd($request->all());
    	try {
    		$komplain = OrdersKomplain::findOrfail(decrypt($id));
    		$komplain->admin_aprove = $request->status;
    		$photos = array();
    		if($request->hasFile('photos')){
	            foreach ($request->photos as $key => $photo) {
	                $path = $photo->store('uploads/products/review');
	                array_push($photos, $path);
	                ImageOptimizer::optimize(base_path('public/').$path);
	            }
	            $komplain->photos_bukti_transfer = json_encode($photos);
	        }
    		$komplain->save();
    		flash('Successfully')->success();
            return back();
    	} catch (Exception $e) {
    		flash('Something went wrong')->error();
        	return back();
    		
    	}
    }

    public function setSelesaiKomplain(Request $request)
    {
        // dd($request->all());
        $komplain = OrdersKomplain::findOrfail($request->id);
        $komplain->admin_aprove  = 'completed';
        $komplain->save();

        $komplain = OrdersKomplain::findOrfail($request->id);
        $order = Order::findOrFail($komplain->order_id);
        $order->delivery_status = 'completed';
        $order->save();
        // return 1;
    }

    public function userResiKomplain(Request $request)
    {
    	$komplain = OrdersKomplain::findOrfail(decrypt($request->komplain_id));
    	$komplain->admin_aprove = 'dalam_verifikasi';
		$komplain->jenis_resi_pengembalian = $request->jenis;
		$komplain->nomer_resi_pengembalian = $request->no_resi;
		if($komplain->save())
		{
			flash('Successfully')->success();
		}else{

    		flash('Something went wrong')->error();
		}
        return back();
    }



}
