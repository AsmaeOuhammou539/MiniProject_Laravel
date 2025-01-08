<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /* Récupérer les produits partagés par l'utilisateur authentifié.*/
    public function products(Request $request)
    {
        $user = $request->user();
        $products = $user->products;

        return response()->json($products);
    }

    /* Créer un nouvel utilisateur.*/
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'ville' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'ville' => $request->ville,
            'phone_number' => $request->phone_number,
        ]);

        return response()->json([
            'message' => 'Utilisateur créé avec succès !',
            'user' => $user,
        ], 201);
    }

    

    /**
     * Lister toutes les ressources (non implémenté).
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users,200);    }

   

    /**
     * Afficher une ressource spécifique (non implémenté).
     */
    public function show(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        return response()->json($user); 
    }

    /**
     * Afficher le formulaire pour éditer une ressource (non implémenté).
     */
    public function edit(string $id)
    {
        // Placeholder pour une future implémentation.
    }

    /**
     * Mettre à jour une ressource spécifique (non implémenté).
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        $request->validate([
            'name' => 'string|max:255',
            'email' => 'string|email|max:255|unique:users,email,' . $id,
            'ville' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
        ]);

        $user->update($request->only(['name', 'email', 'ville', 'phone_number']));

        return response()->json([
            'message' => 'Utilisateur mis à jour avec succès',
            'user' => $user,
        ]);
    }

    /**
     * Supprimer une ressource spécifique (non implémenté).
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Utilisateur supprimé avec succès']);
    }
}
