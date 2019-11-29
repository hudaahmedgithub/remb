<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\User;
use Auth;

class MessageController extends Controller
{
	
	public function __construct()
	{
		$this->middleware(['auth']);
	}
	
    public function index()
    {
		$messages=Message::all();
        return view('messages.index',compact('messages'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
     $user=Auth::user();
     $message=auth()->user()->messages()->create($request->all());
		
broadcast(new \App\Events\MessageDelivered
		  ($message))->toOthers();
		
	}

    public function show(Message $message)
    {
        //
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
    public function destroy(Message $message)
    {
        //
    }
}
