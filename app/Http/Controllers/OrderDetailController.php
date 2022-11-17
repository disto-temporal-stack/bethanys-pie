<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    //
    public function index(){
        return response()->json(OrderDetail::all(),200);
    }
 
    public function show($id){
        $the_order_detail=OrderDetail::find($id);
        if(is_null($the_order_detail)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            return response()->json($the_order_detail::find($id),200);
        }
    }
    public function store(Request $request){
        $the_order_detail=OrderDetail::create($request->all());
        return response($the_order_detail,201);
    }
 
    public function update(Request $request,$id){
        $the_order_detail=OrderDetail::find($id);
        if(is_null($the_order_detail)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            $the_order_detail->update($request->all());
            return response()->json($the_order_detail::find($id),200);
        }
    }
    public function destroy(Request $request,$id){
        $the_order_detail=OrderDetail::find($id);
        if(is_null($the_order_detail)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            $the_order_detail->delete();
            return response()->json(null,204);
        }
    }
}