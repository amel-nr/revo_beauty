<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Coupon;
use DB;
use Mail;
use App\Mail\EmailCoupon;

class CouponUltah extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:couponultah';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for member ultah';

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
        $coupon_ultah = \App\BusinessSetting::where('type', 'coupon_ultah')->first();
        $coupon = null;
        // dd(md5(strtotime(date('Y-m-d H:i:s'))));


        if(isset($coupon_ultah))
        {
            $coupon =  json_decode($coupon_ultah->value);
        }
         // dd($coupon->discount_type);
        if( isset($coupon))
        {
            $users = DB::table('users')->whereRaw('user_type = "customer" and tgl_lahir is not null and email is not null and DATE_FORMAT(tgl_lahir,"%m%d") = DATE_FORMAT(NOW(),"%m%d")')->get();

            if(count($users) > 0)
            {
                $start_date = strtotime(date('d-m-Y'));
                $end_date = strtotime(date('d-m-Y'));
                $coupons = new Coupon();
                $coupons->type = 'cart_base';
                $coupons->code = strtotime(date('Y-m-d H:i:s'));
                $coupons->discount = (int) $coupon->discount;
                $coupons->discount_type = $coupon->discount_type;
                $coupons->start_date = $start_date;
                $coupons->end_date = $end_date;
                $coupons->status_code = 'user_ultah';
                $data = array();
                $data['min_buy'] = (int) $coupon->min_buy;
                $data['max_discount'] = (int) $coupon->max_discount;
                $coupons->details = json_encode($data);

                if($coupons->save())
                {
                    foreach ($users as $key => $user) {
                        # code...
                        Log::info('working job ultah '.$user->id);
                        $user = User::findOrfail($user->id);
                        if($user->user_tier->is_kupon_ultah == 1)
                        {
                            $array['emailfrom'] = env('MAIL_USERNAME');
                            $array['nama'] = $user->name." ".$user->last_name;
                            $array['code_kupon'] = $coupons->code;
                            $array['subject'] = "Promo Kupon Ulang Tahun";
                            Mail::to($user->email)->queue(new EmailCoupon($array));
                        }
                       
                    }
                }

            }
        }
        
        
        
    }
}
