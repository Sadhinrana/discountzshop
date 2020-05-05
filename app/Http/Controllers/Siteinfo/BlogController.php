<?php

namespace App\Http\Controllers\Siteinfo;

use Response;
use Validator;
use App\Model\Siteinfo\Blog;
use Illuminate\Http\Request;
use App\Model\Product\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['Auth:admin', 'admin'])->except('blog', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all blogs
        $blogs = Blog::all()->sortByDesc('id');

        // Get all categories
        $categories = Category::where('parent_id', 0)->orderBy('id', 'desc')->get();

        return view('admin.siteinfo.blogs', compact('blogs', 'categories'));
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
            'blogTitle' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|integer',
            'blogImage' => 'required|image'
        );

        $validator = Validator::make ( Input::all(), $rules);

        if ($validator->fails()){
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        }

        // Handel image upload

        // Checks if the file exists
        if ($request->hasFile('blogImage')){
            // Get file name with extension
            $fileNameWithExt = $request->file('blogImage')->getClientOriginalName();
            // Get only file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get only extension
            $extension = $request->file('blogImage')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $fileName . time() . "." . $extension;
            // Directory to upload
            $request->file('blogImage')->storeAs('public/images/blog', $fileNameToStore);
        }

        // Create instance of Blog model & assign form value then save to database
        $blog = new Blog;
        $blog->blogTitle = $request->blogTitle;
        $blog->description = $request->description;
        $blog->category_id = $request->category_id;
        $blog->blogImage = $fileNameToStore;
        $blog->save();

        return response()->json($blog);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        // Get the blog
        $blog = Blog::find($blog->id);

        // Get all categories
        $categories = Category::all()->sortByDesc('id');

        return view('siteinfo.blog-single', compact('blog', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        // Get the blog
        $blog = Blog::find($blog->id);

        return response()->json($blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        // Validate form data
        $rules = array(
            'blogTitle' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|integer',
            'blogImage' => 'nullable|image'
        );

        $validator = Validator::make ( Input::all(), $rules);

        if ($validator->fails()){
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        }

        // Create instance of Blog model & assign form value then save to database
        $blog = Blog::find($blog->id);

        // Handel image upload

        // Checks if the file exists
        if ($request->hasFile('blogImage')){
            // Get file name with extension
            $fileNameWithExt = $request->file('blogImage')->getClientOriginalName();
            // Get only file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get only extension
            $extension = $request->file('blogImage')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $fileName . time() . "." . $extension;
            // Directory to upload
            $request->file('blogImage')->storeAs('public/images/blog', $fileNameToStore);
            // Delete it from the directory
            Storage::delete('public/images/blog/'.$blog->blogImage);
            // Assign to database
            $blog->blogImage = $fileNameToStore;
        }

        $blog->blogTitle = $request->blogTitle;
        $blog->description = $request->description;
        $blog->category_id = $request->category_id;
        $blog->save();

        return response()->json($blog);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog = Blog::find($blog->id);
        // Get blogImage & delete it from the directory
        Storage::delete('public/images/blog/'.$blog->blogImage);
        $blog->delete();

        return response()->json($blog);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blog()
    {
        // Get all blogs
        $blogs = Blog::all()->sortByDesc('id');

        // Get all categories
        $categories = Category::all()->sortByDesc('id');

        return view('siteinfo.blog', compact('blogs', 'categories'));
    }
}
