<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    //
    public function index(){
        return response()->json(Order::all(),200);
    }
 
    public function show($id){
        $the_order=Order::find($id);
        if(is_null($the_order)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            return response()->json($the_order::find($id),200);
        }
    }
    public function store(Request $request){
        $the_order=Order::create($request->all());
        return response($the_order,201);
    }
 
    public function update(Request $request,$id){
        $the_order=Order::find($id);
        if(is_null($the_order)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            $the_order->update($request->all());
            return response()->json($the_order::find($id),200);
        }
    }
    public function destroy(Request $request,$id){
        $the_order=Order::find($id);
        if(is_null($the_order)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            $the_order->delete();
            return response()->json(null,204);
        }
    }
}
