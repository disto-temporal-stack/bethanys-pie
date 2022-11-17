<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryMan; 

class DeliveryManController extends Controller
{
    
     //
     public function index(){
        return response()->json(DeliveryMan::all(),200);
    }
 
    public function show($id){
        $the_delivery_man=DeliveryMan::find($id);
        if(is_null($the_delivery_man)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            return response()->json($the_delivery_man::find($id),200);
        }
    }
    public function store(Request $request){
        $the_delivery_man=DeliveryMan::create($request->all());
        return response($the_delivery_man,201);
    }
 
    public function update(Request $request,$id){
        $the_delivery_man=DeliveryMan::find($id);
        if(is_null($the_delivery_man)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            $the_delivery_man->update($request->all());
            return response()->json($the_delivery_man::find($id),200);
        }
    }
    public function destroy(Request $request,$id){
        $the_delivery_man=DeliveryMan::find($id);
        if(is_null($the_delivery_man)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            $the_delivery_man->delete();
            return response()->json(null,204);
        }
    }

}
