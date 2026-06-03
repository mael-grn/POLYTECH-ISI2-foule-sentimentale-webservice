<?php

namespace App\Http\Controllers;

use App\Models\Musique;
use Illuminate\Http\Request;

class MusiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Musique::all(), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Musique $musique)
    {
        return response()->json($musique, 200);
    }

    public function showfree()
    {
        $musiquesGratuites = Musique::where('prix', 0)->get();
        return response()->json($musiquesGratuites, 200);
    }

    public function showpaid()
    {
        $musiquesPayantes = Musique::where('prix', '>', 0)->get();
        return response()->json($musiquesPayantes, 200);
    }

    public function buy(Request $request, Musique $musique)
    {
        $utilisateur = $request->user();

        if (! $utilisateur) {
            return response()->json(['message' => 'Utilisateur non authentifié.'], 401);
        }

        $utilisateur->musiques()->syncWithoutDetaching([
            $musique->id => [
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $utilisateur->load(['musiques']);

        return response()->json([
            'message' => 'Musique ajoutée à la bibliothèque de l’utilisateur.'
        ], 200);
    }
}
