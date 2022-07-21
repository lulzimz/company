<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function AdminContact()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    public function addContact()
    {
        return view('admin.contact.create');
    }

    public function storeContact(Request $req)
    {

        $req->validate(
            [
                'address' => 'required',
                'email' => 'required',
                'phone' => 'required|numeric',
            ]
        );

        Contact::insert([
            'address' => $req->address,
            'email' => $req->email,
            'phone' => $req->phone,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Contact Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('adminContact')->with($notification);
    }

    public function editContact($id)
    {
        $contacts = Contact::find($id);
        return view('admin.contact.edit', compact('contacts'));
    }

    public function updateContact(Request $request, $id)
    {

        $request->validate(
            [
                'address' => 'required',
                'email' => 'required',
                'phone' => 'required|numeric',
            ]
        );

        Contact::find($id)->update([
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        $notification = array(
            'message' => 'Contact Updated Successfully',
            'alert-type' => 'info'
        );
        return Redirect()->route('adminContact')->with($notification);
    }

    public function deleteContact($id)
    {
        $delete = Contact::find($id)->Delete();

        $notification = array(
            'message' => 'Contact Deleted Successfully',
            'alert-type' => 'error'
        );

        return Redirect()->back()->with($notification);
    }


    //HOME
    public function Contact()
    {
        $contact = DB::table('contacts')->first();
        return view('pages.contact', compact('contact'));
    }

    //user message
    public function contactMessage(Request $req)
    {

        $req->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'subject' => 'required',
                'message' => 'required|min:3',
            ]
        );
        
        ContactMessage::insert([
            'name' => $req->name,
            'email' => $req->email,
            'subject' => $req->subject,
            'message' => $req->message,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Message sent Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function adminContactMessage()
    {
        $messages = ContactMessage::all();
        return view('admin.contact.message', compact('messages'));
    }

    public function deleteContactMessage($id)
    {
        $delete = ContactMessage::find($id)->Delete();

        $notification = array(
            'message' => 'Message has been deleted',
            'alert-type' => 'error'
        );

        return Redirect()->back()->with($notification);
    }
}
