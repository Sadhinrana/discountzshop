<?php

namespace App\Http\Controllers\Product;

use Response;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Model\Product\Auctionapplication;

class AuctionapplicationController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('Auth')->only('store');
        $this->middleware('Auth:admin')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all resource
        $auction_applications = Auctionapplication::all()->sortByDesc('quotation');

        return view('admin.product.auction_applications', compact('auction_applications'));
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
            'quotation' => 'required|numeric|min:1',
            'auction_id' => 'required|integer',
        );

        $validator = Validator::make ( Input::all(), $rules);

        if ($validator->fails()){
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        }

        // Create a new model instance
        $auction_application = new Auctionapplication();
        $auction_application->quotation = $request->quotation;
        $auction_application->auction_id = $request->auction_id;
        $auction_application->user_id = auth()->user()->id;
        $auction_application->save();

        return response()->json($auction_application);
    }
}
