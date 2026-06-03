<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Genre;
use App\Models\Musique;
use Illuminate\Database\Seeder;

class MusiqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $musiquesParAlbum = [
            'An Awesome Wave' => [
                ['nom' => 'Tessellate', 'duree' => 232, 'prix' => 1.29],
                ['nom' => 'Breezeblocks', 'duree' => 227, 'prix' => 1.29],
                ['nom' => 'Fitzpleasure', 'duree' => 242, 'prix' => 1.29],
            ],
            'This Is All Yours' => [
                ['nom' => 'Hunger of the Pine', 'duree' => 288, 'prix' => 1.29],
                ['nom' => 'Left Hand Free', 'duree' => 177, 'prix' => 1.19],
                ['nom' => 'Every Other Freckle', 'duree' => 304, 'prix' => 1.29],
            ],

            'Origin of Symmetry' => [
                ['nom' => 'New Born', 'duree' => 364, 'prix' => 1.29],
                ['nom' => 'Plug In Baby', 'duree' => 221, 'prix' => 1.29],
                ['nom' => 'Bliss', 'duree' => 255, 'prix' => 1.19],
            ],
            'Absolution' => [
                ['nom' => 'Time Is Running Out', 'duree' => 223, 'prix' => 1.29],
                ['nom' => 'Hysteria', 'duree' => 227, 'prix' => 1.29],
                ['nom' => 'Butterflies and Hurricanes', 'duree' => 302, 'prix' => 1.29],
            ],

            'Mutter' => [
                ['nom' => 'Sonne', 'duree' => 272, 'prix' => 1.29],
                ['nom' => 'Ich Will', 'duree' => 216, 'prix' => 1.19],
                ['nom' => 'Feuer frei!', 'duree' => 188, 'prix' => 1.29],
            ],
            'Reise, Reise' => [
                ['nom' => 'Mein Teil', 'duree' => 272, 'prix' => 1.29],
                ['nom' => 'Amerika', 'duree' => 223, 'prix' => 1.19],
                ['nom' => 'Ohne dich', 'duree' => 263, 'prix' => 1.29],
            ],

            'OK Computer' => [
                ['nom' => 'Paranoid Android', 'duree' => 387, 'prix' => 1.29],
                ['nom' => 'Karma Police', 'duree' => 262, 'prix' => 1.29],
                ['nom' => 'No Surprises', 'duree' => 229, 'prix' => 1.19],
            ],
            'In Rainbows' => [
                ['nom' => 'Nude', 'duree' => 267, 'prix' => 1.29],
                ['nom' => 'Weird Fishes/Arpeggi', 'duree' => 305, 'prix' => 1.29],
                ['nom' => 'Jigsaw Falling Into Place', 'duree' => 243, 'prix' => 1.29],
            ],

            "Whatever People Say I Am, That's What I'm Not" => [
                ['nom' => 'I Bet You Look Good on the Dancefloor', 'duree' => 173, 'prix' => 1.29],
                ['nom' => 'When the Sun Goes Down', 'duree' => 202, 'prix' => 1.19],
                ['nom' => 'Mardy Bum', 'duree' => 187, 'prix' => 1.19],
            ],
            'AM' => [
                ['nom' => 'Do I Wanna Know?', 'duree' => 272, 'prix' => 1.29],
                ['nom' => 'R U Mine?', 'duree' => 212, 'prix' => 1.29],
                ['nom' => 'Arabella', 'duree' => 208, 'prix' => 1.19],
            ],

            "Without You I'm Nothing" => [
                ['nom' => 'Pure Morning', 'duree' => 272, 'prix' => 1.29],
                ['nom' => 'Every You Every Me', 'duree' => 219, 'prix' => 1.29],
                ['nom' => 'Without You I\'m Nothing', 'duree' => 241, 'prix' => 1.29],
            ],
            'Sleeping with Ghosts' => [
                ['nom' => 'The Bitter End', 'duree' => 271, 'prix' => 1.29],
                ['nom' => 'This Picture', 'duree' => 233, 'prix' => 1.19],
                ['nom' => 'Special K', 'duree' => 197, 'prix' => 1.19],
            ],

            'Violator' => [
                ['nom' => 'Personal Jesus', 'duree' => 296, 'prix' => 1.29],
                ['nom' => 'Enjoy the Silence', 'duree' => 257, 'prix' => 1.29],
                ['nom' => 'Policy of Truth', 'duree' => 256, 'prix' => 1.19],
            ],
            'Songs of Faith and Devotion' => [
                ['nom' => 'I Feel You', 'duree' => 270, 'prix' => 1.29],
                ['nom' => 'Walking in My Shoes', 'duree' => 335, 'prix' => 1.29],
                ['nom' => 'In Your Room', 'duree' => 396, 'prix' => 1.29],
            ],

            'Toxicity' => [
                ['nom' => 'Chop Suey!', 'duree' => 210, 'prix' => 1.29],
                ['nom' => 'Toxicity', 'duree' => 215, 'prix' => 1.29],
                ['nom' => 'Aerials', 'duree' => 234, 'prix' => 1.19],
            ],
            'Mezmerize' => [
                ['nom' => 'B.Y.O.B.', 'duree' => 255, 'prix' => 1.29],
                ['nom' => 'Question!', 'duree' => 205, 'prix' => 1.19],
                ['nom' => 'Cigaro', 'duree' => 133, 'prix' => 1.09],
            ],

            'Is This It' => [
                ['nom' => 'Last Nite', 'duree' => 193, 'prix' => 1.29],
                ['nom' => 'Someday', 'duree' => 187, 'prix' => 1.19],
                ['nom' => 'Hard to Explain', 'duree' => 220, 'prix' => 1.29],
            ],
            'Room on Fire' => [
                ['nom' => 'Reptilia', 'duree' => 212, 'prix' => 1.29],
                ['nom' => 'The End Has No End', 'duree' => 180, 'prix' => 1.19],
                ['nom' => '12:51', 'duree' => 215, 'prix' => 1.19],
            ],

            'Hot Fuss' => [
                ['nom' => 'Mr. Brightside', 'duree' => 222, 'prix' => 1.29],
                ['nom' => 'Somebody Told Me', 'duree' => 197, 'prix' => 1.19],
                ['nom' => "All These Things That I've Done", 'duree' => 300, 'prix' => 1.29],
            ],
            "Sam's Town" => [
                ['nom' => 'When You Were Young', 'duree' => 221, 'prix' => 1.29],
                ['nom' => 'Read My Mind', 'duree' => 237, 'prix' => 1.19],
                ['nom' => 'Bones', 'duree' => 225, 'prix' => 1.19],
            ],
        ];

        $genresParAlbum = [
            'An Awesome Wave' => ['Indie Rock', 'Alternative Rock', 'Experimental Rock'],
            'This Is All Yours' => ['Indie Rock', 'Alternative Rock', 'Electronic'],
            'Origin of Symmetry' => ['Alternative Rock', 'Progressive Rock', 'Electronic'],
            'Absolution' => ['Alternative Rock', 'Art Rock', 'Progressive Rock'],
            'Mutter' => ['Industrial Metal', 'Alternative Metal', 'Hard Rock'],
            'Reise, Reise' => ['Industrial Metal', 'Alternative Metal', 'Hard Rock'],
            'OK Computer' => ['Alternative Rock', 'Art Rock', 'Progressive Rock'],
            'In Rainbows' => ['Alternative Rock', 'Art Rock', 'Electronic'],
            "Whatever People Say I Am, That's What I'm Not" => ['Indie Rock', 'Post-Punk Revival', 'Alternative Rock'],
            'AM' => ['Indie Rock', 'Alternative Rock', 'Hard Rock'],
            "Without You I'm Nothing" => ['Alternative Rock', 'Britpop', 'Darkwave'],
            'Sleeping with Ghosts' => ['Alternative Rock', 'Britpop', 'Darkwave'],
            'Violator' => ['Synthpop', 'Electronic', 'Darkwave'],
            'Songs of Faith and Devotion' => ['Synthpop', 'Electronic', 'Alternative Rock'],
            'Toxicity' => ['Alternative Metal', 'Nu Metal', 'Hard Rock'],
            'Mezmerize' => ['Alternative Metal', 'Nu Metal', 'Hard Rock'],
            'Is This It' => ['Indie Rock', 'Alternative Rock', 'Dance Rock'],
            'Room on Fire' => ['Indie Rock', 'Alternative Rock', 'Post-Punk Revival'],
            'Hot Fuss' => ['Indie Rock', 'Alternative Rock', 'Dance Rock'],
            "Sam's Town" => ['Indie Rock', 'Alternative Rock', 'Britpop'],
        ];

        $albums = Album::query()->pluck('id', 'nom');
        $genres = Genre::query()->pluck('id', 'nom');

        foreach ($musiquesParAlbum as $nomAlbum => $musiques) {
            $genreIds = collect($genresParAlbum[$nomAlbum] ?? [])
                ->map(fn (string $nomGenre) => $genres[$nomGenre] ?? null)
                ->filter()
                ->values()
                ->all();

            foreach ($musiques as $musique) {
                $nouvelleMusique = Musique::create([
                    'nom' => $musique['nom'],
                    'duree' => $musique['duree'],
                    'prix' => $musique['prix'],
                    'id_album' => $albums[$nomAlbum],
                ]);

                $nouvelleMusique->genres()->syncWithoutDetaching($genreIds);
            }
        }
    }
}
