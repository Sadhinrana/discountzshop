<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Model\Product\Bid;
use Illuminate\Http\Request;
use App\Model\Product\Product;
use App\Model\User\Userbilling;
use App\Model\User\Userpayment;
use App\Model\User\Usershipping;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class Usercontroller extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['Auth', 'verified'])->except('users');
        $this->middleware(['Auth:admin', 'admin'])->only('users');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get all users
        $client = User::find(auth()->user()->id);

        // Get all resource
        $bids = Bid::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();

        // Get all products
        $products = Product::all()->sortByDesc('id');

        return view('user.user', compact('client', 'bids', 'products'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        // Get all users
        $clients = User::all()->sortByDesc('id');

        return view('admin.user.users', compact('clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Validate form data
        $rules = array(
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'city' => 'nullable|integer',
            'division' => 'nullable|integer',
            'country' => 'nullable|integer',
            'address' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'office_email' => 'nullable|email',
            'office_phone' => 'nullable|string|max:255',
            'zipCode' => 'nullable|string|max:255',
        );

        $validator = Validator::make ( Input::all(), $rules);

        if ($validator->fails()){
            return Response::json(array('errors' => $validator->getMessageBag()->toarray()));
        }

        // Get the client
        $client = User::find(auth()->user()->id);
        $client->name = $request->name;
        $client->phone = $request->phone;
        $client->city = $request->city;
        $client->division = $request->division;
        $client->country = $request->country;
        $client->address = $request->address;
        $client->company = $request->company;
        $client->zipCode = $request->zipCode;
        $client->office_phone = $request->office_phone;
        $client->office_email = $request->office_email;
        $client->save();

        // Return json data
        return response()->json($client);
    }

    /**
     * Update client password.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function updatePass(Request $request)
    {
        // Validate form data
        $rules = array(
            'password' => 'required|string|min:8',
            'oldpassword' => 'required|string|min:8',
        );

        $validator = Validator::make ( Input::all(), $rules);

        if ($validator->fails()){
            return Response::json(array('errors' => $validator->getMessageBag()->toarray()));
        }

        // Get the client
        $client = User::find(auth()->user()->id);

        if (!Hash::check($request->oldpassword, $client->password)){
            // Return json response
            return response()->json(['errors' => ['error' => 'Password did not match!']]);
        }

        // Upadate password
        $client->password = Hash::make($request->password);
        $client->save();

        // Return json response
        return response()->json();
    }

    /**
     * Store client billing address.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function store_billings(Request $request)
    {
        // Validate form data
        $rules = array(
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'division' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email',
            'zipCode' => 'nullable|string|max:255',
        );

        $validator = Validator::make ( Input::all(), $rules);

        if ($validator->fails()){
            return Response::json(array('errors' => $validator->getMessageBag()->toarray()));
        }

        // Get the billing address (if already has one) & update it. Otherwise create new instance
        $billing = Userbilling::where('user_id', auth()->user()->id)->first();
        if (!$billing){
            // Create instance of Shipping model
            $billing = new Userbilling();
        }

        // Assign form value then save to database
        $billing->name = $request->name;
        $billing->email = $request->email;
        $billing->city = $request->city;
        $billing->country = $request->country;
        $billing->division = $request->division;
        $billing->zipCode = $request->zipCode;
        $billing->phone = $request->phone;
        $billing->address = $request->address;
        $billing->user_id = auth()->user()->id;
        $billing->save();

        // Return json response
        return response()->json($billing);
    }

    /**
     * Store client shipping address.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function store_shippings(Request $request)
    {
        // Validate form data
        $rules = array(
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'division' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email',
            'zipCode' => 'nullable|string|max:255',
        );

        $validator = Validator::make ( Input::all(), $rules);

        if ($validator->fails()){
            return Response::json(array('errors' => $validator->getMessageBag()->toarray()));
        }

        // Get the shipping address (if already has one) & update it. Otherwise create new instance
        $shipping = Usershipping::where('user_id', auth()->user()->id)->first();
        if (!$shipping){
            // Create instance of Shipping model
            $shipping = new Usershipping();
        }

        // Assign form value then save to database
        $shipping->name = $request->name;
        $shipping->email = $request->email;
        $shipping->city = $request->city;
        $shipping->country = $request->country;
        $shipping->division = $request->division;
        $shipping->zipCode = $request->zipCode;
        $shipping->phone = $request->phone;
        $shipping->address = $request->address;
        $shipping->user_id = auth()->user()->id;
        $shipping->save();

        // Return json response
        return response()->json($shipping);
    }

    /**
     * Store client payment method.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function payment_store(Request $request)
    {
        // Get the client
        $payment = Userpayment::where('user_id', auth()->user()->id)->first();

        // if already has one update it. Otherwise create new instance
        if (!$payment){
            // Create new instance of payment
            $payment = new Userpayment();
            $payment->user_id = auth()->user()->id;
        }

        // Assign null to every field
        $payment->accNo = null;
        $payment->acc_name = null;
        $payment->bank_name = null;

        // Assign payment method
        $payment->paymentMethod = $request->paymentMethod;

        // Check payment method
        if ($request->paymentMethod == 0){
            // Validate form data
            $rules = array(
                'bkash_number' => 'required',
            );

            $payment->accNo = $request->bkash_number;
            $payment->bank_name = 'BRAC Bank';
        }elseif ($request->paymentMethod == 1){
            // Validate form data
            $rules = array(
                'rocket_number' => 'required',
            );

            $payment->accNo = $request->rocket_number;
            $payment->bank_name = 'Dutch-Bangla Bank';
        }elseif ($request->paymentMethod == 2){
            // Validate form data
            $rules = array(
                'bacs_acc_name' => 'required',
                'bacs_acc_no' => 'required',
                'bacs_bank_name' => 'required',
            );

            $payment->acc_name = $request->bacs_acc_name;
            $payment->accNo = $request->bacs_acc_no;
            $payment->bank_name = $request->bacs_bank_name;
        }

        if (isset($rules)){
            $validator = Validator::make ( Input::all(), $rules);
            if ($validator->fails()){
                return Response::json(array('errors' => $validator->getMessageBag()->toarray()));
            }
        }

        // Assign form value then save to database
        $payment->save();

        // Return json response
        return response()->json($payment);
    }
}
