<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function logout(Request $request)
    {
        $user = Auth::user();
        $user->currentAccessToken()->delete(); // Supprime le token actuel
        return response()->json(['message' => 'Logout successful'], 200);
    }
}


