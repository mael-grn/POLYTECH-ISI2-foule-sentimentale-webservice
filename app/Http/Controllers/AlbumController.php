<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' => 'Liste des albums récupérée avec succès.',
            'data' => Album::all(),
        ], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        return response()->json([
            'message' => 'Album récupéré avec succès.',
            'data' => $album->load(['musiques']),
        ], 200);
    }
}
