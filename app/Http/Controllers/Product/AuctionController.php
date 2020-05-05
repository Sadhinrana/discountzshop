<?php

namespace App\Http\Controllers\Product;

use Response;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Model\Product\Auction;
use App\Model\Product\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Model\Product\Auctionapplication;

class AuctionController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('Auth:admin')->except('auction', 'show');
        $this->middleware('Auth')->only('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all resource
        $auctions = Auction::all()->sortByDesc('id');

        // Get all products
        $products = Product::all()->sortByDesc('id');

        return view('admin.product.auctions', compact('auctions', 'products'));
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
        $auction = new Auction();
        $auction->date = $request->date;
        $auction->valid_until = $request->valid_until;
        $auction->product_id = $request->product_id;
        $auction->save();

        return response()->json($auction);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function show(Auction $auction)
    {
        // Find the model
        $auction = Auction::find($auction->id);
        $auction_applications = Auctionapplication::where('auction_id', $auction->id)->orderBy('quotation', 'DESC')->get();

        return view('product.auction-single', compact('auction', 'auction_applications'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function edit(Auction $auction)
    {
        // Find the model
        $auction = Auction::find($auction->id);

        return response()->json($auction);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auction $auction)
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

        // Find the model
        $auction = Auction::find($auction->id);
        $auction->date = $request->date;
        $auction->valid_until = $request->valid_until;
        $auction->product_id = $request->product_id;
        $auction->save();

        return response()->json($auction);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auction $auction)
    {
        Auction::destroy($auction->id);

        return response()->json();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function auction()
    {
        // Get all resource
        $auctions = Auction::where('valid_until', '>=', Carbon::now())->orderBy('id', 'desc')->get();

        return view('product.auctions', compact('auctions'));
    }
}
