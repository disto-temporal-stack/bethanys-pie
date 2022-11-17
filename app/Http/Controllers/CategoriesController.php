<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function index(){
        return response()->json(Category::all(),200);
    }
 
    public function show($id){
        $the_category=Category::find($id);
        if(is_null($the_category)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            return response()->json($the_category::find($id),200);
        }
    }
    public function store(Request $request){
        $the_category=Category::create($request->all());
        return response($the_category,201);
    }
 
    public function update(Request $request,$id){
        $the_category=Category::find($id);
        if(is_null($the_category)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            $the_category->update($request->all());
            return response()->json($the_category::find($id),200);
        }
    }
    public function destroy(Request $request,$id){
        $the_category=Category::find($id);
        if(is_null($the_category)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            $the_category->delete();
            return response()->json(null,204);
        }
    }
}
