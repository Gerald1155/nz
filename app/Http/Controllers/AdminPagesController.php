<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pages;
use Illuminate\Support\Facades\Validator;
class AdminPagesController extends Controller
{
    public function __construct()
    {
         $this->middleware('role:super');
    }

    public function index()
    {
        #show all pages     
        $photos = Pages::orderBy('created_at')->get();
        return view('admin.pages.index',compact('photos'));
    }

    
    public function add($id)
    {
        #click and add or delete images
        $photo = Pages::findorfail($id);
        return view('admin.pages.add',compact('photo'));
    }
}
