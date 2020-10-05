<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class OrderStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:cekorder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $orders = Order::where('payment_status','unpaid')->whereDate('created_at','<',Carbon::now()->subDays(2))->get();
        
        foreach ($orders as $key => $order) {
            # code...
            $status = 'expire';
            $order->payment_status_viewed = '1';
            $order->delivery_status = 'pending';
            $order->payment_status = $status;
            foreach($order->orderDetails as $key => $orderDetail){
                $orderDetail->payment_status = $status;
                $orderDetail->save();
            }
            $order->payment_status = $status;
            $order->save();
            Log::info('working job expire '.$order->id);
        }
        
        
        
    }
}
