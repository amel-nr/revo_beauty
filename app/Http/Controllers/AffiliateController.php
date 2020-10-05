<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AffiliateOption;
use App\Addon;
use App\Order;
use App\BusinessSetting;
use App\AffiliateConfig;
use App\AffiliateUser;
use App\AffiliatePayment;
use App\AffiliateEarningDetail;
use App\User;
use App\Customer;
use App\Category;
use App\Models\AffiliateUserCode;
use Session;
use Cookie;
use Auth;
use Hash;
use App\Coupon;
use DB;
use App\Models\Mvariable;
use ImageOptimizer;

class AffiliateController extends Controller
{
    //
    public function index(){
        return view('affiliate.index');
    }

    public function affiliate_option_store(Request $request){
        //dd($request->all());
        $affiliate_option = AffiliateOption::where('type', $request->type)->first();
        if($affiliate_option == null){
            $affiliate_option = new AffiliateOption;
        }
        $affiliate_option->type = $request->type;

        $commision_details = array();
        if ($request->type == 'user_registration_first_purchase') {
            $affiliate_option->percentage = $request->percentage;
        }
        elseif ($request->type == 'product_sharing') {
            $commision_details['commission'] = $request->amount;
            $commision_details['commission_type'] = $request->amount_type;
        }
        elseif ($request->type == 'category_wise_affiliate') {
            foreach(Category::all() as $category) {
                $data['category_id'] = $request['categories_id_'.$category->id];
                $data['commission'] = $request['commison_amounts_'.$category->id];
                $data['commission_type'] = $request['commison_types_'.$category->id];
                array_push($commision_details, $data);
            }
        }
        elseif ($request->type == 'max_affiliate_limit') {
            $affiliate_option->percentage = $request->percentage;
        }
        $affiliate_option->details = json_encode($commision_details);
        if ($request->has('status')) {
            $affiliate_option->status = 1;
        }
        else {
            $affiliate_option->status = 0;
        }
        $affiliate_option->save();
        flash("This has been updated successfully")->success();
        return back();
    }

    public function configs(){
            return view('affiliate.configs');
    }

    public function config_store(Request $request){
        $form = array();
        $select_types = ['select', 'multi_select', 'radio'];
        $j = 0;
        for ($i=0; $i < count($request->type); $i++) {
            $item['type'] = $request->type[$i];
            $item['label'] = $request->label[$i];
            if(in_array($request->type[$i], $select_types)){
                $item['options'] = json_encode($request['options_'.$request->option[$j]]);
                $j++;
            }
            array_push($form, $item);
        }
        $affiliate_config = AffiliateConfig::where('type', 'verification_form')->first();
        $affiliate_config->value = json_encode($form);
        if($affiliate_config->save()){
            flash("Verification form updated successfully")->success();
            return back();
        }
    }

    public function apply_for_affiliate(Request $request){
        return view('affiliate.frontend.apply_for_affiliate');
    }

    public function store_affiliate_user(Request $request){
        if(!Auth::check()){
            if(User::where('email', $request->email)->first() != null){
                flash(__('Email already exists!'))->error();
                return back();
            }
            if($request->password == $request->password_confirmation){
                $user = new User;
                $user->name = $request->name;
                $user->email = $request->email;
                $user->user_type = "customer";
                $user->password = Hash::make($request->password);
                $user->save();

                $customer = new Customer;
                $customer->user_id = $user->id;
                $customer->save();

                auth()->login($user, false);
            }
            else{
                flash(__('Sorry! Password did not match.'))->error();
                return back();
            }
        }

        $affiliate_user = Auth::user()->affiliate_user;
        if ($affiliate_user == null) {
            $affiliate_user = new AffiliateUser;
            $affiliate_user->user_id = Auth::user()->id;
        }
        $data = array();
        $i = 0;
        foreach (json_decode(AffiliateConfig::where('type', 'verification_form')->first()->value) as $key => $element) {
            $item = array();
            if ($element->type == 'text') {
                $item['type'] = 'text';
                $item['label'] = $element->label;
                $item['value'] = $request['element_'.$i];
            }
            elseif ($element->type == 'select' || $element->type == 'radio') {
                $item['type'] = 'select';
                $item['label'] = $element->label;
                $item['value'] = $request['element_'.$i];
            }
            elseif ($element->type == 'multi_select') {
                $item['type'] = 'multi_select';
                $item['label'] = $element->label;
                $item['value'] = json_encode($request['element_'.$i]);
            }
            elseif ($element->type == 'file') {
                $item['type'] = 'file';
                $item['label'] = $element->label;
                $item['value'] = $request['element_'.$i]->store('uploads/affiliate_verification_form');
            }
            array_push($data, $item);
            $i++;
        }
        $affiliate_user->informations = json_encode($data);
        if($affiliate_user->save()){
            flash(__('Your verification request has been submitted successfully!'))->success();
            return redirect()->route('home');
        }

        flash(__('Sorry! Something went wrong.'))->error();
        return back();
    }

