<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Mail;
use App\Mail\MailStatusOrder;

class DeliveryStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:cekdelivery';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check delivery order';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $orders = Order::where(['payment_status'=>'paid','delivery_status' => 'on_delivery'])->where('confrim_resi','!=','null')->get();
    
        
        foreach ($orders as $key => $order) {
            # code...
            $resi = $order->confrim_resi;
            $jenis = $order->confrim_courier;
            $param = "waybill=$resi&courier=$jenis";
            $tracking = global_request_raja_ongkir('waybill', 'POST', $param);
           
            if(isset($tracking))
            {
                if($tracking->result->delivered)
                {   
                    $delivery_status = $tracking->result->delivery_status;
                    $order->delivery_status = 'delivered';
                    
                    foreach($order->orderDetails as $key => $orderDetail){
                        $orderDetail->delivery_status = 'delivered';
                        $orderDetail->save();
                    }
                    $order->tgl_terkirim = date('Y-m-d H:m:s', strtotime($delivery_status->pod_date.' '.$delivery_status->pod_time));
                    $order->delivery_info = json_encode($delivery_status);
                    $order->save();


                    try {
                        $array['view'] = 'emails.pesanan_diterima';
                        $array['from'] = env('MAIL_USERNAME');
                        $array['subject'] = "Pesanan Diterima";
                        $array['order_id'] = $order->id;
                        Mail::to($order->user->email)->queue(new MailStatusOrder($array));
                    } catch (\Exception $e) {
                        Log::info($e);
                    }
                }
               
            }
            

            Log::info('working job delivery '.$order->id);
        }
    }
}
