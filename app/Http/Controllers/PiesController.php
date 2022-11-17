<?php

namespace App\Http\Controllers;

use App\Models\Pie;
use Illuminate\Http\Request;

class PiesController extends Controller
{
    //
    public function index(){
        return response()->json(Pie::all(),200);
    }
 
    public function show($id){
        $the_pie=Pie::find($id);
        if(is_null($the_pie)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            return response()->json($the_pie::find($id),200);
        }
    }
    public function store(Request $request){
        $the_pie=Pie::create($request->all());
        return response($the_pie,201);
    }
 
    public function update(Request $request,$id){
        $the_pie=Pie::find($id);
        if(is_null($the_pie)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            $the_pie->update($request->all());
            return response()->json($the_pie::find($id),200);
        }
    }
    public function destroy(Request $request,$id){
        $the_pie=Pie::find($id);
        if(is_null($the_pie)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            $the_pie->delete();
            return response()->json(null,204);
        }
    }
}
