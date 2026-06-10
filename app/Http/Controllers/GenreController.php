<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' => 'Liste des genres récupérée avec succès.',
            'data' => Genre::all(),
        ], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        return response()->json([
            'message' => 'Genre récupéré avec succès.',
            'data' => $genre->load(['musiques']),
        ], 200);

    }
}
