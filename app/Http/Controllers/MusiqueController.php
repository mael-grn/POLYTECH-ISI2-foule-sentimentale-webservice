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
        return response()->json($musique->load(), 200);
    }
}
