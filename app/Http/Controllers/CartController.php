<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Models\Sample;
use App\Models\ProductPoint;
use App\SubSubCategory;
use App\Category;
use Session;
use App\Color;
use Cookie;

class CartController extends Controller
{
    public function index(Request $request)
    {
        //dd($cart->all());
        $categories = Category::all();

        // dd($sample);
        return view('frontend.view_cart', compact('categories'));
    }

    public function showCartModal(Request $request)
    {
        $product = Product::where('id', $request->id)->with('brand')->first();
        if ($request->sm) {
            $product->sm = $request->sm;
        }
        return view('frontend.partials.addToCart', compact('product'));
    }


    public function showBagModal(Request $request)
    {
        $product = Product::where('id', $request->id)->with('brand')->first();
        return view('frontend.partials.addToBag', compact('product'));
    }

    public function updateNavCart(Request $request)
    {
        return view('frontend.partials.cart');
    }

    public function addToCart(Request $request)
    {

        $product = Product::find($request->id);
        $data = array();
        $data['id'] = $product->id;
        $str = '';
        $tax = 0;

        //check the color enabled or disabled for the product
        if ($request->has('color')) {
            $data['color'] = $request['color'];
            $str = Color::where('code', $request['color'])->first()->name;
        }

        if ($product->digital != 1) {
            //Gets all the choice values of customer choice option and generate a string like Black-S-Cotton
            foreach (json_decode(Product::find($request->id)->choice_options) as $key => $choice) {
                if ($str != null) {
                    $str .= '-' . str_replace(' ', '', $request['attribute_id_' . $choice->attribute_id]);
                } else {
                    $str .= str_replace(' ', '', $request['attribute_id_' . $choice->attribute_id]);
                }
            }
        }

        $data['variant'] = $str;

        if ($str != null && $product->variant_product) {
            $product_stock = $product->stocks->where('variant', $str)->first();
            $price = $product_stock->price;
            $quantity = $product_stock->qty;

            if ($quantity >= $request['quantity']) {
                // $variations->$str->qty -= $request['quantity'];
                // $product->variations = json_encode($variations);
                // $product->save();
            } else {
                return view('frontend.partials.outOfStockCart');
            }
        } else {
            $price = $product->unit_price;
        }

        //discount calculation based on flash deal and regular discount
        //calculation of taxes
        $flash_deals = \App\FlashDeal::where('status', 1)->get();
        $inFlashDeal = false;
        foreach ($flash_deals as $flash_deal) {
            if ($flash_deal != null && $flash_deal->status == 1  && strtotime(date('d-m-Y')) >= $flash_deal->start_date && strtotime(date('d-m-Y')) <= $flash_deal->end_date && \App\FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $product->id)->first() != null) {
                $flash_deal_product = \App\FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $product->id)->first();
                if ($flash_deal_product->discount_type == 'percent') {
                    $price -= ($price * $flash_deal_product->discount) / 100;
                } elseif ($flash_deal_product->discount_type == 'amount') {
                    $price -= $flash_deal_product->discount;
                }
                $inFlashDeal = true;
                break;
            }
        }
        if (!$inFlashDeal) {
            if ($product->discount_type == 'percent') {
                $price -= ($price * $product->discount) / 100;
            } elseif ($product->discount_type == 'amount') {
                $price -= $product->discount;
            }
        }

        if ($product->tax_type == 'percent') {
            $tax = ($price * $product->tax) / 100;
        } elseif ($product->tax_type == 'amount') {
            $tax = $product->tax;
        }

        $data['quantity'] = $request['quantity'];
        $data['price'] = $price;
        $data['tax'] = $tax;
        $data['shipping'] = $product->shipping_cost;
        $data['product_referral_code'] = null;
        $data['digital'] = $product->digital;

        if ($request['quantity'] == null) {
            $data['quantity'] = 1;
        }

        if (Cookie::has('referred_product_id') && Cookie::get('referred_product_id') == $product->id) {
            $data['product_referral_code'] = Cookie::get('product_referral_code');
        }

        if ($request->session()->has('cart')) {
            $foundInCart = false;
            $cart = collect();

            foreach ($request->session()->get('cart') as $key => $cartItem) {
                if ($cartItem['id'] == $request->id) {

                    if ($cartItem['variant'] == $str) {
                        $foundInCart = true;
                        $cartItem['quantity'] +=  $request['quantity'] ? $request['quantity'] : 1;
                    }
                }
                $cart->push($cartItem);
            }

            if (!$foundInCart) {
                $cart->push($data);
            }
            $request->session()->put('cart', $cart);
        } else {
            $cart = collect([$data]);
            $request->session()->put('cart', $cart);
        }


        $totalitemCart = 0;
        foreach (Session::get('cart') as $key => $value) {
            $totalitemCart += $value['quantity'];
        }

        $detail_dropdown = \View::make('frontend.partials.item_dropdown_cart')->render();
        $dataview = \View::make('frontend.partials.addedToCart', compact('product', 'data'))->render();

        return response()->json(['dataview' => $dataview, 'detail_dropdown' =>  $detail_dropdown, 'total_cart' => $totalitemCart]);
    }

    public function addToCartAll($id)
    {
        dd($id);
    }

    public function addSampleToCard(Request $request)
    {
        if ($request->session()->has('cart') && count($request->session()->get('cart')) > 0) {
            # code...
            if ($request->session()->has('sample') && count($request->session()->get('sample')) > 0) {
                # code...
                if (count($request->session()->get('sample')) < 2) {
                    # code...
                    $samples = collect();
                    foreach ($request->session()->get('sample') as $key => $value) {
                        # code...
                        $samples->push($value);
                    }

                    if ($samples->contains('id', $request->sample_id) == false) {
                        # code...
                        $sample = Sample::where('id', $request->sample_id)->first();
                        $samples->push($sample);
                        $request->session()->put('sample', $samples);
                    }
                }
            } else {
                $samples = collect();
                $sample = Sample::where('id', $request->sample_id)->first();
                $samples->push($sample);
                $request->session()->put('sample', $samples);
            }
        }
        // dd($request->session()->get('sample'));

        return view('frontend.partials.cart_details2');
    }

    public function addProductPointToCard(Request $request)
    {
        if ($request->session()->has('cart') && count($request->session()->get('cart')) > 0) {
            # code...
            if ($request->session()->has('productPoint') && count($request->session()->get('productPoint')) > 0) {
                # code...
                $productPoint = collect();
                foreach ($request->session()->get('productPoint') as $key => $value) {
                    # code...
                    $productPoint->push($value);
                }

                if ($productPoint->contains('id', $request->product_id) == false) {
                    # code...
                    $product = ProductPoint::where('id', $request->product_id)->first();
                    $productPoint->push($product);
                    $request->session()->put('productPoint', $productPoint);
                }
            } else {
                $productPoint = collect();
                $product = ProductPoint::where('id', $request->product_id)->first();
                $productPoint->push($product);
                $request->session()->put('productPoint', $productPoint);
            }
        }

        return view('frontend.partials.cart_details2');
    }


    public function redeemPoint(Request $request)
    {
        // $id = $request->id;
        if (Session::has('cart') && count(Session::get('cart')) > 0) {
            $msg = "gagal";
            // $gagal = ""
            if ($this->addProductPointToCard($request)) {
                $msg = "sukses";
                flash(__('berhasil menukar poin'))->success();
            }
            return $msg;
        } else {
            // flash(__('Your Cart is empty'))->error();
            return "empty";
        }
    }



    public function removeSampleFromCart(Request $request)
    {
        if ($request->session()->has('sample')) {
            $samples = collect();
            foreach ($request->session()->get('sample') as $key => $value) {
                # code...
                if ($value->id != $request->sample_id) {
                    # code...
                    $samples->push($value);
                }
            }
            $request->session()->put('sample', $samples);
        }

        return view('frontend.partials.cart_details2');
    }

    public function removeSampleFromTukarPoin(Request $request)
    {
        if ($request->session()->has('productPoint')) {

            $productPoint = collect();


            foreach ($request->session()->get('productPoint') as $key => $value) {
                if ($value != null && $value->id != $request->product_id) {
                    $productPoint->push($value);
                }
            }
            $request->session()->put('productPoint', $productPoint);
        }
        return view('frontend.partials.cart_details2');
    }


    //removes from Cart
    public function removeFromCart(Request $request)
    {
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart', collect([]));
            $cart->forget($request->key);
            $request->session()->put('cart', $cart);
        }

        $totalitemCart = 0;
        foreach (Session::get('cart') as $key => $value) {
            $totalitemCart += $value['quantity'];
        }

        // return view('frontend.partials.cart_details2');
        $detail = \View::make('frontend.partials.cart_details2')->render();
        $detail_dropdown = \View::make('frontend.partials.item_dropdown_cart')->render();

        return response()->json(['detail' => $detail, 'detail_dropdown' =>  $detail_dropdown, 'total_cart' => $totalitemCart]);
    }

    //updated the quantity for a cart item
    public function updateQuantity(Request $request)
    {
        $cart = $request->session()->get('cart', collect([]));
        $cart = $cart->map(function ($object, $key) use ($request) {
            if ($key == $request->key) {
                $object['quantity'] = $request->quantity;
            }
            return $object;
        });
        $request->session()->put('cart', $cart);
        $detail = \View::make('frontend.partials.cart_details2')->render();
        $detail_dropdown = \View::make('frontend.partials.item_dropdown_cart')->render();
        $totalitemCart = 0;
        foreach (Session::get('cart') as $key => $value) {
            $totalitemCart += $value['quantity'];
        }
        return response()->json(['detail' => $detail, 'detail_dropdown' =>  $detail_dropdown, 'total_cart' => $totalitemCart]);
        // return view('frontend.partials.cart_details2');
    }

    public function updateQuantitydropdown(Request $request)
    {
        $cart = $request->session()->get('cart', collect([]));
        $cart = $cart->map(function ($object, $key) use ($request) {
            if ($key == $request->key) {
                $object['quantity'] = $request->quantity;
            }
            return $object;
        });
        $request->session()->put('cart', $cart);
        $detail = \View::make('frontend.partials.cart_details2')->render();
        $summary = \View::make('frontend.partials.cart_summary2')->render();

        // return response()->json(['detail' => $detail, 'summary' => $summary]);
        return view('frontend.partials.item_dropdown_cart');
    }

    public function updateSummary(Request $request)
    {
        return view('frontend.partials.cart_summary2');
    }
}
