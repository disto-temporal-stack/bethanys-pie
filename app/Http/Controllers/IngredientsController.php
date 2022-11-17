<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientsController extends Controller
{
    //
    public function index(){
        return response()->json(Ingredient::all(),200);
    }
 
    public function show($id){
        $the_ingredient=Ingredient::find($id);
        if(is_null($the_ingredient)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            return response()->json($the_ingredient::find($id),200);
        }
    }
    public function store(Request $request){
        $the_ingredient=Ingredient::create($request->all());
        return response($the_ingredient,201);
    }
 
    public function update(Request $request,$id){
        $the_ingredient=Ingredient::find($id);
        if(is_null($the_ingredient)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            $the_ingredient->update($request->all());
            return response()->json($the_ingredient::find($id),200);
        }
    }
    public function destroy(Request $request,$id){
        $the_ingredient=Ingredient::find($id);
        if(is_null($the_ingredient)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            $the_ingredient->delete();
            return response()->json(null,204);
        }
    }
}
