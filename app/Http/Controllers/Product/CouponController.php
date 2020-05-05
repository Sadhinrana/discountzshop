<?php

namespace App\Http\Controllers\Product;

use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Model\Product\Coupon;
use App\Model\Product\Product;
use App\Model\Product\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['Auth:admin', 'admin'])->except('applyCoupon');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all coupons
        $coupons = Coupon::all()->sortByDesc('id');

        // Get all categories
        $categories = Category::all();

        // Get all products
        $products = Product::select('id', 'productName')->get();

        return view('admin.product.coupons', compact('coupons', 'categories', 'products'));
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
        // Validate form data
        $rules = array(
            'coupon_code' => 'required|string|max:255',
            'discount_value' => 'required|integer',
            'discount_unit' => 'required|integer',
            'valid_from' => 'required|date',
            'valid_until' => 'required|date',
            'product_id' => 'nullable',
            'exclude_product_id' => 'nullable',
            'category_id' => 'nullable',
            'exclude_category_id' => 'nullable',
            'minimum_order_value' => 'nullable|integer',
            'maximum_order_value' => 'nullable|integer',
            'limit_per_coupon' => 'nullable|integer',
            'limit_per_client' => 'nullable|integer',
            'maximum_discount_amount' => 'nullable|integer',
            'is_free_shipping_active' => 'required|integer',
            'is_redeem_allowed' => 'required|integer',
        );

        $validator = Validator::make ( Input::all(), $rules);

        if ($validator->fails()){
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        }

        // Create instance of coupon model $ assaign formdata
        $coupon = new Coupon();

        // Check if product include is set
        if (isset($request->product_id)) {
            // Parse to json data
            $product_id = json_encode($request->product_id);

            // Assign value to discount object
            $coupon->product_id = $product_id;
        }

        // Check if product exclude is set
        else if (isset($request->exclude_product_id)) {
            // Parse to json data
            $exclude_product_id = json_encode($request->exclude_product_id);

            // Assign value to discount object
            $coupon->exclude_product_id = $exclude_product_id;
        }

        // Check if category include is set
        if (isset($request->category_id)) {
            // Parse to json data
            $category_id = json_encode($request->category_id);

            // Assign value to discount object
            $coupon->category_id = $category_id;
        }

        // Check if category exclude is set
        else if (isset($request->exclude_category_id)) {
            // Parse to json data
            $exclude_category_id = json_encode($request->exclude_category_id);

            // Assign value to discount object
            $coupon->exclude_category_id = $exclude_category_id;
        }

        $coupon->coupon_code = $request->coupon_code;
        $coupon->discount_unit = $request->discount_unit;
        $coupon->discount_value = $request->discount_value;
        $coupon->valid_from = $request->valid_from;
        $coupon->valid_until = $request->valid_until;
        $coupon->minimum_order_value = $request->minimum_order_value;
        $coupon->maximum_order_value = $request->maximum_order_value;
        $coupon->maximum_discount_amount = $request->maximum_discount_amount;
        $coupon->is_free_shipping_active = $request->is_free_shipping_active;
        $coupon->is_redeem_allowed = $request->is_redeem_allowed;
        $coupon->limit_per_coupon = $request->limit_per_coupon;
        $coupon->limit_per_client = $request->limit_per_client;
        $coupon->save();

        // Return json response data
        return response()->json($coupon);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        // Validate form data
        $rules = array(
            'coupon_code' => 'required|string|max:255',
            'discount_value' => 'required|integer',
            'discount_unit' => 'required|integer',
            'valid_from' => 'required|date',
            'valid_until' => 'required|date',
            'product_id' => 'nullable',
            'exclude_product_id' => 'nullable',
            'category_id' => 'nullable',
            'exclude_category_id' => 'nullable',
            'minimum_order_value' => 'nullable|integer',
            'maximum_order_value' => 'nullable|integer',
            'limit_per_coupon' => 'nullable|integer',
            'limit_per_client' => 'nullable|integer',
            'maximum_discount_amount' => 'nullable|integer',
            'is_free_shipping_active' => 'required|integer',
            'is_redeem_allowed' => 'required|integer',
        );

        $validator = Validator::make ( Input::all(), $rules);

        if ($validator->fails()){
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        }

        // Find the coupon model $ assaign formdata
        $discount = Coupon::find($coupon->id);

        // Check if product include is set
        if (isset($request->product_id)) {
            // Parse to json data
            $product_id = json_encode($request->product_id);

            // Assign value to discount object
            $discount->product_id = $product_id;
        }else{
            // Assign null to discount object
            $discount->product_id = null;
        }

        // Check if product exclude is set
        if (isset($request->exclude_product_id)) {
            // Parse to json data
            $exclude_product_id = json_encode($request->exclude_product_id);

            // Assign value to discount object
            $discount->exclude_product_id = $exclude_product_id;
        }else{
            // Assign null to discount object
            $discount->exclude_product_id = null;
        }

        // Check if category include is set
        if (isset($request->category_id)) {
            // Parse to json data
            $category_id = json_encode($request->category_id);

            // Assign value to discount object
            $discount->category_id = $category_id;
        }else{
            // Assign null to discount object
            $discount->category_id = null;
        }

        // Check if category exclude is set
        if (isset($request->exclude_category_id)) {
            // Parse to json data
            $exclude_category_id = json_encode($request->exclude_category_id);

            // Assign value to discount object
            $discount->exclude_category_id = $exclude_category_id;
        }else{
            // Assign null to discount object
            $discount->exclude_category_id = null;
        }

        $discount->coupon_code = $request->coupon_code;
        $discount->discount_unit = $request->discount_unit;
        $discount->discount_value = $request->discount_value;
        $discount->valid_from = $request->valid_from;
        $discount->valid_until = $request->valid_until;
        $discount->minimum_order_value = $request->minimum_order_value;
        $discount->maximum_order_value = $request->maximum_order_value;
        $discount->maximum_discount_amount = $request->maximum_discount_amount;
        $discount->is_free_shipping_active = $request->is_free_shipping_active;
        $coupon->is_redeem_allowed = $request->is_redeem_allowed;
        $discount->limit_per_coupon = $request->limit_per_coupon;
        $discount->limit_per_client = $request->limit_per_client;
        $discount->save();

        // Return json response data
        return response()->json($discount);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        //  FInd the coupon & delete it from storage
        Coupon::find($coupon->id)->delete();

        return response()->json();
    }

    /**
     * Apply coupon.
     *
     * @param  \App\Discount  $coupon
     * @return \Illuminate\Http\Response
     */
    public function applyCoupon(Request $request)
    {
        // Validate form data
        $rules = array(
            'coupon_code' => 'required',
        );

        $validator = Validator::make ( Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

        //  FInd the coupon
        $coupon = Coupon::where('coupon_code', $request->coupon_code)->first();

        // If not found return error message
        if (!$coupon){
            return response()->json(array('errors'=> 'This coupon does not exists!'));
        }

        // Check for coupon validation_from date
        if (Carbon::now() < $coupon->valid_from){
            return response()->json(array('errors'=> 'This coupon is not valid yet!'));
        }

        // Check for coupon validation_untill date
        if (Carbon::now() > $coupon->valid_until){
            return response()->json(array('errors'=> 'This coupon validity has expired!'));
        }

        // Get no of usage of this coupon
        $coupon_count = $coupon->user();

        // Check for limit per coupon
        if ($coupon->limit_per_coupon != null){
            if ($coupon_count->count() >= $coupon->limit_per_coupon){
                return response()->json(array('errors'=> 'This coupon limit has exceeded!'));
            }
        }

        // Check for Minimum spend
        if ($coupon->minimum_order_value != null){
            if ($request->price < $coupon->minimum_order_value){
                return response()->json(array('errors'=> 'Minimum spend limit for this coupon is not satisfied! Minimum spend limit is TK-'.$coupon->minimum_order_value.'.'));
            }
        }

        // Check for Maximum spend
        if ($coupon->maximum_order_value != null){
            if ($request->price > $coupon->maximum_order_value){
                return response()->json(array('errors'=> 'Maximum spend limit for this coupon is exceeded! Maximum spend limit is TK-'.$coupon->maximum_order_value.'.'));
            }
        }

        // Get cart data
        $carts = Session::get('cart');

        // Check for fixed products
        if ($coupon->product_id != null){
            foreach($carts as $subKey => $subArray){
                if(array_search($subArray['product_id'], json_decode($coupon->product_id)) === false){
                    // Return error message
                    return response()->json(array('errors' => 'This coupon is not applicable for products of your cart!'));
                }
            }
        }

        // Check for excluded products
        if ($coupon->exclude_product_id != null){
            foreach($carts as $subKey => $subArray){
                if(array_search($subArray['product_id'], json_decode($coupon->product_id)) !== false){
                    // Return error message
                    return response()->json(array('errors' => 'This coupon is not valid for products of your cart!'));
                }
            }
        }

        // Array declaration
        $ids = array();

        // Get product ids
        foreach ($carts as $value){
            array_push($ids, $value['product_id']);
        }

        // Find cart products
        $products = Product::find($ids);

        // Check for fixed categories
        if ($coupon->category_id != null){
            foreach($products as $product){
                if(array_search($product->category_id, json_decode($coupon->category_id)) === false){
                    // Return error message
                    return response()->json(array('errors' => 'This coupon is not applicable for products of your cart!'));
                }
            }
        }

        // Check for excluded categories
        if ($coupon->exclude_category_id != null){
            foreach($products as $product){
                if(array_search($product->category_id, json_decode($coupon->exclude_category_id)) !== false){
                    // Return error message
                    return response()->json(array('errors' => 'This coupon is not valid for products of your cart!'));
                }
            }
        }

        // Set coupon id in session
        Session::put('coupon_id', $coupon->id);
    }
}
