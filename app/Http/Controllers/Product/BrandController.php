<?php

namespace App\Http\Controllers\Product;

use Response;
use Validator;
use App\Model\Product\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['Auth:admin', 'admin'])->except('brand');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all()->sortBy('brandName');

        return view('admin.product.brands', compact('brands'));
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
            'brandName' => 'required',
            'brandLogo' => 'required|image|max:100',
        );

        $validator = Validator::make ( Input::all(), $rules);

        if ($validator->fails()){
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        }

        else{
            // Handle image upload

            // Checks if the file exists
            if ($request->hasFile('brandLogo')){
                // Get file name with extension
                $fileNameWithExt = $request->file('brandLogo')->getClientOriginalName();
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // Get only extension
                $extension = $request->file('brandLogo')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $fileName . time() . "." . $extension;
                // Directory to upload
                $request->file('brandLogo')->storeAs('public/images/brands', $fileNameToStore);
            }

            // Create instance of brand model & assign form value then save to database
            $brand = new Brand();
            $brand->brandName = $request->brandName;
            $brand->brandLogo = $fileNameToStore;
            $brand->save();

            return response()->json($brand);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        // Validate form data
        $rules = array(
            'brandName' => 'required',
            'brandLogo' => 'nullable|image|max:100',
        );

        $validator = Validator::make ( Input::all(), $rules);

        if ($validator->fails()){
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        }

        else{
            // Find the brand model & assign form value then save to database
            $brand = brand::find($brand->id);

            // Handle image upload

            // Checks if the file exists
            if ($request->hasFile('brandLogo')){
                // Get file name with extension
                $fileNameWithExt = $request->file('brandLogo')->getClientOriginalName();
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // Get only extension
                $extension = $request->file('brandLogo')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $fileName . time() . "." . $extension;
                // Directory to upload
                $request->file('brandLogo')->storeAs('public/images/brands', $fileNameToStore);
                // Get previous logo & delete it from the directory
                Storage::delete('public/images/brands/'.$brand->brandLogo);
                // Save filename to database
                $brand->brandLogo = $fileNameToStore;
            }

            $brand->brandName = $request->brandName;
            $brand->save();

            return response()->json($brand);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        // Find the model instance
        $brand = Brand::find ($brand->id);
        // Get logo & delete it from the directory
        Storage::delete('public/images/brands/'.$brand->brandLogo);
        // Delete it from database
        $brand->delete();

        return response()->json();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function brand()
    {
        $brands = Brand::all()->sortByDesc('id');

        return view('product.brands', compact('brands'));
    }
}