    public function store_affiliate_new(Request $request){
        // dd($request->all());
        \DB::beginTransaction();
        try {
            if(!Auth::check()){
                if(User::where('email', $request->email)->first() != null){
                    flash(__('Email already exists!'))->error();
                    return back();
                }
                if($request->password == $request->password_confirmation){
                    $user = new User;
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->user_type = "customer";
                    $user->password = Hash::make($request->password);
                    $user->save();

                    $customer = new Customer;
                    $customer->user_id = $user->id;
                    $customer->save();

                    auth()->login($user, false);
                }
                else{
                    flash(__('Sorry! Password did not match.'))->error();
                    return back();
                }
            }

            $affiliate_user = Auth::user()->affiliate_user;
            if ($affiliate_user == null && $request->type == 'influencer'  ) {
                $affiliate_user                = new AffiliateUser;
                $affiliate_user->user_id       = Auth::user()->id;
                $affiliate_user->jenis         = $request->type;
                $affiliate_user->nomor_hp_pic  = $request->nomor_hp_pic;
                $affiliate_user->ig_username   = $request->username_ig;
                $affiliate_user->fb_username   = $request->username_fb;
                $affiliate_user->tw_username   = $request->username_tw;
                $affiliate_user->yt_username   = $request->username_yt;
                $affiliate_user->email         = $request->email;
                $affiliate_user->jenis_kelamin = $request->jeniskelamin_influencer;
                
            }elseif ($affiliate_user == null && $request->type == 'company') {
                # code...
                $affiliate_user                      = new AffiliateUser;
                $affiliate_user->user_id             = Auth::user()->id;
                $affiliate_user->jenis               = $request->type;
                $affiliate_user->nomor_hp_pic        = $request->nomor_hp_pic;
                $affiliate_user->nama_perusahaan     = $request->nama_perusahaan;
                $affiliate_user->alamat_perusahaan   = $request->alamat_perusahaan;
                $affiliate_user->nomor_hp_perusahaan = $request->nomor_hp_perusahaan;
                $affiliate_user->deskripsi_produk    = $request->deskripsi_produk;
                $affiliate_user->email               = $request->email;
                $affiliate_user->jenis_kelamin       = $request->jeniskelamin_company;
            }

            if($affiliate_user->save()){
                \DB::commit();
                flash(__('Your verification request has been submitted successfully!'))->success();
                return redirect()->route('home');
            }

            flash(__('Sorry! Something went wrong.'))->error();
            return back();

        } catch (Exception $e) {
            \DB::rollback();
            flash(__('Sorry! Something went wrong.'))->error();
            return back();
        }
    }

    public function users(){
        $affiliate_users = AffiliateUser::where('jenis','!=','user')->paginate(12);
        return view('affiliate.users', compact('affiliate_users'));
    }

    public function show_verification_request($id){
        $affiliate_user = AffiliateUser::findOrFail($id);
        return view('affiliate.show_verification_request', compact('affiliate_user'));
    }

    public function approve_user($id)
    {
        $affiliate_user = AffiliateUser::findOrFail($id);
        $affiliate_user->status = 1;
        if($affiliate_user->save()){
            flash(__('Affiliate user has been approved successfully'))->success();
            return redirect()->route('affiliate.users');
        }
        flash(__('Something went wrong'))->error();
        return back();
    }

    public function reject_user($id)
    {
        $affiliate_user = AffiliateUser::findOrFail($id);
        $affiliate_user->status = 0;
        $affiliate_user->informations = null;
        if($affiliate_user->save()){
            flash(__('Affiliate user request has been rejected successfully'))->success();
            return redirect()->route('affiliate.users');
        }
        flash(__('Something went wrong'))->error();
        return back();
    }

