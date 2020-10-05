<?php

namespace App\Http\Controllers;
use App\Membership;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Membership_user_log;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiers = Membership::with("unitperiod")->get();
        return $tiers;

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
        
        $data = [
            "title" => $request->title,
            "min" => $request->max,
            "period" => $request->period,
            "period_unit" => $request->period_unit
        ];
        if ($this->valid($request)) {
            if (Membership::create($data)) {
                 flash(__('Membership Tier added'))->success();
                 return redirect()->back();
             }else{
                 flash(__('database insert has failed'))->error();
                }
            }
            flash(__('max exist'))->error();
            
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
        $data = Membership::where('user_id',$id)->first();
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Membership::where('id',$id)->with("unitperiod")->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());
            $data = [
                "title" => $request->title,
                "period" => $request->period,
                "period_unit" => $request->unit,
                "min" => $request->max
            ];
            // dd($this->valid($request));

            if ($this->valid($request)) {
                $data = Membership::where('id',$request->id)->update($data);
                if ($data) {
                    return 'success';
                }else{
                    return 'dbfailed';
                }
            }
            return "error";
            
    }

    public function valid(Request $request)
    {
        $val = Membership::where('min',$request->max);
        // $val = $val;
        // dd($request->id);
        if ($request->id) {
            $val = $val->where("id","!=","$request->id");
        }

        $val = $val->first();

        if (isset($val)) {
            return false;
        }
        return true;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function update_user_log($grandtot = 0)
    {
        
        // curent tier
        // $membership = new Membership_user_log;
        // $purchased = $membership->where('user_id',Auth::user()->id)->sum('total_purchase');
        // $memberUserLog = $membership->where('user_id',Auth::user()->id)->with(["membership"])->orderBy('created_at','desc');
        // $current_tier = $memberUserLog->first();
        // $endsOn = $current_tier->ends_on;
        
        // // get new tier
        // $getTier = new Membership;
        // $getNewTier = $getTier->where('max','>=',$purchased)->orderBy("max")->first();
        // if ($getNewTier == null) {
        //     $getNewTier = $getTier->orderBy("max","desc")->first();
        // }
        
        // if ($grandtot != 0) {
        //     $total = (int)$grandtot + (int)$purchased;
        //     $getNewTier = $getTier->where('max','>=',$total)->orderBy("max")->first();
        //     if ($getNewTier == null) {
        //         $getNewTier = $getTier->orderBy("max","desc")->first();
        //     }
        //     $newTier = $getNewTier->id;
        //     if ($current_tier->member_id != $newTier) {
        //         $period = $getNewTier->period;
        //         $unit = $getNewTier->period_unit;
                
        //         $d='';
        //         if($unit == 1){$d = "+365 day";}elseif($unit == 2){$d = "+30 day";}elseif($unit == 3){$d = "+7 day";}
        //         $start_date = strtotime(date('d-m-Y'));
        //         $end_date = strtotime($d, $start_date);
        //         $endOn = date("Y-m-d H:i:s",$end_date);
                
        //         $data = [
        //             'user_id' => Auth::user()->id,
        //             'member_id' => $getNewTier->id,
        //             'total_purchase' => $total,
        //             'ends_on' =>  $endOn
        //         ];
        //         $membership->create($data);
        //     }else {
        //         if ($getNewTier == null) {
        //             $getNewTier = $getTier->orderBy("max","desc")->first();
        //             // dd($getNewTier);
        //         }
        //             $total = (int)$grandtot+(int)$current_tier->total_purchase;
        //             $current_tier->update(["total_purchase"=>$total,'member_id'=>$getNewTier->id]);
        //     }
        // }

        // // getting day of calculation
        // $startTiered  = date_create($endsOn);
        // $now = date_create();
        // $diff = date_diff($startTiered, $now);

        
        // $m = 0;
        // $d = 0;
        // $y = 0;
        

        
        // if((int)$diff->format('%d') == 0){            
        //     $newTier = $getNewTier->id;
        //     if ($current_tier->member_id != $newTier) {

        //         $data = [
        //             'user_id' => Auth::user()->id,
        //             'member_id' => $getNewTier->id,
        //             "total_purchase" => $purchased,
        //             'ends_on' => $endon
        //         ];
        //         $membership->create($data);
        //     }else {
        //         if ($getNewTier == null) {
        //             $getNewTier = $getTier->orderBy("max","desc")->first();
        //         }
        //         $current_tier->update(["total_purchase"=>$total,'member_id'=>$getNewTier->id]);
        //         // $current_tier->update("total_purchase",$purchased);
        //     }
        // }
    }

    public function getMember()
    {
        $orderU = \App\Order::where('user_id', Auth::user()->id);
        $log = new Membership_user_log;
        $tiers = new Membership;
        // dd($tier);
        if (count($orderU->get()->all()) <= 0 ) {
            if (count($log->where('user_id',Auth::user()->id)->get()->all()) <= 0) {
                $tier = $tiers->first();
                $unit = $tier->period_unit;
                $d='';
                if($unit == 1){$d = 365;}elseif($unit == 2){$d = 30;}elseif($unit == 3){$d = 7;}
                $d = (int)$d * $unit;
                $d = "+$d day";
                $start_date = strtotime(date('d-m-Y'));
                $end_date = strtotime($d, $start_date);
                $end_date = date("Y-m-d H:i:s",$end_date);
                
                $data = [
                    'user_id' => Auth::user()->id,
                    'member_id' => $tier->id,
                    'ends_on' => $end_date
                ];
                $log->create($data);
                Auth::user()->tier = $tier->id;
                Auth::user()->save();
            }
        }else {
            $u_log = $log->where('user_id',Auth::user()->id)->with('membership')->orderBy('created_at','desc')->first();
            $allOrder = $orderU->where('payment_status',"=","paid");
            $grandTotal = $allOrder->sum('grand_total');
            $order = $allOrder->whereBetween('created_at',[$u_log->created_at,$u_log->ends_on])->get();
            
            
            $totalOrder = $order->sum('grand_total');
            // dd($totalOrder);
            
            // if ($totalOrder == 0) {
                //     $totalOrder = $grand_total;
                // }
                
                $n_tiers = $tiers->where('min',"<=",$totalOrder)->first();
            
            $prevOrder = $allOrder->whereDate('created_at',"<",$u_log->created_at)->sum('grand_total');

            // dd([$prevOrder,$totalOrder,$grandTotal,$tiers->first(), $tiers->orderBy('id','desc')->first()]);
            // if(isset($n_tier)){
            //     if($n_tier->id == $u_log->member_id){
                //         $n_tier = $tiers->where('min',">=",$n_tier->min)->get()[1];
                //     }
                // }
                
                // dd(["ulid"=>$u_log->member_id,"ntid"=>$n_tiers->id,"t_o"=>$totalOrder,"umin"=>$u_log->membership->min,"nt"=>$n_tiers->min,'cok',$totalOrder >= $n_tiers->min]);
                if($n_tiers == null){
                    
                    $tier = $tiers->orderBy('id','desc')->first();
                    
                    $unit = $tier->period_unit;
                    $d='';
                    if($unit == 1){$d = 365;}elseif($unit == 2){$d = 30;}elseif($unit == 3){$d = 7;}
                    $d = (int)$d * $unit;
                    $d = "+$d day";
                    $start_date = strtotime(date('d-m-Y'));
                    $end_date = strtotime($d, $start_date);
                    $end_date = date("Y-m-d H:i:s",$end_date);
                    
                    $data = [
                        'member_id' => $tier->id,
                        'user_id' => Auth::user()->id,
                        'ends_on' => $end_date
                    ];
                    
                    $log->create($data);
                    Auth::user()->tier = $tier->id;
                    Auth::user()->save();
                }else{
                    $n_tiers = $tiers->where('min','>',$u_log->membership->min)->first();

                    // dd([$u_log->member_id,$n_tiers->id,$totalOrder , $n_tiers->min,$totalOrder > $n_tiers->min,$n_tiers->min,$totalOrder,$grandTotal,$allOrder->get()]);
                    if ($totalOrder == 0) {
                        // dd([$u_log->member_id,$n_tiers->id,$totalOrder , $n_tiers->min,$totalOrder > $n_tiers->min,$n_tiers->min,$totalOrder,$grandTotal,$allOrder->get(),"nol"]);
                        $totalOrder == $grandTotal;
                    }

                    if ($totalOrder > $n_tiers->min){
                    // dd($u_log->membership->title , $n_tiers->title);
                    
                    // dd("naik lvel setelah beli barang lebih");
                        $unit = $n_tiers->period_unit;
                        $d='';
                        if($unit == 1){$d = 365;}elseif($unit == 2){$d = 30;}elseif($unit == 3){$d = 7;}
                        $d = (int)$d * $unit;
                        $d = "+$d day";
                        $start_date = strtotime(date('d-m-Y'));
                        $end_date = strtotime($d, $start_date);
                        $end_date = date("Y-m-d H:i:s",$end_date);
                        
                        $data = [
                            'member_id' => $n_tiers->id,
                            'user_id' => Auth::user()->id,
                            'ends_on' => $end_date
                        ];
                        
                        $log->create($data);
                        Auth::user()->tier = $n_tiers->id;
                        Auth::user()->save();
                    }
                }
        }
        $u_log = $log->where('user_id',Auth::user()->id)->with('membership')->orderBy('created_at','desc')->first();
        // dd([$u_log->created_at,$u_log->ends_on,$totalOrder,$grandTotal]);
        
        // getting day of calculation
        $ct = $log->where('user_id',Auth::user()->id)->orderBy('created_at','desc')->first();
        $endsOn = $ct->ends_on;
        $startTiered  = date_create($endsOn);
        $now = date_create();
        $diff = date_diff($startTiered, $now);
        
        $m = 0;
        $d = 0;
        $y = 0;
        
        
        
        if((int)$diff->format('%d') == 0){   
            $u_log = $log->where('user_id',Auth::user()->id)->orderBy('created_at','desc')->first();
            $order = $orderU->where('payment_status',"paid")->whereBetween('created_at',[$u_log->created_at,$u_log->ends_on])->get();
            $totalOrder = $order->sum('grand_total');

            $n_tiers = $tiers->where('min',">=",$u_log->membership->min)->first();
            if (isset($n_tiers)) {
                $nt_id = $n_tiers->id;

                $unit = $n_tiers->period_unit;
                $d='';
                if($unit == 1){$d = 365;}elseif($unit == 2){$d = 30;}elseif($unit == 3){$d = 7;}
                    $d = (int)$d * $unit;
                    $d = "+$d day";
                $start_date = strtotime(date('d-m-Y'));
                $end_date = strtotime($d, $start_date);
                $end_date = date("Y-m-d H:i:s",$end_date);

                    $data = [
                        'user_id' => Auth::user()->id,
                        'member_id' => $nt_id,
                        'ends_on' => $end_date
                    ];
                    $log->create($data);
                    Auth::user()->tier = $nt_id;
                    Auth::user()->save();
            }else{
                $maxtier = $tiers->orderBy('min')->first();

                $unit = $maxtier->period_unit;
                $d='';
                if($unit == 1){$d = 365;}elseif($unit == 2){$d = 30;}elseif($unit == 3){$d = 7;}
                    $d = (int)$d * $unit;
                    $d = "+$d day";
                $start_date = strtotime(date('d-m-Y'));
                $end_date = strtotime($d, $start_date);
                $end_date = date("Y-m-d H:i:s",$end_date);

                $data = [
                    'user_id' => Auth::user()->id,
                    'member_id' => $maxtier->id,
                    'ends_on' => $end_date
                    ];
                $log->create($data);
                Auth::user()->tier = $maxtier->id;
                Auth::user()->save();
            }
        }
    }
}