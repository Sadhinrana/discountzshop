<?php

namespace App\Http\Controllers\Mail;

use App\User;
use Response;
use Validator;
use App\Model\Mail\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use App\Model\Siteinfo\Subscription;

class MessageController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['Auth:admin', 'admin'])->except('store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all messages
        $messages = Message::orderBy('id', 'desc')->simplePaginate(15);
        $total = Message::all()->count();

        // Return view
        return view('admin.mail.mailbox', compact('messages', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get all client
        $clients = User::all()->sortByDesc('id');

        // Get all messages
        $total = Message::all()->count();

        // Get all subscription
        $subscription = Subscription::all()->sortByDesc('id');

        return view('admin.mail.compose', compact('clients', 'subscription', 'total'));
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
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'phone' => 'required|string',
            'message' => 'required|string',
        );

        $validator = Validator::make ( Input::all(), $rules);

        if ($validator->fails()){
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        }

        $message = new Message;
        $message->name = $request->name;
        $message->email = $request->email;
        $message->phone = $request->phone;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->save();

        // Send the mail
        Mail::send([], [], function($message) use ($request) {
            $message->from($request->email);
            $message->to('offtica@gmail.com');
            $message->subject($request->subject);
            $message->setBody($request->message, 'text/html');
        });

        if ($message) {
            return response()->json(array('success' => "Thanks for your message. We will contact you as soon as possible."));
        }else{
            return response()->json(array('error' => "Failed!"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        // Get the message
        $message = Message::find($message->id);
        $messages = Message::all()->count();

        // Update view status
        if (!$message->is_viewed){
            $message->is_viewed = true;
            $message->save();
        }

        return view('admin.mail.showMessage', compact('message', 'messages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message, Request $request)
    {
        // Get the message & delete it
        Message::destroy($request->id);

        return response()->json();
    }
}
