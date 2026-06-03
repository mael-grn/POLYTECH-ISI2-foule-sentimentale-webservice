<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genres';

    protected $fillable = [
        'nom'
    ];

    public function musiques()
    {
        return $this->belongsToMany(Musique::class, 'genre_musique', 'id_genre', 'id_musique');
    }
}
