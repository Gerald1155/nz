<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Validator;

class PortfolioController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:super');
    }
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('admin.portfolio.index',compact('portfolios'));
    }

    public function create()
    {
        return view('admin.portfolio.create');
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            "name"=>"required|max:500",
            "description"=>"required",
        ]);
        if ($validation->passes()) {
            $portfolio = Portfolio::create($request->except(["_token","_method"]));
            return redirect()->route('image.create',['Portfolio',$portfolio->id]);
        }
        else
        {
            return back()->with(['errors'=>$validation->errors()->all()]);

        }

    }

    public function show($id)
    {
        $portfolio = Portfolio::findorfail($id);
        return view('admin.portfolio.show',compact('portfolio'));
    }

    
    public function edit($id)
    {
        $portfolio = Portfolio::findorfail($id);
        return view('admin.portfolio.edit',compact('portfolio'));
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(),[
            "name"=>"required|max:500",
            "description"=>"required",
        ]);
        if ($validation->passes()) {
            $portfolio = Portfolio::where("id",$id)->update($request->except(["_token","_method"]));
            return redirect()->route('image.create',['Portfolio',$id]);
        }
        else
        {
            return back()->with(['errors'=>$validation->errors()->all()]);
        }

    }


    public function destroy($id)
    {
        $portfolio = Portfolio::findorfail($id);
        foreach ($portfolio->images as $c) {
            if (file_exists($c->url)) {
                @unlink($c->url);
            }
        }
        $portfolio->delete();
        return back()->with("success",array("Portfolio Deleted Successfully"));
    }
}
