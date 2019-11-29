<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Mail;
class ContactController extends Controller
{
    public function index()
    {
      $contacts=Contact::all();
		return view('admin.contact.index',compact('contacts'));
    }
	
	public function contact(Request $request){
     if($request->isMethod('post')){
         $data = $request->all();
          $contact=new Contact;
             $contact->name=$data['name'];
             $contact->email=$data['email']; 
             $contact->subject=$data['subject']; 
             $contact->message=$data['message'];
             $contact->save();
		 
 $email="admin1000@yopmail.com";
            $messageData=
                [
                'name'=>$data['name'],
                'email'=>$data['email'],
                'subject'=>$data['subject'],
                'comment'=>$data['message']
                ];
            Mail::send('emails.enquiry',$messageData,
                      function($message)use($email)
                       {
                           $message->to($email)->subject('Enquiry from E-com');
                       });
            return redirect()->back()->with('flash_message_success','Thank you for your enquiry, we will get back soon.');
          
    }
 
     return view('contact');
}
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function showContact($id)
    {
       $contact=Contact::find($id);
		$contact->fill(['view'=>1])->save();
		
		return view('admin.contact.edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $contact=Contact::find($id);
		$contact->delete();
		return redirect('/adminPanel/contact');
    }
}
