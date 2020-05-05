<?php

namespace App\Http\Controllers\Siteinfo;

use Response;
use Validator;
use App\Model\Siteinfo\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class PartnerController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['Auth:admin', 'admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all partners
        $partners = Partner::all();

        return view('admin.siteinfo.partners', compact('partners'));
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
            'companyUrl' => 'required',
            'brandLogo' => 'required|image|mimes:png,jpg,jpeg|max:25',
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

            // Create instance of Partner model & assign form value then save to database
            $partner = new Partner;
            $partner->companyUrl = $request->companyUrl;
            $partner->brandLogo = $fileNameToStore;
            $partner->save();

            return response()->json($partner);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        // Find the Partner model & assign form value then save to database
        $partner = Partner::find($partner->id);

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
            Storage::delete('public/images/brands/'.$partner->brandLogo);
            // Save filename to database
            $partner->brandLogo = $fileNameToStore;
        }

        $partner->companyUrl = $request->companyUrl;
        $partner->save();

        return response()->json($partner);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        // Find the model instance
        $partner = Partner::find ($partner->id);
        // Get logo & delete it from the directory
        Storage::delete('public/images/brands/'.$partner->brandLogo);
        // Delete it from database
        $partner->delete();

        return response()->json();
    }
}
