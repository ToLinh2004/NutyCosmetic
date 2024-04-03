<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    private $contact;
    public function __construct()
    {
        $this->contact= new Contact;
    }
    public function show(){
        $contacts=$this->contact->getAllContact();

        return view('admin.contact.index',compact('contacts'));
    }
    public function updateStatus(Request $request, $id)
    {
        $status = $request->input('status');
        $contact = Contact::findOrFail($id);
        $contact->status = $status;
        $contact->save();
        return redirect()->back()->with('success', 'Contact status has been updated.');
    }
}
