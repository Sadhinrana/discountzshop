<?php

namespace App\Http\Controllers\User;

use Session;
use Response;
use App\Model\User\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('Auth')->except('store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all wishlist
        $wishlists = Wishlist::where('user_id', auth()->user()->id)->get();

        // Return view
        return view('user.wishlist', compact('wishlists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check user session
        if (!Auth::check()) {
            return Response::json(array('error' => 'Please <a href="/login">sign in</a> to add wishlist! <a href="/register">Sign up</a> if already not registered.'));
        }

        // Checks if the product exists in the list
        $wishlists = Wishlist::where(['user_id' => auth()->user()->id, 'product_id' => $request->product_id])->get();

        if (!$wishlists->isEmpty()){
            return Response::json(array('error' => 'This Product already exists in your wishlist! '));
        }

        // Create instance of wishlist model & assign form value then save to database
        $wishlist = new Wishlist;
        $wishlist->user_id = auth()->user()->id;
        $wishlist->product_id = $request->product_id;
        $wishlist->save();

        /* Checks if data is saved to database. If so, redirect to previous page with success message. Otherwise, redirect to previous page with error message */
        if($wishlist){
            return Response::json(array('success' => 'Product added to wishlist successfully. '));
        }else{
            return Response::json(array('error' => 'Could not add product to wishlist! '));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wishlist $wishlist, Request $request)
    {
        Wishlist::find ($request->id)->delete();

        return response()->json();
    }
}
