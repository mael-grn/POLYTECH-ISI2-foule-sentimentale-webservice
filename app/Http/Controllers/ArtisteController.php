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
        return response()->json(Artiste::all(), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Artiste $artiste)
    {
        return response()->json($artiste->load(['albums']), 200);

    }
}
