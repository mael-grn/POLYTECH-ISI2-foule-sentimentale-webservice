<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Artiste;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $albums = [
            ['artiste' => 'alt-J', 'nom' => 'An Awesome Wave', 'date_parution' => '2012-09-28'],
            ['artiste' => 'alt-J', 'nom' => 'This Is All Yours', 'date_parution' => '2014-09-22'],

            ['artiste' => 'Muse', 'nom' => 'Origin of Symmetry', 'date_parution' => '2001-06-18'],
            ['artiste' => 'Muse', 'nom' => 'Absolution', 'date_parution' => '2003-09-29'],

            ['artiste' => 'Rammstein', 'nom' => 'Mutter', 'date_parution' => '2001-04-02'],
            ['artiste' => 'Rammstein', 'nom' => 'Reise, Reise', 'date_parution' => '2004-09-27'],

            ['artiste' => 'Radiohead', 'nom' => 'OK Computer', 'date_parution' => '1997-05-21'],
            ['artiste' => 'Radiohead', 'nom' => 'In Rainbows', 'date_parution' => '2007-10-10'],

            ['artiste' => 'Arctic Monkeys', 'nom' => "Whatever People Say I Am, That's What I'm Not", 'date_parution' => '2006-01-23'],
            ['artiste' => 'Arctic Monkeys', 'nom' => 'AM', 'date_parution' => '2013-09-09'],

            ['artiste' => 'Placebo', 'nom' => "Without You I'm Nothing", 'date_parution' => '1998-10-05'],
            ['artiste' => 'Placebo', 'nom' => 'Sleeping with Ghosts', 'date_parution' => '2003-04-21'],

            ['artiste' => 'Depeche Mode', 'nom' => 'Violator', 'date_parution' => '1990-03-19'],
            ['artiste' => 'Depeche Mode', 'nom' => 'Songs of Faith and Devotion', 'date_parution' => '1993-03-22'],

            ['artiste' => 'System of a Down', 'nom' => 'Toxicity', 'date_parution' => '2001-09-04'],
            ['artiste' => 'System of a Down', 'nom' => 'Mezmerize', 'date_parution' => '2005-05-17'],

            ['artiste' => 'The Strokes', 'nom' => 'Is This It', 'date_parution' => '2001-07-30'],
            ['artiste' => 'The Strokes', 'nom' => 'Room on Fire', 'date_parution' => '2003-10-28'],

            ['artiste' => 'The Killers', 'nom' => 'Hot Fuss', 'date_parution' => '2004-06-07'],
            ['artiste' => 'The Killers', 'nom' => "Sam's Town", 'date_parution' => '2006-10-02'],
        ];

        $artistes = Artiste::query()->pluck('id', 'nom');

        foreach ($albums as $album) {
            Album::updateOrCreate(
                ['nom' => $album['nom']],
                [
                    'date_parution' => $album['date_parution'],
                    'id_artiste' => $artistes[$album['artiste']],
                ]
            );
        }
    }
}
