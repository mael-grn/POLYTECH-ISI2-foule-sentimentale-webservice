<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:utilisateurs,email',
            'mot_de_passe' => 'required|string|min:6|confirmed',
            ]);

        $utilisateur = Utilisateur::create($validated);
        return response()->json($utilisateur, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Utilisateur $utilisateur)
    {
        return response()->json($utilisateur->load(['playlists', 'musiques']), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Utilisateur $utilisateur)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:utilisateurs,email,' . $utilisateur->id,
            'mot_de_passe' => 'sometimes|string|min:6',
        ]);

        $utilisateur->update($validated);

        return response()->json($utilisateur, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Utilisateur $utilisateur)
    {
        $utilisateur->delete();
        return response()->json(['message' => 'Utilisateur supprimé avec succès'], 200);
    }
}
