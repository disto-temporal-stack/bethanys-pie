<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;

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
        try {
            $data = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'role_id' => 'required'
            ]);
    
            $data['password'] = bcrypt($request->password);
    
            $created_user = User::create($data);
            $token = $created_user->createToken('API Token')->accessToken;
    
            return response(['data' => $created_user, 'token' => $token], 201);
        } catch (Exception $e) {
            error_log($e);
            return response(['data' => 'Error in user creation'], 400);
        }
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
