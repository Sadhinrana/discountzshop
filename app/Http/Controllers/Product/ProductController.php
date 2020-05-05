<?php

namespace App\Http\Controllers\Product;

use App\Vendor;
use Carbon\Carbon;
use App\Model\Product\Tag;
use Illuminate\Support\Str;
use App\Model\Product\Size;
use App\Model\Product\Color;
use App\Model\Product\Image;
use App\Model\Product\Brand;
use Illuminate\Http\Request;
use App\Model\Product\Country;
use App\Model\Product\Product;
use App\Model\Siteinfo\Banner;
use App\Model\Product\Category;
use App\Model\Siteinfo\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('Auth:admin')->only('index', 'store', 'edit', 'update', 'destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all brands
        $brands = Brand::all();

        // Get all categories
        $categories = Category::where('parent_id', 0)->orderBy('id', 'desc')->get();

        // Get all colors
        $colors = Color::all();

        // Get all sizes
        $sizes = Size::all();

        // Get all tags
        $tags = Tag::all();

        // Get all countries
        $countries = Country::all();

        // Get user role
        foreach (auth()->user()->roles as $role){
            $role = $role->role_title;
        }

        // Check if admin or vendor
        if($role == 'Vendor'){
            // Get all products
            $products = Product::where('admin_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        }else{
            // Get all products
            $products = Product::all()->sortByDesc('id');
        }

        return view('admin.product.products', compact('products', 'brands', 'categories', 'colors', 'sizes', 'tags', 'countries'));
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
            'productName' => 'required|string|max:255',
            'sku' => 'required|string|max:255',
            'product_url' => 'nullable|active_url|max:255',
            'shortDescription' => 'required|string',
            'description' => 'required|string',
            'specification' => 'nullable|string',
            'availability' => 'required|integer',
            'discount_type' => 'required|integer',
            'discount_value' => 'required|integer|min:1',
            'salePrice' => 'nullable|numeric|min:1',
            'regularPrice' => 'nullable|numeric|min:1',
            'category_id' => 'required|integer',
            'brand_id' => 'required|integer',
            'country_id' => 'required|integer',
            'valid_until' => 'required|date|after:today',
            'image.*' => 'required|image',
        );

        $validator = Validator::make ( Input::all(), $rules);

        if ($validator->fails()){
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        }

        // Get user role
        foreach (auth()->user()->roles as $role){
            $role = $role->role_title;
        }

        // Create instance of Product model & assign form value then save to database
        $product = new Product;
        $product->productName = $request->productName;
        $product->sku = $request->sku;
        $product->category_id = $request->category_id;
        $product->product_url = $request->product_url;
        $product->shortDescription = $request->shortDescription;
        $product->country_id = $request->country_id;
        // Check if admin or vendor
        if($role == 'Vendor'){
            $product->is_approved = false;
        }else{
            $product->is_approved = true;
        }
        $product->valid_until = $request->valid_until;
        $product->brand_id = $request->brand_id;
        $product->admin_id = auth()->user()->id;
        $product->description = $request->description;
        $product->specification = $request->specification;
        $product->regularPrice = $request->regularPrice;
        $product->salePrice = $request->salePrice;
        $product->discount_type = $request->discount_type;
        $product->discount_value = $request->discount_value;
        $product->availability = $request->availability;
        $product->save();

        // Check if color is set
        if (isset($request->color)) {
            // Loop over selected colors
            foreach ($request->color as $value) {
                // Save to pivot table
                $product->colors()->attach($value);
            }
        }

        // Check if size is set
        if (isset($request->size)) {
            // Loop over selected sizes
            foreach ($request->size as $value) {
                // Save to pivot table
                $product->sizes()->attach($value);
            }
        }

        // Check if tag is set
        if (isset($request->tag)) {
            // Loop over selected tags
            foreach ($request->tag as $value) {
                // Save to pivot table
                $product->tags()->attach($value);
            }
        }

        // Handle image upload

        // Checks if the file exists
        if ($request->hasFile('image')){
            // Loop over each file
            foreach($request->file('image') as $file)
            {
                // Get file name with extension
                $fileNameWithExt = $file->getClientOriginalName();
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // Get only extension
                $extension = $file->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $fileName . Str::random(20) . "." . $extension;
                // Directory to upload
                $file->storeAs('public/images/product/', $fileNameToStore);

                // Create instance of Image model & assign form value then save to database
                $image = new Image;
                $image->image = $fileNameToStore;
                $image->product_id = $product->id;
                $image->save();
            }
        }

        // Return json response
        return response()->json(array('product' => $product->toArray(),'image' => $image->toArray(), 'colors' => $product->colors, 'sizes' => $product->sizes, 'tags' => $product->tags));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, Request $request)
    {
        // Get the product
        $product = Product::with('category', 'brand', 'country')->find($product->id);

        // Get the Image model associated with the product
        $image = Image::where('product_id', $product->id)->first();

        // If request type is ajax then send json respond
        if($request->ajax()){
            // Return json response
            return response()->json(array('product' => $product->toArray(),'image' => $image->toArray(), 'colors' => $product->colors, 'sizes' => $product->sizes, 'tags' => $product->tags));
        }

        // Get related products
        $products = Product::where('id', '!=', $product->id)->where('category_id', $product->category_id)->get();

        // Return view
        return view('product.single-product', compact('product','products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // Find the Product model
        $product = Product::find($product->id);

        // Get the Image model associated with the product
        $images = Image::where('product_id', $product->id)->get();

        // Return json response
        return response()->json(array('product' => $product->toArray(),'images' => $images->toArray(), 'colors' => $product->colors,'sizes' => $product->sizes,'tags' => $product->tags));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // Validate form data
        $rules = array(
            'productName' => 'required|string|max:255',
            'sku' => 'required|string|max:255',
            'product_url' => 'nullable|active_url|string|max:255',
            'shortDescription' => 'required|string',
            'description' => 'required|string',
            'specification' => 'nullable|string',
            'availability' => 'required|integer',
            'discount_type' => 'required|integer',
            'discount_value' => 'required|integer|min:1',
            'salePrice' => 'nullable|numeric|min:1',
            'regularPrice' => 'nullable|numeric|min:1',
            'category_id' => 'required|integer',
            'brand_id' => 'required|integer',
            'country_id' => 'required|integer',
            'valid_until' => 'required|date|after:today',
            'image.*' => 'nullable|image',
            'image_update.*' => 'nullable|image',
        );

        $validator = Validator::make ( Input::all(), $rules);

        if ($validator->fails()){
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        }

        // Get user role
        foreach (auth()->user()->roles as $role){
            $role = $role->role_title;
        }

        // Find the Product model & assign form value then save to database
        $product = Product::find($product->id);
        $product->productName = $request->productName;
        $product->sku = $request->sku;
        $product->category_id = $request->category_id;
        $product->product_url = $request->product_url;
        $product->shortDescription = $request->shortDescription;
        $product->country_id = $request->country_id;
        // Check if admin or vendor
        if($role != 'Vendor'){
            $product->is_approved = $request->is_approved;
        }
        $product->valid_until = $request->valid_until;
        $product->brand_id = $request->brand_id;
        $product->description = $request->description;
        $product->specification = $request->specification;
        $product->regularPrice = $request->regularPrice;
        $product->salePrice = $request->salePrice;
        $product->discount_type = $request->discount_type;
        $product->discount_value = $request->discount_value;
        $product->availability = $request->availability;
        $product->save();

        // Detach previous color, tag & size
        $product->colors()->detach();
        $product->sizes()->detach();
        $product->tags()->detach();

        // Check if color is set
        if (isset($request->color)) {
            // Loop over checked values
            foreach ($request->color as $value) {
                // Update with new values
                $product->colors()->attach($value);
            }
        }

        // Check if size is set
        if (isset($request->size)) {
            // Loop over checked values
            foreach ($request->size as $value) {
                // Update with new values
                $product->sizes()->attach($value);
            }
        }

        // Check if tag is set
        if (isset($request->tag)) {
            // Loop over checked values
            foreach ($request->tag as $value) {
                // Update with new values
                $product->tags()->attach($value);
            }
        }

        // Get the Image model associated with the product
        $image = Image::where('product_id', $product->id)->first();

        // Handle new image upload

        // Checks if the file exists
        if ($request->hasFile('image')){
            // Loop over each file
            foreach($request->file('image') as $file)
            {
                // Get file name with extension
                $fileNameWithExt = $file->getClientOriginalName();
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // Get only extension
                $extension = $file->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $fileName . Str::random(20) . "." . $extension;
                // Directory to upload
                $file->storeAs('public/images/product/', $fileNameToStore);

                // Create instance of Image model & assign form value then save to database
                $image = new Image;
                $image->image = $fileNameToStore;
                $image->product_id = $product->id;
                $image->save();
            }
        }

        // Handle update image upload

        // Checks if the file exists
        if ($request->hasFile('image_update')){
            // Loop over each file
            foreach($request->file('image_update') as $key => $file)
            {
                // Get file name with extension
                $fileNameWithExt = $file->getClientOriginalName();
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // Get only extension
                $extension = $file->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $fileName . Str::random(20) . "." . $extension;
                // Directory to upload
                $file->storeAs('public/images/product/', $fileNameToStore);
                // Get the Image model associated with the product
                $image = Image::find($key);
                // Delete image from the directory
                Storage::delete('public/images/product/'.$image->image);
                // Assign new value
                $image->image = $fileNameToStore;
                // Save
                $image->save();
            }
        }

        // Return json response
        return response()->json(array('product' => $product->toArray(),'image' => $image->toArray(), 'colors' => $product->colors,'sizes' => $product->sizes,'tags' => $product->tags));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // Get the images associated with the product
        $images = Image::where('product_id', $product->id)->get();

        // Loop over each image file
        foreach ($images as $image){
            // Delete image from the directory
            Storage::delete('public/images/product/'.$image->image);

            // Delete from database
            $image->delete();
        }

        // Get the product & delete it
        $product = Product::find($product->id);

        // Detach previous color & size $ tag
        $product->colors()->detach();
        $product->sizes()->detach();
        $product->tags()->detach();

        // Delete the product
        $product->delete();

        return response()->json();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shop()
    {
        // Get all categories
        $categories = Category::where('parent_id', 0)->get();

        // Get all brands
        $brands = Brand::all();

        // Get all countries
        $countries = Country::all();

        // Get all sizes
        $sizes = Size::all();

        // Get all colors
        $colors = Color::all();

        // Get all tags
        $tags = Tag::all();

        // Get all banners
        $banners = Banner::all();

        // Get all products
        $products = Product::where(['is_approved' => true, ['valid_until', '>=', Carbon::now()]])->orderBy('id', 'desc')->get();

        // Return view
        return view('product.shop', compact('products', 'categories', 'sizes', 'colors', 'banners', 'brands', 'tags', 'countries'));
    }

    /**
     * Display a listing of the product by category and subcategory.
     *
     * @return \Illuminate\Http\Response
     */
    public function productsByCat($catId, Request $request)
    {
        // If request type is ajax then send json response
        if($request->ajax()){
            // Find product by category
            $products = Product::with('images', 'colors', 'sizes', 'tags')->where(['category_id' => $catId, 'is_approved' => true, ['id', '!=', $request->id], ['valid_until', '>=', Carbon::now()]])->get();

            // Return json response
            return response()->json($products);
        }

        // Get all categories
        $categories = Category::where('parent_id', 0)->get();

        // Get all brands
        $brands = Brand::all();

        // Get all countries
        $countries = Country::all();

        // Get all sizes
        $sizes = Size::all();

        // Get all colors
        $colors = Color::all();

        // Get all tags
        $tags = Tag::all();

        // Get the category
        $category = Category::find($catId);

        // Find product by category
        $products = Product::where(['category_id' => $catId, 'is_approved' => true, ['valid_until', '>=', Carbon::now()]])
            ->get();

        // Return view
        return view('product.productsByCat', compact('products', 'categories', 'sizes', 'colors', 'banners', 'category', 'brands', 'countries', 'tags'));
    }

    /**
     * Display a listing of the product by brand.
     *
     * @return \Illuminate\Http\Response
     */
    public function productsByBrand($brandId){
        // Get all brands
        $brands = Brand::all();

        // Get the brand
        $brand = Brand::find($brandId);

        // Get all categories
        $categories = Category::all();

        // Get all countries
        $countries = Country::all();

        // Get all sizes
        $sizes = Size::all();

        // Get all colors
        $colors = Color::all();

        // Get all tags
        $tags = Tag::all();

        // Find product by category
        $products = Product::where(['brand_id' => $brandId, 'is_approved' => true, ['valid_until', '>=', Carbon::now()]])
            ->get();

        // Return view
        return view('product.productsByBrand', compact('products', 'brands', 'sizes', 'colors', 'banners', 'brand', 'countries', 'tags', 'categories'));
    }

    /**
     * Display a listing of the product by country.
     *
     * @return \Illuminate\Http\Response
     */
    public function productsByCountry($country_id){
        // Get all brands
        $brands = Brand::all();

        // Get the country
        $country = Country::find($country_id);

        // Get all categories
        $categories = Category::all();

        // Get all countries
        $countries = Country::all();

        // Get all sizes
        $sizes = Size::all();

        // Get all colors
        $colors = Color::all();

        // Get all tags
        $tags = Tag::all();

        // Find product by category
        $products = Product::where(['country_id' => $country_id, 'is_approved' => true, ['valid_until', '>=', Carbon::now()]])
            ->get();

        // Return view
        return view('product.productsByCountry', compact('products', 'brands', 'sizes', 'colors', 'banners', 'country', 'countries', 'tags', 'categories'));
    }

    /**
     * Display a listing of the product by search.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchedProduct(Request $request){
        // Get all categories
        $categories = Category::where('parent_id', 0)->get();

        // Get all brands
        $brands = Brand::all();

        // Get all countries
        $countries = Country::all();

        // Get all sizes
        $sizes = Size::all();

        // Get all colors
        $colors = Color::all();

        // Get all tags
        $tags = Tag::all();

        // Get all banners
        $banners = Banner::all();

        // Get products
        $products = Product::where(['is_approved' => true, ['productName', 'like', '%' . $request->search . '%'], ['valid_until', '>=', Carbon::now()]])->get();

        // Return view
        return view('product.searchedProduct', compact('products', 'categories', 'sizes', 'colors', 'banners', 'brands', 'countries', 'tags'));
    }

    /**
     * Display a listing of the product by search.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSuggestedProducts($key){
        $products = Product::with('images')->where(['is_approved' => true, ['productName', 'like', '%' . $key . '%'], ['valid_until', '>=', Carbon::now()]])->get(['id', 'productName', 'salePrice', 'regularPrice', 'discount_value']);

        return response()->json($products);
    }

    /**
     * Display a listing of the product by bestDeals.
     *
     * @return \Illuminate\Http\Response
     */
    public function offers($type){
        // Get all brands
        $brands = Brand::all();

        // Get all categories
        $categories = Category::where('parent_id', 0)->get();

        // Get all countries
        $countries = Country::all();

        // Get all sizes
        $sizes = Size::all();

        // Get all colors
        $colors = Color::all();

        // Get all tags
        $tags = Tag::all();

        if ($type == 0){
            // Product type
            $type = 'Best Deals';

            // Find product by category
            $products = Product::where(['discount_type' => 0, 'is_approved' => true, ['valid_until', '>=', Carbon::now()]])
                ->get();
        }elseif ($type == 1){
            // Product type
            $type = 'Hot Deals';

            // Find product by category
            $products = Product::where(['discount_type' => 1, 'is_approved' => true, ['valid_until', '>=', Carbon::now()]])
                ->get();
        }elseif ($type == 2){
            // Product type
            $type = 'Seasonals';

            // Find product by category
            $products = Product::where(['discount_type' => 2, 'is_approved' => true, ['valid_until', '>=', Carbon::now()]])
                ->get();
        }elseif ($type == 3){
            // Product type
            $type = 'Stock Clearance';

            // Find product by category
            $products = Product::where(['discount_type' => 3, 'is_approved' => true, ['valid_until', '>=', Carbon::now()]])
                ->get();
        }elseif ($type == 4){
            // Product type
            $type = 'Buy One Get One';

            // Find product by category
            $products = Product::where(['discount_type' => 4, 'is_approved' => true, ['valid_until', '>=', Carbon::now()]])
                ->get();
        }elseif ($type == 5){
            // Product type
            $type = 'EMI';

            // Find product by category
            $products = Product::where(['discount_type' => 5, 'is_approved' => true, ['valid_until', '>=', Carbon::now()]])
                ->get();
        }else{
            // Product type
            $type = 'Deals';

            // Find product by category
            $products = Product::where(['discount_type' => 0, 'is_approved' => true, ['valid_until', '>=', Carbon::now()]])->orWhere(['discount_type' => 1, 'is_approved' => true, ['valid_until', '>=', Carbon::now()]])->get();
        }

        // Return view
        return view('product.products', compact('products', 'brands', 'sizes', 'colors', 'banners', 'country', 'countries', 'tags', 'categories', 'type'));
    }
}
