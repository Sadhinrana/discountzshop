<?php

namespace App\Http\Controllers\Product;

use Response;
use Validator;
use Carbon\Carbon;
use App\Model\Product\Bid;
use Illuminate\Http\Request;
use App\Model\Product\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Model\Product\Bidapplication;

class BidController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('Auth:admin')->only('show');
        $this->middleware('Auth')->except('bid', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all resource
        $bids = Bid::all()->sortByDesc('id');

        // Get all products
        $products = Product::all()->sortByDesc('id');

        return view('admin.product.bids', compact('bids', 'products'));
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
            'date' => 'required|date',
            'valid_until' => 'required|date',
            'product_id' => 'required|integer',
        );

        $validator = Validator::make ( Input::all(), $rules);

        if ($validator->fails()){
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        }

        // Create an instance
        $bid = new Bid();
        $bid->date = $request->date;
        $bid->valid_until = $request->valid_until;
        $bid->product_id = $request->product_id;
        $bid->user_id = auth()->user()->id;
        $bid->save();

        return response()->json($bid);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function show(Bid $bid)
    {
        // Find the model
        $bid = Bid::find($bid->id);
        $bid_applications = Bidapplication::where('bid_id', $bid->id)->orderBy('quotation', 'ASC')->get();

        return view('product.bid-single', compact('bid', 'bid_applications'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function edit(Bid $bid)
    {
        // Find the model
        $bid = Bid::find($bid->id);

        return response()->json($bid);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bid $bid)
    {
        // Validate form data
        $rules = array(
            'date' => 'required|date',
            'valid_until' => 'required|date',
            'product_id' => 'required|integer',
        );

        $validator = Validator::make ( Input::all(), $rules);

        if ($validator->fails()){
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        }

        // Create an instance
        $bid = Bid::find($bid->id);
        $bid->date = $request->date;
        $bid->valid_until = $request->valid_until;
        $bid->product_id = $request->product_id;
        $bid->save();

        return response()->json($bid);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bid $bid)
    {
        Bid::destroy($bid->id);

        return response()->json();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bid()
    {
        // Get all resource
        $bids = Bid::where('valid_until', '>=', Carbon::now())->orderBy('id', 'desc')->get();

        return view('product.bids', compact('bids'));
    }
}
