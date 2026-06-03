<?php

namespace Database\Seeders;

use App\Models\Utilisateur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ArtisteSeeder::class,
            AlbumSeeder::class,
            GenreSeeder::class,
            MusiqueSeeder::class,
        ]);

        Utilisateur::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'nom' => 'Test User',
                'mot_de_passe' => 'password',
            ]
        );
    }
}
