<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validation des entrées
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Authentification de l'utilisateur
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('AppToken')->plainTextToken;

            // Retourner l'utilisateur et le token
            return response()->json([
                'user' => $user,
                'token' => $token,
            ], 200);
        }

        // Retourner une erreur si l'authentification échoue
        return response()->json(['message' => 'Unauthorized'], 401);
    }
}
