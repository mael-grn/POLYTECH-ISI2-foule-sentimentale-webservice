<?php

namespace Database\Seeders;

use App\Models\Artiste;
use Illuminate\Database\Seeder;

class ArtisteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artistes = [
            'alt-J',
            'Muse',
            'Rammstein',
            'Radiohead',
            'Arctic Monkeys',
            'Placebo',
            'Depeche Mode',
            'System of a Down',
            'The Strokes',
            'The Killers',
        ];

        foreach ($artistes as $nom) {
            Artiste::updateOrCreate(
                ['nom' => $nom],
                ['nom' => $nom]
            );
        }
    }
}
