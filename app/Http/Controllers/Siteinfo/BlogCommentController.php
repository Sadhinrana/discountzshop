<?php

namespace App\Http\Controllers\Siteinfo;

use Response;
use Validator;
use Illuminate\Http\Request;
use App\Model\Siteinfo\Blogcomment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class BlogCommentController extends Controller
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
        $rules = array(
            'UserName' => 'required|string|max:255',
            'email' => 'required|email',
            'comment' => 'required|string',
            'blogReview' => 'required|integer',
            'blog_id' => 'required|integer',
        );

        $validator = Validator::make ( Input::all(), $rules);

        if ($validator->fails()){
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        }


        // Create a new Blogcomment instance & assign form value then save to database
        $blogcomment = new Blogcomment();
        $blogcomment->UserName = $request->UserName;
        $blogcomment->email = $request->email;
        $blogcomment->comment = $request->comment;
        $blogcomment->blogReview = $request->blogReview;
        $blogcomment->blog_id = $request->blog_id;
        $blogcomment->save();

        return response()->json($blogcomment);
    }
}
