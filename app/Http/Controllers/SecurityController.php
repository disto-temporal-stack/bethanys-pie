<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Passport\Passport;

class SecurityController extends Controller
{
    public function login(Request $request) {
        $data = $request -> validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);


        if (!auth()->attempt($data)) {
            return response(['error_message' => 
                'User data is not correct. Please try again'], 401);
        }

        Passport::personalAccessTokensExpireIn(now()->addMinutes(60));
        $token = auth()->user()->createToken('API Token')->accessToken;

        return response(['user' => auth()->user(), 'token' => $token, 'message' => 'Login successful']);
    }

    public function logout(Request $request) {
        $user = auth('api')->user();
        if (!$user) {
            return response(['message' => 'Problems in logout'], 400);
        }

        $user->token()->revoke();
        return response(['message' => 'Logout successful'], 200);
    }
}
