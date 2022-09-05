<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Makes the auth login
     * 
     * @param \App\Http\Requests\LoginRequest $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $request->validated();
        $credentials = $request->only(['email', 'password']);
        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::guard('web')->user();

            return $this->okResponse([
                'user' => $user,
                'access_token' => $user->createToken($request->device)->accessToken
            ]);

        } else return $this->unauthorizedResponse([
            'error' => 'Invalid credentials'
        ]);
        
    }
}
