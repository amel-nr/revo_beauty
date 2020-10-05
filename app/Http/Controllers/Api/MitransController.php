<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ClubPointController;
use App\Order;
use App\User;
use Mail;
use App\Mail\MailStatusOrder;

class MitransController extends Controller
{
    //
    public function handle(Request $request)
    {
    	// \Log::info($request->all());
    	
    	$orderId = $request->order_id;
	    $statusCode = $request->status_code;
	    $grossAmount = $request->gross_amount;
	    $serverKey = env('MITRANS_SERVER_KEY');
	    $input = $orderId.$statusCode.$grossAmount.$serverKey;

	    $signature = openssl_digest($input, 'sha512');
	    // dd($signature);
	    if ($signature == $request->signature_key) {
	    	# code...

	    	$order = Order::where('code',$orderId)->first();

	    	if ($request->transaction_status == 'settlement') {
	    		# code...

		    	
		        $order->payment_status_viewed = '1';
		        $status = 'paid';

		        foreach($order->orderDetails as $key => $orderDetail){
		            $orderDetail->payment_status = $status;
		            $orderDetail->save();
		        }
		        $order->payment_status = $status;
		        $order->save();


		        if (\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated) {
		            $clubpointController = new ClubPointController;
		            $clubpointController->processClubPoints($order);
		        }

		        

		        $user = User::where('id',$order->user_id)->first();
		        if(isset($user) && isset($user->fbtoken))
		        {
		        	$param['to'] = $user->fbtoken;
		        	$param['notification'] = [
			        	"title"=>"Payment Sukses",
			        	"body"=> [
			        		"order_id" =>$order->code,
			        		"status" => "suskes"
			        	],
			        	"click_action"=> url('/')
			        ];
			       $mss= send_message($param);
			   
		        }

		         try {
		                $array['view'] = 'emails.pembayaran_berhasil';
		                $array['from'] = env('MAIL_USERNAME');
		                $array['subject'] = "Pembayaran Berhasil";
		                $array['order_id'] = $order->id;
		               
		                Mail::to($order->user->email)->queue(new MailStatusOrder($array));
		            } catch (\Exception $e) {
		                dd($e);
		            }
		        
		        return 1;
	        }else if($request->transaction_status == 'pending'){

	    		 $status = 'unpaid';
	        	 $order->payment_status_viewed = '1';
	        	 $order->delivery_status = 'pending';
	        	 $order->payment_status = $status;
	        	 foreach($order->orderDetails as $key => $orderDetail){
		            $orderDetail->payment_status = $status;
		            $orderDetail->save();
		         }
			     $order->payment_status = $status;
			     $order->save();
		        

	    	}
	        else if($request->transaction_status == 'expire'){

	    		 $status = $request->transaction_status;
	        	 $order->payment_status_viewed = '1';
	        	 $order->delivery_status = 'pending';
	        	 $order->payment_status = $status;
	        	 foreach($order->orderDetails as $key => $orderDetail){
		            $orderDetail->payment_status = $status;
		            $orderDetail->save();
		         }
			     $order->payment_status = $status;
			     $order->save();
		        

	    	}
	    }

    }
}
