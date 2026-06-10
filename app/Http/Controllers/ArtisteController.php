<?php

namespace App\Http\Controllers;

use App\Models\Artiste;
use Illuminate\Http\Request;

class ArtisteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' => 'Liste des artistes récupérée avec succès.',
            'data' => Artiste::all(),
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Artiste $artiste)
    {
        return response()->json([
            'message' => 'Artiste récupéré avec succès.',
            'data' => $artiste->load(['albums']),
        ], 200);

    }
}
