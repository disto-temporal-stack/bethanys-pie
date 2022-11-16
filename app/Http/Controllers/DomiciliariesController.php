<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Domiciliarie; 

class DomiciliariesController extends Controller
{
    
     //
     public function index(){
        return response()->json(Domiciliarie::all(),200);
    }
 
    public function show($id){
        $the_domiciliarie=Domiciliarie::find($id);
        if(is_null($the_domiciliarie)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            return response()->json($the_domiciliarie::find($id),200);
        }
    }
    public function store(Request $request){
        $the_domiciliarie=Domiciliarie::create($request->all());
        return response($the_domiciliarie,201);
    }
 
    public function update(Request $request,$id){
        $the_domiciliarie=Domiciliarie::find($id);
        if(is_null($the_domiciliarie)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            $the_domiciliarie->update($request->all());
            return response()->json($the_domiciliarie::find($id),200);
        }
    }
    public function destroy(Request $request,$id){
        $the_domiciliarie=Domiciliarie::find($id);
        if(is_null($the_domiciliarie)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            $the_domiciliarie->delete();
            return response()->json(null,204);
        }
    }

}
