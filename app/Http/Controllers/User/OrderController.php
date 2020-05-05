<?php

namespace App\Http\Controllers\User;

use Session;
use App\User;
use Carbon\Carbon;
use App\Mail\OrderPlaced;
use App\Model\User\Order;
use App\Model\User\Payment;
use App\Model\User\Billing;
use App\Model\User\Shipping;
use Illuminate\Http\Request;
use App\Model\Product\Coupon;
use App\Model\Product\Product;
use App\Model\User\Orderdetail;
use App\Model\User\MembershipType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('Auth')->only('create', 'store', 'show');
        $this->middleware(['Auth:admin', 'admin'])->except('create', 'store', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all orders
        $orders = Order::all()->sortByDesc('id');

        return view('admin.user.orders', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get cart data
        $carts = Session::get('cart');

        // If cart is empty then return back with error message
        if ($carts == null){
            return redirect()->back()->with('error', 'your cart is empty! Please add product to cart to purchase them.');
        }

        // Get product ids
        $ids = array_map(function ($array) {return $array['product_id'];}, $carts);

        // Get products
        $products = Product::find($ids);

        // Find client
        $client = User::find(auth()->user()->id);

        return view('user.shop-checkout', compact('client', 'products', 'carts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get cart data
        $carts = Session::get('cart');

        // Get the client
        $client = User::find(auth()->user()->id);

        // Validate form data
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'division' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email',
            'zipCode' => 'nullable|string|max:255',
        ]);

        // Validate form data
        $this->validate($request, [
            'shipping_name' => 'required|string|max:255',
            'shipping_email' => 'required|email',
            'shipping_phone' => 'required|string|max:255',
            'shipping_country' => 'required|string|max:255',
            'shipping_division' => 'required|string|max:255',
            'shipping_city' => 'required|string|max:255',
            'shipping_address' => 'required|string|max:255',
        ]);

        // Check if agreed to terms condition
        if(!isset($request->paymentMethod)){
            return redirect()->back()->with('error', 'Payment method not specified!');
        }

        // Create instance of Payment model & assign form value then save to database
        $payment = new Payment;
        $payment->paymentMethod = $request->paymentMethod;

        // Check payment method
        if ($request->paymentMethod == 0){
            // Validate form data
            $this->validate($request, [
                'bkash_number' => 'required',
                'bkash_transaction_id' => 'required',
            ]);

            $payment->accNo = $request->bkash_number;
            $payment->tranId = $request->bkash_transaction_id;
            $payment->bank_name = 'BRAC Bank';
        }elseif ($request->paymentMethod == 1){
            // Validate form data
            $this->validate($request, [
                'rocket_number' => 'required',
                'rocket_transaction_id' => 'required',
            ]);

            $payment->accNo = $request->rocket_number;
            $payment->tranId = $request->rocket_transaction_id;
            $payment->bank_name = 'Dutch-Bangla Bank';
        }elseif ($request->paymentMethod == 2){
            // Validate form data
            $this->validate($request, [
                'bacs_acc_name' => 'required',
                'bacs_acc_no' => 'required',
                'bacs_bank_name' => 'required',
                'bacs_transaction_id' => 'required',
                'bacs_bank_deposit' => 'required|image|max:25',
            ]);

            $payment->acc_name = $request->bacs_acc_name;
            $payment->accNo = $request->bacs_acc_no;
            $payment->bank_name = $request->bacs_bank_name;
            $payment->tranId = $request->bacs_transaction_id;

            // Handle image upload

            // Checks if the file exists
            if ($request->hasFile('bacs_bank_deposit')){
                // Get file name with extension
                $fileNameWithExt = $request->file('bacs_bank_deposit')->getClientOriginalName();
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // Get only extension
                $extension = $request->file('bacs_bank_deposit')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $fileName . time() . "." . $extension;
                // Directory to upload
                $request->file('bacs_bank_deposit')->storeAs('public/images/client/payment', $fileNameToStore);
                $payment->deposit = $fileNameToStore;
            }
        }elseif ($request->paymentMethod == 3){
            // Validate form data
            $this->validate($request, [
                'cps_bank_deposit' => 'required|image|max:25',
            ]);

            // Handle image upload

            // Checks if the file exists
            if ($request->hasFile('cps_bank_deposit')){
                // Get file name with extension
                $fileNameWithExt = $request->file('cps_bank_deposit')->getClientOriginalName();
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // Get only extension
                $extension = $request->file('cps_bank_deposit')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $fileName . time() . "." . $extension;
                // Directory to upload
                $request->file('cps_bank_deposit')->storeAs('public/images/client/payment', $fileNameToStore);
                $payment->deposit = $fileNameToStore;
            }
        }

        // Check if agreed to terms condition
        if(!isset($request->checkedorder)){
            return redirect()->back()->with('error', 'Please agree with the terms and conditions to continue!');
        }

        // Get current month orders
        $curr_month_order = Order::where('user_id', $client->id)->whereYear('created_at', '=', Carbon::now()->year)->whereMonth('created_at', '=', Carbon::now()->month)->get();

        $total_price = 0;
        // Loop over each order
        foreach ($curr_month_order as $order){
            // Loop over each order details
            foreach($order->orderDetails as $orderDetail){
                // keep the value in total
                $total_price += $orderDetail->quantity * $orderDetail->price;
            }
        }

        // Get product ids
        $ids = array_map(function ($array) {return $array['product_id'];}, $carts);
        // Get products
        $products = Product::find($ids);

        $total = $i = 0;
        foreach($products as $product){
            $total += $carts[$i]['qty']*($product->salePrice-(($product->salePrice*$product->discount_value)/100));
            $i++;
        }

        // Create instance of Order model & assign form value then save to database
        $order = new Order;

        // Check if any discount available
        if (Session::has('coupon_id')) {
            // Get the discount
            $discount = Coupon::find(Session::get('coupon_id'));

            if($discount->discount_unit == 0){
                $discount_val = ($total*$discount->discount_value)/100;
            }
            else{
                $discount_val = $discount->discount_value;
            }

            $order->discount = $discount_val;

            // update pivot table client_discount
            $discount->user()->attach(auth()->user()->id);

            if($discount->is_free_shipping_active == 1){
                $order->is_free_shipping_active = false;
            }else{
                $order->is_free_shipping_active = true;
            }
        }else{
            $order->is_free_shipping_active = false;
        }

        $order->user_id = auth()->user()->id;
        $order->order_total = $total;
        $order->save();

        $i = 0;
        // Loop over each cart
        foreach($products as $product){
            // Create instance of OrderDetails model & assign form value then save to database
            $orderDetails = new Orderdetail;
            $orderDetails->quantity = $carts[$i]['qty'];
            $orderDetails->productName = $product->productName;
            $orderDetails->sku = $product->sku;
            $orderDetails->shortDescription = $product->shortDescription;
            $orderDetails->price = $product->salePrice-(($product->salePrice*$product->discount_value)/100);
            $orderDetails->order_id = $order->id;
            $orderDetails->save();
            $i++;
        }

        // Create instance of Billing model & assign form value then save to database
        $billing = new Billing();
        $billing->address = $request->address;
        $billing->city = $request->city;
        $billing->country = $request->country;
        $billing->division = $request->division;
        $billing->zipCode = $request->zipCode;
        $billing->phone = $request->phone;
        $billing->email = $request->email;
        $billing->name = $request->name;
        $billing->order_id = $order->id;
        $billing->save();

        // Create instance of Shipping model & assign form value then save to database
        $shipping = new Shipping();
        $shipping->address = $request->shipping_address;
        $shipping->city = $request->shipping_city;
        $shipping->country = $request->shipping_country;
        $shipping->division = $request->shipping_division;
        $shipping->zipCode = $request->shipping_zipCode;
        $shipping->phone = $request->shipping_phone;
        $shipping->email = $request->shipping_email;
        $shipping->name = $request->shipping_name;
        $shipping->order_id = $order->id;
        $shipping->save();

        $payment->order_id = $order->id;
        $payment->save();

        // Unset carts & coupon
        Session::put('cart', null);
        Session::put('coupon_id', null);

        // Get current month orders
        $current_month_order = Order::where('user_id', $client->id)->whereYear('created_at', '=', Carbon::now()->year)->whereMonth('created_at', '=', Carbon::now()->month)->get();

        // Check if number of order is equals to 12
        if ($current_month_order->count() == 12){
            // Add 5 promotional point to client
            $client->promotional_reward_points = $client->promotional_reward_points + 5;
            $client->save();
        }

        // Check if previous order value is less than 12,000
        if ($total_price < 12000){
            // Check if current order value is greater than or equals to 12,000
            if ($total >= 12000){
                // Add 5 promotional point to client
                $client->promotional_reward_points = $client->promotional_reward_points + 5;
                $client->save();
            }
        }

        // check the client point & update it to associated policy
        if ($client->promotional_reward_points >= 100){
            // Get the id of associated membership type
            $membership_type = MembershipType::select('id')->where('membership_type', '1')->get()->toArray();
            // Update client level to associated membership type
            $client->membership_type_id = $membership_type[0]['id'];
            $client->save();
        }elseif ($client->promotional_reward_points >= 200){
            // Get the id of associated membership type
            $membership_type = MembershipType::select('id')->where('membership_type', '2')->get()->toArray();
            // Update client level to associated membership type
            $client->membership_type_id = $membership_type[0]['id'];
            $client->save();
        }elseif ($client->promotional_reward_points >= 300){
            // Get the id of associated membership type
            $membership_type = MembershipType::select('id')->where('membership_type', '3')->get()->toArray();
            // Update client level to associated membership type
            $client->membership_type_id = $membership_type[0]['id'];
            $client->save();
        }elseif ($client->promotional_reward_points >= 400){
            // Get the id of associated membership type
            $membership_type = MembershipType::select('id')->where('membership_type', '4')->get()->toArray();
            // Update client level to associated membership type
            $client->membership_type_id = $membership_type[0]['id'];
            $client->save();
        }

        // Send order details to client by E-mail
        Mail::to($client->email)->send(new OrderPlaced($order));
        // Send order details to sales by E-mail
        Mail::to('discountzshop@gmail.com')->send(new OrderPlaced($order));

        return view('user.order', compact('order'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        // Get the order
        $order = Order::find($order->id);

        return view('user.orderDetails', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        // Get the order & update
        $order = Order::find($order->id);

        return view('admin.user.invoice', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        // Get the order & update
        $order = Order::find($order->id);
        $order->status = $request->status;
        $order->save();

        return response()->json($order);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        // Get the order
        Order::find($order->id)->delete();

        return response()->json();
    }

    // Loads order-tracking view
    public function orderTracking(){
        return view('user.order-tracking');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function showOrder(Request $request)
    {
        // Check for valid customer
        $customer = User::where('email', $request->billing)->first();

        if (!$customer){
            return redirect()->back()->with('error', 'There is no order associated with this email!');
        }

        // Check for valid order id
        $orders = Order::where(['id' => $request->order_id, 'user_id' => $customer->id])->first();

        if (!$orders){
            return redirect()->back()->with('error', 'There is no order associated with this email and order id combination!');
        }

        // Get the order
        $order = Order::find($request->order_id);

        return view('user.orderDetails', ['order' => $order]);
    }
}
