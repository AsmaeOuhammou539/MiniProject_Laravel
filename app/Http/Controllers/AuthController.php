<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function logout(Request $request)
    {
        $user = Auth::user();
        $user->currentAccessToken()->delete(); 
        return response()->json(['message' => 'Logout successful'], 200);
    }

/* Modifier le mot de passe*/
public function changePassword(Request $request)
{
    // Validation des champs
    $request->validate([
        'current_password' => 'required|string',
        'new_password' => 'required|string|min:8|confirmed',
    ]);

    // Récupération de l'utilisateur authentifié
    $user = $request->user();

    // Vérification de l'ancien mot de passe
    if (!Hash::check($request->current_password, $user->password)) {
        return response()->json([
            'message' => 'Le mot de passe actuel est incorrect.'
        ], 400);
    }

    // Mise à jour du mot de passe
    $user->password = Hash::make($request->new_password);
    $user->save();

    return response()->json([
        'message' => 'Mot de passe changé avec succès.'
    ], 200);
}

}