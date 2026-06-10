<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' => 'Liste des utilisateurs récupérée avec succès.',
            'data' => Utilisateur::all(),
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Utilisateur $utilisateur)
    {
        return response()->json([
            'message' => 'Utilisateur récupéré avec succès.',
            'data' => $utilisateur->load(['playlists', 'musiques']),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:utilisateurs,email',
            'mot_de_passe' => 'required|string|min:6',
            ]);

        $utilisateur = Utilisateur::create($validated);
        $token = $utilisateur->createToken('auth_token')->plainTextToken;
        return response()->json([
            'message' => 'Utilisateur créé avec succès.',
            'utilisateur' => $utilisateur,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'mot_de_passe' => 'required|string',
        ]);

        $utilisateur = Utilisateur::where('email', $request->email)->first();

        if (! $utilisateur || ! Hash::check($request->mot_de_passe, $utilisateur->mot_de_passe)) {
            return response()->json(['message' => 'Identifiants invalides'], 401);
        }

        $token = $utilisateur->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Connexion réussie.',
            'utilisateur' => $utilisateur,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 200);
    }

    public function logout(Request $request) {
        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'Déconnexion réussie.',
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function showme(Request $request)
    {
        $utilisateur = $request->user();
        return response()->json([
            'message' => 'Profil récupéré avec succès.',
            'data' => $utilisateur->load(['playlists', 'musiques']),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Utilisateur $utilisateur)
    {
        $connected = $request->user();
        if (! $connected || $connected->id != $utilisateur->id) {
            return response()->json([
                'message' => 'Vous n’êtes pas autorisé à modifier cet utilisateur.',
            ], 403);
        }
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:utilisateurs,email,' . $utilisateur->id,
            'mot_de_passe' => 'sometimes|string|min:6',
        ]);

        $utilisateur->update($validated);

        return response()->json([
            'message' => 'Utilisateur mis à jour avec succès.',
            'data' => $utilisateur,
        ], 200);
    }

    /**
     * Get invoices for a specific user by ID
     */
    public function getInvoices(Utilisateur $utilisateur)
    {
        $factures = $utilisateur->musiques()
            ->select('musiques.nom', 'musiques.prix', 'musique_utilisateur.created_at as date_achat')
            ->get();

        return response()->json([
            'message' => 'Factures récupérées avec succès.',
            'data' => $factures,
        ], 200);
    }

    /**
     * Get invoices for the authenticated user
     */
    public function invoices(Request $request)
    {
        $utilisateur = $request->user();

        $factures = $utilisateur->musiques()
            ->select('musiques.nom', 'musiques.prix', 'musique_utilisateur.created_at as date_achat')
            ->get();

        return response()->json([
            'message' => 'Factures récupérées avec succès.',
            'data' => $factures,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Utilisateur $utilisateur)
    {
        $connected = request()->user();
        if (! $connected || $connected->id != $utilisateur->id) {
            return response()->json([
                'message' => 'Vous n’êtes pas autorisé à supprimer cet utilisateur.',
            ], 403);
        }
        $utilisateur->delete();
        return response()->json(['message' => 'Utilisateur supprimé avec succès.'], 200);
    }
}
