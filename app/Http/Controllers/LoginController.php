<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function __invoke(
        LoginRequest $request
    )
    {
        if (Auth::attempt(
            [
            'email' => $request->email,
            'password' => $request->password
            ])) {
            $user = Auth::user();
            $token = $user->createToken('user')->accessToken;
            return response()->json(['token' => $token]);
        }
    }
}