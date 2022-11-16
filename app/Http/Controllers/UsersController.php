<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    //
    public function index(){
        return response()->json(User::all(),200);
    }
 
    public function show($id){
        $the_user=User::find($id);
        if(is_null($the_user)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            return response()->json($the_user::find($id),200);
        }
    }
    public function store(Request $request){
        $the_user=User::create($request->all());
        return response($the_user,201);
    }
 
    public function update(Request $request,$id){
        $the_user=User::find($id);
        if(is_null($the_user)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            $the_user->update($request->all());
            return response()->json($the_user::find($id),200);
        }
    }
    public function destroy(Request $request,$id){
        $the_user=User::find($id);
        if(is_null($the_user)){
            return response()->json(['message'=>'Not found'],404);
        }else{
            $the_user->delete();
            return response()->json(null,204);
        }
    }
}
