<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Traits\CustomResponse;

use App\Models\User;

class LoginController extends Controller
{
    use CustomResponse;

    public function login(LoginRequest $request)
    {
        if(!auth()->attempt($request->validated()))
        {
           return $this->error('Invalid Credentials',401);
        }

        $accessToken = auth()->user()->createToken('#@geeksJo#@')->accessToken;

        return $this->success(['user' => auth()->user(),'access_token' => $accessToken], 'You Are Logged In! ;' );

    }
}
