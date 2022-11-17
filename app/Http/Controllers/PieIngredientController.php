<?php

namespace App\Http\Controllers;

use App\Models\PieIngredient;
use Illuminate\Http\Request;

class PieIngredientController extends Controller
{
    //
    public function index(){
        return response()->json(PieIngredient::all(),200);
    }
 
    public function show($id){
        $the_pie_ingredient=PieIngredient::find($id);
        if(is_null($the_pie_ingredient)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            return response()->json($the_pie_ingredient::find($id),200);
        }
    }
    public function store(Request $request){
        $the_pie_ingredient=PieIngredient::create($request->all());
        return response($the_pie_ingredient,201);
    }
 
    public function update(Request $request,$id){
        $the_pie_ingredient=PieIngredient::find($id);
        if(is_null($the_pie_ingredient)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            $the_pie_ingredient->update($request->all());
            return response()->json($the_pie_ingredient::find($id),200);
        }
    }
    public function destroy(Request $request,$id){
        $the_pie_ingredient=PieIngredient::find($id);
        if(is_null($the_pie_ingredient)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            $the_pie_ingredient->delete();
            return response()->json(null,204);
        }
    }
}