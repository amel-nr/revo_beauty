<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessSetting;
use App\ClubPointDetail;
use App\ClubPoint;
use App\Product;
use App\Wallet;
use App\Order;
use Auth;
use App\User;
use App\Membership;

class ClubPointController extends Controller
{
    public function configure_index()
    {
        return view('club_points.config');
    }

    public function index()
    {
        $club_points = ClubPoint::latest()->paginate(15);
        return view('club_points.index', compact('club_points'));
    }

    public function userpoint_index()
    {
        $club_points = ClubPoint::where('user_id', Auth::user()->id)->latest()->paginate(15);
        return view('club_points.frontend.index', compact('club_points'));
    }

    public function set_point()
    {
        $products = Product::latest()->paginate(15);
        return view('club_points.set_point', compact('products'));
    }

    public function set_products_point(Request $request)
    {
        $products = Product::whereBetween('unit_price', [$request->min_price, $request->max_price])->get();
        foreach ($products as $product) {
            $product->earn_point = $request->point;
            $product->save();
        }
        flash(__('Point has been inserted successfully for ').count($products).__(' products'))->success();
        return redirect()->route('set_product_points');
    }

    public function set_point_edit($id)
    {
        $product = Product::findOrFail(decrypt($id));
        return view('club_points.product_point_edit', compact('product'));
    }

    public function update_product_point(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->earn_point = $request->point;
        $product->save();
        flash(__('Point has been updated successfully'))->success();
        return redirect()->route('set_product_points');
    }

    public function convert_rate_store(Request $request)
    {
        $club_point_convert_rate = BusinessSetting::where('type', $request->type)->first();
        if ($club_point_convert_rate != null) {
            $club_point_convert_rate->value = $request->value;
        }
        else {
            $club_point_convert_rate = new BusinessSetting;
            $club_point_convert_rate->type = $request->type;
            $club_point_convert_rate->value = $request->value;
        }
        $club_point_convert_rate->save();
        flash(__('Point convert rate has been updated successfully'))->success();
        // return redirect()->route('club_points.configs');
        return back();
    }

    public function processClubPoints(Order $order)
    {
        $user = User::findOrfail($order->user->id);
        $poin_member = $user->user_tier->poin_order/100;
        $ultah = date('d-m', strtotime($user->tgl_lahir));
        $today = date('d-m', strtotime($order->created_at));
        $dapatPoint=0;

        $club_point = new ClubPoint;
        $club_point->user_id = $order->user->id;
        $club_point->points = 0;
        $club_point->keterangan = 'PEMBELIAN POINT';
        $club_point->order_id = $order->id;
        $subtotal = 0;
        foreach ($order->orderDetails as $key => $orderDetail) {
            $total_pts = ($orderDetail->product->earn_point) * $orderDetail->quantity;
            $club_point->points += $total_pts;
            $subtotal += $orderDetail->quantity*$orderDetail->price;
        }

        if($ultah == $today)
        {
            $dapatPoint += ($subtotal*$poin_member)*2;

        }else{

            $dapatPoint += $subtotal*$poin_member;

        }
        // dd($dapatPoint);
        $club_point->points += $dapatPoint;

        $club_point->convert_status = 0;
        $club_point->save();
        foreach ($order->orderDetails as $key => $orderDetail) {
            $club_point_detail = new ClubPointDetail;
            $club_point_detail->club_point_id = $club_point->id;
            $club_point_detail->product_id = $orderDetail->product_id;
            $club_point_detail->point = $total_pts;
            $club_point_detail->save();
        }

       
        $user->point += $club_point->points;
        $user->save();

        if($order->user->referred_by != null || isset(Auth::user()->referred_by))
        {   
            
            $club_point = ClubPoint::where(['user_id' => $order->user->referred_by,'order_id' => $order->id ])->first();
            $club_point_user_affiliate = BusinessSetting::where('type', 'club_point_user_affiliate')->first();
            if($club_point == null && isset($club_point_user_affiliate))
            {   
                $club_point = new ClubPoint;
                $club_point->user_id = $order->user->referred_by;
                $club_point->points = (int) $club_point_user_affiliate->value;
                $club_point->order_id = $order->id;
                $club_point->keterangan = 'REFERRAL POINT';
                if($club_point->save())
                {
                    $referal = User::findOrfail($order->user->referred_by);
                    $referal->point = $referal->point + (int) $club_point_user_affiliate->value;
                    $referal->save();
                    // dd($referal);

                }

                
            }
            
        }


    }

    public function club_point_detail($id)
    {
        $club_point_details = ClubPointDetail::where('club_point_id', decrypt($id))->paginate(12);
        return view('club_points.club_point_details', compact('club_point_details'));
    }

    public function convert_point_into_wallet(Request $request)
    {
        $club_point_convert_rate = BusinessSetting::where('type', 'club_point_convert_rate')->first()->value;
        $club_point = ClubPoint::findOrFail($request->el);
        $wallet = new Wallet;
        $wallet->user_id = Auth::user()->id;
        $wallet->amount = floatval($club_point->points / $club_point_convert_rate);
        $wallet->payment_method = 'Club Point Convert';
        $wallet->payment_details = 'Club Point Convert';
        $wallet->save();
        $user = Auth::user();
        $user->balance = $user->balance + floatval($club_point->points / $club_point_convert_rate);
        $user->save();
        $club_point->convert_status = 1;
        if ($club_point->save()) {
            return 1;
        }
        else {
            return 0;
        }
    }

    public function club_point_user_affiliate(Request $request)
    {
        $club_point_user_affiliate = BusinessSetting::where('type', $request->type)->first();
        if ($club_point_user_affiliate != null) {
            $club_point_user_affiliate->value = $request->value;
        }
        else {
            $club_point_user_affiliate = new BusinessSetting;
            $club_point_user_affiliate->type = $request->type;
            $club_point_user_affiliate->value = $request->value;
        }
        $club_point_user_affiliate->save();
        flash(__('Submit has been updated successfully'))->success();
        // return redirect()->route('club_points.configs');
        return back();
    }

     public function club_point_user_review(Request $request)
    {
        $club_point_user_affiliate = BusinessSetting::where('type', 'club_point_user_review')->first();
        $values=[
            'value' => $request->value,
            'jml_max' => $request->jml_max
        ];

        if ($club_point_user_affiliate != null) {

            $club_point_user_affiliate->value = json_encode($values);
        }
        else {
            $club_point_user_affiliate = new BusinessSetting;
            $club_point_user_affiliate->type = $request->type;
            $club_point_user_affiliate->value = json_encode($values);
        }
        $club_point_user_affiliate->save();
        flash(__('Submit has been updated successfully'))->success();
        // return redirect()->route('club_points.configs');
        return back();
    }

    public function set_member_points(Request $request)
    {
        $members = Membership::orderBy('id','asc')->get();
        return view('club_points.member',compact('members'));
    }
    public function set_member_setting(Request $request)
    {
        
        $member = Membership::findOrfail($request->id);
        $member->poin_order = $request->poin_order;
        $member->free_shiping_cost = $request->free_shiping_cost;
        $member->free_shiping_min_order = $request->free_shiping_min_order;
        $member->is_kupon_ultah = $request->is_kupon_ultah == 'on' ? 1: 0;
        $member->is_product_spesial = $request->is_product_spesial == 'on' ? 1:0;
        $member->save();
        flash(__('Submit has been updated successfully'))->success();
        // return redirect()->route('club_points.configs');
        return back();

    }
}
