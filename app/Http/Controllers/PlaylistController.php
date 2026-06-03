<?php

namespace App\Http\Controllers;

use App\Models\Musique;
use App\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Playlist::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'id_utilisateur' => 'required|integer|exists:utilisateurs,id',
            ]);

        $playlist = Playlist::create($validated);
        return response()->json($playlist, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Playlist $playlist)
    {
        return response()->json($playlist->load(['utilisateur', 'musiques']), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Playlist $playlist)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        $playlist->update($validated);

        return response()->json($playlist, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Playlist $playlist)
    {
        $playlist->delete();
        return response()->json(['message' => 'Playlist supprimé avec succès'], 200);
    }

    public function addMusiques(Playlist $playlist, Request $request)
    {
        $utilisateur = $request->user();
        if (! $utilisateur) {
            return response()->json(['message' => 'Utilisateur non authentifié.'], 401);
        }

        if ($playlist->id_utilisateur !== $utilisateur->id) {
            return response()->json(['message' => 'Vous ne pouvez modifier que vos propres playlists.'], 403);
        }

        $validated = $request->validate([
            'musiques' => 'required|array|min:1',
            'musiques.*' => 'integer|distinct|exists:musiques,id',
        ]);

        $musiques = Musique::whereIn('id', $validated['musiques'])->get();
        $musiquesRefusees = [];
        $musiquesAjoutees = [];

        foreach ($musiques as $musique) {
            $estGratuite = (float) $musique->prix === 0.0;
            $aAchete = $utilisateur->musiques()->whereKey($musique->id)->exists();

            if (! $estGratuite && ! $aAchete) {
                $musiquesRefusees[] = [
                    'id' => $musique->id,
                    'nom' => $musique->nom,
                ];
                continue;
            }

            $playlist->musiques()->syncWithoutDetaching([
                $musique->id => [
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);

            $musiquesAjoutees[] = [
                'id' => $musique->id,
                'nom' => $musique->nom,
            ];
        }

        return response()->json([
            'message' => 'Ajout des musiques traité.',
            'ajoutees' => $musiquesAjoutees,
            'refusees' => $musiquesRefusees,
        ], 200);
    }
}