    public function updateApproved(Request $request)
    {
        $affiliate_user = AffiliateUser::findOrFail($request->id);
        $affiliate_user->status = $request->status;
        if($affiliate_user->save()){
            return 1;
        }
        return 0;

    }

    public function payment_modal(Request $request)
    {
        $affiliate_payment = AffiliatePayment::findOrFail($request->id);
        return view('affiliate.payment_modal', compact('affiliate_payment'));
    }

    public function payment_user(Request $request)
    {
        $payment =  AffiliatePayment::findOrfail($request->affiliate_user_payment);
        $payment->status = 'paid';
        $payment->tgl_bayar = new \DateTime();
        if($request->has('previous_photos')){
            $photos = $request->previous_photos;
        }
        else{
            $photos = array();
        }

        if($request->hasFile('photos')){
            foreach ($request->photos as $key => $photo) {
                $path = $photo->store('uploads/products/review');
                array_push($photos, $path);
                ImageOptimizer::optimize(base_path('public/').$path);
            }
            $payment->gambar = json_encode($photos);
        }
        if($payment->save())
        {
            flash(__('Your submitted successfully!'))->success();

        }else{
            flash(__('Something went wrong'))->error();
        }
        return back();
    }

    public function payment_store(Request $request){
        \DB::beginTransaction();
        try {
            $mycoupon= AffiliateUserCode::where('user_id',Auth::user()->id)->get();

            $affiliate_payment = new AffiliatePayment;
            $affiliate_payment->affiliate_user_id = Auth::user()->id;
            $affiliate_payment->amount = $mycoupon->sum('sales');
            $affiliate_payment->payment_method = $request->payment_method;
            $affiliate_payment->norek = $request->norek;
            $affiliate_payment->status = 'unpaid';
            $affiliate_payment->atasnama = $request->atasnama; 
            if($affiliate_payment->save())
            {
                foreach ($mycoupon as $key => $value) {
                    # code...
                    // dd($value);
                    $value->sales = 0;
                    $value->save();
                }
                \DB::commit();
                flash(__('Your submitted successfully!'))->success();
                return redirect()->route('new_affiliate_home');

            }
             \DB::rollback();
            flash(__('Something went wrong'))->error();
            return back();
            
        } catch (\Illuminate\Database\QueryException $e) {
            // dd($e);
            \DB::rollback();
            flash(__('Something went wrong'))->error();
            return back();
            

        }
       

        // $affiliate_user = AffiliateUser::findOrFail($request->affiliate_user_id);
        // $affiliate_user->balance -= $request->amount;
        // $affiliate_user->save();

        // flash(__('Payment completed'))->success();
        // return back();
    }

    public function payment_history($id){
        $affiliate_user = AffiliateUser::findOrFail(decrypt($id));
        $affiliate_payments = $affiliate_user->affiliate_payments();
        return view('affiliate.payment_history', compact('affiliate_payments', 'affiliate_user'));
    }

    public function user_index(){
        $affiliate_user = Auth::user()->affiliate_user;
        $affiliate_payments = $affiliate_user->affiliate_payments();
        return view('affiliate.frontend.index', compact('affiliate_payments'));
    }

    public function user_payment(Request $request)
    {
        $affiliatePayment = AffiliatePayment::orderBy('created_at','desc')->paginate(12);
        return view('affiliate.payment_user', compact('affiliatePayment'));
    }

    public function payment_settings(){
        $affiliate_user = Auth::user()->affiliate_user;
        return view('affiliate.frontend.payment_settings', compact('affiliate_user'));
    }

    public function payment_settings_store(Request $request){
        $affiliate_user = Auth::user()->affiliate_user;
        $affiliate_user->paypal_email = $request->paypal_email;
        $affiliate_user->bank_information = $request->bank_information;
        $affiliate_user->save();
        flash(__('Affiliate payment settings has been updated successfully'))->success();
        return redirect()->route('affiliate.user.index');
    }

