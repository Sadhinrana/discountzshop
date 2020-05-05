<?php

namespace App\Http\Controllers\Product;

use Response;
use Validator;
use Illuminate\Http\Request;
use App\Model\Product\Country;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class CountryController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['Auth:admin', 'admin'])->except('country');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all resources
        $countries = Country::all()->sortByDesc('id');

        return view('admin.product.countries', compact('countries'));
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
            'name' => 'required',
            'flag' => 'required|image|max:100',
        );

        $validator = Validator::make ( Input::all(), $rules);

        if ($validator->fails()){
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        }

        else{
            // Handle image upload

            // Checks if the file exists
            if ($request->hasFile('flag')){
                // Get file name with extension
                $fileNameWithExt = $request->file('flag')->getClientOriginalName();
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // Get only extension
                $extension = $request->file('flag')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $fileName . time() . "." . $extension;
                // Directory to upload
                $request->file('flag')->storeAs('public/images/country/flag/', $fileNameToStore);
            }

            // Create instance of Country model & assign form value then save to database
            $country = new Country;
            $country->name = $request->name;
            $country->flag = $fileNameToStore;
            $country->save();

            return response()->json($country);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        // Validate form data
        $rules = array(
            'name' => 'required',
            'flag' => 'nullable|image|max:100',
        );

        $validator = Validator::make ( Input::all(), $rules);

        if ($validator->fails()){
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        }

        else{
            // Find the Country model & assign form value then save to database
            $country = Country::find($country->id);

            // Handle image upload

            // Checks if the file exists
            if ($request->hasFile('flag')){
                // Get file name with extension
                $fileNameWithExt = $request->file('flag')->getClientOriginalName();
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // Get only extension
                $extension = $request->file('flag')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $fileName . time() . "." . $extension;
                // Directory to upload
                $request->file('flag')->storeAs('public/images/country/flag/', $fileNameToStore);
                // Get previous logo & delete it from the directory
                Storage::delete('public/images/country/flag/'.$country->flag);
                // Save filename to database
                $country->flag = $fileNameToStore;
            }

            $country->name = $request->name;
            $country->save();

            return response()->json($country);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country = Country::find($country->id);
        // Get logo & delete it from the directory
        Storage::delete('public/images/country/flag/'.$country->flag);
        // Delete it from database
        $country->delete();

        return response()->json();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function country()
    {
        // Get all resources
        $countries = Country::all()->sortByDesc('id');

        return view('product.countries', compact('countries'));
    }
}
