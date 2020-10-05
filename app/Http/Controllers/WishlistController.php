<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Wishlist;
use App\Category;
use App\Models\Wishlist as ModelsWishlist;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishlists = Wishlist::where('user_id', Auth::user()->id)->paginate(9);
        return view('frontend.view_wishlist', compact('wishlists'));
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

    public function refetch()
    {
        $wishlists = Wishlist::where('user_id', Auth::user()->id)->with(['product', 'product.brand'])->paginate(9);
        return $wishlists;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $wishlist = Wishlist::where('user_id', Auth::user()->id)->where('product_id', $request->id)->first();
            if ($wishlist == null) {
                $wishlist = new Wishlist;
                $wishlist->user_id = Auth::user()->id;
                $wishlist->product_id = $request->id;
                $wishlist->save();
                flash('Berhasil ditambahkan ke wishlist')->success();
            }
            return view('frontend.partials.wishlist');
        }
        return 0;
    }

    public function remove(Request $request)
    {
        $wishlist = Wishlist::findOrFail($request->id);
        // dd($wishlist);
        if ($wishlist != null) {
            if (Wishlist::destroy($request->id)) {
                return view('frontend.partials.wishlist');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function destroy(Request $request)
    {
        // dd([(int)$request->id]);
        $id = [$request->id];
        if (gettype($request->id) == "array") {
            $id = $request->id;
        }
        $wish = Wishlist::whereIn('id', $id);
        if ($wish->delete()) {
            flash(__('wishlist berhasil dihapus'))->success();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
