<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('AppToken')->plainTextToken;
            return response()->json([
                  'user' => $user,
                  'token' => $token,]);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }
}
