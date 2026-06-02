<?php

namespace App\Http\Controllers;

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
}
