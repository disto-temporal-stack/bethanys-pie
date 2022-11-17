<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    //
    public function index(){
        return response()->json(Image::all(),200);
    }
 
    public function show($id){
        $the_image=Image::find($id);
        if(is_null($the_image)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            return response()->json($the_image::find($id),200);
        }
    }
    public function store(Request $request){
        $the_image=Image::create($request->all());
        return response($the_image,201);
    }
 
    public function update(Request $request,$id){
        $the_image=Image::find($id);
        if(is_null($the_image)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            $the_image->update($request->all());
            return response()->json($the_image::find($id),200);
        }
    }
    public function destroy(Request $request,$id){
        $the_image=Image::find($id);
        if(is_null($the_image)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            $the_image->delete();
            return response()->json(null,204);
        }
    }
}
