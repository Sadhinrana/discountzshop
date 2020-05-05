<?php

namespace App\Http\Controllers\Product;

use Response;
use Validator;
use App\Model\Product\Productreview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ProductreviewController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate form data
        $this->validate($request, [
            'authorName' => 'required|string|max:255',
            'email' => 'required|email',
            'review' => 'required|string',
            'rating' => 'required|integer',
            'product_id' => 'required|integer',
        ]);

        // Create an instace of Productreview & assign form data then save to database
        $review = new Productreview();
        $review->authorName = $request->authorName;
        $review->email = $request->email;
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->product_id = $request->product_id;
        $review->save();

        return redirect()->back()->with('success', "Thanks for your review.");
    }
}
