<?php

namespace App\Http\Controllers\Siteinfo;

use Response;
use Validator;
use Illuminate\Http\Request;
use App\Model\Siteinfo\Siteinfo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class SiteinfoController extends Controller
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
        $siteinfos = Siteinfo::all();

        return view('admin.siteinfo.infos', compact('siteinfos'));
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
         // Define all validate rules
        $rules = array(
            'facebook' => 'required',
            'twitter' => 'required',
            'linkedin' => 'required',
            'googleplus' => 'required',
        );

        // Make validator
        $validator = Validator::make ( Input::all(), $rules);

        // Check validator return error response if not valid
        if ($validator->fails()){
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        }

        else {
            $siteinfos = new Siteinfo;
            $siteinfos->facebook = $request->facebook;
            $siteinfos->twitter = $request->twitter;
            $siteinfos->linkedin = $request->linkedin;
            $siteinfos->googleplus = $request->googleplus;
            $siteinfos->save();

            return response()->json($siteinfos);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siteinfo  $siteinfo
     * @return \Illuminate\Http\Response
     */
    public function show(Siteinfo $siteinfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siteinfo  $siteinfo
     * @return \Illuminate\Http\Response
     */
    public function edit(Siteinfo $siteinfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siteinfo  $siteinfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siteinfo $siteinfo)
    {
        // Define all validate rules
        $rules = array(
            'facebook' => 'required',
            'twitter' => 'required',
            'linkedin' => 'required',
            'googleplus' => 'required',
        );

        // Make validator
        $validator = Validator::make ( Input::all(), $rules);

        // Check validator return error response if not valid
        if ($validator->fails()){
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        }

        $siteinfos = Siteinfo::find ($request->id);
        $siteinfos->facebook = $request->facebook;
        $siteinfos->twitter = $request->twitter;
        $siteinfos->linkedin = $request->linkedin;
        $siteinfos->googleplus = $request->googleplus;
        $siteinfos->save();

        return response()->json($siteinfos);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siteinfo  $siteinfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siteinfo $siteinfo)
    {
        Siteinfo::find ($siteinfo->id)->delete();

        return response()->json();
    }
}
