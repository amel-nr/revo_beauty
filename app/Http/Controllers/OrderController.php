<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\OTPVerificationController;
use App\Http\Controllers\ClubPointController;
use App\Http\Controllers\AffiliateController;
use App\Order;
use App\Product;
use App\Color;
use App\OrderDetail;
use App\CouponUsage;
use App\Models\AffiliateUserCode;
use App\Coupon;
use App\OtpConfiguration;
use App\User;
use App\BusinessSetting;
use App\Models\OrderProductPoints;
use App\Models\OrderSample;
use App\Models\OrdersPaymentTf;
use App\ClubPointExchange;
use Auth;
use Session;
use DB;
use PDF;
use Mail;
use App\Mail\InvoiceEmailManager;
use App\Mail\OrderEmail;
use App\Mail\MailStatusOrder;
use CoreComponentRepository;
use App\Http\Controllers\MembershipController;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource to seller.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::user()->id);
        $orders = DB::table('orders')
                    ->orderBy('code', 'desc')
                    ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                    ->where('order_details.seller_id', Auth::user()->id)
                    ->select('orders.id')
                    ->distinct()
                    ->paginate(15);

        foreach ($orders as $key => $value) {
            $order = \App\Order::find($value->id);
            $order->viewed = 1;
            $order->save();
        }

        return view('frontend.seller.orders', compact('orders'));
    }

    /**
     * Display a listing of the resource to admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_orders(Request $request)
    {
        CoreComponentRepository::instantiateShopRepository();

        $payment_status = null;
        $delivery_status = null;
        $sort_search = null;
        $admin_user_id = User::where('user_type', 'admin')->first()->id;
        
        $orders = DB::table('orders')
                    ->orderBy('code', 'desc')
                    ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                    ->where('order_details.seller_id', $admin_user_id)
                    ->select('orders.id')
                    ->distinct();

        if ($request->payment_type != null){
            $orders = $orders->where('order_details.payment_status', $request->payment_type);
            $payment_status = $request->payment_type;
        }
        if ($request->delivery_status != null) {
            $orders = $orders->where('order_details.delivery_status', $request->delivery_status);
            $delivery_status = $request->delivery_status;
        }
        if ($request->has('search')){
            $sort_search = $request->search;
            $orders = $orders->where('code', 'like', '%'.$sort_search.'%');
        }
        $orders = $orders->paginate(15);
        return view('orders.index', compact('orders','payment_status','delivery_status', 'sort_search', 'admin_user_id'));
    }

    /**
     * Display a listing of the sales to admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function sales(Request $request)
    {
        CoreComponentRepository::instantiateShopRepository();

        $sort_search = null;
        $orders = Order::orderBy('code', 'desc');
        if ($request->has('search')){
            $sort_search = $request->search;
            $orders = $orders->where('code', 'like', '%'.$sort_search.'%');
        }
        $orders = $orders->paginate(15);
        return view('sales.index', compact('orders', 'sort_search'));
    }


    public function order_index(Request $request)
    {
        if (Auth::user()->user_type == 'staff') {
            //$orders = Order::where('pickup_point_id', Auth::user()->staff->pick_up_point->id)->get();
            $orders = DB::table('orders')
                        ->orderBy('code', 'desc')
                        ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                        ->where('order_details.pickup_point_id', Auth::user()->staff->pick_up_point->id)
                        ->select('orders.id')
                        ->distinct()
                        ->paginate(15);

            return view('pickup_point.orders.index', compact('orders'));
        }
        else{
            //$orders = Order::where('shipping_type', 'Pick-up Point')->get();
            $orders = DB::table('orders')
                        ->orderBy('code', 'desc')
                        ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                        ->where('order_details.shipping_type', 'pickup_point')
                        ->select('orders.id')
                        ->distinct()
                        ->paginate(15);

            return view('pickup_point.orders.index', compact('orders'));
        }
    }

    public function pickup_point_order_sales_show($id)
    {
        if (Auth::user()->user_type == 'staff') {
            $order = Order::findOrFail(decrypt($id));
            return view('pickup_point.orders.show', compact('order'));
        }
        else{
            $order = Order::findOrFail(decrypt($id));
            return view('pickup_point.orders.show', compact('order'));
        }
    }

    /**
     * Display a single sale to admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function sales_show($id)
    {
        $order = Order::findOrFail(decrypt($id));
        return view('sales.show', compact('order'));
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
        
        // dd($request->all());
        \DB::beginTransaction();
        try {
            
            $mitrans_param =[];
            $order = new Order;
            if(Auth::check() && count(Session::get('cart')) >0 ){
                $order->user_id = Auth::user()->id;
                $mitrans_param['customer_details'] =[
                            "first_name" => Auth::user()->name,
                            "last_name" => Auth::user()->last_name,
                            "email" =>  Auth::user()->email,
                            "phone" => Auth::user()->phone

                        ];
            }
            else{
                return redirect()->route('home');
            }



            

            // $order->shipping_address = json_encode($request->session()->get('shipping_info'));

            // if (Session::get('delivery_info')['shipping_type'] == 'Home Delivery') {
            //     $order->shipping_type = Session::get('delivery_info')['shipping_type'];
            // }
            // elseif (Session::get('delivery_info')['shipping_type'] == 'Pick-up Point') {
            //     $order->shipping_type = Session::get('delivery_info')['shipping_type'];
            //     $order->pickup_point_id = Session::get('delivery_info')['pickup_point_id'];
            // }
            $order->customer_addres_id = $request->idAddres;
            $order->payment_type = $request->payment;
            $order->shipping_info = $request->shipping;
            $order->delivery_viewed = '0';
            $order->payment_status_viewed = '0';
            $order->delivery_status = 'pending';
            $order->code = date('Ymd-His').rand(10,99);
            $order->date = strtotime('now');
            $datashipping = json_decode($request->shipping);

            if($order->save()){
                $subtotal = 0;
                $tax = 0;
                $shipping = $datashipping->cost;
                $item_details=[];
                foreach (Session::get('cart') as $key => $cartItem){
                    $product = Product::find($cartItem['id']);

                    $subtotal += $cartItem['price']*$cartItem['quantity'];
                    $tax += $cartItem['tax']*$cartItem['quantity'];

                    // if ($cartItem['shipping_type'] == 'home_delivery') {
                    //     $shipping += \App\Product::find($cartItem['id'])->shipping_cost*$cartItem['quantity'];
                    // }

                    $product_variation = $cartItem['variant'];

                    if($product_variation != null){
                        $product_stock = $product->stocks->where('variant', $product_variation)->first();
                        $product_stock->qty -= $cartItem['quantity'];
                        $product_stock->save();
                    }
                    else {
                        $product->current_stock -= $cartItem['quantity'];
                        $product->save();
                    }

                    $order_detail = new OrderDetail;
                    $order_detail->order_id  =$order->id;
                    $order_detail->seller_id = $product->user_id;
                    $order_detail->product_id = $product->id;
                    $order_detail->variation = $product_variation;
                    $order_detail->price = $cartItem['price'] * $cartItem['quantity'];
                    $order_detail->tax = $cartItem['tax'] * $cartItem['quantity'];
                    // $order_detail->shipping_type = $cartItem['shipping_type'];
                    $order_detail->product_referral_code = $cartItem['product_referral_code'];

                    // if ($cartItem['shipping_type'] == 'home_delivery') {
                    //     $order_detail->shipping_cost = \App\Product::find($cartItem['id'])->shipping_cost*$cartItem['quantity'];
                    // }
                    // else{
                    //     $order_detail->shipping_cost = 0;
                    //     $order_detail->pickup_point_id = $cartItem['pickup_point'];
                    // }


                    $order_detail->quantity = $cartItem['quantity'];
                    $order_detail->save();

                    array_push($item_details, [
                        "id" => $order_detail->product_id,
                        "price" =>$cartItem['price'],
                        "quantity" => $order_detail->quantity,
                        "name" =>  $product->name,
                    ]);

                    $product->num_of_sale++;
                    $product->save();
                }

                $potongan = 0;
                $subsidi = Auth::user()->user_tier;
                if(isset($subsidi) && $subtotal >=  $subsidi->free_shiping_min_order)
                {   
                    $potongan =  $subsidi->free_shiping_cost;
                    if($shipping <= $potongan){
                        $potongan = $shipping;
                    }
                }

                $order->free_ongkir = $potongan;
                $order->grand_total = $subtotal + $tax + $shipping - $potongan;

                if(Session::has('coupon_discount')){
                    $order->grand_total -= Session::get('coupon_discount');
                    $order->coupon_discount = Session::get('coupon_discount');

                    $coupon_usage = new CouponUsage;
                    $coupon_usage->user_id = Auth::user()->id;
                    $coupon_usage->coupon_id = Session::get('coupon_id');
                    $coupon_usage->order_id = $order->id;
                    $coupon_usage->save();

                    

                    $coupon = Coupon::where('id', $coupon_usage->coupon_id)->first();
                    // dd($coupon);
                    array_push($item_details, [
                        "id" => $coupon_usage->coupon_id,
                        "price" => - Session::get('coupon_discount'),
                        "quantity" => 1,
                        "name" =>  $coupon->code,
                    ]);
                    
                    if(isset($coupon) && $coupon->status_code == 'user_affiliate')
                    {
                        if (isset($coupon->userAffiliate) && $coupon->userAffiliate->is_active == 1) {
                            # code...
                            // dd($coupon->userAffiliate);
                            $coupon->userAffiliate->use = $coupon->userAffiliate->use+1;  
                            $coupon->userAffiliate->sales = $coupon->userAffiliate->sales + $coupon->userAffiliate->komisi;
                            $coupon->userAffiliate->save();    
                        }
                    }

                }

                $order->save();
                

                if ($request->session()->has('sample') && count($request->session()->get('sample')) > 0 ) {
                    # code...
                    foreach (Session::get('sample') as $key => $value) {
                        # code...
                        // dd($value);
                       
                        $orderSample = new OrderSample;
                        $orderSample->sample_id =$value->id;
                        $orderSample->quantity = 1;
                        $orderSample->order_id = $order->id;
                        $orderSample->save();
                        $product = Product::find($value->product_id);
                        array_push($item_details, [
                            "id" => $value->id,
                            "price" =>0,
                            "quantity" => 1,
                            "name" =>  $product->name." (sampel)",
                        ]);

                    }
                

                }

                if ($request->session()->has('productPoint') && count($request->session()->get('productPoint')) > 0) {
                # code...
                    $point = Auth::user()->point;
                    $point_terpakai=0;
                    foreach ($request->session()->get('productPoint') as $key => $value) {
                        # code...
                        // dd($value);
                        $point -= $value->jml_point;
                        $point_terpakai +=  $value->jml_point;

                        $orderPoint = new OrderProductPoints;
                        $orderPoint->product_point_id = $value->id;
                        $orderPoint->log_product_point = json_encode($value);
                        $orderPoint->quantity = 1;
                        $orderPoint->order_id = $order->id;
                        $orderPoint->save();

                        $product = Product::find($value->product_id);
                        array_push($item_details, [
                            "id" => $value->id,
                            "price" =>0,
                            "quantity" => 1,
                            "name" =>  $product->name." (tukar poin)",
                        ]);


                    }
                    Auth::user()->point = $point;
                    if(Auth::user()->save())
                    {   
                        $club_point = new ClubPointExchange;
                        $club_point->user_id = Auth::user()->id;
                        $club_point->points = $point_terpakai;
                        $club_point->keterangan = 'TUKAR POINT';
                        $club_point->order_id = $order->id;
                        $club_point->save();
                    }
                       
                        

                }




                //stores the pdf for invoice
          //       $pdf = PDF::setOptions([
          //                       'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,
          //                       'logOutputFile' => storage_path('logs/log.htm'),
          //                       'tempDir' => storage_path('logs/')
          //                   ])->loadView('invoices.customer_invoice', compact('order'));
          //       $output = $pdf->output();
        		// file_put_contents('public/invoices/'.'Order#'.$order->code.'.pdf', $output);

          //       $array['view'] = 'emails.invoice';
          //       $array['subject'] = 'Order Placed - '.$order->code;
          //       $array['from'] = env('MAIL_USERNAME');
          //       $array['content'] = 'Hi. A new order has been placed. Please check the attached invoice.';
          //       $array['file'] = 'public/invoices/Order#'.$order->code.'.pdf';
          //       $array['file_name'] = 'Order#'.$order->code.'.pdf';

          //       $admin_products = array();
          //       $seller_products = array();
          //       foreach ($order->orderDetails as $key => $orderDetail){
          //           if($orderDetail->product->added_by == 'admin'){
          //               array_push($admin_products, $orderDetail->product->id);
          //           }
          //           else{
          //               $product_ids = array();
          //               if(array_key_exists($orderDetail->product->user_id, $seller_products)){
          //                   $product_ids = $seller_products[$orderDetail->product->user_id];
          //               }
          //               array_push($product_ids, $orderDetail->product->id);
          //               $seller_products[$orderDetail->product->user_id] = $product_ids;
          //           }
          //       }

                // foreach($seller_products as $key => $seller_product){
                //     try {
                //         Mail::to(\App\User::find($key)->email)->queue(new InvoiceEmailManager($array));
                //     } catch (\Exception $e) {

                //     }
                // }

                // if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated && \App\OtpConfiguration::where('type', 'otp_for_order')->first()->value){
                //     try {
                //         $otpController = new OTPVerificationController;
                //         $otpController->send_order_code($order);
                //     } catch (\Exception $e) {
                        
                //     }
                // }

                //sends email to customer with the invoice pdf attached
                // if(env('MAIL_USERNAME') != null){
                //     try {
                //         Mail::to($request->session()->get('shipping_info')['email'])->queue(new InvoiceEmailManager($array));
                //         Mail::to(User::where('user_type', 'admin')->first()->email)->queue(new InvoiceEmailManager($array));
                //     } catch (\Exception $e) {

                //     }
                // }
                // unlink($array['file']);
                if($request->payment == 'manual_bca' || $request->payment == 'manual_mandiri' || $request->payment == 'manual_permata' || $request->payment == 'transfer_manual')
                {

                        $manual = $request->payment;
                        
                        $request->session()->put('order_id', $order->id);
                         \DB::commit();
                        $request->session()->put('cart', collect([]));
                            // $request->session()->forget('order_id');
                        $request->session()->put('productPoint', collect([]));
                        $request->session()->put('sample', collect([]));
                        $request->session()->forget('delivery_info');
                        $request->session()->forget('coupon_id');
                        $request->session()->forget('coupon_discount');
                        $order->uniq_tf_manual =  mt_rand(1, 99);
                        $order->save();
                        $order_code = $order->code;

                        try {
                               
                            $array['from'] = env('MAIL_USERNAME');
                            $array['subject'] = 'Order Placed - '.$order->code;;
                            $array['order_id'] = $order->id;
                           
                            Mail::to($order->user->email)->queue(new OrderEmail($array));
                        } catch (\Exception $e) {
                            dd($e);
                        }
                        


                        return redirect()->route('order_confirmed',encrypt($order->id));
                }else{
                    array_push($item_details, [
                        "id" => "SHIPPING01",
                        "price" =>(int) $shipping,
                        "quantity" => 1,
                        "name" =>  "Biaya Kirim",
                    ]);

                    array_push($item_details, [
                        "id" => "FREE_SHIPPING",
                        "price" => - $potongan,
                        "quantity" => 1,
                        "name" =>  "Gratis Biaya Kirim",
                    ]);
                    $mitrans_param['transaction_details'] =[
                            "order_id" => $order->code,
                            "gross_amount" => $order->grand_total
                        ];
                    $mitrans_param['item_details'] = $item_details;

                    if ($request->payment == 'mt_tf_mdr') {
                        # code...
                         $mitrans_param['payment_type'] = 'echannel';
                         $mitrans_param['echannel'] = [
                            'bill_info1' => 'Payment For:',
                            'bill_info2' => 'Ponny beaute'
                         ];

                    }elseif ($request->payment == 'mt_tf_bca') {
                        $mitrans_param['payment_type'] = 'bank_transfer';
                        # code...
                        $mitrans_param['bank_transfer'] =[
                            "bank" => "bca"
                        ];
                    }elseif ($request->payment == 'mt_tf_bni') {
                        # code...
                        $mitrans_param['payment_type'] = 'bank_transfer';
                        # code...
                        $mitrans_param['bank_transfer'] =[
                            "bank" => "bni"
                        ];
                    }elseif ($request->payment == 'mt_tf_permata') {
                        # code...
                        $mitrans_param['payment_type'] = 'bank_transfer';
                        $mitrans_param['bank_transfer'] =[
                            "bank" => "permata",
                            "recipient_name" => Auth::user()->name.' '.Auth::user()->last_name
                        ];
                    }elseif ($request->payment == 'Indomaret') {
                        # code...
                        $mitrans_param['payment_type'] = 'cstore';
                        $mitrans_param['cstore']=[
                            "store" => "Indomaret",
                            "message" => "Pembayaran Ponny beaute order Id #".$order->code
                        ];
                    }elseif ($request->payment == 'alfamart') {
                        # code...
                        $mitrans_param['payment_type'] = 'cstore';
                        $mitrans_param['cstore']=[
                            "store" => "alfamart",
                            "alfamart_free_text_1" => "Pembayaran Ponny beaute order Id #".$order->code
                        ];
                    }elseif($request->payment == 'gopay' ||$request->payment == 'ovo' || $request->payment == 'qris' ){
                        $mitrans_param['payment_type'] = 'gopay';
                        $mitrans_param['gopay']=[
                            "enable_callback" => true,
                            "callback_url" => url('')
                        ];
                    }elseif ($request->payment == 'credit_card') {
                        $mitrans_param['payment_type'] = 'credit_card';
                        $mitrans_param['credit_card']=[
                            "authentication" => true,
                            "token_id" => $request->tokenId
                        ];
                    }

                   

                    // dd( json_encode($mitrans_param));



                    $mitrans_request = request_mitrans_payment("charge","POST",$mitrans_param);
                    // dd($mitrans_request);
                    try {
                               
                        $array['from'] = env('MAIL_USERNAME');
                        $array['subject'] = 'Order Placed - '.$order->code;;
                        $array['order_id'] = $order->id;
                        Mail::to($order->user->email)->queue(new OrderEmail($array));
                    } catch (\Exception $e) {

                    }
                   

                    if ($mitrans_request->status_code == 201) {

                        

                        # code...
                        $request->session()->put('order_id', $order->id);
                         \DB::commit();
                        $request->session()->put('cart', collect([]));
                            // $request->session()->forget('order_id');
                        $request->session()->put('productPoint', collect([]));
                        $request->session()->put('sample', collect([]));
                        $request->session()->forget('delivery_info');
                        $request->session()->forget('coupon_id');
                        $request->session()->forget('coupon_discount');
                        $order->mitrans_val = json_encode($mitrans_request);
                        $order->save();

                       



                        $order_code = $order->code;
                        if ($request->payment == 'gopay' || $request->payment == 'ovo'||$request->payment == 'qris' ) {
                            $metode = $request->payment;
                            $imgqr = $mitrans_request->actions[0]->url;
                            return view('frontend.qrPage',compact('metode','imgqr'));
                            # code...
                        }



                        return view('frontend.thank_you',compact('order_code'));
                        // return redirect()->route('thank_you');
                        
                    }else{
                        flash(__('Something went wrong'))->error();
                        return back();
                    }
                }




                

                
                
            }
        } catch (Exception $e) {
             \DB::rollback();
        }
    }

    public function showQr(Request $request,$id)
    {
        $order =Order::findOrFail(decrypt($id));
        if ($order->payment_type == 'gopay' || $order->payment_type == 'ovo'||$order->payment_type == 'qris' ) {
            $metode = $order->payment_type;
            $mitrans_request = json_decode($order->mitrans_val);
            $imgqr = $mitrans_request->actions[0]->url;
            return view('frontend.qrPage',compact('metode','imgqr'));
            # code...
        }
        return redirect()->url('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::where('id',decrypt($id))->with('order_confrim')->first();
        $order->viewed = 1;
        $order->save();
        return view('orders.show', compact('order'));
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
        $order = Order::findOrFail($id);
        if($order != null){
            foreach($order->orderDetails as $key => $orderDetail){
                $orderDetail->delete();
            }
            $order->delete();
            flash('Order has been deleted successfully')->success();
        }
        else{
            flash('Something went wrong')->error();
        }
        return back();
    }

    public function order_details(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        //$order->viewed = 1;
        $order->save();
        return view('frontend.partials.order_details_seller', compact('order'));
    }

    public function update_delivery_status(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $order->delivery_viewed = '0';
        $order->delivery_status = $request->status;
        $order->save();
        if(Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'seller'){
            foreach($order->orderDetails->where('seller_id', Auth::user()->id) as $key => $orderDetail){
                $orderDetail->delivery_status = $request->status;
                $orderDetail->save();
            }
        }
        else{
            foreach($order->orderDetails->where('seller_id', \App\User::where('user_type', 'admin')->first()->id) as $key => $orderDetail){
                $orderDetail->delivery_status = $request->status;
                $orderDetail->save();
            }
        }

        if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated && \App\OtpConfiguration::where('type', 'otp_for_delivery_status')->first()->value){
            try {
                $otpController = new OTPVerificationController;
                $otpController->send_delivery_status($order);
            } catch (\Exception $e) {
            }
        }

        return 1;
    }

    public function update_payment_status(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $order->payment_status_viewed = '0';
        $order->save();

        if(Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'seller'){
            foreach($order->orderDetails->where('seller_id', Auth::user()->id) as $key => $orderDetail){
                $orderDetail->payment_status = $request->status;
                $orderDetail->save();
            }
        }
        else{
            foreach($order->orderDetails->where('seller_id', \App\User::where('user_type', 'admin')->first()->id) as $key => $orderDetail){
                $orderDetail->payment_status = $request->status;
                $orderDetail->save();
            }
        }

        $status = 'paid';
        foreach($order->orderDetails as $key => $orderDetail){
            if($orderDetail->payment_status != 'paid'){
                $status = 'unpaid';
            }
        }
        $order->payment_status = $status;
        $order->save();

        if($order->payment_status == 'paid' && $order->commission_calculated == 0){

            try {
                $array['view'] = 'emails.pembayaran_berhasil';
                $array['from'] = env('MAIL_USERNAME');
                $array['subject'] = "Pembayaran Berhasil";
                $array['order_id'] = $order->id;
               
                Mail::to($order->user->email)->queue(new MailStatusOrder($array));
            } catch (\Exception $e) {
                dd($e);
            }
           
            

            if ($order->payment_type == 'cash_on_delivery') {
                if (BusinessSetting::where('type', 'category_wise_commission')->first()->value != 1) {
                    $commission_percentage = BusinessSetting::where('type', 'vendor_commission')->first()->value;
                    foreach ($order->orderDetails as $key => $orderDetail) {
                        $orderDetail->payment_status = 'paid';
                        $orderDetail->save();
                        if($orderDetail->product->user->user_type == 'seller'){
                            $seller = $orderDetail->product->user->seller;
                            $seller->admin_to_pay = $seller->admin_to_pay - ($orderDetail->price*$commission_percentage)/100;
                            $seller->save();
                        }
                    }
                }
                else{
                    foreach ($order->orderDetails as $key => $orderDetail) {
                        $orderDetail->payment_status = 'paid';
                        $orderDetail->save();
                        if($orderDetail->product->user->user_type == 'seller'){
                            $commission_percentage = $orderDetail->product->category->commision_rate;
                            $seller = $orderDetail->product->user->seller;
                            $seller->admin_to_pay = $seller->admin_to_pay - ($orderDetail->price*$commission_percentage)/100;
                            $seller->save();
                        }
                    }
                }
            }
            elseif($order->manual_payment) {
                if (BusinessSetting::where('type', 'category_wise_commission')->first()->value != 1) {
                    $commission_percentage = BusinessSetting::where('type', 'vendor_commission')->first()->value;
                    foreach ($order->orderDetails as $key => $orderDetail) {
                        $orderDetail->payment_status = 'paid';
                        $orderDetail->save();
                        if($orderDetail->product->user->user_type == 'seller'){
                            $seller = $orderDetail->product->user->seller;
                            $seller->admin_to_pay = $seller->admin_to_pay + ($orderDetail->price*(100-$commission_percentage))/100;
                            $seller->save();
                        }
                    }
                }
                else{
                    foreach ($order->orderDetails as $key => $orderDetail) {
                        $orderDetail->payment_status = 'paid';
                        $orderDetail->save();
                        if($orderDetail->product->user->user_type == 'seller'){
                            $commission_percentage = $orderDetail->product->category->commision_rate;
                            $seller = $orderDetail->product->user->seller;
                            $seller->admin_to_pay = $seller->admin_to_pay + ($orderDetail->price*(100-$commission_percentage))/100;
                            $seller->save();
                        }
                    }
                }
            }

            if (\App\Addon::where('unique_identifier', 'affiliate_system')->first() != null && \App\Addon::where('unique_identifier', 'affiliate_system')->first()->activated) {
                $affiliateController = new AffiliateController;
                $affiliateController->processAffiliatePoints($order);
            }

            if (\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated) {


                $clubpointController = new ClubPointController;
                $clubpointController->processClubPoints($order);
            }

            $membership = new MembershipController;
            $membership->update_user_log($order->grand_total);

            $order->commission_calculated = 1;
            $order->save();
        }

        if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated && \App\OtpConfiguration::where('type', 'otp_for_paid_status')->first()->value){
            try {
                $otpController = new OTPVerificationController;
                $otpController->send_payment_status($order);
            } catch (\Exception $e) {
            }
        }
        return 1;
    }

    function confrim_courier(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $order->confrim_courier = $request->confrim_courier;
        $order->confrim_resi = $request->confrim_resi;
        if($order->save())
        {

            
            try {
                $array['view'] = 'emails.pesanan_dikirim';
                $array['from'] = env('MAIL_USERNAME');
                $array['subject'] = "Pesanan Dikirim";
                $array['order_id'] = $order->id;
               
                Mail::to($order->user->email)->queue(new MailStatusOrder($array));
            } catch (\Exception $e) {
                dd($e);
            }
            flash('successfully')->success();
            return redirect()->route('orders.show', encrypt($order->id));
        }else{
            flash(__('Something went wrong'))->error();
            return back();
        }
        
    }

    function confrim_order_complete(Request $request)
    {
        $order = Order::findOrFail(decrypt($request->order_id));
        if($order->delivery_status !='completed')
        {
            $order->user_confrim_order = 1;
            $order->delivery_status ='completed';
            $order->user_confrim_date =  date("now");
            if($order->save())
            {
                flash('successfully')->success();
                return back();
            }else{
                flash(__('Something went wrong'))->error();
                return back();
            }
        }
        return back();
        
    }

    function upload_bayar(Request $request)
    {
    
            $order = Order::findOrFail($request->order_id);
            $order->payment_status="waiting_confrim";
            $order->save();

            $tf_order = OrdersPaymentTf::where('order_id',$request->order_id)->first();
            if(!isset($tf_order) || $tf_order == null)
            {
                 $tf_order = new OrdersPaymentTf;
            }
            if ($request->hasFile('photo')) {

                $tf_order->upload_img = $request->photo->store('uploads/bayar');
            }
            
            $tf_order->no_rek =$request->norek;
            $tf_order->an_rek =$request->an;
            $tf_order->bank =$request->bank;
            $tf_order->order_id = $request->order_id;
            if($tf_order->save())
            {
                flash('successfully')->success();
                return redirect()->route('purchase_history.index');
            }else{
                flash(__('Something went wrong'))->error();
                return back();
            }
        
      
    }    
}
