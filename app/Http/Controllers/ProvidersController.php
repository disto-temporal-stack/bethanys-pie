<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProvidersController extends Controller
{
    //
    public function index(){
        return response()->json(Provider::all(),200);
    }
 
    public function show($id){
        $the_provider=Provider::find($id);
        if(is_null($the_provider)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            return response()->json($the_provider::find($id),200);
        }
    }
    public function store(Request $request){
        $the_provider=Provider::create($request->all());
        return response($the_provider,201);
    }
 
    public function update(Request $request,$id){
        $the_provider=Provider::find($id);
        if(is_null($the_provider)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            $the_provider->update($request->all());
            return response()->json($the_provider::find($id),200);
        }
    }
    public function destroy(Request $request,$id){
        $the_provider=Provider::find($id);
        if(is_null($the_provider)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            $the_provider->delete();
            return response()->json(null,204);
        }
    }
}