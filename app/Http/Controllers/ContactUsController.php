<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;
class ContactUsController extends Controller
{

    public function __construct()
    {
        $this->middleware("role:super");
    }

    public function index()
    {
        $contacts = ContactUs::orderBy("created_at","DESC")->get();
        return view("admin.contact.index",compact("contacts"));
    }

    public function destroy($id)
    {
        $contact = ContactUs::findorfail($id);
        $contact->delete();
        return back()->with("success","Information Deleted Successfully."); 
    }
}
