<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{

   public function AdminContact(){

    $contacts = Contact::all();
    return view('admin.contact.index',compact('contacts'));
   }

   public function AddContact(){
    return view('admin.contact.create');
   }

   public function StoreContact(Request $request){
    Contact::insert([
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'created_at' => Carbon::now()

    ]);

    return Redirect()->route('admin.contact')->with('success','Contact Inserted Successfully');

   }

   public function Contact(){
    $contact = DB::table('contacts')->first();
    return view('pages.contact',compact('contact'));
   }

   public function ContactForm(Request $request){
    ContactForm::insert([
        'name' => $request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'message' => $request-> message,
        'created_at' => Carbon::now()

    ]);

    return Redirect()->route('contact')->with('success','Your Message Send Successfully');
   }

   public function AdminMessage(){
    $messages = ContactForm::all();
    return view('admin.contact.message',compact('messages'));
   }
}
