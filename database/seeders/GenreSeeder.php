<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            'Indie Rock',
            'Alternative Rock',
            'Art Rock',
            'Electronic',
            'Experimental Rock',
            'Trip Hop',
            'Progressive Rock',
            'Alternative Metal',
            'Industrial Metal',
            'Nu Metal',
            'Britpop',
            'Post-Punk Revival',
            'Synthpop',
            'Darkwave',
            'Dance Rock',
            'Hard Rock',
        ];

        foreach ($genres as $nom) {
            Genre::updateOrCreate(
                ['nom' => $nom],
                ['nom' => $nom]
            );
        }
    }
}

