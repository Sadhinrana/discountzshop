<?php

namespace App\Http\Controllers\Product;

use Response;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Model\Product\Bidapplication;

class BidapplicationController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('Auth:admin')->only('store');
        $this->middleware('Auth')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all resource
        $bid_applications = Bidapplication::all()->sortByDesc('quotation');

        return view('admin.product.bid_applications', compact('bid_applications'));
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
            'bid_id' => 'required|integer',
        );

        $validator = Validator::make ( Input::all(), $rules);

        if ($validator->fails()){
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        }

        // Create a new model instance
        $bid_application = new Bidapplication();
        $bid_application->quotation = $request->quotation;
        $bid_application->bid_id = $request->bid_id;
        $bid_application->admin_id = auth()->user()->id;
        $bid_application->save();

        return response()->json($bid_application);
    }
}
