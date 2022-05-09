<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Validator;
use App\Models\Image;
use App\Models\Pages;
class ImageController extends Controller
{

    public function __construct()
    {
        $this->middleware("role:super");
    }

    public function add($type,$id)
    {
        $classes = array('Portfolio',"Pages");
        if (in_array($type,$classes)) {
            $newModel = "App\\Models\\".$type;
            $value = $newModel::findorfail($id);
            return view('admin.image.create',compact("value",'type','id'));
        }
        else
        {
            return abort(404);
        }
    }


    public function store(Request $request)
    {
        if ($request->hasfile('image')) {
            $validation = Validator::make($request->all(),[
                "image"=>"required|mimes:jpeg,png,jpg,gif|max:20000"
            ]);
            if ($validation->passes()) {
                $image = $request->file('image');
                $new_name = rand().".".$image->getClientOriginalExtension();
                $image->move('images', $new_name);
                $Image = new Image();
                $Image->url = "images/".$new_name;
                $Image->imageable_id = $request->id;
                $Image->imageable_type = "App\\Models\\".$request->model;
                $Image->save();
                return response()->json([
                    'status'=>200,
                    'message'   => 'IMAGE HAS BEEN SUCCESSFULY UPLOADED',
                    'image_id'=>$Image->id,
                    'uploaded_image' => '<img class="img-thumbnail" src="/images/'.$new_name.'"/>',
                    'class_name'  => 'alert-success',
                ]);
            }
            else
            {
                return response()->json(['status'=>422,'errors'=>$validation->errors()->all()]);
            }
        }
        else
        {
            return response()->json(['status'=>422,'errors'=>array("Please Select Image First")]);
        }
    }

    public function destroy($id)
    {
        $image = Image::findorfail($id);
        if (file_exists($image->url)) {
            @unlink($image->url);
            $image->delete();
        }
        $image->delete();
        return back();
    }

}