    public function processAffiliatePoints(Order $order){
        if(Addon::where('unique_identifier', 'affiliate_system')->first() != null && \App\Addon::where('unique_identifier', 'affiliate_system')->first()->activated){
            if(AffiliateOption::where('type', 'user_registration_first_purchase')->first()->status){
                if ($order->user != null && $order->user->orders->count() == 1) {
                    if($order->user->referred_by != null){
                        $user = User::find($order->user->referred_by);
                        if ($user != null) {
                            $amount = (AffiliateOption::where('type', 'user_registration_first_purchase')->first()->percentage * $order->grand_total)/100;
                            $affiliate_user = $user->affiliate_user;
                            if($affiliate_user != null){
                                $affiliate_user->balance += $amount;
                                $affiliate_user->save();
                            }
                        }
                    }
                }
            }
            if(AffiliateOption::where('type', 'product_sharing')->first()->status){
                foreach ($order->orderDetails as $key => $orderDetail) {
                    $amount = 0;
                    if($orderDetail->product_referral_code != null){
                        $referred_by_user = User::where('referral_code', $orderDetail->product_referral_code)->first();
                        if($referred_by_user != null) {
                            if(AffiliateOption::where('type', 'product_sharing')->first()->details != null && json_decode(AffiliateOption::where('type', 'product_sharing')->first()->details)->commission_type == 'amount'){
                                $amount = json_decode(AffiliateOption::where('type', 'product_sharing')->first()->details)->commission;
                            }
                            elseif(AffiliateOption::where('type', 'product_sharing')->first()->details != null && json_decode(AffiliateOption::where('type', 'product_sharing')->first()->details)->commission_type == 'percent') {
                                $amount = (json_decode(AffiliateOption::where('type', 'product_sharing')->first()->details)->commission * $orderDetail->price)/100;
                            }
                            $affiliate_user = $referred_by_user->affiliate_user;
                            if($affiliate_user != null){
                                $affiliate_user->balance += $amount;
                                $affiliate_user->save();
                            }
                        }
                    }
                }
            }
            elseif (AffiliateOption::where('type', 'category_wise_affiliate')->first()->status) {
                foreach ($order->orderDetails as $key => $orderDetail) {
                    $amount = 0;
                    if($orderDetail->product_referral_code != null) {
                        $referred_by_user = User::where('referral_code', $orderDetail->product_referral_code)->first();
                        if($referred_by_user != null) {
                            if(AffiliateOption::where('type', 'category_wise_affiliate')->first()->details != null){
                                foreach (json_decode(AffiliateOption::where('type', 'category_wise_affiliate')->first()->details) as $key => $value) {
                                    if($value->category_id == $orderDetail->product->category->id){
                                        if($value->commission_type == 'amount'){
                                            $amount = $value->commission;
                                        }
                                        else {
                                            $amount = ($value->commission * $orderDetail->price)/100;
                                        }
                                    }
                                }
                            }
                            $affiliate_user = $referred_by_user->affiliate_user;
                            if($affiliate_user != null){
                                $affiliate_user->balance += $amount;
                                $affiliate_user->save();
                            }
                        }
                    }
                }
            }
        }
    }

    public function refferal_users()
    {
        $refferal_users = User::where('referred_by', '!=' , null)->paginate(10);
        return view('affiliate.refferal_users', compact('refferal_users'));
    }

    public function code_custome(Request $request)
    {
        \DB::beginTransaction();
        try {
            $coupon_setting = Mvariable::where(['var_id'=>'affiliate_cupon','is_deleted' => 0])->first();
            $code = new AffiliateUserCode();
            $code->kode_id = $request->kode;
            $code->user_id = Auth::user()->id;
            $code->komisi = (int)$coupon_setting->param_4;
            if($code->save())
            {
               
                $start_date = strtotime(date('d-m-Y'));
                $end_date = strtotime("+".$coupon_setting->param_3." day", $start_date);
                $coupon = new Coupon();
                $coupon->type = 'cart_base';
                $coupon->code = $request->kode;
                $coupon->discount = (int) $coupon_setting->param_2;
                $coupon->discount_type = 'amount';
                $coupon->start_date = $start_date;
                $coupon->end_date = $end_date;
                $coupon->status_code = 'user_affiliate';
                $data = array();
                $data['min_buy'] = (int) $coupon_setting->param_1;
                $data['max_discount'] = (int) $coupon_setting->param_2;
                $coupon->details = json_encode($data);
                if ($coupon->save()) {
                    # code...
                    \DB::commit();
                    flash(__('Your submitted successfully!'))->success();
                    return redirect()->route('new_affiliate_home');
                }
                \DB::rollback();
                flash(__('The code already exists'))->error();
                return back();
            }else{
                \DB::rollback();
                flash(__('The code already exists'))->error();
                return back();

            }
            
        } catch (\Illuminate\Database\QueryException $e) {
            // dd($e);
            \DB::rollback();
            flash(__('The code already exists'))->error();
            return back();
        }
    }
}
