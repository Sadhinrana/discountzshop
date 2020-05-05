<?php

namespace App\Http\Controllers\Product;

use Session;
use Illuminate\Http\Request;
use App\Model\Product\Product;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get cart data
        $carts = Session::get('cart');

        if ($carts != null){
            // Get product ids
            $ids = array_map(function ($array) {return $array['product_id'];}, $carts);
            // Get products
            $products = Product::find($ids);
        }else{
            // Get products
            $products = null;
        }

        // Return view
        return view('product.shop-cart', compact('products', 'carts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get cart data
        $carts = Session::get('cart');

        // Check if cart is empty
        if ($carts != NULL){
            foreach($carts as $subKey => $subArray){
                if($subArray['product_id'] == $request->id){
                    // Return error message
                    return response()->json(array('error' => 'This product already exists in your cart!'));
                }
            }
        }

        // Set data to session
        $data = array('qty' => $request->qty, 'product_id' => $request->id);
        Session::push('cart', $data);

        // Return success message
        return response()->json();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $Cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Find the Cart & update it
        $carts = Session::get('cart', []);

        // Loop over each cart data
        foreach ($carts as &$cart) {
            // If found the intended
            if ($cart['product_id'] == $request->id) {
                // Update it's value
                $cart['qty'] = $request->qty;
            }
        }

        // Update cart data
        Session::put('cart',$carts);

        // return response
        return response()->json(Session::get('cart'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $Cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // Find the cart
        $carts = session()->pull('cart'); // Second argument is a default value

        if(($key = array_search($request->id, array_column($carts, 'product_id'))) !== false) {
            // Delete it from the session
            unset($carts[$key]);
        }

        // Reset the array index
        $carts = array_values($carts);

        // Set the session again
        session()->put('cart', $carts);

        return response()->json();
    }
}