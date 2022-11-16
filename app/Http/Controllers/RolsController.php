<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;

class RolsController extends Controller
{
    //
    public function index(){
        return response()->json(Rol::all(),200);
    }
 
    public function show($id){
        $the_rol=Rol::find($id);
        if(is_null($the_rol)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            return response()->json($the_rol::find($id),200);
        }
    }
    public function store(Request $request){
        $the_rol=Rol::create($request->all());
        return response($the_rol,201);
    }
 
    public function update(Request $request,$id){
        $the_rol=Rol::find($id);
        if(is_null($the_rol)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            $the_rol->update($request->all());
            return response()->json($the_rol::find($id),200);
        }
    }
    public function destroy(Request $request,$id){
        $the_rol=Rol::find($id);
        if(is_null($the_rol)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            $the_rol->delete();
            return response()->json(null,204);
        }
    }
}
