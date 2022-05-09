<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Validator;
class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware("role:super");
    }

    public function index()
    {
        $reviews = Review::orderBy("created_at","DESC")->get();
        return view("admin.review.index",compact("reviews"));
    }

    public function create()
    {
        return view("admin.review.create");
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            "name"=>"required",
            "review"=>"required"
        ]);

        if ($validation->passes()) {
            $review = Review::create($request->except(["_token","_method"]));
            return redirect()->route("review.index");
        }
        else
        {
            return back()->with(["errors"=>$validation->errors()->all()]);
        }
    }

    public function show($id)
    {
        return abort(404);
    }

    public function edit($id)
    {
        $review = Review::findorfail($id);
        return view("admin.review.edit",compact("review"));
    }

    public function update(Request $request, $id)
    {
        Review::findorfail($id);
        $validation = Validator::make($request->all(),[
            "name"=>"required",
            "review"=>"required"
        ]);

        if ($validation->passes()) {
            $review = Review::where("id",$id)->update($request->except(["_token","_method"]));
            return redirect()->route("review.index");
        }
        else
        {
            return back()->with(["errors"=>$validation->errors()->all()]);
        }
    }

   
    public function destroy($id)
    {
        $review = Review::findorfail($id);
        $review->delete();
        return redirect()->route("review.index");
 
    }
}
