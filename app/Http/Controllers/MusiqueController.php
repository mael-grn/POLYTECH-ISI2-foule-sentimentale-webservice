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
        return response()->json([
            'message' => 'Liste des musiques récupérée avec succès.',
            'data' => Musique::all(),
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Musique $musique)
    {
        return response()->json([
            'message' => 'Musique récupérée avec succès.',
            'data' => $musique,
        ], 200);
    }

    public function showfree()
    {
        $musiquesGratuites = Musique::where('prix', 0)->get();
        return response()->json([
            'message' => 'Liste des musiques gratuites récupérée avec succès.',
            'data' => $musiquesGratuites,
        ], 200);
    }

    public function showpaid()
    {
        $musiquesPayantes = Musique::where('prix', '>', 0)->get();
        return response()->json([
            'message' => 'Liste des musiques payantes récupérée avec succès.',
            'data' => $musiquesPayantes,
        ], 200);
    }

    public function buy(Request $request, Musique $musique)
    {
        $utilisateur = $request->user();

        if (! $utilisateur) {
            return response()->json([
                'message' => 'Utilisateur non authentifié.',
            ], 401);
        }

        $dejaAchetee = $utilisateur->musiques()->whereKey($musique->id)->exists();

        if ($dejaAchetee) {
            return response()->json([
                'message' => 'Cette musique a déjà été achetée.',
                'type' => 'info',
                'data' => [
                    'musique' => [
                        'id' => $musique->id,
                        'nom' => $musique->nom,
                        'prix' => $musique->prix,
                    ],
                ],
            ], 200);
        }

        if ((float) $musique->prix === 0.0) {
            $utilisateur->musiques()->syncWithoutDetaching([
                $musique->id => [
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);

            return response()->json([
                'message' => 'Musique gratuite ajoutée à votre bibliothèque avec succès.',
                'type' => 'success',
                'data' => [
                    'musique' => [
                        'id' => $musique->id,
                        'nom' => $musique->nom,
                        'prix' => $musique->prix,
                    ],
                ],
            ], 201);
        }

        $utilisateur->musiques()->syncWithoutDetaching([
            $musique->id => [
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        return response()->json([
            'message' => 'Musique achetée et ajoutée à votre bibliothèque avec succès.',
            'type' => 'success',
            'data' => [
                'musique' => [
                    'id' => $musique->id,
                    'nom' => $musique->nom,
                    'prix' => $musique->prix,
                ],
            ],
        ], 201);
    }
}
