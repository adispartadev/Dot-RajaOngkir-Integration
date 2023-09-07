<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Tools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthC extends Controller
{


    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email'    => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()){
            $data = $validator->getMessageBag()->toArray();
            return Tools::jsonResponse('error', 'Please fill out the form provided', $data);
        }

        $credentials = $request->only(['password', 'email']);

        if(Auth::attempt($credentials)) {
            $user  = Auth::user();
            $token = $user->createToken('dot_token')->plainTextToken;
            $user->token = $token;
            return Tools::jsonResponse('success', 'Login successfully', [
                'token' => $token,
                'user'  => $user
            ]);
        }

        return Tools::jsonResponse('error', '', [
            'password' => ['Wrong email and password combination']
        ]);
    }
}
