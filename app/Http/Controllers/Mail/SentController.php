<?php

namespace App\Http\Controllers\Mail;

use App\Model\Mail\Message;
use App\Model\Mail\Sent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SentController extends Controller
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
        // Get all sent mail item
        $sents = Sent::orderBy('id', 'desc')->simplePaginate(15);
        $total = Sent::all()->count();
        $messages = Message::all()->count();

        return view('admin.mail.sent', compact('sents', 'total', 'messages'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Draft  $draft
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get the sent mail
        $sent = Sent::find($id);
        $messages = Message::all()->count();

        return view('admin.mail.showSentMail', compact('sent', 'messages'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Draft  $draft
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // Get the mail $ delete it
        Sent::find($request->id)->delete();

        return response()->json();
    }

    /**
     * Remove the specified list of resources from storage.
     *
     * @param  \App\Draft  $draft
     * @return \Illuminate\Http\Response
     */
    public function destroyBulk(Request $request)
    {
        // Get the mail $ delete it
        Sent::destroy($request->id);

        return response()->json();
    }
}
