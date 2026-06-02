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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Musique $musique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Musique $musique)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Musique $musique)
    {
        //
    }
}
