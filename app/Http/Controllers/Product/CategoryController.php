<?php

namespace App\Http\Controllers\Product;

use Response;
use Validator;
use Illuminate\Http\Request;
use App\Model\Product\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
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
        $categories = Category::where('parent_id', 0)->orderBy('id', 'desc')->get();
        $allcategories = Category::all()->sortByDesc('id');

        return view('admin.product.categories', compact('categories', 'allcategories'));
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
            'categoryName' => 'required',
            'catImage' => 'image|max:25',
            'parent_id' => 'required|integer',
        );

        $validator = Validator::make ( Input::all(), $rules);

        if ($validator->fails()){
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        }

        else{
            // Create instance of category model & assign form value then save to database
            $category = new Category;

            // Handel image upload

            // Checks if the file exists
            if ($request->hasFile('catImage')){
                // Get file name with extension
                $fileNameWithExt = $request->file('catImage')->getClientOriginalName();
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // Get only extension
                $extension = $request->file('catImage')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $fileName . str_random(20) . "." . $extension;
                // Directory to upload
                $path = $request->file('catImage')->storeAs('public/images/icons/menu', $fileNameToStore);
                $category->catImage = $fileNameToStore;
            }/*else{
                $category->catImage = null;
            }*/

            $category->categoryName = $request->categoryName;
            $category->parent_id = $request->parent_id;
            $category->save();

            return response()->json($category);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // Validate form data
        $rules = array(
            'categoryName' => 'required',
            'catImage' => 'image|max:25',
            'parent_id' => 'required|integer',
        );

        $validator = Validator::make ( Input::all(), $rules);

        if ($validator->fails()){
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        }

        else{
            // Find the category model & assign form value then save to database
            $category = Category::find($category->id);

            // Handel image upload

            // Checks if the file exists
            if ($request->hasFile('catImage')){
                // Get file name with extension
                $fileNameWithExt = $request->file('catImage')->getClientOriginalName();
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // Get only extension
                $extension = $request->file('catImage')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $fileName . str_random(20) . "." . $extension;
                // Directory to upload
                $request->file('catImage')->storeAs('public/images/icons/menu', $fileNameToStore);
                // Get categoryImage & delete it from the directory
                Storage::delete('public/images/icons/menu/'.$category->catImage);
                $category->catImage = $fileNameToStore;
            }

            $category->categoryName = $request->categoryName;
            $category->parent_id = $request->parent_id;
            $category->save();

            return response()->json($category);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::find ($category->id)->delete();

        return response()->json();
    }
}
