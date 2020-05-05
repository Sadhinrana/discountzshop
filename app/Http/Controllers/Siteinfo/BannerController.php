<?php

namespace App\Http\Controllers\Siteinfo;

use Illuminate\Http\Request;
use App\Model\Siteinfo\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
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
        // Get all banners
        $banners = Banner::all()->sortByDesc('id');

        return view('admin.siteinfo.banners', compact('banners'));
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
        // Checks if the file exists
        if ($request->hasFile('banner_one')){
            // Get file name with extension
            $fileNameWithExt = $request->file('banner_one')->getClientOriginalName();
            // Get only file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get only extension
            $extension = $request->file('banner_one')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $fileName . time() . "." . $extension;
            // Directory to upload
            $path = $request->file('banner_one')->storeAs('public/images/banner', $fileNameToStore);
        }

        // Checks if the file exists
        if ($request->hasFile('banner_two')){
            // Get file name with extension
            $fileNameWithExt = $request->file('banner_two')->getClientOriginalName();
            // Get only file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get only extension
            $extension = $request->file('banner_two')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore1 = $fileName . time() . "." . $extension;
            // Directory to upload
            $path = $request->file('banner_two')->storeAs('public/images/banner', $fileNameToStore1);
        }

        // Checks if the file exists
        if ($request->hasFile('banner_deal_page')){
            // Get file name with extension
            $fileNameWithExt = $request->file('banner_deal_page')->getClientOriginalName();
            // Get only file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get only extension
            $extension = $request->file('banner_deal_page')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore2 = $fileName . time() . "." . $extension;
            // Directory to upload
            $path = $request->file('banner_deal_page')->storeAs('public/images/banner', $fileNameToStore2);
        }

        // Checks if the file exists
        if ($request->hasFile('banner_offer_page')){
            // Get file name with extension
            $fileNameWithExt = $request->file('banner_offer_page')->getClientOriginalName();
            // Get only file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get only extension
            $extension = $request->file('banner_offer_page')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore3 = $fileName . time() . "." . $extension;
            // Directory to upload
            $path = $request->file('banner_offer_page')->storeAs('public/images/banner', $fileNameToStore3);
        }

        // Checks if the file exists
        if ($request->hasFile('banner_brand_page')){
            // Get file name with extension
            $fileNameWithExt = $request->file('banner_brand_page')->getClientOriginalName();
            // Get only file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get only extension
            $extension = $request->file('banner_brand_page')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore4 = $fileName . time() . "." . $extension;
            // Directory to upload
            $path = $request->file('banner_brand_page')->storeAs('public/images/banner', $fileNameToStore4);
        }

        // Checks if the file exists
        if ($request->hasFile('banner_brand_single_page')){
            // Get file name with extension
            $fileNameWithExt = $request->file('banner_brand_single_page')->getClientOriginalName();
            // Get only file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get only extension
            $extension = $request->file('banner_brand_single_page')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore5 = $fileName . time() . "." . $extension;
            // Directory to upload
            $path = $request->file('banner_brand_single_page')->storeAs('public/images/banner', $fileNameToStore5);
        }

        // Checks if the file exists
        if ($request->hasFile('banner_category_page')){
            // Get file name with extension
            $fileNameWithExt = $request->file('banner_category_page')->getClientOriginalName();
            // Get only file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get only extension
            $extension = $request->file('banner_category_page')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore6 = $fileName . time() . "." . $extension;
            // Directory to upload
            $path = $request->file('banner_category_page')->storeAs('public/images/banner', $fileNameToStore6);
        }

        // Checks if the file exists
        if ($request->hasFile('banner_industry_page')){
            // Get file name with extension
            $fileNameWithExt = $request->file('banner_industry_page')->getClientOriginalName();
            // Get only file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get only extension
            $extension = $request->file('banner_industry_page')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore7 = $fileName . time() . "." . $extension;
            // Directory to upload
            $path = $request->file('banner_industry_page')->storeAs('public/images/banner', $fileNameToStore7);
        }

        // Checks if the file exists
        if ($request->hasFile('banner_industry_single_page')){
            // Get file name with extension
            $fileNameWithExt = $request->file('banner_industry_single_page')->getClientOriginalName();
            // Get only file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get only extension
            $extension = $request->file('banner_industry_single_page')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore8 = $fileName . time() . "." . $extension;
            // Directory to upload
            $path = $request->file('banner_industry_single_page')->storeAs('public/images/banner', $fileNameToStore8);
        }

        // Checks if the file exists
        if ($request->hasFile('banner_product_page')){
            // Get file name with extension
            $fileNameWithExt = $request->file('banner_product_page')->getClientOriginalName();
            // Get only file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get only extension
            $extension = $request->file('banner_product_page')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore9 = $fileName . time() . "." . $extension;
            // Directory to upload
            $path = $request->file('banner_product_page')->storeAs('public/images/banner', $fileNameToStore9);
        }

        // Checks if the file exists
        if ($request->hasFile('banner_searched_product_page')){
            // Get file name with extension
            $fileNameWithExt = $request->file('banner_searched_product_page')->getClientOriginalName();
            // Get only file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get only extension
            $extension = $request->file('banner_searched_product_page')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore10 = $fileName . time() . "." . $extension;
            // Directory to upload
            $path = $request->file('banner_searched_product_page')->storeAs('public/images/banner', $fileNameToStore10);
        }

        // Create instance of Banner model & assign form value then save to database
        $banner = new Banner();
        $banner->banner_one = $fileNameToStore;
        $banner->banner_one_link = $request->banner_one_link;
        $banner->banner_two = $fileNameToStore1;
        $banner->banner_two_link = $request->banner_two_link;
        $banner->banner_deal_page = $fileNameToStore2;
        $banner->banner_link_deal_page = $request->banner_link_deal_page;
        $banner->banner_offer_page = $fileNameToStore3;
        $banner->banner_link_offer_page = $request->banner_link_offer_page;
        $banner->banner_brand_page = $fileNameToStore4;
        $banner->banner_link_brand_page = $request->banner_link_brand_page;
        $banner->banner_brand_single_page = $fileNameToStore5;
        $banner->banner_link_brand_single_page = $request->banner_link_brand_single_page;
        $banner->banner_category_page = $fileNameToStore6;
        $banner->banner_link_category_page = $request->banner_link_category_page;
        $banner->banner_industry_page = $fileNameToStore7;
        $banner->banner_link_industry_page = $request->banner_link_industry_page;
        $banner->banner_industry_single_page = $fileNameToStore8;
        $banner->banner_link_industry_single_page = $request->banner_link_industry_single_page;
        $banner->banner_product_page = $fileNameToStore9;
        $banner->banner_link_product_page = $request->banner_link_product_page;
        $banner->banner_searched_product_page = $fileNameToStore10;
        $banner->banner_link_searched_product_page = $request->banner_link_searched_product_page;
        $banner->save();

        return response()->json($banner);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        // Find the banner
        $banner = Banner::find($banner->id);

        // Checks if the file exists
        if ($request->hasFile('banner_one')){
            // Get file name with extension
            $fileNameWithExt = $request->file('banner_one')->getClientOriginalName();
            // Get only file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get only extension
            $extension = $request->file('banner_one')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $fileName . time() . "." . $extension;
            // Directory to upload
            $path = $request->file('banner_one')->storeAs('public/images/banner', $fileNameToStore);
            // Get previous banner & delete it from the directory
            Storage::delete('public/images/banner/'.$banner->banner_one);
            // Assign new value
            $banner->banner_one = $fileNameToStore;
        }

        // Checks if the file exists
        if ($request->hasFile('banner_two')){
            // Get file name with extension
            $fileNameWithExt = $request->file('banner_two')->getClientOriginalName();
            // Get only file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get only extension
            $extension = $request->file('banner_two')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore1 = $fileName . time() . "." . $extension;
            // Directory to upload
            $path = $request->file('banner_two')->storeAs('public/images/banner', $fileNameToStore1);
            // Get previous banner & delete it from the directory
            Storage::delete('public/images/banner/'.$banner->banner_two);
            // Assign new value
            $banner->banner_two = $fileNameToStore1;
        }

        // Checks if the file exists
        if ($request->hasFile('banner_deal_page')){
            // Get file name with extension
            $fileNameWithExt = $request->file('banner_deal_page')->getClientOriginalName();
            // Get only file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get only extension
            $extension = $request->file('banner_deal_page')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore2 = $fileName . time() . "." . $extension;
            // Directory to upload
            $path = $request->file('banner_deal_page')->storeAs('public/images/banner', $fileNameToStore2);
            // Get previous banner & delete it from the directory
            Storage::delete('public/images/banner/'.$banner->banner_deal_page);
            // Assign new value
            $banner->banner_deal_page = $fileNameToStore2;
        }

        // Checks if the file exists
        if ($request->hasFile('banner_offer_page')){
            // Get file name with extension
            $fileNameWithExt = $request->file('banner_offer_page')->getClientOriginalName();
            // Get only file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get only extension
            $extension = $request->file('banner_offer_page')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore3 = $fileName . time() . "." . $extension;
            // Directory to upload
            $path = $request->file('banner_offer_page')->storeAs('public/images/banner', $fileNameToStore3);
            // Get previous banner & delete it from the directory
            Storage::delete('public/images/banner/'.$banner->banner_offer_page);
            // Assign new value
            $banner->banner_offer_page = $fileNameToStore3;
        }

        // Checks if the file exists
        if ($request->hasFile('banner_brand_page')){
            // Get file name with extension
            $fileNameWithExt = $request->file('banner_brand_page')->getClientOriginalName();
            // Get only file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get only extension
            $extension = $request->file('banner_brand_page')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore4 = $fileName . time() . "." . $extension;
            // Directory to upload
            $path = $request->file('banner_brand_page')->storeAs('public/images/banner', $fileNameToStore4);
            // Get previous banner & delete it from the directory
            Storage::delete('public/images/banner/'.$banner->banner_brand_page);
            // Assign new value
            $banner->banner_brand_page = $fileNameToStore4;
        }

        // Checks if the file exists
        if ($request->hasFile('banner_brand_single_page')){
            // Get file name with extension
            $fileNameWithExt = $request->file('banner_brand_single_page')->getClientOriginalName();
            // Get only file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get only extension
            $extension = $request->file('banner_brand_single_page')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore5 = $fileName . time() . "." . $extension;
            // Directory to upload
            $path = $request->file('banner_brand_single_page')->storeAs('public/images/banner', $fileNameToStore5);
            // Get previous banner & delete it from the directory
            Storage::delete('public/images/banner/'.$banner->banner_brand_single_page);
            // Assign new value
            $banner->banner_brand_single_page = $fileNameToStore5;
        }

        // Checks if the file exists
        if ($request->hasFile('banner_category_page')){
            // Get file name with extension
            $fileNameWithExt = $request->file('banner_category_page')->getClientOriginalName();
            // Get only file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get only extension
            $extension = $request->file('banner_category_page')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore6 = $fileName . time() . "." . $extension;
            // Directory to upload
            $path = $request->file('banner_category_page')->storeAs('public/images/banner', $fileNameToStore6);
            // Get previous banner & delete it from the directory
            Storage::delete('public/images/banner/'.$banner->banner_category_page);
            // Assign new value
            $banner->banner_category_page = $fileNameToStore6;
        }

        // Checks if the file exists
        if ($request->hasFile('banner_industry_page')){
            // Get file name with extension
            $fileNameWithExt = $request->file('banner_industry_page')->getClientOriginalName();
            // Get only file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get only extension
            $extension = $request->file('banner_industry_page')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore7 = $fileName . time() . "." . $extension;
            // Directory to upload
            $path = $request->file('banner_industry_page')->storeAs('public/images/banner', $fileNameToStore7);
            // Get previous banner & delete it from the directory
            Storage::delete('public/images/banner/'.$banner->banner_industry_page);
            // Assign new value
            $banner->banner_industry_page = $fileNameToStore7;
        }

        // Checks if the file exists
        if ($request->hasFile('banner_industry_single_page')){
            // Get file name with extension
            $fileNameWithExt = $request->file('banner_industry_single_page')->getClientOriginalName();
            // Get only file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get only extension
            $extension = $request->file('banner_industry_single_page')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore8 = $fileName . time() . "." . $extension;
            // Directory to upload
            $path = $request->file('banner_industry_single_page')->storeAs('public/images/banner', $fileNameToStore8);
            // Get previous banner & delete it from the directory
            Storage::delete('public/images/banner/'.$banner->banner_industry_single_page);
            // Assign new value
            $banner->banner_industry_single_page = $fileNameToStore8;
        }

        // Checks if the file exists
        if ($request->hasFile('banner_product_page')){
            // Get file name with extension
            $fileNameWithExt = $request->file('banner_product_page')->getClientOriginalName();
            // Get only file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get only extension
            $extension = $request->file('banner_product_page')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore9 = $fileName . time() . "." . $extension;
            // Directory to upload
            $path = $request->file('banner_product_page')->storeAs('public/images/banner', $fileNameToStore9);
            // Get previous banner & delete it from the directory
            Storage::delete('public/images/banner/'.$banner->banner_product_page);
            // Assign new value
            $banner->banner_product_page = $fileNameToStore9;
        }

        // Checks if the file exists
        if ($request->hasFile('banner_searched_product_page')){
            // Get file name with extension
            $fileNameWithExt = $request->file('banner_searched_product_page')->getClientOriginalName();
            // Get only file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get only extension
            $extension = $request->file('banner_searched_product_page')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore10 = $fileName . time() . "." . $extension;
            // Directory to upload
            $path = $request->file('banner_searched_product_page')->storeAs('public/images/banner', $fileNameToStore10);
            // Get previous banner & delete it from the directory
            Storage::delete('public/images/banner/'.$banner->banner_searched_product_page);
            // Assign new value
            $banner->banner_searched_product_page = $fileNameToStore10;
        }


        $banner->banner_one_link = $request->banner_one_link;
        $banner->banner_two_link = $request->banner_two_link;
        $banner->banner_link_deal_page = $request->banner_link_deal_page;
        $banner->banner_link_offer_page = $request->banner_link_offer_page;
        $banner->banner_link_brand_page = $request->banner_link_brand_page;
        $banner->banner_link_brand_single_page = $request->banner_link_brand_single_page;
        $banner->banner_link_category_page = $request->banner_link_category_page;
        $banner->banner_link_industry_page = $request->banner_link_industry_page;
        $banner->banner_link_industry_single_page = $request->banner_link_industry_single_page;
        $banner->banner_link_product_page = $request->banner_link_product_page;
        $banner->banner_link_searched_product_page = $request->banner_link_searched_product_page;
        $banner->save();

        return response()->json($banner);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        // Find the banner
        $banner = Banner::find($banner->id);

        // Get previous banner & delete it from the directory
        Storage::delete('public/images/banner/'.$banner->banner_one);

        // Get previous banner & delete it from the directory
        Storage::delete('public/images/banner/'.$banner->banner_two);

        // Get previous banner & delete it from the directory
        Storage::delete('public/images/banner/'.$banner->banner_deal_page);

        // Get previous banner & delete it from the directory
        Storage::delete('public/images/banner/'.$banner->banner_offer_page);

        // Get previous banner & delete it from the directory
        Storage::delete('public/images/banner/'.$banner->banner_brand_page);

        // Get previous banner & delete it from the directory
        Storage::delete('public/images/banner/'.$banner->banner_brand_single_page);

        // Get previous banner & delete it from the directory
        Storage::delete('public/images/banner/'.$banner->banner_category_page);

        // Get previous banner & delete it from the directory
        Storage::delete('public/images/banner/'.$banner->banner_industry_page);

        // Get previous banner & delete it from the directory
        Storage::delete('public/images/banner/'.$banner->banner_industry_single_page);

        // Get previous banner & delete it from the directory
        Storage::delete('public/images/banner/'.$banner->banner_product_page);

        // Get previous banner & delete it from the directory
        Storage::delete('public/images/banner/'.$banner->banner_searched_product_page);

        // Delete from database
        $banner->delete();

        return response()->json();
    }
}
