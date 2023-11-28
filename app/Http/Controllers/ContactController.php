<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //contact Index

    public function contact(){
        $contacts = Contact::all();
        return view('layouts.dashboard.website_components.Contact.index', compact('contacts'));
    }

    //contact message Store

    public function contact_message(Request $request){

        Contact::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'message'=>$request->message,
            'created_at'=> Carbon::now(),
            'updated_at'=> null
        ]);

        Mail::to($request->email)->send(new ContactMail($request->except('_token')));


        return back()->with('message_send', 'Fact Upload Successfully');
    }

    //contact message show 

    public function contact_details(string $id)
    {
        $contact = Contact::find($id);
        return view('layouts.dashboard.website_components.Contact.show', compact('contact'));
    }

    //contact Remove from database

    public function contact_remove($id)
    {
        Contact::find($id)->delete();
        return back()->with('contact_remove', 'Contact Remove Successfully');
    }


}
