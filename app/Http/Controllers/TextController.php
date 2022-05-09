<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Text;
use Illuminate\Support\Facades\Validator;
class TextController extends Controller
{
    public function __construct()
    {
        $this->middleware("role:super");
    }

    public function contact()
    {
        $contact = Text::where("section","contact")->get();
        return view("admin.text.contact",compact("contact"));
    }

    public function about()
    {
        $about = Text::where("section","about")->get();
        return view("admin.text.about",compact("about"));
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            "section"=>"required|in:about,contact",
            "text"=>"required"
        ]);
        if ($validation->passes()) {
            Text::where("section",$request->section)->delete();
            $text = Text::create($request->except(["_token","_method"]));
            return redirect()->route("admin.home");
        }
        else
        {
            return back()->with(["errors"=>$validation->errors()->all()]);
        }
    }
}
