<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'Non authentifié'], 401);
        }

        // Validation
        $request->validate([
            'recepteur_id' => 'required|exists:users,id',
            'message' => 'required|string'
        ]);

        // Vérifier que l'utilisateur n'envoie pas un message à lui-même
        if ($user->id == $request->recepteur_id) {
            return response()->json(['error' => 'Vous ne pouvez pas vous envoyer un message à vous-même.'], 400);
        }

        // Enregistrement du message
        $message = Message::create([
            'expediteur_id' => $user->id,
            'recepteur_id' => $request->recepteur_id,
            'message' => $request->message,
        ]);

        return response()->json(['message' => 'Message envoyé avec succès', 'data' => $message]);
    }


    // 1. Afficher les messages envoyés à l'utilisateur authentifié
    public function receivedMessages()
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'Non authentifié'], 401);
        }

        $messages = Message::where('recepteur_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json(['messages' => $messages]);
    }

    // 2. Afficher les messages échangés avec un utilisateur spécifique
    public function conversationWithUser($userId)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'Non authentifié'], 401);
        }

        $messages = Message::where(function ($query) use ($user, $userId) {
            $query->where('expediteur_id', $user->id)
                  ->where('recepteur_id', $userId);
        })->orWhere(function ($query) use ($user, $userId) {
            $query->where('expediteur_id', $userId)
                  ->where('recepteur_id', $user->id);
        })->orderBy('created_at', 'asc')
          ->get();

        return response()->json(['messages' => $messages]);
    }

    public function deleteMessage($id)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'Non authentifié'], 401);
        }

        $message = Message::find($id);

        if (!$message) {
            return response()->json(['error' => 'Message non trouvé'], 404);
        }

        // Vérifier que l'utilisateur est bien l'expéditeur ou le destinataire du message
        if ($message->expediteur_id !== $user->id && $message->recepteur_id !== $user->id) {
            return response()->json(['error' => 'Action non autorisée'], 403);
        }

        $message->delete();

        return response()->json(['message' => 'Message supprimé avec succès']);
    }

}


